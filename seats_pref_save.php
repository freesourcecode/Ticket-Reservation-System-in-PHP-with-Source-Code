<?php include('session.php'); ?>
 
<?php

if(isset($_POST['add_seat_pref']))
{
    $event_id=$_POST['event_id'];
    $area_prefix=$_POST['area_prefix'];
    $desc=$_POST['desc'];
    $max_seat=$_POST['max_seat'];
    $ticket_price=$_POST['ticket_price']; 
    
    $conn->query("INSERT INTO `pref_seat` (`event_id`, `area_prefix`, `max_seat`, `desc`, `ticket_price`)
    
    VALUES ('$event_id', '$area_prefix', '$max_seat', '$desc', '$ticket_price')");
?>

<script>
window.alert('Seat details <?php echo $area_prefix.' ('.$desc .' | Max Seat: '.$max_seat.')'; ?> successfully added.');
window.location='seats_list.php';
</script>

<?php } ?>


<?php

if(isset($_POST['updateSeatModal']))
{   
    $prefSeat_id=$_POST['prefSeat_id'];
    $event_id=$_POST['event_id'];
    $area_prefix=$_POST['area_prefix'];
    $desc=$_POST['desc'];
    $max_seat=$_POST['max_seat'];
    $ticket_price=$_POST['ticket_price']; 
    
    $conn->query("UPDATE `pref_seat` SET `event_id`='$event_id', `area_prefix`='$area_prefix', `max_seat`='$max_seat', `desc`='$desc', `ticket_price`='$ticket_price' WHERE `prefSeat_id`='$prefSeat_id'");
    
?>

<script>
window.alert('Seat details <?php echo $area_prefix.' ('.$desc .' | Max Seat: '.$max_seat.')'; ?> successfully updated.');
window.location='seats_list.php';
</script>

<?php } ?>



<?php

if(isset($_POST['delete_seat_pref']))
{
    $prefSeat_id=$_POST['prefSeat_id'];
     
    $conn->query("DELETE FROM pref_seat WHERE prefSeat_id='$prefSeat_id'");
?>

<script>
window.alert('Seat details successfully deleted...');
window.location='seats_list.php';
</script>

<?php } ?>