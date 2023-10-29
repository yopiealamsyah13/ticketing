<?php 
  $id_user = $this->session->userdata('id');
  $id_role = $this->session->userdata('id_role_ticket');
  $id_job_grade = $this->session->userdata('id_job_grade');
?>
<style>
a{
  text-decoration:none;
}

a:hover{
  color:#333;
}
.scroll{
    max-height: 480px;
    min-width: 100%;
    overflow-y: auto; 
    display:inline-block;
}
/* Hide scrollbar for Chrome, Safari and Opera */
.scroll::-webkit-scrollbar {
    display: none;
}
.ticket-subject {
  position: inline;
  color:black;
}
.circle {
  margin-left:40px;
  width: 30px;
  height: 30px;
  line-height: 30px;
  border-radius: 100%;
  font-size: 12px;
  color: #fff;
  text-align: center;
}
</style>
<section class="content-header collapsed-box">
<div class="row">
  <div class="col-md-8">
    <form action="<?php echo site_url('request'); ?>" method="GET">
      <div class="form-group has-feedback">
      <input type="text" name="term" id="search-box" class="form-control" placeholder="Search..." />
      <i class="glyphicon glyphicon-search form-control-feedback"></i>
      <div id="suggestion-box"></div>
      </div>
    </form>
  </div>
  
  <div class="col-md-3">
  <a href="#" class="btn btn-md btn-default" data-toggle="control-sidebar"><i class="fa fa-filter"></i> Advance Search</a>
  <a href="<?php echo site_url('request'); ?>" class="btn btn-md btn-default"><span class="fa fa-refresh"></span></a>
  </div>
</div>
</section>
<section class="content">
<div class="row">
  
<aside class="control-sidebar control-sidebar-dark">
  <div class="tab-content active">
    <h1 class="control-sidebar-heading"><strong>Advance Search</strong></h1>
    <form action="<?php echo site_url('request'); ?>" method="GET">

      <div class="form-group">
        <label>Handle By</label>
        <?php foreach($admin->result() as $rowadmin){ ?>
              <label class="control-sidebar-subheading" style="font-size:10px;">
                <input type="checkbox" class="minimal" name="admin[]" value="<?php echo $rowadmin->id; ?>"> 
                <?php echo $rowadmin->name_user; ?>
              </label>
        <?php } ?>
      </div>

      <div class="form-group">
        <label>Request By</label>
        <select class="form-control select2" name="user[]" multiple="multiple" data-placeholder="Select Users" style="width: 100%;">
          <?php foreach($user->result() as $rowu){ ?>
            <option value="<?php echo $rowu->id; ?>"><?php echo $rowu->name_user; ?></option>
          <?php } ?>
        </select>
      </div>
      
      <div class="form-group">
        <label>Entity</label>
        <select class="form-control select2" name="entity[]" multiple="multiple" data-placeholder="Select Entity" style="width: 100%;">
          <?php foreach($entity->result() as $rowe){ ?>
            <option value="<?php echo $rowe->id_company; ?>"><?php echo $rowe->alias_company; ?></option>
          <?php } ?>
        </select>
      </div>

      <div class="form-group">
        <label>Location</label>
        <select class="form-control select2" name="location[]" multiple="multiple" data-placeholder="Select Location" style="width: 100%;">
          <?php foreach($location->result() as $rowl){ ?>
            <option value="<?php echo $rowl->id_area; ?>"><?php echo $rowl->code_area; ?></option>
          <?php } ?>
        </select>
      </div>

      <div class="form-group">
      <label>Request Date</label>
      <div class="input-group">
      <div class="input-group-addon">
      <i class="fa fa-calendar"></i>
      </div>
      <input type="text" name="date" class="form-control" id="datepicker" autocomplete="off">
      </div>
      </div>
      <div class="text-center">
      <button type="submit" class="btn btn-xl btn-sfs">SEARCH</button>
      </div>
  </div>
</form>
</aside>
<div class="control-sidebar-bg"></div>

    <div class="col-md-3 col-xs-12">
      <div class="box box-primary">
          <div class="box-header">
          <h3 class="box-title">New <span class="badge bg-grey"><?php echo $new->num_rows(); ?></span></h3>
          <div class="box-tools pull-right">
              <button type="button" class="btn btn-xs btn-default pull-right" data-toggle="modal" data-target="#modal-add" rel="tooltip" data-placement="bottom" title="Add"><i class="fa fa-plus"></i></button>
          </div>
          </div>
        </div>

      <div class="scroll" id="new_tickets">
        <?php foreach($new->result() as $rown){ ?>
          <div class="box box-solid">
            <div class="box-body">
              <small><?php echo $rown->name_request_category; ?></small><br>
              <a href="<?php echo site_url('request/view/'.$rown->id_request); ?>" class="ticket-subject">
              <p>
                <?php
                // strip tags to avoid breaking any html
                $string = strip_tags($rown->request_subject);
                if (strlen($string) > 100) {

                    // truncate string
                    $stringCut = substr($string, 0, 100);
                    $endPoint = strrpos($stringCut, ' ');

                    //if the string doesn't contain any space then it will cut without word basis.
                    $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                    $string .= '...';
                }
                echo $string;
                ?>
                </p>
              <span style="font-size:10px"><span class="label <?php if($rown->id_request_level == 1){ echo 'label-default'; }else if($rown->id_request_level == 2){ echo 'label-info';}else{ echo 'label-danger';} ?>"><?php echo strtoupper($rown->name_request_level);?></span>  <?php echo date('d/m/y',strtotime($rown->request_date));?>  <?php echo $rown->name_user;?> - <?php echo $rown->code_location;?></span>
              </a>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>

    <div class="col-md-3 col-xs-12">
      <div class="box box-warning">
        <div class="box-header">
        <h3 class="box-title">On Progress <span class="badge bg-grey"><?php echo $process->num_rows(); ?></span></h3>
        </div>
        </div>
        <div class="scroll">
        <?php foreach($process->result() as $rowp){ ?>
        <div class="box box-widget">
          <div class="box-body">
            <a href="<?php echo site_url('request/view/'.$rowp->id_request); ?>" class="ticket-subject">  
              <small><?php echo $rowp->name_request_category; ?></small><br>
              <p>
                <?php
                // strip tags to avoid breaking any html
                $string = strip_tags($rowp->request_subject);
                if (strlen($string) > 100) {

                    // truncate string
                    $stringCut = substr($string, 0, 100);
                    $endPoint = strrpos($stringCut, ' ');

                    //if the string doesn't contain any space then it will cut without word basis.
                    $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                    $string .= '...';
                }
                echo $string;
                ?>
                </p>
                <?php if($rowp->handle_by != ''){ ?>
                <span class="circle pull-right" style="background:<?php if($rowp->color_handle != ''){ echo $rowp->color_handle; }else{ echo '#333'; } ?>">
                <?php
                $words = explode(" ", $rowp->user_handle);
                $acronym = "";

                foreach ($words as $w) {
                  $acronym .= mb_substr($w, 0, 1);
                }

                echo $acronym;
                ?>
                </span>
                <?php } ?>
              <span style="font-size:10px"><span class="label  <?php if($rowp->id_request_level == 1){ echo 'label-default'; }else if($rowp->id_request_level == 2){ echo 'label-info';}else{ echo 'label-danger';} ?>"><?php echo strtoupper($rowp->name_request_level);?></span>  <?php echo date('d/m/y',strtotime($rowp->request_date));?>  <?php echo $rowp->name_user;?> - <?php echo $rowp->code_location;?></span>
            </a>
          </div>
        </div>
        <?php } ?>
      </div>
    </div>

    <div class="col-md-3 col-xs-12">
        <div class="box box-success">
        <div class="box-header">
        <h3 class="box-title">Completed <span class="badge bg-grey"><?php echo $completed->num_rows(); ?></span></h3>
        <div class="box-tools pull-right">
        </div>
        </div>
        </div>
        <div class="scroll">
        <?php foreach($completed->result() as $rowc){ ?>
        <div class="box box-widget box-primary">
          <div class="box-body">
            <a href="<?php echo site_url('request/view/'.$rowc->id_request); ?>" class="ticket-subject">    
            <small><?php echo $rowc->name_request_category; ?></small><br>
              <p>
              <?php
                // strip tags to avoid breaking any html
                $string = strip_tags($rowc->request_subject);
                if (strlen($string) > 100) {

                    // truncate string
                    $stringCut = substr($string, 0, 100);
                    $endPoint = strrpos($stringCut, ' ');

                    //if the string doesn't contain any space then it will cut without word basis.
                    $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                    $string .= '...';
                }
                echo $string;
                ?>
                </p>
                <?php if($rowc->handle_by != ''){ ?>
                <span class="circle pull-right" style="background:<?php if($rowc->color_handle != ''){ echo $rowc->color_handle; }else{ echo '#333'; } ?>">
                <?php
                $words = explode(" ", $rowc->user_handle);
                $acronym = "";

                foreach ($words as $w) {
                  $acronym .= mb_substr($w, 0, 1);
                }

                echo $acronym;
                ?>
                </span>
                <?php } ?>
              <span style="font-size:10px"><span class="label <?php if($rowc->id_request_level == 1){ echo 'label-default'; }else if($rowc->id_request_level == 2){ echo 'label-info';}else{ echo 'label-danger';} ?>"><?php echo strtoupper($rowc->name_request_level);?></span>  <?php echo date('d/m/y',strtotime($rowc->request_date));?>  <?php echo $rowc->name_user;?> - <?php echo $rowc->code_location;?></span>
              </a>
          </div>
        </div>
      <?php } ?>
      </div>
    </div>
    
    <div class="col-md-3 col-xs-12">
        <div class="box box-sfs-black">
        <div class="box-header">
        <h3 class="box-title">Closed <span class="badge bg-grey"><?php echo $closed->num_rows(); ?></span></h3>
        </div>
        </div>
        <div class="scroll">
        <?php foreach($closed->result() as $rowcl){ ?>
          <div class="box box-widget box-primary">
            <div class="box-body">
            <a href="<?php echo site_url('request/view/'.$rowcl->id_request); ?>" class="ticket-subject">  
              <small><?php echo $rowcl->name_request_category; ?></small><br>
                <p>
                <?php
                // strip tags to avoid breaking any html
                $string = strip_tags($rowcl->request_subject);
                if (strlen($string) > 100) {

                    // truncate string
                    $stringCut = substr($string, 0, 100);
                    $endPoint = strrpos($stringCut, ' ');

                    //if the string doesn't contain any space then it will cut without word basis.
                    $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                    $string .= '...';
                }
                echo $string;
                ?>
                </p>
                <?php if($rowcl->handle_by != ''){ ?>
                <span class="circle pull-right" style="background:<?php if($rowcl->color_handle != ''){ echo $rowcl->color_handle; }else{ echo '#333'; } ?>">
                <?php
                $words = explode(" ", $rowcl->user_handle);
                $acronym = "";

                foreach ($words as $w) {
                  $acronym .= mb_substr($w, 0, 1);
                }

                echo $acronym;
                ?>
                </span>
                <?php } ?>
              <span style="font-size:10px"><span class="label  <?php if($rowcl->id_request_level == 1){ echo 'label-default'; }else if($rowcl->id_request_level == 2){ echo 'label-info';}else{ echo 'label-danger';} ?>"><?php echo strtoupper($rowcl->name_request_level);?></span>  <?php echo date('d/m/y',strtotime($rowcl->request_date));?>  <?php echo $rowcl->name_user;?> - <?php echo $rowcl->code_location;?></span>
            </a>
            </div>
          </div>
        <?php } ?>
        </div>
    </div>

</div>
</section>
<script>
$(function () {
    get_new_request();

    function get_new_request() {
      $.ajax({
        method   :'GET',
        url      : '<?php echo site_url('request/new_request_ticket')?>',
        async    : true,
        dataType : 'json',
        success:function(data){
          var html = '';
          var j=1;
          var label = ''
          var site_url = "<?php echo site_url('request/view/'); ?>/";
          for(i=0; i< data.length; i++){

            if(data[i].id_request_level == 1){
              label = 'label-default';
            }else if(data[i].id_request_level == 2){
              label = 'label-info';
            }else{
              label = 'label-danger';
            }

              html += '<div class="box box-widget">'+
                        '<div class="box-body">'+
                          '<a href="'+site_url+data[i].id_request+'" class="ticket-subject">'+
                            '<small>'+data[i].name_request_category+'</small><br>'+
                            '<p>'+data[i].request_subject+'</p>'+
                            '<span style="font-size:10px">'+
                              '<span  class="label '+label+'">'+data[i].name_request_level+'</span>'+' '+
                              data[i].request_date+' '+data[i].name_user+' - '+data[i].code_location+
                            '</span>'+
                          '</a>'+
                        '</div>'+
                      '</div>';
          }
          $('#new_ticket').html(html);
        }
      });
    }


  });
$(function () {
    $('[rel="tooltip"]').tooltip({trigger: "hover"});
    
    //Date picker
    $('#datepicker').datepicker({
      	autoclose: true,
		    format: 'yyyy-mm-dd',
      	todayHighlight: true
    })

    $('#formRequest').submit(function(){
      $("#save").prop('disabled',true);
      $("#save").text('Sending, please wait...');
    });
  });
</script>
