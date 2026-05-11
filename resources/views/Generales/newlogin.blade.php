<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="js/Generales/Plugins/sweetalert/sweetalert2.css">
    <link rel="stylesheet" href="js/Generales/Plugins/fontawesome-6.4.0/css/all.min.css">
    <link rel="stylesheet" href="js/Generales/Plugins/animate-css/animatecss.css" />

    <link rel="stylesheet" href="css/Generales/Login.css">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>LogIn</title>
</head>

<body>
    <div class="login-page">
        <div class="form animate__animated animate__fadeInDown animate__faster">
            <div class="text-center py-2">
                <img src="{{asset('/img/LogoClinica.png')}}"
                  style="width: 180px;" alt="logo">
              </div>
            <h2 class="mt-1 mb-3 pb-1">Clinica Dental</h2>
            <form class="login-form" id="formularioLogin" enctype="multipart/form-data">
                @csrf
                <div class="form-group d-block text-left">
                    <label for="">Email:</label>
                    <input type="text" placeholder="Email" id="email" name="email" class="mb-0" />
                </div>
                <div class="form-group d-block text-left">
                    <label for="">Contraseña:</label>
                    <input type="password" placeholder="Contraseña" id="password" name="password" class="mb-0" />
                </div>
                <button id="iniciarSesion" name="iniciarSesion" type="submit" class="mb-3"><i class="fa-solid fa-right-to-bracket"></i> Iniciar Sesión</button>
                <p><span id="error" class="text-center text-danger"></span></p>
            </form>

            <p class="pt-4 version">S P R M<br>Versión 1.0.0</p>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>

    <script src="js/Generales/Plugins/jquery-validation/jquery.validate.min.js"></script>
    <script src="js/Generales/Plugins/jquery-validation/additional-methods.js"></script>
    <script src="js/Generales/Plugins/sweetalert/sweetalert2.js" charset="UTF-8"></script>
    <script src="js/Generales/Plugins/fontawesome-6.4.0/js/all.min.js" charset="UTF-8"></script>
    <script src="js/Generales/Validaciones/PeticionAjax.js"></script>
    <script src="js/Generales/Login.js"></script>
</body>

</html>
