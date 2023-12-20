<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\filemanger\files_types;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use App\Helpers\Moving;
use Illuminate\Support\Facades\Session;
use Illuminate\Tests\Support\A;

class EmployeePermission

{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse) $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */

    // this middeware use to to make permission for route to users login and branch
    public function handle(Request $request, Closure $next)
    {
        $url_token = Route::currentRouteName();
        $url_current =url()->current();

        if (strpos($url_token, 'create') !== false) {
            $url_token = str_replace('create', 'store', $url_token);
        } elseif (strpos($url_token, 'edit') !== false) {
            $url_token = str_replace('edit', 'update', $url_token);
        }


        $tes = Role::where('roles.type', 3) ->where(function ($query) {
            $query->where("roles.link_route", 'not like', '%setting%');
              })->pluck('roles.link_route')->toArray();
            // dd(in_array($url_token, $tes));



        foreach (['edit', 'index', 'store', 'update', 'show', 'destory', 'create'] as $key => $value) {
            if (str_contains($url_token, $value)) {
                $el = false;
            }
        }

        if (Session::get('branch')) {
            if (in_array($url_token, $tes) ) {
                if(str_contains($url_current, 'setting')){
                    toastr()->error('ليس لديك صلاحية');
                    return back();
                }else
                return $next($request);
            } else {
                toastr()->error('ليس لديك صلاحية');
                return back();

            }


        }

        if (auth()->user()->type_role == 'super') {
            return $next($request);
        } else {

            $AllPermission = Role::join('role_has_permissions', 'roles.id', '=', 'role_has_permissions.permission_id')
                ->where('role_has_permissions.role_id', auth()->user()->profession_id)
                ->where(function ($q) {
                    $q->where('roles.type', 3)
                        ->OrWhere('roles.type', auth()->user()->type_role == 'main' ? 1 : 2);
                })
                ->pluck('roles.link_route')
                ->toArray();

        }



        if (in_array($url_token, $AllPermission) || $el) {
            return $next($request);
        } else {
            toastr()->error('ليس لديك صلاحية');
            return back();

        }

    }


}
