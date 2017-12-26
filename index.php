<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>test home</title>
</head>
<body>
  <nav class="navbar navbar-default" role="navigation">
      <div class="container-fluid">
          <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar1">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="index.php">Testing Home Page</a>
          </div>
          <div class="collapse navbar-collapse" id="navbar1">
              <ul class="nav navbar-nav navbar-right">
                  <?php if (isset($_SESSION['usr_id'])) { ?>
                  <li><p class="navbar-text">Хэрэглэгч <?php echo $_SESSION['usr_name']; ?></p></li>
                  <li><a href="logout.php">Гарах</a></li>
                  <?php } else { ?>
                  <li><a href="auth/index.php">Нэвтрэх</a></li>
                  <li><a href="auth/reg.php">Бүртгүүлэх</a></li>
                  <?php } ?>
              </ul>
          </div>
      </div>
  </nav>


</body>
</html>
