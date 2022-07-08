<?php
  require_once DIR.'/vars.php';
	include_once DIR.'/lib/Session.php';
  include_once DIR.'/lib/handling.php';
  include_once DIR.'/lib/queryhandling.php';
	Session::init();
	if (isset($_GET['action']) && $_GET['action'] == 'logout') {
		Session::destroy();
	}
	
?>
<!-- Navbar -->
<div class="container sticky-top">
<nav id="navbar_top" class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="/programador/achenos/index.php"><img src="/programador/achenos/img/logo.png" alt="Logo" style="width:40px;" class="">Achenos</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarScroll">
      <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
        <li class="nav-item">
          <a class="nav-link" href="/programador/achenos/home.php?tab=prestadores">Prestadores</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu fixed-top" aria-labelledby="navbarScrollingDropdown">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <!--
                botão desativado
                <li class="nav-item">
                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Link</a>
        </li>-->
      </ul>

      <form class="d-flex" action="" method="POST">
        <input class="form-control me-2" type="search" name="searchkey" id="searchkey" placeholder="Busca" aria-label="Busca">
        <button class="btn btn-outline-success" name="search" id="search" type="submit" href="?p=busca">Busca</button>
      </form>
      
      <ul class="nav navbar-nav navbar-right">
			 <?php
			  if(empty(Session::get('id'))){ ?>
			 	<li class="nav-item"><a class="nav-link" href="/programador/achenos/home.php?tab=login">Login</a></li>
        <li class="nav-item"><a class="nav-link" href="/programador/achenos/home.php?tab=cadastro">Cadastro</a></li>
			 	<?php }else{ ?>
           <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <img src="<?php echo Session::get('profilepic');?>" width="40" height="40" class="rounded-circle">
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
            <li><a class="dropdown-item" href="/programador/achenos/home.php?tab=perfil">Perfil</a></li>
            <li><a class="dropdown-item" href="/programador/achenos/security/index.php">Configurações</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="?action=logout">Logout</a></li>
          </ul>
        </li>
			 	<?php }?>
			 </ul>
    </div>
  </div>
</nav>
</div>