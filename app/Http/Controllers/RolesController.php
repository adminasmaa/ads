<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RoleRequest;
use App\Models\Role;
use App\Interface\RoleRepositoryInterface;

class RolesController extends Controller
{
    private $roleRepository;

    public function __construct(RoleRepositoryInterface $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }

    public function index(){
        return $this->roleRepository->index();

    }
    public function store(RoleRequest $request){


        return $this->roleRepository->store($request);
    }
    public function update(RoleRequest $request,Role $role){

        return $this->roleRepository->update($request,$role);
    }
    public function destroy(Role $role){
        return $this->roleRepository->destroy($role);
    }
}
