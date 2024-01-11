<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if (strlen($_SESSION['agmsaid'] == 0)) {
    header('location:logout.php');
} else {
    if (isset($_POST['submit'])) {
        $baslik = $_POST['title'];
        $boyut = $_POST['dimension'];
        $yon = $_POST['orientation'];
        $boyut = $_POST['size'];
        $sanatci = $_POST['artist'];
        $sanatTur = $_POST['arttype'];
        $sanatOrtam = $_POST['artmed'];
        $satisFiyati = $_POST['sprice'];
        $aciklama = $_POST['description'];
        $eid = $_GET['editid'];

        $sorgu = mysqli_query($con, "UPDATE tblartproduct SET Title='$baslik', Dimension='$boyut', Orientation='$yon', Size='$boyut', Artist='$sanatci', ArtType='$sanatTur', ArtMedium='$sanatOrtam', SellingPricing='$satisFiyati', Description='$aciklama' WHERE ID='$eid'");

        if ($sorgu) {
            echo "<script>alert('Sanat ürünü güncellendi.');</script>";
        } else {
            echo "<script>alert('Bir şeyler yanlış gitti. Lütfen tekrar deneyin.');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="tr">

<head>
    <title>Sanat Ürünü Ekle | Sanat Galerisi Yönetim Sistemi</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <link href="css/elegant-icons-style.css" rel="stylesheet" />
    <link href="css/font-awesome.min.css" rel="stylesheet" />
    <link href="css/daterangepicker.css" rel="stylesheet" />
    <link href="css/bootstrap-datepicker.css" rel="stylesheet" />
    <link href="css/bootstrap-colorpicker.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />
</head>

<body>
    <section id="container" class="">
        <!-- başlık başlangıcı-->
        <?php include_once('includes/header.php'); ?>
        <!-- başlık bitişi-->

        <!-- kenar çubuğu başlangıcı -->
        <?php include_once('includes/sidebar.php'); ?>
        <!-- kenar çubuğu bitişi -->

        <!-- ana içerik başlangıcı -->
        <section id="main-content" style="color:#000">
            <section class="wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header"><i class="fa fa-file-text-o"></i> Sanat Ürünü Detayı Ekle</h3>
                        <ol class="breadcrumb">
                            <li><i class="fa fa-home"></i><a href="dashboard.php">Ana Sayfa</a></li>
                            <li><i class="icon_document_alt"></i>Sanat Ürünü</li>
                            <li><i class="fa fa-file-text-o"></i>Sanat Ürünü Detayı</li>
                        </ol>
                    </div>
                </div>

                <div class="row">
                    <form class="form-horizontal " method="post" action="" enctype="multipart/form-data">
                        <?php
                        $cid = $_GET['editid'];
                        $sorgu = mysqli_query($con, "SELECT tblarttype.ID as atid, tblarttype.ArtType as typename, tblartmedium.ID as amid, tblartmedium.ArtMedium as amname, tblartproduct.ID as apid, tblartist.ID as arid, tblartist.Name, tblartproduct.Title, tblartproduct.Dimension, tblartproduct.Orientation, tblartproduct.Size, tblartproduct.Artist, tblartproduct.ArtType, tblartproduct.ArtMedium, tblartproduct.SellingPricing, tblartproduct.Description, tblartproduct.Image, tblartproduct.Image1, tblartproduct.Image2, tblartproduct.Image3, tblartproduct.Image4, tblartproduct.RefNum, tblartproduct.ArtType FROM tblartproduct JOIN tblarttype ON tblarttype.ID = tblartproduct.ArtType JOIN tblartmedium ON tblartmedium.ID = tblartproduct.ArtMedium JOIN tblartist ON tblartist.ID = tblartproduct.Artist WHERE tblartproduct.ID='$cid'");
                        $cnt = 1;
                        while ($row = mysqli_fetch_array($sorgu)) {
                        ?>
                            <div class="col-lg-6">
                                <section class="panel">
                                    <header class="panel-heading">
                                        Sanat Ürünü Detayını Güncelle
                                    </header>
                                    <div class="panel-body">

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Başlık</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" id="title" name="title" type="text" required="true" value="<?php echo $row['Title']; ?>" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Öne Çıkan Resim</label>
                                            <div class="col-sm-10">
                                                <img src="images/<?php echo $row['Image']; ?>" width="200" height="150" value="<?php echo $row['Image']; ?>"><a href="changeimage.php?editid=<?php echo $row['apid']; ?>"> &nbsp; Resmi Düzenle</a>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Sanat Ürünü Resim1</label>
                                            <div class="col-sm-10">
                                                <img src="images/<?php echo $row['Image1']; ?>" width="200" height="150" value="<?php echo $row['Image1']; ?>"><a href="changeimage1.php?editid=<?php echo $row['apid']; ?>"> &nbsp; Resmi Düzenle</a>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Sanat Ürünü Resim2</label>
                                            <div class="col-sm-10">
                                                <img src="images/<?php echo $row['Image2']; ?>" width="200" height="150" value="<?php echo $row['Image2']; ?>"><a href="changeimage2.php?editid=<?php echo $row['apid']; ?>"> &nbsp; Resmi Düzenle</a>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Sanat Ürünü Resim3</label>
                                            <div class="col-sm-10">
                                                <img src="images/<?php echo $row['Image3']; ?>" width="200" height="150" value="<?php echo $row['Image3']; ?>"><a href="changeimage3.php?editid=<?php echo $row['apid']; ?>"> &nbsp; Resmi Düzenle</a>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Sanat Ürünü Resim4</label>
                                            <div class="col-sm-10">
                                                <img src="images/<?php echo $row['Image4']; ?>" width="200" height="150" value="<?php echo $row['Image4']; ?>"><a href="changeimage4.php?editid=<?php echo $row['apid']; ?>"> &nbsp; Resmi Düzenle</a>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Boyut</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" id="dimension" name="dimension" type="text" required="true" value="<?php echo $row['Dimension']; ?>">
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>

                            <div class="col-lg-6">
                                <section class="panel">
                                    <div class="panel-body">

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Yönlendirme</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" id="orientation" name="orientation" required="true">
                                                    <option value="<?php echo $row['Orientation']; ?>"><?php echo $row['Orientation']; ?></option>
                                                    <option value="Portre">Portre</option>
                                                    <option value="Manzara">Manzara</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Boyut</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" id="size" name="size" required="true">
                                                    <option value="<?php echo $row['Size']; ?>"><?php echo $row['Size']; ?></option>
                                                    <option value="Küçük">Küçük</option>
                                                    <option value="Orta">Orta</option>
                                                    <option value="Büyük">Büyük</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Sanatçı</label>
                                            <div class="col-sm-10">
                                                <select class="form-control m-bot15" name="artist" id="artist">
                                                    <option value="<?php echo $row['arid']; ?>"><?php echo $row['Name']; ?></option>
                                                    <?php
                                                    $sorgu1 = mysqli_query($con, "SELECT * FROM tblartist");
                                                    while ($row1 = mysqli_fetch_array($sorgu1)) {
                                                    ?>
                                                        <option value="<?php echo $row1['ID']; ?>"><?php echo $row1['Name']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Sanat Türü</label>
                                            <div class="col-sm-10">
                                                <select class="form-control m-bot15" name="arttype" id="arttype">
                                                    <option value="<?php echo $row['atid']; ?>"><?php echo $row['typename']; ?></option>
                                                    <?php
                                                    $sorgu2 = mysqli_query($con, "SELECT * FROM tblarttype");
                                                    while ($row2 = mysqli_fetch_array($sorgu2)) {
                                                    ?>
                                                        <option value="<?php echo $row2['ID']; ?>"><?php echo $row2['ArtType']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Sanat Ortamı</label>
                                            <div class="col-sm-10">
                                                <select class="form-control m-bot15" name="artmed" id="artmed">
                                                    <option value="<?php echo $row['amid']; ?>"><?php echo $row['amname']; ?></option>
                                                    <?php
                                                    $sorgu3 = mysqli_query($con, "SELECT * FROM tblartmedium");
                                                    while ($row3 = mysqli_fetch_array($sorgu3)) {
                                                    ?>
                                                        <option value="<?php echo $row3['ID']; ?>"><?php echo $row3['ArtMedium']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Satış Fiyatı</label>
                                            <div class="col-sm-10">
                                                <input class="form-control " id="sprice" type="text" name="sprice" required="true" value="<?php echo $row['SellingPricing']; ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Sanat Ürünü Açıklaması</label>
                                            <div class="col-sm-10">
                                                <textarea class="form-control " id="description" type="text" name="description" rows="12" cols="4" required="true"><?php echo $row['Description']; ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        <?php } ?>
                        <p style="text-align: center;"> <button type="submit" name='submit' class="btn btn-primary">Gönder</button></p>
                    </form>
                </div>
            </section>
        </section>
        <?php include_once('includes/footer.php'); ?>
    </section>

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="js/jquery-ui-1.9.2.custom.min.js"></script>
    <script type="text/javascript" src="js/ga.js"></script>
    <script src="js/bootstrap-switch.js"></script>
    <script src="js/jquery.tagsinput.js"></script>
    <script src="js/jquery.hotkeys.js"></script>
    <script src="js/bootstrap-wysiwyg.js"></script>
    <script src="js/bootstrap-wysiwyg-custom.js"></script>
    <script src="js/moment.js"></script>
    <script src="js/bootstrap-colorpicker.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <!-- ck editor -->
  <script type="text/javascript" src="assets/ckeditor/ckeditor.js"></script>
  <!-- custom form component script for this page-->
  <script src="js/form-component.js"></script>
  <!-- custome script for all page -->
  <script src="js/scripts.js"></script>


</body>

</html>
<?php ?>
} 