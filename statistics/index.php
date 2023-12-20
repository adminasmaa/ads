<!DOCTYPE html>
<html lang="en">

<?php

$servername = "localhost";

$username = "mynewhotels_hotels_new_release";

$password = "k&ir7aLLDkh3";

$dbname = "mynewhotels_new_db";

// Create connection

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection

if ($conn->connect_error) {

    die("Connection failed: " . $conn->connect_error);

}

$date = date("Y-m-d");

$result = $conn->query("SELECT * FROM ads where  date(created_at)=date('$date') and type_id='1'  LIMIT 1");
//  print_r($result);die;

if ($result->num_rows > 0) {

    $row = $result->fetch_assoc();
//print_r($row);die;
    $visitor_count = $row['count_visit'];

    $visitor_count = $visitor_count + 1;

    $sql = "UPDATE ads SET count_visit=$visitor_count WHERE date(created_at)=date('$date') and type_id='1' ";
    if ($conn->query($sql) === true) {

        $conn->close();

    }} else {

    $sql = "INSERT INTO ads (count_visit,type_id )

VALUES (1,'1')";

    if ($conn->query($sql) === true) {

        $conn->close();

    }

}

?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>electronkw</title>

    <link href="https://mynewhotels.net/majesticc/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://mynewhotels.net/majesticc/css/bootstrap-rtl.min.css" rel="stylesheet">
    <link href="https://mynewhotels.net/majesticc/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Cairo" rel="stylesheet">

    <!-- End of head section HTML codes -->
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link href="https://mynewhotels.net/majesticc/css/style.css" rel="stylesheet">

    <!-- ================================================== -->
</head>

<body>

    <!-- ==content== -->
    <div class="content">








        <div class="container">
            <div class="email-signature">

                <!-- ==hedar== -->
                <div class="hedar">
                    <div class="hed">
                        <img src="img/logo.png" class="img-responsive center-block">
                    </div>

                </div>
                <!-- ==hedar== -->

            </div>
        </div>




        <!-- ==Contact== -->
        <div class="iconss text-center">
            <div class="container">





                <a href="tel:0096555809080" class="btn btn-lg btn-lg" onclick="count_calls();"
                    oncontextmenu="count_calls();"> <i class="fa fa-phone fa-fw "></i>
                    <span>اتصال </span>
                </a>

                <br>

                <a href="https://wa.me/96555809080" class="btn btn-success btn-lg" onclick="count_whats();"
                    oncontextmenu="count_whats();"> <i class="fa fa-whatsapp fa-fw"></i>
                    مراسلة بالواتساب</a>
                <br />
                <a href="https://www.instagram.com/majestic.estate/?igshid=ZWQyN2ExYTkwZQ%3D%3D"
                    class="btn btn-info btn-lg iconin" onclick="count_insta();" oncontextmenu="count_insta();"> <i
                        class="fa fa-instagram fa-fw "></i> تابعنا على انستغرام </a>

            </div>
        </div>
        <!-- ==Contact== -->






    </div>
    <!-- ==content== -->



    <!-- ==copyright== -->
    <div class="copyright">
        <div class="container">
            <p class="text-center">جميع الحقوق محفوظة © 2022</p>
        </div>
    </div>
    <!-- ==copyright== -->



    <!-- ================================================== -->
    <script src="https://mynewhotels.net/majesticc/js/jquery-2.2.1.min.js"></script>
    <script src="https://mynewhotels.net/majesticc/js/bootstrap.min.js"></script>

    <script>
    function count_calls() {
        var type = "1";
        var url = document.URL;
        var parts = url.split('/');
        var lastSegment = parseInt(parts.pop() || parts.pop());

        var UR = "calls.php";


        var data = {
            type: type,
            id: lastSegment
        };
        $.ajax({

            url: UR,

            type: "POST",

            data: data,

            cache: false,

            dataType: 'html',
            async: false,




        });

    }



    function count_whats() {
        var type = "1";
        var url = document.URL;
        var parts = url.split('/');
        var lastSegment = parseInt(parts.pop() || parts.pop());

        var UR1 = "whats.php";


        var data = {
            type: type,
            id: lastSegment
        };
        $.ajax({

            url: UR1,

            type: "POST",

            data: data,

            cache: false,

            dataType: 'html'

        });

    }

    function count_insta() {
        var type = "1";
        var url = document.URL;
        var parts = url.split('/');
        var lastSegment = parseInt(parts.pop() || parts.pop());

        var UR1 = "insta.php";


        var data = {
            type: type,
            id: lastSegment
        };
        $.ajax({

            url: UR1,

            type: "POST",

            data: data,

            cache: false,

            dataType: 'html'

        });

    }
    </script>






</body>

</html>
