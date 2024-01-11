<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if (strlen($_SESSION['agmsaid']) == 0) {
    header('location:logout.php');
} else {
    if (isset($_POST['submit'])) {
        $resim_id = $_GET['imageid'];
        $resim = $_FILES["images"]["name"];
        $uzanti = substr($resim, strlen($resim) - 4, strlen($resim));

        // İzin verilen uzantılar
        $izinli_uzantilar = array(".jpg", "jpeg", ".png", ".gif");

        // İzin verilen uzantıları kontrol etme .in_array() fonksiyonu, bir dizide belirli bir değeri arar.
        if (!in_array($uzanti, $izinli_uzantilar)) {
            echo "<script>alert('Geçersiz format. Sadece jpg / jpeg / png / gif formatına izin verilir');</script>";
        } else {
            $profil_resmi = md5($resim) . $uzanti;
            move_uploaded_file($_FILES["images"]["tmp_name"], "images/" . $profil_resmi);

            $sorgu = mysqli_query($con, "UPDATE tblartist SET Profilepic ='$profil_resmi' WHERE ID='$resim_id'");

            if ($sorgu) {
                echo "<script>alert('Sanatçı profil resmi güncellendi.');</script>";
            } else {
                echo "<script>alert('Bir şeyler ters gitti. Lütfen tekrar deneyin.');</script>";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="tr">

<head>
    <title>Sanatçı Resmini Güncelle | Sanat Galerisi Yönetim Sistemi</title>

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap teması -->
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <!-- Harici CSS -->
    <!-- Font ikonu -->
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
                        <h3 class="page-header"><i class="fa fa-file-text-o"></i>Sanatçı Resmini Güncelle</h3>
                        <ol class="breadcrumb">
                            <li><i class="fa fa-home"></i><a href="dashboard.php">Anasayfa</a></li>
                            <li><i class="icon_document_alt"></i>Sanatçı Resmi</li>
                            <li><i class="fa fa-file-text-o"></i>Sanatçı Resmini Güncelle</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <section class="panel">
                            <header class="panel-heading">
                                Sanatçı Resmini Güncelle
                            </header>
                            <div class="panel-body">
                                <form class="form-horizontal" enctype="multipart/form-data" method="post" action="">

                                    <?php
                                    $resim_id = $_GET['imageid'];
                                    $sorgu = mysqli_query($con, "SELECT * FROM tblartist WHERE ID='$resim_id'");
                                    $cnt = 1;
                                    while ($row = mysqli_fetch_array($sorgu)) {
                                    ?>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Ad</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" id="name" name="name" type="text" required="true" value="<?php echo $row['Name']; ?>" readonly='true'>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Eski Resim</label>
                                            <div class="col-sm-10">
                                                <img src="images/<?php echo $row['Profilepic']; ?>" width="200" height="150" value="<?php echo $row['Profilepic']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Yeni Resim</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" id="images" name="images" type="file" required="true" value="">
                                            </div>
                                        </div>

                                    <?php } ?>
                                    <p style="text-align: center;"><button type="submit" name='submit' class="btn btn-primary">Güncelle</button></p>
                                </form>
                            </div>
                        </section>
                    </div>
                </div>
                <!-- Temel Formlar ve Yatay Formlar-->

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

    <!-- jquery ui -->
    <script src="js/jquery-ui-1.9.2.custom.min.js"></script>

    <!-- Özel checkbox ve radyo-->
    <script type="text/javascript" src="js/ga.js"></script>
    <!-- Özel anahtar değiştirici -->
    <script src="js/bootstrap-switch.js"></script>
    <!-- Özel etiket girişi -->
    <script src="js/jquery.tagsinput.js"></script>

    <!-- Renk seçici -->

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
    <!-- Bu sayfa için özel form bileşeni betiği -->
    <script src="js/form-component.js"></script>
    <!-- Tüm sayfa için özel betik -->
    <script src="js/scripts.js"></script>

</body>

</html>
<?php  ?>
}