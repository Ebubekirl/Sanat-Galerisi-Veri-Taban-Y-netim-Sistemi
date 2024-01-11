<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if (strlen($_SESSION['agmsaid'] == 0)) {
    header('location:logout.php');
} else {
    if (isset($_POST['submit'])) {
        $sanatOrtami = $_POST['artmed'];
        $eid = $_GET['editid'];

        $query = mysqli_query($con, "UPDATE tblartmedium SET ArtMedium='$sanatOrtami' WHERE ID='$eid'");
        if ($query) {
            echo "<script>alert('Sanat ortamı güncellendi.');</script>";
        } else {
            echo "<script>alert('Bir şeyler yanlış gitti. Lütfen tekrar deneyin.');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="tr">

<head>
    <title>Sanat Ortamını Güncelle | Sanat Galerisi Yönetim Sistemi</title>
    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap teması -->
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <!-- harici CSS -->
    <!-- font ikonları -->
    <link href="css/elegant-icons-style.css" rel="stylesheet" />
    <link href="css/font-awesome.min.css" rel="stylesheet" />
    <link href="css/daterangepicker.css" rel="stylesheet" />
    <link href="css/bootstrap-datepicker.css" rel="stylesheet" />
    <link href="css/bootstrap-colorpicker.css" rel="stylesheet" />
    <!-- tarih seçici -->
    <!-- renk seçici -->

    <!-- Özel stiller -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />

</head>

<body>

    <!-- konteyner bölümü başlangıcı -->
    <section id="container" class="">
        <!-- başlık başlangıcı-->
        <?php include_once('includes/header.php'); ?>
        <!-- başlık bitişi-->

        <!-- kenar çubuğu başlangıcı -->
        <?php include_once('includes/sidebar.php'); ?>
        <!-- kenar çubuğu bitişi -->

        <!-- ana içerik başlangıcı -->
        <section id="main-content">
            <section class="wrapper">
                <!-- genel bakış başlangıcı -->
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header"><i class="fa fa-file-text-o"></i> Sanat Ortamını Güncelle</h3>
                        <ol class="breadcrumb">
                            <li><i class="fa fa-home"></i><a href="dashboard.php">Ana Sayfa</a></li>
                            <li><i class="icon_document_alt"></i> Sanat Ortamını Güncelle</li>
                            <li><i class="fa fa-file-text-o"></i> Sanat Ortamını Güncelle</li>
                        </ol>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <section class="panel">
                            <header class="panel-heading">
                                Sanat Ortamını Güncelle
                            </header>
                            <div class="panel-body">
                                <form class="form-horizontal " method="post" action="">

                                    <?php
                                    $cid = $_GET['editid'];
                                    $ret = mysqli_query($con, "SELECT * FROM tblartmedium WHERE ID='$cid'");
                                    $cnt = 1;
                                    while ($row = mysqli_fetch_array($ret)) {
                                    ?>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Sanat Ortamı</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" id="artmed" name="artmed" type="text" required="true" value="<?php echo $row['ArtMedium']; ?>">
                                            </div>
                                        </div>

                                    <?php } ?>
                                    <p style="text-align: center;"> <button type="submit" name='submit' class="btn btn-primary">Güncelle</button></p>
                                </form>
                            </div>
                        </section>
                    </div>
                </div>
                <!-- Temel Formlar ve Yatay Formlar-->

                <!-- sayfa sonu-->
            </section>
        </section>
        <!-- ana içerik bitişi -->
    </section>
    <!-- konteyner bölümü başlangıcı -->

    <!-- javascriptler -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- güzel kaydır -->
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>

    <!-- jquery ui -->
    <script src="js/jquery-ui-1.9.2.custom.min.js"></script>

    <!-- özel checkbox & radyo -->
    <script type="text/javascript" src="js/ga.js"></script>
    <!-- özel anahtar değiştirici-->
    <script src="js/bootstrap-switch.js"></script>
    <!-- özel etiket girişi -->
    <script src="js/jquery.tagsinput.js"></script>

    <!-- renk seçici -->

    <!-- bootstrap-wysiwyg -->
    <script src="js/jquery.hotkeys.js"></script>
    <script src="js/bootstrap-wysiwyg.js"></script>
    <script src="js/bootstrap-wysiwyg-custom.js"></script>
    <script src="js/moment.js"></script>
    <script src="js/bootstrap-colorpicker.js"></script>
    <script src="js/daterangepicker.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <!-- ck editör -->
    <script type="text/javascript" src="assets/ckeditor/ckeditor.js"></script>
    <!-- bu sayfa için özel form bileşeni betiği -->
    <script src="js/form-component.js"></script>
    <!-- tüm sayfa için özel betik -->
    <script src="js/scripts.js"></script>


</body>

</html>
<?php ?>
} 