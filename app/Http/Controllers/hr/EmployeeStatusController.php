<?php

namespace App\Http\Controllers\hr;

use App\Http\Controllers\Controller;

use App\Http\Requests\hr\EmployeeStatusRequest;
use App\Models\hr\EmployeeStatus;
use App\Interface\hr\EmployeeStatusRepositoryInterface;

class EmployeeStatusController extends Controller
{
    private $employeeStatusRepository;

    public function __construct(EmployeeStatusRepositoryInterface $employeeStatusRepository)
    {
        $this->employeeStatusRepository = $employeeStatusRepository;
    }

    public function index()
    {
        return $this->employeeStatusRepository->index();

    }

    public function store(EmployeeStatusRequest $request)
    {


        return $this->employeeStatusRepository->store($request);;
    }

    public function update(EmployeeStatusRequest $request, $id)
    {

        return $this->employeeStatusRepository->update($request, $id);
    }

    public function destroy(EmployeeStatus $request, $id)
    {

        return $this->employeeStatusRepository->destroy($request, $id);
    }
}
