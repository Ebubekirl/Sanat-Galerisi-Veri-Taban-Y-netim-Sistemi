<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if(isset($_POST['login']))
{
    $adminKullanici = $_POST['username'];
    $sifre = md5($_POST['password']);
    $sorgu = mysqli_query($con, "select ID from tbladmin where  UserName='$adminKullanici' && Password='$sifre' ");
    $sonuc = mysqli_fetch_array($sorgu);
    if($sonuc > 0)
    {
        $_SESSION['agmsaid'] = $sonuc['ID'];
        echo "<script type='text/javascript'> document.location ='dashboard.php'; </script>";
    }
    else
    {
        echo "<script>alert('Bilgiler Geçersiz');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Giriş| Sanat Galerisi Yönetim Sistemi</title>

  <!-- Bootstrap CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap teması -->
  <link href="css/bootstrap-theme.css" rel="stylesheet">
  <!-- harici CSS -->
  <!-- font ikonu -->
  <link href="css/elegant-icons-style.css" rel="stylesheet" />
  <link href="css/font-awesome.css" rel="stylesheet" />
  <!-- Özel stiller -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet" />

</head>

<body class="login-img3-body">

  <div class="container">

    <form class="login-form" action="" method="post">
      
      <div class="login-wrap">
        <p class="login-img"><i class="icon_lock_alt"></i></p>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_profile"></i></span>
          <input type="text" class="form-control" name="username" placeholder="Kullanıcı Adı" autofocus required="true">
        </div>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_key_alt"></i></span>
          <input type="password" class="form-control" name="password" placeholder="Şifre" required="true">
        </div>
        
                
        <label><span class="pull-right"> <a href="forgot-password.php"> Şifremi Unuttum?</a></span></label>
        <button class="btn btn-primary btn-lg btn-block" type="submit" name="login">Giriş</button>
      </div>
    </form>

   
  </div>


</body>

</html>
