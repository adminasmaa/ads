@extends('layouts.admin')
@section('title', 'الصلاحيات')
@section('content')

    <div class="container-fluid">
        <div class="row">
            <form class="mega-vertical" action="{{ route('StoreRolesPermission', $role_details->id) }}">
                @method('get')
                @csrf

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>صلاحيات مهنة({{$role_details->name}})</h5>
                        </div>

                        <div class="card-body">
                            <div class="row">

                                <div class="form-group mb-3">
                                    <label class="col-form-label">نوع الحساب</label>
                                    <div class="form-input position-relative d-flex">

                                        <div class="form-check">
                                            <input type="radio" value="1"
                                                   name="type_role" {{ request()->get('type_role')==1  ? 'checked' : ''}}

                                            >
                                            <label>
                                                رئيسى
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" value="2"
                                                   name="type_role" {{ request()->get('type_role')==2  ? 'checked' : ''}}>
                                            <label>
                                                فرعى
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" value="3" name="type_role"
                                                   id="branch" {{ request()->get('type_role')==3  ? 'checked' : ''}}>
                                            <label for="branch">
                                                الاثنين معا
                                            </label>
                                        </div>

                                    </div>

                                </div>

                                <div class="row">
                                    @foreach($roles as $value)
                                        @if($value->type==1)
                                            <div class="main_item parent_div  col-sm-6 col-md-6"
                                                 style="display: none">

                                                <input class="form-check-input "
                                                       name="permission_arry[{{$value->name}}]"
                                                       value="{{$value->id}} "
                                                       {{$value->check==1 ?'checked':''}}  id="checkbox_main{{$value->id}}"
                                                       onchange="change_select_parent({{$value->id}})"
                                                       type="checkbox">
                                                {{$value->name}}



                                                <div class="child_div-{{$value->id}}">
                                                    <div class="m-t-15 m-checkbox-inline">
                                                        @foreach($value->child as $item)
                                                            <div
                                                                class="form-check form-check-inline checkbox checkbox-dark mb-0">
                                                                <input class="form-check-input test"
                                                                       name="permission_arry[{{$item->name}}]"
                                                                       value="{{$item->id}}"
                                                                       {{$item->check_child==1 ?'checked':''}}
                                                                       id="checkbox{{$item->id}}"
                                                                       onchange="change_select_child({{$item->id}},{{$value->id}})"
                                                                       type="checkbox">
                                                                <label class="form-check-label"
                                                                       for="checkbox{{$item->id}}">{{$item->name}}
                                                                    <span
                                                                        class="digits"> </span></label>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>

                                        @endif
                                    @endforeach
                                    @foreach($roles as $value2)
                                        @if($value2->type==2)
                                            <div class="branch_item parent_div  col-sm-6 col-md-6"
                                                 style="display: none">
                                                <h10><input class="form-check-input"
                                                            name="permission_arry[{{$value2->name}}]"
                                                            value="{{$value2->id}} "
                                                            {{$value2->check==1 ?'checked':''}}  id="checkbox_main{{$value2->id}}"
                                                            onchange="change_select_parent({{$value2->id}})"
                                                            type="checkbox">
                                                    {{$value2->name}}</h10>
                                                <div class="child_div-{{$value2->id}}">
                                                    <div class="m-t-15 m-checkbox-inline">
                                                        @foreach($value2->child as $item2)
                                                            <div
                                                                class="form-check form-check-inline checkbox checkbox-dark mb-0">
                                                                <input class="form-check-input test"
                                                                       name="permission_arry[{{$item2->name2}}]"
                                                                       value="{{$item2->id}}"
                                                                       {{$item2->check_child==1 ?'checked':''}}
                                                                       id="checkbox{{$item2->id}}"
                                                                       onchange="change_select_child({{$item2->id}},{{$value2->id}})"
                                                                       type="checkbox">
                                                                <label class="form-check-label"
                                                                       for="checkbox{{$item2->id}}">{{$item2->name}}
                                                                    <span
                                                                        class="digits"> </span></label>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>

                                        @endif
                                    @endforeach
                                    @foreach($roles as $value3)
                                        @if($value3->type==3)
                                            <div class="all_item parent_div col-sm-6 col-md-6" id="all_item"
                                                 style="display:none;">
                                                <h10><input class="form-check-input"
                                                            name="permission_arry[{{$value3->name}}]"
                                                            value="{{$value3->id}} "
                                                            {{$value3->check==1 ?'checked':''}}  id="checkbox_main{{$value3->id}}"
                                                            onchange="change_select_parent({{$value3->id}})"
                                                            type="checkbox">
                                                    {{$value3->name}}</h10>
                                                <div class="child_div-{{$value3->id}}">
                                                    <div class="m-t-15 m-checkbox-inline">
                                                        @foreach($value3->child as $item3)
                                                            <div
                                                                class="form-check form-check-inline checkbox checkbox-dark mb-0">
                                                                <input class="form-check-input test"
                                                                       name="permission_arry[{{$item3->name}}]"
                                                                       value="{{$item3->id}}"
                                                                       onchange="change_select_child({{$item3->id}},{{$value3->id}})"
                                                                       {{$item3->check_child==1 ?'checked':''}}
                                                                       id="checkbox{{$item3->id}}"
                                                                       type="checkbox">
                                                                <label class="form-check-label"
                                                                       for="checkbox{{$item3->id}}">{{$item3->name}}
                                                                    <span
                                                                        class="digits"> </span></label>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>

                                        @endif
                                    @endforeach

                                </div>
                            </div>

                        </div>

                    </div>
                </div>

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-footer text-center">
                            <button class="btn btn-primary m-r-15" type="submit">حفظ</button>
                            <a href="{{ route('StoreRolesPermission', $role_details->id) }}">
                                <button type="button" class="btn btn-light">إلغاء</button>
                            </a>

                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @section('scripts')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
        <script>

            $(document).ready(function () {
                let type = '{{request()->get('type_role')}}';
                if (type == 1) {
                    $(".main_item").each(function () {
                        $(".main_item").css("display", "block")

                    })
                } else if (type == 2) {
                    $(".branch_item").each(function () {
                        $(".branch_item").css("display", "block")

                    })
                } else if (type == 3) {
                    $(".all_item").each(function () {
                        $(".all_item").css("display", "block")

                    })

                } else {
                    $(".main_item").css("display", "none");
                    $(".all_item").css("display", "none");
                    $(".branch_item").css("display", "none");


                }


            });

            $('input[type=radio][name=type_role]').change(function () {
                if (this.value == '1') {

                    $(".main_item").each(function () {
                        $(".main_item").css("display", "block")

                    })
                    $(".branch_item").each(function () {
                        $(".branch_item").css("display", "none")

                    })
                    $(".all_item").each(function () {
                        $(".all_item").css("display", "none")

                    })

                } else if (this.value == '2') {
                    $(".branch_item").each(function () {
                        $(".branch_item").css("display", "block")

                    })
                    $(".main_item").each(function () {
                        $(".main_item").css("display", "none")

                    })
                    $(".all_item").each(function () {
                        $(".all_item").css("display", "none")

                    })


                } else {
                    $(".all_item").each(function () {
                        $(".all_item").css("display", "block")

                    })
                    $(".branch_item").each(function () {
                        $(".branch_item").css("display", "none")

                    })
                    $(".main_item").each(function () {
                        $(".main_item").css("display", "none")

                    })


                }
            });



            function change_select_child(id1, id2) {
                let check_child_change = $('#checkbox' + id1).is(":checked");
                let check_parent = $('#checkbox_main' + id2).is(":checked");
                if (check_child_change == true && check_parent == false) {
                    $('#checkbox_main' + id2).prop("checked", true);
                    Swal.fire({
                        icon: 'error',
                        title: ' خطا...',
                        text: 'يجب اختيار الوظيفة المطلوب التعديل عليه!',
                        footer: '<a href>     سيتم تفعيل الوظيفة</a>'
                    })
                }


            }

            function change_select_parent(id) {
                let check_parent1 = $("#checkbox_main" + id).prop('checked');
                if (check_parent1 === false){
                    $(".child_div-" + id).find('input[type=checkbox]').each(function () {
                        if ($(this).is(':checked')) {
                            Swal.fire({
                                title: 'عند الالغاء سيتم حذف جميع التابعين بهذا العنصر',
                                showDenyButton: true,
                                confirmButtonText: 'نعم',
                                denyButtonText: 'لا',
                                customClass: {
                                    actions: 'my-actions',
                                    cancelButton: 'order-1 right-gap',
                                    confirmButton: 'order-2',
                                    denyButton: 'order-3',
                                }
                            }).then((result) => {

                                if (result.isConfirmed) {
                                    $(".child_div-" + id).find('input[type=checkbox]').each(function () {
                                        if ($(this).is(':checked')) {
                                            $(this).prop("checked", false);
                                        }

                                    });
                                    Swal.fire('تم الالغاء بنجاح!', '', 'success');
                                } else if (result.isDenied) {
                                    Swal.fire('لم يتم الالغاء', '', 'info');
                                    $('#checkbox_main' + id).prop("checked", true)

                                }
                            })
                        }

                    });






                }


            }

        </script>

    @endsection
@endsection
