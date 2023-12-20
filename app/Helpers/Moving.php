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
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use function Symfony\Component\String\u;

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
         //   dd(Storage::disk('public')->put($folder, $request->File($image)));
            return Storage::disk('public')->put($folder, $request->File($image));
        }

    }

    public static function deleteImage($filename)
    {
        if (!is_null($filename) && Storage::disk('public')->exists($filename)) {
            return Storage::disk('public')->delete($filename);
        }
    }

    //get menu data for users login
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

    //get permissions for users
    public static function get_all_permissions()
    {
        if (auth()->user()->type_role == 'super') {
            $AllPermission = Role::pluck('roles.link_route')
                ->toArray();

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


///////////////////////crumbs
    //get crombu  url route
    public static function get_url()
    {
        $result = ['dashboard'];
        $arr = explode("/", request()->path());
        foreach($arr as $key=>$r){
            $elem='';
            $num=$key;

            while(count($arr)!=$num+1){
                if($elem!=''){
                    $elem=$elem.'/';
                }
                $elem=$elem.$arr[$num];
               if(self::checkUrl($elem)){
                 $result[] = Route::getRoutes()->match(
                            Request::create($elem)
                    )->getName();
               }
                $num++;
            }

        }
        $result[] = Route::current()->getName();
        $result = array_filter($result, function ($value) {
            return $value !== 'home.index';
        });
         return array_unique($result);
    }


////////////////check if url exist or not
    public static function checkUrl($route) {
        $routes = Route::getRoutes()->getRoutes();
        foreach($routes as $r){
            if($r->uri == $route){
                return true;
            }
        }
        return false;
    }


//////////////get arabic name of route
    public static function get_arabic_name($route)
    {
        if (strpos($route, 'create') !== false) {
            $route = str_replace('create', 'store', $route);
        } elseif (strpos($route, 'edit') !== false) {
            $route = str_replace('edit', 'update', $route);
        }
        return optional(Role::where('link_route', $route)->first())->name;
    }


    // get menu data for branch
    public static function get_branch_data()
    {
        $new_route = Route::getRoutes()->match(Request::create(url()->previous()))->getName();


        if (Session::has('branch')) {
            $branch_menu = Role::where('roles.main_route', 1)
                ->where('roles.child_id', null)
                ->where('roles.type', 3)
                ->where('roles.show_dept', 1)
                ->orderBy('order', 'asc')->with('childrenRoles')->get();
            return $branch_menu;
        }

    }


    //function get persmission for print button
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

// get ids of children parent
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


}
