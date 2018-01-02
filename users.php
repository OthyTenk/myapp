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
?>
<body>
  <?php include 'top_nav.php' ?>

  <div class="container m" id="m">
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
                  <div class="col-md-10">
                    <h4>Хэрэглэгчийн мэдээлэл</h4>
                  </div>
                  <div class="col-md-2">
                    <a class="btn btn-default pull-right" role="button" href="edit_user.php">
                      <span class="glyphicon glyphicon-plus-sign"></span> Нэмэх
                    </a>
                  </div>
                </div>
              </div>
              <div class="box-content">
                <?php include 'user_list.php'; ?>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
