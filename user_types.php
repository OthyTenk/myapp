<?php
//include 'dbconnect.php';

$utf = "set names 'utf8'";
mysqli_query($con, $utf);

$qry = "SELECT * FROM user_type;";
$rst = mysqli_query($con, $qry);
?>
<div class="table-responsive">

  <table class="table table-striped table-hover">
    <thead>
      <tr>
        <td>#</td>
        <td>Хэрэглэгчийн төрөл</td>
        <td>Төлөв</td>
        <td>Бүртгэсэн огноо</td>
        <td>Үйлдэл</td>
      </tr>
    </thead>
    <tbody>
      <?php $num = 0; while($row = mysqli_fetch_assoc($rst)) { ?>
      <tr>
        <td><?php echo ++$num; ?></td>
        <td><?php echo $row['name'] ?></td>
        <td>
          <span class="glyphicon glyphicon-eye-<?php echo $user_status[$row['is_active']] ?>"></span>
        </td>
        <td><?php echo $row['created_date'] ?></td>
        <td>
          <a href="edit_user_type.php?edit=<?php echo $row['id'] ?>" title="Засварлах">
            <span class="glyphicon glyphicon-edit"></span>
          </a>
          <a href="" id="delete" title="Устгах" data="<?php echo $row['id'] ?>"  data-toggle="modal" data-target="#delete_user_type">
            <span class="glyphicon glyphicon-trash"></span>
          </a>
        </td>
      </tr>
    <?php } ?>
    </tbody>
  </table>
</div>
