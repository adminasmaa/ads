@extends('layouts.admin')
@section('title', 'اضافة وقت حضور وانصراف')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <form class="mega-vertical" action="{{route('EmployeAttendance.store')}}" method="post"
                  enctype="multipart/form-data">
                @csrf
                <div class="col-sm-12 box-col-12 p-20">
                    <div class="card height-equal">
                        <div class="card-header">
                            <h5>إضافة وقت جديد </h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                    <div class="media-body">
                                            <label class="col-sm-12 col-form-label">الموظف </label>
                                            <select name='employees_id' class="form-select" aria-label="Default select example">
                                                        <option value=''>اختر الموظف</option>
                                                    @foreach($Employees as $Employe)
                                                        <option value='{{$Employe->id}}' >{{$Employe->user_name}}</option>
                                                    @endforeach
                                            </select>
                                                @error('employees_id')
                                                <div style='color:red'>{{$message}}</div>
                                                @enderror
                                    </div>

                                <div class="media-body">
                                    <label class="col-sm-12 col-form-label"> الوصف </label>
                                    <textarea type="text" name='description'
                                           value="{{old('description')}}" class="form-control"
                                           placeholder="">
                                    </textarea>

                                </div>
                                <div class="media-body">
                                            <label class="col-sm-12 col-form-label"> رفع صورة</label>
                                            <input type="file" name='attendance_image' capture  accept="image/*" class="form-control"
                                                       placeholder="">

                                </div>



                            </div>
                        </div>

                        <div class="card-footer text-center">
                            <button  class="btn btn-primary m-r-15" name="check_in_time" id="date_time_button_in" onclick="document.getElementById('date_time_button_in').value ='{{ date('H:i:s')}}'" value="" type="submit">حضور</button>
                            <button class="btn btn-light" name="check_out_time" id="date_time_button_out" value="" onclick="document.getElementById('date_time_button_out').value ='{{ date('H:i:s')}}'"  type="submit">انصراف</button>
                        </div>

                    </div>
                </div>

            </form>
        </div>
    </div>


@endsection


