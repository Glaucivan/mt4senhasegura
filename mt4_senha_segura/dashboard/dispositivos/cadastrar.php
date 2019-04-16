<?php
require '../login/cadastro/config.php';
session_start();
if(isset($_SESSION['id']) && empty($_SESSION['id']) == false ){

if(isset($_POST['hostname']) && empty($_POST['hostname']) == false) {
	$hostname = addslashes($_POST['hostname']);
	$ip = addslashes($_POST['ip']);
	$tipo = addslashes($_POST['tipo']);
	$fabricante = addslashes($_POST['fabricante']);
	$porta = addslashes($_POST['porta']);

	$sql= "INSERT INTO dispositivos SET hostname = '$hostname', ip = '$ip', tipo = '$tipo', fabricante = '$fabricante', porta = '$porta'";
	$pdo->query($sql);

	header("Location: registros.php");
}
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
          <a class="nav-link" href="index.php">
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
            <a class="dropdown-item" href="cadastrar.php">Cadastrar</a>
            <a class="dropdown-item" href="registros.php">Visualizar informações</a>
			<div class="dropdown-divider"></div>
            <a class="dropdown-item" href="pdf.php">Relatório</a>
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
            <a class="dropdown-item" href="../hashes/hashes.php">SHA512/ HMAC</a>
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
              CADASTRAR AS INFORMAÇÕES DO DISPOSITIVO</div>	
	<div class="container">
        <div class="card-body">
          <form method="POST" id="cadastro">
            
			<div class="form-group">
              <div class="form-label-group">
                <input type="text"  name="hostname" id="inputHostname" class="form-control" placeholder="HOSTNAME" required="required" autofocus="autofocus">
                <label for="inputHostname">HOSTNAME</label>
              </div>
            </div>
			
			<div class="form-group">
              <div class="form-label-group">
                <input type="text" id="inputIp" name="ip" class="form-control" placeholder="IP" required="required">
                <label for="inputIp">IP</label>
              </div>
            </div>
			
			<div class="form-group">
              <div class="form-label-group">
                <input type="text" id="inputPorta" name="porta" class="form-control" placeholder="PORTA PARA CONEXÃO" required="required">
                <label for="inputPorta">PORTA PARA CONEXÃO</label>
              </div>
            </div>
			
			<div class="form-group">
				<div class="form-label-group">
				<select name="tipo" class="form-control" >
					<option value=" TIPO "> TIPO </option>
					<option value="SERVIDOR">SERVIDOR</option>
					<option value="ROTEADOR">ROTEADOR</option>
					<option value="HUB">HUB</option>
					<option value="SWITCH">SWITCH</option>
					<option value="NOTEBOOK">NOTEBOOK</option>
					<option value="PC">PC</option>
					<option value="DISPOSITIVO MÓVEL">DISPOSITIVO MÓVEL</option>
					<option value="OUTRO">OUTRO</option>
				</select>
				</div>
			</div>
			
			<div class="form-group">
				<div class="form-label-group">
				<select name="fabricante" class="form-control" >
					<option value="FABRICANTE">FABRICANTE</option>
					<option value="HP">HP</option>
					<option value="SAMSUNG">SAMSUNG</option>
					<option value="LG">LG</option>
					<option value="ASUS">ASUS</option>
					<option value="APPLE">APPLE</option>
					<option value="POSITIVO">POSITIVO</option>
					<option value="MICROSOFT">MICROSOFT</option>
					<option value="LENOVO">LENOVO</option>
					<option value="SUPER MICRO">SUPER MICRO</option>
					<option value="ORACLE">ORACLE</option>
					<option value="DELL">DELL</option>
					<option value="ANATEL">ANATEL</option>
					<option value="LINK ONE">LINK ONE</option>
					<option value="IBM">IBM</option>
					<option value="CISCO">CISCO</option>
					<option value="3COM">3COM</option>
					<option value="INTEL">INTEL</option>
					<option value="HUAWEI">HUAWEI</option>
					<option value="TP-LINK">TP-LINK</option>
					<option value="D-LINK">D-LINK</option>
					<option value="INTELBRAS">INTELBRAS</option>
					<option value="MOTOROLA">MOTOROLA</option>
					<option value="OUTRA">OUTRA</option>
				</select>
				</div>
			</div>
			
			
			
			<input type="submit" class="btn btn-primary btn-block" value="CADASTRAR">
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