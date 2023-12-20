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
