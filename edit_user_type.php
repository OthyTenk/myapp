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

$page = 'user_type';

if (isset($_POST['save_user_type'])){
  //$type_name = check_s($_POST['typename']);
  $type_name = mysqli_real_escape_string($con, $_POST['typename']);
  $status = empty($_POST['status'])?0:1;

  echo $type_name . '-- '. $status;
  $utf = "SET NAMES utf8;";
  mysqli_query($con, $utf);
  $qry = "INSERT INTO user_type(name, is_active) VALUES('".$type_name."', $status);";
  if (mysqli_query($con, $qry)) {
    echo "Амжилттай бүртгэгдлээ...<br/><a href='index.php'>Энд дарж нэвтрэн орно уу</a>";
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
                    <h4>Шинэ хэрэглэгчийн төрөл нэмэх</h4>
                  </div>
                  <div class="col-md-4">
                    <a class="btn btn-default pull-right" href="user_type.php">
                      <span class="glyphicon glyphicon-list"></span> Хэрэглэгчийн төрөл
                    </a>
                  </div>
                </div>
              </div>

              <div class="box-content">

                <form role="form" method="post" class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF'];?>">
                  <div class="form-group">
                    <label class="control-label col-md-3" for="typename">Төрлийн нэр:</label>
                    <div class="col-md-9">
                      <input type="text" class="form-control" name="typename" id="typename" placeholder="Жнь: Харилцагч" required/>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-offset-3 col-md-9">
                      <div class="checkbox">
                        <label>
                          <input type="checkbox" name="status" />
                          Идэвхитэй
                        </label>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-offset-3 col-md-9">
                      <button type="submit" name="save_user_type">
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
