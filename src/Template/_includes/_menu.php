<?php

require_once dirname(__DIR__, 3) . '/vendor/autoload.php';

use Src\Public\Util;
  if(isset($_GET['close']) && $_GET['close'] == '1')
  Util::Deslogar();

?>

<aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="../../index3.html" class="brand-link">
        <img src="" alt=".." class="brand-image img-circle elevation-3"
          style="opacity: .8">
        <span class="">Bem-vindo</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- codigo php indexiando as paginas para o usuario
        sem permissao para acesso a outras paginas. -->
        
        
        

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Equipamentos
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="setor.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Setor Equipamentos</p>
                </a>
              </li>
            <li class="nav-item">
                <a href="tipodeequipamento.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tipo Equipamentos</p>
                </a>
              </li>
            <li class="nav-item">
                <a href="modelo_equipamento.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Modelo Equipamentos</p>
                </a>
              </li>
            <li class="nav-item">
                <a href="consultarequipamento.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Consultar Equipamentos</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="alocarequipamento.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Alocar Equipamentos</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="equipamento.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> Novo Equipamento</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="removerequipamento.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Remover Equipamento</p>
                </a>
              </li>
            </ul>
          </li>

          <!--codigo php que refere a pagina expecifica.
          nao deixando o usuario acessar qualquer pagina 
          a nao ser a expecifica.-->
        
          
          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-comments"></i>

              <p>
                Usuario
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="novofuncionario.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Novo Funcionario</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="consultarusuario.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Consultar Usuario</p>
                </a>
              </li>
   
          
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="inicial.php" class="nav-link">
              <i class="nav-icon far fa-circle"></i>

              <p>
                Atendimentos
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
           
        
      
           
          <li class="nav-item has-treeview">
            <a href="../../Template/_includes/_menu.php?close=1" class="nav-link">
              <i class="nav-icon far fa-square text-gray"></i>

              <p>
                sair
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
           
        
      
      
        

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
      <!-- /.sidebar -->
    </aside>
