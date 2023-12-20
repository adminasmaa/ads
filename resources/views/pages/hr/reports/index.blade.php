
@extends('layouts.admin')
@section('title', 'التقرير')
@section('css')
<link rel="stylesheet" type="text/css" href="../assets/css/vendors/date-picker.css">
@endsection
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
                                    <div class="card-header">
                                        <a onclick="addUrlParameter('onlyauth','' )" class="btn btn-square btn-primary"> تقارير الدخول
                                        </a>
                                    </div>
                                    <div class="card-header">
                                        <form action="{{route('reports.index',request()->route('id'))}}" method="get" class="row">  
                                            @if(request()->has('onlyauth'))
                                              <input name="onlyauth"  type="hidden" > 
                                            @endif
                                            @if(request()->has('branch'))
                                              <input name="branch"  type="hidden"  value="{{request()->get('branch')}}"> 
                                            @endif
                                            <div class="col-md-4"> 
                                                من
                                             <input name="from" class="form-control digits" type="date" data-date=""  data-date-format="yyyy-mm-dd" > 
                                            </div>     
                                            <div class="col-md-4">
                                                الى
                                             <input  name="to" class="form-control digits" type="date" data-date=""  data-date-format="yyyy-mm-dd"> 
                                            </div> 
                                            <div class="col-md-4">
                                           <button type="submit" class="mt-4 btn btn-primary">بحث</button>
                                            </div>                                      
                                        </form >
                                    </div>
                                    <div class="card-body">

                                        <div class="dt-ext table-responsive">
                                            <table class=" table display  test-datatable" id="">
                                                <thead>
                                                    <tr>
                                                        <!-- <th>#</th> -->
                                                        <th>اسم الحركه</th>
                                                        <th> اسم الموظف</th>
                                                        <th>التاريخ</th>
                                                        <th>الوقت</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                  


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

<script src="../assets/js/datepicker/date-picker/datepicker.js"></script>
<script src="../assets/js/datepicker/date-picker/datepicker.en.js"></script>
<script src="../assets/js/datepicker/date-picker/datepicker.custom.js"></script>
<script>
    function addUrlParameter(name, value) {
    var searchParams = new URLSearchParams(window.location.search)
    searchParams.set(name, value)
    window.location.search = searchParams.toString()
}

table = $('.test-datatable').DataTable({
    dom: 'Bfrtip',
        responsive: true,
        processing: true,
        serverSide: true,
        ajax: "{{ route('reports.index') }}",
        columns: [
            {data: 'name', name: 'name'},
            {data: 'user_name', name: 'user_name'},
            {data: 'date', name: 'date'},
            {data: 'time', name: 'time'},
        ],
        order: [[2, 'asc'],[3, 'asc']],
        buttons: [
            {

                text: 'طباعة',
                extend: 'print',

                customize: function (win) {
                    $(win.document.body)
                        .css('direction', 'rtl');


                },

                exportOptions: {
                    columns: [':visible :not(.not-export-col)'],
                    header: false
                }

            }


        ],


        language: {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Arabic.json"

        },
    });
</script>
@endsection