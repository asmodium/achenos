<?php require_once $_SERVER["DOCUMENT_ROOT"].'/programador/achenos/vars.php'; require_once $_SERVER["DOCUMENT_ROOT"].'/programador/achenos/config/config.php'; require_once $_SERVER["DOCUMENT_ROOT"].'/programador/achenos/lib/handling.php'; ?>
<?php 

  $user = new Handling();
?>

<?php if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update03'])){
    $updatpc = $user->updatePicture($_POST);
    header("refresh: 2");
    die;
    }
?>
<?php
    if (isset($updatpc)) {
        echo $updatpc;
    }
?>
<?php if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])){
    $updatus = $user->updateName($_POST);
    header("refresh: 2");
    die;
     }
?>
<?php
    if (isset($updatus)) {
        echo $updatus;
     }
?>
<?php if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update02'])){
    $olde = Session::get('email');
    $colde = $_POST['oldemail'];
    $newe = $_POST['email'];
    $cnewe = $_POST['conf-email'];
        if ($olde === $colde && $newe === $cnewe){
            $updatem = $user->updateEmail($_POST);
            header("refresh: 2");
            die;
        } else {header("refresh: 2"); die;}
        }
?>
<?php
    if (isset($updatem)) {
            echo $updatem;
        }
?>
<script src="../../script.js"></script>
    <div class="container" style="color: white;">Alterar Imagem <button onclick="hideYourselfPic()">Editar</button>
        <div class="flex-container" id="pic-form" style="display: none;">

            <div class="form-control">
                <form method="POST" action="" enctype="multipart/form-data">
                    <input type="hidden" class="form-control" name="username" value="<?php echo Session::get('username')?>">
                    <div class="form-group row">
                        <label for="pic01" class="col-sm-4 col-form-label">Imagem atual</label>
                        <div name="pic01" id="pic01"><?php echo Session::get('profilepic')?></div>
                    </div><br>
                    <div class="form-group row">
                        <label for="profilepic" class="col-sm-4 col-form-label">Nova imagem</label>
                        <input type="file" name="profilepic" id="profilepic">
                    </div>
                    <div class="form-group row">
                        <button type="submit" name="update03" class="btn btn-primary btn-lg btn-block">Atualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="container" style="color: white;">Alterar Nome <button onclick="hideYourselfName()">Editar</button>
        <div class="flex-container" id="name-form" style="display: none;">
            
            <div class="form-control">
				<form method="POST" action="">
					<input type="hidden" class="form-control" name="username" value="<?php echo Session::get('username')?>">
                    <div class="form-group row">
                        <label for="name" class="col-sm-4 col-form-label">Nome</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?php echo Session::get('name')?>">
                    </div><br>
                    <div class="form-group row">
                        <button type="submit" name="update" class="btn btn-primary btn-lg btn-block">Atualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="container" style="color: white;">Alterar Email <button onclick="hideYourselfEmail()">Editar</button>
        <div class="flex-container" id="email-form" style="display: none;">
        
            <div class="form-control">
				<form method="POST" action="">
					<input type="hidden" class="form-control" name="username" value="<?php echo Session::get('username')?>">
                    <div class="form-group row">
                        <label for="email" class="col-sm-4 col-form-label">Email atual</label>
                        <input type="email" class="form-control" id="oldemail" name="oldemail">
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-4 col-form-label">Novo Email</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-4 col-form-label">Confirme o Email</label>
                        <input type="email" class="form-control" id="conf-email" name="conf-email">
                    </div>
                    <div class="form-group row">
                        <button type="submit" name="update02" class="btn btn-primary btn-lg btn-block">Atualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

