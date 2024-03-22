<!DOCTYPE html>
<?php
session_start();
  if(!isset($_SESSION['user_email']) || !isset($_GET['igipangu_id']))
  {
    header('Location:index.php');
  }
else{
  require 'connection/connection.php';
  $igipanguID = $_GET['igipangu_id'];
  $get_name = "select * from igipangu where igipangu_id='$igipanguID'";
  $run_name = mysqli_query($connection,$get_name);
  $rowName = mysqli_fetch_array($run_name);
  $isibo = $rowName['isibo_id'];
  $ownername = $rowName['owner_name'];
  $pangudata = $rowName['address_code'];
  $details = $rowName['additional_details'];
  $get_pangu = "select * from andi_makuru_igipangu where igipangu_id='$igipanguID'";
  $run_pangu = mysqli_query($connection,$get_pangu);
  $rowPangu = mysqli_fetch_array($run_pangu);
  $akarima=$rowPangu['akarima_k_igikoni'];
  $water_tank=$rowPangu['ikigega_cy_amazi'];
  $water=$rowPangu['amazi'];
  $electricity=$rowPangu['amashanyarazi'];
  $water_hole=$rowPangu['icyobo_cy_amazi'];
  $toilet=$rowPangu['ubwiherero'];
  $pavuma=$rowPangu['pavuma'];
  $safetylight=$rowPangu['itara_ry_umutekano'];
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
          <h1 class="h3 mb-2 text-gray-800">GUHINDURA IGIPANGU MURI SISITEME</h1>
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
                  <label for="ownername">Amazina yombi ya Nyirigipangu</label>
                  <input type="text" class="form-control" placeholder="" value="<?php echo $ownername;?>" name="ownername" required></div>
                  <br>

                  <div class="col-lg-10 col-md-10">
                   <label for="isibo">Isibo</label>
                   <select name='isibo' class='form-control'>";
                     <?php
                   $connect = new mysqli("localhost","root","","umudugudu",3306);

                   $queryIsiboId = $connect -> query("SELECT `isibo_id` FROM `isibo` ORDER BY `isibo_id` ASC");
                   $queryIsiboName = $connect -> query("SELECT `isibo_name` FROM `isibo` ORDER BY `isibo_id` ASC");

                   $arrayIsiboId = Array();
                   $arrayIsiboName = Array();

                   while($result = $queryIsiboId -> fetch_assoc()){
                       $arrayIsiboId[] = $result['isibo_id'];
                   }
                   while($result = $queryIsiboName -> fetch_assoc()){
                       $arrayIsiboName[] = $result['isibo_name'];
                   }
                   $size = sizeof($arrayIsiboId);
                   $sizeTemp = $size - 1;

                   for ($sizeTemp; $sizeTemp >=0; $sizeTemp--){
                       echo "<option value='$arrayIsiboId[$sizeTemp]'";
                       if($isibo==$arrayIsiboId[$sizeTemp])
                       {
                         echo " selected";
                       }
                       echo ">$arrayIsiboName[$sizeTemp]</option>";
                   }

                   ?>
                 </select></div>

                   <br>


                   <div class="col-lg-10 col-md-10">
                    <label for="pangucode">Kode ya Aderesi</label>
                    <input type="text" class="form-control" placeholder="" value="<?php echo $pangudata;?>" name="pangucode"></div>
                    <br>

                   <div class="col-lg-10 col-md-10">
                    <label for="pangudata">Andi makuru</label>
                    <input type="text" class="form-control" placeholder="" value="<?php echo $details;?>" name="pangudata"></div>
                    <br>


                    <!-- <div class="form-group control "col-md-6> -->

                    <!-- WHAT AMMA BE USIN -->







                  <div class="col-lg-10 col-md-10">
                    <label for="akarima">Akarima k'igikoni</label>
                    <select class="form-control" name="akarima">
                      <option value="Yego" <?php if($akarima=='Yego'){echo " selected";}?>>Yego</option>
                      <option value="Oya" <?php if($akarima=='Oya'){echo " selected";}?>>Oya</option>
                    </select>
                  </div>

                  <br>

                  <div class="col-lg-10 col-md-10">
                    <label for="water">Amazi (WASAC)</label>
                    <select class="form-control" name="water">
                      <option value="Yego" <?php if($water=='Yego'){echo " selected";}?>>Yego</option>
                      <option value="Oya" <?php if($water=='Oya'){echo " selected";}?>>Oya</option>
                    </select>
                  </div>

                  <br>

                  <div class="col-lg-10 col-md-10">
                    <label for="water_tank">Ikigega cy'amazi</label>
                    <select class="form-control" name="water_tank">
                      <option value="Yego" <?php if($water_tank=='Yego'){echo " selected";}?>>Yego</option>
                      <option value="Oya" <?php if($water_tank=='Oya'){echo " selected";}?>>Oya</option>
                    </select>
                  </div>

                  <br>

                  <div class="col-lg-10 col-md-10">
                    <label for="water_hole">Icyobo cy'amazi</label>
                    <select class="form-control" name="water_hole">
                      <option value="Yego" <?php if($water_hole=='Yego'){echo " selected";}?>>Yego</option>
                      <option value="Oya" <?php if($water_hole=='Oya'){echo " selected";}?>>Oya</option>
                    </select>
                  </div>

                  <br>

                  <div class="col-lg-10 col-md-10">
                    <label for="electricity">Amashanyarazi</label>
                    <select class="form-control" name="electricity">
                      <option value="Yego" <?php if($electricity=='Yego'){echo " selected";}?>>Yego</option>
                      <option value="Oya" <?php if($electricity=='Oya'){echo " selected";}?>>Oya</option>
                    </select>
                  </div>

                  <br>

                  <div class="col-lg-10 col-md-10">
                    <label for="toilet">Ubwiherero</label>
                    <input type="textarea" rows="4" class="form-control" value="<?php echo $toilet;?>" name="toilet" required>
                  </div>

                  <br>



                  <div class="col-lg-10 col-md-10">
                    <label for="pavement">Pavuma</label>
                    <select class="form-control" name="pavement">
                      <option value="Yego" <?php if($pavuma=='Yego'){echo " selected";}?>>Yego</option>
                      <option value="Oya" <?php if($pavuma=='Oya'){echo " selected";}?>>Oya</option>
                    </select>
                  </div>

                  <br>

                  <div class="col-lg-10 col-md-10">
                    <label for="safetylight">Itara ry'umutekano</label>
                    <select class="form-control" name="safetylight">
                      <option value="Yego" <?php if($safetylight=='Yego'){echo " selected";}?>>Yego</option>
                      <option value="Oya" <?php if($safetylight=='Oya'){echo " selected";}?>>Oya</option>
                    </select>
                  </div>
                  <br>



                    <!-- END FORM -->



                  <button type="submit" class="btn btn-primary m-2" name="injiza">Emeza</button><button onclick="<?php echo"window.location.href='kwinjiza_igipangu_runaka.php?isibo_id=$isiboID'";?>" type="button" class="btn btn-danger m-2" name="inyuma">Subira inyuma</button>


                </form>
                <?php

                  if(isset($_POST['injiza']))
                  {
                    $ownername = $_POST['ownername'];
                    $isibo = $_POST['isibo'];
                    $pangudata = $_POST['pangudata'];
                    $details = $_POST['pangucode'];
                    $akarima = $_POST['akarima'];
                    $water = $_POST['water'];
                    $water_tank = $_POST['water_tank'];
                    $water_hole = $_POST['water_hole'];
                    $electricity = $_POST['electricity'];
                    $toilet = $_POST['toilet'];
                    $toilet = str_replace("'", "''", $toilet);
                    $pavement = $_POST['pavement'];
                    $safetylight = $_POST['safetylight'];
                    $check = mysqli_query($connection, "SELECT * FROM igipangu WHERE address_code='$details'");
                    $fetchID = mysqli_fetch_array($check);
                    $specificID = $fetchID['address_code'];

                    if((mysqli_num_rows($check)==0)||((mysqli_num_rows($check)>0)&&($specificID==$details))){

                      $update = "UPDATE igipangu
                                  SET isibo_id='$isibo',owner_name='$ownername',address_code='$details',additional_details='$pangudata'
                                  WHERE igipangu_id='$igipanguID'";
                      $update2 = "UPDATE andi_makuru_igipangu
                                  SET akarima_k_igikoni='$akarima', ikigega_cy_amazi='$water_tank', amazi='$water', amashanyarazi='$electricity', icyobo_cy_amazi='$water_hole', ubwiherero='$toilet', pavuma='$pavuma', itara_ry_umutekano='$safetylight'
                                  WHERE igipangu_id='$igipanguID'";
                      $result = mysqli_query($connection,$update);
                      $result2 = mysqli_query($connection,$update2);
                      if(($result)&&($result2)){

                       /*Swal*/

                        echo '
                            <script type="text/javascript">
                            swal.fire({
                             title: "Byakunze",
                             text: "Amakuru mashya yageze muri sisiteme.",
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
                             text: "Amakuru mashya ntabwo yageze muri sisiteme.",
                             icon: "error",
                             timer: 89000
                             }).then(function() {
                                // window.location.href = "./amatables/igipangu_data.php";
                            });
                            </script>';
                      }
                    }
                    else{
                      echo '
                          <script type="text/javascript">
                          swal.fire({
                           title: "Byanze",
                           text: "Hari igipangu muri sisiteme gifite iyo kode ya aderesi.",
                           icon: "error",
                           timer: 89000
                           }).then(function() {
                              // window.location.href = "./amatables/igipangu_data.php";
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
