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
  <p><b>Dear <?php echo strtoupper($data->row()->user_handle);?>,</b></p>
  <p>
  <?php echo strtoupper($user->row()->name_user);?> assign this ticket to you.
  </p>
  <p>
    <b><?php echo $data->row()->request_subject;?></b>
  </p>
  <p>
    Click here to view the ticket <a href="https://tira.sefasgroup.com/request/view/<?php echo $data->row()->id_request; ?>">Click</a>
  </p>
  <br>
  </body>
</html>