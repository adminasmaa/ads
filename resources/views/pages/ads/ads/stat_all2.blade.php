<?php
use Illuminate\Support\Facades\DB;
?>
<?php
$price = $get_type->value_today;
$DateBegin1 = strtotime($get_type->start_date);
$DateEnd1 = strtotime($get_type->end_date);
?>

<?php foreach ($period as $dt) {
$dt1=$dt->format("Y-m-d");
$Date1 = strtotime($dt1);

//
$ads = App\Models\Ads\AdsType::where('ads_parent_id', $type)->get();

$total_visit=0;$total_call=0;$total_whats=0;$total_insta=0;

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
    <td><a href="{{ route('ads.stat_all_details', 'visit/' . $type) }}"><?= $total_visit ?></a>
    </td>
    <td><a href="{{ route('ads.stat_all_details', 'call/' . $type) }}"><?= $total_call ?></a>
    </td>
    <td><a href="{{ route('ads.stat_all_details', 'whats/' . $type) }}"><?= $total_whats ?></a>
    </td>
    <td><a href="{{ route('ads.stat_all_details', 'insta', $type) }}"><?= $total_insta ?></a>
    </td>
</tr>

<?php } ?>
