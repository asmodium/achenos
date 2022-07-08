<?php require_once $_SERVER["DOCUMENT_ROOT"].'/programador/achenos/vars.php'; require_once $_SERVER["DOCUMENT_ROOT"].'/programador/achenos/config/config.php'; require_once $_SERVER["DOCUMENT_ROOT"].'/programador/achenos/lib/handling.php'; ?>
<?php 
  $user = new Handling();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.2.1/dist/jquery.min.js"></script>
    <script src="../script.js"></script>
    <title>Configurações do perfil</title>
    <link rel="icon" type="image/x-icon" href="../favicon.ico">
</head>
<body>
<div class="row position-static" name="navbar">
    <?php include_once(DIR."/include/navbar.php"); ?>
    </div>
    <?php include_once(DIR."/include/verticalnav.php");?>
  <div class="page-content p-4" id="content">
  <?php if(isset($_GET['s'])){
                $pags = $_GET['s'];
                switch($pags){
                    case "pessoal":
                        echo "<div style='--aspect-ratio: 16/9;'>
                        <iframe 
                          src='/security/editprofile/editname.php'
                          width='1024'
                          height='768'
                          frameborder='0'
                        >
                        </iframe>
                      </div>";
                        break;
                    default:
                        echo DIR.'/security/editprofile/editname.php';
                        break;
                }
            }
            else{
              echo "<div style='--aspect-ratio: 16/9;'>
                        <iframe 
                          src='/security/editprofile/editname.php'
                          width='1024'
                          height='768'
                          frameborder='0'
                        >
                        </iframe>
                      </div>";
            }            ?>
  
  
  </div>

</div>
</body>
