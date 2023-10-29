<!doctype html>
<html>
  <head>
    <meta name="viewport" content="width=device-width" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Email Notification</title>
    <style>
    p{
      font-family:"Labrador A Medium";
      color:black;
      font-size:16px;
    }

    .orange{
      color:orange;
      font-size:14px;
      font-style:verdana;
    }
    
    .up{
      text-transform: uppercase;
    }
    </style>
  </head>
  <body>
  <p><b>Dear <?php echo $data->row()->user_handle; ?>,</b></p>
  <p>
  <?php echo $data->row()->name_user; ?> Comment on ticket <?php echo '['.$data->row()->id_ticket.'] '.$data->row()->request_subject; ?>.
  </p>
  <p>
    Click here for view ticket <a href="https://tira.sefasgroup.com/request/view/<?php echo $data->row()->id_request; ?>">Click</a>
  </p>
  <br>
  <table cellpadding="0" cellspacing="0" style="background: none;">
    <tr>
      <td>
        <table cellpadding="0" cellspacing="0" style="background: none;">
          <tr>
            <td class="text" style="padding-bottom:15px; font-size: 14px;"><strong><span style="color:#f36c21;">IT TEAM – SEFAS GROUP</span></strong>
            </td>
          </tr>
          <tr>
            <td class="text" style="padding-bottom:5px; font-size:12px;">
              <img style="vertical-align:middle;" src="https://drive.google.com/uc?export=view&id=1aBXcd1jJfn4Z8WVcOvK0EQrk57cQYjbe" height="15px" border="0"> (021) 385 8756
            </td>
          </tr>
          <tr>
            <td class="text" style="padding-bottom:5px; font-size:12px;">
              <img style="vertical-align:middle;" src="https://drive.google.com/uc?export=view&id=1-yzZXPXBoRSQeqq-yof4m6rusSyG6_Uf" height="15px" border="0">  0818-224324
            </td>
          </tr>
          <tr>
            <td class="text" style="padding-bottom:10px; font-size:12px;">
              <img style="vertical-align:middle;" src="https://drive.google.com/uc?export=view&id=1fQDUq1QtRYMRSKUvYfuSdQDVJRJioouS" height="15px" border="0"> it@sefasgroup.com
            </td>
          </tr>
          <tr>
            <td style="padding-top: 5px;"><a href="https://www.sefasgroup.com"><img src="https://drive.google.com/uc?export=view&id=1Z9DuAu7nLlump8701lx_ePTlU1MhI5ag" height="45px" border="0"></a></td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
  </body>
</html>