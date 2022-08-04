<!DOCTYPE html>
<?php
session_start();
include "login/ceksession.php";
?>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Arsip Surat Kecamatan Pegasing </title>

     <!-- Bootstrap -->
    <link href="../assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../assets/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../assets/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-wysiwyg -->
    <link href="../assets/vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
    <!-- Select2 -->
    <link href="../assets/vendors/select2/dist/css/select2.min.css" rel="stylesheet">
    <!-- Switchery -->
    <link href="../assets/vendors/switchery/dist/switchery.min.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="../assets/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- bootstrap-datetimepicker -->
    <link href="../assets/vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
    <!-- starrr -->
    <link href="../assets/vendors/starrr/dist/starrr.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="../assets/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <link rel="shortcut icon" href="../img/icon.ico">

    <!-- Custom Theme Style -->
    <link href="../assets/build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">

        <!-- Profile and Sidebarmenu -->
        <?php
        include("sidebarmenu.php");
        ?>
        <!-- /Profile and Sidebarmenu -->

        <!-- top navigation -->
        <?php
        include("header.php");
        ?>
        <!-- /top navigation --> 

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Surat Keluar</h3>
              </div>
            </div>
            
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Surat Keluar ><small>Detail Surat Keluar</small></h2>
                    <div class="clearfix"></div>
                  </div>
                     <?php include '../koneksi/koneksi.php';
                     $id			= mysqli_real_escape_string($db,$_GET['id_suratkeluar']);
                     $sql  		= "SELECT * FROM tb_suratkeluar where id_suratkeluar='".$id."'";                        
                     $query  	= mysqli_query($db, $sql);
                     $data 		= mysqli_fetch_array($query);?>
                  <div class="x_content">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                      <div class="profile_title">
                        <div class="col-md-6">
                          <h2>Detail Surat Keluar </h2>
                        </div>
                      </div>
                      <div class="x_content">
                    </div>   
                    <table class="table table-striped">
                      <tbody>
                        <tr>
                          <td width="40%">Tanggal Keluar</td>
                          <td><?php echo $data['tanggalkeluar_suratkeluar']?></td>
                        </tr>
                        <tr>
                          <td>Kode Surat</td>
                          <td><?php echo $data['kode_suratkeluar']?></td>
                        </tr>
                        <tr>
                          <td>Nomor Surat</td>
                          <td><?php echo $data['nomor_suratkeluar']?></td>
                        </tr>
                        
                        <tr>
                          <td>Tanggal Surat</td>
                          <td><?php echo $data['tanggalsurat_suratkeluar']?></td>
                        </tr>
                        <tr>
                          <td>Kepada</td>
                          <td><?php echo $data['kepada_suratkeluar']?></td>
                        </tr>
                        <tr>
                          <td>Perihal</td>
                          <td><?php echo $data['perihal_suratkeluar']?></td>
                        </tr>
                        <tr>
                          <td>File</td>
                          <td><a href= "<?php echo 'surat_keluar/'.$data['file_suratkeluar'].''?>"><b>Unduh File</b></a></td>
                        </tr>
                        <tr>
                          <td>Operator</td>
                          <td><?php echo $data['operator']?></td>
                        </tr>
                        <tr>
                          <td>Tanggal Entry</td>
                          <td><?php echo $data['tanggal_entry']?></td>
                        </tr>
                      </tbody>
                    </table>
                    <div class="text-right">
                   <a href="datasuratkeluar.php" class="btn btn-success"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a></div>

                  </div>
                     
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
           
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="../assets/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../assets/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../assets/vendors/nprogress/nprogress.js"></script>
    <!-- morris.js -->
    <script src="../assets/vendors/raphael/raphael.min.js"></script>
    <script src="../assets/vendors/morris.js/morris.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../assets/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../assets/vendors/moment/min/moment.min.js"></script>
    <script src="../assets/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    
    <!-- Custom Theme Scripts -->
    <script src="../assets/build/js/custom.min.js"></script>

  </body>
</html>