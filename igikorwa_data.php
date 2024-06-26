<!DOCTYPE html>
<?php
session_start();
  if(!isset($_SESSION['user_email']))
  {
    header('Location:index.php');
  }
else{
  require 'connection/connection.php';
}
?>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin 2 - Tables</title>

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

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


          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h4 class="m-0 font-weight-bold text-primary">Lisiti y'ibikorwa byose byo mu mudugudu</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                      <tr>
                        <th>Ubwoko bw'igikorwa</th>
                        <th>Uko kitwa</th>
                        <th>Itariki kizaberaho (Umwaka-Ukwezi-Umunsi)</th>
                        <th>Isaha kizatangiriraho (Amasaha 24)</th>
                        <th>Amakuru yose</th>
                        <th>Amafoto</th>
                      </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Ubwoko bw'igikorwa</th>
                      <th>Uko kitwa</th>
                      <th>Itariki kizaberaho (Umwaka-Ukwezi-Umunsi)</th>
                      <th>Isaha kizatangiriraho (Amasaha 24)</th>
                      <th>Amakuru yose</th>
                      <th>Amafoto</th>
                    </tr>
                  </tfoot>
                  <tbody>
                     <?php
      $sql="SELECT igikorwa_id, igikorwa_type, igikorwa_detail,	date, time, uko_byagenze FROM igikorwa";


$result=mysqli_query($connection,$sql);
$checkresult=mysqli_num_rows($result);
if ($checkresult > 0) {
  while ($row=mysqli_fetch_array($result)) {
    echo"<tr>";
          echo"<td>".$row['igikorwa_type']."</td>";
          echo"<td>".$row['igikorwa_detail']."</td>";
          echo"<td>".$row['date']."</td>";
          echo"<td>".$row['time']."</td>";
            $igikorwaID = $row['igikorwa_id'];

              echo "<td><a class='btn btn-primary btn-block' href='andi_makuru_igikorwa.php?igikorwa_id=".$igikorwaID."'>Reba/Hindura amakuru</a></td>";


            $checkIfFotoResult = mysqli_query($connection,"SELECT * FROM amafoto WHERE igikorwa_id = $igikorwaID");

            if(mysqli_num_rows($checkIfFotoResult)>0)
            {
              echo "<td><a class='btn btn-primary btn-block' href='kwinjiza_igikorwa_foto.php?igikorwa_id=".$igikorwaID."'>Reba amafoto</a></td>";
            }

            else if(mysqli_num_rows($checkIfFotoResult)==0)
            {
              echo "<td><a class='btn btn-secondary btn-block' href='kwinjiza_igikorwa_foto.php?igikorwa_id=".$igikorwaID."'>Shiramo amafoto</a></td>";
            }
      echo "</tr>";


  }

}
        ?>

                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2020</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

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

</body>

</html>
