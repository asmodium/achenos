
<?php
	 Session::checkLogin();
	 
	$user = new Handling();
	
	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])){
		$userLogin	= $user->userLogin($_POST);
		header('Location:index.php?tab=perfil');
	}
	?>
	<div class="position-absolute top-50 start-50 translate-middle">
		<div class="container">
			<div class="row form-control">
				<div><p class="h2 text-center">Login</p></br></br>
		
		<?php 
			if (isset($userLogin)) {
				echo $userLogin;
			}
		?>
					<form class="" action="" method="POST">
						<div class="row">
							<label for="username" class="col-sm-6 col-form-label">Nome de usuário</label>
							<div class="col">
								<input type="text" class="form-input form-control" id="username" name="username" placeholder="Nome de usuário">
							</div>
						</div></br>
						<div class="row">
							<label for="password" class="col-sm-6 col-form-label">Senha</label>
							<div class="col">
								<input type="password" class="form-input form-control" id="password" name="password" placeholder="Senha">
							</div>
						</div></br>
						<div class="row">
							<button type="submit" name="login" class="btn btn-lg btn-block btn-success">Entrar</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

</body>
</html>