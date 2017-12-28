<?php
session_start();

if (isset($_SESSION['usr_id']) != ""){
  header("location: ../index.php");
}

include_once '../dbconnect.php';

if (isset($_POST['login'])){
  $email = mysqli_real_escape_string($con, $_POST['email']);
  $pwd = mysqli_real_escape_string($con, $_POST['pwd']);

  $qry = "SELECT * FROM users WHERE email='".$email."' AND pwd='".$pwd."'";
  $rst = mysqli_query($con, $qry);

  if ($row = mysqli_fetch_array($rst)){
    $_SESSION['usr_id'] = $row['id'];
    $_SESSION['name'] = $row['fn'];

    header("location: ../m.php");
  } else {
    $errormsg = "Имэйл эсвэл Нууц үг буруу байна!!";
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Нэвтрэх</title>

  <link rel="stylesheet" href="../assets/css/bootstrap.css" type="text/css">
  <link rel="stylesheet" href="../assets/css/style.css" type="text/css">
</head>
<body>



<div class="container">
  <div class="row">
    <div class="col-md-4 col-md-offset-4 well">
      <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="loginform">
        <fieldset>
          <legend>Нэвтрэх</legend>

          <div class="form-group">
            <label for="name">Имэйл</label>
            <input type="text" name="email" placeholder="Имэйл" required class="form-control" />
          </div>

          <div class="form-group">
            <label for="name">Нууц үг</label>
            <input type="password" name="pwd" placeholder="Нууц үг" required class="form-control" />
          </div>

          <div class="form-group">
            <input type="submit" name="login" value="Нэвтрэх" class="btn btn-primary" />
          </div>
        </fieldset>
      </form>
      <span class="text-danger"><?php if (isset($errormsg)) { echo $errormsg; } ?></span>
    </div>
  </div>

  <div class="row">
    <div class="col-md-4 col-md-offset-4 text-center">
      Шинэ хэрэглэгч <a href="signup.php">Бүртгүүлэх</a>
    </div>
  </div>
</div>


<!--
http://www.kodingmadesimple.com/2016/01/php-login-and-registration-script-with-mysql-example.html
-->
</body>
</html>
