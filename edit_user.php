<?php
session_start();
include 'auth.php';
include_once 'dbconnect.php';
?>
<!DOCTYPE html>
<html lang="en">
<?php
$title = "Хэрэглэгчийн мэдээлэл";
include 'header.php';

$page = 'user';

$msg = '';
$edit_id = '';
$ln = '';
$fn = '';
$tel = '';
$email = '';
$pwd = '';
$repwd = '';
$error = false;

if (isset($_POST['save_user'])){
  //$type_name = check_s($_POST['typename']);
  $edit_id = mysqli_real_escape_string($con, $_POST['edit_id']);
  $ln = mysqli_real_escape_string($con, $_POST['ln']);
  $fn = mysqli_real_escape_string($con, $_POST['fn']);
  $email = mysqli_real_escape_string($con, $_POST['email']);
  $tel = mysqli_real_escape_string($con, $_POST['tel']);
  $pwd = mysqli_real_escape_string($con, $_POST['pwd']);
  $repwd = mysqli_real_escape_string($con, $_POST['repwd']);

  if (!preg_match("/^[a-zA-ZА-Яа-я ]+$/",$fn)) {
    $error = true;
    $fn_error = "fn Зөвхөн үсэг эсвэл хоосон зай байна";
    echo $fn_error;
  }

  if (!preg_match("/^[a-zA-ZА-Яа-я ]+$/",$ln)) {
    $error = true;
    $ln_error = "ln Зөвхөн үсэг эсвэл хоосон зай байна";
    echo $ln_error;
  }

  if (!preg_match("/^[0-9-]+$/",$tel)) {
    $error = true;
    $tel_error = "Зөвхөн тоо байна";
    echo $tel_error;
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


  //echo $ln . '-- '. $status;
  mysqli_query($con, "SET NAMES utf8;");
  /*
  if (strlen($edit_id) > 0 && $edit_id > 0) {
    $qry = "UPDATE user_type SET name='".$type_name."', is_active=$status WHERE id=$edit_id;";
  } else {
    $qry = "INSERT INTO user_type(name, is_active) VALUES('".$type_name."', $status);";
  }

  if (mysqli_query($con, $qry)) {
    $msg = '<div class="alert alert-success">Амжилттай бүртгэгдлээ...</div>';
  }*/
}

if (isset($_GET['edit'])){
  $edit_id = mysqli_real_escape_string($con, $_GET['edit']);
  mysqli_query($con, "SET NAMES utf8;");

  $qry = "SELECT * FROM user_type WHERE id=" . $edit_id;
  $rst = mysqli_query($con, $qry);

  if (mysqli_num_rows($rst) > 0) {
    $row = mysqli_fetch_assoc($rst);
    $type_name = $row['name'];
    $status = $row['is_active'];
  }
}
?>
<body>
  <?php include 'top_nav.php' ?>

  <div class="container" id="m">
    <div class="row">
      <div class="col-md-3">
        <?php include 'left_nav.php'; ?>
      </div>

      <div class="col-md-9">
        <div class="row">
          <div class="col-md-12">

            <div class="box box-info">
              <div class="box-title">
                <div class="row">
                  <div class="col-md-8">
                    <h4>Хэрэглэгчийн шинэ төрөл нэмэх</h4>
                  </div>
                  <div class="col-md-4">
                    <a class="btn btn-default pull-right" href="users.php">
                      <span class="glyphicon glyphicon-list"></span> Хэрэглэгчийн төрөл
                    </a>
                  </div>
                </div>
              </div>

              <div class="box-content">
                <?php echo $msg; ?>

                <form role="form" method="post" class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF'];?>">
                  <div class="form-group">
                    <label class="control-label col-md-3" for="ln">Овог:</label>
                    <div class="col-md-9">
                      <input type="hidden" name="edit_id" value="<?php echo $edit_id; ?>">
                      <input type="text" class="form-control" name="ln" id="ln" placeholder="Жишээ нь: Болд" value="<?php echo $ln ?>" required/>
                      <span class="text-danger"><?php if(isset($ln_error)) echo $ln_error;?></span>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3" for="ln">Нэр:</label>
                    <div class="col-md-9">
                      <input type="text" class="form-control" name="fn" id="fn" placeholder="Жишээ нь: Цэнгэл" value="<?php echo $fn ?>" required/>
                      <span class="text-danger"><?php if(isset($fn_error)) echo $fn_error;?></span>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3" for="email">И-мэйл:</label>
                    <div class="col-md-9">
                      <input type="text" class="form-control" name="email" id="email" placeholder="Жишээ нь: example@example.com" value="<?php echo $email ?>" required/>
                      <span class="text-danger"><?php if(isset($email_error)) echo $email_error;?></span>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3" for="tel">Утасны дугаар:</label>
                    <div class="col-md-9">
                      <input type="text" class="form-control" name="tel" id="tel" placeholder="Жишээ нь: 99111111" value="<?php echo $tel ?>" required/>
                      <span class="text-danger"><?php if(isset($tel_error)) echo $tel_error;?></span>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3" for="pwd">Нууц үг:</label>
                    <div class="col-md-9">
                      <input type="password" class="form-control" name="pwd" id="pwd" placeholder="Нууц үг" value="<?php echo $pwd ?>" required/>
                      <span class="text-danger"><?php if(isset($pwd_error)) echo $pwd_error;?></span>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3" for="repwd">Нууц үг давтах:</label>
                    <div class="col-md-9">
                      <input type="password" class="form-control" name="repwd" id="repwd" placeholder="Нууц үг давтах" value="<?php echo $repwd ?>" required/>
                      <span class="text-danger"><?php if(isset($repwd_error)) echo $repwd_error;?></span>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-offset-3 col-md-9">
                      <button type="submit" name="save_user">
                        <span class="glyphicon glyphicon-save"></span>
                        Хадгалах
                      </button>
                    </div>
                  </div>
                </form>

              </div>
            </div>

          </div>
        </div>
      </div>

    </div><!-- .row-->
  </div>

</body>
</html>
