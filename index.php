<!DOCTYPE html>

<html lang="en">

    <?php include('views/header/head.php'); ?>
    <?php // echo md5("1234"); ?>
    <?php session_start(); ?>

    <body id="page-top">

        <!-- Page Wrapper -->
        <div id="wrapper">
        <?php
            if (isset($_SESSION['userID'])) {
        ?>    
            <!--side bar -->
            <?php include('views/sidebar/sidebar.php'); ?>
            <!-- end side bar -->

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">

                    <!-- Top Bar -->
                    <?php include('views/topbar/topbar.php'); ?>
                    <!-- End Top Bar -->

                    <!-- Content -->
                    <?php 
                        include('views/selector.php'); 
                        $link = (isset($_GET['val'])) ? linkSelector($_GET['val']) : linkSelector();
                        // $link = linkSelector($_GET['val']);
                        include('views/' . $link); 
                    ?>
                    <!-- ------------------------------------------------------------------------------------------------- -->

                </div>
                <!-- End of Main Content -->

                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; WEBCS 2022</span>
                        </div>
                    </div>
                </footer>
                <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->
        <?php
            } else {
                include('views/account/login.php');
            }
        ?>
        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>


        <?php include('views/footer/foot.php'); ?>

    </body>

</html>