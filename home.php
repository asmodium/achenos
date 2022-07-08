<?php require_once 'vars.php'; require_once 'config/config.php'; require_once 'lib/handling.php'; require_once 'lib/Session.php';   ?>
<?php  Session::checkLogin();
$user = new Handling(); ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.2.1/dist/jquery.min.js"></script>
    <script src="script.js"></script>
    <title>Achenos - O seu profissional</title>
    <link rel="icon" type="image/x-icon" href="favicon.ico">
</head>
<body>
    <div class="row position-static" name="navbar">
    <?php include_once(DIR."/include/navbar.php"); ?>
    </div>
    <div class="container" name="container" >
        
    <?php
            if(isset($_GET['tab'])){
                $pagina = $_GET['tab'];
                switch($pagina){
                    case "prestadores":
                        include_once(DIR.'/iframes/prestadores.php');
                        break;
                    case "cadastro":
                        include_once(DIR.'/iframes/cadastro.php');
                        break;
                    case "login":
                        include_once(DIR.'/iframes/login.php');
                        break;
                    case "perfil":
                        include_once(DIR.'/iframes/profile.php');
                        break;
                    case "busca":
                        include_once(DIR.'/iframes/search.php');
                        break;
                    case "launch":
                        include_once(DIR.'/iframes/launch.php');
                        break;
                    default:
                        include_once(DIR.'/iframes/launch.php');
                        break;
                }
            }
            else{
                include_once(DIR.'/iframes/launch.php');
            }            
        ?>
    </div>
</div>
</body>
</html>