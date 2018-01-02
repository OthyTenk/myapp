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

if (isset($_GET['delete'])){
  if(!empty($_GET['delete'])){
    $del_id = mysqli_real_escape_string($con, $_GET['delete']);
    $sql = "DELETE FROM user_type WHERE id=" . $del_id;
    mysqli_query($con, $sql);
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
  <div class="modal fade" role="dialog" id="delete_user_type">

    <div class="modal-dialog modal-sm" role="document">

      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4><span class="glyphicon glyphicon-lock"></span> Анхаар</h4>
        </div>

        <div class="modal-body">
          <p>
            "<span id="delete_value"></span>"<br>
            Энэ мэдээллийг та үнэхээр устгах уу?
          </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">
            Үгүй
          </button>
          <button type="button" name="delete" id="delete" class="btn btn-danger">
            Тийм
          </button>

        </div>

      </div>

    </div>

  </div>
  <script>
    $(document).ready(function(){
      var del_id = 0;
      $('a#delete').click(function(){
        //alert($(this).attr('data'));
        del_id = $(this).attr('data');
        $('#delete_value').html($(this).parent().prev().prev().prev().html());
      });

      $('button#delete').on('click', function(){
        //alert('ok');
        if (del_id > 0) {
          window.location.href = "<?php $_SERVER['PHP_SELF'];?>?delete=" + del_id;
        }
      });
    });
  </script>
</body>
</html>
