@extends('layouts.admin')
@section('title', 'الحملات الاعلانية')
@section('content')
    <?php
    use Illuminate\Support\Facades\DB;
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12" id="class-content">
                <div class="email-right-aside bookmark-tabcontent">
                    <div class="card email-body radius-left">
                        <div class="ps-0">
                            <div class="tab-content">
                                <div class="tab-pane fade active show" id="banks" role="tabpanel"
                                    aria-labelledby="banks-tab">
                                    <div class="card mb-0">
                                        <div class="card-header" style="display:none;">


                                        </div>

                                        <div class="card-header">

                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <label>اختر الشهر</label>

                                                    <input class="form-control" type="month" id="start" name="start"
                                                        min="2018-03" value="<?= date('Y-m') ?>" onchange="GetData();">
                                                </div>
                                                <div class="col-sm-4"></div>
                                                <div class="col-sm-4">
                                                    <label>نسخ الرابط</label>
                                                    <input class="form-control" type="text" id="link" name="link"
                                                        value="<?= url('/front/details/' . $get_type->sub_id . '/' . $get_type->id) ?>"
                                                        disabled />
                                                </div>


                                            </div>
                                        </div>
                                        <?php
                                        $price = $get_type->value_today;
                                        $DateBegin1 = strtotime($get_type->start_date);
                                        $DateEnd1 = strtotime($get_type->end_date);
                                        ?>
                                        <br><br>

                                        <div class="card-body">

                                            <div class="dt-ext table-responsive">
                                                <table class=" table display  data-table-responsive" id=""
                                                    data-paging='false'>
                                                    <thead>
                                                        <tr>
                                                            <th>اليوم</th>
                                                            <th>سعر اليوم</th>
                                                            <th>عدد الزيارات</th>
                                                            <th>عدد ضغطات الاتصال</th>
                                                            <th>عدد ضغطات الواتساب</th>
                                                            <th>عدد ضغطات الانستجرام</th>

                                                        </tr>
                                                    </thead>

                                                    <tbody id="result_data">

                                                        <?php foreach ($period as $dt) {
                        $dt1=$dt->format("Y-m-d");
	                     $Date1 = strtotime($dt1);
                   $ads = App\Models\Ads\AdsType::where('ads_parent_id', $type)->get();   // 16,17,18

                    $total_visit=0;$total_call=0;$total_whats=0;$total_insta=0;
 //print_r($ads);exit;
 
    $visitord_count= DB::table('ads')->whereDate('created_at',date($dt1))->where('type_id',$type)->first();
       if($visitord_count){
             $total_vis=$visitord_count->count_visit;
       }
       else {$total_vis=0;}
                    foreach ($ads as $one_ad) {
                       
                        $visitor_count= DB::table('ads')->whereDate('created_at',date($dt1))->where('type_id',$one_ad->id)->first();
        if($visitor_count){
             $total_visit=$total_visit+$visitor_count->count_visit;
                            $total_call=$total_call+$visitor_count->count_call;
                            $total_whats=$total_whats+$visitor_count->count_whats;
                            $total_insta=$total_insta+$visitor_count->count_insta;
                        }
                    }


	?>
                                                        <tr>
                                                            <td> <?php echo $dt1; ?></td>
                                                            <td> <?php if ($Date1 >= $DateBegin1 && $Date1 <= $DateEnd1) {
                                                                echo $price;
                                                            } else {
                                                                echo '0';
                                                            } ?></td>
                                                            <td>
                                                <a <?php $v = 'visit'; ?>
                                                                    href="{{ route('ads.stat_all_details', strtotime($dt1) . '/' . $v . '/' . $type) }}"><?= $total_vis ?></a>
                                                            </td>
                                                            <td><a <?php $v = 'call'; ?>
                                                                    href="{{ route('ads.stat_all_details', strtotime($dt1) . '/' . $v . '/' . $type) }}"><?= $total_call ?></a>
                                                            </td>
                                                            <td><a <?php $v = 'whats'; ?>
                                                                    href="{{ route('ads.stat_all_details', strtotime($dt1) . '/' . $v . '/' . $type) }}"><?= $total_whats ?></a>
                                                            </td>
                                                            <td><a <?php $v = 'insta'; ?>
                                                                    href="{{ route('ads.stat_all_details', strtotime($dt1) . '/' . $v . '/' . $type) }}"><?= $total_insta ?></a>
                                                            </td>
                                                        </tr>

                                                        <?php } ?>

                                                    </tbody>
                                                    <tbody id="result_data1" style="display:none;">



                                                    </tbody>

                                                    <tfoot>

                                                    </tfoot>
                                                </table>
                                            </div>

                                        </div>



















                                    </div>
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
    <script>
        function addUrlParameter(name, value) {
            var searchParams = new URLSearchParams(window.location.search)
            searchParams.set(name, value)
            window.location.search = searchParams.toString()
        }
    </script>
    <script>
        function GetData()

        {
            $("#result_data").hide();
            var start = $('#start').val();
            var type = "<?php echo $get_type->sub_id; ?>";
            var adv_id = "<?php echo $get_type->id; ?>";
            var data = {

            };
            $.ajax({

                url: "<?= url('ads/visitors_all') ?>",
                type: "get",
                data: {
                    start: start,
                    type: type,
                    adv_id: adv_id
                },
                cache: false,
                success: function(html) {
                    $('#result_data').hide();
                    $("#result_data1").show();

                    var element = $('#result_data1');
                    element.empty();
                    $('#result_data1').html(html);

                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                }

            });


        }
    </script>
@endsection
