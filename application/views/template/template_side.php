<?php
  $id_role = $this->session->userdata('id_role_ticket');
  $id_job_grade = $this->session->userdata('id_job_grade');
?>
<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar main-sidebar-sfs">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar navbar-sfs">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url(); ?>assets/photo/<?php if($this->acl->get_user()->photo!=''){echo $this->acl->get_user()->photo;}else{echo "blank.jpg";}?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>
            <?php
              echo substr($this->acl->get_user()->name_user, 0, 18);
              if(strlen($this->acl->get_user()->name_user) > 18){
                echo '...';
              }
            ?>
          </p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu sidebar-menu-sfs" data-widget="tree">
        <li class="header">MAIN MENU</li>
        <li class="<?php if($this->uri->segment(2)=="dashboard") { echo "active"; }else{echo "noactive";}?>">
        <a href="<?php echo site_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
        </li>
        <li class="<?php if($this->uri->segment(2)=="request") { echo "active"; }else{echo "noactive";}?>">
        <a href="<?php echo site_url('request'); ?>"><i class="fa fa-sticky-note"></i> <span>My Ticket</span>
        <span class="pull-right-container">
              <span id="totalrequest"></span>
        </span>
        </a>  
        </li>
        <li class="<?php if($this->uri->segment(2)=="project") { echo "active"; }else{echo "noactive";}?>">
        <a href="<?php echo site_url('project'); ?>"><i class="fa fa-folder-open"></i> <span>Project</span></a>
        </li>
        <li class="<?php if($this->uri->segment(1)=="account") {echo "active"; }else{echo "noactive";}?>">
          <a href="<?php echo site_url('account'); ?>"><i class="fa fa-user"></i> <span>Account</span></a>
        </li>
        <li class="<?php if($this->uri->segment(1)=="report") {echo "active"; }else{echo "noactive";}?>">
          <a href="<?php echo site_url('report'); ?>"><i class="fa fa-file-excel-o"></i> <span>Report</span></a>
        </li>
        <li class="<?php if($this->uri->segment(1)=="sop") {echo "active"; }else{echo "noactive";}?>">
          <a href="<?php echo site_url('sop'); ?>"><i class="fa fa-check-square-o"></i> <span>SOP</span></a>
        </li>
      </ul> 
    </section>
    <!-- /.sidebar -->
  </aside>
<script type="text/javascript">
    $(document).ready(function() {
        $.ajaxSetup({ cache: false });
        setInterval(function() {
            $('#totalrequest').load('<?php echo site_url("request/total_pending_notif"); ?>');
        }, 3000);
    });
</script>
