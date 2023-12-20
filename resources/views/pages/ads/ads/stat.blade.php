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

	//

	               $visitor_count= DB::table('ads')->whereDate('created_at',date($dt1))->where('type_id',$type)->first();


	?>
                                                        <tr>
                                                            <td> <?php echo $dt1; ?></td>
                                                            <td> <?php if ($Date1 >= $DateBegin1 && $Date1 <= $DateEnd1) {
                                                                echo $price;
                                                            } else {
                                                                echo '0';
                                                            } ?></td>
                                                            <td><?= $visitor_count ? $visitor_count->count_visit : 0 ?>
                                                            </td>
                                                            <td><?= $visitor_count ? $visitor_count->count_call : 0 ?>
                                                            </td>
                                                            <td><?= $visitor_count ? $visitor_count->count_whats : 0 ?>
                                                            </td>
                                                            <td><?= $visitor_count ? $visitor_count->count_insta : 0 ?>
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

                url: "<?= url('ads/visitors') ?>",
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
