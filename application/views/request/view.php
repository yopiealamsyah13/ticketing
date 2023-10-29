<?php 
    $baris = $view->row();
    $id_user = $this->session->userdata('id');
    $id_role = $this->session->userdata('id_role_ticket');
    $id_job_grade = $this->session->userdata('id_job_grade');
    $id_departemen = $this->session->userdata('id_departemen');
?>

<style>
#attachmentImg {
  width: 130px;
  height: 130px;
  text-align: center;
  border:1px dashed #999;
  background-color:#f9f9f9;
}
</style>
<section class="content-header">
  <h1>TICKET<small>[<?php echo strtoupper($baris->id_ticket);?>]</small></h1>
  <ol class="breadcrumb">
    <li>Ticket</li>
    <li>List</li>
    <li class="active">View</li>
  </ol>
</section>
<section class="content">
<div class="row">
    <div class="col-md-8">
    <div class="box box-widget">
    <div class="box-header with-border">
    <div class="user-block">
    <img class="img-circle" src="<?php echo base_url(); ?>assets/photo/<?php if($baris->photo !=''){echo $baris->photo;}else{echo "blank.jpg";}?>" alt="User Image">
    <span class="username"><a href="#"><?php echo $baris->name_user;?></a></span>
    <span class="username"><?php echo $baris->request_subject;?></span>
    <span class="description"><span class="label  <?php if($baris->id_request_level == 1){ echo 'label-default'; }else if($baris->id_request_level == 2){ echo 'label-info';}else{ echo 'label-danger';} ?>"><?php echo strtoupper($baris->name_request_level);?></span> <?php echo $baris->name_request_category;?> - <?php echo date('d M Y',strtotime($baris->request_date));?></span>
    </div>
    <div class="box-tools">
      <?php if($baris->id_request_status == '1'){ ?>
      <span class="label label-primary">Pending</span>
      <?php }else if($baris->id_request_status == '2'){ ?>
      <span class="label label-warning">On Progress</span>
      <?php }else if($baris->id_request_status == '3'){ ?>
      <span class="label label-success">Completed</span>
      <?php }else{ ?>
      <span class="label bg-black">Closed</span>
      <?php }?>
    </div>
    </div>
    <div class="box-body">
    <p>
    <?php echo $baris->request_description;?>
    </p>
    <?php if(count($attachment->result()) > 0){ ?>
    <div class="attachment-block clearfix">
    <p><b><i>Request Attachment</i></b></p>
    <?php foreach ($attachment->result() as $rowa){ ?>
      <p>
        <a href="<?php echo base_url();?>myfile/<?php echo $rowa->name_request_attachment; ?>" target="_blank"><i class="fa fa-paperclip"></i><?php echo $rowa->name_request_attachment;?><i></i></a>
        <?php if($id_user == $baris->request_by && $baris->id_request_status == '1' || $baris->id_request_status == '2'){ ?>
        <span class="text-muted pull-right"><a href="<?php echo site_url(); ?>/request/delete_attachment/<?php echo $rowa->id_request_attachment; ?>/<?php echo $rowa->id_request; ?>" onClick='return confirm("Are you sure?")'><i class="fa fa-trash"></i></a></span>
        <?php } ?>
      </p>
    <?php }?>
    </div>
    <?php }?>
    <hr>
    <span class="pull-left text-muted">
          <?php if($baris->estimation_time != '0000-00-00 00:00:00'){ ?>
          <small>Estimation : 
            <?php
              $now = new DateTime($baris->claim_date);  //mengambil tanggal sekarang
              $datec = new DateTime($baris->estimation_time); //mengambil tanggal data di input
              $diff = $now->diff($datec);
          
              if($diff->format('%a')>0){ //jika perbedaan antara tanggal data diinput dan dibutuhkan lebih dari 2 dengan format hari
                echo date('d M Y',strtotime($baris->estimation_time))." (".$diff->format('%a Days').")";
              }elseif($diff->format('%h')>0) { //jika perbedaan antara tanggal data diinput dan dibutuhkan lebih dari 0 dengan format jam
                echo date('d M Y',strtotime($baris->estimation_time))." (".$diff->format('%h Hours').")";
              }
            }?>
          </small>
    </span>
    <span class="pull-right text-muted">
      <?php if($baris->id_request_status != '1'){ ?>
        <a href="https://wa.me/<?php if($id_user == $baris->request_by){ echo $baris->phone_handle_user; }else{ echo $baris->phone_requester; } ?>" target="_blank" class="btn btn-default btn-sm"><i class="fa fa-whatsapp" style="color:green;"></i> WhatsApp</a>
      <?php } ?>
      <?php if($baris->id_request_status == '4'){ ?>
        <a href="<?php echo site_url('request/print_ticket/'.$baris->id_request); ?>" target="_blank" class="btn btn-default btn-sm"><i class="fa fa-print"></i> Print</a>
      <?php } ?>
      <?php if($baris->id_request_status == '1' || $baris->id_request_status == '2'){ ?>
        <?php if($id_user == $baris->request_by){ ?>
        <button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#modal-edit"><i class="fa fa-edit "></i> Edit</button>
        <?php }else if($id_user == $baris->handle_by){ ?>
        <button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#modal-edit"><i class="fa fa-edit "></i> Edit</button>
        <?php } ?>
      <?php } ?>
      <?php if($baris->id_request_status == '3' && $id_user == $baris->handle_by){ ?>
        <button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#modal-edit-admin"><i class="fa fa-edit "></i> Edit</button>
        <?php } ?>
    <?php if($id_user == $baris->request_by){ ?>
      <?php if($baris->id_request_status == '1'){ ?>
      <a href="<?php echo site_url('request/delete_request/'.$baris->id_request); ?>" onClick='return confirm("Delete this ticket ?")' class="btn btn-default btn-sm"><i class="fa fa-close"></i> Delete</a>
      <?php } ?>
      <?php if($baris->id_request_status == '2' || $baris->id_request_status == '3'){?>
      <a  href="<?php echo site_url('request/closed_ticket/'.$baris->id_request); ?>" rel="tooltip" data-placement="top" title="Close" onClick='return confirm("Close this ticket ?")' class="btn btn-default btn-sm"><i class="fa fa-check"></i> Close</a>
      <?php } ?>
    <?php } ?>
    <?php if($id_role == '1' || $id_role == '3'){ ?>
      <?php if($baris->id_request_status == '1' && $id_departemen == $baris->request_to ){ ?>
        <button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#modal-claim"><i class="fa fa-hand-paper-o"></i> Claim</button>
      <?php } ?>
      <?php if($id_user == $baris->handle_by){ ?>
        <?php if($baris->id_request_status == '2'){ ?>
        <button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#modal-assignment"><i class="fa fa-share"></i> Assign To</button>
        <button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#modal-submit"><i class="fa fa-check"></i> Submit</button>
        <?php } ?>
      <?php } ?>
    <?php } ?>
    </span>
    </div>
    </div>

    <div class="box box-widget">
    <div class="box-header with-border">
        <div class="user-block">
        <h4><b>COMMENT</b></h4>
        </div>
    </div>
    <div class="box-footer box-comments">

    <?php 
    if(count($comment->result()) > 0) {
    foreach($comment->result() as $rowc){ ?>
    <div class="box-comment">
    <img class="img-circle img-sm" src="<?php echo base_url(); ?>assets/photo/<?php if($rowc->photo !=''){echo $rowc->photo ;}else{echo "blank.jpg";}?>" alt="User Image">
    <div class="comment-text">
    <span class="username">
    <?php echo $rowc->name_user; ?>
    <span class="text-muted pull-right">
    <?php 
      date_default_timezone_set('Asia/Jakarta');
      $now = new DateTime('now');  //mengambil tanggal sekarang
      $datec = new DateTime($rowc->date_comment); //mengambil tanggal data di input
      $diff = $now->diff($datec);
      
          if($diff->format('%a')>2){ //jika perbedaan antara tanggal data diinput dan dibutuhkan lebih dari 2 dengan format hari
            echo date('d M y',strtotime($rowc->date_comment))." at ".date('H:i',strtotime($rowc->date_comment));
          }elseif($diff->format('%a')>=1){ //jika perbedaan antara tanggal data diinput dan dibutuhkan tidak lebih dari 1 hari yang lalu
            echo 'yesterday at '.date('H:i',strtotime($rowc->date_comment));
          }elseif($diff->format('%h')>0) { //jika perbedaan antara tanggal data diinput dan dibutuhkan lebih dari 0 dengan format jam
            echo $diff->format('%h hrs ago');
          }elseif($diff->format('%i')>0) { //jika perbedaan antara tanggal data diinput dan dibutuhkan lebih dari 0 dengan format menit
            echo $diff->format('%i mins ago');
          }elseif($diff->format('%s')>0) { //jika perbedaan antara tanggal data diinput dan dibutuhkan lebih dari 0 dengan format menit
            echo $diff->format('%s secs ago');
          }
    ?>
    <?php if($baris->id_request_status != '3' && $baris->id_request_status != '4'){ ?>
    <?php if($rowc->id_user==$id_user){?><a href="<?php echo site_url(); ?>/request/delete_comment/<?php echo $baris->id_request; ?>/<?php echo $rowc->id_request_comment; ?>" onClick='return confirm("Are you sure?")'><i class="fa fa-trash"></i></a><?php }}?>  
  </span>
    </span>
    <?php echo $rowc->note_comment; ?>
    </div>
    </div>
    <?php }}else{ ?>
    <div class="box-comment">
      No Comment
    </div>
    <?php } ?>

    <!-- /.box-footer -->
    <div class="box-footer">
        <form name="form-validate" id="formComment" enctype="multipart/form-data" class="form-horizontal" method="post" action="<?php echo site_url(); ?>/request/add_comment/<?php echo $baris->id_request; ?>/<?php echo $baris->id_request_status; ?>">
        <img class="img-responsive img-circle img-sm" src="<?php echo base_url(); ?>assets/photo/<?php if($baris->photo !=''){echo $baris->photo;}else{echo "blank.jpg";}?>">
        <!-- .img-push is used to add margin to elements next to floating images -->
        <div class="img-push">
            <div class="input-group input-group-sm">
            <input type="text" class="form-control input-sm" name="note_comment" placeholder="Write your comment here" autocomplete="off">
            <span class="input-group-btn">
                <button type="submit" id="comment" class="btn btn-sfs btn-flat" <?php if($baris->id_request_status == '4'){ echo "disabled"; } ?>>Send</button>
            </span>
            </div>
        </div>
        </form>
    </div>
    <!-- /.box-footer -->
    </div>
    </div>
</div>
    <div class="col-md-4">
    <div class="box box-widget">
    <div class="box-header with-border">
        <div class="user-block">
        <h4><b>TIMELINE</b></h4>
        </div>
    </div>
    
    <div class="box-footer box-comments">
              <div class="box-comment">
                    <!-- row -->
                    <div class="row">
                      <div class="col-md-12">
                        <!-- The time line -->
                        <ul class="timeline">
                          <?php 
                            if(count($timeline->result()) > 0) {
                          ?>
                          <?php foreach($timeline->result() as $rowt){ ?>
                          <!-- timeline item -->
                            <li>
                            <i class="fa fa-check bg-green"></i>
                            <div class="timeline-item">
                              <span class="time"><i class="fa fa-clock-o"></i>
                              <?php 
                                  date_default_timezone_set('Asia/Jakarta');
                                  $now = new DateTime('now');  //mengambil tanggal sekarang
                                  $dates = new DateTime($rowt->date_timeline); //mengambil tanggal data di input
                                  $diff = $now->diff($dates);
                                 
                                      if($diff->format('%a')>2){ //jika perbedaan antara tanggal data diinput dan dibutuhkan lebih dari 2 dengan format hari
                                        echo date('d M y',strtotime($rowt->date_timeline))." at ".date('H:i',strtotime($rowt->date_timeline));
                                      }elseif($diff->format('%a')>=1){ //jika perbedaan antara tanggal data diinput dan dibutuhkan tidak lebih dari 1 hari yang lalu
                                        echo 'yesterday at '.date('H:i',strtotime($rowt->date_timeline));
                                      }elseif($diff->format('%h')>0) { //jika perbedaan antara tanggal data diinput dan dibutuhkan lebih dari 0 dengan format jam
                                        echo $diff->format('%h hrs ago');
                                      }elseif($diff->format('%i')>0) { //jika perbedaan antara tanggal data diinput dan dibutuhkan lebih dari 0 dengan format menit
                                        echo $diff->format('%i mins ago');
                                      }elseif($diff->format('%s')>0) { //jika perbedaan antara tanggal data diinput dan dibutuhkan lebih dari 0 dengan format menit
                                        echo $diff->format('%s secs ago');
                                      }
                                ?>
                              </span>
                                <h5 class="timeline-header no-border"><small><b><?php echo $rowt->name_user;?></b> <?php echo $rowt->request_timeline_notes;?></small></h5>
                            </div>
                            </li>
                          <?php } ?>
                          <?php } else {?>
                            <li>
                            No Information
                            </li>
                          <?php } ?>
                            <li>
                            <i class="fa fa-clock-o bg-gray"></i>
                            </li>
                        </ul>
                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- /.row -->
              </div>
              <!-- /.box-comment -->
            </div>
          </div>
          <!-- /.box -->
    </div>
    </div>
</div>

      <!-- START MODAL CLAIM -->
      <div class="modal fade" id="modal-claim">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
          <form method="post" enctype="multipart/form-data" action="<?php echo site_url(); ?>request/claim_ticket/<?php echo $baris->id_request;?>">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><strong>Claim Ticket - <?php echo $baris->id_ticket;?></strong></h4>
            </div>
            <div class="modal-body box-sfs">
              <div class="row">
                
              <div class="col-md-12">
                <div class="form-group">
                  <label for="notes" class="control-label">Estimation</label>
                    <div class="row">
                    <div class="col-sm-6">
                      <input type="number" class="form-control" name="period" placeholder="Number" min="1" max="99" required>
                    </div>
                    <div class="col-sm-6">
                      <select class="form-control" name="period_type" required>
                        <option value="1">Hours</option>
                        <option value="2">Days</option>
                      </select>
                    </div>
                    </div>
                </div>
              </div>

              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-sfs">Submit</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
              </div>
            </div>
            <!-- /.modal-content -->
            </form>
          </div>
          <!-- /.modal-dialog -->
        </div>
      </div>
      <!-- /. END MODAL CLAIM -->

      <!-- START MODAL ASSIGMENT -->
      <div class="modal fade" id="modal-assignment">
        <div class="modal-dialog">
          <div class="modal-content">
          <form method="post" id="formAssign" enctype="multipart/form-data" action="<?php echo site_url(); ?>request/assignment_ticket/<?php echo $baris->id_request;?>">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><strong>Assignment Ticket - <?php echo $baris->id_ticket;?></strong></h4>
            </div>
            <div class="modal-body box-sfs">
              <div class="row">

              <div class="col-md-6">
                <div class="form-group">
                  <label for="handle_by" class="control-label">Assign To</label>
                  <select class="form-control select2" name="handle_by" style="width:100%; display:block;" required>
                    <option value="">- Select -</option>
                    <?php foreach($users->result() as $rowu){ ?>
                    <option value="<?php echo $rowu->id; ?>"><?php echo $rowu->name_user; ?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>
                
              <div class="col-md-12">
                <div class="form-group">
                  <label for="notes" class="control-label">Notes</label>
                  <textarea class="form-control" name="notes" rows="5" required></textarea>
                </div>
              </div>

              </div>
              <div class="modal-footer">
                <button type="submit" id="assign" class="btn btn-sfs">Submit</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
              </div>
            </div>
            <!-- /.modal-content -->
            </form>
          </div>
          <!-- /.modal-dialog -->
        </div>
      </div>
      <!-- /. END MODAL ASSIGNMENT -->

      <!-- START MODAL EDIT -->
      <div class="modal fade" id="modal-edit">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
          <form method="post" id="formEdit" enctype="multipart/form-data" action="<?php echo site_url(); ?>request/edit_ticket/<?php echo $baris->id_request;?>">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><strong>Edit Ticket - <?php echo $baris->id_ticket;?></strong></h4>
            </div>
            <div class="modal-body box-sfs">
              <div class="row">
                
            <div class="col-md-3">
              <div class="form-group">
                <label for="level" class="control-label">Assign To</label>
                <select class="form-control select2" name="request_to" style="width:100%; display:block;" required>
                  <?php foreach($departemen->result() as $rowd){
                          if($baris->request_to == $rowd->id_departemen){
                    ?>
                    <option value="<?php echo $rowd->id_departemen; ?>" selected><?php echo $rowd->name_departemen; ?></option>
                  <?php }else{ ?>
                    <option value="<?php echo $rowd->id_departemen; ?>"><?php echo $rowd->name_departemen; ?></option>
                  <?php }} ?>
                </select>
              </div>
            </div>

            <div class="col-md-3">
              <div class="form-group">
                <label for="id_request_category" class="control-label">Category</label>
                <select class="form-control select2" name="id_request_category" style="width:100%; display:block;" required>
                  <option value="">- Select -</option>
                  <?php foreach($category->result() as $rowcat){
                          if($baris->id_request_category == $rowcat->id_request_category){
                    ?>
                    <option value="<?php echo $rowcat->id_request_category; ?>" selected><?php echo $rowcat->name_request_category; ?></option>
                  <?php }else{ ?>
                    <option value="<?php echo $rowcat->id_request_category; ?>"><?php echo $rowcat->name_request_category; ?></option>
                  <?php }} ?>
                </select>
              </div>
            </div>

            
            <div class="col-md-3">
              <div class="form-group">
                <label for="id_request_level" class="control-label">Level</label>
                <select class="form-control select2" name="id_request_level" style="width:100%; display:block;" required>
                  <option value="">- Select -</option>
                  <?php foreach($level->result() as $rowl){ 
                          if($rowl->id_request_level == $baris->id_request_level){
                    ?>
                  <option value="<?php echo $rowl->id_request_level; ?>" selected><?php echo $rowl->name_request_level; ?></option>
                  <?php }else{ ?>
                  <option value="<?php echo $rowl->id_request_level; ?>"><?php echo $rowl->name_request_level; ?></option>
                  <?php }} ?>
                </select>
              </div>
            </div>

            
            <div class="col-md-3">
              <div class="form-group">
                <label for="id_location" class="control-label">Location</label>
                <select class="form-control select2" name="id_location" style="width:100%; display:block;" required>
                  <?php foreach($location->result() as $rowl){
                          if($baris->id_location == $rowl->id_area){
                    ?>
                    <option value="<?php echo $rowl->id_area; ?>" selected><?php echo $rowl->name_area." (".$rowl->code_area.")"; ?></option>
                  <?php }else{ ?>
                    <option value="<?php echo $rowl->id_area; ?>"><?php echo $rowl->name_area." (".$rowl->code_area.")"; ?></option>
                  <?php }} ?>
                </select>
              </div>
            </div>

            <?php if($baris->id_request_status != 1 && $baris->handle_by == $id_user){ ?></php>
            <div class="col-md-12">
                <div class="form-group">
                  <label for="notes" class="control-label">Estimation</label>
                    <?php
                      $now = new DateTime($baris->claim_date);  //mengambil tanggal sekarang
                      $datec = new DateTime($baris->estimation_time); //mengambil tanggal data di input
                      $diff = $now->diff($datec);
                      $est = '';
                      $val = '';
                  
                      if($diff->format('%a')>0){ //jika perbedaan antara tanggal data diinput dan dibutuhkan lebih dari 2 dengan format hari
                        $est = $diff->format('%a');
                        $val = "1";
                      }elseif($diff->format('%h')>0) { //jika perbedaan antara tanggal data diinput dan dibutuhkan lebih dari 0 dengan format jam
                        $est = $diff->format('%h');
                        $val = "2";
                      }
                      //echo $val;
                      ?>
                      
                    <div class="row">
                    <div class="col-sm-2">
                      <input type="number" class="form-control" name="period" value="<?php echo $est; ?>" placeholder="Number" min="1" max="99" required>
                    </div>
                    <div class="col-sm-2">
                      <select class="form-control" name="period_type" required>
                        <option value="1" <?php if($est == $diff->format('%h')){ echo "selected"; }?>>Hours</option>
                        <option value="2" <?php if($est == $diff->format('%a')){ echo "selected"; }?>>Days</option>
                      </select>
                    </div>
                    </div>
                </div>
              </div>
              <?php } ?>
            
            <div class="col-md-12">
              <div class="form-group">
                <label for="level" class="control-label">Subject</label>
                <input type="text" class="form-control" name="request_subject" value="<?php echo $baris->request_subject; ?>" required>
              </div>
            </div>

            <div class="col-md-12">
              <div class="form-group">
                <label for="level" class="control-label">Description</label>
                <textarea class="form-control textarea" name="request_description" rows="5" required><?php echo $baris->request_description; ?></textarea>
              </div>
            </div>
            
              <div class="col-md-12">
                <div class="form-group">
                  <label for="request_attachment" class="control-label">Attachment</label><br>
                    <input type="file" name="request_attachment[]"><br>
                    <div class="instructions__append-inputs">
                    </div>
                    <p>* Only allow .JPG/.JPEG/.PNG/.PDF/.XLSX/.DOCX</p>
                </div>
              </div>

              <div class="col-md-12">
                <div class="form-group">
                <input type="button" style="margin-top:10px;" class="btn btn-sm btn-sfs" id="btn-add" value="Add More" data-toggle="tooltip" title="More Attachment">
                </div>
              </div>

              </div>
              <div class="modal-footer">
                <button type="submit" id="saveedit" class="btn btn-sfs">Submit</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
              </div>
            </div>
            <!-- /.modal-content -->
            </form>
          </div>
          <!-- /.modal-dialog -->
        </div>
      </div>
      <!-- /. END MODAL EDIT -->

      <!-- START MODAL EDIT ADMIN-->
      <div class="modal fade" id="modal-edit-admin">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
          <form method="post" id="formEditAdmin" enctype="multipart/form-data" action="<?php echo site_url(); ?>request/edit_ticket_submit/<?php echo $baris->id_request;?>">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><strong>Edit Ticket - <?php echo $baris->id_ticket;?></strong></h4>
            </div>
            <div class="modal-body box-sfs">
              <div class="row">  

            <div class="col-md-4">
              <div class="form-group">
                <label for="id_request_level" class="control-label">Level</label>
                <select class="form-control select2" name="id_request_level" style="width:100%; display:block;" required>
                  <option value="">- Select -</option>
                  <?php foreach($level->result() as $rowl){ 
                          if($rowl->id_request_level == $baris->id_request_level){
                    ?>
                  <option value="<?php echo $rowl->id_request_level; ?>" selected><?php echo $rowl->name_request_level; ?></option>
                  <?php }else{ ?>
                  <option value="<?php echo $rowl->id_request_level; ?>"><?php echo $rowl->name_request_level; ?></option>
                  <?php }} ?>
                </select>
              </div>
            </div>
            
            <div class="col-md-4">
              <div class="form-group">
                <label for="id_location" class="control-label">Location</label>
                <select class="form-control select2" name="id_location" style="width:100%; display:block;" required>
                  <?php foreach($location->result() as $rowl){
                          if($baris->id_location == $rowl->id_area){
                    ?>
                    <option value="<?php echo $rowl->id_area; ?>" selected><?php echo $rowl->name_area." (".$rowl->code_area.")"; ?></option>
                  <?php }else{ ?>
                    <option value="<?php echo $rowl->id_area; ?>"><?php echo $rowl->name_area." (".$rowl->code_area.")"; ?></option>
                  <?php }} ?>
                </select>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label for="id_request_status" class="control-label">Status</label>
                <select class="form-control select2" name="id_request_status" style="width:100%; display:block;" required>
                  <option value="">- Select -</option>
                  <option value="2" <?php if($baris->id_request_status == 2){ echo "selected"; } ?>>On Progress</option>
                  <option value="3" <?php if($baris->id_request_status == 3){ echo "selected"; } ?>>Completed</option>
                </select>
              </div>
            </div>
            
            <?php if($baris->id_request_status != 1 && $baris->handle_by == $id_user){ ?></php>
            <div class="col-md-12">
                <div class="form-group">
                  <label for="notes" class="control-label">Estimation</label>
                    <?php
                      $now = new DateTime($baris->claim_date);  //mengambil tanggal sekarang
                      $datec = new DateTime($baris->estimation_time); //mengambil tanggal data di input
                      $diff = $now->diff($datec);
                      $est = '';
                      $val = '';
                  
                      if($diff->format('%a')>0){ //jika perbedaan antara tanggal data diinput dan dibutuhkan lebih dari 2 dengan format hari
                        $est = $diff->format('%a');
                        $val = "1";
                      }elseif($diff->format('%h')>0) { //jika perbedaan antara tanggal data diinput dan dibutuhkan lebih dari 0 dengan format jam
                        $est = $diff->format('%h');
                        $val = "2";
                      }
                      //echo $val;
                      ?>
                    <div class="row">
                    <div class="col-sm-2">
                      <input type="number" class="form-control" name="period" value="<?php echo $est; ?>" placeholder="Number" min="1" max="99" required>
                    </div>
                    <div class="col-sm-2">
                      <select class="form-control" name="period_type" required>
                        <option value="1" <?php if($est == $diff->format('%h')){ echo "selected"; }?>>Hours</option>
                        <option value="2" <?php if($est == $diff->format('%a')){ echo "selected"; }?>>Days</option>
                      </select>
                    </div>
                    </div>
                </div>
              </div>
            <?php } ?>
              
            <div class="col-md-12">
              <div class="form-group">
                <label for="level" class="control-label">Subject</label>
                <input type="text" class="form-control" name="request_subject" value="<?php echo $baris->request_subject; ?>" required>
              </div>
            </div>

            <div class="col-md-12">
              <div class="form-group">
                <label for="level" class="control-label">Description</label>
                <textarea class="form-control textarea" name="request_description" rows="5" required><?php echo $baris->request_description; ?></textarea>
              </div>
            </div>

            
            <div class="col-md-12">
              <div class="form-group">
                <label for="request_submit_notes" class="control-label">Submit Notes</label>
                <textarea class="form-control textarea" name="request_submit_notes" rows="5" required><?php echo $baris->request_submit_notes; ?></textarea>
              </div>
            </div>
            
            <div class="col-md-12">
                <div class="form-group">
                  <label for="request_attachment" class="control-label">Attachment</label><br>
                    <input type="file" name="request_attachment[]"><br>
                    <div class="instructions__append-input-edit">
                    </div>
                    <p>* sssOnly allow .JPG/.JPEG/.PNG/.PDF/.XLSX/.DOCX</p>
                </div>
              </div>
              
              <div class="col-md-12">
                <div class="form-group">
                <input type="button" style="margin-top:10px;" class="btn btn-sm btn-sfs" id="btn-edit" value="Add More" data-toggle="tooltip" title="More Attachment">
                </div>
              </div>

              </div>
              <div class="modal-footer">
                <button type="submit" id="saveeditadmin" class="btn btn-sfs">Submit</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
              </div>
            </div>
            <!-- /.modal-content -->
            </form>
          </div>
          <!-- /.modal-dialog -->
        </div>
      </div>
      <!-- /. END MODAL EDIT ADMIN-->

      <!-- START MODAL SUBMIT -->
      <div class="modal fade" id="modal-submit">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
          <form method="post" id="formSubmit" enctype="multipart/form-data" action="<?php echo site_url(); ?>request/submit_ticket/<?php echo $baris->id_request;?>">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><strong>Submit Ticket - <?php echo $baris->id_ticket;?></strong></h4>
            </div>
            <div class="modal-body box-sfs">
              <div class="row">
                
              <div class="col-md-12">
                <div class="form-group">
                  <label for="level" class="control-label">Submit Notes</label>
                  <textarea class="form-control textarea" name="request_submit_notes" rows="5" required></textarea>
                </div>
              </div>
              
              <div class="col-md-12">
                <div class="form-group">
                  <label for="submit_attachment" class="control-label">Attachment</label>
                    <input type="file" name="submit_attachment[]"><br>
                    <div class="input_submit"></div>
                    <p>* Only allow .JPG/.JPEG/.PNG/.PDF/.XLSX/.DOCX</p>
                </div>
              </div>
              
            <div class="col-md-12">
              <div class="form-group">
                <input type="button" style="margin-top:10px;" class="btn btn-sm btn-sfs" id="btn-add-submit" value="Add More" data-toggle="tooltip" title="More Attachment">
              </div>
            </div>

            </div>
              <div class="modal-footer">
                <button type="submit" id="save" class="btn btn-sfs">Submit</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
              </div>
            </div>
            <!-- /.modal-content -->
            </form>
          </div>
          <!-- /.modal-dialog -->
        </div>
      </div>
      <!-- /. END MODAL SUBMIT -->
</section>
<script>
$(function () {

  $('#formSubmit').submit(function(){
    $("#save").prop('disabled',true);
    $("#save").text('Sending, please wait...');
  });
  
  $('#formAssign').submit(function(){
    $("#assign").prop('disabled',true);
    $("#assign").text('Sending, please wait...');
  });

  $('#formComment').submit(function(){
    $("#comment").prop('disabled',true);
    $("#comment").text('Sending, please wait...');
  });
  
  $('#formEdit').submit(function(){
    $("#saveedit").prop('disabled',true);
    $("#saveedit").text('Sending, please wait...');
  });
  
  $('#formEditAdmin').submit(function(){
    $("#saveeditadmin").prop('disabled',true);
    $("#saveeditadmin").text('Sending, please wait...');
  });
  
  $('#btn-add-submit').on('click', function() {
    $('.input_submit').append('<input type="file" name="submit_attachment[]"><br>');
  });

  $('#btn-edit').on('click', function() {
    $('.instructions__append-input-edit').append('<input type="file" name="request_attachment[]"><br>');
  });
});
</script>