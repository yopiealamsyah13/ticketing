<?php
  $id_user = $this->session->userdata('id');
  $id_role = $this->session->userdata('id_role_ticket');
?>
<section class="content-header">
  <h1>DASHBOARD</h1>
  <ol class="breadcrumb">
  </ol>
</section>
<section class="content">
  <div class="row">

    <div class="col-md-3 col-sm-3 col-xs-12">
      <div class="box-body">
        <div class="small-box box-rounded bg-primary">
          <div class="inner">
          <p>New</p>
          <h1 class="text-center"><b><?php echo $new->row()->total; ?></b></h1>
          </div>
          <a href="<?php echo site_url('request'); ?>" class="small-box-footer box-gray">More Info <i class="fa fa-chevron-circle-right icon-gray"></i></a>
        </div>
      </div>
    </div>

    <div class="col-md-3 col-sm-3 col-xs-12">
      <div class="box-body">
        <div class="small-box box-rounded bg-orange">
          <div class="inner">
          <p>On Progress</p>
          <h1 class="text-center"><b><?php echo $progress->row()->total; ?></b></h1>
          </div>
          <a href="<?php echo site_url('request'); ?>" class="small-box-footer box-gray">More Info <i class="fa fa-chevron-circle-right icon-gray"></i></a>
        </div>
      </div>
    </div>

    <div class="col-md-3 col-sm-3 col-xs-12">
      <div class="box-body">
        <div class="small-box box-rounded bg-green">
          <div class="inner">
          <p>Completed</p>
          <h1 class="text-center"><b><?php echo $completed->row()->total; ?></b></h1>
          </div>
          <a href="<?php echo site_url('request'); ?>" class="small-box-footer box-gray">More Info <i class="fa fa-chevron-circle-right icon-gray"></i></a>
        </div>
      </div>
    </div>

  
    <div class="col-md-3 col-sm-3 col-xs-12">
      <div class="box-body">
        <div class="small-box box-rounded bg-black">
          <div class="inner">
          <p>Closed</p>
          <h1 class="text-center"><b><?php echo $closed->row()->total; ?></b></h1>
          </div>
          <a href="<?php echo site_url('request'); ?>" class="small-box-footer box-gray">More Info <i class="fa fa-chevron-circle-right icon-gray"></i></a>
        </div>
      </div>
    </div>

    <?php if($id_role == 1){ ?>
    <div class="col-md-4 col-sm-4 col-xs-12">
      <div class="box box-solid">
        <div class="box-header with-border">
          <h3 class="box-title">Ticket Category</h3>
        </div>
        <div class="box-body">
          <div class="chart">
            <?php
              foreach ($category->result() as $rowca) {
                $name[] = $rowca->name_request_category;
                $percent[] = (int) $rowca->percent;
              }
            ?>
            <canvas id="category"></canvas>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-4 col-sm-4 col-xs-12">
      <div class="box box-solid">
        <div class="box-header with-border">
          <h3 class="box-title">Ticket History</h3>
        </div>
        <div class="box-body">
          <div class="chart">
            <?php
              foreach ($history->result() as $rowh) {
                $bulan[] = date('F',mktime(0,0,0,$rowh->bulan,1));
                $total[] = (int) $rowh->total;
              }
            ?>
            <canvas id="history"></canvas>
          </div>
        </div>
      </div>
    </div>  

    <div class="col-md-4 col-sm-4 col-xs-12">
      <div class="box box-solid">
        <div class="box-header with-border">
          <h3 class="box-title">Top 5 Ticket Creator</h3>
        </div>
        <div class="box-body">
          <div class="chart">
            <?php
              foreach ($creator->result() as $rowc) {
                $user[] = $rowc->name_user;
                $total2[] = (int) $rowc->total;
              }
            ?>
            <canvas id="creator"></canvas>
          </div>
        </div>
      </div>
    </div>
    <?php } ?>
  
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="box box-solid">
        <div class="box-header with-border">
          <h3 class="box-title">Recent Ticket</h3>
        </div>
        <div class="box-body">
          <table class="table table-striped">
            <?php foreach($recent->result() as $baris){ ?>
            <tr>
              <td>
              <span class="product-title"><strong><?php echo '#'.$baris->id_ticket.' - '.strtoupper($baris->request_subject); ?></strong></span>
              
              <?php if($baris->id_request_status == '1'){ ?>
              <span class="label label-primary">Pending</span>
              <?php }else if($baris->id_request_status == '2'){ ?>
              <span class="label label-warning">On Progress</span>
              <?php }else if($baris->id_request_status == '3'){ ?>
              <span class="label label-success">Completed</span>
              <?php }else{ ?>
              <span class="label bg-black">Closed</span>
              <?php }?>
              <a href="<?php echo site_url('request/view/'.$baris->id_request); ?>" style="text-decoration:none;" class="btn btn-xs btn-default pull-right">View</a>
              <br>
              <span style="font-size:12px">
                Last Update, <?php echo date('d M Y',strtotime($baris->last_update_date)); ?>
                <?php 
                  if($id_role == 1)
                  {
                    echo "- ".$baris->name_user;
                  }
                ?>
              </span>
              </td>
            </tr>
            <?php } ?>
          </table>
        </div>
        <div class="box-footer text-center">
          <a href="<?php echo site_url('request'); ?>" class="uppercase">View All Ticket</a>
        </div>
      </div>
    </div>

  </div>
</section>
<script>
$(function() {
    // ChartJS
    
      //Top 5 Ticket Category
      var PieChartCat = document.getElementById('category').getContext('2d');
      var PieChartCa = new Chart(PieChartCat,{
          type:'doughnut',
          data:{
              labels:<?php echo json_encode($name);?>,
              datasets:[{
                  label: "Category",
                  backgroundColor: [
                              "rgba(227, 139, 41,0.5)",
                              "rgba(241, 166, 97,0.5)",
                              "rgba(255, 216, 169,0.5)",
                              "rgba(253, 238, 220,0.5)",
                              "rgba(252, 247, 240,0.5)"
                          ],
                  borderColor:[
                              "#e38b29",
                              "#f1a661",
                              "#ffd8a9",
                              "#fdeedc",
                              "#fcf7f0"
                          ],
                  data:<?php echo json_encode($percent);?>,
              }],
          },
          options: {
          responsive: true,
          tooltips: {
              callbacks: {
                  label: function(tooltipItem, data) {
                        return data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index] + "%";
                    }
              }
          },
          legend: {
              display: true,
              position: "bottom",
              labels: {
                  fontColor: "#333",
                  }
              }
          }
      });

      //Ticket History
      var BarChartCust = document.getElementById('history').getContext('2d');
      var BarChart = new Chart(BarChartCust, {
          type: 'bar',
          data: {
          labels: <?php echo json_encode($bulan);?>,
          datasets : [{
              label: <?php echo date('Y'); ?>,
              backgroundColor: 'rgb(255,127,99,0.5)',
              borderColor: 'rgb(255,127,99,1)',
              data: <?php echo json_encode($total);?>,
          }],
          },
          options: {
          responsive: true,
          maintainAspectRatio: false,
          scales: {
              yAxes: [{
              ticks: {
                  beginAtZero:true,
                  stepSize: 50
              }
              }]
          },
          }
      });

      //Top 5 Ticket Creator
      var PieChartCreat = document.getElementById('creator').getContext('2d');
      var PieChartC = new Chart(PieChartCreat,{
          type:'pie',
          data:{
              labels:<?php echo json_encode($user);?>,
              datasets:[{
                  label:"Users",
                  backgroundColor: [
                              "rgba(227, 139, 41,0.5)",
                              "rgba(241, 166, 97,0.5)",
                              "rgba(255, 216, 169,0.5)",
                              "rgba(253, 238, 220,0.5)",
                              "rgba(252, 247, 240,0.5)"
                          ],
                  borderColor:[
                              "#e38b29",
                              "#f1a661",
                              "#ffd8a9",
                              "#fdeedc",
                              "#fcf7f0"
                          ],
                  data:<?php echo json_encode($total2);?>,
              }],
          },
          options: {
          responsive: true,
          tooltips: {
              callbacks: {
                  label: function(tooltipItem, data) {
                        return data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index];
                    }
              }
          },
          legend: {
              display: true,
              position: "bottom",
              labels: {
                  fontColor: "#333",
                  }
              }
          }
      });

});
</script>