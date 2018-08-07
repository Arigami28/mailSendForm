<?php
session_start();
$errorMsg = "";
$validUser = $_SESSION["login"] === true;
if(isset($_POST["sub"])) {
    $validUser = $_POST["username"] == "ksausp" && $_POST["password"] == "Cnfywbz";
    if(!$validUser) $errorMsg = "Invalid username or password.";
    else $_SESSION["login"] = true;
}
if($validUser) {
    header("Location:index.php"); die();
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta http-equiv='content-type' content='text/html;charset=utf-8' />
  <title>Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
  <div class="container">
    <div class="row justify-content-md-center">
      <div class="col-md-auto">
      <h3 class="text-center">Login</h3>
      <form name="input" method="post">
        <div class="form-group">
          <label for="username">Username:</label>
          <input type="text" class="form-control" value="<?= $_POST["username"] ?>" id="username" name="username" required>
        </div>
        <div class="form-group">
          <label for="pwd">Password:</label>
          <input type="password" class="form-control" value="" id="password" name="password" required>
        </div>
        <button type="submit" name="sub" class="btn btn-default">Login</button>
      </form>
    </div>
    </div>
  </div>
</body>
</html>