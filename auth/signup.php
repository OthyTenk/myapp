<?php
session_start();

if (isset($_SESSION['usr_id'])) {
  header("location: ../index.php");
}

include_once '../dbconnect.php';

$error = false;

if (isset($_POST['signup'])){
  $fn = mysqli_real_escape_string($con, $_POST['fn']);
  $ln = mysqli_real_escape_string($con, $_POST['ln']);
  $tel = mysqli_real_escape_string($con, $_POST['tel']);
  $email = mysqli_real_escape_string($con, $_POST['email']);
  $pwd = mysqli_real_escape_string($con, $_POST['pwd']);
  $repwd = mysqli_real_escape_string($con, $_POST['repwd']);

  //name can contain only alpha characters and space
  if (!preg_match("/^[a-zA-Z ]+$/",$fn)) {
    $error = true;
    $fn_error = "Зөвхөн үсэг эсвэл хоосон зай байна";
  }

  if (!preg_match("/^[a-zA-Z ]+$/",$ln)) {
    $error = true;
    $ln_error = "Зөвхөн үсэг эсвэл хоосон зай байна";
  }


  if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
    $error = true;
    $email_error = "Зөв Имэйл хаяг оруулна уу";
  }

  if (strlen($pwd) < 8){
    $error = true;
    $pwd_error = "Хамгийн багадаа 8 тэмдэгт байх ёстой";
  }

  if ($repwd != $pwd){
    $error = true;
    $repwd_error = "Нууц үг болон давтах нууц үг тохирохгүй байна";
  }

  if (!$error) {
    $qry = "INSERT INTO users(fn, ln, phone_num, email, pwd, type_id) "
    ."VALUES('".$fn."', '".$ln."', '".$tel."','".$email."', '".$pwd."', 1);";
    if (mysqli_query($con, $qry)) {
      $successmsg = "Амжилттай бүртгэгдлээ^...<br/><a href='index.php'>Энд дарж нэвтрэн орно уу</a>";
    } else {
      $errormsg = "Бүртгүүлэх үед алдаа гарлаа..<br/>Та дараа дахин оролдоно уу";
    }
  }



/*
  if ($row = mysqli_fetch_array($rst)){
    $_SESSION['usr_id'] = $row['id'];
    $_SESSION['name'] = $row['fn'];

    header("location: ../index.php");
  }*/
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Шинэ бүртгэл</title>
  <link rel="stylesheet" href="../assets/css/bootstrap.css" type="text/css">
</head>
<body>

  <div class="container">
    <div class="row">
      <div class="col-md-4 col-md-offset-4 well">
        <form role="form" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" name="signupform">
          <fieldset>
            <legend>Шинэ бүртгэл</legend>

            <div class="form-group">
              <label for="ln">Овог</label>
              <input type="text" name="ln" placeholder="Эцэг/Эхийн нэр" required class="form-control" value="<?php if($error) echo $ln; ?>">
              <span class="text-danger"><?php if(isset($ln_error)) echo $ln_error;?></span>
            </div>

            <div class="form-group">
              <label for="fn">Нэр</label>
              <input type="text" name="fn" placeholder="Өөрийн нэр" required class="form-control" value="<?php if($error) echo $fn; ?>">
              <span class="text-danger"><?php if(isset($fn_error)) echo $fn_error;?></span>
            </div>

            <div class="form-group">
              <label for="tel">Утасны дугаар</label>
              <input type="text" name="tel" placeholder="Холбоо барих утасны дугаар" required class="form-control" value="<?php if($error) echo $tel; ?>">
              <span class="text-danger"><?php if(isset($tel_error)) echo $tel_error;?></span>
            </div>

            <div class="form-group">
              <label for="email">Имэйл</label>
              <input type="text" name="email" placeholder="Имэйл хаяг" required class="form-control" value="<?php if($error) echo $email; ?>">
              <span class="text-danger"><?php if(isset($email_error)) echo $email_error;?></span>
            </div>

            <div class="form-group"><br/>
              <label for="pwd">Нууц үг</label>
              <input type="password" name="pwd" placeholder="Нууц үг оруулах" required class="form-control" value="<?php if($error) echo $pwd; ?>">
              <span class="text-danger"><?php if(isset($pwd_error)) echo $pwd_error;?></span>
            </div>

            <div class="form-group">
              <label for="repwd">Нууц үг давтах</label>
              <input type="password" name="repwd" placeholder="Дахин нууц үг оруулах" required class="form-control" value="<?php if($error) echo $repwd; ?>">
              <span class="text-danger"><?php if(isset($repwd_error)) echo $repwd_error;?></span>
            </div>

            <div class="form-group">
              <input type="submit" name="signup" class="btn btn-primary" value="Бүртгүүлэх">
            </div>
          </fieldset>
        </form>
        <span class="text-success"><?php if(isset($successmsg)){echo $successmsg;}?></span>
        <span class="text-danger"><?php if(isset($errormsg)){echo $errormsg;}?></span>
      </div>
    </div>

    <div class="row">
      <div class="col-md-4 col-md-offset-4 text-center">
        Бүртгэл байгаа бол <a href="index.php">Нэвтэр</a>
      </div>
    </div>
  </div>

</body>
</html>
