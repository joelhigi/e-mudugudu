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
          <h1 class="h3 mb-2 text-gray-800">KWINJIZA INZU MURI SISITEME</h1>
          <p class="mb-4"><!-- DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the --> .</p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <!-- <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Uzuza imyirondoro Y'umuturage utuye hano</h6>
            </div> -->
            <div class="card-body">

                  <form action="" method="post">
                  <!-- <div class="form-group control "col-md-6> -->


                 <div class="col-lg-10 col-md-10">
                  <label for="ownername">Nimero y'Inzu mu Gipangu</label>
                  <input type="text" class="form-control" placeholder="" name="ownername" required></div>
                  <br>

                  <div class="col-lg-10 col-md-10">
                    <label for="status">Iratuwe cyangwa irakodeshwa</label>
                    <select class="form-control" name="status">
                      <option value="Iratuwe">Iratuwe</option>
                      <option value="Irakodeshwa">Irakodeshwa</option>
                    </select>
                  </div>

                  <br>

                  <div class="col-lg-10 col-md-10">
                   <label for="igipangu">Igipangu</label>
                   <select name='igipangu' class='form-control'>";
                     <?php
                   $connect = new mysqli("localhost","root","","umudugudu",3306);

                   $queryInzuId = $connect -> query("SELECT `igipangu_id` FROM `igipangu` ORDER BY `igipangu_id` ASC");
                   $queryInzuName = $connect -> query("SELECT `owner_name` FROM `igipangu` ORDER BY `igipangu_id` ASC");
                   $queryInzuAddress = $connect -> query("SELECT `address_code` FROM `igipangu` ORDER BY `igipangu_id` ASC");

                   $arrayInzuId = Array();
                   $arrayInzuName = Array();
                   $arrayInzuAdrress = Array();

                   while($result = $queryInzuId -> fetch_assoc()){
                       $arrayInzuId[] = $result['igipangu_id'];
                   }
                   while($result = $queryInzuName -> fetch_assoc()){
                       $arrayInzuName[] = $result['owner_name'];
                   }
                   while($result = $queryInzuAddress -> fetch_assoc()){
                       $arrayInzuAddress[] = $result['address_code'];
                   }
                   $size = sizeof($arrayInzuId);
                   $sizeTemp = $size - 1;

                   for ($sizeTemp; $sizeTemp >=0; $sizeTemp--){
                       echo "<option value='$arrayInzuId[$sizeTemp]'>Igipangu cya $arrayInzuName[$sizeTemp] (Kode: $arrayInzuAddress[$sizeTemp])</option>";
                   }

                   ?>
                 </select></div>

                   <br>

                   <div class="col-lg-10 col-md-10">
                    <label for="inzudata">Andi makuru</label>
                    <input type="text" class="form-control" placeholder="" name="inzudata"></div>
                    <br>

                  <div class="col-md-2">
                  <input type="submit" value="Emeza" class="btn btn-block btn-primary" name="injiza"></div>
                </form>
                <?php
                  if(isset($_POST['injiza']))
                  {
                    $ownername = $_POST['ownername'];
                    $igipangu = $_POST['igipangu'];
                    $inzudata = $_POST['inzudata'];
                    $status = $_POST['status'];
                    $dateREG = date('Y-m-d H:i:s');

                    $insert = "INSERT INTO inzu (igipangu_id,status_turwa_kodeshwa,owner_name,inzu_details,reg_datetime)
                    VALUES ('$igipangu','$status','$ownername','$inzudata','$dateREG')";
                    $result = mysqli_query($connection,$insert);
                    if($result){
                      /*Hano */

                                       echo '
                            <script type="text/javascript">
                            swal.fire({
                             title: "Byakunze",
                             text: "Inzu yageze muri sisiteme.",
                             icon: "success",
                             timer: 89000
                             }).then(function() {
                              //  window.location.href = "./amatables/inzu_data.php";
                            });


                            </script>';
                    }
                  }

                ?>
                </div>
                </div>

                <div class="card shadow mb-4">
                  <div class="card-header py-3">
                    <h4 class="m-0 font-weight-bold text-primary">Lisiti y'amazu yose ari mu mudugudu</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                              <th>Nimero y'Inzu</th>
                              <th>Nimero y'Igipangu</th>
                              <th>Icyo yagenewe</th>
                              <th>Igikorerwamo</th>
                              <th>Umuryango utuyemo</th>
                              <th>Guhindura amakuru</th>
                              <th>Gusiba</th>
                            </tr>
                        </thead>
                        <tfoot>
                          <tr>
                            <th>Nimero y'Inzu</th>
                            <th>Nimero y'Igipangu</th>
                            <th>Icyo yagenewe</th>
                            <th>Igikorerwamo</th>
                            <th>Umuryango utuyemo</th>
                            <th>Guhindura amakuru</th>
                            <th>Gusiba</th>
                          </tr>
                        </tfoot>
                        <tbody>
                           <?php
            $sql="SELECT inzu.inzu_id,inzu.owner_name, igipangu.address_code, status_turwa_kodeshwa, inzu_details
            FROM igipangu,inzu
            WHERE igipangu.igipangu_id = inzu.igipangu_id";


      $result=mysqli_query($connection,$sql);
      $checkresult=mysqli_num_rows($result);
      if ($checkresult > 0) {
        while ($row=mysqli_fetch_array($result)) {
          $houseID = $row['inzu_id'];
          echo"<tr>";
          echo"<td>".$row['owner_name']."</td>";
          echo"<td>".$row['address_code']."</td>";
          echo"<td>".$row['status_turwa_kodeshwa']."</td>";
          echo"<td>".$row['inzu_details']."</td>";

          $resultAdd=mysqli_query($connection,"SELECT * FROM nyirinzu WHERE inzu_id = $houseID");
          if(mysqli_num_rows($resultAdd)>0)
          {
            $famid = mysqli_fetch_array($resultAdd);
            if(is_null($famid['umuryango_id'])){
              echo "<td>Nta muryango ubamo</td>";
              echo"<td><a href='guhindura_inzu.php?inzu_id=$houseID' class='btn btn-warning btn-block'>Guhindura</a></td>";
            }
            else
            {$famidid = $famid['umuryango_id'];
            $famnamez = mysqli_fetch_array(mysqli_query($connection,"SELECT * FROM umuryango WHERE umuryango_id = $famidid"));

            $nameee = $famnamez['umuryango_chef'];
            echo"<td>".$nameee."</td>";
            echo"<td><a href='guhindura_inzu.php?inzu_id=$houseID' class='btn btn-warning btn-block'>Guhindura</a></td>";
          }

          }
          else if(mysqli_num_rows($resultAdd)==0)
          {
            echo"<td><a href='abatuye_inzu.php?inzu_id=$houseID' class='btn btn-primary'>Ongeramo andi makuru</a></td>";
            echo"<td><button class='btn btn-secondary btn-block'>Banza ushiremo umuryango</button></td>";

          }

          echo"<td><a href='gusiba.php?inzu_id=$houseID' class='btn btn-danger btn-block'>Gusiba</a></td>";
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
