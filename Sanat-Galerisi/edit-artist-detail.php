<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if (strlen($_SESSION['agmsaid']) == 0) {
    header('location:logout.php');
} else {

    if (isset($_POST['submit'])) {

        $name = $_POST['name'];
        $mobnum = $_POST['mobnum'];
        $email = $_POST['email'];
        $edudetails = $_POST['edudetails'];
        $awarddetails = $_POST['awarddetails'];
        $eid = $_GET['editid'];

        $query = mysqli_query($con, "update tblartist set Name='$name',MobileNumber='$mobnum',Email='$email',Education='$edudetails',Award='$awarddetails' where ID='$eid'");
        if ($query) {

            echo "<script>alert('Sanatçı detayları güncellendi.');</script>";
        } else {
            echo "<script>alert('Bir şeyler ters gitti. Lütfen tekrar deneyin.');</script>";
        }
    }

    ?>
    <!DOCTYPE html>
    <html lang="tr">

    <head>

        <title>Sanatçı Güncelle | Sanat Galerisi Yönetim Sistemi</title>

        <!-- Bootstrap CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!-- Bootstrap teması -->
        <link href="css/bootstrap-theme.css" rel="stylesheet">
        <!-- dış CSS -->
        <!-- font ikonu -->
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
            <!-- başlık başlangıcı -->
            <?php include_once('includes/header.php'); ?>
            <!-- başlık sonu -->

            <!-- kenar çubuğu başlangıcı -->
            <?php include_once('includes/sidebar.php'); ?>
            <!-- kenar çubuğu sonu -->

            <!-- ana içerik başlangıcı -->
            <section id="main-content">
                <section class="wrapper">
                    <div class="row">
                        <div class="col-lg-12">
                            <h3 class="page-header"><i class="fa fa-file-text-o"></i>Sanatçı Detayını Güncelle</h3>
                            <ol class="breadcrumb">
                                <li><i class="fa fa-home"></i><a href="dashboard.php">Ana Sayfa</a></li>
                                <li><i class="icon_document_alt"></i>Sanatçı</li>
                                <li><i class="fa fa-file-text-o"></i>Sanatçı Detayı</li>
                            </ol>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <section class="panel">
                                <header class="panel-heading">
                                    Sanatçı Detayını Güncelle
                                </header>
                                <div class="panel-body">
                                    <form class="form-horizontal " method="post" action="">
                                        <p style="font-size:16px; color:red" align="left"> <?php if ($msg) {
                                                                                            echo $msg;
                                                                                        }  ?> </p>

                                        <?php
                                        $cid = $_GET['editid'];
                                        $ret = mysqli_query($con, "select * from tblartist where ID='$cid'");
                                        $cnt = 1;
                                        while ($row = mysqli_fetch_array($ret)) {

                                        ?>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Ad</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" id="name" name="name" type="text" required="true" value="<?php  echo $row['Name'];?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Telefon Numarası</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" id="mobnum" maxlength="10" name="mobnum" type="text" required="true" pattern="[0-9]+" value="<?php  echo $row['MobileNumber'];?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">E-posta</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" id="email" name="email" type="email" required="true" value="<?php  echo $row['Email'];?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Eğitim Detayları</label>
                                                <div class="col-sm-10">
                                                    <textarea class="form-control" name="edudetails" required="true"><?php  echo $row['Education'];?></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Ödül Detayları</label>
                                                <div class="col-sm-10">
                                                    <textarea class="form-control" name="awarddetails" required="true"><?php  echo $row['Award'];?></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Profil Fotoğrafı</label>
                                                <div class="col-sm-10">
                                                    <img src="images/<?php echo $row['Profilepic'];?>" width="200" height="150" value="<?php  echo $row['Profilepic'];?>"><a href="changepropic.php?imageid=<?php echo $row['ID'];?>" class="btn btn-success">  Resmi Düzenle</a>
                                                </div>

                                            </div>
                                        <?php } ?>
                                        <p style="text-align: center;"> <button type="submit" name='submit' class="btn btn-primary">Güncelle</button></p>
                                    </form>
                                </div>
                            </section>

                        </div>
                    </div>

                </section>
            </section>
            <?php include_once('includes/footer.php'); ?>
        </section>
        <!-- konteyner bölümü sonu -->
        <!-- javascripts -->
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <!-- güzel kaydır -->
        <script src="js/jquery.scrollTo.min.js"></script>
        <script src="js/jquery.nicescroll.js" type="text/javascript"></script>

        <!-- jquery ui -->
        <script src="js/jquery-ui-1.9.2.custom.min.js"></script>

        <!-- özel onay kutusu ve radyo-->
        <script type="text/javascript" src="js/ga.js"></script>
        <!-- özel anahtar değiştir -->
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
        <!-- ck editor -->
        <script type="text/javascript" src="assets/ckeditor/ckeditor.js"></script>
        <!-- bu sayfa için özel form bileşeni betiği -->
        <script src="js/form-component.js"></script>
        <!-- tüm sayfa için özel betiği -->
        <script src="js/scripts.js"></script>


    </body>

    </html>
    <?php  } ?>
