<?php include_once __DIR__.'/include/header.php'; ?>
<body>
<main class="container">     
        <?php
            if(isset($_GET['tab'])){
                $pagina = $_GET['tab'];
                switch($pagina){
                    case "home":
                        include_once('iframes/launch.php');
                        break;
                    case "prestadores":
                        include_once('iframes/prestadores.php');
                        break;
                    case "cadastro":
                        include_once('iframes/cadastro.php');
                        break;
                    case "login":
                        include_once('iframes/login.php');
                        break;
                    case "perfil":
                        include_once('iframes/profile.php');
                        break;
                    default:
                        include_once('iframes/launch.php');
                        break;
                }
            }
            else{
                include('iframes/launch.php');
            }            
        ?>
    </main>
  </body>
</html>