<!DOCTYPE html>
<html>

<?php include('header.php'); ?>

  <body>
    <div class="page">
      
    <?php include('top_navbar.php'); ?>
      
      <div class="page-content d-flex align-items-stretch"> 
      
        <?php include('side_navbar.php'); ?>
        
        <div class="content-inner">
          <!-- Page Header-->
          <header class="page-header">
            <div class="container-fluid">
              <h2 class="no-margin-bottom">SOLD TICKETS</h2>
            </div>
          </header>
          <!-- Breadcrumb-->
          <div class="breadcrumb-holder container-fluid">
            <ul class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html">Home</a></li>
              <li class="breadcrumb-item active">Sold Tickets</li>
            </ul>
          </div>
          <section class="tables">   
            <div class="container-fluid">
              <div class="row">
                <div class="col-lg-12">
       
                        <div class="form-group row">
                                <button style="margin-left: 14px;" data-toggle="dropdown" type="button" class="btn btn-outline-secondary dropdown-toggle">Filter by Seats<span class="caret"></span></button>
                                <div class="dropdown-menu">
                                <?php
                                
                                  $seat_query = $conn->query("SELECT * FROM pref_seat") or die(mysql_error());
                                  while ($seat_row = $seat_query->fetch()){ ?>
                                <a href="list_tickets.php?prefSeat_id=<?php echo $seat_row['prefSeat_id']; ?>" class="dropdown-item"><?php echo $seat_row['area_prefix']; ?><small> ( <?php echo $seat_row['desc']; ?> )</small></a>
                                <?php } ?>
                                <a href="list_tickets.php?prefSeat_id=" class="dropdown-item">View All</a>
                                
                                </div>
                        </div>
                 
                        
                        
                  <div class="card">
                  
                    <div class="card-header d-flex align-items-center">
                      <h3 class="h4">Sold Tickets <small>(<?php if($_GET['prefSeat_id']!=''){
                        
                        $seat_query = $conn->query("SELECT * FROM pref_seat") or die(mysql_error());
                        $seat_row = $seat_query->fetch();
                        
                        echo $seat_row['area_prefix'].' - '.$seat_row['desc'];
                                    
                      }else{ echo "All sold tickets"; } ?>)</small></h3>
                    </div>
                    <div class="card-body">
                      <div class="table-responsive">  
                        <table class="table table-striped" id="example">
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>QR Code</th>
                              <th>Client</th>
                              <th>Event</th>
                              <th>Seat</th>
                              <th>Trans Date | Time</th>
                            </tr>
                          </thead>
                          
                          <tbody>
                          
                          <?php
                          $rowCtr=0;
                          
                          if($_GET['prefSeat_id']!=''){
                            $soldTick_query = $conn->query("SELECT * FROM sold_tickets WHERE prefSeat_id='$_GET[prefSeat_id]' ORDER BY trans_id ASC") or die(mysql_error());
                          
                          }else{
                            $soldTick_query = $conn->query("SELECT * FROM sold_tickets ORDER BY trans_id ASC") or die(mysql_error());
                          
                          }
                          
                          
                          
                          while ($stq_row = $soldTick_query->fetch()) 
                          {
                          
                          $event_query = $conn->query("SELECT * FROM pref_event WHERE event_id='$stq_row[event_id]'") or die(mysql_error());
                          $event_row = $event_query->fetch();
                          
                          $seat_query = $conn->query("SELECT * FROM pref_seat WHERE prefSeat_id='$stq_row[prefSeat_id]'") or die(mysql_error());
                          $seat_row = $seat_query->fetch();
                                  
                            $rowCtr=$rowCtr+1;
                            $prefSeat_id=$seat_row['prefSeat_id'];
                                
                          ?>
                          
                            <tr>
                            
                              <th scope="row"><?php echo $rowCtr; ?></th>
                              
                              <td>
                              <center>
                              <img width="50px" height="50px" src="<?php echo $stq_row['qr_img']; ?>" /><br />
                              <small><?php echo $stq_row['qr_code']; ?></small>
                              </center>
                              </td>
                              
                              <td>
                              <?php echo $stq_row['clientLName'].', '.$stq_row['clientFName']; ?><br />
                              <small><?php echo $stq_row['clientContNum']; ?></small>
                              </td>
                              
                              <td>
                              <?php echo $event_row['event_title']; ?><br />
                              <small><?php echo $event_row['event_venue']; ?> &nbsp;&middot;&nbsp;<?php echo $event_row['event_date']; ?></small>
                              </td>
                              
                              <td>
                              <?php echo $seat_row['area_prefix']; ?><br />
                              <small><?php echo $seat_row['desc']; ?></small>
                              </td>
                              
                              
                              <td><?php echo $stq_row['trans_date']; ?> &nbsp;&middot;&nbsp; <?php echo $stq_row['trans_time']; ?></td>
                            </tr>
                            
                          <?php } ?>
                          
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
  
              </div>
            </div>
          </section>
          
          <?php include('footer.php'); ?>

        </div>
      </div>
    </div>
    
    <?php include('script_files.php'); ?>
    
  </body>
</html>