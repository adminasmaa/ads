@extends('layouts.admin')
@section('title', 'الجنسيه')
@section('content')

    <div class="row">

        <div class="col-xl-12 col-md-12 box-col-12" id="class-content">
            <div class="email-right-aside bookmark-tabcontent">
                <div class="card email-body radius-left">
                    <div class="ps-0">
                        <div class="tab-content">
                            <div class="tab-pane fade active show" id="nationalities" role="tabpanel"
                                 aria-labelledby="nationalities-tab">
                                <div class="card mb-0">
                                    <div class="card-header d-flex">
                                        <h5 class="mb-0">


                                            @role('nationalities.store')
                                            <button class="me-2 btn-block btn-mail w-100" data-bs-toggle="modal"
                                                    data-bs-target="#nationalitiesModal" type="button"
                                                    style="border: none;">إضافة
                                                جديد
                                            </button>
                                            @endrole

                                        </h5>
                                        <div class="modal fade modal-bookmark" id="nationalitiesModal" tabindex="-1"
                                             role="dialog" aria-labelledby="nationalitiesModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="nationalitiesModalLabel"> جنسية
                                                            جديد </h5>
                                                        <button class="btn-close" type="button" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form class="form-bookmark needs-validation"
                                                              action="{{route('nationalities.store')}}" method="post"
                                                              id="bookmark-form" novalidate="">
                                                            @csrf
                                                            <div class="row">
                                                                <div class="mb-3 mt-0 col-md-12">
                                                                    <label for="task-title">اسم الجنسية
                                                                        <span  class=" text-danger">*</span>
                                                                         </label>
                                                                    <input class="form-control" name="name" id="name"
                                                                           type="text" required="" autocomplete="off">
                                                                    @error('name')
                                                                    <div style='color:red'>{{$message}}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <input id="index_var" type="hidden" value="6">
                                                            <button class="btn btn-secondary" id="Bookmark"
                                                                    type="submit">حفظ
                                                            </button>
                                                            <button class="btn btn-primary" type="button"
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
                                            <table class=" table display  data-table-responsive " id="nationalities">
                                                <thead>
                                                <tr>
                                                    <th>م</th>
                                                    <th> اسم الجنسية</th>
                                                    <th>العدد</th>
                                                    <th class="not-export-col">الاعدادت</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @php
                                                    $count=0;
                                                @endphp
                                                @foreach($nationalities as $nationality)
                                                    @php $count=$count+1 @endphp
                                                    <tr>
                                                        <td>{{$count}}</td>
                                                        <td>{{$nationality->name}}</td>
                                                        <td><a
                                                                href="{{route('employees.index',array('nationality' => $nationality->id))}}">{{$nationality->count}}</a>
                                                        </td>
                                                        <td>
                                                            @role('nationalities.update')
                                                            <a class="me-2" data-bs-toggle="modal"
                                                               href="{{('/#editModal'.$nationality->id)}}"><i
                                                                    data-toggle="modal"
                                                                    data-target="#editModal{{$nationality->id}}"
                                                                    data-feather="edit" width="15" height='15'></i></a>
                                                            @endrole
                                                            @role('nationalities.destroy')
                                                            <form
                                                                action="{{ route('nationalities.destroy', $nationality->id) }}"
                                                                method="post" class="d-inline">

                                                                @method('DELETE')
                                                                @csrf
                                                                <button data-toggle="tooltip" style="display: inline-block;border: none;background: none;color: #e90f0f;"
                                                                        data-placement="top"
                                                                        onclick="return confirm('هل انت متاكد من هذا العنصر ؟');">
                                                                    <i data-feather="trash-2"  width="15" height='15'></i>
                                                                </button>

                                                            </form>

                                                            @endrole
                                                        </td>


                                                        <div class="modal fade modal-bookmark"
                                                             id="editModal{{$nationality->id}}" tabindex="-1"
                                                             role="dialog"
                                                             aria-labelledby="editModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-lg" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="editModalLabel">
                                                                            الجنسية
                                                                        </h5>
                                                                        <button class="btn-close" type="button"
                                                                                data-bs-dismiss="modal"
                                                                                aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form class="form-bookmark needs-validation"
                                                                              action="{{route('nationalities.update',$nationality->id)}}"
                                                                              method="post" id="bookmark-form"
                                                                              novalidate="">
                                                                            @csrf
                                                                            @method('PUT')
                                                                            <div class="row">
                                                                                <div class="mb-3 mt-0 col-md-12">
                                                                                    <label for="task-title">
                                                                                        تعديل اسم الجنسية
                                                                                        <span  class=" text-danger">*</span>
                                                                                    </label>
                                                                                    <input class="form-control"
                                                                                           name="name"
                                                                                           id="name" type="text"
                                                                                           value="{{$nationality->name}}"
                                                                                           required=""
                                                                                           autocomplete="off">
                                                                                    @error('name')
                                                                                    <div style='color:red'>{{$message}}
                                                                                    </div>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                            <input id="index_var" type="hidden"
                                                                                   value="6">
                                                                            <button class="btn btn-secondary"
                                                                                    id="Bookmark"
                                                                                    type="submit">تعديل
                                                                            </button>
                                                                            <button class="btn btn-primary"
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
            @if($errors -> has('method') && $errors -> first('method') == 'POST')
            $('#nationalitiesModal').modal('show');
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
