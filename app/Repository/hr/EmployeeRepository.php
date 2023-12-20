<?php


namespace App\Repository\hr;

use App\Helpers\Moving;
use App\Models\hr\Employee;
use App\Interface\hr\EmployeeRepositoryInterface;
use App\Models\hr\Bank;
use App\Models\hr\Branch;
use App\Models\hr\EmployeeStatus;
use App\Models\hr\FileManger;
use App\Models\hr\JobTitle;
use App\Models\hr\Nationality;
use App\Models\hr\Profession;
use App\Models\hr\Qualification;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\Session;

class EmployeeRepository implements EmployeeRepositoryInterface
{
    protected $data;
    protected $images = ["user_img", "cid_img", "pass_img", "permit_img", "qual_img"];

    public function __construct()
    {
        $this->data['branches'] = Branch::withoutGlobalScope('branch')->get();
        $this->data['nationalities'] = Nationality::all();
        $this->data['professions'] = Profession::all();
        $this->data['banks'] = Bank::all();
        $this->data['jobTitles'] = JobTitle::all();
        $this->data['qualifications'] = Qualification::all();
        $this->data['employeeStatuses'] = EmployeeStatus::all();
        $this->data['employees'] = Employee::where('emp_state_id', '!=', 5)->get();
    }

    public function index()
    {

        Moving::getMoving('عرض كل اسماء الموظفين');
        $this->data['employees'] = Employee::branchChoose()->when(request()->has('nationality'), function ($q) {
                $q->where('nation_id', request()->get('nationality'));
            })->when(request()->has('profession'), function ($q) {
                $q->where('profession_id', request()->get('profession'));
            })->when(request()->has('bank'), function ($q) {
                $bank = Bank::findOrFail(request()->get('bank'))->name;
                $q->whereJsonContains('account_name', $bank);
            })->when(request()->has('qualification'), function ($q) {
                $q->where('qual_id', request()->get('qualification'));
            })
            ->when(request()->has('employeeStatus'), function ($q) {
                $q->where('emp_state_id', request()->get('employeeStatus'));
            })
            ->when(request()->has('jobTitle'), function ($q) {
                $q->where('job_title_id', request()->get('jobTitle'));
            })
            ->when(request()->has('Employee_id'), function ($q) {
                $q->where('id', request()->get('Employee_id'));
            })
            ->when(request()->has('branch'), function ($q) {
                $q->where('branch_id', request()->get('branch'));
            })
            ->get();

        return view('pages.hr.employees.index', $this->data);
    }

    public function create()
    {

        return view('pages.hr.employees.create', $this->data);
    }

    public function store($request)
    {

        $data = Arr::except($request->validated(), 'phones');
        $data['userAdd'] = auth()->user()->id;
        $data['account_name'] = json_encode($data['account_name']);
        $data['account_number'] = json_encode($data['account_number']);
        $data['account_details'] = json_encode($data['account_details']);
        $data['password'] = Hash::make($request->password);

        $paths = [];
        foreach ($this->images as $image) {
            $data[$image] = Moving::upload($request, 'Employee', $image);
            $paths[] = (object)['path' => $data[$image], 'type' => $image];
        }

        foreach ($request->types as $key => $item) {
            $image = array_key_exists($key, $request->receipt_image ?? []) ? Storage::disk('public')->put('Employee', $request->file('receipt_image')[$key]) : null;
            $paths[] = (object)['path' => $image, 'type' => $item];
            $license[] = (object)['type' => $item, 'receipt' => array_key_exists($key, $request->receipt ?? []) ? 1 : 0, 'date' => array_key_exists($key, $request->date ?? []) ? $request->date[$key] : null, 'image' => $image];

        }

        foreach ($request->names as $key => $item) {
            $closest[] = (object)['name' => $item, 'phone' => $request->phones[$key], 'relationship' => $request->relationships[$key]];
        }
        $data['closest_person'] = json_encode($closest);
        $data['license'] = json_encode($license);


        $employee = Employee::create($data);
        foreach ($paths as $path) {
            if (!is_null($path->path)) {
                FileManger::create([
                    'type' => $path->type,
                    'path' => $path->path,
                    'employee_id' => $employee->id
                ]);
            }
        }
        Moving::getMoving('حفظ الموظف جديد');
        toastr()->success('تم حفظ بنجاح');
        Moving::getMoving('حفظ الموظف جديد');

        return redirect()->route('employees.index', array('branch' => request()->get('branch')));
    }

    public function edit($employee)
    {
        $this->data['employee'] = $employee;

        return view('pages.hr.employees.edit', $this->data);
    }

    public function update($request, $employee)
    {
        $data = Arr::except($request->validated(), 'phones');
        $data['userEdit'] = auth()->user()->id;
        $data['account_name'] = json_encode($data['account_name']);
        $data['account_number'] = json_encode($data['account_number']);
        $data['account_details'] = json_encode($data['account_details']);
        $data['password'] = $request->password ? Hash::make($request->password) : $employee->password;
        $paths = [];
        foreach ($this->images as $image) {
            $data[$image] = Moving::upload($request, 'Employee', $image) ?? $employee[$image];
            $paths[] = (object)['path' => $data[$image], 'type' => $image];
        }
        foreach ($request->names as $key => $item) {
            $closest[] = (object)['name' => $item, 'phone' => $request->phones[$key], 'relationship' => $request->relationships[$key]];
        }
        foreach ($request->types as $key => $item) {
            $image = array_key_exists($key, $request->receipt_image ?? []) ? Storage::disk('public')->put('Employee', $request->file('receipt_image')[$key]) : $employee->license[$key]->image ?? null;
            $paths[] = (object)['path' => $image, 'type' => $item];
            $license[] = (object)['type' => $item, 'receipt' => array_key_exists($key, $request->receipt ?? []) ? 1 : 0, 'date' => array_key_exists($key, $request->date ?? []) ? $request->date[$key] : null, 'image' => $image];

        }

        $data['closest_person'] = json_encode($closest);
        $data['license'] = json_encode($license);


        $employee->update($data);
        foreach ($paths as $path) {
            if (!is_null($path->path) && FileManger::where('path', $path->path)->count() == 0) {
                FileManger::create([
                    'type' => $path->type,
                    'path' => $path->path,
                    'employee_id' => $employee->id
                ]);
            }
        }
        toastr()->success('تم تعديل بنجاح');
        Moving::getMoving('تعديل الموظف ');
        return redirect()->route('employees.index', array('branch' => request()->get('branch')));
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();
        toastr()->success('تم الحذف بنجاح');
        Moving::getMoving('حذف الموظف ');

        return back();
    }

}
