<?php include('session.php'); ?>

<?php

$soldTick_query = $conn->query("SELECT * FROM sold_tickets WHERE qr_code='$_GET[qr_code]'") or die(mysql_error());
$stq_row = $soldTick_query->fetch();

$seat_query = $conn->query("SELECT * FROM pref_seat WHERE prefSeat_id='$_GET[prefSeat_id]'") or die(mysql_error());
$seat_row = $seat_query->fetch();

$event_query = $conn->query("SELECT * FROM pref_event WHERE event_id='$_GET[event_id]'") or die(mysql_error());
$event_row = $event_query->fetch();
                          
?>

<table style="border: 1px dotted black; width: 40%; height: 10%; background-color: yellow;">
<tr>
<td style="width: 25%; background-color: white;">
<center>
<img src="<?php echo $stq_row['qr_img']; ?>" />
</center>
</td>

<td style="padding: 0px;">
<table style="border: 1px dotted black; width: 100%; height: 100%; background-color: green;">
<tr>
<td style="font-size: medium; font-weight: bold; color: white;">
<center>
<?php echo strtoupper($event_row['event_title']); ?><br />
<small style="font-weight: lighter; color: white;"><?php echo $event_row['event_venue']; ?> &middot; <?php echo $event_row['event_date']; ?></small>
</center>
</td>
</tr>

<tr>
<td style="font-size: smaller; color: white;"><center>~ ~ o o O o o ~ ~</center></td>
</tr>

<tr>
<td>
<center>
<u style="font-size: larger; color: white;">
<strong><?php echo $seat_row['area_prefix']; ?> Ticket @ Php <?php echo $seat_row['ticket_price']; ?>.00</strong>
</u> <br />
<small style="color: white;"><?php echo $seat_row['desc']; ?></small>
</center>
</td>
</tr>
</table>
</td>
</tr>
 
</table>
