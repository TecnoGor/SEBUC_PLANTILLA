<?php
  session_start();

  if (!empty($_SESSION['active'])) {
    header('Location: admin/');
  }

  include('templates/header.php');

?>

<body class="slider_Bg">

  <div class="login-container fBgContainer">
    <div class="form-container">
        <p class="text-center" style="margin-top: 17px;">
           <!-- <i class="zmdi zmdi-account-circle zmdi-hc-5x"></i> -->
            <img src="assets/img/logoSEBUC.png" alt="" width="325px">
       </p>
       <h4 class="text-center all-tittles" style="margin-bottom: 30px;">inicia sesión</h4>
       <form method="POST" action="">
            <div class="group-material-login">
              <input type="text" class="material-login-control" id="user" required="" maxlength="70">
              <span class="highlight-login"></span>
              <span class="bar-login"></span>
              <label><i class="zmdi zmdi-account"></i> &nbsp; Nombres</label>
            </div><br>
            <div class="group-material-login">
              <input type="password" class="material-login-control" id="password" required="" maxlength="70">
              <span class="highlight-login"></span>
              <span class="bar-login"></span>
              <label><i class="zmdi zmdi-lock"></i> &nbsp; Contraseña</label>
            </div>
            <button class="btn-login" id="logButton" type="button">Ingresar al sistema &nbsp; <i class="zmdi zmdi-arrow-right"></i></button>
        </form>
    </div>   
  </div>

  <?php
  
    include('templates/footer.php');
  
  ?>