<?php

namespace App\Repository;

use App\Helpers\Moving;
use App\Interface\RoleRepositoryInterface;
use App\Models\Icons;
use App\Models\Role;

class RoleRepository implements RoleRepositoryInterface
{
    public function __construct()
    {
        $this->data['roles'] = Role::all();

    }

    public function index()
    {
        Moving::getMoving('عرض كل اسماء الاقسام  ');
        $roles = Role::where('main_route', 1)->where('roles.show_dept', 1)->get();
        return view('pages.roles.index', compact('roles'), $this->data);
    }

    public function store($request)
    {

        $data = $request->validated();
        Role::create($data);
        Moving::getMoving('حفظ القسم  جديد');
        return back();
    }

    public function update($request, $role)
    {
        $role->icon_type = $request->icon_type;

        $data = $request->validated();
        $data['userEdit'] = auth()->user()->id;


        $role->update($data);
        toastr()->success('تم تعديل القسم بنجاح');
        Moving::getMoving('تعديل  القسم ');

        return back();
    }

    public function destroy(Role $role)
    {
        $role->delete();
        Moving::getMoving('حذف القسم  ');
        return back();
    }

}
