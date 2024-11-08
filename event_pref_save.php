<?php include('session.php'); ?>
 
<?php

if(isset($_POST['add_event_pref']))
{
    $event_title=$_POST['event_title'];
    $event_date=$_POST['event_date']; 
    $event_venue=$_POST['event_venue']; 
    
    $conn->query("INSERT INTO pref_event(event_title, event_date, event_venue)
    VALUES ('$event_title', '$event_date', '$event_venue')");
?>

<script>
window.alert('Event <?php echo $event_title.' ('.$event_date .' | '.$event_venue.') '; ?> successfully added.');
window.location='event_list.php';
</script>

<?php } ?>


<?php

if(isset($_POST['updateEventModal']))
{   
    
    $event_title=$_POST['event_title'];
    $event_date=$_POST['event_date']; 
    $event_venue=$_POST['event_venue']; 
 
    $event_id=$_POST['event_id'];
    
    $conn->query("UPDATE pref_event SET event_title='$event_title', event_date='$event_date', event_venue='$event_venue' WHERE event_id='$event_id'");
?>

<script>
window.alert('Event <?php echo $event_title.' ('.$event_date .' | '.$event_venue.') '; ?> successfully updated.');
window.location='event_list.php';
</script>

<?php } ?>



<?php

if(isset($_POST['delete_event_pref']))
{
    $event_id=$_POST['event_id'];
     
    $conn->query("DELETE FROM pref_event WHERE event_id='$event_id'");
?>

<script>
window.alert('Event successfully deleted...');
window.location='event_list.php';
</script>

<?php } ?>