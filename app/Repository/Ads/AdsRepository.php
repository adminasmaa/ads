<?php

namespace App\Repository\Ads;

use App\Helpers\Moving;
use App\Http\Requests\ads\adsRequest;
use App\Interface\Ads\AdsRepositoryInterface;
use App\Models\Ads\Ads;
use App\Models\Ads\AdsType;
use App\Models\Subscriptions;
use DateInterval;
use DatePeriod;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdsRepository implements AdsRepositoryInterface
{
    protected $data;
    protected $images = ['img1'];

    public function __construct()
    {
        $this->data['types'] = AdsType::all();

    }

    public function index()
    {
        Moving::getMoving('عرض  الاحصائيات');
        $this->data['ads'] = AdsType::where('ads_parent_id', null)->get();

        return view('pages.ads.ads.index', $this->data);
    }
    public function visitors(Request $request)
    {
        $start = $request->start;
        $type = $request->type;
        $adv_id = $request->adv_id;

        Moving::getMoving('عرض  الاحصائيات');
        $data['get_type'] = AdsType::where('id', $request->adv_id)->first();
        $data['type'] = $request->type;
        $data['ok'] = '';
        $date1 = date("Y-m-d", strtotime("-1 days"));
        $visitor_count = DB::table('ads')->whereDate('created_at', date($date1))->first();

        $d1 = new DateTime('first day of ' . $start);
        $d2 = new DateTime('last day of ' . $start);
        $d1 = $d1->format("Y-m-d");
        $d2 = $d2->format("Y-m-d");

        $begin = new DateTime($d1);
        $end = new DateTime($d2);
        $end->setTime(12, 0);
        $interval = DateInterval::createFromDateString('1 day');
        $period = new DatePeriod($begin, $interval, $end);
        $data['period'] = $period;
        $data['type'] = $adv_id;
        $data['id'] = $adv_id;
        $data['interval'] = $interval;
        $data['stat'] = Ads::where('type_id', $adv_id)->get();

        return view('pages.ads.ads.stat2', $data);
    }

    public function stat_all_details($date, $id2, $id)
    {
        Moving::getMoving('عرض  الاحصائيات');
        $get_childs = AdsType::where('ads_parent_id', $id)->get();
        $stat_type = 'count_' . $id2; // visit , call , whats , insta
        $parent_id = $id;
        $data['type'] = $id;
        $data['ok'] = '';
        $data['dt1']= date("Y-m-d", $date);
        $date1 = date("Y-m-d", $date);
        $values = array();
        foreach ($get_childs as $one) {

            $count = DB::table('ads')->whereDate('created_at', date($date1))->where('type_id', $one->id)->first();
            $sub_name = DB::table('subscriptions')->where('id', $one->sub_id)->first();
            $count_value = $count ? $count->$stat_type : 0;
            $text['sub'] = $sub_name->name ? $sub_name->name : 0;
            $text['count_value'] = $count_value ? $count_value : 0;

            array_push($values, $text);
        }

        $data['values'] = $values;

        return view('pages.ads.ads.stat_branch', $data);

    }
    public function visitors_all(Request $request)
    {
        $start = $request->start;
        $type = $request->type;
        $adv_id = $request->adv_id;

        Moving::getMoving('عرض  الاحصائيات');
        $data['get_type'] = AdsType::where('id', $request->adv_id)->first();
        $data['type'] = $request->type;
        $data['ok'] = '';
        $date1 = date("Y-m-d", strtotime("-1 days"));
        $visitor_count = DB::table('ads')->whereDate('created_at', date($date1))->first();

        $d1 = new DateTime('first day of ' . $start);
        $d2 = new DateTime('last day of ' . $start);
        $d1 = $d1->format("Y-m-d");
        $d2 = $d2->format("Y-m-d");

        $begin = new DateTime($d1);
        $end = new DateTime($d2);
        $end->setTime(12, 0);
        $interval = DateInterval::createFromDateString('1 day');
        $period = new DatePeriod($begin, $interval, $end);
        $data['period'] = $period;
        $data['type'] = $adv_id;
        $data['id'] = $adv_id;
        $data['interval'] = $interval;
        $data['stat'] = Ads::where('type_id', $adv_id)->get();

        return view('pages.ads.ads.stat_all2', $data);
    }

    public function stat_all($id)
    {

        Moving::getMoving('عرض  الاحصائيات');
        $data['get_type'] = AdsType::where('id', $id)->first();
        $data['type'] = $id;
        $data['ok'] = '';
        $date1 = date("Y-m-d", strtotime("-1 days"));

        $visitor_count = DB::table('ads')->whereDate('created_at', date($date1))->first();

        $d1 = new DateTime('first day of this  month');
        $d2 = new DateTime('last day of this month');
        $d1 = $d1->format("Y-m-d");
        $d2 = $d2->format("Y-m-d");

        $begin = new DateTime($d1);
        $end = new DateTime($d2);
        $end->setTime(12, 0);
        $interval = DateInterval::createFromDateString('1 day');
        $period = new DatePeriod($begin, $interval, $end);
        $data['period'] = $period;
        $data['interval'] = $interval;

        $this->data['stat'] = Ads::where('type_id', $id)->get();

        return view('pages.ads.ads.stat_all', $data);

    }
    public function stat($id)
    {

        Moving::getMoving('عرض  الاحصائيات');
        $data['get_type'] = AdsType::where('id', $id)->first();
        $data['type'] = $id;
        $data['ok'] = '';
        $date1 = date("Y-m-d", strtotime("-1 days"));

        $visitor_count = DB::table('ads')->whereDate('created_at', date($date1))->first();

        $d1 = new DateTime('first day of this  month');
        $d2 = new DateTime('last day of this month');
        $d1 = $d1->format("Y-m-d");
        $d2 = $d2->format("Y-m-d");

        $begin = new DateTime($d1);
        $end = new DateTime($d2);
        $end->setTime(12, 0);
        $interval = DateInterval::createFromDateString('1 day');
        $period = new DatePeriod($begin, $interval, $end);
        $data['period'] = $period;
        $data['interval'] = $interval;

        $this->data['stat'] = Ads::where('type_id', $id)->get();

        return view('pages.ads.ads.stat', $data);

    }

    public function create()
    {
        $this->data['subs'] = Subscriptions::all();

        return view('pages.ads.ads.create', $this->data);
    }
    public function store(adsRequest $request)
    {
        $data = $request->validated();
        foreach ($this->images as $image) {
            $data[$image] = Moving::upload($request, 'ads', $image);
        }
        $data['userAdd'] = auth()->user()->id;
        $data['name'] = $request->name;
        $data['start_date'] = $request->start_date;
        $data['end_date'] = $request->end_date;
        $data['value_today'] = $request->add_value;
        $data['sub_id'] = $request->type_id;
        $data['note'] = $request->note;
        if ($request->type_id == 'all') {
            $ads_parent_id = AdsType::create($data)->id;
            $get_all_subscriptions = Subscriptions::all();
            foreach ($get_all_subscriptions as $one) {
                foreach ($this->images as $image) {
                    $data[$image] = Moving::upload($request, 'ads', $image);
                }
                $data1['userAdd'] = auth()->user()->id;
                $data1['name'] = $request->name;
                $data1['start_date'] = $request->start_date;
                $data1['end_date'] = $request->end_date;
                $data1['value_today'] = $request->add_value;
                $data1['sub_id'] = $one->id;
                $data1['note'] = $request->note;
                $data1['ads_parent_id'] = $ads_parent_id;
                AdsType::create($data1);
            }

        } else {AdsType::create($data);}

        toastr()->success('تم حفظ بنجاح');
        Moving::getMoving('حفظ حمله اعلانيه جديدة');

        return redirect()->route('ads.index');
    }
    public function edit($adsType)
    {
        Moving::getMoving('تعديل حملة ');
        $adsType = AdsType::where('id', $adsType)->first();
        $subs = Subscriptions::all();
        return view('pages.ads.ads.edit', compact('adsType', 'subs'));
    }
    public function show($id)
    {}
    public function update(adsRequest $request, AdsType $adsType)
    {
        $data = $request->validated();
        foreach ($this->images as $image) {
            $data[$image] = Moving::upload($request, 'ads', $image);
        }
        //
        $data['userEdit'] = auth()->user()->id;
        $data['name'] = $request->name;
        $data['start_date'] = $request->start_date;
        $data['end_date'] = $request->end_date;
        $data['value_today'] = $request->add_value;
        $data['sub_id'] = $request->type_id;
        $data['note'] = $request->note;
        $adsType->update($data);
        if ($adsType) {
            toastr()->success('تم حفظ بنجاح');
        }

        Moving::getMoving('تعديل حمله اعلانيه ');

        return redirect()->route('ads.index');
    }

    public function destroy($adsType)
    {

        AdsType::where('id', $adsType)->delete();
        toastr()->success('تم الحذف بنجاح');
        Moving::getMoving('حذف وحدة ');
        return back();
    }

}
