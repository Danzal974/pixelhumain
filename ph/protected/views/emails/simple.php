<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN" "http://www.w3.org/TR/REC-html40/loose.dtd">
<html>
  <head>
    <title><?php echo $title?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  </head>
  <body>
    <span style="text-align: left;"><?php echo Utils::getServerName()?></span>
    <table cellpadding="0" cellspacing="0" border="0" width="100%">
      <tr>
        <td align="left">
           <h3><?php echo $title; ?> : </h3>
           <h5>Objet : <?php echo $subject; ?></h5>
           <?php echo $message; ?>
           <br/>
        </td>
      </tr>
      </table>
  </body>
</html>