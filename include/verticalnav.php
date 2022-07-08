<div class="vertical-nav bg-white" id="sidebar">
    <div class="py-4 px-3 mb-4 bg-light">
      <div class="media d-flex align-items-center"><img src="<?php echo Session::get('profilepic');?>" alt="..." width="" class="mr-3 rounded-circle img-thumbnail shadow-sm">
        <div class="media-body">
          <h4 class="m-1"><?php echo Session::get('name');?></h4>
          <p class="font-weight-light text-muted mb-0">Web developer</p>
        </div>
      </div>
    </div>
  
    <p class="text-gray font-weight-bold text-uppercase px-3 small pb-4 mb-0">Configurações de perfil</p>
  
    <ul class="nav flex-column bg-white mb-0">
      <li class="nav-item">
        <a href="?s=pessoal" class="nav-link text-dark font-italic bg-light">
                  <i class="fa fa-th-large mr-3 text-primary fa-fw"></i>
                  Dados Pessoais
              </a>
      </li>
      </li>
    </ul>
</div>