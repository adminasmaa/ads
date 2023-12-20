@extends('layouts.admin')
@section('title', 'الصلاحيات')

@section('content')
    @section('css')
        <style>
            .form-check {
                padding-right: 0rem;
            }


        </style>
    @endsection
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
                                                   id="main_role"
                                                   name="type_role" {{ request()->get('type_role')==1  ? 'checked' : ''}}

                                            >
                                            <label>
                                                رئيسى
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" value="2"
                                                   id="branch_role"
                                                   name="type_role" {{ request()->get('type_role')==2  ? 'checked' : ''}}>
                                            <label>
                                                فرعى
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" value="3" name="type_role"
                                                   id="all_role" {{ request()->get('type_role')==3  ? 'checked' : ''}}>
                                            <label for="all_role">
                                                الاثنين معا
                                            </label>
                                        </div>

                                    </div>

                                </div>


                                <div class="row">
                                    @foreach($roles as $role)

                                        <input type="hidden" value="{{$role->roles->count()}}"
                                               class="main_role-{{$role->id}}">
                                        <input type="hidden" value="{{$role->link_route}}"
                                               class="main_role-link{{$role->id}}">

                                        @if($role->type==1)
                                            <div class="main_item parent_div test-{{$role->id}}" id="main_item">
                                                <div
                                                    class="form-check  checkbox checkbox-dark mb-0  col-sm-6 ">
                                                    <input class="form-check-input test"
                                                           name="permission_arry[{{$role->name}}]"
                                                           value="{{$role->id}} "
                                                           {{$role->check==1 ?'checked':''}}  id="checkbox{{$role->id}}"
                                                           onchange="change_select_parent({{$role->id}})"
                                                           type="checkbox">
                                                    <label class="form-check-label"
                                                           for="checkbox{{$role->id}}"> {{$role->name}}
                                                        <span
                                                            class="digits"> </span></label>
                                                </div>

                                                <div class="child_div-{{$role->id}}">

                                                    <div class="row all_item_main-{{$role->id}}">
                                                        @foreach($role->childrenRoles as $subRoles )
                                                            @if($subRoles->childrenRoles->count()>0)
                                                                <hr>
                                                                @include('sub_roles', ['sub_roles' => $subRoles])

                                                            @else
                                                                <div class="col-sm-4">
                                                                    <h10><input
                                                                            style="opacity: 1"
                                                                            class="form-check-input"
                                                                            name="permission_arry[{{$subRoles->name}}]"
                                                                            value="{{$subRoles->id}} "
                                                                            {{in_array($subRoles->id,$roles_permission) ?'checked':''}}
                                                                            id="checkbox{{$subRoles->id}}"
                                                                            data-sample="{{App\Helpers\Moving::get_child_parent_id($subRoles->id)}}"
                                                                            onchange="change_select_submain({{$subRoles->id}},{{$role->id}})"
                                                                            type="checkbox">
                                                                        {{$subRoles->name}}</h10>
                                                                </div>

                                                            @endif

                                                        @endforeach
                                                    </div>
                                                    <hr>
                                                </div>


                                            </div>




                            @endif
                            @if($role->type==2)
                                <div class="branch_item parent_div   test-{{$role->id}}" id="branch_item">
                                    <div
                                        class="form-check  checkbox checkbox-dark mb-0  col-sm-6 ">
                                        <input class="form-check-input test"
                                               name="permission_arry[{{$role->name}}]"
                                               value="{{$role->id}} "
                                               {{$role->check==1 ?'checked':''}}  id="checkbox{{$role->id}}"
                                               onchange="change_select_parent({{$role->id}})"
                                               type="checkbox">
                                        <label class="form-check-label"
                                               for="checkbox{{$role->id}}"> {{$role->name}}
                                            <span
                                                class="digits"> </span></label>
                                    </div>
                                    <div class="child_div-{{$role->id}}">
                                        <div class="row all_item_main-{{$role->id}}">


                                            @foreach($role->childrenRoles as $subRoles2 )
                                                @if($subRoles2->childrenRoles->count()>0)
                                                    @include('sub_roles', ['sub_roles' => $subRoles2])
                                                @else
                                                    <div class="col-sm-4">
                                                        <h10><input
                                                                style="opacity: 1"
                                                                class="form-check-input"
                                                                name="permission_arry[{{$subRoles2->name}}]"
                                                                value="{{$subRoles2->id}} "
                                                                {{in_array($subRoles2->id,$roles_permission) ?'checked':''}}
                                                                id="checkbox{{$subRoles2->id}}"
                                                                data-sample="{{App\Helpers\Moving::get_child_parent_id($subRoles2->id)}}"
                                                                onchange="change_select_submain({{$subRoles2->id}},{{$role->id}})"
                                                                type="checkbox">
                                                            {{$subRoles2->name}}</h10>
                                                    </div>

                                                @endif

                                            @endforeach
                                        </div>
                                        <hr>
                                    </div>
                                </div>
                            @endif
                            @if($role->type==3)
                                <div class="all_item parent_div   test-{{$role->id}}" id="all_item"
                                     style="display:none">
                                    <div
                                        class="form-check  checkbox checkbox-dark mb-0  col-sm-6">
                                        <input class="form-check-input test"
                                               name="permission_arry[{{$role->name}}]"
                                               value="{{$role->id}} "
                                               {{$role->check==1 ?'checked':''}}  id="checkbox{{$role->id}}"
                                               onchange="change_select_parent({{$role->id}})"
                                               type="checkbox">
                                        <label class="form-check-label"
                                               for="checkbox{{$role->id}}">{{$role->name}}
                                            <span
                                                class="digits"> </span></label>

                                    </div>


                                    <div class="child_div-{{$role->id}}">
                                        <div class="row all_item_main-{{$role->id}}">
                                            @foreach($role->childrenRoles as $subRoles3 )
                                                @if($subRoles3->childrenRoles->count()>0)

                                                    @include('sub_roles', ['sub_roles' => $subRoles3])
                                                @else

                                                    <div class="col-sm-4">
                                                        <h10><input
                                                                style="opacity: 1"
                                                                class="form-check-input"
                                                                name="permission_arry[{{$subRoles3->name}}]"
                                                                value="{{$subRoles3->id}}"
                                                                {{in_array($subRoles3->id,$roles_permission) ?'checked':''}}
                                                                id="checkbox{{$subRoles3->id}}"
                                                                data-sample="{{App\Helpers\Moving::get_child_parent_id($subRoles3->id)}}"
                                                                onchange="change_select_submain({{$subRoles3->id}},{{$role->id}})"


                                                                type="checkbox">
                                                            {{$subRoles3->name}}</h10>

                                                    </div>

                                                @endif

                                            @endforeach

                                        </div>
                                    </div>

                                    <hr>

                                </div>

                            @endif

                            @endforeach

                        </div>
                            </div>
                        </div>
                        <hr>
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
    </div>
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.7.12/sweetalert2.all.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
                $(".all_item").css("display", "block");
                $(".branch_item").css("display", "none");
                $("#all_role").prop('checked', true);


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

        function change_select_parent(id) {
            let check_parent1 = $("#checkbox" + id).prop('checked');
            if (check_parent1 === false) {
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
                                $('#checkbox' + id).prop("checked", true)

                            }
                        })
                    }

                });
            } else {
                let count = 0;
                let sub_sub = $(".main_role-" + id).val();
                let sub_main = $(".main_role-link" + id).val();




                $(".child_div-" + id).find('input.test:checkbox:checkbox').each(function () {
                    if ($(this).is(':checked')) {
                        count++;

                    }


                })
                if (count !=0 && !sub_sub) {
                    console.log(sub_main);
                    console.log(count);

                    Swal.fire({
                        icon: 'error',
                        title: ' خطا...',
                        text: 'يجب    اختيار وظيفة واحدة على الاقل  للحفظ  !',
                        footer: '<a href>     سيتم تفعيل وظيفة</a>'
                    })

                    $(".child_div-" + id).find('input.test:checkbox:checkbox').each(function () {

                        $(this).prop("checked", true);


                    })

                }
                if (count == 0 && sub_main == '#') {

                    Swal.fire({
                        icon: 'error',
                        title: ' خطا...',
                        text: 'يجب    اختيار وظيفة واحدة على الاقل  للحفظ!',
                        footer: '<a href>     سيتم تفعيل  اول وظيفة</a>'
                    })

                    $("#checkbox" + id).prop('checked', true);
                    $(".all_item_main-" + id).children().first().find('input[type=checkbox]').prop('checked', true)

                }


            }


        }


        function change_select_child(id1, id2, id3) {
            let check_child_change = $('#checkbox' + id1).is(":checked");
            let check_parent = $('#checkbox' + id2).is(":checked");
            let check_main_parent = $('#checkbox' + id3).is(":checked");
            let array = $('#checkbox' + id1).data().sample;
            let myarray = [];
            $.each(array, function (key, value) {
                myarray.push(value);

            })

            if (check_child_change == true) {
                if (check_main_parent == false || check_parent == false) {
                    $(".test-" + id3).find('input.test:checkbox:checkbox').each(function () {


                        if ($.inArray(parseInt($(this).val()), myarray) > -1) {
                            $(this).prop("checked", true);
                        }


                    })


                    Swal.fire({
                        icon: 'error',
                        title: ' خطا...',
                        text: 'يجب اختيار الوظيفة المطلوب التعديل عليه!',
                        footer: '<a href>     سيتم تفعيل الوظيفة</a>'
                    })

                }


            }
            change_select_parent(id1);

            change_select_submain(id1, id2)


        }


        function change_select_submain(id1, id2) {
            let check_child_change = $('#checkbox' + id1).is(":checked");
            let check_parent = $('#checkbox' + id2).is(":checked");
            let array_sub = $('#checkbox' + id1).data().sample;
            let myarray_sub = [];
            $.each(array_sub, function (key, value) {
                myarray_sub.push(value);

            })

            if (check_child_change == true) {
                if (check_parent == false) {
                    $(".test-" + id2).find('input.test:checkbox:checkbox').each(function () {

                        if ($.inArray(parseInt($(this).val()), myarray_sub) > -1) {
                            $(this).prop("checked", true);
                        }


                    })


                    Swal.fire({
                        icon: 'error',
                        title: ' خطا...',
                        text: 'يجب اختيار الوظيفة المطلوب التعديل عليه!',
                        footer: '<a href>     سيتم تفعيل الوظيفة</a>'
                    })

                }


            }

            if (check_child_change == true && check_parent == false) {
                $('#checkbox' + id2).prop("checked", true);
                Swal.fire({
                    icon: 'error',
                    title: ' خطا...',
                    text: 'يجب اختيار الوظيفة المطلوب التعديل عليه!',
                    footer: '<a href>     سيتم تفعيل الوظيفة</a>'
                })


            }

            change_select_parent(id1);
            change_select_parent(id2);

        }


    </script>

@endsection
