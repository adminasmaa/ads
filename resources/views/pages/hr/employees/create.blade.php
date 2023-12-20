@extends('layouts.admin')
@section('title', 'الموظفين')
@section('content')
    <div class="container-fluid" style="background: #f4f4f4;">
        <div class="row">
            <form class="mega-vertical" action="{{route('employees.store')}}" method="post"
                  enctype="multipart/form-data">
                @csrf
                <div class="col-sm-12 col-xxl-6 box-col-12 p-20">
                    <div class="card height-equal">
                        <div class="card-header">
                            <h5>معلومات أولية</h5>
                        </div>
                        <div class="card-body">

                            <div class="row">

                                <div class="col-sm-6">

                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label"> الأسم بالعربي</label>
                                            <div class="col-sm-9">
                                                <input type="text" name='ar_name'
                                                       value="{{old('ar_name')}}" class="form-control"
                                                       placeholder="">
                                                @error('ar_name')
                                                <div style='color:red'>{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-sm-6">
                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label"> الأسم بالانجليزية</label>
                                            <div class="col-sm-9">
                                                <input type="text" name='en_name' class="form-control"
                                                       value="{{old('en_name')}}" placeholder="">
                                                @error('en_name')
                                                <div style='color:red'>{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">

                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label"> اسم المستخدم</label>
                                            <div class="col-sm-9">
                                                <input type="text" name='user_name' class="form-control"
                                                       value="{{old('user_name')}}" placeholder="">
                                                @error('user_name')
                                                <div style='color:red'>{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">

                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label"> البريد الاليكتروني</label>
                                            <div class="col-sm-9">
                                                <input type="email" name='email' class="form-control"
                                                       value="{{old('email')}}" placeholder="">
                                                @error('email')
                                                <div style='color:red'>{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">

                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label"> الرقم السري</label>
                                            <div class="col-sm-9">
                                                <input type="password" name='password' class="form-control"
                                                       value="{{old('password')}}" placeholder="">
                                                @error('password')
                                                <div style='color:red'>{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">

                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label"> تأكيد الرقم السري</label>
                                            <div class="col-sm-9">
                                                <input type="password" name='password_confirmation' class="form-control"
                                                       value="{{old('password_confirmation')}}" placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label"> المؤهل الدراسي</label>
                                            <div class="col-sm-9">
                                                <select name='qual_id' class="form-select"
                                                        aria-label="Default select example">
                                                    <option value="{{old('qual_id')}}">اختر الموهل</option>
                                                    @foreach($qualifications as $qualification)
                                                        <option
                                                            value='{{$qualification->id}}'>{{$qualification->name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('qual_id')
                                                <div style='color:red'>{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label">رفع صورة المؤهل</label>
                                            <div class="col-sm-9">
                                                <input type="file" name='qual_img' class="form-control"
                                                       placeholder="">
                                                @error('qual_img')
                                                <div style='color:red'>{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label">نوع الحساب</label>
                                            <select name='type_role' style="max-width:300px" class="form-select"
                                                    aria-label="Default select example">
                                                <option value=''{{old('type_role')}}>اختر</option>
                                                <option value="super">مشرف</option>
                                                <option value="main">رئيسى</option>
                                                <option value="branch">فرعى</option>

                                            </select>
                                            @error('type_role')
                                            <div style='color:red'>{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label">رفع صورة الشخصيه</label>
                                            <div class="col-sm-12">
                                                <input type="file" name='user_img' accept="image/*" class="form-control"
                                                       placeholder="">
                                                @error('user_img')
                                                <div style='color:red'>{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>


                        </div>

                    </div>
                    <div class="card height-equal">
                        <div class="card-header">
                            <h5> بيانات متنوعه</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="form-label" for="exampleFormControlSelect9">الجنسية </label>
                                            <select name='nation_id' class="form-select" style="max-width:300px"
                                                    aria-label="Default select example">
                                                <option value='{{old('nation_id')}}'>اختر الجنسية</option>
                                                @foreach($nationalities as $nationality)
                                                    <option value='{{$nationality->id}}'>{{$nationality->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('nation_id')
                                            <div style='color:red'>{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="form-label col-sm-12"
                                                   for="exampleFormControlSelect9">البنك </label>
                                            <select name='bank_id' class="form-select" style="max-width:300px"
                                                    aria-label="Default select example">
                                                <option value='{{old('bank_id')}}'>اختر البنك</option>
                                                @foreach($banks as $bank)
                                                    <option value='{{$bank->id}}'>{{$bank->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('bank_id')
                                            <div style='color:red'>{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>


                                <div class="col-sm-6">
                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label">الجنس</label>
                                            <select name='type' style="max-width:300px" class="form-select"
                                                    aria-label="Default select example">
                                                <option value='{{old('type')}}'>اختر الجنس</option>
                                                <option value="male">ذكر</option>
                                                <option value="female">انثى</option>
                                            </select>
                                            @error('type')
                                            <div style='color:red'>{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>


                                <div class="col-sm-6">
                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label"> اختر حالة الموظف</label>
                                            <div class="col-sm-12">
                                                <select name='emp_state_id' style="max-width:300px" class="form-select"
                                                        aria-label="Default select example">
                                                    <option value='{{old('emp_state_id')}}'>اختر الحاله</option>
                                                    @foreach($employeeStatuses as $employeeStatus)
                                                        <option
                                                            value='{{$employeeStatus->id}}'>{{$employeeStatus->name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('emp_state_id')
                                                <div style='color:red'>{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label"> سبب اختيار الحالة</label>
                                            <div class="col-sm-12">
                                                    <textarea class="form-control" name='status_note'
                                                              id="exampleFormControlTextarea4"
                                                              rows="3">{{old('status_note')}}</textarea>
                                                @error('status_note')
                                                <div style='color:red'>{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label">السكن</label>
                                            <div class="col-sm-9">
                                                <label class="d-block" for="edo-ani">
                                                    <select name='Living' class="form-select"
                                                            aria-label="Default select example">
                                                        <option value='{{old('Living')}}'>اختر السكن</option>
                                                        <option value="employees">سكن عام</option>
                                                        <option value="external_employees">سكن خاص</option>
                                                    </select>
                                                    @error('Living')
                                                    <div style='color:red'>{{$message}}</div>
                                                    @enderror
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label"> عنوان السكن </label>
                                            <div class="col-sm-9">
                                                <input type="text" name='home_address' class="form-control"
                                                       value="{{old('home_address')}}" placeholder="">
                                                @error('home_address')
                                                <div style='color:red'>{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label"> توقيت العمل من </label>

                                            <div class="col-sm-9">
                                                <input type="time" name='work_time_from' class="form-control"
                                                       value="{{old('work_time_from')}}"
                                                       placeholder="">
                                                @error('work_time_from')
                                                <div style='color:red'>{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label"> توقيت العمل الى</label>
                                            <div class="col-sm-9">
                                                <input type="time" name='work_time_to' class="form-control"
                                                       value="{{old('work_time_to')}}"
                                                       placeholder="">
                                                @error('work_time_to')
                                                <div style='color:red'>{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label">هل تم استلام يونيفورم </label>
                                            <div class="col-sm-12">
                                                <input type="checkbox" name='uniform' id="chk-ani"
                                                       {{old('uniform')?'checked':''}}
                                                       class="checkbox_animated">
                                                @error('uniform')
                                                <div style='color:red'>{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>

                </div>
                <div class="col-sm-12 col-xxl-6 box-col-12 p-20">

                    <div class="card height-equal">
                        <div class="card-header">
                            <h5>معلومات التواصل</h5>
                        </div>
                        <div class="card-body">

                            <div class="row">

                                <div class="col-sm-4">
                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label"> الرقم المدني</label>
                                            <div class="col-sm-9">
                                                <input type="number" name='cid' class="form-control"
                                                       value="{{old('cid')}}" placeholder="">
                                                @error('cid')
                                                <div style='color:red'>{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label"> تاريخ الميلاد</label>
                                            <div class="col-sm-9">
                                                <input type="date" name='birthDate' class="form-control"
                                                       value="{{old('birthDate')}}" placeholder="">
                                                @error('birthDate')
                                                <div style='color:red'>{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>


                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label">رفع صورة المدنيه</label>
                                            <div class="col-sm-9">
                                                <input type="file" name='cid_img' accept="image/*" class="form-control"
                                                       placeholder="">
                                                @error('cid_img')
                                                <div style='color:red'>{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label"> رقم الجواز</label>
                                            <div class="col-sm-9">
                                                <input type="text" name='pass_number' class="form-control"
                                                       value="{{old('pass_number')}}" placeholder="">
                                                @error('pass_number')
                                                <div style='color:red'>{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label"> تاريخ انتهاء الجواز</label>
                                            <div class="col-sm-9">
                                                <input type="date" name='pass_date' class="form-control"
                                                       value="{{old('pass_date')}}" placeholder="">
                                                @error('pass_date')
                                                <div style='color:red'>{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>


                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label">رفع صورة الجواز</label>
                                            <div class="col-sm-9">
                                                <input type="file" name='pass_img' accept="image/*" class="form-control"
                                                       placeholder="">
                                                @error('pass_img')
                                                <div style='color:red'>{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>


                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label"> المسمي الوظيفي</label>
                                            <div class="col-sm-9">
                                                <select name='job_title_id' class="form-select"
                                                        aria-label="Default select example">
                                                    <option value='{{old('job_title_id')}}'>اختر المسمى الوظيفى</option>
                                                    @foreach($jobTitles as $jobTitle)
                                                        <option value='{{$jobTitle->id}}'>{{$jobTitle->name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('job_title_id')
                                                <div style='color:red'>{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label"> تاريخ انتهاء الاقامة</label>
                                            <div class="col-sm-9">
                                                <input type="date" name='date_expiry' class="form-control"
                                                       value="{{old('date_expiry')}}" placeholder="">
                                                @error('date_expiry')
                                                <div style='color:red'>{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label">رفع صورة اذن العمل</label>
                                            <div class="col-sm-9">
                                                <input type="file" name='permit_img' accept="image/*"
                                                       class="form-control"
                                                       placeholder="">
                                                @error('permit_img')
                                                <div style='color:red'>{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label"> تاريخ بداية العمل</label>
                                            <div class="col-sm-9">
                                                <input type="date" name='start_date' class="form-control"
                                                       value="{{old('start_date')}}" placeholder="">
                                                @error('start_date')
                                                <div style='color:red'>{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label"> تاريخ التعيين</label>
                                            <div class="col-sm-9">
                                                <input type="date" name='date_of_hiring' class="form-control"
                                                       value="{{old('date_of_hiring')}}" placeholder="">
                                                @error('date_of_hiring')
                                                <div style='color:red'>{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    @if(!Session::get('branch'))
                                        <div class="media-body">
                                            <div class="mb-3 row">
                                                <label class="col-sm-12 col-form-label"> اختر الفرع</label>
                                                <div class="col-sm-9">
                                                    <select name='branch_id' class="form-select"
                                                            aria-label="Default select example">
                                                        <option value='{{old('branch_id')}}'>اختر الفرع</option>
                                                        @foreach($branches as $branch)
                                                            <option
                                                                value='{{$branch->id}}' {{request()->has('branch')&&request()->branch==$branch->id ?"selected":""}}>{{$branch->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('branch_id')
                                                    <div style='color:red'>{{$message}}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>


                                    @endif
                                </div>

                                <div class="col-sm-4">
                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label"> اختر المهنة</label>
                                            <div class="col-sm-9">
                                                <select name='profession_id' class="form-select"
                                                        aria-label="Default select example">
                                                    <option value='{{old('profession_id')}}'>اختر المهنه</option>
                                                    @foreach($professions as $profession)
                                                        <option
                                                            value='{{$profession->id}}'>{{$profession->name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('profession_id')
                                                <div style='color:red'>{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-sm-4">
                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label"> الراتب </label>
                                            <div class="col-sm-9">
                                                <input type="number" name='salary' step="any" class="form-control"
                                                       value="{{old('salary')}}" placeholder="">
                                                @error('salary')
                                                <div style='color:red'>{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label"> الراتب بأذن العمل </label>
                                            <div class="col-sm-9">
                                                <input type="number" name='sal_per_work' step="any"
                                                       class="form-control" value="{{old('sal_per_work')}}"
                                                       placeholder="">
                                                @error('sal_per_work')
                                                <div style='color:red'>{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>


                        </div>

                    </div>
                    <div class="card height-equal">
                        <div class="card-header">
                            <h5> أخري</h5>
                        </div>
                        <div class="card-body">

                            <div class="row">


                            </div>


                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label">هل يوجد ايصال أمانة</label>
                                            <input type="hidden" value="security" name="types[]"/>
                                            <div class="col-sm-12">
                                                <input type="checkbox" name='receipt[0]' class="security_receipt"
                                                       id="chk-ani"
                                                       class="checkbox_animated">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4 security">
                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label">تاريخ الايصال </label>
                                            <div class="col-sm-9">
                                                <input type="date" name='date[]'
                                                       class="form-control"
                                                       placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4 security">
                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label"> رفع صورة الايصال </label>
                                            <div class="col-sm-9">
                                                <input type="file" name='receipt_image[]'
                                                       class="form-control" placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label">هل يوجد ليسن كويتي</label>
                                            <input type="hidden" value="Kuwait" name="types[]"/>
                                            <div class="col-sm-12">
                                                <input type="checkbox" name='receipt[1]' class="Kuwait_license"
                                                       id="chk-ani"
                                                       class="checkbox_animated">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4 Kuwait">
                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label">تاريخ انتهاء الليسن </label>
                                            <div class="col-sm-9">
                                                <input type="date" name='date[]'
                                                       class="form-control"
                                                       placeholder="">

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-4 Kuwait">
                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label"> رفع صورة الليسن </label>
                                            <div class="col-sm-9">
                                                <input type="file" name='receipt_image[]'
                                                       class="form-control "
                                                       placeholder="">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label">هل يوجد ليسن مصري</label>
                                            <input type="hidden" value="egypt" name="types[]"/>
                                            <div class="col-sm-12">
                                                <input type="checkbox" name='receipt[2]' class="egypt" id="chk-ani"
                                                       class="checkbox_animated">

                                            </div>

                                        </div>
                                    </div>
                                </div>


                                <div class="col-sm-4 egypt_license">
                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label">تاريخ انتهاء الليسن </label>
                                            <div class="col-sm-9">
                                                <input type="date" name='date[]'
                                                       class="form-control"
                                                       placeholder="">

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-4 egypt_license">
                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label"> رفع صورة الليسن </label>
                                            <div class="col-sm-9">
                                                <input type="file" name='receipt_image[]'
                                                       class="form-control"
                                                       placeholder="">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label">هل يوجد حساب بنكي</label>
                                            <div class="col-sm-12">
                                                <input type="checkbox" name='bank_account' id="chk-ani"
                                                       {{old('bank_account')?'checked':''}}
                                                       class="checkbox_animated">
                                                @error('bank_account')
                                                <div style='color:red'>{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row bank_account">
                                <div class="col-sm-3">
                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label"> أسم البنك 1</label>
                                            <div class="col-sm-9">
                                                <!-- <input type="text" name='account_name[]' value="{{old('account_name[]')}}"
                                                       class="form-control" placeholder=""> -->
                                                <select name='account_name[]' class="form-select"
                                                        style="max-width:300px" aria-label="Default select example">
                                                    <option value=''>اختر البنك</option>
                                                    @foreach($banks as $bank)
                                                        <option
                                                            value='{{$bank->id}}' {{old('account_name.0') == $bank->id?'selected':''}}>{{$bank->name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('account_name.0')
                                                <div style='color:red'>{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label"> رقم الحساب البنكي 1</label>
                                            <div class="col-sm-9">
                                                <input type="number" name='account_number[]'
                                                       value="{{old('account_number.0')}}" class="form-control"
                                                       placeholder="">
                                                @error('account_number.0')
                                                <div style='color:red'>{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label"> الابيان 1</label>
                                            <div class="col-sm-9">
                                                <input type="text" name='account_details[]'
                                                       value="{{old('account_details.0')}}" class="form-control"
                                                       placeholder="">
                                                @error('account_details.0')
                                                <div style='color:red'>{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3" style="margin-top: 40px;">
                                    <input type="radio" name='banks' id="bank" name="fav_language" value="1">&nbsp;&nbsp;حساب
                                    الرااتب
                                </div>
                                <div class="col-sm-3">
                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label"> أسم البنك 2</label>
                                            <div class="col-sm-9">
                                                <select name='account_name[]' class="form-select"
                                                        style="max-width:300px" aria-label="Default select example">
                                                    <option value=''>اختر البنك</option>
                                                    @foreach($banks as $bank)
                                                        <option
                                                            value='{{$bank->id}}' {{old('account_name.1') == $bank->id?'selected':''}}>{{$bank->name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('account_name.1')
                                                <div style='color:red'>{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-sm-3">
                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label"> رقم الحساب البنكي 2</label>
                                            <div class="col-sm-9">
                                                <input type="number" name='account_number[]'
                                                       value="{{old('account_number.1')}}" class="form-control"
                                                       placeholder="">
                                                @error('account_number.1')
                                                <div style='color:red'>{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label">الابيان 2</label>
                                            <div class="col-sm-9">
                                                <input type="text" name='account_details[]'
                                                       value="{{old('account_details.1')}}" class="form-control"
                                                       placeholder="">
                                                @error('account_details.1')
                                                <div style='color:red'>{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3" style="margin-top: 40px;">
                                    <input type="radio" name='banks' id="bank" name="fav_language" value="1"> &nbsp;&nbsp;حساب
                                    الرااتب
                                </div>


                            </div>


                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label"> الهاتف 1 </label>
                                            <div class="col-sm-9">
                                                <input type="number" name='phone_one' value="{{old('phone_one')}}"
                                                       class="form-control" placeholder="">
                                                @error('phone_one')
                                                <div style='color:red'>{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label"> الهاتف 2</label>
                                            <div class="col-sm-9">
                                                <input type="text" name='phone_two' value="{{old('phone_two')}}"
                                                       class="form-control" placeholder="">
                                                @error('phone_two')
                                                <div style='color:red'>{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label"> عنوان الموظف ببلده الام </label>
                                            <div class="col-sm-9">
                                                <input type="text" name='addr_emp'
                                                       value="{{old('addr_emp')}}" class="form-control"
                                                       placeholder="">
                                                @error('addr_emp')
                                                <div style='color:red'>{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label">رقم الموظف المدني ببلده الام</label>
                                            <div class="col-sm-9">
                                                <input type="number" name='cid_address' value="{{old('cid_address')}}"
                                                       class="form-control" placeholder="">
                                                @error('cid_address')
                                                <div style='color:red'>{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label"> أسم اقرب شخص 1 </label>
                                            <div class="col-sm-9">
                                                <input type="text" name='names[]'
                                                       value="{{old('names[0]')}}" class="form-control"
                                                       placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label"> العلاقة </label>
                                            <div class="col-sm-9">
                                                <input type="text" name='relationships[]'
                                                       value="{{old('relationships[0]')}}"
                                                       class="form-control" placeholder="">

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label"> رقم التليفون 1 </label>
                                            <div class="col-sm-9">
                                                <input type="text" name='phones[]'
                                                       value="{{old('phones.0')}}" class="form-control"
                                                       placeholder="">
                                                @error('phones.0')
                                                <div style='color:red'>{{$message}}</div>
                                                @enderror

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label"> أسم اقرب شخص 2 </label>
                                            <div class="col-sm-9">
                                                <input type="text" name='names[]'
                                                       value="{{old('names[1]')}}" class="form-control"
                                                       placeholder="">

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label"> العلاقة </label>
                                            <div class="col-sm-9">
                                                <input type="text" name='relationships[]'
                                                       value="{{old('relationships[1]')}}"
                                                       class="form-control" placeholder="">

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="media-body">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label"> رقم التليفون 2 </label>
                                            <div class="col-sm-9">
                                                <input type="text" name='phones[]'
                                                       value="{{old('phones.1')}}" class="form-control"
                                                       placeholder="">
                                                @error('phones.1')
                                                <div style='color:red'>{{$message}}</div>
                                                @enderror

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>
                </div>

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-footer text-center">
                            <button class="btn btn-primary m-r-15" type="submit">حفظ</button>
                            <a href="{{url('employees')}}">
                                <button type="button" class="btn btn-light">إلغاء</button>
                            </a>

                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
@section('scripts')
    <script>
        $(document).ready(function () {
            if ($('.security_receipt').is(':checked')) {
                $('.security').show();
            } else {
                $('.security').hide();

            }

            if ($('.Kuwait_license').is(':checked')) {

                $('.Kuwait').show();
            } else {
                $('.Kuwait').hide();

            }

            if ($('.egypt').is(':checked')) {
                $('.egypt_license').show();
            } else {
                $('.egypt_license').hide();

            }

            if ($('[name="bank_account"]').is(':checked')) {
                $('.bank_account').show();
            } else {
                $('.bank_account').hide();

            }

            $('.security_receipt').change(function () {
                if ($(this).is(':checked')) {
                    $('.security').show();
                } else {
                    $('.security').hide();

                }

            });
            $('.Kuwait_license').change(function () {
                if ($(this).is(':checked')) {
                    $('.Kuwait').show();
                } else {
                    $('.Kuwait').hide();

                }

            });
            $('.egypt').change(function () {
                if ($(this).is(':checked')) {
                    $('.egypt_license').show();
                } else {
                    $('.egypt_license').hide();

                }

            });
            $('[name="bank_account"]').change(function () {
                if ($(this).is(':checked')) {
                    $('.bank_account').show();
                } else {
                    $('.bank_account').hide();

                }

            });

        });


    </script>
@endsection
