<section class="content-header">
  <h1>REPORT</h1>
  <ol class="breadcrumb">
    <li>Ticket</li>
    <li class="active">List</li>
  </ol>
</section>
<section class="content">
        
<div class="box box-sfs">
<div class="box-header with-border">
        
        <form name="cari" action="<?php echo site_url('report'); ?>" method="GET">
        <div class="input-group pull-right">
              <input type="text" class="form-control" name="startdate" id="datepicker" style="width: 150px" placeholder="Date From" autocomplete='off' readonly="readonly" style="cursor: pointer; background-color: white">
              <input type="text" class="form-control" name="enddate" id="datepicker2" style="width: 150px" placeholder="Date To" autocomplete='off' readonly="readonly" style="cursor: pointer; background-color: white">
        
              <button class="btn btn-md btn-default" type="submit"><span class="fa fa-search"></span></button>
            
              <a href="<?php echo site_url('report/export_excel') ?>" class="btn btn-default pull-right" rel="tooltip" data-placement="bottom" title="Add"><i class="fa fa-file-excel-o"></i> Export</a>
    </div>
        
      </form>
</div>
    <div class="box-body">
        <div id="scrolling_table_1" class="scrolly_table">
            <table id="myTable" class="table table-striped table-bordered table-hover tablesorter" cellspacing="0"> 
            <?php 
                $per_page = abs($this->input->get('per_page'));
                $no = $per_page + 1;
                if(count($limit->result()) > 0) {
            ?> 
            <thead> 
                <tr class="tr-sfs">
                    <th>No</th>
                    <th>ID Ticket</th>
                    <th>Request Date</th>
                    <th>Subject</th>
                    <th>Category</th>
                    <th>Description</th>
                    <th>Requested By</th>
                    <th>SBU</th>
                    <th>Location</th>
                    <th>Handled By</th>
                    <th>Lead Time</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody> 
            <?php
                foreach($limit->result() as $baris){
            ?>
                <tr>
                    <td><?php echo $no; ?></td>
                    <td><a href="<?php echo site_url('request/view/'.$baris->id_request);?>"><?php echo $baris->id_ticket; ?></a></td>
                    <td><?php echo date('d M Y',strtotime($baris->request_date)); ?></td>
                    <td><?php echo $baris->request_subject; ?></td>
                    <td><?php echo $baris->name_request_category; ?></td>
                    <td><?php echo $baris->request_description; ?></td>
                    <td><?php echo $baris->name_user; ?></td>
                    <td><?php echo $baris->alias_company; ?></td>
                    <td><?php echo $baris->name_area; ?></td>
                    <td><?php echo $baris->user_handle; ?></td>
                    <td>
                        <?php 
                            $request_date = new DateTime($baris->request_date);
                            $completed_date = new DateTime($baris->completed_date);

                            if($completed_date->diff($request_date)->format('%a')>0)
                            {
                                $leadtime = $completed_date->diff($request_date)->format('%a days');
                            }
                            elseif($completed_date->diff($request_date)->format('%h')>0)
                            {
                                $leadtime = $completed_date->diff($request_date)->format('%h hours');
                            }
                            elseif($completed_date->diff($request_date)->format('%i')>0)
                            {
                                $leadtime = $completed_date->diff($request_date)->format('%i minutes');
                            }
                            elseif($completed_date->diff($request_date)->format('%s')>0)
                            {
                                $leadtime = $completed_date->diff($request_date)->format('%s second');
                            }

                            echo $leadtime;
                        ?>
                    </td>
                    <td><?php echo $baris->name_request_status; ?></td>
                </tr>
            <?php
                $no++;
                }
            ?>
            </tbody>
            <tfoot>
                <tr class="bg-gray">
                <td colspan="12">Total <strong><?php echo $total->num_rows(); ?></strong> row(s)</td>
                </tr>
                <tr>
                <td colspan="12">
                    <div class="pagination"><?php echo $this->pagination->create_links(); ?></div>
                </td>
                </tr>
            </tfoot>
            <?php
                } else {
            ?>
                <tr>
                <td colspan="12" class="text-center">Data Tidak Tersedia</td> 
                </tr>
            <?php
                }
            ?>
            </table>
        </div>
    </div>
</div>
</section>
<script>
    
	//Date picker
    $('#datepicker').datepicker({
      		autoclose: true,
		format: 'yyyy-mm-dd',
      		todayHighlight: true
    	})
    		$('#datepicker2').datepicker({
      		autoclose: true,
		format: 'yyyy-mm-dd',
      		todayHighlight: true
    	})
</script>