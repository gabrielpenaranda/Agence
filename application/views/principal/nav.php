<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="<?php echo base_url() ?>"><img src="<?php echo base_url() ?>resources/img/agence.png" alt="Agence"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">

      <li class="nav-item dropdown">
        <a class="nav-link" href="" id="AgenceDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Agence
        </a>

        <div class="dropdown-menu" aria-labelledby="AgenceDropdown">
          <a class="dropdown-item" href="#">Undefined</a>
        </div>
      </li

      <li class="nav-item dropdown">
        <a class="nav-link" href="" id="ProyectosDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Proyectos
        </a>

        <div class="dropdown-menu" aria-labelledby="ProyectosDropdown">
          <a class="dropdown-item" href="#">Undefined</a>
        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link" href="" id="AdministrativoDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Administrativo
        </a>

        <div class="dropdown-menu" aria-labelledby="AdministrativoDropdown">
          <a class="dropdown-item" href="#">Undefined</a>
        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link" href="" id="ComercialDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Comercial
        </a>

        <div class="dropdown-menu" aria-labelledby="ComercialDropdown">
          <a class="dropdown-item" href="<?php  echo base_url('comercial/performance') ?>">Performance Comercial</a>
        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link" href="" id="FinancieroDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Financiero
        </a>

        <div class="dropdown-menu" aria-labelledby="FinancieroDropdown">
          <a class="dropdown-item" href="#">Undefined</a>
        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link" href="" id="UsuarioDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Usuario
        </a>

        <div class="dropdown-menu" aria-labelledby="UsuarioDropdown">
          <a class="dropdown-item" href="#">Undefined</a>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?php  echo base_url('salir') ?>">Salir</a>
      </li>

  </div>
</nav>
