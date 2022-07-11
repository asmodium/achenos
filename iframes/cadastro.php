<?php $user = new Handling();
      
	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])){
		$userReg	= $user->userRegistration($_POST);
	}
?>

  <div class="cadastro">
    <div class="container">
      <div class="form-control">
        <div><p class="h2 text-center">Cadastro</p></br></br>
          <?php
                        if (isset($userReg)) {
                          echo $userReg;
                        }
                        ?>
          <form action="" class="" method="POST">
            <div class="form-group row">
              <label for="name" class="col-sm-4 col-form-label div-label">Nome</label>
              <div class="col">
                <input type="text" class="form-control cadastro-input" id="name" name="name" placeholder="Nome">
              </div>
            </div>
            <div class="form-group row">
              <label for="username" class="col-sm-4 col-form-label div-label">Nome de usuário</label>
              <div class="col">
                <input type="text" class="form-control cadastro-input" id="username" name="username" placeholder="Nome de usuário">
              </div>
            </div><br>
            <div class="form-group row">
              <label for="password" class="col-sm-4 col-form-label div-label">Senha</label>
              <div class="col">
                <input type="password" class="form-control cadastro-input" id="password" name="password" placeholder="Senha">
              </div>
            </div>
            <div class="form-group row">
              <label for="password" class="col-sm-4 col-form-label div-label">Confirmar a senha</label>
              <div class="col">
                <input type="password" class="form-control cadastro-input" id="confirmpassword" name="confirmpassword" placeholder="Confirmar a senha">
              </div>
            </div><br>
            <div class="form-group row">
              <label for="email" class="col-sm-4 col-form-label div-label">Email</label>
              <div class="col">
                <input type="email" class="form-control cadastro-input" id="email" name="email" placeholder="Email">
              </div>
            </div>
            <div class="form-group row">
              <label for="email" class="col-sm-4 col-form-label div-label">Confirme o Email</label>
              <div class="col">
                <input type="email" class="form-control cadastro-input" id="confirmemail" name="confirmemail" placeholder="Confirmar o email">
              </div>
            </div><br>
            <div class="row">
              <div class="col">
                <div class="form-check box-check">
                  <input class="form-check-input" type="checkbox" id="Check1" required>
                  <label class="control-label form-check-label div-label" for="Check1">
                    Ao clicar em cadastrar, você confirma estar de acordo com os <br> nossos <a href="#">termos de serviço</a> e afins.
                  </label>
                </div>
              </div>
            </div></br>
            <div class="row">
                <button type="submit" name="register" class="btn btn-primary btn-lg btn-block">Cadastrar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
