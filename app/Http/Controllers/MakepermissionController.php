<?php

namespace App\Http\Controllers;

use App\Helpers\Moving;
use App\Models\hr\Profession;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\role_has_permissions;
use Illuminate\Support\Facades\App;
use Nette\Utils\Helpers;

class MakepermissionController extends Controller
{
    //
    public function index(Request $request, $id)
    {

        $roles_permission = role_has_permissions::where('role_id', $id)->pluck('permission_id')->toArray();

        $roles = Role::where('main_route', 1)->where('child_id', null)->with('childrenRoles')->orderBy('order', 'asc')->get();


        foreach ($roles as $value) {


            $value->check = in_array($value->id, $roles_permission) ? $value->check = 1 : $value->check = 0;


        }



        $role_details = Profession::Findorfail($id);
        Moving::getMoving('عرض صلاحيات المستخدم');



        return view('permissions', compact('roles', 'role_details', 'roles_permission'));
    }

    public function StorePermission(Request $request, $id)
    {

        $roles = Role::where('main_route', 1)->where('child_id', null)->where('type',$request->type_role)->with('childrenRoles')->orderBy('order', 'asc')->get();;

        $role_details = Profession::Findorfail($id);
        if ($request->permission_arry && $request->type_role) {
            role_has_permissions::where('role_id', $id)->delete();
            if ($request->type_role == 1) {

                foreach ($request->permission_arry as $key => $value1) {
                    role_has_permissions::create(['role_id' => $id, 'permission_id' => $value1, 'userAdd' => auth()->user()->id]);

                }


            } elseif ($request->type_role == 2) {
                foreach ($request->permission_arry as $key => $value2) {
                    role_has_permissions::create(['role_id' => $id, 'permission_id' => $value2, 'userAdd' => auth()->user()->id]);

                }

            } else {
                foreach ($request->permission_arry as $key => $value3) {
                    role_has_permissions::create(['role_id' => $id, 'permission_id' => $value3, 'userAdd' => auth()->user()->id]);
                }
            }
            toastr()->success('تم حفط الصلاحيات بنجاح');
            Moving::getMoving('تعديل واضافة صلاحيات جديدة للموظف');

        } else {
            toastr()->error(' برجاء اختيار نوع الحساب المطلوب والصلاحيات   ');

        }
        $roles_permission = role_has_permissions::where('role_id', $id)->pluck('permission_id')->toArray();
        Moving::getMoving('عرض صلاحيات المستخدم');
        foreach ($roles as $value) {


            $value->check = in_array($value->id, $roles_permission) ? $value->check = 1 : $value->check = 0;


        }

        return view('permissions', compact('roles', 'role_details', 'roles_permission'));

    }


}
