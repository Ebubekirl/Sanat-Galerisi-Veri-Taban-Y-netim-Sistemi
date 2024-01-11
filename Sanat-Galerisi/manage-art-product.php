<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['agmsaid']) == 0) {
    header('location:logout.php');
} else {

    if (isset($_GET['delid'])) {
        $rid = intval($_GET['delid']);
        $sql = mysqli_query($con, "delete from tblartproduct where ID='$rid'");
        echo "<script>alert('Veri silindi');</script>";
        echo "<script>window.location.href = 'manage-art-product.php'</script>";
    }

    ?>
    <!DOCTYPE html>
    <html lang="en">
    
    <head>
    
        <title>Sanat Ürünlerini Yönet | Sanat Galerisi Yönetim Sistemi</title>
    
        <!-- Bootstrap CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!-- Bootstrap teması -->
        <link href="css/bootstrap-theme.css" rel="stylesheet">
        <!-- harici CSS -->
        <!-- font ikonu -->
        <link href="css/elegant-icons-style.css" rel="stylesheet" />
        <link href="css/font-awesome.min.css" rel="stylesheet" />
        <!-- Özel stiller -->
        <link href="css/style.css" rel="stylesheet">
        <link href="css/style-responsive.css" rel="stylesheet" />
    
    </head>
    
    <body>
        <!-- container section start -->
        <section id="container" class="">
            <!--header start-->
            <?php include_once('includes/header.php'); ?>
            <!--header end-->
    
            <!--sidebar start-->
            <?php include_once('includes/sidebar.php'); ?>
    
            <!--main content start-->
            <section id="main-content">
                <section class="wrapper">
                    <div class="row">
                        <div class="col-lg-12">
                            <h3 class="page-header"><i class="fa fa-table"></i> Sanat Ürünlerini Yönet</h3>
                            <ol class="breadcrumb">
                                <li><i class="fa fa-home"></i><a href="dashboard.php">Ana Sayfa</a></li>
                                <li><i class="fa fa-table"></i>Sanat Ürünlerini Yönet</li>
                                <li><i class="fa fa-th-list"></i>Sanat Ürünlerini Yönet</li>
                            </ol>
                        </div>
                    </div>
                    <!-- sayfa başlangıcı -->
                    <div class="row">
                        <div class="col-sm-12">
                            <section class="panel">
                                <header class="panel-heading">
                                    Sanat Ürünlerini Yönet
                                </header>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>S.NO</th>
                                            <th>Referans Numarası</th>
                                            <th>Başlık</th>
                                            <th>Resim</th>
                                            <th>Oluşturulma Tarihi</th>
                                            <th>İşlem</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    $ret = mysqli_query($con, "CALL eserler()");
                                    $cnt = 1;
                                    while ($row = mysqli_fetch_array($ret)) {
                                    ?>
    
                                        <tr>
                                            <td><?php echo $cnt; ?></td>
                                            <td><?php echo $row['RefNum']; ?></td>
                                            <td><?php echo $row['Title']; ?></td>
                                            <td><img src="images/<?php echo $row['Image']; ?>" width='100' height="100"></td>
                                            <td><?php echo $row['CreationDate']; ?></td>
                                            <td><a href="edit-art-product-detail.php?editid=<?php echo $row['ID']; ?>"
                                                    class="btn btn-success">Düzenle</a> || <a
                                                    href="manage-art-product.php?delid=<?php echo $row['ID']; ?>"
                                                    class="btn btn-danger">Sil</a></td>
                                        </tr>
                                        <?php
                                        $cnt = $cnt + 1;
                                    } ?>
                                </table>
                            </section>
                        </div>
    
                    </div>
    
                    <!-- sayfa bitişi -->
                </section>
            </section>
            <!--main content end-->
            <?php include_once('includes/footer.php'); ?>
        </section>
        <!-- container section end -->
        <!-- javascripts -->
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <!-- nicescroll -->
        <script src="js/jquery.scrollTo.min.js"></script>
        <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
        <!-- tüm sayfalar için özel script -->
        <script src="js/scripts.js"></script>
    
    
    </body>
    
    </html>
<?php } ?>
