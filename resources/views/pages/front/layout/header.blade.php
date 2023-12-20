<header id="header">
        <div class="container d-flex">

            <div class="logo ml-auto">
                <a href="{{route('front.index')}}"><img src="{{asset('assets/front/img/logo.png')}}" alt="" class="img-fluid"></a>
            </div>

            <nav class="nav-menu d-none d-lg-block  ml-auto">
                <ul>
                    <li><a href="{{route('front.index')}}">الرئيسية</a></li>
                    @foreach(App\Models\Apartment\ApartType::get() as $type)
                    <li><a href="{{route('front.type',array('type'=>$type->id))}}">{{$type->name}}</a></li>
                    @endforeach
                </ul>
            </nav><!-- .nav-menu -->
            @guest('client')
            <a href="{{route('front.login')}}" class="get-started-btn scrollto"> <i class="icofont-user-alt-3"></i> تسجيل / دخول</a>
            @endguest
            @auth('client')
            <a href="{{route('front.logout')}}" class="get-started-btn scrollto"> <i class="icofont-user-alt-3"></i> تسجيل خروج</a>
            @endauth
        </div>
    </header>