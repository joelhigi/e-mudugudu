<!DOCTYPE html>

<?php
session_start();
  if(!isset($_SESSION['user_email']) || !isset($_GET['igikorwa_id']))
  {
    header('Location:index.php');
  }
else{
  require 'connection/connection.php';
  $igikorwaID = $_GET['igikorwa_id'];
  $get_name = "select * from igikorwa where igikorwa_id='$igikorwaID'";
  $run_name = mysqli_query($connection,$get_name);
  $rowName = mysqli_fetch_array($run_name);
  $type = $rowName['igikorwa_type'];
  $data = $rowName['igikorwa_detail'];
  $date = $rowName['date'];
  $time = $rowName['time'];

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
          <h1 class="h3 mb-2 text-gray-800">KWINJIZA IGIKORWA MURI SISITEME</h1>
          <p class="mb-4"><!-- DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the --> .</p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <!-- <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Uzuza imyirondoro Y'umuturage utuye hano</h6>
            </div> -->
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <form action="" method="post">
                  <!-- <div class="form-group control "col-md-6> -->



                  <div class="col-lg-10 col-md-10">
                    <label for="type">Ubwoko bw'igikorwa</label>
                    <select class="form-control" name="type">
                      <option value="Umuganda" <?php if($type=='Umuganga'){echo "selected";}?>>Umuganda</option>
                      <option value="Akagoroba k'ababyeyi" <?php if($type=="Akagoroba k'ababyeyi"){echo "selected";}?>>Akagoroba k'ababyeyi</option>
                      <option value="Inama" <?php if($type=='Inama'){echo "selected";}?>>Inama</option>
                      <option value="Igitaramo" <?php if($type=='Igitaramo'){echo "selected";}?>>Igitaramo</option>
                      <option value="Ikindi" <?php if($type=='Ikindi'){echo "selected";}?>>Ikindi</option>
                    </select>
                  </div>

                  <br>

                   <div class="col-lg-10 col-md-10">
                    <label for="igikorwadata">Andi makuru</label>
                    <input type="text" class="form-control" placeholder="" value=<?php echo $data;?> name="igikorwadata" required="required"></div>
                    <br>

                    <div class="col-lg-10 col-md-10">
                     <label for="itariki">Itariki (Ukwezi/Umunsi/Umwaka)</label>
                     <input type="date" class="form-control" placeholder="" value=<?php echo $date;?> name="itariki" required="required
                     "></div>
                     <br>

                     <div class="col-lg-10 col-md-10">
                      <label for="isaha">Isaha</label>
                      <input type="time" class="form-control" placeholder="" value=<?php echo $time;?> name="isaha" required="required"></div>
                      <br>

                  <button type="submit" class="btn btn-primary m-2" name="injiza">Emeza</button><button onclick="<?php echo"window.location.href='kwinjiza_igikorwa.php'";?>" type="button" class="btn btn-danger m-2" name="inyuma">Subira inyuma</button>
                </form>
                <?php

                  if(isset($_POST['injiza']))
                  {
                    $type = $_POST['type'];
                    $data = $_POST['igikorwadata'];
                    $date = $_POST['itariki'];
                    $time = $_POST['isaha'];

                    $update = "UPDATE igikorwa
                                SET igikorwa_type='$type',igikorwa_detail='$data',date='$date',time='$time'
                                WHERE igikorwa_id = '$igikorwaID'";
                    $result = mysqli_query($connection,$update);
                    if($result){
                     /*swal*/
                      echo '
    <script type="text/javascript">
    swal.fire({
     title: "Byakoze",
     text: "Amakuru mashya yageze muri sisiteme.",
     icon: "success",
     timer: 89000
     }).then(function() {
      //  window.location.href = "./amatables/igikorwa_data.php";
    });


    </script>';
                    }
                    else{
                      echo '
    <script type="text/javascript">
    swal.fire({
     title: "Byanze",
     text: "Amakuru mashya ntabwo yageze muri sisiteme.",
     icon: "error",
     timer: 89000
     }).then(function() {
      //  window.location.href = "./amatables/igikorwa_data.php";
    });


    </script>';
                    }
                  }

                ?>
                </div>
                </div>
                </div>

                </table></div></div>



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
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="index.php">Logout</a>
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
