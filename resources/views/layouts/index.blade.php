@extends('layouts.admin')
@section('title', 'لوحة التحكم')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12 xl-100 box-col-12">
            <div class="widget-joins card">

                <div class="card-body">
                    <div class="row gy-4">
                        <div class="col-sm-6">
                            <div class="widget-card">
                                <div class="media align-self-center">
                                    <div class="widget-icon bg-light-warning">
                                        <svg class="fill-secondary" width="48" height="48" viewBox="0 0 48 48"
                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M22.5938 14.1562V17.2278C20.9604 17.8102 19.7812 19.3566 19.7812 21.1875C19.7812 23.5138 21.6737 25.4062 24 25.4062C24.7759 25.4062 25.4062 26.0366 25.4062 26.8125C25.4062 27.5884 24.7759 28.2188 24 28.2188C23.2241 28.2188 22.5938 27.5884 22.5938 26.8125H19.7812C19.7812 28.6434 20.9604 30.1898 22.5938 30.7722V33.8438H25.4062V30.7722C27.0396 30.1898 28.2188 28.6434 28.2188 26.8125C28.2188 24.4862 26.3263 22.5938 24 22.5938C23.2241 22.5938 22.5938 21.9634 22.5938 21.1875C22.5938 20.4116 23.2241 19.7812 24 19.7812C24.7759 19.7812 25.4062 20.4116 25.4062 21.1875H28.2188C28.2188 19.3566 27.0396 17.8102 25.4062 17.2278V14.1562H22.5938Z">
                                            </path>
                                            <path
                                                d="M25.4062 0V11.4859C31.2498 12.1433 35.8642 16.7579 36.5232 22.5938H48C47.2954 10.5189 37.4829 0.704531 25.4062 0Z">
                                            </path>
                                            <path
                                                d="M14.1556 31.8558C12.4237 29.6903 11.3438 26.9823 11.3438 24C11.3438 17.5025 16.283 12.1958 22.5938 11.4859V0C10.0492 0.731813 0 11.2718 0 24C0 30.0952 2.39381 35.6398 6.14897 39.8624L14.1556 31.8558Z">
                                            </path>
                                            <path
                                                d="M47.9977 25.4062H36.5143C35.8044 31.717 30.4977 36.6562 24.0002 36.6562C21.0179 36.6562 18.3099 35.5763 16.1444 33.8444L8.13779 41.851C12.3604 45.6062 17.905 48 24.0002 48C36.7284 48 47.2659 37.9508 47.9977 25.4062Z">
                                            </path>
                                        </svg>
                                    </div>
                                    <div class="media-body">
                                        <h6>الفنادق المتوفرة</h6>
                                    </div>
                                </div>
                                <h5>
                             <?php
                                $list = \DB::table('subscriptions')->count();
                               echo $list;
                             ?>

                                </h5>
                                <div class="icon-bg">
                                    <svg class="fill-secondary" width="48" height="48" viewBox="0 0 48 48" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M22.5938 14.1562V17.2278C20.9604 17.8102 19.7812 19.3566 19.7812 21.1875C19.7812 23.5138 21.6737 25.4062 24 25.4062C24.7759 25.4062 25.4062 26.0366 25.4062 26.8125C25.4062 27.5884 24.7759 28.2188 24 28.2188C23.2241 28.2188 22.5938 27.5884 22.5938 26.8125H19.7812C19.7812 28.6434 20.9604 30.1898 22.5938 30.7722V33.8438H25.4062V30.7722C27.0396 30.1898 28.2188 28.6434 28.2188 26.8125C28.2188 24.4862 26.3263 22.5938 24 22.5938C23.2241 22.5938 22.5938 21.9634 22.5938 21.1875C22.5938 20.4116 23.2241 19.7812 24 19.7812C24.7759 19.7812 25.4062 20.4116 25.4062 21.1875H28.2188C28.2188 19.3566 27.0396 17.8102 25.4062 17.2278V14.1562H22.5938Z">
                                        </path>
                                        <path
                                            d="M25.4062 0V11.4859C31.2498 12.1433 35.8642 16.7579 36.5232 22.5938H48C47.2954 10.5189 37.4829 0.704531 25.4062 0Z">
                                        </path>
                                        <path
                                            d="M14.1556 31.8558C12.4237 29.6903 11.3438 26.9823 11.3438 24C11.3438 17.5025 16.283 12.1958 22.5938 11.4859V0C10.0492 0.731813 0 11.2718 0 24C0 30.0952 2.39381 35.6398 6.14897 39.8624L14.1556 31.8558Z">
                                        </path>
                                        <path
                                            d="M47.9977 25.4062H36.5143C35.8044 31.717 30.4977 36.6562 24.0002 36.6562C21.0179 36.6562 18.3099 35.5763 16.1444 33.8444L8.13779 41.851C12.3604 45.6062 17.905 48 24.0002 48C36.7284 48 47.2659 37.9508 47.9977 25.4062Z">
                                        </path>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-2"></div>

                    </div>
                </div>
            </div>
        </div>


    </div>
    @if(Session::has('branch'))
    <div class="row">
        <div class="col-xl-12 xl-100 box-col-12">
            <div class="widget-joins card">

                <div class="card-body">
                    <div class="row gy-4">


                        @foreach($apartTypes as $type)
                        <div class="col-3">
                            <div class="widget-card">
                                <div class="media align-self-center">

                                    <div class="media-body">
                                        <h6>{{$type->name}} </h6>
                                    </div>
                                </div>
                                <div class="d-flex" style="justify-content: space-between;">
                                    <a href="{{route('statusApartment.getApartment',$type->id)}}?available" class="">
                                        <div class="media align-self-center">
                                            <div class="widget-icon ">
                                            </div>
                                            <div class="widget-icon" style="background-color: green;color:black">
                                                {{$type->apart->where('status','available')->count()}}
                                            </div>
                                            <div class="media-body">
                                                <h6>المتاح</h6>
                                            </div>
                                        </div>
                                        <div class="icon-bg">
                                        </div>
                                    </a>
                                    <a href="{{route('statusApartment.getApartment',$type->id)}}" class="">
                                        <div class="media align-self-center">
                                            <div class="widget-icon ">
                                            </div>
                                            <div class="widget-icon" style="background-color: red">
                                                {{$type->apart->where('status','!=','available')->count()}}
                                            </div>
                                            <div class="media-body">
                                                <h6>غير متاح</h6>
                                            </div>
                                        </div>
                                        <div class="icon-bg">
                                        </div>
                                    </a>

                                </div>


                            </div>
                        </div>
                        @endforeach



                    </div>

                </div>
            </div>
        </div>





    </div>


    <div class="row">
        <div class="col-xl-12 xl-100 box-col-12">
            <div class="widget-joins card">

                <div class="card-body">
                    <div class="row gy-4">
                        <div class="col-sm-2">
                            <div class="widget-card">
                                <div class="media align-self-center">
                                    <div class="widget-icon ">
                                    </div>
                                    <div class="widget-icon" style="background-color: green">
                                    </div>
                                    <div class="media-body">
                                        <h6>المتاح</h6>
                                    </div>
                                </div>
                                <div class="icon-bg">
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-2">
                            <div class="widget-card">
                                <div class="media align-self-center">
                                    <div class="widget-icon" style="background-color: yellow">
                                    </div>
                                    <div class="media-body">
                                        <h6>خروج اليوم</h6>
                                    </div>
                                </div>
                                <div class="icon-bg">
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-2">
                            <div class="widget-card">
                                <div class="media align-self-center">
                                    <div class="widget-icon" style="background-color: gray">
                                    </div>
                                    <div class="media-body">
                                        <h6>تنظيف</h6>
                                    </div>
                                </div>
                                <div class="icon-bg">
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-2">
                            <div class="widget-card">
                                <div class="media align-self-center">
                                    <div class="widget-icon" style="background-color: #c3aeae">
                                    </div>
                                    <div class="media-body">
                                        <h6>صيانة</h6>
                                    </div>
                                </div>
                                <div class="icon-bg">
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-2">
                            <div class="widget-card">
                                <div class="media align-self-center">
                                    <div class="widget-icon" style="background-color: red">
                                    </div>
                                    <div class="media-body">
                                        <h6>مشغول</h6>
                                    </div>
                                </div>
                                <div class="icon-bg">
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-2">
                            <div class="widget-card">
                                <div class="media align-self-center">
                                    <div class="widget-icon" style="background-color: blue">
                                    </div>
                                    <div class="media-body">
                                        <h6>متأخر</h6>
                                    </div>
                                </div>
                                <div class="icon-bg">
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif








</div>




@endsection
@section('scripts')
<script src="{{ asset('assets/js/chart/apex-chart/apex-chart.js') }}"></script>
<script src="{{ asset('assets/js/chart/apex-chart/stock-prices.js') }}"></script>
<script src="{{ asset('assets/js/chart/apex-chart/chart-custom.js') }}"></script>
<script src="{{ asset('assets/js/chart/apex-chart/apex-chart.js') }}"></script>
<script src="{{ asset('assets/js/chart/apex-chart/stock-prices.js') }}"></script>
<script src="{{ asset('assets/js/chart/apex-chart/chart-custom.js') }}"></script>
<script>
$(document).ready(function() {
    let branch_user_login = '{{auth()->user()->branch_id}}';
    if (branch_user_login != 1) {

        SetBranchSession(branch_user_login);

    }

});
</script>
@endsection
