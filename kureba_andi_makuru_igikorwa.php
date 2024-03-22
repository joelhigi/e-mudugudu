<!DOCTYPE html>

<?php
session_start();

  if(!isset($_SESSION['user_email']))
  {
    header('Location:index.php');
  }
else{
  require 'connection/connection.php';

  if(!isset($_GET['igikorwa_id'])){
    header('Location:index.php');
  }
  else if(isset($_GET['igikorwa_id'])){
    $igikorwaID = $_GET['igikorwa_id'];
    $checkSql = mysqli_query($connection,"SELECT * FROM andi_makuru_igikorwa WHERE igikorwa_id = $igikorwaID");
    if(mysqli_num_rows($checkSql)==0){
      header('Location:index.php');
    }
    $get_name = mysqli_query($connection,"SELECT * FROM igikorwa WHERE igikorwa_id = $igikorwaID");
    $rowFoto = mysqli_fetch_array($get_name);
    $igikorwa_name = $rowFoto['igikorwa_detail'];
    $igikorwa_type = $rowFoto['igikorwa_type'];
    $checkSql2 = mysqli_query($connection,"SELECT * FROM andi_makuru_igikorwa WHERE igikorwa_id = $igikorwaID");
    $info = mysqli_fetch_assoc($checkSql2);
    $status = $info['igikorwa_status'];
    $desc = $info['igikorwa_report'];
  }
}
?>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>E-Mudugudu</title>

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
   <script src="nocheck.js"></script>
   <script src="jquery-3.3.1.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
   <script src="js/swal.js"></script>
</head>

<body id="page-top" onload="Nodd()">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php include 'sidebar.php';?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <?php include 'topbar.php';?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->

        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Uko igikorwa '<?php echo $igikorwa_name. " (".$igikorwa_type.")"?>' cyagenze</h1>
          <p class="mb-4"><!-- DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the --> .</p>

          <div class="card shadow mb-4">
            <!-- <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Uzuza imyirondoro Y'umuturage utuye hano</h6>
            </div> -->
            <div class="card-body">

                <form action="" method="POST" enctype="multipart/form-data">
                  <div class="col-lg-10 col-md-10">
                    <label for="status">Uko cyagenze</label>
                    <select class="form-control" name="status">
                      <option value="Byagenze Neza" <?php if($status = "Byagenze Neza"){echo " selected";}?>>Byagenze Neza</option>
                      <option value="Byagenze Nabi" <?php if($status = "Byagenze Nabi"){echo " selected";}?>>Byagenze Nabi</option>
                    </select>
                  </div>
                <br>
                   <div class="col-lg-10 col-md-10">
                    <label for="desc">Igisobanuro cy'ibyabereye mu gikorwa</label>
                    <textarea class="form-control" name="desc" rows="4" cols="50"><?php echo $desc;?></textarea>
                    </div>
                    <br>
                   <br>
                   <button type="submit" class="btn btn-warning m-2" name="injiza">Hindura</button><a href="<?php echo "kwinjiza_igikorwa.php";?>"><button type="button" class="btn btn-danger m-2" name="inyuma">Subira inyuma</button></a>

                </form>


                <?php

                      if (isset($_POST['injiza']))
                      {
                          $desc = $_POST['desc'];
                          $status = $_POST['status'];
                          $status = str_replace("'", '"' , $status);


                            $run = mysqli_query($connection,"UPDATE andi_makuru_igikorwa SET igikorwa_status='$status',igikorwa_report='$desc' WHERE igikorwa_id = '$igikorwaID'");
                            if ($run)
                            {

                              echo '
                               <script type="text/javascript">
                               swal.fire({
                                title: "Byakoze",
                                text: "Ifoto yageze muri sisiteme",
                                icon: "success",
                                timer: 89000
                                }).then(function() {
                                //   window.location.reload();
                               })
                               </script>';
                            }
                            else{
                              echo '
                               <script type="text/javascript">
                               swal.fire({
                                title: "Byanze",
                                text: "pwet pwet",
                                icon: "error",
                                timer: 89000
                                }).then(function() {
                                //   window.location.reload();
                               })
                               </script>';
                            }


                      }

                  ?>

                </div>
                </div>
          
            </div>
          </div>



      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; E-Mudugudu 2021</span>
          </div>
        </div>
      </footer>
    <!--  End of Footer-->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Murashaka gusohoka sisiteme?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Funga">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Kubireka</button>
          <a class="btn btn-primary" href="index.php">Gusohoka</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>
  <script>
  		if ( window.history.replaceState ) {
    			window.history.replaceState( null, null, window.location.href );
  		}
  	</script>

</body>

</html>
