<?php


namespace App\Interface\hr;
use App\Http\Requests\hr\EmployeeRequest;
use App\Models\hr\Employee;


interface EmployeeRepositoryInterface
{
   public function index();
   public function create();

    public function store(EmployeeRequest $request);
    public function edit(Employee $employee);

    public function update(EmployeeRequest $request,Employee $employee);

    public function destroy(Employee $employeeStatus);

}
