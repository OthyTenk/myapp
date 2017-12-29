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
                  <div class="col-md-10">
                    <h4>Хэрэглэгчийн төрөл</h4>
                  </div>
                  <div class="col-md-2">
                    <a class="btn btn-default pull-right" role="button" href="edit_user_type.php">
                      <span class="glyphicon glyphicon-plus-sign"></span> Нэмэх
                    </a>
                  </div>
                </div>
              </div>
              <div class="box-content">
                <?php include 'user_types.php'; ?>
              </div>
            </div>

          </div>
        </div>
      </div>

    </div><!-- .row-->
  </div>

  <!--Modal-->
  <div class="modal fade" role="dialog" id="edit_user_type">

    <div class="modal-dialog" role="document">

      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4><span class="glyphicon glyphicon-lock"></span> Login</h4>
        </div>

        <div class="modal-body">
          <form role="form" method="post">
            <div class="container">
              <div class="row">
                <div class="form-group">
                  <div class="col-md-3">
                    <label class="control-label" for="usrname">Төрлийн нэр:</label>
                  </div>
                  <div class="col-md-9">
                    <input type="text" class="form-control" id="usrname" placeholder="Жнь: Харилцагч">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="form-group">
                  <div class="col-md-2">
                    <label class="control-label" for="status">Идэвхитэй?:</label>
                  </div>
                  <div class="col-md-10">
                    <input type="checkbox" class="form-control" id="status">
                  </div>
                </div>
              </div>

              <button type="button" name="button">
                <span class="glyphicon glyphicon-save"></span>
                Хадгалах
              </button>
            </div>
          </form>
        </div>
        <div class="modal-footer">

        </div>

      </div>

    </div>

  </div>
<script src="assets/js/jquery-3.2.1.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script>
  $(document).ready(function(){

  });
</script>
</body>
</html>
