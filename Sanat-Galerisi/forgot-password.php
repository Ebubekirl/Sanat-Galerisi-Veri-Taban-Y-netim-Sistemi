<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if (isset($_POST['submit'])) {
    $iletisimNo = $_POST['contactno'];
    $email = $_POST['email'];

    $query = mysqli_query($con, "select ID from tbladmin where  Email='$email' and MobileNumber='$iletisimNo'");
    $ret = mysqli_fetch_array($query);
    if ($ret > 0) {
        $_SESSION['contactno'] = $iletisimNo;
        $_SESSION['email'] = $email;
        echo "<script type='text/javascript'> document.location ='reset-password.php'; </script>";
    } else {
        echo "<script>alert('Geçersiz Bilgiler. Lütfen tekrar deneyin.');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <title>Şifremi Unuttum | Sanat Galerisi Yönetim Sistemi</title>

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap teması -->
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <!-- dış CSS -->
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
                    <input type="text" class="form-control" name="email" placeholder="E-posta" autofocus required="true">
                </div>
                <div class="input-group">
                    <span class="input-group-addon"><i class="icon_key_alt"></i></span>
                    <input type="text" class="form-control" name="contactno" placeholder="Telefon Numarası" required="true">
                </div>
                <button class="btn btn-primary btn-lg btn-block" type="submit" name="submit">Sıfırla</button>
                <span class="pull-right"> <a href="login.php"> Giriş Yap</a></span>
            </div>
        </form>

    </div>

</body>

</html>
