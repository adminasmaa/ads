@extends('layouts.admin')
@section('title', 'احصائيات')
@section('content')

    <div class="container-fluid">
    <div class="row">
        <div class="col-sm-12" id="class-content">
            <div class="email-right-aside bookmark-tabcontent">
                <div class="card email-body radius-left">
                    <div class="ps-0">
                        <div class="tab-content">
                            <div class="tab-pane fade active show" id="banks" role="tabpanel"
                                 aria-labelledby="banks-tab">
                                <div class="card mb-0">
                                    <div class="card-header d-flex">

                                    </div>
                                    <div class="card-body">

                                            <div class="dt-ext table-responsive">
                                                <table class=" table display  data-table-responsive " id="">
                                                    <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>الموظف</th>
                                                        <th>الفرع</th>
                                                        @if($field=='living')
                                                          <th>السكن</th>
                                                        @endif

                                                    </tr>
                                                    </thead>
                                                    <tbody>

                                                    @foreach($employees as $employee)
                                                        <tr>
                                                            <td>{{$loop->index + 1}}</td>
                                                            <td>{{$employee->user_name}}</td>
                                                            <td>{{$employee->branch->name}}</td>
                                                            @if($field=='living')
                                                              <td>{{$employee->Living=='employees'?'سكن عام':'سكن خاص'}}</td>
                                                            @endif


                                                        </tr>
                                                    @endforeach


                                                    </tbody>
                                                    <tfoot>

                                                    </tfoot>
                                                </table>
                                            </div>

                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>






@endsection
@section('scripts')

@endsection
