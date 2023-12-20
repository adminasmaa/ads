<div
    class="form-check  checkbox checkbox-dark mb-0  col-sm-6 sub_main-{{$sub_roles->id}}">
    <input type="hidden" value="{{$sub_roles->childrenRoles->count()}}" class="main_role-{{$sub_roles->id}}">
    <input type="hidden" value="{{$sub_roles->link_route}}"
           class="main_role-link{{$sub_roles->id}}">
    <input class="form-check-input test"
           name="permission_arry[{{$sub_roles->name}}]"
           value="{{$sub_roles->id}} "
           {{in_array($sub_roles->id,$roles_permission) ?'checked':''}}
           id="checkbox{{$sub_roles->id}}"
           data-sample="{{App\Helpers\Moving::get_child_parent_id($sub_roles->id)}}"
           onchange="change_select_submain({{$sub_roles->id}},{{$role->id}})"
           type="checkbox">
    <label class="form-check-label"
           for="checkbox{{$sub_roles->id}}">{{$sub_roles->name}}
        <span
            class="digits"> </span></label>


</div>

<div class="child_div-{{$sub_roles->id}}">
    <div class="row all_item_main-{{$sub_roles->id}}">
        @foreach($sub_roles->roles as $subRoles)
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
                            data-sample="{{App\Helpers\Moving::get_child_parent_id($subRoles->id)}}"
                            {{in_array($subRoles->id,$roles_permission) ?'checked':''}}
                            id="checkbox{{$subRoles->id}}"
                            onchange="change_select_child({{$subRoles->id}},{{$sub_roles->id}},{{$role->id}})"

                            type="checkbox">
                        {{$subRoles->name}}</h10>


                </div>

            @endif

        @endforeach


    </div>
    </div>
<div style="padding-bottom:20px;"></div>
<hr/>
