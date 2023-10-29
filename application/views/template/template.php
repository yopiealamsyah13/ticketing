<!DOCTYPE html>
<html>
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title><?php echo isset($breadcrumb) ? $breadcrumb : ''; ?></title>

<link rel="stylesheet" href="<?php echo base_url("assets/bower_components/bootstrap/dist/css/bootstrap.min.css") ?>">
<link rel="stylesheet" href="<?php echo base_url("assets/bower_components/select2/dist/css/select2.min.css") ?>">
<link rel="stylesheet" href="<?php echo base_url("assets/bower_components/Ionicons/css/ionicons.min.css") ?>">
<link rel="stylesheet" href="<?php echo base_url("assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css") ?>">
<link rel="stylesheet" href="<?php echo base_url("assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css") ?>">
<link rel="stylesheet" href="<?php echo base_url("assets/bower_components/font-awesome/css/font-awesome.min.css") ?>">
<link rel="stylesheet" href="<?php echo base_url("assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css") ?>">
<link rel="stylesheet" href="<?php echo base_url("assets/dist/css/AdminLTE.min.css") ?>">
<link rel="stylesheet" href="<?php echo base_url("assets/dist/css/skins/_all-skins.min.css") ?>">
<link rel="stylesheet" href="<?php echo base_url("assets/custom/custom-style.css") ?>">
<!-- Sweet Alert -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.css">
<!-- jcrop css -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/jcrop/jquery.Jcrop.css">
<script src="<?php echo base_url("assets/bower_components/jquery/dist/jquery.min.js") ?>"></script>
<script src="<?php echo base_url("assets/bower_components/datatables.net/js/jquery.dataTables.min.js") ?>"></script>
<script src="<?php echo base_url("assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js") ?>"></script>
<script src="<?php echo base_url("assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js") ?>"></script>
<script src="<?php echo base_url("assets/bower_components/bootstrap/dist/js/bootstrap.min.js") ?>"></script>
<script src="<?php echo base_url("assets/bower_components/select2/dist/js/select2.min.js") ?>"></script>
<script src="<?php echo base_url("assets/bower_components/chart.js/Chart-2.min.js") ?>"></script>
<script src="<?php echo base_url("assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js") ?>"></script>
<script src="<?php echo base_url("assets/dist/js/adminlte.min.js") ?>"></script>
<script src="<?php echo base_url("assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js") ?>"></script>
<script src="<?php echo base_url("assets/bower_components/jquery-knob/js/jquery.knob.js") ?>"></script>
<!-- jcrop -->
<script src="<?php echo base_url(); ?>assets/bower_components/jcrop/jquery.Jcrop.js"></script>
<!-- Google Font -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,900;1,100;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
<script src="<?php echo base_url("assets/dist/js/sweetalert.min.js") ?>"></script>
		
</head>
<body class="hold-transition skin-blue sidebar-mini fixed" id="<?php echo isset($modul) ? $modul : ''; ?>">

<?php $this->load->view('template/template_header'); ?>
<?php $this->load->view('template/template_side'); ?>
<?php $this->load->view($main_view); ?>
<?php $this->load->view('template/template_footer'); ?>

</body>
</html>
