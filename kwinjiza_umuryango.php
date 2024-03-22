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
          <h1 class="h3 mb-2 text-gray-800">UMWIRONDORO W'UMURYANGO</h1>
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
                  <label for="dob">Amazina yombi y'uyobora umuryango</label>
                  <input type="text" class="form-control" placeholder="" name="chefname" required></div>
                  <br>

                  <div class="col-lg-10 col-md-10">
                    <label for="status">Uyu muryango uratuye cyangwa urakodesha?</label>
                    <select class="form-control" name="status">
                      <option value="Uratuye">Uratuye</option>
                      <option value="Urakodesha">Urakodesha</option>
                    </select>
                  </div>
                  <br>

                  <div class="col-lg-10 col-md-10">
                   <label for="ubudehe">Icyiciro cy'Ubudehe</label>
                   <select name='ubudehe' class='form-control'>";
                     <?php
                   $connect = new mysqli("localhost","root","","umudugudu",3306);

                   $queryIbyiciroId = $connect -> query("SELECT `ibyiciro_id` FROM `ibyiciro` ORDER BY `ibyiciro_id` ASC");
                   $queryIbyiciroName = $connect -> query("SELECT `ibyiciro_name` FROM `ibyiciro` ORDER BY `ibyiciro_id` ASC");

                   $arrayIbyiciroId = Array();
                   $arrayIbyiciroName = Array();

                   while($result = $queryIbyiciroId -> fetch_assoc()){
                       $arrayIbyiciroId[] = $result['ibyiciro_id'];
                   }
                   while($result = $queryIbyiciroName -> fetch_assoc()){
                       $arrayIbyiciroName[] = $result['ibyiciro_name'];
                   }
                   $arrayIbyiciroName = array_reverse($arrayIbyiciroName);
                   $arrayIbyiciroId = array_reverse($arrayIbyiciroId);
                   $size = sizeof($arrayIbyiciroId);
                   $sizeTemp = $size - 1;

                   for ($sizeTemp; $sizeTemp >=0; $sizeTemp--){
                       echo "<option value='$arrayIbyiciroId[$sizeTemp]'>$arrayIbyiciroName[$sizeTemp]</option>";
                   }

                   ?>
                 </select></div>
                 <br>

                 <div class="col-lg-10 col-md-10">
                  <label for="ubwisungane">Ubwisungane</label>
                  <select name='ubwisungane' class='form-control'>";
                    <?php
                  $connect = new mysqli("localhost","root","","umudugudu",3306);

                  $queryUbwisunganeId = $connect -> query("SELECT `ubwisungane_id` FROM `ubwisungane` ORDER BY `ubwisungane_id` ASC");
                  $queryUbwisunganeName = $connect -> query("SELECT `ubwisungane_name` FROM `ubwisungane` ORDER BY `ubwisungane_id` ASC");

                  $arrayUbwisunganeId = Array();
                  $arrayUbwisunganeName = Array();

                  while($result = $queryUbwisunganeId -> fetch_assoc()){
                      $arrayUbwisunganeId[] = $result['ubwisungane_id'];
                  }
                  while($result = $queryUbwisunganeName -> fetch_assoc()){
                      $arrayUbwisunganeName[] = $result['ubwisungane_name'];
                  }
                  $arrayUbwisunganeName = array_reverse($arrayUbwisunganeName);
                  $arrayUbwisunganeId = array_reverse($arrayUbwisunganeId);
                  $size = sizeof($arrayUbwisunganeId);
                  $sizeTemp = $size - 1;

                  for ($sizeTemp; $sizeTemp >=0; $sizeTemp--){
                      echo "<option value='$arrayUbwisunganeId[$sizeTemp]'>$arrayUbwisunganeName[$sizeTemp]</option>";
                  }

                  ?>
                </select></div>
                <br>

                <button type="submit" class="btn btn-primary m-2" name="injiza">Emeza</button>
                </form>
                <?php
                  if(isset($_POST['injiza']))
                  {
                    $chefname = $_POST['chefname'];
                    $ubudehe = $_POST['ubudehe'];
                    $date = date('Y-m-d H:i:s');
                    $status = $_POST['status'];
                    $health = $_POST['ubwisungane'];

                    $insert = "INSERT INTO umuryango (umuryango_chef,reg_datetime,status_tura_kodesha,ibyiciro_id,ubwisungane_id)
                    VALUES ('$chefname','$date','$status','$ubudehe','$health')";
                    $result = mysqli_query($connection,$insert);
                    if($result){
                      /*Swal*/

                      echo '
                        <script type="text/javascript">
                        swal.fire({
                         title: "Byakoze",
                         text: "Amakuru yageze muri sisiteme.",
                         icon: "success",
                         timer: 89000
                         }).then(function() {
                          //  window.location.href = "kwinjiza_umuryango.php";
                        });


                        </script>';

                    }
                    else{
                      echo '
                        <script type="text/javascript">
                        swal.fire({
                         title: "Byanze",
                         text: "Amakuru ntabwo yageze muri sisiteme.",
                         icon: "error",
                         timer: 89000
                         }).then(function() {
                          //  window.location.href = "kwinjiza_umuryango.php";
                        });


                        </script>';
                    }
                  }

                ?>
              </div>
                </div>

                <div class="card shadow mb-4">
                  <div class="card-header py-3">
                    <h4 class="m-0 font-weight-bold text-primary">Lisiti y'imiryango yose yo mu mudugudu</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                          <tr>
                            <th>Nyirurugo</th>
                            <th>Umubare w'abagize umuryango</th>
                            <th>Icyiciro cy'ubudehe</th>
                            <th>Uratuye cyangwa Urakodesha?</th>
                            <th>Itariki wabaruwe</th>
                            <th>Abanyamuryango</th>
                            <th>Andi makuru</th>
                            <th>Siba Umuryango</th>
                          </tr>
                        </thead>
                        <tfoot>
                          <tr>
                            <th>Nyirurugo</th>
                            <th>Umubare w'abagize umuryango</th>
                            <th>Icyiciro cy'ubudehe</th>
                            <th>Uratuye cyangwa Urakodesha?</th>
                            <th>Itariki wabaruwe</th>
                            <th>Abanyamuryango</th>
                            <th>Andi makuru</th>
                            <th>Siba Umuryango</th>
                          </tr>
                        </tfoot>
                        <tbody>
                           <?php
                             $sql="SELECT umuryango_id, umuryango_chef, ibyiciro_name, reg_datetime, status_tura_kodesha FROM umuryango, ibyiciro WHERE umuryango.ibyiciro_id = ibyiciro.ibyiciro_id";


                              $result=mysqli_query($connection,$sql);
                              $checkresult=mysqli_num_rows($result);
                              if ($checkresult > 0) {
                                while ($row=mysqli_fetch_array($result)) {
                                  echo"<tr>
                                          <td>".$row['umuryango_chef']."</td>";
                                          $familyID = $row['umuryango_id'];
                                          $checkIfResult = mysqli_query($connection,"SELECT * FROM umuturage WHERE umuryango_id = $familyID");

                                          if(mysqli_num_rows($checkIfResult)>0)
                                          {
                                            $countResult=mysqli_query($connection,"SELECT count(*) as total from umuturage WHERE umuryango_id = $familyID");
                                            $all=mysqli_fetch_assoc($countResult);
                                            $abanyamuryango = $all['total'];
                                            echo "<td>$abanyamuryango</td>";
                                          }

                                          else if(mysqli_num_rows($checkIfResult)==0)
                                          {
                                            echo "<td>Nta banyamuryango barashirwa muri sisiteme</td>";
                                          }
                                    echo "<td>".$row['ibyiciro_name']."</td>";
                                    echo "<td>".$row['status_tura_kodesha']."</td>";
                                    echo "<td>".$row['reg_datetime']."</td>";
                                    echo "<td><a class='btn btn-success' href='kwinjiza_umuturage.php?umuryango_id=$familyID'>Abanyamuryango</a></td>";
                                    $resultAdd=mysqli_query($connection,"SELECT * FROM andi_makuru_umuryango WHERE umuryango_id = $familyID");
                                    if(mysqli_num_rows($resultAdd)>0)
                                    {

                                      echo"<td><a href='guhindura_umuryango.php?umuryango_id=$familyID' class='btn btn-primary btn-block'>Andi makuru</a></td>";
                                      echo"<td><a href='gusiba.php?umuryango_id=$familyID' class='btn btn-danger btn-block'>Siba</a></td>";
                                    }
                                    else if(mysqli_num_rows($resultAdd)==0)
                                    {
                                      echo"<td><a href='andi_makuru_umuryango.php?umuryango_id=$familyID' class='btn btn-info btn-block'>Ongeramo andi makuru</a></td>";

                                      echo"<td><a href='gusiba.php?umuryango_id=$familyID' class='btn btn-danger btn-block'>Siba</a></td>";
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
            </div>







      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; E-Mudugudu <?php echo date('Y');?></span>
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
