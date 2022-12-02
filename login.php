<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
</head>

<body class="bg-info d-flex justify-content-center align-items-center vh-100">
    <form action="validarLogin.php" method="post">
      <div
      class="bg-white p-5 rounded-5 text-secondary shadow"
      style="width: 25rem">
      <div class="d-flex justify-content-center">
        <img
          src="assets/login-icon.svg"
          alt="login-icon"
          style="height: 7rem"/>
      </div>
      <div class="text-center fs-1 fw-bold">Login</div>
      <div class="input-group mt-4">
        <div class="input-group-text bg-info">
          <img
            src="assets/username-icon.svg"
            alt="username-icon"
            style="height: 1rem"/>
        </div>
        <input
          class="form-control bg-light"
          type="email"
          placeholder="Username" required
          name="username"
          id="username"/>
      </div>
      <div class="input-group mt-1 "><!--wrapp-input-->
        <div class="input-group-text bg-info">
          <img
            src="assets/password-icon.svg"
            alt="password-icon"
            style="height: 1rem"/>
        </div>
        <input
          class="form-control bg-light"
          type="password"
          placeholder="Password" required
          name="contra"
          id="contra"/>
          <span class="icon-eye" style="margin-left:0.9rem;">
            <i class="fas fa-eye-slash" style="margin-top:0.55rem;"></i>
          </span>
          <!--<input type="button" onclick="mostrar()" value="ver">-->
      </div>
      <div class="d-flex justify-content-around mt-1">
        <div class="d-flex align-items-center gap-1">
          <input class="form-check-input" type="checkbox" />
          <div class="pt-1" style="font-size: 0.9rem">Recordarme</div>
        </div>
        <div class="pt-1">
          <a
            href="#"
            class="text-decoration-none text-info fw-semibold fst-italic"
            style="font-size: 0.9rem">¿Olvidastes tu contraseña?</a>
        </div>
      </div>
      <div > <!-- class="btn btn-info text-white w-100 mt-4 fw-semibold shadow-sm" -->
        <input type="submit" value="Login" class="btn btn-info text-white w-100 mt-4 fw-semibold shadow-sm" style{border="none";}>
      </div>
      <div class="d-flex gap-1 justify-content-center mt-1">
        <div>¿Tienes una cuenta?</div>
        <a href="registro.php" class="text-decoration-none text-info fw-semibold"
          >Registrate</a>
      </div>
      <div class="p-3">
        <div class="border-bottom text-center" style="height: 0.9rem">
          <span class="bg-white px-3">o</span>
        </div>
      </div>
      <div class="btn d-flex gap-2 justify-content-center border mt-3 shadow-sm">
        <img
          src="assets/google-icon.svg"
          alt="google-icon"
          style="height: 1.6rem"/>
        <div class="fw-semibold text-secondary">Continuar con Google</div>
      </div>
    </div>

    </form>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script>
        var tipo=document.getElementById("contra");
        const iconEye=document.querySelector(".icon-eye");
        console.log(iconEye);

        iconEye.addEventListener("click", function(){
          const icon=this.querySelector("i");

          if(tipo.type=="password"){
          tipo.type="text";
          icon.classList.remove("fa-eye-slash");
          icon.classList.add("fa-eye");
        }else{
          tipo.type="password";
          icon.classList.remove("fa-eye");
          icon.classList.add("fa-eye-slash");
        }
        });
      
    </script>
</body>
</html>