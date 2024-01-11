<?php
session_start();
include('includes/dbconnection.php');
error_reporting(0);

if (strlen($_SESSION['agmsaid']) == 0) {
    header('location:logout.php');
} else {
    if (isset($_POST['submit'])) {
        $adminid = $_SESSION['agmsaid'];
        $mevcutSifre = md5($_POST['mevcutsifre']);
        $yeniSifre = md5($_POST['yenisifre']);
        
        $sorgu = mysqli_query($con, "SELECT ID FROM tbladmin WHERE ID='$adminid' AND Password='$mevcutSifre'");
        $row = mysqli_fetch_array($sorgu);

        if ($row > 0) {
            $guncellemeSorgu = mysqli_query($con, "UPDATE tbladmin SET Password='$yeniSifre' WHERE ID='$adminid'");
            echo '<script>alert("Şifreniz başarıyla değiştirildi.")</script>';
        } else {
            echo '<script>alert("Mevcut şifreniz yanlış.")</script>';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="tr">

<head>
    <title>Şifre Değiştir | Sanat Galerisi Yönetim Sistemi</title>

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap teması -->
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <!-- Harici CSS -->
    <!-- Font ikonu -->
    <link href="css/elegant-icons-style.css" rel="stylesheet" />
    <link href="css/font-awesome.min.css" rel="stylesheet" />
    <!-- Özel stiller -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />

    <script type="text/javascript">
        function sifreKontrol() {
            if (document.sifreDegistirme.yenisifre.value != document.sifreDegistirme.yenisifretekrar.value) {
                alert('Yeni Şifre ve Şifre Tekrar alanları eşleşmiyor');
                document.sifreDegistirme.yenisifretekrar.focus();
                return false;
            }
            return true;
        }
    </script>
</head>

<body>
    <!-- Konteyner bölümü başlangıcı -->
    <section id="container" class="">
        <!-- Başlık başlangıcı -->
        <?php include_once('includes/header.php'); ?>
        <!-- Başlık sonu -->

        <!-- Kenar çubuğu başlangıcı -->
        <?php include_once('includes/sidebar.php'); ?>
        <!-- Kenar çubuğu sonu -->

        <!-- Ana içerik başlangıcı -->
        <section id="main-content">
            <section class="wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header"><i class="fa fa-files-o"></i> Şifre Değiştir</h3>
                        <ol class="breadcrumb">
                            <li><i class="fa fa-home"></i><a href="dashboard.php">Anasayfa</a></li>
                            <li><i class="icon_document_alt"></i> Şifre Değiştir</li>
                            <li><i class="fa fa-files-o"></i> Şifre Değiştir</li>
                        </ol>
                    </div>
                </div>
                <!-- Form doğrulamaları -->
                <div class="row">
                    <div class="col-lg-12">
                        <section class="panel">
                            <header class="panel-heading">
                                Şifre Değiştir
                            </header>
                        </section>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <section class="panel">
                            <div class="panel-body">
                                <div class="form">
                                    <form class="form-validate form-horizontal" method="post" action="" name="sifreDegistirme" onsubmit="return sifreKontrol();">
                                        <div class="form-group ">
                                            <label for="mevcutsifre" class="control-label col-lg-2">Mevcut Şifre <span class="required">*</span></label>
                                            <div class="col-lg-10">
                                                <input type="password" name="mevcutsifre" class=" form-control" required="true" value="">
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <label for="yenisifre" class="control-label col-lg-2">Yeni Şifre <span class="required">*</span></label>
                                            <div class="col-lg-10">
                                                <input type="password" name="yenisifre" class="form-control" value="">
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <label for="yenisifretekrar" class="control-label col-lg-2">Şifre Tekrar <span class="required">*</span></label>
                                            <div class="col-lg-10">
                                                <input type="password" name="yenisifretekrar" class="form-control" value="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-lg-offset-2 col-lg-10">
                                                <button class="btn btn-primary" type="submit" name="submit">Değiştir</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
                <!-- sayfa sonu-->
            </section>
        </section>
        <?php include_once('includes/footer.php'); ?>
    </section>
    <!-- Konteyner bölümü sonu -->

    <!-- JavaScript dosyaları -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- Güzel kaydırma -->
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
    <!-- jQuery doğrulama js -->
    <script type="text/javascript" src="js/jquery.validate.min.js"></script>

    <!-- Bu sayfa için özel form doğrulama betiği -->
    <script src="js/form-validation-script.js"></script>
    <!-- Tüm sayfa için özel betik -->
    <script src="js/scripts.js"></script>


</body>

</html>
<?php ?>
} 
