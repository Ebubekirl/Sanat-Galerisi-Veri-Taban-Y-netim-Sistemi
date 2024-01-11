<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if (strlen($_SESSION['agmsaid'] == 0)) {
    header('location:logout.php');
} else {

    if (isset($_POST['submit'])) {

        $sanatOrtam = $_POST['sanatOrtam'];

        $sorgu = mysqli_query($con, "INSERT INTO tblartmedium(ArtMedium) VALUES ('$sanatOrtam')");

        if ($sorgu) {
            echo "<script>alert('Sanat ortamı eklenmiştir.');</script>";
            echo "<script>window.location.href ='manage-art-medium.php'</script>";
        } else {
            echo "<script>alert('Bir şeyler yanlış gitti. Lütfen tekrar deneyin.');</script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Sanat Ortamı Ekle | Sanat Galerisi Yönetim Sistemi</title>

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap teması -->
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <!-- Dış CSS -->
    <!-- Font ikonları -->
    <link href="css/elegant-icons-style.css" rel="stylesheet" />
    <link href="css/font-awesome.min.css" rel="stylesheet" />
    <link href="css/daterangepicker.css" rel="stylesheet" />
    <link href="css/bootstrap-datepicker.css" rel="stylesheet" />
    <link href="css/bootstrap-colorpicker.css" rel="stylesheet" />
    <!-- Tarih seçici -->

    <!-- Renk seçici -->

    <!-- Özel stiller -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />

</head>

<body>

    <!-- Konteyner bölümü başlangıcı -->
    <section id="container" class="">
        <!-- Başlık başlangıcı-->
        <?php include_once('includes/header.php'); ?>
        <!-- Başlık bitişi-->

        <!-- Kenar çubuğu başlangıcı -->
        <?php include_once('includes/sidebar.php'); ?>
        <!-- Kenar çubuğu bitişi -->

        <!-- Ana içerik başlangıcı -->
        <section id="main-content">
            <section class="wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header"><i class="fa fa-file-text-o"></i> Sanat Ortamı Ekle</h3>
                        <ol class="breadcrumb">
                            <li><i class="fa fa-home"></i><a href="dashboard.php">Ana Sayfa</a></li>
                            <li><i class="icon_document_alt"></i>Sanat Ortamı</li>
                            <li><i class="fa fa-file-text-o"></i>Sanat Ortamı Ekle</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <section class="panel">
                            <header class="panel-heading">
                                Sanat Ortamı Ekle
                            </header>
                            <div class="panel-body">
                                <form class="form-horizontal " method="post" action="" enctype="multipart/form-data">

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Sanat Ortamı</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" id="sanatOrtam" name="sanatOrtam" type="text" required="true">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <p style="text-align: center;"> <button type="submit" name='submit' class="btn btn-primary">Gönder</button></p>
                                </form>
                            </div>
                        </section>
                    </div>
                </div>
                <!-- Temel Formlar ve Yatay Formlar-->

            </section>
        </section>
        <!-- Ana içerik bitişi -->
        <?php include_once('includes/footer.php'); ?>
    </section>
    <!-- Konteyner bölümü bitişi -->
    <!-- Javascriptler -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- Güzel kaydır -->
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>

    <!-- Jquery ui -->
    <script src="js/jquery-ui-1.9.2.custom.min.js"></script>

    <!-- Özel checkbox & radyo-->
    <script type="text/javascript" src="js/ga.js"></script>
    <!-- Özel anahtar değiştirici -->
    <script src="js/bootstrap-switch.js"></script>
    <!-- Özel etiket girişi-->
    <script src="js/jquery.tagsinput.js"></script>

    <!-- Renk seçici -->

    <!-- Bootstrap-wysiwyg -->
    <script src="js/jquery.hotkeys.js"></script>
    <script src="js/bootstrap-wysiwyg.js"></script>
    <script src="js/bootstrap-wysiwyg-custom.js"></script>
    <script src="js/moment.js"></script>
    <script src="js/bootstrap-colorpicker.js"></script>
    <script src="js/daterangepicker.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <!-- Ck editör -->
    <script type="text/javascript" src="assets/ckeditor/ckeditor.js"></script>
    <!-- Bu sayfa için özel form bileşeni betiği-->
    <script src="js/form-component.js"></script>
    <!-- Tüm sayfa için özel betik -->
    <script src="js/scripts.js"></script>
</body>

</html>

<?php } ?>
