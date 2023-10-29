<?php 
    $baris = $data->row();
?>
<section class="content-header">
  <h1>ACCOUNT DETAIL </h1>
</section>
<section class="content">
  <div class="row">
    <div class="col-md-12">
    <div class="box box-widget widget-user">
        <!-- Add the bg color to the header using any of the bg-* classes -->
        <div class="widget-user-header bg-black" style="background: url('<?php echo base_url() ?>assets/dist/img/photo1.png') center center;">
        <h3 class="widget-user-username"><?php echo $baris->name_user; ?></h3>
        <h5 class="widget-user-desc">NIK: <?php echo $baris->nik; ?></h5>
        <h5 class="widget-user-desc">Internal ID: <?php echo $baris->id_internal; ?></h5>
        </div>
        <div class="widget-user-image">
        <?php if($baris->photo == ''){ ?>
            <img class="img-circle" src="<?php echo base_url(''); ?>/assets/photo/blank.jpg" alt="User Avatar">
        <?php }else{ ?>
            <img class="img-circle" src="<?php echo base_url(''); ?>/assets/photo/<?php echo $baris->photo;?>" alt="User Avatar">
        <?php } ?>
        
        </div>
        <div class="box-footer">
        <div class="row">
            <div class="col-sm-6 border-right">
            <div class="description-block">
                <h5 class="description-header">Superior 1</h5>
                <span class="description-text"><?php foreach($all_user->result() as $u){if($baris->direct_superior_1==$u->nik){ echo $u->name_user;}} ?></span>
            </div>
            <!-- /.description-block -->
            </div>
            <!-- /.col -->
            <div class="col-sm-6 border-right">
            <div class="description-block">
                <h5 class="description-header">Superior 2</h5>
                <span class="description-text"><?php foreach($all_user->result() as $u){if($baris->direct_superior_2==$u->nik){ echo $u->name_user;}} ?></span>
            </div>
            <!-- /.description-block -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        </div>
    </div>
    <!-- /.widget-user -->
    </div>  
</div>
<!-- /.row -->
<div class="row">
    <div class="col-md-12">
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
        <li class="active"><a href="#emp" data-toggle="tab">Employee Data</a></li>
        <li><a href="#training" data-toggle="tab">Training History</a></li>
        <li><a href="#monitoringlist" data-toggle="tab">Monitoring List</a></li>
        </ul>
        <div class="tab-content">
        <div class="active tab-pane" id="emp">
            <table class="table table-striped tb-emp-detail">
            <tr>
                <td width="160"><label>Email Address</label></td><td><span><?php echo $baris->email; ?></span></td>
            </tr>
            <tr>
                <td><label>Phone</label></td><td><span><?php echo $baris->phone; ?></span></td>
            </tr>
            <tr>
                <td><label>KTP</label></td><td><span><?php echo $baris->ktp; ?></span></td>
            </tr>
            <tr>
                <td><label>Position</label></td><td><span><?php echo $baris->name_position; ?></span></td>
            </tr>
            <tr>
                <td><label>Work Location</label></td><td><span><?php echo $baris->code_area; ?></span></td>
            </tr>
            <tr>
                <td><label>Job Grade</label></td><td><span><?php echo $baris->name_job_grade; ?></span></td>
            </tr>
            <tr>
                <td><label>Join Date</label></td><td><span><?php echo ($baris->join_date == '0000-00-00')? '-' : date('d/m/Y', strtotime($baris->join_date)); ?></span></td>
            </tr>
            <tr>
                <td><label>Level</label></td><td><span><?php echo $baris->name_role; ?></span></td>
            </tr>
            <tr>
                <td><label>Subsidiary</label></td><td><span><?php echo $baris->name_company; ?></span></td>
            </tr>
            <tr>
                <td><label>SBU</label></td><td><span><?php echo $baris->name_sbu; ?></span></td>
            </tr>
            <tr>
                <td><label>Direktorat</label></td><td><span><?php echo $baris->name_direktorat; ?></span></td>
            </tr>
            <tr>
                <td><label>Division</label></td><td><span><?php echo $baris->name_division; ?></span></td>
            </tr>
            <tr>
                <td><label>Departemen</label></td><td><span><?php echo $baris->name_departemen; ?></span></td>
            </tr>
            <tr>
                <td><label>Section</label></td><td><span><?php echo $baris->name_section; ?></span></td>
            </tr>
            <tr>
                <td><label>Function</label></td><td><span><?php echo $baris->name_function; ?></span></td>
            </tr>
            <tr>
                <td><label>Kota</label></td><td><span><?php echo $baris->name_kota; ?></span></td>
            </tr>
            </table>
        </div>
        <!-- /.tab-pane emp -->
        <div class="tab-pane" id="training">
            <div id="history_training"></div>
        </div>
        <!-- /.tab-pane training -->
        <div class="tab-pane" id="monitoringlist">
            <form class="form-inline" id="cariNama" style="margin-bottom:5px;">
            <div class="form-group">
                <input type="text" class="form-control" id="nama" placeholder="full name">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-default" value="Search">
            </div>
            </form>
            <div id="monitoring_team"></div>
        </div>
        <!-- /.tab-pane monitoring team -->
        </div>
        <!-- /.tab-content -->
    </div>
    </div>
</div>
</section>