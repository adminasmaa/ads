<?php


namespace App\Interface;
use App\Http\Requests\RoleRequest;
use App\Models\Role;


interface RoleRepositoryInterface
{
    public function index();


    public function store(RoleRequest $request);

    public function update(RoleRequest $request,Role $role);

    public function destroy(Role $role);

}
