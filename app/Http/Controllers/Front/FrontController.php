<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Ads\AdsType;
use App\Models\Galleries;
use App\Models\Services;
use App\Models\Subscriptions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mysqli;

class FrontController extends Controller
{

    ///////////////تسجيل الدخول
    public function login(Request $request)
    {

        $this->validate($request, [
            'phone' => 'required',
            'password' => 'required|min:6',
        ]);
        $request->request->add(['code' => substr($request->full, 0, strlen($request->full) - strlen($request->phone))]);
        if (Auth::guard('client')->attempt($request->only(['phone', 'password', 'code']), $request->get('remember'))) {
            return redirect()->intended('/front');
        }
        return back()->withInput($request->only('phone', 'remember'))->withErrors('البيانات خطا');
    }
    ///////////////////الرثيسيه
    public function index()
    {
        $subs = Subscriptions::all();

        return view('pages.front.component.index_2', compact('subs'));
    }

    public function detail($subscription = '', $adstype = '')
    {

        $sub = $subscription;
        $id = $sub;

        if ($sub == 'all') {
            $subs = Subscriptions::all();
            $ads = AdsType::where('ads_parent_id', $adstype)->get();

            return view('pages.front.component.index', compact('subs', 'adstype', 'ads'));
        } else {
            $gallery = Galleries::where('unit_id', $sub)->get();
            $service = Services::where('unit_id', $sub)->get();
            $sub = Subscriptions::where('id', $id)->first();
            return view('pages.front.component.detail', compact('sub', 'service', 'gallery', 'adstype'));
        }

    }
    public function insta(Request $request)
    {

        $type = $request->type;
        $id = $request->id;

        $servername = 'localhost';

        $username = env('DB_USERNAME');

        $password = env('DB_PASSWORD');

        $dbname = env('DB_DATABASE');

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $date = date("Y-m-d");
        $result = $conn->query("SELECT * FROM ads where  date(created_at)=date('$date') and type_id='$type'  LIMIT 1");
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $visitor_count = $row['count_insta'];
            $visitor_count = $visitor_count + 1;
            $sql = "UPDATE ads SET count_insta=$visitor_count WHERE date(created_at)=date('$date') and type_id='$type' ";
            if ($conn->query($sql) === true) {
                $conn->close();
            }} else {
            $sql = "INSERT INTO ads (count_insta,type_id )
        VALUES (1,$type)";
            if ($conn->query($sql) === true) {
                $conn->close();
            }

        }
    }
    public function details(Request $request)
    {

        $type = $request->type;
        $id = $request->id;
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

        $result = $conn->query("SELECT * FROM ads where  date(created_at)=date('$date') and type_id='$type'  LIMIT 1");
        //  print_r($result);die;

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            //print_r($row);die;
            $visitor_count = $row['count_visit'];

            $visitor_count = $visitor_count + 1;

            $sql = "UPDATE ads SET count_visit=$visitor_count WHERE date(created_at)=date('$date') and type_id='$type' ";
            if ($conn->query($sql) === true) {
                $conn->close();
            }
        } else {
            $sql = "INSERT INTO ads (count_visit,type_id ) VALUES (1,'$type')";

//            if ($conn->query($sql) === true) {
//                $conn->close();
//            }
        }
    }
    public function whats(Request $request)
    {

        $type = $request->type;
        $id = $request->id;

        $servername = 'localhost';

        $username = env('DB_USERNAME');

        $password = env('DB_PASSWORD');

        $dbname = env('DB_DATABASE');

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $date = date("Y-m-d");
        $result = $conn->query("SELECT * FROM ads where  date(created_at)=date('$date') and type_id='$type'  LIMIT 1");
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $visitor_count = $row['count_whats'];
            $visitor_count = $visitor_count + 1;
            $sql = "UPDATE ads SET count_whats=$visitor_count WHERE date(created_at)=date('$date') and type_id='$type' ";
            if ($conn->query($sql) === true) {
                $conn->close();
            }} else {
            $sql = "INSERT INTO ads (count_whats,type_id )
        VALUES (1,$type)";
            if ($conn->query($sql) === true) {
                $conn->close();
            }

        }
    }
    public function calls(Request $request)
    {

        $type = $request->type;
        $id = $request->id;

        $servername = 'localhost';

        $username = env('DB_USERNAME');

        $password = env('DB_PASSWORD');

        $dbname = env('DB_DATABASE');

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $date = date("Y-m-d");
        $result = $conn->query("SELECT * FROM ads where  date(created_at)=date('$date') and type_id='$type'  LIMIT 1");
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $visitor_count = $row['count_call'];
            $visitor_count = $visitor_count + 1;
            $sql = "UPDATE ads SET count_call=$visitor_count WHERE date(created_at)=date('$date') and type_id='$type' ";
            if ($conn->query($sql) === true) {
                $conn->close();
            }} else {
            $sql = "INSERT INTO ads (count_call,type_id )
        VALUES (1,$type)";
            if ($conn->query($sql) === true) {
                $conn->close();
            }

        }
    }

}
