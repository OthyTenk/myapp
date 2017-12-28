<div class="navbar navbar-bmsys">
  <div class="container">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="m.php">Testing Home Page</a>
    </div>
    <div class="collapse navbar-collapse">
      <ul class="nav navbar-nav navbar-right">
          <li class="nav-user-info">
            <p class="navbar-text">
              <span class="glyphicon glyphicon-user"></span>
              <?php echo $_SESSION['name']; ?>
            </p>
          </li>
          <li class="nav-user-signout">
            <a href="auth/logout.php">
              <span class="glyphicon glyphicon-log-out"></span> Гарах
            </a>
          </li>
      </ul>
    </div>
  </div>
</div>
