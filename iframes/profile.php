<?php 
  Session::checkSession();
  $user = new Handling();
 
?>


 
 <div class="container main-body bg-light">
  <div class="row">
   <div class="col-lg-8 col-lg-offset-2">
    <div class="panel panel-default">
     <div class="panel-heading text-info h2">
      Seu perfil <hr>
      <div class="">
       <?php 
        $name = Session::get('loginmsg');
        if (isset($name)) {
         echo $name;
        }
        Session::set('loginmsg',NULL);
       ?>
      </div>
     </div>
     <div class="panel-body">
      <table class="table table-bordered table-striped">
       <tr>
        <th>Nome</th>
        <th>Nome de usuário</th>
        <th>E-mail</th>
       </tr>
       <tr>
        <td><?php echo Session::get('name'); ?></td>
        <td><?php echo Session::get('username'); ?></td>
        <td><?php echo Session::get('email'); ?></td>
       </tr>
      </table>
     </div>
    </div>
   </div>
  </div>
 </div>
</body>
</html>