<!DOCTYPE html>
<html lang="pt-BR">
<?php
session_start();

if(isset($_POST['email']) && empty($_POST['email']) == false){
	$email = addslashes($_POST['email']);
	$senha = md5(addslashes($_POST['senha']));
	
	$dsn = "mysql:dbname=senha_segura;host=127.0.0.1";
	$dbuser = "root";
	$dbpass = "";
	
	try{
		$db = new PDO($dsn, $dbuser, $dbpass);
		
		$consulta = $db->query("SELECT * FROM usuario WHERE email = '$email' AND senha = '$senha'");
		
		if($consulta->rowCount() > 0){
			
			$inforlogado = $consulta->fetch();
			
			$_SESSION['id'] = $inforlogado['id'];
			$_SESSION['nome'] = $inforlogado['nome'];
			
			header("Location: ../index.php");
			
		}
		
	}catch(PDOException $e){
			echo "Falha:".$e->getMessage();
		}
	}
?>
  <head>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="shortcut icon" href="https://www.senhasegura.com.br/assets/uploads/2017/07/favicon-senhasegura.png" type="image/x-icon" />
    <meta name="author" content="Glaucivan Pereira">
    <title>ACESSO</title>
    <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assests/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    <link href="../assets/css/admin.css" rel="stylesheet">
  </head>

  <body class="bg-dark">

    <div class="container">
      <div class="card card-login mx-auto mt-5">
        <div class="card-header"><img src="https://www.senhasegura.com.br/assets/uploads/2017/07/logo-senhasegura-1.png"></div>
        <div class="card-body">
          <form method="POST">
            <div class="form-group">
              <div class="form-label-group">
                <input type="email" id="inputEmail" name="email" class="form-control" placeholder="E-mail" required="required" autofocus="autofocus">
                <label for="inputEmail">E-MAIL</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="password" id="inputPassword" name="senha" class="form-control" placeholder="Senha" required="required">
                <label for="inputPassword">SENHA</label>
              </div>
            </div>
            <div class="form-group">
              <div class="checkbox">
                <label>
                  <input type="checkbox" value="remember-me">
                  Memorizar credenciais
                </label>
              </div>
            </div>
			<input type="submit" class="btn btn-primary btn-block" value="ACESSAR">
          </form>
        </div>
      </div>
    </div>

    <script src="../assets/jquery/jquery.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/bootstrap/datatables/jquery.dataTables.js"></script>
    <script src="../assets/bootstrap/datatables/dataTables.bootstrap4.js"></script>
    <script src="../assets/js/admin.min.js"></script>
    <script src="../assets/js/datatables.js"></script>

  </body>

</html>
