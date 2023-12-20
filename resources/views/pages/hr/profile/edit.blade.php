@extends('layouts.admin')
@section('title', ' ملف الموظف')

@section('content')
<div class="container-fluid">
    <div class="row">

        <section>
            <div class="container py-5">


                <div class="row">
                    <div class="col-lg-4">
                        <div class="card mb-4">
                            <div class="card-body text-center">
                                <a href="{{asset('storage/'.$user->user_img)}}">
                                    <img src="{{asset('storage/'.$user->user_img)}}" alt="avatar"
                                        class="rounded-circle img-fluid" style="width: 150px;" alt='no image'
                                        title="الصورة الشخصية">
                                </a>
                                <h5 class="my-3">{{$user->ar_name}}</h5>
                                <h6 class="my-3">{{$user->user_name}}</h6>
                                <p class="text-muted mb-1">
                                    {{App\Models\hr\JobTitle::where('id',$user->job_title_id)->first()->name}}
                                    ({{App\Models\hr\EmployeeStatus::where('id',$user->emp_state_id)->first()->name}})
                                </p>
                                <p class="text-muted mb-4">({{$user->home_address}} ) address</p>
                                <div class="d-flex justify-content-center mb-2">
                                    <button type="button" class="btn btn-primary" style="display:none">Follow</button>
                                    <button type="button" class="btn btn-outline-primary ms-1"
                                        style="display:none">Message</button>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-4 mb-lg-0">
                            <div class="card-body p-0">
                                <ul class="list-group list-group-flush rounded-3">
                                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                        الجنس
                                        <p class="mb-0"> {{$user->type=='female'?'مونث':'مذكر'}}</p>
                                    </li>

                                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                        الرقم المدني
                                        <p class="mb-0"> <a href="{{asset('storage/'.$user->cid_img)}}">
                                                <img src="{{asset('storage/'.$user->cid_img)}}" alt='no image'
                                                    alt="avatar" class=" img-fluid" title="رفع صورة الرقم المدني">
                                            </a>
                                            {{$user->cid}} </p>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                        تاريخ الميلاد
                                        <p class="mb-0">{{$user->birthDate}}</p>
                                    </li>
                                    @if($user->pass_img)
                                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                        رقم الجواز
                                        <p class="mb-0"> <a href="{{asset('storage/'.$user->pass_img)}}">
                                                <img src="{{asset('storage/'.$user->pass_img)}}" alt='no image'
                                                    alt="avatar" class=" img-fluid" title="رفع صورة جواز السفر">
                                            </a>
                                            {{$user->pass_number}}</p>

                                    </li>
                                    @endif
                                    @if($user->pass_date)
                                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                        تاريخ انتهاء الجواز
                                        <p class="mb-0">{{$user->pass_date}}</p>
                                    </li>
                                    @endif
                                   
                                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                        الجنسية
                                        <p class="mb-0">{{optional($user->nationality)->name}}</p>
                                    </li>
                                   
                                    @if($user->date_expiry)
                                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                        تاريخ انتهاء الأقامة
                                        <p class="mb-0">{{$user->date_expiry}}</p>
                                    </li>
                                    @endif
                                    @if($user->date_of_hiring)
                                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                        تاريخ التعيين
                                        <p class="mb-0">{{$user->date_of_hiring}}</p>
                                    </li>
                                    @endif
                                    @if($user->pass_date)
                                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                        تاريخ بداية العمل
                                        <p class="mb-0">{{$user->pass_date}}</p>

                                    </li>
                                    @endif
                                    @if($user->permit_img)
                                    
                                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                        صورة إذن العمل
                                        <p class="mb-0">
                                            <a href="{{asset('storage/'.$user->permit_img)}}">
                                                <img src="{{asset('storage/'.$user->permit_img)}}" alt='no image'
                                                    alt="avatar" class=" img-fluid" title="رفع صورة إذن العمل">
                                            </a>
                                        </p>
                                    </li>
                                    @endif
                                    @if($user->addr_emp)
                                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                        العنوان ببلده الأم
                                        <p class="mb-0">{{$user->addr_emp}}</p>

                                    </li>
                                    @endif
                                    @if($user->cid_address)
                                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                        الرقم المدني ببلده الأم
                                        <p class="mb-0">{{$user->cid_address}}</p>

                                    </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">اسم الموظف </p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0"> {{$user->en_name}}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">البريد الاليكتروني</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{$user->email}}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">أرقام الهاتف</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{$user->phone_one}}-{{$user->phone_two}}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">الفرع</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{$user->branch->name}}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">المهنة</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{$user->profession->name}}</p>
                                    </div>
                                </div>
                                <hr>
                                @if($user->salary)
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">الراتب</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{$user->salary}}</p>
                                    </div>
                                </div>
                                <hr>
                                @endif
                                @if($user->sal_per_work)
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">الراتب بإذن العمل</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{$user->sal_per_work}}</p>
                                    </div>
                                </div>
                                <hr>
                                @endif
                                @if($user->qualification)
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">المؤهل الدراسي</p>
                                    </div>
                                    <div class="col-sm-7">
                                        <p class="text-muted mb-0">{{optional($user->qualification)->name}}
                                        </p>
                                    </div>
                                    <div class="col-sm-2">
                                        <p class="text-muted mb-0">
                                       
                                        @if($user->qual_img)
                                            <a href="{{asset('storage/'.$user->qual_img)}}">
                                                <img src="{{asset('storage/'.$user->qual_img)}}" alt='no image'
                                                    alt="avatar" class=" img-fluid" style="width: 40px;"
                                                    title="رفع صورة المدنية">
                                            </a>
                                         @endif
                                        </p>
                                    </div>

                                </div>
                                <hr>
                                @endif
                                @if($user->work_time_to)
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0"> توقيت العمل(من : إلي)</p>
                                    </div>
                                    <div class="col-sm-7">
                                        <p class="text-muted mb-0">{{$user->work_time_to}} : {{$user->work_time_from}}
                                        </p>
                                    </div>


                                </div>

                                <hr>
                                @endif
                                @if($user->license[0]->receipt)
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">هل يوجد ايصال الأمانة </p>
                                    </div>
                                    <div class="col-sm-7">
                                        <p class="text-muted mb-0">{{$user->license[0]->receipt?'نعم':'لا'}}
                                        </p>
                                    </div>
                                    <div class="col-sm-2">
                                        <p class="text-muted mb-0">
                                            @if($user->license[0]->image)
                                            <a href="{{asset('storage/'.$user->license[0]->image)}}">
                                                <img src="{{asset('storage/'.$user->license[0]->image)}}" alt='no image'
                                                    alt="avatar" class=" img-fluid" style="width: 40px;"
                                                    title="رفع صورة ايصال الامانة">
                                            </a>
                                            @endif
                                        </p>
                                    </div>
                                </div>
                                <hr>
                                @endif
                                @if($user->license[1]->receipt)
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">هل يوجد ليسن كويتي </p>
                                    </div>
                                    <div class="col-sm-7">
                                        <p class="text-muted mb-0">
                                            {{$user->license[0]->receipt?'نعم':'لا'}}
                                        </p>
                                    </div>
                                    <div class="col-sm-2">
                                        <p class="text-muted mb-0">
                                            @if($user->license[1]->image)
                                            <a href="{{asset('storage/'.$user->license[1]->image)}}">
                                                <img src="{{asset('storage/'.$user->license[1]->image)}}" alt='no image'
                                                    alt="avatar" class=" img-fluid" style="width: 40px;"
                                                    title="رفع صورة الليسن">
                                            </a>
                                            @endif

                                        </p>
                                    </div>
                                </div>
                                <hr>
                                @endif
                                @if($user->license[2]->receipt)
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">هل يوجد ليسن مصري</p>
                                    </div>
                                    <div class="col-sm-7">
                                        <p class="text-muted mb-0">
                                            {{$user->license[2]->receipt?'نعم':'لا'}}
                                        </p>
                                    </div>
                                    <div class="col-sm-2">
                                        <p class="text-muted mb-0">
                                            @if($user->license[2]->image)
                                            <a href="{{asset('storage/'.$user->license[2]->image)}}">
                                                <img src="{{asset('storage/'.$user->license[2]->image)}}" alt='no image'
                                                    alt="avatar" class=" img-fluid" style="width: 40px;"
                                                    title="رفع صورة الليسن">
                                            </a>
                                            @endif

                                        </p>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                          
                            @if(!(array_unique($user->account_name) === array(null)))
                            <div class="col-md-6">
                                <div class="card mb-4 mb-md-0">
                                    <div class="card-body">
                                        <p class="mb-4"> الحسابات البنكية
                                        </p>
                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>الاسم</th>
                                                        <th>رقم الحساب</th>
                                                        <th>الابيان</th>

                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    @foreach($user->account_name as $key=>$item)
                                                    @if(isset($item))
                                                    <tr>
                                                        <td>{{optional(App\Models\hr\Bank::find($item))->name}}</td>
                                                        <td>{{$user->account_number[$key]}}</td>
                                                        <td>{{$user->account_details[$key]}}</td>
                                                    </tr>
                                                    @endif
                                                    @endforeach


                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif

                            @if(!(is_null($user->closest_person[0]->name)&&is_null($user->closest_person[1]->name)))
                                <div class="col-md-6">
                                    <div class="card mb-4 mb-md-0">
                                        <div class="card-body">
                                            <p class="mb-4">
                                            </p>
                                            <div class="table-responsive">
                                                <table class="table table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">#</th>
                                                            <th scope="col">اسم اقرب شخص</th>
                                                            <th scope="col"> العلاقة </th>
                                                            <th scope="col">الهاتف </th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <th scope="row">1</th>
                                                            <td>{{$user->closest_person[0]->name}}</td>
                                                            <td>{{$user->closest_person[0]->relationship}}</td>
                                                            <td>{{$user->closest_person[0]->phone}}</td>

                                                        </tr>
                                                        <tr>
                                                            <th scope="row">2</th>
                                                            <td>{{$user->closest_person[1]->name}}</td>
                                                            <td>{{$user->closest_person[1]->relationship}}</td>
                                                            <td>{{$user->closest_person[1]->phone}}</td>

                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection