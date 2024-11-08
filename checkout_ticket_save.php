<?php include('session.php');

         
                    //set it to writable location, a place for temp generated PNG files
                    $PNG_TEMP_DIR = dirname(__FILE__).DIRECTORY_SEPARATOR.'temp'.DIRECTORY_SEPARATOR;
                    
                    //html PNG location prefix
                    $PNG_WEB_DIR = 'temp/';
                
                    include "qrlib.php";    
                    
                    //ofcourse we need rights to create temp dir
                    if (!file_exists($PNG_TEMP_DIR))
                        mkdir($PNG_TEMP_DIR);
                    
                    
                    //$filename = $PNG_TEMP_DIR.'test.png';
                    
                    //processing form input
                    //remember to sanitize user input in real-life solution !!!
                    $errorCorrectionLevel = 'H';
                    if (isset($_REQUEST['level']) && in_array($_REQUEST['level'], array('L','M','Q','H')))
                        $errorCorrectionLevel = $_REQUEST['level'];    
                
                    $matrixPointSize = 4;
                    if (isset($_REQUEST['size']))
                        $matrixPointSize = min(max((int)$_REQUEST['size'], 1), 10);
                
                
                    if (isset($_REQUEST['data'])) { 
                    
                        //it's very important!
                        if (trim($_REQUEST['data']) == '')
                            die('data cannot be empty! <a href="?">back</a>');
                            
                        // user data
                        $filename = $PNG_TEMP_DIR.$_GET['seatNum'].'_'.md5($_REQUEST['data'].'|'.$errorCorrectionLevel.'|'.$matrixPointSize).'.png';
                        QRcode::png($_REQUEST['data'], $filename, $errorCorrectionLevel, $matrixPointSize, 2);    
                        
                    } else {    
                    $filename="";
                        //default data
                        //echo 'You can provide data in GET parameter: <a href="?data=like_that">like that</a><hr/>';    
                        //QRcode::png('PHP QR Code :)', $filename, $errorCorrectionLevel, $matrixPointSize, 2);    
                        
                    }
                    
                    
                    $qr_img=$PNG_WEB_DIR.basename($filename);
                    $qr_code=$_POST['data'];
                    $clientLName=$_POST['clientLName'];
                    $clientFName=$_POST['clientFName'];
                    $clientContNum=$_POST['clientContNum'];
                    $event_id=$_GET['event_id'];
                    $prefSeat_id=$_GET['prefSeat_id'];
                    
                    $trans_date=date('m/d/Y');
                    $trans_time=date('h:i:s A');
                    
                    
                    $soldTickCHK_query = $conn->query("SELECT `qr_code` FROM `sold_tickets` WHERE `qr_code`='$qr_code'") or die(mysql_error());
                    if($soldTickCHK_query->rowCount()>0){ ?>
 
                    <script>
                    
                    window.alert('Seat <?php echo $qr_code; ?> already taken... Please re-transact client <?php echo $clientLName.', '.$clientFName; ?>');
                    window.location='home.php';
                    
                    </script>
                    
                    <?php

                    }else{
                        
                    $conn->query("INSERT INTO `sold_tickets` (`qr_img`, `qr_code`, `clientLName`, `clientFName`, `clientContNum`, `event_id`, `prefSeat_id`, `trans_date`, `trans_time`)
    
                    VALUES ('$qr_img', '$qr_code', '$clientLName', '$clientFName', '$clientContNum', '$event_id', '$prefSeat_id', '$trans_date', '$trans_time')");
                    
                    $newCurrentNum=$_GET['currentNum']+1;
                    
                    $conn->query("UPDATE `pref_seat` SET `currentNum`='$newCurrentNum' WHERE `prefSeat_id`='$prefSeat_id'");
                    
                    ?>
 
<script>

window.open('print_ticket.php?seatNum=<?php echo $_GET['seatNum']; ?>&prefSeat_id=<?php echo $_GET['prefSeat_id']; ?>&event_id=<?php echo $_GET['event_id']; ?>&qr_code=<?php echo $qr_code; ?>', '_blank');
window.location='home.php';

</script>

<?php } ?>