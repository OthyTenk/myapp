<?php
$left_menu = array(
  'user' => 'Хэрэглэгч',
  'bm' => 'Шинэ бараа',
  'abbm' => 'Бараа бүртгэх',
  'order' => 'Захиалах'
);

$ico = array(
  'user' => 'user',
  'bm' => 'edit',
  'abbm' => 'open-file',
  'order' => 'file'
);

$active = ' class="active"';
?>

<div class="box box-nav navigation">
  <div class="box-title">
    <h4>Цэс</h4>
  </div>
  <div class="box-content-1">

    <ul class="nav nav-pills nav-stacked nav-left-main">
      <?php foreach ($left_menu as $key => $value) {?>
      <li>
        <a href="users.php"<?php if($key == $page) echo $active;?>>
          <span class="glyphicon glyphicon-<?php echo $ico[$key]; ?>"></span>
          <?php echo $value; ?>
        </a>
      </li>
      <?php }?>
    </ul>

  </div>
</div>
