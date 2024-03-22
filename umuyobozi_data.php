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
              <h4 class="m-0 font-weight-bold text-primary">Lisiti y'abayobozi b'umudugudu bose</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                     <tr>
                       <th>Izina ry'umuryango</th>
                       <th>Izina rindi</th>
                       <th>Inshingano afite mu mudugudu</th>
                       <th>Igitsina</th>
                       <th>Itariki y'amavuko</th>
                       <th>Numero Y'irangamuntu</th>
                       <th>Telephone</th>
                       <th>Icyo akora</th>
                       <th>Icyiciro cy'ubudehe</th>
                       <th>Ubwisungane</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <tr>
                        <th>Izina ry'umuryango</th>
                        <th>Izina rindi</th>
                        <th>Inshingano afite mu mudugudu</th>
                        <th>Igitsina</th>
                        <th>Itariki y'amavuko</th>
                        <th>Numero Y'irangamuntu</th>
                        <th>Telephone</th>
                        <th>Icyo akora</th>
                        <th>Icyiciro cy'ubudehe</th>
                        <th>Ubwisungane</th>
                    </tr>
                  </tfoot>
                  <tbody>
                     <?php
      $sql="SELECT first_name,last_name,gender,nid,dob,tel,icyo_akora,ibyiciro_name,ubwisungane_name,umuturage.inshingano_id,inshingano2_id,inshingano3_id
       FROM umuturage,ibyiciro,ubwisungane,umuryango,inshingano
       WHERE ibyiciro.ibyiciro_id = umuturage.ibyiciro_id
       AND ubwisungane.ubwisungane_id = umuturage.ubwisungane_id
       AND umuryango.umuryango_id = umuturage.umuryango_id
       AND inshingano.inshingano_id = umuturage.inshingano_id
       AND (umuturage.inshingano_id != 1 OR umuturage.inshingano2_id != 1 OR umuturage.inshingano3_id != 1)";

$result=mysqli_query($connection,$sql);
$checkresult=mysqli_num_rows($result);
if ($checkresult > 0) {
  while ($row=mysqli_fetch_array($result)) {
    echo"<tr>
            <td>".$row['last_name']."</td>
            <td>".$row['first_name']."</td>";

            $pos = Array();
            $where = Array();
            $inshing1 = $row['inshingano_id'];
            $inshing2 = $row['inshingano2_id'];
            $inshing3 = $row['inshingano3_id'];
            if($inshing1!=1){
              $check1 = mysqli_query($connection,"SELECT inshingano_name,aho_bireba FROM inshingano WHERE inshingano_id = $inshing1");
              $check1Arr = mysqli_fetch_assoc($check1);
              $name1 = $check1Arr['inshingano_name'];
              $where1 =$check1Arr['aho_bireba'];
              array_push($pos,$name1);
              array_push($where,$where1);
            }
            if($inshing2!=1){
              $check2 = mysqli_query($connection,"SELECT inshingano_name,aho_bireba FROM inshingano WHERE inshingano_id = $inshing2");
              $check2Arr = mysqli_fetch_assoc($check2);
              $name2 = $check2Arr['inshingano_name'];
              $where2 =$check2Arr['aho_bireba'];
              array_push($pos,$name2);
              array_push($where,$where2);
            }
            if($inshing3!=1){
              $check3 = mysqli_query($connection,"SELECT inshingano_name,aho_bireba FROM inshingano WHERE inshingano_id = $inshing3");
              $check3Arr = mysqli_fetch_assoc($check3);
              $name3 = $check3Arr['inshingano_name'];
              $where3 =$check3Arr['aho_bireba'];
              array_push($pos,$name3);
              array_push($where,$where3);
            }
          $count = sizeof($pos);
            $countTemp = $count-1;

          echo "<td>";

          for($countTemp;$countTemp>=0;$countTemp--){
            $realname = $pos[$countTemp];
            $realwhere = $where[$countTemp];
            echo "$realname ($realwhere)";
            if($countTemp!=0){
              echo ", ";
            }
          }

          echo"</td>";


            echo "<td>".$row['gender']."</td>
            <td>".$row['dob']."</td>
            <td>".$row['nid']."</td>
            <td>".$row['tel']."</td>
            <td>".$row['icyo_akora']."</td>
            <td>".$row['ibyiciro_name']."</td>
            <td>".$row['ubwisungane_name']."</td>
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
