<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if (strlen($_SESSION['agmsaid'] == 0)) {
    header('location:logout.php');
}
?>

<!DOCTYPE html>
<html lang="tr">

<head>
    <title>Sanat Galerisi Yönetim Sistemi - Admin Kontrol Paneli</title>
    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap teması -->
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <!-- dış CSS -->
    <!-- font ikonları -->
    <link href="css/elegant-icons-style.css" rel="stylesheet" />
    <link href="css/font-awesome.min.css" rel="stylesheet" />
    <!-- tam takvim CSS-->
    <link href="assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
    <link href="assets/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet" />
    <!-- easy pie chart-->
    <link href="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen" />
    <!-- baykuş karuseli -->
    <link rel="stylesheet" href="css/owl.carousel.css" type="text/css">
    <link href="css/jquery-jvectormap-1.2.2.css" rel="stylesheet">
    <!-- Özel stiller -->
    <link rel="stylesheet" href="css/fullcalendar.css">
    <link href="css/widgets.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />
    <link href="css/xcharts.min.css" rel="stylesheet">
    <link href="css/jquery-ui-1.10.4.min.css" rel="stylesheet">
    <!-- =======================================================
    Tema Adı: NiceAdmin
    Tema URL'si: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
    Yazar: BootstrapMade
    Yazar URL'si: https://bootstrapmade.com
    ======================================================= -->
</head>

<body>
    <!-- konteyner bölümü başlangıcı -->
    <section id="container" class="">
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
                        <h3 class="page-header"><i class="fa fa-laptop"></i> Kontrol Paneli</h3>
                        <ol class="breadcrumb">
                            <li><i class="fa fa-home"></i><a href="dashboard.php">Ana Sayfa</a></li>
                            <li><i class="fa fa-laptop"></i>Kontrol Paneli</li>
                        </ol>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="info-box green-bg">
                            <?php
                            $query = mysqli_query($con, "SELECT * FROM tblartist");
                            $sanatciSayisi = mysqli_num_rows($query);
                            ?>
                            <i class="fa fa-user"></i>
                            <div class="count"><?php echo $sanatciSayisi; ?></div>
                            <div class="title"><a class="dropdown-item" href="manage-artist.php">Toplam Sanatçı</a></div>
                        </div>
                        <!--/.info-box-->
                    </div>
                    <!--/.col-->

                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="info-box dark-bg">
                            <?php
                            $query2 = mysqli_query($con, "SELECT * FROM tblarttype");
                            $sanatTuruSayisi = mysqli_num_rows($query2);
                            ?>
                            <i class="fa fa-file"></i>
                            <div class="count"><?php echo $sanatTuruSayisi; ?></div>
                            <div class="title"><a class="dropdown-item" href="manage-art-type.php">Toplam Sanat Türü</a></div>
                        </div>
                        <!--/.info-box-->
                    </div>
                    <!--/.col-->

                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="info-box brown-bg">
                            <?php
                            $query1 = mysqli_query($con, "SELECT * FROM tblartmedium");
                            $sanatOrtamiSayisi = mysqli_num_rows($query1);
                            ?>
                            <i class="fa fa-file"></i>
                            <div class="count"><?php echo $sanatOrtamiSayisi; ?></div>
                            <div class="title"><a class="dropdown-item" href="manage-art-medium.php">Toplam Sanat Ortamı</a></div>
                        </div>
                        <!--/.info-box-->
                    </div>
                    <!--/.col-->

                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="info-box dark-bg">
                            <?php
                            $query2 = mysqli_query($con, "SELECT * FROM tblartproduct");
                            $sanatUrunuSayisi = mysqli_num_rows($query2);
                            ?>
                            <i class="fa fa-file"></i>
                            <div class="count"><?php echo $sanatUrunuSayisi; ?></div>
                            <div class="title"><a class="dropdown-item" href="manage-art-product.php">Toplam Sanat Ürünü</a></div>
                        </div>
                        <!--/.info-box-->
                    </div>
                    <!--/.col-->
                </div>
                <!--/.row-->
                <?php include_once('includes/footer.php'); ?>
            </section>
        </section>
        <!-- ana içerik bitişi -->
    </section>
    <!-- konteyner bölümü başlangıcı -->

    <!-- javascriptler -->
    <script src="js/jquery.js"></script>
    <script src="js/jquery-ui-1.10.4.min.js"></script>
    <script src="js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="js/jquery-ui-1.9.2.custom.min.js"></script>
    <!-- bootstrap -->
    <script src="js/bootstrap.min.js"></script>
    <!-- güzel kaydır -->
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
    <!-- grafikler için scriptler -->
    <script src="assets/jquery-knob/js/jquery.knob.js"></script>
    <script src="js/jquery.sparkline.js" type="text/javascript"></script>
    <script src="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
    <script src="js/owl.carousel.js"></script>
    <!-- jQuery tam takvim -->
    <<script src="js/fullcalendar.min.js"></script>
    <!-- Tam Google Takvim - Takvim -->
    <script src="assets/fullcalendar/fullcalendar/fullcalendar.js"></script>
    <!-- bu sayfa için sadece script -->
    <script src="js/calendar-custom.js"></script>
    <script src="js/jquery.rateit.min.js"></script>
    <!-- özel seçim -->
    <script src="js/jquery.customSelect.min.js"></script>
    <script src="assets/chart-master/Chart.js"></script>
    <!-- tüm sayfa için özel script -->
    <script src="js/scripts.js"></script>
    <!-- bu sayfa için özel script -->
    <script src="js/sparkline-chart.js"></script>
    <script src="js/easy-pie-chart.js"></script>
    <script src="js/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="js/jquery-jvectormap-world-mill-en.js"></script>
    <script src="js/xcharts.min.js"></script>
    <script src="js/jquery.autosize.min.js"></script>
    <script src="js/jquery.placeholder.min.js"></script>
    <script src="js/gdp-data.js"></script>
    <script src="js/morris.min.js"></script>
    <script src="js/sparklines.js"></script>
    <script src="js/charts.js"></script>
    <script src="js/jquery.slimscroll.min.js"></script>
    <script>
        //knob
        $(function() {
            $(".knob").knob({
                'draw': function() {
                    $(this.i).val(this.cv + '%')
                }
            })
        });

        //carousel
        $(document).ready(function() {
            $("#owl-slider").owlCarousel({
                navigation: true,
                slideSpeed: 300,
                paginationSpeed: 400,
                singleItem: true
            });
        });

        //özel seçim kutusu
        $(function() {
            $('select.styled').customSelect();
        });

        /* ---------- Harita ---------- */
        $(function() {
            $('#map').vectorMap({
                map: 'world_mill_en',
                series: {
                    regions: [{
                        values: gdpData,
                        scale: ['#000', '#000'],
                        normalizeFunction: 'polynomial'
                    }]
                },
                backgroundColor: '#eef3f7',
                onLabelShow: function(e, el, code) {
                    el.html(el.html() + ' (GDP - ' + gdpData[code] + ')');
                }
            });
        });
    </script>
</body>

</html>
