<style>
  .user-header:hover .caption-imgc {
    visibility: visible;
    opacity: 2;
  }

  .caption-imgc{
    color:#333;
    position:absolute;
    top: 55px;
    bottom: 120px;
    border-bottom-left-radius: 100px;
    border-bottom-right-radius:100px;
    left: 98px;
    right: 98px;
    visibility: hidden;
    opacity: 0;
    background-color:rgba(0, 0, 0, 0.6);
    cursor:pointer;
  }

</style>

<header class="main-header">
    <!-- Logo -->
    <a href="<?php echo site_url('dashboard') ?>" class="logo logo-sfs">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><i class="fa fa-user"></i></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"> <b>TIRA</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top navbar-sfs">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo base_url(); ?>assets/photo/<?php if($this->acl->get_user()->photo!=''){echo $this->acl->get_user()->photo;}else{echo "blank.jpg";}?>" class="user-image">
              <span class="hidden-xs"><?php echo $this->acl->get_user()->name_user;?></span>
              <i class="fa fa-caret-down bg-sefas"></i>
            </a>
            <ul class="dropdown-menu">
              <!-- Menu Footer-->
              <li>
                  <a href="<?php echo site_url('account/change_password'); ?>" class="btn btn-blk">Change Password</a>
              </li>
              <li>
                  <a href="<?php echo site_url('account/color'); ?>" class="btn btn-blk">Change Color</a>
              </li>
              <li>
                  <a href="<?php echo site_url('logout'); ?>" class="btn btn-blk">Sign out</a>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="<?php echo site_url('welcome'); ?>">
          </a>
          </li>
        </ul>
      </div>
    </nav>
  </header>

<!--
  <div class="modal fade" id="modal-default" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Change Profile Picture</h4>
        </div>
        <form method="post" action="<?php echo site_url('welcome/change_picture'); ?>" enctype="multipart/form-data">
          <div class="modal-body">
            <div class="row">
              <div class="col-md-12">
                <div id="jcrop"></div>
                <input name="old" type="hidden" value="<?php echo $this->acl->get_user()->photo;?>" style="display:none;">
              </div>
              <div class="col-md-12">
                <label for="exampleInputFile">Choose File</label>
                <input type="file" id="exampleInputFile" class="form-control" name="file_upload">
                <input type="hidden" id="x" name="x" />
                <input type="hidden" id="y" name="y" />
                <input type="hidden" id="w" name="w" />
                <input type="hidden" id="h" name="h" />
                <p class="help-block">*Only allow format .jpg / .jpeg / .png</p>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="reset" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
        </form>
      </div>
-->
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

<!--
<script type="text/javascript">
$(document).ready(function(){

    $('#change').on('click',function(){
      $('#modal-default').modal('toggle');
    });

    var picture_width;
    var picture_height;
    var crop_max_width = 354;
    var crop_max_height = 354;

    $("#exampleInputFile").change(function() {
      readURL(this);
    });

    
    function readURL(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
          $("#jcrop, #preview").html("").append("<img src=\""+e.target.result+"\" alt=\"\" />");
          picture_width = $("#preview img").width();
          picture_height = $("#preview img").height();
          $("#jcrop  img").Jcrop({
            onSelect: updateCoords,
            onChange: updateCoords,
            boxWidth: crop_max_width,
            boxHeight: crop_max_height,
            setSelect: [100,100,345,345],
            aspectRatio : 1
          });
        }
        reader.readAsDataURL(input.files[0]);
      }
    }

    function updateCoords(c)
    {
      $('#x').val(c.x);
      $('#y').val(c.y);
      $('#w').val(c.w);
      $('#h').val(c.h);
    }

  });
  </script>
-->
