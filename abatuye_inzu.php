<!DOCTYPE html>
<?php
session_start();
  if(!isset($_SESSION['user_email']) || !isset($_GET['inzu_id']))
  {
    header('Location:index.php');
  }
else{
  require 'connection/connection.php';
    $houseID = $_GET['inzu_id'];
    $get_pangu = "select * from inzu where inzu_id='$houseID'";
    $run_pangu = mysqli_query($connection,$get_pangu);
    $rowPangu = mysqli_fetch_array($run_pangu);
    $igipanguID = $rowPangu['igipangu_id'];
    $inzuName = $rowPangu['owner_name'];
    $status = $rowPangu['status_turwa_kodeshwa'];

    $get_pangu = "select * from nyirinzu where inzu_id='$houseID'";
    $run_pangu = mysqli_query($connection,$get_pangu);
    if(mysqli_num_rows($run_pangu)>0){
      echo "<script>window.location.href='kwinjiza_inzu_runaka.php?igipangu_id=$igipanguID'";
    }
    else{
    $rowPangu = mysqli_fetch_array($run_pangu);
    $nyirinzuId = $rowPangu['umuturage_id'];
    $ukodeshaId = $rowPangu['umuryango_id'];
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
  <link href="css/check.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="./css/style.css">

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
   <script src="nocheck.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
   <script src="js/swal.js"></script>
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
          <h1 class="h3 mb-2 text-gray-800">UMURYANGO UBARIZWA MURI IYI NZU (<?php echo "Inzu ya $inzuName, $status";?>)</h1>
          <p class="mb-4"><!-- DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the --> .</p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <!-- <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Uzuza imyirondoro Y'umuturage utuye hano</h6>
            </div> -->
            <div class="card-body">

                  <form action="" method="post">
                  <!-- <div class="form-group control "col-md-6> -->


              <div id="ukodeshaDIV">
                <div class="col-lg-10 col-md-10">
                 <label for="selectOwner">Nyirinzu</label>
                 <select name='selectOwner' class='form-control'>";
                   <?php
                 $connect = new mysqli("localhost","root","","umudugudu",3306);
                 $queryUtuyeFn = $connect -> query("SELECT `first_name` FROM `umuturage` WHERE TIMESTAMPDIFF(YEAR, dob, now()) >= 18 ORDER BY `umuturage_id`");
                 $queryUtuyeLn = $connect -> query("SELECT `last_name` FROM `umuturage` WHERE TIMESTAMPDIFF(YEAR, dob, now()) >= 18 ORDER BY `umuturage_id`");
                 $queryUtuyeId = $connect -> query("SELECT `umuturage_id` FROM `umuturage` WHERE TIMESTAMPDIFF(YEAR, dob, now()) >= 18 ORDER BY `umuturage_id`");


                 $arrayUtuyeFn = Array();
                 $arrayUtuyeLn = Array();
                 $arrayUtuyeId = Array();

                 while($result = $queryUtuyeFn -> fetch_assoc()){
                     $arrayUtuyeFn[] = $result['first_name'];
                 }
                 while($result = $queryUtuyeLn -> fetch_assoc()){
                     $arrayUtuyeLn[] = $result['last_name'];
                 }
                 while($result = $queryUtuyeId -> fetch_assoc()){
                     $arrayUtuyeId[] = $result['umuturage_id'];
                 }
                 $size = sizeof($arrayUtuyeId);
                 $sizeTemp = $size - 1;

                 for ($sizeTemp; $sizeTemp >=0; $sizeTemp--){
                   $utuyeId = $arrayUtuyeId[$sizeTemp];

                     echo "<option value='$arrayUtuyeId[$sizeTemp]'";
                     if($nyirinzuId==$arrayUtuyeId[$sizeTemp]){echo " selected";}
                     echo">$arrayUtuyeLn[$sizeTemp] $arrayUtuyeFn[$sizeTemp]</option>";
                 }

                 ?>
               </select></div>


               <br>

                 <div class="col-lg-10 col-md-10">
                  <label for="selectUbamo">Umuryango uba muri iyi nzu</label>
                  <select name='selectUbamo' class='form-control'>";
                    <?php
                  $connect = new mysqli("localhost","root","","umudugudu",3306);
                  if($status == "Iratuwe"){
                    $queryUkodeshaLn = $connect -> query("SELECT `umuryango_chef` FROM `umuryango` WHERE `status_tura_kodesha` ='Uratuye' ORDER BY `umuryango_id` ASC");
                    $queryUkodeshaId = $connect -> query("SELECT `umuryango_id` FROM `umuryango` WHERE `status_tura_kodesha` ='Uratuye' ORDER BY `umuryango_id` ASC");
                  }
                  else if($status == "Irakodeshwa"){
                      $queryUkodeshaLn = $connect -> query("SELECT `umuryango_chef` FROM `umuryango` WHERE `status_tura_kodesha` ='Urakodesha' ORDER BY `umuryango_id` ASC");
                      $queryUkodeshaId = $connect -> query("SELECT `umuryango_id` FROM `umuryango` WHERE `status_tura_kodesha` ='Urakodesha' ORDER BY `umuryango_id` ASC");
                    }



                  $arrayUkodeshaLn = Array();
                  $arrayUkodeshaId = Array();


                  while($result = $queryUkodeshaLn -> fetch_assoc()){
                      $arrayUkodeshaLn[] = $result['umuryango_chef'];
                  }
                  while($result = $queryUkodeshaId -> fetch_assoc()){
                      $arrayUkodeshaId[] = $result['umuryango_id'];
                  }
                  $size = sizeof($arrayUkodeshaId);
                  $sizeTemp = $size - 1;
                  if(mysqli_num_rows($queryUkodeshaId)==0)
                  {
                    echo "<option value='nope'>Nta barengeje imyaka 18 bari muri sisiteme, murabanza mubongeremo</option>";
                  }

                  else{
                  for ($sizeTemp; $sizeTemp >=0; $sizeTemp--){
                    $ukodeshaId = $arrayUkodeshaId[$sizeTemp];
                    $sql = "SELECT * FROM nyirinzu WHERE umuryango_id = $ukodeshaId";
                    if(mysqli_num_rows($sql)==0){
                      echo "<option value='$arrayUkodeshaId[$sizeTemp]'>$arrayUkodeshaLn[$sizeTemp]</option>";
                    }



                  }
                  echo "<option value='NULL'>Nta muryango ubamo ubu</option>";

                }
                  ?>
                </select></div>



              </div>



                <br>
                <hr>





                  <!-- END FORM -->


                  <button type="submit" class="btn btn-primary m-2" name="injiza">Emeza</button><button onclick="<?php echo"window.location.href='kwinjiza_inzu_runaka.php?igipangu_id=$igipanguID'";?>" type="button" class="btn btn-danger m-2" name="inyuma">Subira inyuma</button>
                </form>
                <?php


                  if(isset($_POST['injiza']))
                  {



                      $nyirinzu = $_POST['selectOwner'];
                      $umuryangoID = $_POST['selectUbamo'];


                      if ($umuryangoID != 'NULL'){
                        $insert1 = "INSERT INTO nyirinzu (inzu_id,umuturage_id,umuryango_id) VALUES ('$houseID','$nyirinzu','$umuryangoID')";
                      }
                      else{
                        $insert1 = "INSERT INTO nyirinzu (inzu_id,umuturage_id,umuryango_id) VALUES ('$houseID','$nyirinzu',NULL)";
                      }




                      $check = "SELECT * FROM nyirinzu WHERE inzu_id = $houseID";
                      $checkresult = mysqli_query($connection,$check);
                      if(mysqli_num_rows($checkresult)==0){
                        $result1 = mysqli_query($connection,$insert1);


                        if($result1){

                          echo '
                             <script type="text/javascript">
                             swal.fire({
                              title: "Byakunze",
                              text: "Amakuru y'."'".'Inzu yageze muri sisiteme.",
                              icon: "success",
                              timer: 89000
                              }).then(function() {
                                window.history.go(-2);
                             });


                             </script>';

                        }
                        else{
                          echo '
                          <script type="text/javascript">
                          swal.fire({
                           title: "Byanze",
                           text: '."Amakuru y'inzu ntabwo yageze muri sisiteme.".',
                           icon: "error",
                           timer: 89000
                           }).then(function() {
                            // window.location.href = "kwinjiza_inzu_runaka.php?igipangu_id='.$igipanguID.'";
                          });


                          </script>';
                        }
                      }
                      else{
                        echo '
                        <script type="text/javascript">
                        swal.fire({
                         title: "Byanze",
                         text: '."Iyi nzu isanzwe ifite amakuru muri sisiteme.".',
                         icon: "error",
                         timer: 89000
                         }).then(function() {
                          // window.location.href = "kwinjiza_inzu_runaka.php?igipangu_id='.$igipanguID.'";
                        });


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
