<?php include_once DIR.'/lib/handling.php'; include_once DIR.'/lib/queryhandling.php'; ?>
<?php Session::checkLogin(); 
    $user = new Handling();
?>

<div class="row">
    <div class="col">
        <p class="h2 text-center mt-2">Busca</p>
    </div>
</div>
<div class="row">
    <div class="col">
        <table class="table table-striped mt-3">
            <thead class="table-dark">
                <tr>
                    <td class="text-center">Nome</td>
                    <td class="text-center">Nome de usuário</td>
                    <td class="text-center">Email</td>
                </tr>
            </thead>
            <tbody>
            <?php
          $it = new RecursiveArrayIterator();
          $result = new TableRows($it);
          if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['search']) && isset($_POST['searchkey'])){
            $result->search($_POST);
        }
      ?>
            </tbody>            
        </table>
    </div>
</div>