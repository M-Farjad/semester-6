<?php
require_once '../dompdf/autoload.inc.php';
 use Dompdf\Dompdf;
 $dompdf= new Dompdf;
include'../config.php';


$html='<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Invoice</title>

  </head>
  <body>
    
        <table style="width: 100%;">
          <thead>
            <th>S.No.</th>
            <th> NAME</th>
            <th>QTY</th>
            <th>UNIT PRICE</th>
            <th>Total</th>
          </thead>
          <tbody>';
          
        $select_book = mysqli_query($conn, "SELECT * FROM `users_info`") or die('query failed');
        $s=1;
        if(mysqli_num_rows($select_book) > 0){
            while($fetch_book = mysqli_fetch_assoc($select_book)){
    
          $html .=' <tr>
              <th> '.$s.'</th>
              <th> '.$fetch_book['id'].'</th>
              <th> '.$fetch_book['name'].''.$fetch_book['surname'].'</th>
              <th> '.$fetch_book['email'].'</th>
              <th> '.$fetch_book['password'].'</th>
              <th> '.$fetch_book['user_type'].'</th>
            </tr>';
            
                   $s++; }
                }
              
      
         $html .='   
          </tbody>
        </table>
        </body>
</html>';
     

$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$dompdf->stream('invoice.pdf',['Attachment'=>0]);
?>