<?php

namespace App\Helpers;

use App\Models\clients\Clients;
use App\Models\hr\Employee;
use App\Models\hr\Moving as ModelsMoving;
use App\Models\Role;
use App\Models\role_has_permissions;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class Moving
{
    public static function getMoving($name)
    {
        ModelsMoving::create([
            'name' => $name,
            'employee_id' => auth()->user()->id,
        ]);
    }

    public static function upload($request, $folder, $image)
    {
        if ($request->hasFile($image)) {
            return Storage::disk('public')->put($folder, $request->File($image));
        }

    }

    public static function deleteImage($filename)
    {
        if (!is_null($filename) && Storage::disk('public')->exists($filename)) {
            return Storage::disk('public')->delete($filename);
        }
    }

    public static function get_user_setting()
    {


        if (auth()->user()->type_role == 'super') {
            $roles = Role::where('roles.main_route', 1)
                ->where('roles.child_id', null)
                ->where('roles.has_child', 1)
                ->with('childrenRoles')->orderBy('order', 'asc')->get();


        } else {
            $roles = Role::select('roles.*')->join('role_has_permissions', 'roles.id', '=', 'role_has_permissions.permission_id')
                ->where('role_has_permissions.role_id', auth()->user()->profession_id)
                ->where('roles.child_id', null)
                ->where('roles.main_route', 1)
                ->where('roles.has_child', 1)
                ->where(function ($q) {
                    $q->where('roles.type', 3)
                        ->OrWhere('roles.type', auth()->user()->type_role == 'main' ? 1 : 2);
                })->with('childrenRoles', function ($q) {
                    //  dd(DB::table('role_has_permissions')->where('role_id', auth()->user()->profession_id)->pluck('permission_id')->toArray());
                    $q->whereIn('id', DB::table('role_has_permissions')->where('role_id', auth()->user()->profession_id)->pluck('permission_id')->toArray());
                })
                ->orderBy('order', 'asc')
                ->get();


        }


        return $roles;

    }

    public static function get_all_permissions()
    {
        if (auth()->user()->type_role == 'super') {
            $AllPermission = Role::pluck('roles.link_route')
                ->toArray();
           // dd($AllPermission);
        } else {
            $AllPermission = Role::select('roles.*')->join('role_has_permissions', 'roles.id', '=', 'role_has_permissions.permission_id')
                ->where('role_has_permissions.role_id', auth()->user()->profession_id)
                ->where(function ($q) {
                    $q->where('roles.type', 3)
                        ->OrWhere('roles.type', auth()->user()->type_role == 'main' ? 1 : 2);
                })
                ->pluck('roles.link_route')
                ->toArray();
        }

        return $AllPermission;
    }

    //function  get depts children for  user
    public static function get_depts_child($id)
    {
        if (auth()->user()->type_role == 'super') {
            $roles = Role::where('roles.main_route', 0)
                ->where('roles.child_id', $id)
                ->where('roles.has_child', 1)
                ->orderBy('order', 'asc')->get();
        } else {
            /**
             * type=1 -> main , type=2 -> admin , type=3 -> main and admin
             */
            $roles = Role::select('roles.*')->join('role_has_permissions', 'roles.id', '=', 'role_has_permissions.permission_id')
                ->where('role_has_permissions.role_id', auth()->user()->profession_id)
                ->where('roles.child_id', $id)
                ->where('roles.main_route', 0)
                ->where('roles.has_child', 0)
                ->where(function ($q) {
                    $q->where('roles.type', 3)
                        ->OrWhere('roles.type', auth()->user()->type_role == 'main' ? 1 : 2);
                })->with('childrenRoles')
                ->orderBy('order', 'asc')->get();

        }
        // dd(auth()->user()->profession_id);


        return $roles;

    }

    //get employe data
    public static function employe_attendance($id)
    {
        $employ_data = Employee::where('id', $id)->first();
        return $employ_data;

    }

    public static function get_url()
    {
        $result = ['dashboard'];
        $arr = explode("/", request()->path());
        $elem = [];
        if ((($arr[count($arr) - 1] == 'edit' && count($arr) - 1 >= 3) || ($arr[count($arr) - 1] != 'edit' && count($arr) - 1 >= 2)) && $arr[count($arr) - 2] != 'show' && $arr[count($arr) - 2] != 'fileManager') {
            $elem[] = $arr[0];
            $elem[] = $arr[0] . '/' . $arr[1];
        } else {
            $elem[] = $arr[0];
        }
        foreach ($elem as $el) {
            $result[] = Route::getRoutes()->match(
                Request::create($el)
            )->getName();
        }
        $result[] = Route::current()->getName();
        $result = array_filter($result, function ($value) {
            return $value !== 'home.index';
        });
        return array_unique($result);
    }

    public static function get_arabic_name($route)
    {
        if (strpos($route, 'create') !== false) {
            $route = str_replace('create', 'store', $route);
        } elseif (strpos($route, 'edit') !== false) {
            $route = str_replace('edit', 'update', $route);
        }
        return optional(Role::where('link_route', $route)->first())->name;
    }

    public static function get_branch_data()
    {
        if (request()->has('branch')) {
            $branch_menu = Role::where('roles.main_route', 1)
                ->where('roles.child_id', null)
                ->where('roles.type', 3)
                ->where('roles.show_dept', 1)
                ->orderBy('order', 'asc')->with('childrenRoles')->get();
            return $branch_menu;
        }

    }

    public static function print_permission()
    {
        if (auth()->user()->type_role != 'super') {
            $check_print = role_has_permissions::where('role_id', auth()->user()->profession_id)->where('permission_id', '635')->first();

            if (!$check_print) {
                return 0;
            } else {
                return 1;
            }
        } else {
            return 1;
        }


    }

    public static function get_child_parent_id($id)
    {
        $parent_array_ids = [];
        $parent_id = $id;
        do {
            $parent_id = Role::where('id', $parent_id)->first()->child_id;
            $parent_array_ids[] = $parent_id;

        } while ($parent_id != null);

        return json_encode($parent_array_ids);


    }
    public static function get_parent_id($id)
    {


    }



}
