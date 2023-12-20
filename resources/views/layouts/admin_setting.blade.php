@section('title', 'الاعدادات')
<div class="col-xl-3 box-col-6" id="card">
    <div class="email-left-aside">
        <div class="card">
            <div class="card-body">
                <div class="email-app-sidebar left-bookmark task-sidebar">
                    <ul class="nav main-menu" role="tablist">
                        <li class="nav-item"><span class="main-title"> الإعدادت</span></li>
                        @php
                        if(auth()->user()->type_role !='super'){
                       $array=App\Models\role_has_permissions::where('role_id',auth()->user()->profession->id)->pluck('permission_id')->toArray();
                        $show_permission=App\Models\Role::whereIN('ID',$array)->whereIn('link_route',['qualifications.index','jobTitles.index','employeestatuses.index','professions.index','nationalities.index','banks.index','roles.index','branches.index','homeContents.index'])->orderby('order')->get();
                        }
                        else {
                           $array=App\Models\role_has_permissions::where('role_id',auth()->user()->profession->id)->pluck('permission_id')->toArray();
                           $show_permission=App\Models\Role::whereIn('link_route',['qualifications.index','jobTitles.index','employeestatuses.index','professions.index','nationalities.index','banks.index','roles.index','branches.index','homeContents.index'])->orderby('order')->get();

                        }

                       @endphp
                        @foreach($show_permission as $value)
                            @if($value->link_route=='roles.index')
                                @if(auth()->user()->type_role=='super')
                                <li><a id="{{$value->name}}-tab"
                                       href="{{route($value->link_route)}}"

                                       aria-controls="qualifications" aria-selected="true"><span
                                            class="title">{{$value->name}}
                                </span></a></li>
                                @endif
                            @else
                            <li><a id="{{$value->name}}-tab"
                                   href="{{route($value->link_route)}}"

                                   aria-controls="qualifications" aria-selected="true"><span
                                        class="title">{{$value->name}}
                                </span></a></li>
                            @endif
                        @endforeach

                    </ul>


                </div>
            </div>
        </div>
    </div>
</div>
