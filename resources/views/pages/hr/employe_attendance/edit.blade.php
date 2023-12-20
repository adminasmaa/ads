@extends('layouts.admin')
@section('title', 'تعديل الحضور والانصراف')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <form class="mega-vertical" action="{{route('EmployeAttendance.update',$attendance_employe)}}" method="POST"
                  enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="col-sm-12 box-col-12 p-20">
                    <div class="card height-equal">
                        <div class="card-header">
                            <h5>إضافة وقت جديدة </h5>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="media-body">
                                    <label class="col-sm-12 col-form-label">الموظف </label>
                                    <select name='employees_id' class="form-select" aria-label="Default select example">
                                        @foreach($Employees as $Employe)
                                            <option value='{{$Employe->id}}' >{{ $attendance_employe->employe_attendance->id ? $attendance_employe->employe_attendance->user_name: $Employe->user_name }}</option>
                                        @endforeach
                                    </select>

                                    @error('employees_id')
                                    <div style='color:red'>{{$message}}</div>
                                    @enderror
                                </div>

                                <div class="media-body">

                                    <label class="col-sm-12 col-form-label"> الوصف </label>
                                    <input type="text" name='description'
                                              value="{{$attendance_employe->description}}" class="form-control"
                                              placeholder=""/>
                                    </input>
                                    {{-- @error('name')
                                     <div style='color:red'>{{$message}}</div>
                                     @enderror--}}
                                </div>
                                <div class="media-body">

                                    <label class="col-sm-12 col-form-label"> رفع صورة</label>
                                    <input type="file" name='attendance_image' class="form-control" accept="image/*"
                                           placeholder="">
                                    <div class="col-sm-3"><img style="width:70px;height:70px;" src="{{asset('storage/'.$attendance_employe->attendance_image)}}"/></div>
                                </div>



                            </div>
                        </div>

                        <div class="card-footer text-center">
                            <button  class="btn btn-primary m-r-15" name="check_in_time" id="date_time_button_in" onclick="document.getElementById('date_time_button_in').value ='{{ date('H:i:s')}}'" value="{{$attendance_employe->check_in_time}}" type="submit">حضور</button>
                            <button class="btn btn-light" name="check_out_time" id="date_time_button_out" value="{{$attendance_employe->check_out_time}}" onclick="document.getElementById('date_time_button_out').value ='{{ date('H:i:s')}}'"  type="submit">انصراف</button>
                        </div>

                    </div>
                </div>

            </form>
        </div>
    </div>


@endsection


