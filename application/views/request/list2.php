<?php 
  $id_role = $this->session->userdata('id_role');
  $id_job_grade = $this->session->userdata('id_job_grade');
?>
<section class="content-header">
  <h1>TICKECT</h1>
  <ol class="breadcrumb">
    <li>Ticket</li>
    <li class="active">List</li>
  </ol>
</section>
<section class="content">
<div class="box box-sfs">
<div class="box-body">
    <table id="myTable" class="table table-bordered table-striped" cellspacing="0">
    <thead>
        <tr class="tr-sfs">
            <th class="text-center">ID Ticket</th>
            <th class="text-center">Request Date</th>
            <th class="text-center">Request By</th>
            <th class="text-center">Subject</th>
            <th class="text-center">Category</th>
            <th class="text-center">Handle By</th>
            <th class="text-center">Status</th>
            <th class="text-center">Action</th>
        </tr>
        </thead>
        <tbody>
            <?php foreach($all->result() as $row){ ?>
            <tr>
                <td><a href="<?php echo site_url('request/view/'.$row->id_request); ?>"><?php echo $row->id_ticket;?></a></td>
                <td><?php echo date('d M Y',strtotime($row->request_date));?></td>
                <td><?php echo $row->name_user;?></td>
                <td><?php echo $row->request_subject;?></td>
                <td><?php echo $row->name_request_category;?></td>
                <td><?php echo $row->user_handle;?></td>
                <td><?php echo $row->name_request_status;?></td>
                <td width="100">
                <a href="<?php echo site_url() ?>request/claim/<?php echo $row->id_request;?>" class="btn btn-xs" data-toggle="tooltip" data-placement="top" title="Claim"><span class="fa fa-hand-paper-o"></span></a>
                <a href="<?php echo site_url() ?>request/update/<?php echo $row->id_request;?>" class="btn btn-xs" data-toggle="tooltip" data-placement="top" title="Edit"><span class="glyphicon glyphicon-edit"></span></a>
                <a href="<?php echo site_url() ?>request/delete/<?php echo $row->id_request;?>" class="btn btn-xs" data-toggle="tooltip" data-placement="top" title="Delete" onClick='return confirm("Anda yakin ingin menghapus data ini?")'><span class="glyphicon glyphicon-trash" style="color:red;"></span></a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
  </div>
</div>
</section>
<script>
$(document).ready( function () {
    $('#myTable').DataTable();
});
</script>