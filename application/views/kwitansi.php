<html>   
 <head>   
  <title>Print</title>   
 </head>   
 <body>    
<table width="800" border="0" cellpadding="4" cellspacing="0" style="border: 1px solid #000;">
<tr>
    <td style="border-bottom:1px solid #000;" colspan="3"><?php if($cetak->kode_transaksi == "101"){echo "Bukti Setoran";}else{echo"Bukti Penarikan";}?></td>
</tr>
 <tr>  
   <td rowspan="7" width="120" style="border-right:1px solid #000;"> </td>  
   <td width="150" valign="top" > No </td>  
   <td valign="top" > : <?php echo $cetak->id_transaksi;?> </td>  
 </tr>  
 <tr>  
   <td valign="top" > No Simpanan </td>  
   <td valign="top" > : <?php echo $cetak->no_rekening;?> </td>  
 </tr>  
 <tr>  
   <td valign="top" > Nominal </td>  
   <td valign="top" > : Rp. <?php if($cetak->kode_transaksi == "101") {echo number_format($cetak->kredit,2,',','.');}else{echo number_format($cetak->debit,2,',','.');}?></td>  
 </tr>  
 <tr> 
 <td valign="bottom"></td>  
   <td valign="top" align="right" height="100"> <?php echo "Denpasar, ".$cetak->tanggal_transaksi;?> </td>  
 </tr> 
 <tr> 
 <td valign="bottom"> </td>  
   <td valign="top" align="right" height="30"> <?php echo "Kasir";?> </td>  
 </tr>  
 </table>    
 </body>   
 </html>   