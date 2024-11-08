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
              <h2 class="no-margin-bottom">EVENT PREFERENCES</h2>
            </div>
          </header>
          <!-- Breadcrumb-->
          <div class="breadcrumb-holder container-fluid">
            <ul class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html">Home</a></li>
              <li class="breadcrumb-item active">Event Preferences</li>
            </ul>
          </div>
          <section class="tables">   
            <div class="container-fluid">
              <div class="row">
                 
                
                
                <div class="col-lg-12">
                  <div class="card">
                    <div class="card-close">
                 
                    </div>
                    <div class="card-header d-flex align-items-center">
                      <h3 class="h4">
                      <a data-toggle="modal" data-target="#myModal" class="btn btn-primary btn-sm" style="color: white;" title="Click to add event..."> <i class="fa fa-plus"></i></a>
                      List of Events</h3>
                    </div>
       
                      <!-- Modal-->
                      <div id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                        <div role="document" class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 id="exampleModalLabel" class="modal-title">Add Event</h4>
                              <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                            </div>
                            
                            <form action="event_pref_save.php" method="POST">
                            
                            <div class="modal-body">
                              
                                <div class="form-group">
                                  <label>Title</label>
                                  <input name="event_title" type="text" placeholder="Enter event title..." class="form-control" required>
                                </div>
                                
                                <div class="form-group">
                                  <label>Date</label>
                                  <input name="event_date" type="text" placeholder="Enter event date..." class="form-control" required>
                                </div>
                                
                                
                                <div class="form-group">
                                  <label>Venue</label>
                                  <input name="event_venue" type="text" placeholder="Enter event venue..." class="form-control" required>
                                </div>
                                 
                                 
                              
                            </div>
                            <div class="modal-footer">
                              <a data-dismiss="modal" class="btn btn-secondary">Close</a>
                              <button name="add_event_pref" class="btn btn-primary">Save</button>
                            </div>
                            
                            </form>
                            
                          </div>
                        </div>
                      </div>
                     
                     
                    <div class="card-body">
                      <div class="table-responsive">  
                        <table class="table table-striped" id="example">
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>Event Title</th>
                              <th>Event Date</th>
                              <th>Event Venue</th>
                              <th></th>
                            </tr>
                          </thead>
                          <tbody>
                          
                          
                          <?php
                          $rowCtr=0;
                          $event_query = $conn->query("select * FROM pref_event") or die(mysql_error());
                          while ($event_row = $event_query->fetch()) 
                          {
                            
                            $rowCtr=$rowCtr+1;
                            $event_id=$event_row['event_id'];
                                
                          ?>
                                
                            <tr>
                              <th scope="row"><?php echo $rowCtr ?></th>
                              <td><?php echo $event_row['event_title']; ?></td>
                              <td><?php echo $event_row['event_date']; ?></td>
                              <td><?php echo $event_row['event_venue']; ?></td>
                              
                              <td>
                              <a style="color: white !important; margin-bottom: 8px;" data-toggle="modal" data-target="#editEventModal<?php echo $event_id; ?>" href="#" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
                              <a style="color: white !important; margin-bottom: 8px;" data-toggle="modal" data-target="#deleteEventModal<?php echo $event_id; ?>" href="#" class="btn btn-danger btn-sm"><i class="fa fa-times"></i></a>
                              </td>
                            </tr>
                           
                
                      <!-- Modal-->
                      <div id="editEventModal<?php echo $event_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                        <div role="document" class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 id="exampleModalLabel" class="modal-title">Edit Event</h4>
                              <button style="visibility: hidden;" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                            </div>
                            
                            <form action="event_pref_save.php" method="POST">
                            
                            
                            <input type="hidden" name="event_id" value="<?php echo $event_id; ?>" />
                            
                            <div class="modal-body">
                              
                                <div class="form-group">
                                  <label>Title</label>
                                  <input value="<?php echo $event_row['event_title']; ?>" name="event_title" type="text" placeholder="Enter event title..." class="form-control" required>
                                </div>
                                
                                <div class="form-group">
                                  <label>Date</label>
                                  <input value="<?php echo $event_row['event_date']; ?>" name="event_date" type="text" placeholder="Enter event date..." class="form-control" required>
                                </div>
                                
                                
                                <div class="form-group">
                                  <label>Venue</label>
                                  <input value="<?php echo $event_row['event_venue']; ?>" name="event_venue" type="text" placeholder="Enter event venue..." class="form-control" required>
                                </div>
                                 
                                 
                              
                            </div>
                            <div class="modal-footer">
                              <a data-dismiss="modal" class="btn btn-secondary">Close</a>
                              <button name="updateEventModal" class="btn btn-primary">Update</button>
                            </div>
                            
                            </form>
                            
                          </div>
                        </div>
                      </div>
                      
                      
                      
                      <!-- Modal-->
                      <div id="deleteEventModal<?php echo $event_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                        <div role="document" class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 id="exampleModalLabel" class="modal-title">Delete Event</h4>
                              <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                            </div>
                            
                            <form action="event_pref_save.php" method="POST">
                            
                            <input type="hidden" name="event_id" value="<?php echo $event_id; ?>" />
                            
                            <div class="modal-body">
                              
                                <div class="form-group">
                                <h5>Do you want to delete event?</h5>
                                <h6>
                                <?php echo "Title: ".$event_row['event_title']; ?><br />
                                <?php echo "Date: ".$event_row['event_date']; ?><br />
                                <?php echo "Venue: ".$event_row['event_venue']; ?>
                              
                              
                                </h6>
                                </div>
                             
                            </div>
                            <div class="modal-footer">
                              <a data-dismiss="modal" class="btn btn-secondary">No</a>
                              <button name="delete_event_pref" class="btn btn-danger">Yes</button>
                            </div>
                            
                            </form>
                            
                          </div>
                        </div>
                      </div>
                     
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