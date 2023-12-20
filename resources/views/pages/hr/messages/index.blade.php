@extends('layouts.admin')
@section('title', 'الرسائل المرسله')
@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col call-chat-sidebar col-sm-12">

                <div class="card">
                    <div class="nav flex-column nav-pills" id="ver-pills-tab" role="tablist"
                         aria-orientation="vertical">
                        <a class="nav-link nav-border   tab-info active check-active" id="bottom-sendbox-tab"
                           data-bs-toggle="tab" href="#bottom-sendbox" role="tab" aria-controls="bottom-sendbox"
                           aria-selected="false"><i class="icofont icofont-ui-message"></i>البريد الصادر </a>

                        <a class="nav-link nav-border  tab-info check-active" id="bottom-inbox-tab"
                           data-bs-toggle="tab" href="#bottom-inbox" role="tab" aria-controls="bottom-inbox"
                           aria-selected="true"><i class="icofont icofont-ui-message"></i>البريد الوارد </a>


                    </div>
                </div>

                <div class="card">


                    <div class="card-body chat-body" style="display: none">


                        <div class="chat-box">

                            <div class="chat-left-aside">


                                <div class="media"><img class="rounded-circle user-image"
                                                        src="{{asset('storage/'.auth()->user()->user_img)}}"
                                                        alt="">
                                    <div class="about">
                                        <div class="name f-w-600 mt-3">{{auth()->user()->user_name}}</div>
                                        <div class="status" style="display:none"></div>
                                    </div>
                                </div>
                                <div class="people-list" id="people-list" >
                                    <div class="search">
                                        <form action="{{route('messages.index')}}" method="get">
                                            <div class="mb-3 d-flex">
                                                <input class="form-control" type="text" name="search" placeholder="بحث">
                                                <button type="submit" style="border: none;width: 50px;"><i
                                                        class="fa fa-search" style="color:white;"></i></button>
                                            </div>
                                        </form>
                                    </div>
                                    <ul class="list">
                                        @foreach($employees as $employee)
                                            <li class="clearfix"><a href="?id={{$employee->id}}"><img
                                                        class="rounded-circle user-image"
                                                        src="{{asset('storage/'.$employee->user_img)}}" alt=""> </a>
                                                <div class="status-circle {{$employee->status_icon}} away"></div>
                                                <div class="about">
                                                    <div class="name mt-3">{{$employee->user_name}}</div>
                                                </div>
                                            </li>
                                        @endforeach

                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col call-chat-body">
                <div class="card">
                    <div class="card-body p-0">

                        <div class="row chat-box" style="overflow-y: scroll;padding:0 30px;">

                            <div class="col pe-0 chat-right-aside">
                                <div class="col-sm-12 col-xs-12">
                                    <div class="tab-content" id="ver-pills-tabContent">
                                        <div class="tab-pane fade show active" id="bottom-sendbox" role="tabpanel"
                                             aria-labelledby="ver-pills-bottom-sendbox-tab">

                                            <div class="card-header">
                                                <h4>البريد الصادر</h4>
                                            </div>
                                            <div class="card-body">
                                                <ul class="nav nav-tabs border-tab border-0 mb-0 nav-danger"
                                                    id="inbox-tab" role="tablist">
                                                    <li class="nav-item"><a
                                                            class="nav-link active nav-border pt-0 txt-danger nav-danger"
                                                            id="inbox-top-seen-tab" data-bs-toggle="tab"
                                                            href="#inbox-top-seen" role="tab"
                                                            aria-controls="inbox-top-seen" aria-selected="true"><i
                                                                class=""></i>مقروءة</a></li>
                                                    <li class="nav-item"><a
                                                            class="nav-link nav-border txt-danger nav-danger"
                                                            id="inbox-top-notseen-tab" data-bs-toggle="tab"
                                                            href="#inbox-top-notseen" role="tab"
                                                            aria-controls="inbox-top-notseen" aria-selected="false"><i
                                                                class=""></i>غير مقروءة</a></li>
                                                </ul>
                                                <div class="tab-content" id="inbox-tabContent">
                                                    <div class="tab-pane fade show active" id="inbox-top-seen"
                                                         role="tabpanel" aria-labelledby="inbox-top-seen-tab">
                                                        <div class="card-body px-0 pb-0">
                                                            <div class="seen-header pb-2">

                                                            </div>
                                                            <div class="seen-content">
                                                                <div class="dt-ext table-responsive">
                                                                    <table class="table display data-table-responsive">
                                                                        <thead>
                                                                        <tr>

                                                                            <th scope="col">عنوان الرسالة</th>
                                                                            <th scope="col">وصف الرسالة</th>
                                                                            <th scope="col">التاريخ</th>
                                                                            <th scope="col"> المرسل إليه</th>
                                                                        </tr>
                                                                        </thead>
                                                                        <tbody>

                                                                        @foreach(auth()->user()->messagesTo()->get() as $mes_seen)

                                                                            @php
                                                                                $employees_mes_seen=$mes_seen->employees()->where('seen',1)->get();
                                                                            @endphp
                                                                            @if($employees_mes_seen->count())
                                                                                <tr>
                                                                                    <td>{{$mes_seen->title}}</td>
                                                                                    <td>{{$mes_seen->desc}}</td>
                                                                                    <td>{{$mes_seen->created_at}}</td>
                                                                                    <td>
                                                                                        @foreach($employees_mes_seen as $employee_seen)

                                                                                            <li>{{$employee_seen->ar_name}}</li>

                                                                                        @endforeach

                                                                                    </td>
                                                                                </tr>
                                                                            @endif
                                                                        @endforeach

                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane fade" id="inbox-top-notseen" role="tabpanel"
                                                         aria-labelledby="inbox-top-notseen-tab">
                                                        <div class="card-body px-0 pb-0">
                                                            <div class="notseen-header pb-2">

                                                            </div>
                                                            <div class="notseen-content">
                                                                <div class="dt-ext table-responsive">
                                                                    <table class="table display data-table-responsive">
                                                                        <thead>
                                                                        <tr>
                                                                        <tr>

                                                                            <th scope="col">عنوان الرسالة</th>
                                                                            <th scope="col">وصفة الرسالة</th>
                                                                            <th scope="col">التاريخ</th>
                                                                            <th scope="col"> المرسول اليه</th>
                                                                        </tr>
                                                                        </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                        @foreach(auth()->user()->messagesTo()->get() as $mes_not_seen)

                                                                            @php
                                                                                $employees_mes_seen=$mes_not_seen->employees()->where('seen',0)->get();

                                                                            @endphp
                                                                            @if($employees_mes_seen->count())
                                                                                <tr>

                                                                                    <td>{{$mes_not_seen->title}}</td>
                                                                                    <td>{{$mes_not_seen->desc}}</td>
                                                                                    <td>{{$mes_not_seen->created_at}}</td>

                                                                                    <td>
                                                                                         @foreach( $employees_mes_seen as $employee_not_seen)

                                                                                            <li>{{$employee_not_seen->ar_name}}</li>

                                                                                        @endforeach

                                                                                    </td>
                                                                                </tr>
                                                                            @endif
                                                                        @endforeach
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tab-pane fade" id="bottom-inbox" role="tabpanel"
                                             aria-labelledby="ver-pills-bottom-inbox-tab">
                                            <div class="card-header">
                                                <h4>البريد الوارد</h4>
                                            </div>
                                        {{--    <div class="card-body">

                                                <div class="dt-ext table-responsive">

                                                    <table class="table display data-table-responsive">
                                                        <thead>
                                                        <tr>

                                                            <th scope="col">عنوان الرسالة</th>
                                                            <th scope="col">وصف الرسالة</th>
                                                            <th scope="col">التاريخ</th>
                                                            <th scope="col">  الراسل</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach(auth()->user()->messages()->get() as $mes_inbox)

                                                            <tr>
                                                                <td>{{$mes_inbox->title}}</td>
                                                                <td>{{$mes_inbox->desc}}</td>
                                                                <td>{{$mes_inbox->created_at}}</td>
                                                                <td>{{App\Helpers\Moving::employe_attendance($mes_inbox->from)->ar_name}}</td>

                                                            </tr>

                                                        @endforeach


                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>--}}
                                        </div>


                                    </div>
                                </div>

                                <div class="chat" style="display: none">

                                    <div class="chat-header clearfix">
                                        @if(!is_null(auth()->user()->user_img))
                                            <img class="rounded-circle"
                                                 src="{{asset('storage/'.auth()->user()->user_img)}}"
                                                 alt="">
                                        @else
                                            <img class="rounded-circle" src="{{asset('assets/images/user/8.jpg')}}"
                                                 alt="">
                                        @endif
                                        <div class="about">
                                            <div class="name"><span class="font-primary f-12"></span></div>
                                            <div class="status"></div>
                                        </div>
                                        <ul class="list-inline float-start float-sm-end chat-menu-icons">

                                        </ul>
                                    </div>


                                    @foreach($showEmployees as $employee2)
                                        <div class="chat-history chat-msg-box m-7 custom-scrollbar"
                                             style="{{!request()->has('id')?'height:170px!important':''}}">
                                            <ul>
                                                @if(request()->has('id'))
                                                    @forelse($employee2->messages as $message)
                                                        <li>
                                                            <div class="message my-message"><img
                                                                    class="rounded-circle float-start chat-user-img img-30"
                                                                    src="{{asset('storage/'.$employee2->user_img)}}"
                                                                    alt="">
                                                                <div class="message-data text-end"><span
                                                                        class="message-data-time">{{Carbon\Carbon::parse($message->created_at )->locale('ar')->translatedFormat('Y-m-d')}}</span>
                                                                </div>
                                                                <p><span
                                                                        class="message-title">{{$message->title}}</span>
                                                                </p>
                                                                <p> {{$message->desc}} </p>
                                                            </div>
                                                        </li>
                                                    @empty
                                                        <li>
                                                            <div class="message my-message">
                                                                <p> لا يوجد بيانات </p>
                                                            </div>
                                                        </li>
                                                    @endforelse
                                                @else
                                                    @foreach($employee2->messages as $message)
                                                        <li>
                                                            <div class="message my-message"><img
                                                                    class="rounded-circle float-start chat-user-img img-30"
                                                                    src="{{asset('storage/'.$employee2->user_img)}}"
                                                                    alt="">
                                                                <div class="message-data text-end"><span
                                                                        class="message-data-time">{{Carbon\Carbon::parse($message->created_at )->locale('ar')->translatedFormat('Y-m-d')}}</span>
                                                                </div>
                                                                <p><span
                                                                        class="message-title">{{$message->title}}</span>
                                                                </p>
                                                                <p> {{$message->desc}} </p>
                                                            </div>
                                                        </li>
                                                    @endforeach
                                                @endif
                                            </ul>
                                        </div>

                                    @endforeach

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
        $(document).ready(function () {
            let employee_meg = '{{request()->get('id')}}';
            if(employee_meg){
                $(".chat-body").css("display", "block");
                $(".chat").css("display", "block");
                $('#ver-pills-tab a[href="#bottom-inbox"]').tab('show');
            }



        });

        $('.check-active').click(function () {
            var activeTab = $(this).attr('href').split('-')[1];
            if (activeTab == 'inbox') {
                $(".chat-body").css("display", "block");
                $(".chat").css("display", "block");
            } else {
                $(".chat-body").css("display", "none");
                $(".chat").css("display", "none");
            }

        });
    </script>
@endsection
