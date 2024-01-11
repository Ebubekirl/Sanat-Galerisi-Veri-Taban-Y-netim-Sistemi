<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if (strlen($_SESSION['agmsaid'] == 0)) {
    header('location:logout.php');
} else {
    if (isset($_POST['submit'])) {
        $adminid = $_SESSION['agmsaid'];
        $adminAdi = $_POST['adminadi'];
        $cepNumarasi = $_POST['cepnumarasi'];

        $sorgu = mysqli_query($con, "update tbladmin set AdminName ='$adminAdi', MobileNumber='$cepNumarasi' where ID='$adminid'");

        if ($sorgu) {
            echo "<script>alert('Admin profil bilgileri güncellendi.');</script>";
            echo "<script>window.location.href='admin-profil.php'</script>";
        } else {
            echo "<script>alert('Bir şeyler yanlış gitti. Lütfen tekrar deneyin.');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="tr">

<head>

    <title>Admin-Profil | Sanat Galerisi Yönetim Sistemi</title>

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

</head>

<body>
    <!-- Konteyner bölümü başlangıcı -->
    <section id="container" class="">
        <!-- Başlık başlangıcı -->
        <?php include_once('includes/header.php'); ?>
        <!-- Başlık sonu-->

        <!-- Kenar çubuğu başlangıcı -->
        <?php include_once('includes/sidebar.php'); ?>
        <!-- Kenar çubuğu sonu-->

        <!-- Ana içerik başlangıcı -->
        <section id="main-content">
            <section class="wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header"><i class="fa fa-user-md"></i> Profil</h3>
                        <ol class="breadcrumb">
                            <li><i class="fa fa-home"></i><a href="dashboard.php">Anasayfa</a></li>
                            <li><i class="icon_documents_alt"></i>Sayfalar</li>
                            <li><i class="fa fa-user-md"></i>Profil</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <section class="panel">
                            <header class="panel-heading tab-bg-info">
                                <ul class="nav nav-tabs">
                                    <li class="">
                                        <a data-toggle="tab" href="#profil-duzenle">
                                            <i class="icon-envelope"></i>
                                            Profili Düzenle
                                        </a>
                                    </li>
                                </ul>
                            </header>
                            <div class="panel-body">
                                <div>
                                    <div id="profil-duzenle" class="tab-pane">
                                        <section class="panel">
                                            <div class="panel-body bio-graph-info">
                                                <h1> Profil Bilgileri</h1>
                                                <form class="form-horizontal" role="form" method="post" action="">

                                                    <?php
                                                    $adminid = $_SESSION['agmsaid'];
                                                    $sorgu = mysqli_query($con, "select * from tbladmin where ID='$adminid'");
                                                    $sayac = 1;
                                                    while ($row = mysqli_fetch_array($sorgu)) {
                                                    ?>

                                                        <div class="form-group">
                                                            <label class="col-lg-2 control-label">Admin Adı</label>
                                                            <div class="col-lg-6">
                                                                <input class=" form-control" id="adminadi" name="adminadi" type="text" value="<?php echo $row['AdminName']; ?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-lg-2 control-label">Kullanıcı Adı</label>
                                                            <div class="col-lg-6">
                                                                <input class=" form-control" id="kullaniciadi" name="kullaniciadi" type="text" value="<?php echo $row['UserName']; ?>" readonly='true'>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-lg-2 control-label">Cep Numarası</label>
                                                            <div class="col-lg-6">
                                                                <input class="form-control " id="cepnumarasi" name="cepnumarasi" type="text" value="<?php echo $row['MobileNumber']; ?>" required="true">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-lg-2 control-label">Email</label>
                                                            <div class="col-lg-6">
                                                                <input class="form-control " id="email" name="email" type="email" value="<?php echo $row['Email']; ?>" required="true" readonly='true'>
                                                            </div>
                                                        </div>

                                                    <?php } ?>

                                                    <div class="form-group">
                                                        <div class="col-lg-offset-2 col-lg-10">
                                                            <button type="submit" class="btn btn-primary" name="submit">Güncelle</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </section>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
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
    <!-- jQuery knob -->
    <script src="assets/jquery-knob/js/jquery.knob.js"></script>
    <!-- Tüm sayfa için özel betik -->
    <script src="js/scripts.js"></script>

    <script>
        //knob
        $(".knob").knob();
    </script>


</body>

</html>
<?php ?>
}
