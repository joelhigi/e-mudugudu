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

  <title><E-mudugu></title>

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

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
              <h4 class="m-0 font-weight-bold text-primary">Lisiti y'ibipangu byose byo mu mudugudu</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                      <tr>
                        <th>Nyirigipangu</th>
                        <th>Isibo</th>
                        <th>Kode ya Aderesi</th>
                        <th>Icyo hakoreshwa</th>
                        <th>Umubare w'amazu aba mu gipangu</th>
                        <th>Guhindura amakuru</th>
                        <th>Gusiba Igipangu</th>

                      </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Nyirigipangu</th>
                      <th>Isibo</th>
                      <th>Kode ya Aderesi</th>
                      <td>Icyo hakoreshwa</td>
                      <th>Umubare w'amazu aba mu gipangu</th>
                      <th>Andi makuru</th>
                      <th>Gusiba Igipangu</th>

                    </tr>
                  </tfoot>
                  <tbody>
                     <?php
      $sql="SELECT igipangu_id,isibo_name,owner_name,address_code,additional_details,igipangu.reg_datetime FROM igipangu, isibo WHERE igipangu.isibo_id = isibo.isibo_id";


$result=mysqli_query($connection,$sql);
$checkresult=mysqli_num_rows($result);
if ($checkresult > 0) {
  while ($row=mysqli_fetch_array($result)) {
    echo"<tr>";
          echo"<td>".$row['owner_name']."</td>";
          echo"<td>".$row['isibo_name']."</td>";
          echo"<td>".$row['address_code']."</td>";
          echo"<td>".$row['additional_details']."</td>";
            $igipanguID = $row['igipangu_id'];
            $checkIfInzuResult = mysqli_query($connection,"SELECT * FROM inzu WHERE igipangu_id = $igipanguID");
            $checkIfAndiResult = mysqli_query($connection,"SELECT * FROM andi_makuru_igipangu WHERE igipangu_id = $igipanguID");

            if(mysqli_num_rows($checkIfInzuResult)>0)
            {
              $countResult=mysqli_query($connection,"SELECT count(*) as total from inzu WHERE igipangu_id = $igipanguID");
              $all=mysqli_fetch_assoc($countResult);
              $amazu = $all['total'];
              echo "<td>$amazu</td>";
            }

            else if(mysqli_num_rows($checkIfInzuResult)==0)
            {
              echo "<td>Nta nzu zirandikwa kuri iki gipangu</td>";
            }
            
            if(mysqli_num_rows($checkIfAndiResult)>0)
            {
              echo"<td><a href='guhindura_igipangu.php?igipangu_id=$igipanguID' class='btn btn-warning btn-block'>Reba / Hindura amakuru</a></td>";
            }
            else if(mysqli_num_rows($checkIfAndiResult)==0)
            {
              echo"<td><a href='andi_makuru_igipangu.php?igipangu_id=$igipanguID' class='btn btn-info btn-block'>Ongeraho andi makuru</a></td>";
            }

            echo"<td><a href='gusiba.php?igipangu_id=$igipanguID' class='btn btn-danger btn-block'>Gusiba</a></td>";

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
