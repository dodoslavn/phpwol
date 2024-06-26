<?php
session_start();

if (isset($_SESSION['id'])) header('Location: ..');


if ( isset($_POST) )
  {
  if ( !empty($_POST['username']) && !empty($_POST['pass']) )
    {
    # load config file
    $config_file_raw = file_get_contents('../../config.json');
    $config = json_decode($config_file_raw);
    if (empty($config)) die("failed to parse JSON config");

    foreach ($config->users as $user) 
      {
      if (isset($user->name) && isset($user->pass) && isset($user->id) )
        {
        if ($user->name == $_POST['username'] && $user->pass == $_POST['pass'] ) 
          {
          $_SESSION["id"] = $user->id;
          header('Location: ..');
          }
        #else WRONG PASSWORD
        }
      #else JSON IS NOT CLEAN 
      }
    }
  }
#else FORM WAS NOT SUBMITED YET


?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Login - phpWoL</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" type="image/png" href="../features/favicon.ico" />
<link rel="stylesheet" type="text/css" href="../features/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../features/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="../features/icon-font.min.css">
<link rel="stylesheet" type="text/css" href="../features/animate.css">
<link rel="stylesheet" type="text/css" href="../features/hamburgers.min.css">
<link rel="stylesheet" type="text/css" href="../features/animsition.min.css">
<link rel="stylesheet" type="text/css" href="../features/select2.min.css">
<link rel="stylesheet" type="text/css" href="../features/daterangepicker.css">
<link rel="stylesheet" type="text/css" href="../features/util.css">
<link rel="stylesheet" type="text/css" href="../features/main.css">
<meta name="robots" content="noindex, follow">
</head>
<body>
<div class="limiter">
<div class="container-login100">
<div class="wrap-login100 p-t-50 p-b-90">
<form class="login100-form validate-form flex-sb flex-w" action="" method="post">
<span class="login100-form-title p-b-51">
Login
</span>
<div class="wrap-input100 validate-input m-b-16" data-validate="Username is required">
<input class="input100" type="text" name="username" placeholder="Username">
<span class="focus-input100"></span>
</div>
<div class="wrap-input100 validate-input m-b-16" data-validate="Password is required">
<input class="input100" type="password" name="pass" placeholder="Password">
<span class="focus-input100"></span>
</div>
<div class="flex-sb-m w-full p-t-3 p-b-24">
<div class="contact100-form-checkbox">
<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
<label class="label-checkbox100" for="ckb1">
Remember me
</label>
</div>
<div>
<a href="#" class="txt1">
Forgot?
</a>
</div>
</div>
<div class="container-login100-form-btn m-t-17">
<button class="login100-form-btn" type="submit">
Login
</button>
</div>
</form>
</div>
</div>
</div>
<div id="dropDownSelect1"></div>
<script src="../features/jquery-3.2.1.min.js"></script>
<script src="../features/animsition.min.js"></script>
<script src="../features/popper.js"></script>
<script src="../features/bootstrap.min.js"></script>
<script src="../features/select2.min.js"></script>
<script src="../features/moment.min.js"></script>
<script src="../features/daterangepicker.js"></script>
<script src="../features/countdowntime.js"></script>
<script src="../features/main.js"></script>
</body>
</html>
