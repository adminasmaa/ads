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
                                    @if(App\Helpers\Moving::print_permission()==1)
                                    <div class="card-header d-flex">
                                    <a href="{{route('statistics.employee_statistic').'?name=living'}}" class="btn btn-square btn-primary">طباعة الموظفين</a>

                                    </div>
                                    @endif
                                    <div class="card-body">

                                            <div class="dt-ext table-responsive">
                                                <table class=" table display   export-without_print " id="">
                                                    <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>الفرع</th>
                                                        <th>سكن عام</th>
                                                        <th>سكن خاص</th>
                                                        <th>المجموع</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>

                                                    @foreach($branches as $branch)
                                                        <tr>
                                                            <td>{{$loop->index + 1}}</td>
                                                            <td>{{$branch->name}}</td>
                                                            <td>{{$branch->living()['yes']->count()}}</td>
                                                            <td>{{$branch->living()['no']->count()}}</td>
                                                            <td>{{$branch->employee->count()}}</td>
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
