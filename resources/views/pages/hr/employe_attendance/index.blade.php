
@extends('layouts.admin')
@section('title', 'وقت الحضور والانصراف')
@section('content')

<div class="container-fluid">
          <div class="row">
            <div class="col-sm-12">
              <div class="card">
                <div class="card-header">

                  <a href="{{route('EmployeAttendance.create')}}" class="btn btn-square btn-primary" style="align:left;"> إضافة حضور وانصراف</a>

                </div>

                <div class="card-body">
                  <div class="dt-ext table-responsive">
                      <table class="table display data-table-responsive" id="export-button ">


                      <thead>
                        <tr>
                          <th >اسم الموظف</th>
                          <th >وقت الحضور</th>
                          <th >وقت الانصراف</th>
                          <th> عدد مرات الحضور والانصراف</th>
                        </tr>
                      </thead>
                      <tbody>


                        @foreach($attendance_employes as $item)
                            <tr>
                            <td>{{App\Helpers\Moving::employe_attendance($item->employees_id)->user_name}}</td>
                            <td>{{ App\Helpers\Moving::employe_attendance($item->employees_id)->work_time_from ? App\Helpers\Moving::employe_attendance($item->employees_id)->work_time_from : ''}}</td>
                            <td>{{App\Helpers\Moving::employe_attendance($item->employees_id)->work_time_to ?  App\Helpers\Moving::employe_attendance($item->employees_id)->work_time_to : '' }}</td>
                            <td><a href="{{route('ShowEmployeAttendance',$item->employees_id)}}"  class="me-2">{{$item->getcountAttribute()}} </a></td>
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

