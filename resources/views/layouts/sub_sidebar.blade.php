@php

    $permission_ids=\App\Models\role_has_permissions::where('role_id', auth()->user()->profession_id)->pluck('permission_id')->toArray();

@endphp
<li class="sidebar-list"><a class="submenu-title" href="#"><span
            class="title"
            style="    font-family: 'Cairo', sans-serif;"><i
                class="{{ $sub_sidebar->icon_type}}"></i>  &nbsp; &nbsp;{{$sub_sidebar->name}} </span></a>
    <ul class="nav-sub-childmenu submenu-content"
        style="    margin-right: 15px !important;">
        @foreach($sub_sidebar->roles as $sub_value_child)
            @if($sub_value_child->link_route !='#')
                @if(auth()->user()->type_role != 'super')
                    @if(in_array($sub_value_child->id,$permission_ids))
                        <li>
                            <a href="{{ route($sub_value_child->link_route,array('branch' => request()->get('branch'))) }}">
                                <i
                                    class="{{ $sub_value_child->icon_type}}"></i>
                                &nbsp;{{$sub_value_child->name}} </a></li>
                    @endif
                @else
                    <li>
                        <a href="{{ route($sub_value_child->link_route,array('branch' => request()->get('branch'))) }}">
                            <i
                                class="{{ $sub_value_child->icon_type}}"></i>
                            &nbsp;{{$sub_value_child->name}} </a></li>
                @endif
            @else
                @include('layouts.sub_sidebar', ['sub_sidebar' => $sub_value_child])

            @endif
        @endforeach
    </ul>
</li>

