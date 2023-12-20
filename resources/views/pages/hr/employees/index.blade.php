@extends('layouts.admin')
@if(Session::has('branch'))
    @php
        $branch_name=App\Models\hr\branch::where('id',Session::get('branch'))->first()->name;
    @endphp
    @section('title', 'الموظفين- '.$branch_name)

@else
    @section('title', 'الموظفين')

@endif
@section('content')


    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-12">
                            @if(auth()->user()->type_role !='branch')
                                @role('employees.store')
                                <a href="{{route('employees.create',array('branch' => request()->get('branch')))}}"
                                   class="btn btn-square btn-primary"
                                   style="margin:10px;">
                                    إضافة
                                    موظف</a>
                                @endrole
                            @endif
                            @role('reports.index')
                            <a href="{{route('reports.index',array('branch' => request()->get('branch')))}}"
                               class="btn btn-square btn-primary"
                               style="margin:10px;">
                                التقارير
                            </a>
                            @endrole
                            @role('statistics.index')
                            <a href="{{route('statistics.index',array('branch' => request()->get('branch')))}}"
                               class="btn btn-square btn-primary"
                               style="margin:10px;">
                                إحصائيات
                            </a>
                            @endrole
                            @role('EmployeAttendance.index')
                            <a href="{{route('EmployeAttendance.index',array('branch' => request()->get('branch')))}}"
                               class="btn btn-square btn-primary"
                               style="margin:10px;">
                                الحضور والانصراف
                            </a>
                            @endrole


                            @if(!Session::get('branch'))
                                @role('setting')
                                <a href="{{route('setting',array('branch' => request()->get('branch')))}}"
                                   class="btn btn-square btn-primary"
                                   style="margin:10px;">
                                    الاعدادات
                                </a>
                                @endrole
                            @endif
                            @role('awardDiscounts.index')
                            <a href="{{route('awardDiscounts.index',array('branch' => request()->get('branch')))}}"
                               class="btn btn-square btn-primary"
                               style="margin:10px;">
                                السلف والمكافأت
                            </a>
                            @endrole


                        </div>
                    </div>
                </div>
                @if(!Session::get('branch'))
                    <div class="card-header">
                        <div class="col-sm-12">
                            @role('nationalities.index')
                            <a href="{{route('nationalities.index',array('branch' => request()->get('branch')))}}"
                               class="btn btn-square btn-outline-light btn-sm txt-dark">الجنسية
                                ({{$nationalities->count()}})</a>
                            @endrole
                            @role('qualifications.index')
                            <a href="{{route('qualifications.index',array('branch' => request()->get('branch')))}}"
                               class="btn btn-square btn-outline-light btn-sm txt-dark">المؤهل
                                ({{$qualifications->count()}})</a>
                            @endrole
                            @role('professions.index')
                            <a href="{{route('professions.index',array('branch' => request()->get('branch')))}}"
                               class="btn btn-square btn-outline-light btn-sm txt-dark">المهنة
                                ({{$professions->count()}})</a>
                            @endrole
                            @role('jobTitles.index')
                            <a href="{{route('jobTitles.index',array('branch' => request()->get('branch')))}}"
                               class="btn btn-square btn-outline-light btn-sm txt-dark">المسمى
                                الوظيفي ({{$jobTitles->count()}})</a>
                            @endrole
                            @role('employeestatuses.index')

                            <a href="{{route('employeestatuses.index',array('branch' => request()->get('branch')))}}"
                               class="btn btn-square btn-outline-light btn-sm txt-dark">حالة
                                الموظف ( {{$employeeStatuses->count()}} )</a>
                            @endrole
                            @role('banks.index')
                            <a href="{{route('banks.index',array('branch' => request()->get('branch')))}}"
                               class="btn btn-square btn-outline-light btn-sm txt-dark">البنوك
                                ({{$banks->count()}})</a>
                            @endrole
                        </div>
                    </div>
                    <div class="card-header">
                        <div class="col-sm-12">
                            <a href="?" class="btn btn-square btn-outline-light btn-sm txt-dark">الكل
                                ({{App\Models\hr\Employee::count()}})</a>

                            @foreach($branches as $branch)
                                <a href="?branch={{$branch->id}}"
                                   class="btn btn-square btn-outline-light btn-sm txt-dark">{{$branch->name}}
                                    ({{App\Models\hr\Employee::where('branch_id',$branch->id)->count()}}
                                    )</a>
                            @endforeach
                        </div>
                    </div>


                @else
                    <div class="card-header">

                        <div class="col-sm-12">
                            <a href="#"
                               class="btn btn-square btn-outline-light btn-sm txt-dark">الجنسية
                                ({{$nationalities->count()}})</a>
                            <a href="#"
                               class="btn btn-square btn-outline-light btn-sm txt-dark">المؤهل
                                ({{$qualifications->count()}})</a>
                            <a href="#"
                               class="btn btn-square btn-outline-light btn-sm txt-dark">المهنة
                                ({{$professions->count()}})</a>
                            <a href="#"
                               class="btn btn-square btn-outline-light btn-sm txt-dark">المسمى
                                الوظيفي ({{$jobTitles->count()}})</a>
                            <a href="#"
                               class="btn btn-square btn-outline-light btn-sm txt-dark">حالة
                                الموظف ( {{$employeeStatuses->count()}} )</a>
                            <a href="#"
                               class="btn btn-square btn-outline-light btn-sm txt-dark">البنوك
                                ({{$banks->count()}})</a>
                        </div>

                    </div>

                    <div class="card-header">
                        <div class="col-sm-12">
                            <a href="?branch={{Session::get('branch')}}"
                               class="btn btn-square btn-outline-light btn-sm txt-dark">{{App\Models\hr\branch::where('id',Session::get('branch'))->first()->name}}
                                ({{App\Models\hr\Employee::where('branch_id',Session::get('branch'))->count()}}
                                )</a>
                        </div>
                    </div>

                @endif

                <div class="card-body">
                    <div class="dt-ext table-responsive">

                        <table class="table display data-table-responsive" id="export-button">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>الأسم</th>
                                <th>الرقم المدني</th>
                                @if(!request()->has('profession'))
                                    <th>المهنة</th>
                                @endif
                                @if(!request()->has('branch'))
                                    <th>الفرع</th>
                                @endif
                                @if(!request()->has('nationality'))
                                    <th>الجنسية</th>
                                @endif
                                <th>الهاتف</th>
                                <th class="not-export-col">عمليات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($employees as $employee)
                                <tr>
                                    <td>{{$loop->index + 1}}</td>
                                    <td>{{$employee->user_name}}</td>
                                    <td>{{$employee->cid}}</td>
                                    @if(!request()->has('profession'))
                                        <td>{{optional($employee->profession)->name}}</td>
                                    @endif
                                    @if(!request()->has('branch'))
                                        <td>{{optional($employee->branch)->name}}</td>
                                    @endif
                                    @if(!request()->has('nationality'))
                                        <td>{{optional($employee->nationality)->name}}</td>
                                    @endif
                                    <td>{{$employee->phone_one }}</td>
                                    <td>
                                        @if(auth()->user()->id==$employee->id ||  auth()->user()->type!='super')

                                            <a href="{{route('profile.edit',$employee->id,array('branch' => request()->get('branch')))}}"
                                               data-id="{{$employee->id}}"
                                               id="edit_id" class="me-2">
                                                <i data-feather="eye" width="15" height='15'></i>
                                            </a>
                                            <a href="{{route('employees.edit',$employee->id,array('branch' => request()->get('branch')))}}"
                                               data-id="{{$employee->id}}"
                                               id="edit_id" class="me-2">
                                                <i data-feather="edit" width="15" height='15'></i>
                                            </a>
                                            <a href="{{route('filemanager.index',$employee->id)}}"
                                               data-id="{{$employee->id}}"
                                               class="me-2">
                                                <i data-feather="folder" width="15" height='15'></i>
                                            </a>
                                            <a href="{{route('reports.index',$employee->id)}}"
                                               data-id="{{$employee->id}}"
                                               id="edit_id" class="me-2">
                                                <i data-feather="bar-chart" width="15" height='15'></i>
                                            </a>
                                            <button class="me-3 btn btn-primary" title="إرسال رسالة"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#sendMsg{{$employee->id}}" type="button"
                                                    width="15"
                                                    height='15'
                                                    style="border: none;"><i class="fa fa-inbox" width="15"
                                                                             height='15'></i></button>
                                        @else
                                            @role('profile.update')
                                            <a href="{{route('profile.edit',$employee->id,array('branch' => request()->get('branch')))}}"
                                               data-id="{{$employee->id}}"
                                               id="edit_id" class="me-2">
                                                <i data-feather="eye" width="15" height='15'></i>
                                            </a>
                                            @endrole

                                            @role('employees.update')
                                            <a href="{{route('employees.edit',$employee->id,array('branch' => request()->get('branch')))}}"
                                               data-id="{{$employee->id}}"
                                               id="edit_id" class="me-2">
                                                <i data-feather="edit" width="15" height='15'></i>
                                            </a>
                                            @endrole
                                            @role('employees.destroy')
                                            <form
                                                action="{{ route('employees.destroy',$employee->id,array('branch' => request()->get('branch'))) }}"
                                                method="POST"
                                                class="d-inline">
                                                @method('DELETE')
                                                @csrf
                                                <button
                                                    style="display: inline-block;border: none;background: none;color: #7366ff;"
                                                    type="submit" data-toggle="tooltip" data-placement="top"
                                                    title="{{ __('delete') }}"
                                                    onclick="return confirm('هل انت متاكد من هذا العنصر ؟');"
                                                    class="me-2"><i data-feather="trash-2" width="15"
                                                                    height='15'></i>
                                                </button>
                                            </form>
                                            @endrole
                                            @role('reports.index')
                                            <a href="{{route('reports.index',$employee->id)}}"
                                               data-id="{{$employee->id}}"
                                               id="edit_id" class="me-2">
                                                <i data-feather="bar-chart" width="15" height='15'></i>
                                            </a>
                                            @endrole
                                            @role('filemanager.index')
                                            <a href="{{route('filemanager.index',$employee->id)}}"
                                               data-id="{{$employee->id}}"
                                               class="me-2">
                                                <i data-feather="folder" width="15" height='15'></i>
                                            </a>
                                            @endrole



                                            @role('messages.store')
                                            <button class="me-3 btn btn-primary" title="إرسال رسالة"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#sendMsg{{$employee->id}}" type="button"
                                                    width="15"
                                                    height='15'
                                                    style="border: none;"><i class="fa fa-inbox" width="15"
                                                                             height='15'></i></button>
                                            @endrole

                                        @endif
                                        <div class="modal fade modal-bookmark" id="sendMsg{{$employee->id}}"
                                             tabindex="-1"
                                             role="dialog" aria-labelledby="sendMsgLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="sendMsgLabel">إرسال
                                                            رسالة </h5>
                                                        <button class="btn-close" type="button"
                                                                data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form class="form-bookmark needs-validation"
                                                              id="bookmark-form"
                                                              novalidate="" action="{{route('messages.store')}}"
                                                              method="post"
                                                              enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="row">
                                                                <div class="form-group mb-3">
                                                                    <div
                                                                        class="form-input position-relative d-flex">
                                                                        <label class="">ارسال الرسائل
                                                                            الى </label>
                                                                        <div class="form-check">
                                                                            <input type="radio" value="1"
                                                                                   style="height: auto"
                                                                                   name="type_message_send" {{ request()->get('type_message_send')==''  ? 'checked' : ''}}

                                                                            >
                                                                            <label>
                                                                                هذا الموظف فقط
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-check">
                                                                            <input type="radio" value="all"
                                                                                   style="height: auto"
                                                                                   id="check_all"
                                                                                   name="type_message_send" {{ request()->get('type_message_send')=='all'  ? 'checked' : ''}}>
                                                                            <label>
                                                                                جميع موظفين المهنة
                                                                            </label>
                                                                        </div>


                                                                    </div>

                                                                </div>
                                                                <input class="form-control"
                                                                       value="{{$employee->id}}"
                                                                       name="to" type="hidden">
                                                                <div class="message_send" style="display:none;">
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <label
                                                                                class="col-sm-6 col-form-label">
                                                                                اختر
                                                                                المهنة</label>
                                                                            <div class="col-sm-9">
                                                                                <select name='profession_id'
                                                                                        id="profession_id"
                                                                                        class="profession_id form-select"
                                                                                        aria-label="Default select example">
                                                                                    <option value=''>اختر المهنه
                                                                                    </option>
                                                                                    @foreach($professions as $profession)
                                                                                        @if($profession->count!=0)
                                                                                            <option
                                                                                                value='{{$profession->id}}'>{{$profession->name}}</option>
                                                                                        @endif
                                                                                    @endforeach
                                                                                </select>
                                                                                @error('profession_id')
                                                                                <div
                                                                                    style='color:red'>{{$message}}</div>
                                                                                @enderror
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <label
                                                                                class="col-sm-6 col-form-label">الموظف </label>
                                                                            <select name='employees_id'
                                                                                    id="employees_id"
                                                                                    class="employees_id   form-select"
                                                                                    aria-label="Default select example">
                                                                                <option value=''>اختر الموظف
                                                                                </option>

                                                                                @foreach($employees as $employe)
                                                                                    @if($employe->id != auth()->user()->id)
                                                                                        <option
                                                                                            value='{{$employe->id}}'>{{$employe->user_name}}</option>
                                                                                    @endif
                                                                                @endforeach
                                                                            </select>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="mb-3 mt-0 col-md-12">
                                                                    <label for="task-title">العنوان </label>
                                                                    <input class="form-control" id="title"
                                                                           type="text"
                                                                           value="{{old('title')}}" name="title"
                                                                           autocomplete="off">
                                                                    @error('title')
                                                                    <div style='color:red'>{{$message}}
                                                                    </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="mb-3 mt-0 col-md-12">
                                                                    <label for="task-title">الوصف </label>
                                                                    <textarea class="form-control" id="desc"
                                                                              name="desc"
                                                                              autocomplete="off">{{old('desc')}}</textarea>
                                                                    @error('desc')
                                                                    <div style='color:red'>{{$message}}
                                                                    </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <input id="index_var" type="hidden" value="6">
                                                            <button class="btn btn-secondary" id="Bookmark"
                                                                    type="submit">إرسال
                                                            </button>
                                                            <button class="btn btn-primary" type="button"
                                                                    data-bs-dismiss="modal">إلغاء
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <a href="{{route('EmployeeNotes.show',[$employee->id,$employee->branch_id])}}"
                                           data-id="{{$employee->id}}" title="إدخال ملاحظة "
                                           class="me-2">
                                            <i data-feather="folder" width="15" height='15'></i>
                                        </a> -->
                                        @role('EmployeeNotes.index')
                                        <a href="{{route('EmployeeNotes.index',array('emp_id'=> $employee->id ,'br_id' => $employee->branch_id))}}"
                                           data-id="{{$employee->id}}" title="إدخال ملاحظة "
                                           class="me-2">
                                            <i class="fa fa-file-text" aria-hidden="true"></i>


                                        </a>
                                        @endrole
                                        @role('awardDiscounts.index')
                                        <a href="{{route('awardDiscounts.index',array('employee'=> $employee->id))}}"
                                           data-id="16" title="مكافأت و سلف"
                                           class="me-2"> <i class="fa fa-list" aria-hidden="true"></i>
                                        </a>
                                        @endrole


                                    </td>
                                </tr>

                            @endforeach


                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>

@endsection
@section('scripts')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script type="text/javascript">
        $(window).on('load', function () {
            let var_id = "{{$errors->first('id')}}";
            let type = '{{request()->get('type_message_send')}}';
            @if($errors->has('id'))
            @if($errors->has('profession_id'))
            $("#check_all").prop("checked", true);
            $(".message_send").css("display", "block");
            @endif
            $('#sendMsg' + "{{$errors->first('id')}}").modal('show');

            @endif
        });
        $(document).ready(function () {
            $(".employees_id").empty();
            $(".employees_id").append("<option value=''>  اختار الموظف  </option>");
            let type = '{{request()->get('type_message_send')}}';
            if (type == 'all') {

                $(".message_send").css("display", "block");
                $("#check_all").prop("checked", true);


            } else {
                $(".message_send").css("display", "none");


            }


        });
        $('input[type=radio][name=type_message_send]').change(function () {

            if (this.value == 'all') {

                $(".message_send").css("display", "block");

            } else {
                $(".message_send").css("display", "none");


            }
        })


        $(".profession_id").change(function () {
            if (this.value) {
                $.get("{{ url('rating/getEmployees/') }}/" + this.value, function (data) {
                    $(".employees_id").empty();
                    $(".employees_id").append("<option value=''>  الكل  </option>");
                    let array = $.map(data, function (value, index) {
                        return value;
                    });
                    $.each(array, function (key, value) {
                        if (value.id != '{{auth()->user()->id}}')
                            $(".employees_id").append("<option value='" + value.id + "'>" + value.ar_name + "</option>"
                            )

                    });

                });
                swal({
                    title: " تنبيه!",
                    icon: "warning",
                    text: "عند اختار الكل سوف ترسل  لجميع الموظفين بهذه المهنة!",
                    button: "تم",
                });
            } else {
                swal({
                    title: " تنبيه!",
                    icon: "error",
                    text: "يجب اختيار المهنة لارسال الرسال المطلوبة!",
                    button: "اختار",
                });
                $(".employees_id").empty();
                $(".employees_id").append("<option value=''>  اختار الموظف  </option>");


            }


        });


    </script>
@endsection
