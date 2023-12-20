<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>فنادق وشقق فندقية في الكويت</title>
    <!-- Cairo Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet" />
    <!-- Font Awesome-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet" />

    <!-- Bootstrap-->
    <link rel="stylesheet" href="{{ asset('assets/front/vendor/bootstrap/css/bootstrap.min.css.map') }}"
        type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/front/vendor/bootstrap/css/bootstrap.min.css') }}" type="text/css" />

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('assets/front/styles/styles.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/front/styles/responsive-styles.css') }}" />

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
                <div class="row">
                    <div class="col-12 my-md-5 my-3">
                        <p class="hotel-txt mb-md-0 mb-2">فنادق في الكويت بخدمتكم</p>
                        <h1 class="hotel-title mb-md-0 mb-3">بخدمات مميزة</h1>
                    </div>
                </div>
                <div class="row hotel-details" id="slideshow">

                    <?php foreach ($ads as $ad1){ ?>
                    <?php $sub = App\Models\Subscriptions::where('id', $ad1->sub_id)->first();
                    
                    ?>
                    <div class="col-lg-4 col-12">
                        <div class="card-hotel mb-lg-0 mb-5">
                            <div id="slides"> <?php $i = 1; ?>
                                <div class="slide show" data-slide="<?= $i ?>">
                                  <img
                                            src="{{ asset('storage/' . $sub->img) }}" alt="hotel details" />

                                    
                                </div>
                            </div>
                            <div class="card-hotel-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h2><?= $sub->name ?></h2>
                                    <div>
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" class="icon-hotel">
                                                <path
                                                    d="M11.99 2C6.47 2 2 6.48 2 12C2 17.52 6.47 22 11.99 22C17.52 22 22 17.52 22 12C22 6.48 17.52 2 11.99 2ZM15.29 16.71L11 12.41V7H13V11.59L16.71 15.3L15.29 16.71Z"
                                                    fill="#FF8412" />
                                            </svg>
                                        </span>
                                        <span class="txt-time" style="    font-size: 12px;"> <?= $sub->details ?></span>
                                    </div>
                                </div>
                                <div class="py-2">
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" class="icon-hotel">
                                            <path
                                                d="M18.157 16.882L16.97 18.056C16.095 18.914 14.96 20.018 13.564 21.368C13.1444 21.7737 12.5836 22.0005 12 22.0005C11.4163 22.0005 10.8555 21.7737 10.436 21.368L6.94497 17.972C6.50497 17.541 6.13897 17.178 5.84297 16.882C4.62534 15.6643 3.79614 14.1128 3.46023 12.4239C3.12432 10.7349 3.29678 8.98424 3.95581 7.39328C4.61484 5.80232 5.73084 4.44251 7.16269 3.4858C8.59453 2.52909 10.2779 2.01845 12 2.01845C13.722 2.01845 15.4054 2.52909 16.8373 3.4858C18.2691 4.44251 19.3851 5.80232 20.0441 7.39328C20.7032 8.98424 20.8756 10.7349 20.5397 12.4239C20.2038 14.1128 19.3746 15.6643 18.157 16.882ZM14.5 11C14.5 10.337 14.2366 9.70108 13.7677 9.23224C13.2989 8.7634 12.663 8.50001 12 8.50001C11.3369 8.50001 10.701 8.7634 10.2322 9.23224C9.76337 9.70108 9.49997 10.337 9.49997 11C9.49997 11.663 9.76337 12.2989 10.2322 12.7678C10.701 13.2366 11.3369 13.5 12 13.5C12.663 13.5 13.2989 13.2366 13.7677 12.7678C14.2366 12.2989 14.5 11.663 14.5 11Z"
                                                fill="#3086F2" />
                                        </svg>
                                    </span>
                                    <span class="txt-location">منطقة <?= $sub->area ?></span>
                                    
                                    
                                  
                                    
                                </div>
                            </div>
                            <div class="border-top-bottom d-flex">
                                <a href="tel:<?= $sub->call_phone ?>"
                                    class="d-flex justify-content-center align-items-center w-50 border-left py-2"
                                    onclick="count_calls(<?= $ad1->id ?>);"
                                    oncontextmenu="count_calls(<?= $ad1->id ?>);">
                                    <span>
                                        <img class="details-icon phone-icon"
                                            src="{{ asset('assets/front/images/call.png') }}" alt="call" />
                                    </span>
                                    <span class="h2 send-msg">اتصال</span>
                                </a>
                                <a href="https://wa.me/<?= $sub->msg_phone ?>" onclick="count_whats(<?= $ad1->id ?>);"
                                    oncontextmenu="count_whats(<?= $ad1->id ?>);"
                                    class="d-flex justify-content-center align-items-center w-50 py-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#80c23f"
                                        class="bi bi-whatsapp" viewBox="0 0 16 16">
                                        <path
                                            d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z" />
                                    </svg>
                                    <span class="h2 send-msg">واتس اب</span>
                                </a>
                            </div>


                            <div class="border-top-bottom d-flex">
                                <a href="{{ route('front.detail', $sub->id) }}"
                                    class="d-flex justify-content-center align-items-center w-50 border-left py-2"
                                    onclick="count_details(<?= $ad1->id ?>);"
                                    oncontextmenu="count_details(<?= $ad1->id ?>);">
                                    <span>
                                        <i class="fa fa-align-justify" aria-hidden="true" style="color:#3bc119"></i>
                                    </span>
                                    <span class="h2 send-msg">تفاصيل</span>
                                </a>
                                <a href="<?= $sub->location ?>"
                                    class="d-flex justify-content-center align-items-center w-50 py-2">

                                    <i class="fa fa-map-marker" style="color:#3bc119"></i>
                                    <span class="h2 send-msg">لوكيشن</span>
                                </a>
                            </div>







                        </div>
                    </div>

                    <?php } ?>

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
                            alt="footer image" />
                    </div>
                    <div class="mobile-view">
                        <img class="footer-image" src="{{ asset('assets/front/images/footer-img-mob.png') }}"
                            alt="footer image" />
                    </div>
                </div>
                <div class="footer-content">
                    <div>
                        <div class="footer-title"><a href="tel:0096567772030">0096567772030</a></div>
                        <div class="d-flex align-items-center">
                            <div class="footer-icon">
                                <img src="{{ asset('assets/front/images/customer-support.png') }}"
                                    alt="customer support" />
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
        function count_calls(adstype) {
            var type = adstype;
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



        function count_whats(adstype) {
            var type = adstype;
            var url = document.URL;
            var parts = url.split('/');
            var lastSegment = parseInt(parts.pop() || parts.pop());

            var type = adstype;
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

        function count_details(adstype) {
            var type = adstype;
            var url = document.URL;
            var parts = url.split('/');
            var lastSegment = parseInt(parts.pop() || parts.pop());
            var type = adstype;
            var url = document.URL;
            var parts = url.split('/');
            var lastSegment = parseInt(parts.pop() || parts.pop());
            $.ajax({
                url: "<?= url('front/details') ?>",
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
