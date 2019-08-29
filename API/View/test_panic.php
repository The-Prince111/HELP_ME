<div class="body">
<html>
    <head>
        <meta charset="UTF-8">
        <link href="Lib/home.css" rel="stylesheet" type="text/css"/>
        <title>View Application</title>
    </head>
    <body>
         <div class="content">
             <br><br>
                      <div class="ten">
<form action='' method=POST>

<?php  
echo "<form method = POST>";
 echo "<div class='pagehead'>MY APPLICATIONS</div><br>";
 echo "<table><tr><th>Application No.</th><th>Date Applied</th><th>Status</th><th>Document</th><th>Amount</th><th>Tender</th><th>Applied By</tr>";
$panix = panic::get_panic();
echo "<tr>
<td>$panix->pan_id</td>
<td>$panix->user_name</td>
<td>$panix->user_vehicle</td>
<td>$panix->user_cell</td>
<td>$panix->user_location</td>
 <td><input type=hidden name=appNo value = ".$panix->pan_id.">
 <input type=submit name=btnCancel value=Cancel>
 </td>
</tr>";

?>
</table>
<br/><br/><br/><br/>
 <?php
echo "<input type=hidden name=controller value = Client>";
echo "<input type=hidden name=action value = home>";
echo '<input type=submit name=btnHome class=buttonCancel value=Home>';

?>
</form>
             </div>
             </div>
        </div>
     </div>
    </body>
</html>
</div>