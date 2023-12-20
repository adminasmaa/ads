<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <title>فرع &nbsp; <?php echo $sub->name ?? ''; ?>&#13; </title>
    <!-- Cairo Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
    <link rel="icon" type="image/x-icon" href="{{ asset('storage/' . $sub->img) }}">

    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800;900&display=swap"
          rel="stylesheet"/>
    <!-- Font Awesome-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet"/>

    <!-- Bootstrap-->
    <link rel="stylesheet" href="{{ asset('assets/front/vendor/bootstrap/css/bootstrap.min.css.map') }}"
          type="text/css"/>
    <link rel="stylesheet" href="{{ asset('assets/front/vendor/bootstrap/css/bootstrap.min.css') }}" type="text/css"/>

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('assets/front/styles/styles.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/front/styles/responsive-styles.css') }}"/>
    <style>
        .link-hotel {
            width: 35px;
            height: 35px;
            border-radius: 3px;
            background-color: #ff8412;
            color: #000;
            font-size: 14px;
            margin-right: 6px;
        }
    </style>

    <?php
    if ($adstype != null) {
        $servername = 'localhost';

        $username = env('DB_USERNAME');

        $password = env('DB_PASSWORD');

        $dbname = env('DB_DATABASE');

        // Create connection

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection

        if ($conn->connect_error) {
            die('Connection failed: ' . $conn->connect_error);
        }

        $date = date('Y-m-d');

        $result = $conn->query("SELECT * FROM ads where  date(created_at)=date('$date') and type_id='$adstype'  LIMIT 1");
        //  print_r($result);die;

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            //print_r($row);die;
            $visitor_count = $row['count_visit'];

            $visitor_count = $visitor_count + 1;

            $sql = "UPDATE ads SET count_visit=$visitor_count WHERE date(created_at)=date('$date') and type_id='$adstype' ";
            if ($conn->query($sql) === true) {
                $conn->close();
            }
        } else {
            $sql = "INSERT INTO ads (count_visit,type_id )

                                                                                                VALUES (1,'$adstype')";

            if ($conn->query($sql) === true) {
                $conn->close();
            }
        }
    }
    ?>

</head>

<body>
<main>
    <section class="my-5">
        <div class="container">

            <div class="row p-3 hotel-details" id="slideshow">
                <div class="col-12 px-0">
                    <div id="slides">
                        <div class="slide show" data-slide="1">
                            <img src="{{ asset('storage/' . $sub->img) }}" alt="hotel details"/>
                            <div class="card-hotel-overlay d-flex align-items-center">
                                <h2 class=""><?= $sub->name ?></h2>
                            </div>
                        </div>
                        <?php $i = 2; ?>
                        <?php foreach ($gallery as $one){ ?>
                        <div class="slide" data-slide="<?= $i ?>">
                            <img src="{{ asset('storage/' . $one->img) }}" alt="hotel details"/>
                            <div class="card-hotel-overlay d-flex align-items-center">
                                <h2 class=""><?= $sub->name ?> </h2>
                            </div>
                        </div>

                            <?php $i++;
                        } ?>
                        <div class="slide-btn next-slide">
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="25"
                                         viewBox="0 0 26 25" fill="none">
                                        <path
                                            d="M9.838 3.84508L18.297 12.2108C18.3974 12.3104 18.4688 12.4185 18.5113 12.535C18.5538 12.6515 18.575 12.7764 18.5748 12.9097C18.5754 13.0431 18.5552 13.1681 18.5144 13.285C18.4735 13.4018 18.4029 13.5104 18.3027 13.6108L9.91192 22.0699C9.67953 22.3042 9.38834 22.4221 9.03835 22.4235C8.68835 22.4249 8.38784 22.3011 8.13683 22.0521C7.88582 21.8031 7.75964 21.512 7.75829 21.1787C7.75693 20.8453 7.88075 20.5532 8.12973 20.3021L15.4499 12.9224L8.07011 5.60227C7.83583 5.36988 7.718 5.08269 7.71661 4.7407C7.71523 4.3987 7.83903 4.10253 8.08801 3.85218C8.337 3.60117 8.62815 3.47499 8.96148 3.47364C9.29481 3.47228 9.58699 3.5961 9.838 3.84508Z"
                                            fill="#FF8600"/>
                                    </svg>
                                </span>
                        </div>

                        <div class="slide-btn prev-slide">
                                <span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="25"
                                           viewBox="0 0 24 25" fill="none">
                                        <path
                                            d="M15.1248 21.9267L6.69982 13.5267C6.59982 13.4267 6.52882 13.3184 6.48682 13.2017C6.44482 13.085 6.42415 12.96 6.42482 12.8267C6.42482 12.6934 6.44549 12.5684 6.48682 12.4517C6.52815 12.335 6.59915 12.2267 6.69982 12.1267L15.1248 3.70168C15.3582 3.46835 15.6498 3.35168 15.9998 3.35168C16.3498 3.35168 16.6498 3.47668 16.8998 3.72668C17.1498 3.97668 17.2748 4.26835 17.2748 4.60168C17.2748 4.93502 17.1498 5.22668 16.8998 5.47668L9.54982 12.8267L16.8998 20.1767C17.1332 20.41 17.2498 20.6977 17.2498 21.0397C17.2498 21.3817 17.1248 21.6774 16.8748 21.9267C16.6248 22.1767 16.3332 22.3017 15.9998 22.3017C15.6665 22.3017 15.3748 22.1767 15.1248 21.9267Z"
                                            fill="#FF8600"/>
                                    </svg></span>
                        </div>
                    </div>
                </div>

                <div class="col-12 px-0 d-flex justify-content-center mt-md-5 my-3">
                    <div class="w-lg-70">

                        <div id="gallery" class="d-flex flex-wrap">

                            <div class="thumbnail active" data-slide="1">
                                <img src="{{ asset('storage/' . $sub->img) }}" alt="hotel details"/>
                            </div>
                            <?php $i = 2; foreach ($gallery as $one){ ?>

                            <div class="thumbnail" data-slide="<?= $i ?>">
                                <img src="{{ asset('storage/' . $one->img) }}" alt="hotel details"/>
                            </div>
                                <?php $i++;
                            } ?>

                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <!-- AddToAny BEGIN -->
{{--                                <div class="a2a_kit a2a_kit_size_32 a2a_default_style">--}}
{{--                                    <a href="#" class="link-hotel d-flex justify-content-center align-items-center"><i--}}
{{--                                            class="fab fa-instagram"></i></a>--}}
{{--                                    <a href="#" class="link-hotel d-flex justify-content-center align-items-center"><i--}}
{{--                                            class="fas fa-bars"></i></a>--}}
{{--                                    <a href="#" class="link-hotel d-flex justify-content-center align-items-center"><i--}}
{{--                                            class="fas fa-phone"></i></a>--}}
{{--                                    <a href="#" class="link-hotel d-flex justify-content-center align-items-center"><i--}}
{{--                                            class="fas fa-map-marker-alt"></i></a>--}}
{{--                                    <a href="#" class="link-hotel d-flex justify-content-center align-items-center"><i--}}
{{--                                            class="fab fa-whatsapp"></i></a>--}}
{{--                                    <a href="#" class="link-hotel d-flex justify-content-center align-items-center"><i--}}
{{--                                            class="fab fa-apple"></i></a>--}}
{{--                                    <a href="#" class="link-hotel d-flex justify-content-center align-items-center"><i--}}
{{--                                            class="fas fa-mobile-alt"></i></a>--}}


{{--                                    --}}{{--                                    <a class="a2a_dd" href="https://www.addtoany.com/share"></a>--}}
{{--                                    --}}{{--                                    <a class="a2a_button_facebook"></a>--}}
{{--                                    --}}{{--                                    <a class="a2a_button_twitter"></a>--}}
{{--                                    --}}{{--                                    <a class="a2a_button_email"></a>--}}
{{--                                    --}}{{--                                    <a class="a2a_button_whatsapp"></a>--}}
{{--                                    --}}{{--                                    <a class="a2a_button_facebook_messenger"></a>--}}
{{--                                </div>--}}
                                <script async src="https://static.addtoany.com/menu/page.js"></script>
                                <!-- AddToAny END -->
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="social-items d-flex my-md-5 my-3">

                                    <a href="tel:<?= $sub->call_phone ?>" onclick="count_calls();"
                                       oncontextmenu="count_calls();"
                                       class="d-flex justify-content-center align-items-center w-50 border-left py-2 link-bottom">
                                    <span>
                                        <img class="details-icon phone-icon"
                                             src="{{ asset('assets/front/images/call.png') }}" alt="call"/>
                                    </span>
                                        <span class="h2 send-msg">اتصال</span>
                                    </a>

                                    <a href="https://wa.me/<?= $sub->msg_phone ?>" onclick="count_whats();"
                                       oncontextmenu="count_whats();"
                                       class="d-flex justify-content-center align-items-center w-50 py-2 border-left link-bottom">
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                             fill="#80c23f" class="bi bi-whatsapp" viewBox="0 0 16 16">
                                            <path
                                                d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"/>
                                        </svg>

                                    </span>
                                        <span class="h2 send-msg">واتس اب</span>
                                    </a>
                                    <a href="<?= $sub->link_insta ?>" onclick="count_insta();"
                                       oncontextmenu="count_insta();"
                                       class="d-flex justify-content-center align-items-center  border-left w-50 py-2">
                                    <span>
                                        <img class="details-icon"
                                             src="{{ asset('assets/front/images/istagram.png') }}" alt="istagram"/>
                                    </span>
                                        <span class="h2 send-msg">انستجرام</span>
                                    </a>
                                    <a href="<?= $sub->location ?>"
                                       class="d-flex justify-content-center align-items-center w-50 py-2">
                                    <span>
                                        <i class="fa fa-map-marker" style="color:#3bc119"></i>
                                    </span>
                                        <span class="h2 send-msg">لوكيشن</span>
                                    </a>
                                </div>

                                <div class="social-items d-flex my-md-5 my-3">

                                    <a href="<?= $sub->iphone_application ?>" onclick="count_calls();"
                                       oncontextmenu="count_calls();"
                                       class="d-flex justify-content-center align-items-center w-50 border-left py-2 link-bottom">
                                    <span>
                                 <i class="fab fa-apple"></i>
                                    </span>
                                        <span class="h2 send-msg">تطبيق ايفون</span>
                                    </a>

                                    <a href="<?= $sub->galaxy_application ?>" onclick="count_whats();"
                                       oncontextmenu="count_whats();"
                                       class="d-flex justify-content-center align-items-center w-50 py-2 border-left link-bottom">
                                    <span>
                                    <i class="fas fa-mobile-alt"></i>

                                    </span>
                                        <span class="h2 send-msg"> تطبيق جلكسي</span>
                                    </a>
                                    <a href="<?= $sub->menu ?>" onclick="count_insta();" style="text-align: center"
                                       oncontextmenu="count_insta();"
                                       class="d-flex justify-content-center align-items-center  border-left w-50 py-2">
                                    <span>
                             <i class="fas fa-bars"></i>
                                    </span>
                                        <span class="h2 send-msg">منيو</span>
                                    </a>


                                </div>


                            </div>
                        </div>
                        {{--                        <div class="row">--}}
                        {{--                            <div class="col-12 mb-lg-0 mb-5">--}}
                        {{--                                <table class="table table-bordered display data-table-responsive" id="export-button">--}}
                        {{--                                    <thead>--}}
                        {{--                                    <tr>--}}
                        {{--                                        <th class="text-center">اسم الشقه</th>--}}
                        {{--                                        <th class="text-center">السعر</th>--}}
                        {{--                                    </tr>--}}
                        {{--                                    </thead>--}}

                        {{--                                    <tbody style="    background: #e9e9e9;">--}}
                        {{--                                    @foreach(\App\Models\Apartment::where('unit_id','=',$sub['id'])->get() as $subb)--}}
                        {{--                                        <tr class="text-center">--}}

                        {{--                                            <td>{{$subb->name}}</td>--}}
                        {{--                                            <td>{{$subb->price}}</td>--}}
                        {{--                                        </tr>--}}

                        {{--                                    @endforeach--}}
                        {{--                                    </tbody>--}}
                        {{--                                </table>--}}


                        {{--                            </div>--}}
                        {{--                        </div>--}}
                        <div class="row">
                            <div class="col-12">
                                <div class="description-box p-3">
                                    <h3>  {{ $sub->name }} </h3>
                                    <div class="d-flex">
                                        <div>
                                            <svg class="details-icon" xmlns="http://www.w3.org/2000/svg" width="24"
                                                 height="24" viewBox="0 0 24 24" fill="none">
                                                <path
                                                    d="M18.157 16.882L16.97 18.056C16.095 18.914 14.96 20.018 13.564 21.368C13.1444 21.7737 12.5836 22.0005 12 22.0005C11.4164 22.0005 10.8556 21.7737 10.436 21.368L6.945 17.972C6.505 17.541 6.139 17.178 5.843 16.882C4.62537 15.6643 3.79617 14.1128 3.46026 12.4239C3.12435 10.7349 3.29681 8.98422 3.95584 7.39326C4.61487 5.8023 5.73087 4.44249 7.16272 3.48578C8.59456 2.52907 10.2779 2.01843 12 2.01843C13.7221 2.01843 15.4054 2.52907 16.8373 3.48578C18.2691 4.44249 19.3851 5.8023 20.0442 7.39326C20.7032 8.98422 20.8757 10.7349 20.5397 12.4239C20.2038 14.1128 19.3746 15.6643 18.157 16.882ZM14.5 11C14.5 10.337 14.2366 9.70107 13.7678 9.23222C13.2989 8.76338 12.663 8.49999 12 8.49999C11.337 8.49999 10.7011 8.76338 10.2322 9.23222C9.7634 9.70107 9.5 10.337 9.5 11C9.5 11.663 9.7634 12.2989 10.2322 12.7678C10.7011 13.2366 11.337 13.5 12 13.5C12.663 13.5 13.2989 13.2366 13.7678 12.7678C14.2366 12.2989 14.5 11.663 14.5 11Z"
                                                    fill="#3086F2"/>
                                            </svg>
                                        </div>
                                        <p>
                                            {{ $sub->description ?? ''   }}
                                        </p>
                                    </div>

                                    <div>
{{--                                    <span>--}}
{{--                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"--}}
{{--                                             viewBox="0 0 24 24" fill="none" class="icon-hotel">--}}
{{--                                            <path--}}
{{--                                                d="M11.99 2C6.47 2 2 6.48 2 12C2 17.52 6.47 22 11.99 22C17.52 22 22 17.52 22 12C22 6.48 17.52 2 11.99 2ZM15.29 16.71L11 12.41V7H13V11.59L16.71 15.3L15.29 16.71Z"--}}
{{--                                                fill="#FF8412"/>--}}
{{--                                        </svg>--}}
{{--                                    </span>--}}
{{--                                        <span class="txt-time"> {{  $sub->details }} </span>--}}
                                    </div>
                                </div>
                            </div>
                        </div>


                        {{--                        <div>--}}
                        {{--                            <h3 class="free-title py-3 mb-0">خدمات مجانية</h3>--}}
                        {{--                        </div>--}}

                        {{--                        <?php foreach ($service as $one){ ?>--}}


                        {{--                        <div class="description-box p-2 mb-3">--}}
                        {{--                            <div class="d-flex justify-content-between align-items-center">--}}
                        {{--                                <div style="display:none;">--}}
                        {{--                                    <h4 class="mb-0"><?= $one->name ?> </h4>--}}
                        {{--                                </div>--}}
                        {{--                                <div class="box-image" style="width:-webkit-fill-available;height:200px;">--}}
                        {{--                                    <img src="{{ asset('storage/' . $one->img) }}" alt="hotel details" />--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}

                        {{--                        <?php }?>--}}

                    </div>
                </div>


            </div>

        </div>
    </section>
</main>
<footer>
    <div class="container">
        <div class="row position-relative">
            <div class="">
                <div class="web-view">
                    <img class="footer-image" src="{{ asset('assets/front/images/footer-image.png') }}"
                         alt="footer image"/>
                </div>
                <div class="mobile-view">
                    <img class="footer-image" src="{{ asset('assets/front/images/footer-img-mob.png') }}"
                         alt="footer image"/>
                </div>
            </div>
            <div class="footer-content">
                <div>
                    <div class="footer-title"><a href="tel:<?= $sub->agz_num ?>"><?= $sub->agz_num ?></a></div>
                    <div class="d-flex align-items-center">
                        <div class="footer-icon">
                            <img src="{{ asset('assets/front/images/customer-support.png') }}"
                                 alt="customer support"/>
                        </div>
                        <div>
                            <div class="footer-txt">تواصل معنا</div>
                            <div class="footer-txt">بخدمتكم</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Bootstrap-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"
        integrity="sha512-2rNj2KJ+D8s1ceNasTIex6z4HWyOnEYLVC3FigGOmyQCZc2eBXKgOxQmo3oKLHyfcj53uz4QMsRCWNbLd32Q1g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{ asset('assets/front/vendor/bootstrap/js/bootstrap.js') }}"></script>
<!-- JQuery-->
<script src="{{ asset('assets/front/js/jquery.min.js') }}"></script>

<!-- Main JS -->
<script src="{{ asset('assets/front/js/script.js') }}"></script>

<script>
    function count_calls() {
        var type = <?= $adstype ?>;
        var url = document.URL;
        var parts = url.split('/');
        var lastSegment = parseInt(parts.pop() || parts.pop());
        $.ajax({
            url: "<?= url('front/calls') ?>",
            type: "get",
            data: {
                type: type,
                id: lastSegment,
            },
            dataType: 'json',
        });

    }


    function count_whats() {
        var type = <?= $adstype ?>;
        var url = document.URL;
        var parts = url.split('/');
        var lastSegment = parseInt(parts.pop() || parts.pop());

        var type = <?= $adstype ?>;
        var url = document.URL;
        var parts = url.split('/');
        var lastSegment = parseInt(parts.pop() || parts.pop());
        $.ajax({
            url: "<?= url('front/whats') ?>",
            type: "get",
            data: {
                type: type,
                id: lastSegment,
            },
            dataType: 'json',
        });

    }

    function count_insta() {
        var type = <?= $adstype ?>;
        var url = document.URL;
        var parts = url.split('/');
        var lastSegment = parseInt(parts.pop() || parts.pop());
        var type = <?= $adstype ?>;
        var url = document.URL;
        var parts = url.split('/');
        var lastSegment = parseInt(parts.pop() || parts.pop());
        $.ajax({
            url: "<?= url('front/insta') ?>",
            type: "get",
            data: {
                type: type,
                id: lastSegment,
            },
            dataType: 'json',
        });
    }
</script>


</body>

</html>
