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
                <h4>Мэдээлэл</h4>
              </div>
              <div class="box-content">
                info medeelel
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
