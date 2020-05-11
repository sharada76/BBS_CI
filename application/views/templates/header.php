<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>BBS</title>

  <!-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" type="text/css"> -->
  <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,700" rel="stylesheet" type="text/css">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" type="text/css"> -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
</head>
<body>
<?php $_SESSION['time'] =time(); ?>
<nav class="navbar navbar-dark bg-dark">
  <div class="container-fluid justify-content-start">
    <!-- <div class="navbar-header"> -->
      <ul class="nav navbar-nav mr-auto">
       <li class="nav-item active">
          <a href="<?php echo site_url('posts'); ?>" class="navbar-brand">
            BBS
          </a>
        </li>
      </ul>

      <ul class="nav navbar-nav">
        <li class="nav-item active">
          <a href="<?php echo site_url('users/logout'); ?>" class="btn btn-danger navbar-right">
          ログアウト
          </a>
        </li>
      </ul>
    <!-- </div> -->
  </div>
</div>
</nav>