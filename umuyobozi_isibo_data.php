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
              <h4 class="m-0 font-weight-bold text-primary">Lisiti y'abayobozi b'amasibo bo muri uyu mudugudu</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                     <tr>
                       <th>Izina ry'umuryango</th>
                       <th>Izina rindi</th>
                       <th>Inshingano afite</th>
                       <th>Isibo ayobora</th>
                       <th>Igitsina</th>
                       <th>Itariki y'amavuko</th>
                       <th>Numero Y'irangamuntu</th>
                       <th>Telephone</th>
                       <th>Icyo akora</th>
                       <th>Icyiciro cy'ubudehe</th>
                       <th>Ubwisungane</th>
                       <th>Igihe yandikiwe</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <tr>
                        <th>Izina ry'umuryango</th>
                        <th>Izina rindi</th>
                        <th>Inshingano afite</th>
                        <th>Isibo ayobora</th>
                        <th>Igitsina</th>
                        <th>Itariki y'amavuko</th>
                        <th>Numero Y'irangamuntu</th>
                        <th>Telephone</th>
                        <th>Icyo akora</th>
                        <th>Icyiciro cy'ubudehe</th>
                        <th>Ubwisungane</th>
                        <th>Igihe yandikiwe</th>
                    </tr>
                  </tfoot>
                  <tbody>
                     <?php
      $sql="SELECT umuturage_id,first_name,last_name,gender,nid,dob,tel,icyo_akora,ibyiciro_name,ubwisungane_name,inshingano.inshingano_name, umuturage.reg_datetime
       FROM umuturage,ibyiciro,ubwisungane,umuryango,inshingano
       WHERE ibyiciro.ibyiciro_id = umuturage.ibyiciro_id
       AND ubwisungane.ubwisungane_id = umuturage.ubwisungane_id
       AND umuryango.umuryango_id = umuturage.umuryango_id
       AND (inshingano.inshingano_id = umuturage.inshingano_id OR inshingano.inshingano_id = umuturage.inshingano2_id OR inshingano.inshingano_id = umuturage.inshingano3_id)
       AND inshingano.aho_bireba = 'Isibo'";

$result=mysqli_query($connection,$sql);
$checkresult=mysqli_num_rows($result);
if ($checkresult > 0) {
  while ($row=mysqli_fetch_array($result)) {
    $umuturageID = $row['umuturage_id'];
    echo"<tr>
            <td>".$row['last_name']."</td>
            <td>".$row['first_name']."</td>
            <td>".$row['inshingano_name']."</td>";
            $siboSql = mysqli_query($connection,"SELECT * FROM umuyobozi_isibo WHERE umuturage_id='$umuturageID'");
            if(mysqli_num_rows($siboSql)==0){
              echo "<td><a class='btn btn-info btn-block' href='umuyobozi_isibo.php?umuturage_id=$umuturageID'>Kumuha Isibo</a></td>";
            }
            else{
              $rowIsibo=mysqli_fetch_array($siboSql);
              $isiboid=$rowIsibo['isibo_id'];
              $getisiboname = mysqli_query($connection,"SELECT * FROM isibo WHERE isibo_id = $isiboid");
              $isibonamearray = mysqli_fetch_array($getisiboname);
              $realSiboName = $isibonamearray['isibo_name'];
              echo "<td>".$realSiboName."</td>";
            }
            echo "<td>".$row['gender']."</td>
            <td>".$row['dob']."</td>
            <td>".$row['nid']."</td>
            <td>".$row['tel']."</td>
            <td>".$row['icyo_akora']."</td>
            <td>".$row['ibyiciro_name']."</td>
            <td>".$row['ubwisungane_name']."</td>
            <td>".$row['reg_datetime']."</td>
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
