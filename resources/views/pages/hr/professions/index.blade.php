@extends('layouts.admin')
@section('title', 'المهنه')
@section('content')

    <div class="row">

        <div class="col-xl-12 col-md-12 box-col-12" id="class-content">
            <div class="email-right-aside bookmark-tabcontent">
                <div class="card email-body radius-left">
                    <div class="ps-0">
                        <div class="tab-content">
                            <div class="tab-pane fade active show" id="professions" role="tabpanel"
                                 aria-labelledby="professions-tab">
                                <div class="card mb-0">
                                    <div class="card-header d-flex">
                                        <h5 class="mb-0">
                                            @role('professions.store')
                                            <button class="me-2 btn-block btn-mail w-100"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#professionsModal" type="button"
                                                    style="border: none;">إضافة
                                                جديد
                                            </button>
                                            @endrole


                                        </h5>
                                        <div class="modal fade modal-bookmark" id="professionsModal"
                                             tabindex="-1"
                                             role="dialog" aria-labelledby="professionsModalLabel"
                                             aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title"
                                                            id="jobTitlesModalLabel"> مهنة
                                                            جديد </h5>
                                                        <button class="btn-close" type="button"
                                                                data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form class="form-bookmark needs-validation"
                                                              action="{{route('professions.store')}}"
                                                              method="post" id="bookmark-form"
                                                              novalidate="">
                                                            @csrf
                                                            <div class="row">
                                                                <div class="mb-3 mt-0 col-md-12">
                                                                    <label for="task-title">اسم
                                                                        المهنة </label>
                                                                    <input class="form-control"
                                                                           name="name" id="name"
                                                                           type="text" required=""
                                                                           autocomplete="off">
                                                                    @error('name')
                                                                    <div
                                                                        style='color:red'>{{$message}}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <input id="index_var" type="hidden"
                                                                   value="6">
                                                            <button class="btn btn-secondary"
                                                                    id="Bookmark" type="submit">حفظ
                                                            </button>
                                                            <button class="btn btn-primary"
                                                                    type="button"
                                                                    data-bs-dismiss="modal">إلغاء
                                                            </button>
                                                        </form>
                                                    </div>


                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="card-body">

                                        <div class="dt-ext table-responsive">
                                            <table class=" table display  data-table-responsive " id="">
                                                <thead>
                                                <tr>
                                                    <th>م</th>

                                                    <th> اسم المهنة</th>
                                                    @if(auth()->user()->type_role=='super')
                                                        <th> الصلاحية</th>
                                                    @endif
                                                    <th> العدد</th>
                                                    <th class="not-export-col">الاعدادت</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @php
                                                    $count=0;
                                                @endphp
                                                @foreach($professions as $profession)
                                                    @php $count=$count+1 @endphp
                                                    <tr>
                                                        <td>{{$count}}</td>
                                                        <td>{{$profession->name}}</td>
                                                        @if(auth()->user()->type_role=='super')
                                                            <td><a class="me-2"
                                                                   href="{{route('ShowRoles',$profession->id)}}"><i
                                                                        data-feather="edit" width="15" height='15'></i></a>
                                                            </td>
                                                        @endif


                                                        <td>
                                                            <a href="{{route('employees.index',array('profession' => $profession->id))}}">{{$profession->count}}</a>
                                                        </td>
                                                        <td>
                                                            @role('professions.update')
                                                            <a class="me-2" data-bs-toggle="modal"
                                                               href="{{('/#editModal'.$profession->id)}}"><i
                                                                    data-toggle="modal"
                                                                    data-target="#editModal{{$profession->id}}"
                                                                    data-feather="edit" width="15" height='15'></i></a>
                                                            @endrole

                                                            @role('professions.destroy')
                                                            <form
                                                                action="{{ route('professions.destroy', $profession->id) }}"
                                                                method="post" class="d-inline">

                                                                @method('DELETE')
                                                                @csrf
                                                                <button data-toggle="tooltip"
                                                                        style="display: inline-block;border: none;background: none;color: #e90f0f;"
                                                                        data-placement="top"

                                                                        onclick="return confirm('هل انت متاكد من هذا العنصر?');"
                                                                ><i data-feather="trash-2" width="15" height='15'></i>
                                                                </button>

                                                            </form>
                                                            @endrole


                                                        </td>


                                                        <div class="modal fade modal-bookmark"
                                                             id="editModal{{$profession->id}}"
                                                             tabindex="-1"
                                                             role="dialog"
                                                             aria-labelledby="editModalLabel"
                                                             aria-hidden="true">
                                                            <div class="modal-dialog modal-lg"
                                                                 role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title"
                                                                            id="editModalLabel">
                                                                            المهنة
                                                                        </h5>
                                                                        <button class="btn-close"
                                                                                type="button"
                                                                                data-bs-dismiss="modal"
                                                                                aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form
                                                                            class="form-bookmark needs-validation"
                                                                            action="{{route('professions.update',$profession->id)}}"
                                                                            method="post"
                                                                            id="bookmark-form"
                                                                            novalidate="">
                                                                            @csrf
                                                                            @method('PUT')
                                                                            <div class="row">
                                                                                <div
                                                                                    class="mb-3 mt-0 col-md-12">
                                                                                    <label
                                                                                        for="task-title">
                                                                                        تعديل المهنة
                                                                                    </label>
                                                                                    <input
                                                                                        class="form-control"
                                                                                        name="name"
                                                                                        id="name"
                                                                                        type="text"
                                                                                        value="{{$profession->name}}"
                                                                                        required=""
                                                                                        autocomplete="off">
                                                                                    @error('name')
                                                                                    <div
                                                                                        style='color:red'>{{$message}}</div>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                            <input id="index_var"
                                                                                   type="hidden"
                                                                                   value="6">
                                                                            <button
                                                                                class="btn btn-secondary"
                                                                                id="Bookmark"
                                                                                type="submit">تعديل
                                                                            </button>
                                                                            <button
                                                                                class="btn btn-primary"
                                                                                type="button"
                                                                                data-bs-dismiss="modal">
                                                                                إلغاء
                                                                            </button>
                                                                        </form>
                                                                    </div>


                                                                </div>
                                                            </div>
                                                        </div>

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

    <script type="text/javascript">
        $(window).on('load', function () {
            @if ($errors->has('method') && $errors->first('method')=='POST')
            $('#professionsModal').modal('show');
            @endif
        });

        $(window).on('load', function () {
            let var_id = '{{$errors->first('id')}}';
            @if ($errors->has('method') && $errors->first('method')=='PUT' && $errors->has('id'))
            $('#editModal' + var_id).modal('show');
            @endif
        });
    </script>
@endsection
