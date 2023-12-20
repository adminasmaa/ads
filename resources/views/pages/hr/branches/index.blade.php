@extends('layouts.admin')
@section('title', 'الفروع')
@section('content')

    <div class="row">

        <div class="col-xl-12 col-md-12 box-col-12" id="class-content">
            <div class="email-right-aside bookmark-tabcontent">
                <div class="card email-body radius-left">
                    <div class="ps-0">
                        <div class="tab-content">
                            <div class="tab-pane fade active show" id="branches" role="tabpanel"
                                 aria-labelledby="branches-tab">
                                <div class="card mb-0">
                                    <div class="card-header d-flex">
                                        <h5 class="mb-0">
                                            @role('branches.store')

                                            <a href="{{route('branches.create')}}" class="btn btn-square btn-primary"
                                               style="margin:10px;"> إضافة جديده</a>

                                            @endrole


                                        </h5>


                                    </div>
                                    <div class="card-body">

                                        <div class="dt-ext table-responsive">
                                            <table class=" table display  data-table-responsive " id="">
                                                <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th> اسم الفرع بالعربى</th>
                                                    <th> اسم الفرع بالانجليزيه</th>
                                                    <th>الهاتف</th>
                                                    <th> العدد</th>
                                                    <th class="not-export-col"> الرابط</th>

                                                    <th class="not-export-col">الاعدادت</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @php
                                                    $count=0;
                                                @endphp

                                                @foreach($branches as $branch)
                                                    @php $count=$count+1 @endphp

                                                    <tr>
                                                        <td>{{$count}}</td>
                                                        <td>{{$branch->name}}</td>
                                                        <td>{{$branch->name_en()}}</td>
                                                        <td>{{$branch->phone}}</td>
                                                        <td>
                                                            <a
                                                                href="{{route('employees.index',array('branch' => $branch->id))}}">{{$branch->count}}</a>
                                                        </td>
                                                        <td>
                                                            <a onclick="SetBranchSession({{ $branch->id}})"
                                                                href="{{route('dashboard')}}"
                                                                target="_blank">الرابط</a>
                                                        </td>
                                                        <td>
                                                            @role('branches.show')
                                                            <a href="{{route('branches.show',$branch->id)}}"
                                                               data-id="{{$branch->id}}" id="edit_id" class="me-2"
                                                               width="15" height='15'>
                                                                <i data-feather="eye" width="15" height='15'></i>
                                                            </a>
                                                            @endrole
                                                            @role('branches.update')

                                                            <a href="{{route('branches.edit',$branch->id)}}"
                                                               data-id="{{$branch->id}}" id="edit_id" class="me-2">
                                                                <i data-feather="edit" width="15" height='15'></i>
                                                            </a>

                                                            @endrole
                                                            @if($branch->id!=1)
                                                                @role('branches.destroy')
                                                                <form
                                                                    action="{{ route('branches.destroy', $branch->id) }}"
                                                                    method="post" class="d-inline">

                                                                    @method('DELETE')
                                                                    @csrf

                                                                    <button data-toggle="tooltip" data-placement="top"
                                                                            style="display: inline-block;border: none;background: none;color: #e90f0f;"
                                                                            onclick="return confirm('هل انت متاكد من هذا العنصر ؟');">
                                                                        <i
                                                                            data-feather="trash-2" width="15"
                                                                            height='15'></i>
                                                                    </button>


                                                                </form>
                                                                @endrole
                                                            @endif

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

<input type="hidden"  id="session_val" value=""  name="branch" >
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')

    <script type="text/javascript">




        $(window).on('load', function () {
            @if($errors -> has('method') && $errors -> first('method') == 'POST')
            $('#branchesModal').modal('show');
            @endif
        });
        $(window).on('load', function () {
            let var_id = '{{$errors->first('id')}}';
            @if($errors -> has('method') && $errors -> first('method') == 'PUT' && $errors -> has('id'))
            $('#editModal' + var_id).modal('show');
            @endif
        });


    </script>
@endsection
