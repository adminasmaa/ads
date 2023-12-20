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



                                        <div class="card-body">

                                            <div class="dt-ext table-responsive">
                                                <table class=" table display  data-table-responsive" id=""
                                                    data-paging='false'>
                                                    <thead>
                                                        <tr>
                                                            <th>الفرع</th>
                                                            <th> العدد</th>

                                                        </tr>
                                                    </thead>

                                                    <tbody id="result_data">

                                                        <tr>
                                                          <td>عدد مرات زيارات الحملة بدون الدخول على أي فرع</td> 
                                                            <td><?php
                                       
    $visitord_count= DB::table('ads')->whereDate('created_at',date($dt1))->where('type_id',$type)->first(); 
    
           if($visitord_count){
             $total_vis=$visitord_count->count_visit;
       }
       else {$total_vis=0;}
       echo $total_vis;
       ?></td>

                                                        </tr>


                                                        <?php foreach ($values as $one) {

	?>
                                                        <tr>
                                                            <td> <?php echo $one['sub']; ?></td>
                                                            <td><?php echo $one['count_value']; ?></td>

                                                        </tr>

                                                        <?php } ?>

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
