<?php
    require_once 'lib/queryhandling.php';
    Session::checkLogin();
	$user = new Handling(); 
    ?>
<div class="container" style="color: white;">
<div class="row">
    <div class="col">
        <p class="h2 text-center mt-2">Nossos Prestadores</p>
    </div>
</div>
<div class="row">
    <div class="col">
        <table class="table table-striped mt-3" style="background-color: white;">
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
                $result->queryWorkers();
                ?>
            </tbody>            
        </table>
    </div>
</div>
</div>