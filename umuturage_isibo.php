<!DOCTYPE html>
<?php
session_start();
  if(!isset($_SESSION['user_email'])||!isset($_GET['isibo_id']))
  {
    header('Location:index.php');
  }
else{
  require 'connection/connection.php';
  $isiboID = $_GET['isibo_id'];
  $get_pangu = "select * from isibo where isibo_id='$isiboID'";
  $run_pangu = mysqli_query($connection,$get_pangu);
  $rowPangu = mysqli_fetch_array($run_pangu);
  $isiboName = $rowPangu['isibo_name'];
}
?>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Amakuru y'abaturage</title>

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
              <h4 class="m-0 font-weight-bold text-primary">Lisiti y'abaturage bose batuye mw'isibo <?php echo $isiboName;?></h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                     <tr>
                       <th>Izina ry'umuryango</th>
                       <th>Izina rindi</th>
                       <th>Igitsina</th>
                       <th>Itariki y'amavuko</th>
                       <th>Umuryango akomokamo</th>
                       <th>Niba atuye cyangwa akodesha</th>
                       <th>Telephone</th>
                       <th>Igihugu akomokamo</th>
                       <th>Ubwenegihugu</th>
                       <th>Icyo akora</th>
                       <th>Inzu</th>
                       <th>Igipangu</th>
                       <th>Hindura amakuru</th>
                       <th>Siba umuturage</th>
                       <th>Kwitaba Imana</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <tr>
                      <th>Izina ry'umuryango</th>
                      <th>Izina rindi</th>
                      <th>Igitsina</th>
                      <th>Itariki y'amavuko</th>
                      <th>Umuryango akomokamo</th>
                      <th>Niba atuye cyangwa akodesha</th>
                      <th>Telephone</th>
                      <th>Igihugu akomokamo</th>
                      <th>Ubwenegihugu</th>
                      <th>Icyo akora</th>
                      <th>Inzu</th>
                      <th>Igipangu</th>
                      <th>Hindura amakuru</th>
                      <th>Siba umuturage</th>
                      <th>Kwitaba Imana</th>
                    </tr>
                  </tfoot>
                  <tbody>
                     <?php
      $sql="SELECT umuturage.umuturage_id as id, umuturage.first_name as first, umuturage.last_name as last, umuturage.gender as sex, umuturage.dob as dob, umuturage.status_tura_kodesha as status, umuturage.tel as tel,
      umuturage.umuryango_id, umuryango.umuryango_id, umuryango.umuryango_chef as head, umuturage.icyo_akora as job,
      umuturage.nationality as nationality, umuturage.country as country,
      nyirinzu.umuryango_id, nyirinzu.inzu_id, inzu.inzu_id, inzu.owner_name as code, inzu.igipangu_id,
      igipangu.address_code as address, igipangu.igipangu_id, igipangu.isibo_id, isibo.isibo_id, isibo.isibo_name as isibo
      FROM umuturage,umuryango,nyirinzu,inzu,igipangu,isibo WHERE umuturage.umuryango_id = umuryango.umuryango_id
      AND umuturage.umuryango_id = nyirinzu.umuryango_id
      AND nyirinzu.inzu_id = inzu.inzu_id
      AND inzu.igipangu_id = igipangu.igipangu_id
      AND igipangu.isibo_id = isibo.isibo_id
      AND isibo.isibo_id = $isiboID";

$result=mysqli_query($connection,$sql);
$checkresult=mysqli_num_rows($result);
if ($checkresult > 0) {
  while ($row=mysqli_fetch_array($result)) {
    $umuturage = $row['id'];
    echo"<tr>
            <td>".$row['last']."</td>
            <td>".$row['first']."</td>
            <td>".$row['sex']."</td>
            <td>".$row['dob']."</td>
            <td>".$row['head']."</td>
            <td>".$row['status']."</td>
            <td>".$row['tel']."</td>
            <td>".$row['country']."</td>
            <td>".$row['nationality']."</td>
            <td>".$row['job']."</td>
            <td>".$row['code']."</td>
            <td>".$row['address']."</td>";



            echo "<td><a class='btn btn-warning btn-block' href='guhindura_umuturage.php?umuturage_id=".$row['id']."'>Guhindura amakuru</a></td>";
            echo "<td><a href='gusiba.php?umuturage_id=$umuturage' class='btn btn-danger'>Gusiba</a></td>";

            echo "<td><a href='kwitaba_imana.php?umuturage_id=$umuturage' class='btn btn-danger btn-block'>Yitabye Imana</a></td>
          </tr>";


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
