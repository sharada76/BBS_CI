<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>BBS</title>

  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,700" rel="stylesheet" type="text/css">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" type="text/css">
</head>
<body>
  <!--<header class="navbar navbar-dark bg-dark">
  <div class="container">
  <a class="navbar-brand" href="{{ url('') }}">
  BBS
</a>
</div>
</header>-->
<nav class="navbar navbar-default">
  <div class="container-fluid justify-content-start">
    <div class="navbar-header">
      <a class="navbar-brand" href="{{ url('') }}">
        BBS
      </a>
    </div>
  </div>
</nav>
<div>
  <?php include('posts/index.php'); ?>
</div>
</body>
</html>
