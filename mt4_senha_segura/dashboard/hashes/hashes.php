<?php

error_reporting(0);
ini_set(“display_errors”, 0 );

require '../login/cadastro/config.php';
session_start();
if(isset($_SESSION['id']) && empty($_SESSION['id']) == false ){

?>


<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="shortcut icon" href="https://www.senhasegura.com.br/assets/uploads/2017/07/favicon-senhasegura.png" type="image/x-icon" />
    <meta name="author" content="Glaucivan Pereira">
    <title>Dashboard | Gerência</title>
    <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assests/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    <link href="../assets/css/admin.css" rel="stylesheet">	
  </head>

  <body id="page-top">

    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

      <a class="navbar-brand mr-1" href="../index.php">Gerência de Informações</a>

      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
      </button>

      <!-- Navbar Busca-->
        <div class="input-group">
         
        </div>
        </div>
      </form>

      <!-- Navbar Usuário-->
      <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <h4>Olá, <?php echo $_SESSION['nome'];?>.</h4>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
		   
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">SAIR</a>
          </div>
        </li>
      </ul>

    </nav>

    <div id="wrapper">

      <!-- Sidebar -->
      <ul class="sidebar navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="../index.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
          </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-folder"></i>
            <span>GERENCIAR USUÁRIOS</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <h6 class="dropdown-header">AÇÃO</h6>
            <a class="dropdown-item" href="../login/cadastrar.php">Cadastrar usuário</a>
            <a class="dropdown-item" href="../login/usuarios.php">Todos os usuários</a>
          </div>
        </li>
		
		<li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-folder"></i>
            <span>DISPOSITIVOS</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <h6 class="dropdown-header">VER E MODIFICAR</h6>
            <a class="dropdown-item" href="../dispositivos/cadastrar.php">Cadastrar</a>
            <a class="dropdown-item" href="../dispositivos/registros.php">Visualizar informações</a>
			<div class="dropdown-divider"></div>
            <a class="dropdown-item" href="../dispositivos/pdf.php">Relatório</a>
          </div>
        </li>
		
		<li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-folder"></i>
            <span>CIFRA DE CÉSAR</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="../cifradecesar/cifradecesar.php">Criptografar/<br>Descriptografar</a>
          </div>
        </li>
		
		<li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-folder"></i>
            <span>HASH</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="hashes.php">SHA512/ HMAC/ MD5</a>
          </div>
        </li>
		
		<li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-folder"></i>
            <span>SSH</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <h6 class="dropdown-header">TESTAR E CONECTAR</h6>
            <a class="dropdown-item" href="../ssh/registros.php">Ver dispositivos</a>
          </div>
        </li>
		
		
      </ul>
	  
      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Painel</li>
          </ol>

          <!--Mostrar tabela com registros -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              CIFRA DE CÉSAR</div>	
	<div class="container">
        <div class="card-body">
          <form method="GET" id="cadastro">
            
			<div class="form-group">
              <div class="form-label-group">
                <input type="text"  name="aCriptografar" id="inputPalavraTexto" class="form-control" placeholder="DIGITE A PALAVRA OU TEXTO" required="required" autofocus="autofocus">
                <label for="inputPalavraTexto">DIGITE UM PALAVRA OU TEXTO</label>
              </div>
            </div>
			<input type="submit" class="btn btn-primary btn-block" value="CRIPTOGRAFAR">
			
			<?php
			$aCriptografar=$_GET['aCriptografar'];
			
			$codificada = hash('sha512', $aCriptografar);
			echo "<h1 class='badge badge-dark'>FRASE DIGITADA:</h1> <p class='badge badge-warning'>".$aCriptografar."</p><br>";
			echo "<h1 class='badge badge-dark'>FRASE CRIPTOGRAFADA EM SHA512:</h1> <p class='badge badge-success'>".$codificada."</p><br>";
			
			
			$codificada2 = hash_hmac('ripemd160', $aCriptografar, 'secret');
			echo "<h1 class='badge badge-dark'>FRASE CRIPTOGRAFADA EM HMAC:</h1> <p class='badge badge-success'>".$codificada2."</p><br>";
			
			if(hash($codificada) == hash_hmac($codificada2)){
				echo "<h1 class='badge badge-warning'>AS PALAVRAS CRIPTOGRAFADAS <n>SÃO IGUAIS!</n></h1>";
			}else{
				echo "<h1 class='badge badge-warning'>AS PALAVRAS CRIPTOGRAFADAS <n>SÃO DIFERENTES!</n></h1>";
			}
			
			?>
			
          </form>
        </div>
      </div>
	  <br>
	  <br>
    </div>
	<!-- /.container-fluid -->


      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->
	
    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Pronto para sair?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Selecione "Sair" abaixo se você estiver pronto para encerrar sua sessão atual.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
            <a class="btn btn-primary" href="../login/login.php">Sair</a>
          </div>
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
<?php
}else{
	
	header("Location:../login/login.php");
	
}
?>