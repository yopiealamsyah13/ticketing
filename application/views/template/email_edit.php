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
  <p><b>Dear <?php if($id == $data->row()->request_by){ echo strtoupper($data->row()->user_handle); }else{ echo strtoupper($data->row()->name_user);}?>,</b></p>
  <p>
    <?php if($id == $data->row()->request_by){ echo strtoupper($data->row()->name_user); }else{ echo strtoupper($data->row()->user_handle);}?> has edited this ticket.
  </p>
  <p>
    <b><?php echo  $data->row()->request_subject;?></b>
  </p>
  <p>
    Click here to view the ticket <a href="https://tira.sefasgroup.com/request/view/<?php echo $data->row()->id_request; ?>">Click</a>
  </p>
  <br>
  </body>
</html>