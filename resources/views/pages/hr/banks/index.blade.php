@extends('layouts.admin')
@section('title', 'البنوك')
@section('content')

    <div class="row">

        <div class="col-xl-12 col-md-12 box-col-12" id="class-content">
            <div class="email-right-aside bookmark-tabcontent">
                <div class="card email-body radius-left">
                    <div class="ps-0">
                        <div class="tab-content">
                            <div class="tab-pane fade active show" id="banks" role="tabpanel"
                                 aria-labelledby="banks-tab">
                                <div class="card mb-0">

                                    <div class="card-body">

                                            <div class="dt-ext table-responsive">
                                                <table class=" table display  data-table-responsive " id="">
                                                    <thead>
                                                    <tr>
                                                        <th>م</th>
                                                        <th> اسم  البنك  </th>
                                                        <th> العدد </th>

                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @php
                                                        $count=0;
                                                    @endphp
                                                    @foreach($banks as $bank)
                                                        @php $count=$count+1 @endphp
                                                        <tr>
                                                            <td>{{$count}}</td>
                                                            <td>{{$bank->name}}</td>
                                                            <td>
                                                                <a href="{{route('employees.index',array('bank' => $bank->id))}}">{{$bank->count}}</a>
                                                            </td>

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



@endsection
@section('scripts')


@endsection
