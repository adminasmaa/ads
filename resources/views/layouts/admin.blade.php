
@include('layouts.header')

<body class="rtl">
    <!-- tap on top starts-->
    <div class="tap-top"><i data-feather="chevrons-up"></i></div>
    <!-- tap on tap ends-->
    <!-- page-wrapper Start-->
    <div class="page-wrapper compact-wrapper" id="pageWrapper">
        <!-- Page Header Start-->
        <div class="page-header">
            <div class="header-wrapper row m-0">
                <form class="form-inline search-full col" action="#" method="get">
                    <div class="form-group w-100">
                        <div class="Typeahead Typeahead--twitterUsers">
                            <div class="u-posRelative">
                                <input class="demo-input Typeahead-input form-control-plaintext w-100" type="text"
                                    placeholder="Search Cuba .." name="q" title="" autofocus>
                                <div class="spinner-border Typeahead-spinner" role="status"><span
                                        class="sr-only">Loading...</span>
                                </div>
                                <i class="close-search" data-feather="x"></i>
                            </div>
                            <div class="Typeahead-menu"></div>
                        </div>
                    </div>
                </form>
                <div class="header-logo-wrapper col-auto p-0">
                    <div class="logo-wrapper"><a href="#"><img class="img-fluid"
                                src="{{asset('assets/images/logo/logo.png')}}" alt=""></a></div>
                    <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle"
                            data-feather="align-center"></i>
                    </div>
                </div>
                <div class="left-header col horizontal-wrapper ps-0">

                </div>

                <div class="nav-right col-8 pull-right right-header p-0">
                    <ul class="nav-menus">
                        <li><span class="header-search"><i data-feather="search"></i></span></li>
                        <li class="onhover-dropdown">
                            <div class="notification-box"><i data-feather="bell"> </i><span
                                    class="badge rounded-pill badge-secondary">4 </span></div>
                            <div class="onhover-show-div notification-dropdown">
                                <h6 class="f-18 mb-0 dropdown-title">Notitications </h6>
                                <ul>
                                    <li class="b-l-primary border-4">
                                        <p>Delivery processing <span class="font-danger">10 min.</span></p>
                                    </li>
                                    <li class="b-l-success border-4">
                                        <p>Order Complete<span class="font-success">1 hr</span></p>
                                    </li>
                                    <li class="b-l-info border-4">
                                        <p>Tickets Generated<span class="font-info">3 hr</span></p>
                                    </li>
                                    <li class="b-l-warning border-4">
                                        <p>Delivery Complete<span class="font-warning">6 hr</span></p>
                                    </li>
                                    <li><a class="f-w-700" href="#">Check all</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="onhover-dropdown">
                            <div class="notification-box"><i data-feather="star"></i></div>
                            <div class="onhover-show-div bookmark-flip">
                                <div class="flip-card">
                                    <div class="flip-card-inner">
                                        <div class="front">
                                            <h6 class="f-18 mb-0 dropdown-title">Bookmark</h6>
                                            <ul class="bookmark-dropdown">
                                                <li>
                                                    <div class="row">
                                                        <div class="col-4 text-center">
                                                            <div class="bookmark-content">
                                                                <div class="bookmark-icon"><i
                                                                        data-feather="file-text"></i>
                                                                </div>
                                                                <span>Forms</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-4 text-center">
                                                            <div class="bookmark-content">
                                                                <div class="bookmark-icon"><i data-feather="user"></i>
                                                                </div>
                                                                <span>Profile</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-4 text-center">
                                                            <div class="bookmark-content">
                                                                <div class="bookmark-icon"><i data-feather="server"></i>
                                                                </div>
                                                                <span>Tables</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="text-center"><a class="flip-btn f-w-700" id="flip-btn"
                                                        href="javascript:void(0)">Add
                                                        New Bookmark</a></li>
                                            </ul>
                                        </div>
                                        <div class="back">
                                            <ul>
                                                <li>
                                                    <div class="bookmark-dropdown flip-back-content">
                                                        <input type="text" placeholder="search...">
                                                    </div>
                                                </li>
                                                <li><a class="f-w-700 d-block flip-back" id="flip-back"
                                                        href="javascript:void(0)">Back</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="mode"><i class="fa fa-moon-o"></i></div>
                        </li>

                        <li class="onhover-dropdown">
                            <div class="notification-box"><i data-feather="message-square"></i><span
                                    class="badge rounded-pill badge-secondary">{{auth()->user()->messages()->wherePivot('seen',0)->count()}}</span>
                            </div>
                            <div class="chat-dropdown onhover-show-div">
                                <h6 class="f-18 mb-0 dropdown-title">الرسائل</h6>

                                <ul class="py-0">

                                    @foreach(auth()->user()->messages()->wherePivot('seen',0)->get() as $message)


                                    <li>

                                        <a href="{{route('messages.index').'?id='.$message->id}}"
                                            class="media"><img class="img-fluid b-r-5 me-2"
                                                src="{{asset('storage/'.auth()->user()->user_img)}}" alt="">
                                            <div class="media-body">
                                                <h6>{{$message->title}}</h6>
                                                <p>{{$message->desc}}</p>
                                                <p class="f-8 font-primary mb-0">{{$message->created_at}}</p>
                                            </div>

                                        </a>
                                    </li>
                                    @endforeach

                                    <li class="text-center"><a class="f-w-700" href="{{route('messages.index')}}"> عرض
                                            الكل</a></li>


                                </ul>
                            </div>
                        </li>


                        <li class="maximize"><a class="text-dark" href="#!" onclick="javascript:toggleFullScreen()"><i
                                    data-feather="maximize"></i></a></li>
                        <ul class="profile-nav onhover-dropdown p-0 me-0">
                            <div class="media profile-media">
                                <img class="b-r-10" width="50px" height="50px"
                                    src="{{asset('storage/'.auth()->user()->user_img)}}" alt="">
                                <div class="media-body"><span>{{auth()->user()->ar_name}}</span>
                                    <p class="mb-0 font-roboto">{{auth()->user()->profession->name}} <i
                                            class="middle fa fa-angle-down"></i></p>
                                </div>

                            </div>
                            <ul class="profile-dropdown onhover-show-div">
                                <li><a href="{{route('profile.edit')}}" href=""> <i data-feather="user"></i><span>الملف الشخصى</span> </a></li>


                                <li><a href="{{ route('logout.perform') }}"
                                        class="btn btn-outline-light me-2">تسجيل الخروج</a>
                                </li>
                            </ul>
                        </ul>
                    </ul>


                </div>

                <script class="result-template" type="text/x-handlebars-template">
                    <div class="ProfileCard u-cf">
                    <div class="ProfileCard-avatar">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="feather feather-airplay m-0">
                            <path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"></path>
                            <polygon points="12 15 17 21 7 21 12 15"></polygon>
                        </svg>
                    </div>
                    <div class="ProfileCard-details">
                        <div class="ProfileCard-realName"></div>
                    </div>
                </div>
            </script>
                <script class="empty-template" type="text/x-handlebars-template">
                    <div class="EmptyMessage">Your search turned up 0 results. This most likely means the backend is down,
                    yikes!
                </div>
            </script>
            </div>
        </div>
        <!-- Page Header Ends                              -->
        <!-- Page Body Start-->
        <div class="page-body-wrapper">
            <!-- Page Sidebar Start-->
            @include('layouts.sidebar')

            <div class="page-body">
                <div class="container-fluid">
                    <div class="page-title">
                        <div class="row">
                            <div class="col-6">
                                <ol class="breadcrumb">
                                    @foreach(App\Helpers\Moving::get_url() as $key=>$route)
                                        @if(request::has('status') && $route=='clients.index')
                                            <li class="breadcrumb-item"><a href="{{route('clients.index')}}"> @if($key==0)<i data-feather="home"></i>@endif العملاء</a></li>
                                            <li class="breadcrumb-item"><a href="{{Illuminate\Support\Facades\Route::current()->getName()==$route?'#':route($route)}}"> @if($key==0)<i data-feather="home"></i>@endif بلاك ليست</a></li>
                                            @elseif($route=='partments.index')

                                                <li class="breadcrumb-item"><a href="{{Illuminate\Support\Facades\Route::current()->getName()==$route?'#':route($route)}}"> @if($key==0)<i data-feather="home"></i>@endif  الشقق</a></li>
                                           @elseif($route=='subscriptions.index')

                                                <li class="breadcrumb-item"><a href="{{Illuminate\Support\Facades\Route::current()->getName()==$route?'#':route($route)}}"> @if($key==0)<i data-feather="home"></i>@endif  الفنادق</a></li>

                                        @elseif(request()->has('name')&& request()->get('name')!='bills'&& $route=='bills.index')
                                            <li class="breadcrumb-item"><a href="{{route('bills.index')}}"> @if($key==0)<i data-feather="home"></i>@endif {{App\Helpers\Moving::get_arabic_name($route)}}</a></li>
                                            <li class="breadcrumb-item"><a href="{{Illuminate\Support\Facades\Route::current()->getName()==$route?'#':route($route,request()->input())}}"> @if($key==0)<i data-feather="home"></i>@endif {{request()->get('name')=='convenant'?'العهد':'المعتمدين'}} </a></li>

                                       @else
                                            <li class="breadcrumb-item"><a href="{{Illuminate\Support\Facades\Route::current()->getName()==$route?'#':route($route,request()->input())}}"> @if($key==0)<i data-feather="home"></i>@endif {{App\Helpers\Moving::get_arabic_name($route)}} @if(request()->has('branch') && $key==count(App\Helpers\Moving::get_url())-1){{'_'.App\Models\hr\Branch::withoutGlobalScope('branch')->findOrFail(request()->get('branch'))->name}} @endif</a></li>
                                        @endif
                                    @endforeach

                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-fluid">


                    <div class="email-wrap bookmark-wrap">
                        <?php // if(Request::url()==route("setting")) ?>

                        <?php //include('layouts.admin_setting') ?>
                        <?php // endif ?>

                        @yield('content')


                    </div>

                </div>

            </div>
            @include('layouts.footer')





        </div>
    </div>
    @yield('scripts')
    <!-- Plugin used-->
