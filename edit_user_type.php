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

$msg = '';
$edit_id = '';
$type_name = '';
$status = '';

if (isset($_POST['save_user_type'])){
  //$type_name = check_s($_POST['typename']);
  $edit_id = mysqli_real_escape_string($con, $_POST['edit_id']);
  $type_name = mysqli_real_escape_string($con, $_POST['typename']);
  $status = empty($_POST['status'])?0:1;

  echo $type_name . '-- '. $status;
  mysqli_query($con, "SET NAMES utf8;");

  if (strlen($edit_id) > 0 && $edit_id > 0) {
    $qry = "UPDATE user_type SET name='".$type_name."', is_active=$status WHERE id=$edit_id;";
  } else {
    $qry = "INSERT INTO user_type(name, is_active) VALUES('".$type_name."', $status);";
  }

  if (mysqli_query($con, $qry)) {
    $msg = '<div class="alert alert-success">Амжилттай бүртгэгдлээ...</div>';
  }
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
                    <a class="btn btn-default pull-right" href="user_type.php">
                      <span class="glyphicon glyphicon-list"></span> Хэрэглэгчийн төрөл
                    </a>
                  </div>
                </div>
              </div>

              <div class="box-content">
                <?php echo $msg; ?>

                <form role="form" method="post" class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF'];?>">
                  <div class="form-group">
                    <label class="control-label col-md-3" for="typename">Төрлийн нэр:</label>
                    <div class="col-md-9">
                      <input type="hidden" name="edit_id" value="<?php echo $edit_id; ?>">
                      <input type="text" class="form-control" name="typename" id="typename" placeholder="Жнь: Харилцагч" value="<?php echo $type_name ?>" required/>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-offset-3 col-md-9">
                      <div class="checkbox">
                        <label>
                          <input type="checkbox" name="status" <?php if($status == 1) echo 'checked'; ?> />
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
