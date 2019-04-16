<?php
require '../login/cadastro/config.php';

include '../pdf/mpdf.php';

session_start();
if(isset($_SESSION['id']) && empty($_SESSION['id']) == false ){

$codigoHTML='
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>GERÊNCIA</title>
	<style type="text/css">
	body{
		background-color:#FFF;
	}
	.texto{
		color:#000;
		align: center;
	}
	.td1{
		color:#000;
		align: center;
	}
	.td2{
		color:#052d9f;
		align: center;
	}
	</style>
</head>
<body>
';		
$codigoHTML.='
	<center>
   <table border="1" cellspacing="0" cellpadding="4" align="center">
   <tr>
	<td colspan="6"><h4><center>INFORMAÇÕES DOS DISPOSITIVOS</center></h4></td>
	</tr>
   <tr align="center" valign="center">
					<th>HOSTNAME</th>
                    <th>IP</th>
                    <th>TIPO</th>
                    <th>FABRICANTE</th>
   </tr> ';
	$sql = "SELECT * FROM dispositivos";
	$sql = $pdo->query($sql);
	if($sql->rowCount() > 0) {
		foreach($sql->fetchAll() as $dados) {
$codigoHTML.='
	<tr align="center" valign="center">
		<td class="td1">'.$dados["hostname"].'</td>
		<td class="td1">'.$dados["ip"].'</td>
		<td class="td1">'.$dados["tipo"].'</td>
		<td class="td1">'.$dados["fabricante"].'</td>
	</tr>';
	}
}
$codigoHTML.='
   </table>';
$codigoHTML.='
   </center>
   <br>

';
 
$codigoHTML.='
   </center>
<br><br>
</div>
</body></html>';
$arquivo = "Informações_dos_Dispositivos.pdf";

$mpdf = new mPDF();
$mpdf->AddPage('L');
$mpdf->WriteHTML($codigoHTML);
/*
 * F - salva o arquivo NO SERVIDOR
 * I - abre no navegador E NÃO SALVA
 * D - chama o prompt E SALVA NO CLIENTE
 */

$mpdf->Output($arquivo, 'D');

//echo "PDF GERADO COM SUCESSO"; 

}else{
	
	header("Location: ../login/login.php");
	
}
?>
