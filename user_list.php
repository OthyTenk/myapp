<?php
//include 'dbconnect.php';

$qry = "SELECT * FROM users;";
$rst = mysqli_query($con, $qry);
?>
<div class="table-responsive">

  <table class="table">
    <thead>
      <tr>
        <td>#</td>
        <td>Хэрэглэгч</td>
        <td>Имэйл</td>
        <td>Утас</td>
        <td>Хэрэглэгчийн төрөл</td>
        <td>Төлөв</td>
        <td>Бүртгэсэн огноо</td>
        <td>Үйлдэл</td>
      </tr>
    </thead>
    <tbody>
      <?php while($row = mysqli_fetch_array($rst)) { ?>
      <tr>
        <td>1</td>
        <td><?php echo $row['ln'] ?> <?php echo $row['fn'] ?></td>
        <td><?php echo $row['email'] ?></td>
        <td><?php echo $row['phone_num'] ?></td>
        <td><?php echo $row['type_id'] ?></td>
        <td><?php echo $user_status[$row['is_active']] ?></td>
        <td><?php echo $row['created_date'] ?></td>
        <td><?php echo $row['id'] ?></td>
      </tr>
    <?php } ?>
    </tbody>
  </table>

</div>
