<?php $baris = $view->row();?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title><?php echo $baris->id_ticket?></title>
</head>
<style>
  body{
      font-size: 12px;
      font-family:Arial, Helvetica, sans-serif;
  }

  .page-header{
      color:#f36c21;
      padding:3px;
  }

  #table,th,td{
    border:2px solid white;
    text-align:justify;
  }

  th{
    background-color:#ebe9e6;
    height:20;
  }

  td{
    vertical-align: top;
    padding: 5px;
  }
  
  .border{
    border-top:3px solid orange;
    margin:10px;
  }
  
  .date-request {
		position: absolute;
    top:0;
		right: 10;
	}

  .th-heading{
    background-color:#fff;
    text-decoration:none;
  }
  
</style>
<body>
    <h3><b>#<?php echo strtoupper($baris->id_ticket); ?></b></h3>
    <h2 class="page-header"></i> <?php echo strtoupper($baris->request_subject); ?></h2>
    <p class="date-request">Created Date : <?php echo date('d M Y',strtotime($baris->request_date));?></p>
    <table cellspacing="0" width="100%">
      <tr>
        <th align="left" class="th-heading"><small>Request By : <?php echo $baris->name_user; ?></small></th>
        <th align="right" class="th-heading"><small>Handle By : <?php echo $baris->user_handle; ?></small></th>
      </tr>
    </table>
    <div class="border">
    <table cellspacing="0" width="100%">
    <tbody>
        <tr>
            <th align="center">Assign To</th>
            <th align="center">Category</th>
            <th align="center">Level</th>
            <th align="center">Location</th>
        </tr>
        <tr>
            <td><?php echo strtoupper($baris->name_departemen); ?></td>
            <td><?php echo strtoupper($baris->name_request_category); ?></td>
            <td><?php echo strtoupper($baris->name_request_level); ?></td>
            <td><?php echo strtoupper($baris->name_area." [".$baris->code_area."]"); ?></td>
        </tr>
      </tbody>
      </table>
      </div>
      <div class="border">
    <table cellspacing="0" width="100%">
    <tbody>
        <tr>
            <th colspan="4" align="center">Description</th>
        </tr>
        <tr>
            <td colspan="4"><?php echo strtoupper($baris->request_description); ?></td>
        </tr>
    </tbody>
    </table>
    </div>
      <div class="border">
    <table cellspacing="0" width="100%">
    <tbody>
        <tr>
            <th colspan="4" align="center">Submite Notes</th>
        </tr>
        <tr>
            <td colspan="4"><?php echo strtoupper($baris->request_submit_notes); ?></td>
        </tr>
    </tbody>
    </table>
    </div>
    <br>
    <div class="border">
    <table cellspacing="0" width="100%">
    <tbody>
      <tr>
            <th colspan="2" align="center">Comment</th>
            <th colspan="2" align="center">Timeline</th>
      </tr>
      <tr>
            <td colspan="2" width="350px">
              <?php foreach($comment->result() as $rowc){ ?>
              <ul>
                <li><?php echo "[".$rowc->name_user."] ".date('d/m/Y h:i:s',strtotime($rowc->date_comment))."<br> ".$rowc->note_comment; ?></li>
              </ul>
              <?php } ?>
            </td>
            <td colspan="2">
              <?php foreach($timeline->result() as $rowt){ ?>
              <ul><li><?php echo "[".$rowt->name_user."] ".date('d/m/Y h:i:s',strtotime($rowt->date_timeline))."<br> ".$rowt->request_timeline_notes; ?></li>
              </ul>
              <?php } ?>
            </td>
      </tr>
    </tbody>
    </table>
    </div>
</body>
</html>