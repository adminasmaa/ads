<?php

namespace App\Http\Controllers\hr;

use Illuminate\Http\Request;
use App\Http\Requests\hr\EmployeeRequest;
use App\Models\hr\Employee;
use App\Interface\hr\EmployeeRepositoryInterface;
use App\Http\Controllers\Controller;

class EmployeeController extends Controller
{
    private $employeeRepository;

    public function __construct(EmployeeRepositoryInterface $employeeRepository)
    {
        $this->employeeRepository = $employeeRepository;
    }

    public function index(){


        return $this->employeeRepository->index();
    }
    public function create(){

        return $this->employeeRepository->create();

    }
    public function store(EmployeeRequest $request){
       return $this->employeeRepository->store($request);
    }
    public function edit(Employee $employee){
        return $this->employeeRepository->edit($employee);

    }
    public function update(EmployeeRequest $request,Employee $employee){

        return $this->employeeRepository->update($request,$employee);
    }
    public function destroy(Employee $employee){
        return $this->employeeRepository->destroy($employee);
    }
}
