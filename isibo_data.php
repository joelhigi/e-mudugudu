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

  <title>E-Mudugudu</title>

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
              <h4 class="m-0 font-weight-bold text-primary">Lisiti y'amasibo yose yo mu mudugudu</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                      <tr>
                        <th>Izina ry'isibo</th>
                        <th>Umubare w'ibipangu bigize isibo</th>
                        <th>Abaturage</th>
                        <th>Guhindura Izina</th>
                        <th>Gusiba Isibo</th>

                      </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Izina ry'isibo</th>
                      <th>Umubare w'ibipangu bigize isibo</th>
                      <th>Abaturage</th>
                      <th>Guhindura Izina</th>
                      <th>Gusiba Isibo</th>
                    </tr>
                  </tfoot>
                  <tbody>
                     <?php
      $sql="SELECT isibo_id, isibo_name,reg_datetime FROM isibo";


$result=mysqli_query($connection,$sql);
$checkresult=mysqli_num_rows($result);
if ($checkresult > 0) {
  while ($row=mysqli_fetch_array($result)) {
    echo"<tr>
            <td>".$row['isibo_name']."</td>";
            $isiboID = $row['isibo_id'];
            $checkIfIgipanguResult = mysqli_query($connection,"SELECT * FROM igipangu WHERE isibo_id = $isiboID");


            if(mysqli_num_rows($checkIfIgipanguResult)>0)
            {
              $countResult=mysqli_query($connection,"SELECT count(*) as total from igipangu WHERE isibo_id = $isiboID");
              $all=mysqli_fetch_assoc($countResult);
              $ibipangu = $all['total'];
              echo "<td>$ibipangu</td>";
            }

            else if(mysqli_num_rows($checkIfIgipanguResult)==0)
            {
              echo "<td>Nta bipangu barandikwa kuri iri sibo</td>";
            }

            $checkIfUmuturageResult = mysqli_query($connection,"SELECT umuturage.umuturage_id as id, umuturage.umuryango_id,nyirinzu.umuryango_id, nyirinzu.inzu_id, inzu.inzu_id, inzu.igipangu_id, igipangu.igipangu_id, igipangu.isibo_id, isibo.isibo_id
      FROM umuturage,umuryango,nyirinzu,inzu,igipangu,isibo WHERE umuturage.umuryango_id = umuryango.umuryango_id
      AND umuturage.umuryango_id = nyirinzu.umuryango_id
      AND nyirinzu.inzu_id = inzu.inzu_id
      AND inzu.igipangu_id = igipangu.igipangu_id
      AND igipangu.isibo_id = isibo.isibo_id
      AND isibo.isibo_id = $isiboID");


            if(mysqli_num_rows($checkIfUmuturageResult)>0)
            {

              $all=mysqli_num_rows($checkIfUmuturageResult);
              $abaturage = $all;
              echo "<td><a href='umuturage_isibo.php?isibo_id=$isiboID' class='btn btn-success'>Abaturage batuyemo</a></td>";
            }

            else if(mysqli_num_rows($checkIfUmuturageResult)==0)
            {
              echo "<td>Nta muturage urandikwa kuri iri sibo</td>";
            }

      echo "<td><a href='guhindura_isibo.php?isibo_id=$isiboID' class='btn btn-info btn-block'>Guhindura</a></td>";
      echo "<td><a href='gusiba.php?isibo_id=$isiboID' class='btn btn-danger btn-block'>Gusiba</a></td>";
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
