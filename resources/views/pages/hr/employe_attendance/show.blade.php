@extends('layouts.admin')
@section('title', 'وقت الحضور والانصراف')
@section('content')
    @section('scripts')


    @endsection

    <div class="container-fluid">
        <div class="row">

            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">

                        <h5> حضور وانصراف :{{App\Helpers\Moving::employe_attendance($id)->user_name}} </h5>
                        <form class="mega-vertical" action="{{route('ShowEmployeAttendance',$id)}}" method="get">
                            <div class="col-sm-12 d-flex">
                                <div style="margin: auto">

                                    <select name='monthe' class="form-select" onchange="this.form.submit()"
                                            aria-label="Default select example">
                                        <option
                                            value="{{request()->has('monthe')? request()->get('monthe'):  $month_name  }}">{{request()->has('monthe')? request()->get('monthe'): $month_name }}</option>
                                        <option value='يناير-01'>يناير</option>
                                        <option value='فبراير-02'>فبراير</option>
                                        <option value='مارس-03'>مارس</option>
                                        <option value='ابريل-04'>ابريل</option>
                                        <option value='مايو-05'>مايو</option>
                                        <option value='يونيو-06'>يونيو</option>
                                        <option value='يوليو-07'>يوليو</option>
                                        <option value='اغسطس-08'>اغسطس</option>
                                        <option value='سبتمبر-09'>سبتمبر</option>
                                        <option value='اكتوبر-10'>اكتوبر</option>
                                        <option value='نوفمبر-11'>نوفمبر</option>
                                        <option value='ديسمبر-12'>ديسمبر</option>
                                    </select>
                                    <div>


                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="card-body">
                        <div class="dt-ext table-responsive">
                            <table class="table display data-table-responsive" id="export-button ">
                                <thead>
                                <tr>
                                    <th>وقت الحضور</th>
                                    <th>وقت الانصراف</th>
                                    <th>الموظف</th>
                                    <th class="not-export-col">التفاصيل</th>
                                </tr>
                                </thead>
                                <tbody>


                                @foreach($employe_attendances as $item)
                                    <tr>
                                        <td>{{$item->check_in_time}}</td>
                                        <td>{{$item->check_out_time}}</td>
                                        <td>{{auth()->user()->user_name}}</td>
                                        <td><a class="me-2" data-bs-toggle="modal"
                                               href="{{('/#showdetailsModal'.$item->id)}}"><i
                                                    data-toggle="modal"
                                                    data-target="#showdetailsModal{{$item->id}}"
                                                    data-feather="eye"></i></a>
                                        </td>
                                        <div class="modal fade modal-bookmark"
                                             id="showdetailsModal{{$item->id}}"
                                             tabindex="-1"
                                             role="dialog"
                                             aria-labelledby="showdetailsModalLabel"
                                             aria-hidden="true">
                                            <div class="modal-dialog modal-lg"
                                                 role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title"
                                                            id="showdetailsModalLabel">
                                                            تفاصيل الانصراف والحضور
                                                        </h5>
                                                        <button class="btn-close"
                                                                type="button"
                                                                data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">


                                                        <div class="row">
                                                            @if($item->description)
                                                                <div
                                                                    class="mb-3 mt-0 col-md-6">
                                                                    <label
                                                                        for="task-title">
                                                                        الوصف
                                                                    </label>
                                                                    <textarea
                                                                        class="form-control" rows="6"
                                                                        name="description"
                                                                        id="description"
                                                                        type="text"
                                                                        readonly
                                                                        style="background-color: white"
                                                                        autocomplete="off">
                                                                        {{$item->description }}

                                                            </textarea>

                                                                </div>
                                                            @endif
                                                            @if(!empty($item->attendance_image))
                                                                <div class="mb-3 mt-0 col-md-6">
                                                                    <label for="task-title">الصورة </label>

                                                                    <img class="form-control"
                                                                         style="width: 50%; height:111px; padding:0px; border: none"
                                                                         src="{{asset('storage/'.$item->attendance_image)}}"
                                                                         alt="">


                                                                </div>
                                                            @endif
                                                            @if($item->time)
                                                                <div class="mb-3 mt-0 col-md-6">
                                                                    <label> مدة الحضور</label>
                                                                    <input type="text" name=""
                                                                           value="{{$item->time}}"
                                                                           readonly
                                                                           style="background-color: white"
                                                                           class="form-control">
                                                                </div>
                                                            @else
                                                                <div class="mb-3 mt-0 col-md-6">
                                                                    <label> وقت الحضور</label>
                                                                    <input type="text" name=""
                                                                           value="{{$item->check_in_time}}"
                                                                           readonly
                                                                           style="background-color: white"
                                                                           class="form-control">
                                                                </div>
                                                            @endif

                                                        </div>


                                                    </div>


                                                </div>
                                            </div>
                                        </div>


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

@endsection

