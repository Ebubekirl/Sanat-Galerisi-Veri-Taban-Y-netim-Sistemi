<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if (strlen($_SESSION['agmsaid']) == 0) {
    header('location:logout.php');
} else {

    if (isset($_GET['delid'])) {
        $rid = intval($_GET['delid']);
        $sql = mysqli_query($con, "delete from tblarttype where ID='$rid'");
        echo "<script>alert('Veri silindi');</script>";
        echo "<script>window.location.href = 'manage-art-type.php'</script>";
    }

    ?>
    <!DOCTYPE html>
    <html lang="en">
    
    <head>
    
        <title>Sanat Türü Yönet | Sanat Galerisi Yönetim Sistemi</title>
    
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
        <!-- Container bölümü başlangıç -->
        <section id="container" class="">
            <!-- Header başlangıç -->
            <?php include_once('includes/header.php'); ?>
            <!-- Header bitiş -->
    
            <!-- Sidebar başlangıç -->
            <?php include_once('includes/sidebar.php'); ?>
    
            <!-- Ana içerik başlangıç -->
            <section id="main-content">
                <section class="wrapper">
                    <div class="row">
                        <div class="col-lg-12">
                            <h3 class="page-header"><i class="fa fa-table"></i> Sanat Türü Yönet</h3>
                            <ol class="breadcrumb">
                                <li><i class="fa fa-home"></i><a href="dashboard.php">Ana Sayfa</a></li>
                                <li><i class="fa fa-table"></i>Sanat Türü Yönet</li>
                                <li><i class="fa fa-th-list"></i>Sanat Türü Yönet</li>
                            </ol>
                        </div>
                    </div>
                    <!-- Sayfa başlangıcı -->
                    <div class="row">
                        <div class="col-sm-12">
                            <section class="panel">
                                <header class="panel-heading">
                                    Sanat Türü Yönet
                                </header>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>S.NO</th>
                                            <th>Türü</th>
                                            <th>Oluşturulma Tarihi</th>
                                            <th>İşlem</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    $ret = mysqli_query($con, "select * from tblarttype");
                                    $cnt = 1;
                                    while ($row = mysqli_fetch_array($ret)) {
                                    ?>
    
                                        <tr>
                                            <td><?php echo $cnt; ?></td>
                                            <td><?php echo $row['ArtType']; ?></td>
                                            <td><?php echo $row['CreationDate']; ?></td>
                                            <td><a href="edit-art-type-detail.php?editid=<?php echo $row['ID']; ?>"
                                                    class="btn btn-success">Düzenle</a> || <a
                                                    href="manage-art-type.php?delid=<?php echo $row['ID']; ?>"
                                                    class="btn btn-danger">Sil</a></td>
                                        </tr>
                                        <?php
                                        $cnt = $cnt + 1;
                                    } ?>
                                </table>
                            </section>
                        </div>
    
                    </div>
    
                    <!-- Sayfa bitişi -->
                </section>
            </section>
            <!-- Ana içerik bitiş -->
            <?php include_once('includes/footer.php'); ?>
        </section>
        <!-- Container bölümü bitiş -->
        <!-- JavaScript dosyaları -->
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <!-- Nicescroll -->
        <script src="js/jquery.scrollTo.min.js"></script>
        <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
        <!-- Tüm sayfalar için özel script -->
        <script src="js/scripts.js"></script>
    
    
    </body>
    
    </html>
<?php }  ?>
