<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
error_reporting(0);

if(isset($_POST['submit']))
{
    $contactno = $_SESSION['contactno'];
    $email = $_SESSION['email'];
    $password = md5($_POST['newpassword']);

    $query = mysqli_query($con, "update tbladmin set Password='$password'  where  Email='$email' && MobileNumber='$contactno' ");
    
    if($query)
    {
        echo "<script>alert('Şifre başarıyla değiştirildi');</script>";
        session_destroy();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <title>Şifre Sıfırla | Sanat Galerisi Yönetim Sistemi</title>

  <!-- Bootstrap CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap teması -->
  <link href="css/bootstrap-theme.css" rel="stylesheet">
  <!-- Harici CSS -->
  <!-- Font ikonu -->
  <link href="css/elegant-icons-style.css" rel="stylesheet" />
  <link href="css/font-awesome.css" rel="stylesheet" />
  <!-- Özel stiller -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet" />

  <script type="text/javascript">
    function checkpass() {
      if (document.changepassword.newpassword.value != document.changepassword.confirmpassword.value) {
        alert('Yeni Şifre ve Şifre Onayı alanları eşleşmiyor');
        document.changepassword.confirmpassword.focus();
        return false;
      }
      return true;
    }
  </script>
</head>

<body class="login-img3-body">

  <div class="container">

    <form class="login-form" action="" method="post" name="changepassword" onsubmit="return checkpass();">
      <div class="login-wrap">
        <p class="login-img"><i class="icon_lock_alt"></i></p>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_key_alt"></i></span>
          <input type="password" class="form-control" name="newpassword" placeholder="Yeni Şifre" required="true">
        </div>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_key_alt"></i></span>
          <input type="password" class="form-control" name="confirmpassword" placeholder="Şifreyi Onayla" required="true">
        </div>
        <button class="btn btn-primary btn-lg btn-block" type="submit" name="submit">Sıfırla</button>
        <span class="pull-right"> <a href="login.php"> Giriş Yap</a></span>
      </div>
    </form>
  </div>

</body>

</html>
