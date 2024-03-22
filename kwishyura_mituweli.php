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
  <link href="css/check.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="./css/style.css">
  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
   <script src="nocheck.js"></script>
   <script src="jquery-3.3.1.min.js"></script>
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
          <h1 class="h3 mb-2 text-gray-800">Kwandika ubwishyu bwa Mituweli muri sisiteme</h1>
          <p class="mb-4"><!-- DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the --> <a target="_blank" href="https://datatables.net">Umuturage Kw'isonga</a>.</p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <!-- <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Uzuza imyirondoro Y'umuturage utuye hano</h6>
            </div> -->
            <div class="card-body">

                  <form action="" method="post">
                    <div class="container">
                      <div class="row">
                        <div class="col-xs-6">
                          <input type="radio" class="option-input radio" id="familyConfirm" value="Family" name="famaid">
                          <label for="otherConfirm">Umuryango</label>
                        </div>
                      </div>
                    </div>
                    <br>
                    <div class="container">
                      <div class="row">
                        <div class="col-xs-6">
                          <input type="radio" class="option-input radio" id="maidConfirm" value="Maid" name="famaid">
                          <label for="otherConfirm">Umukozi wo mu rugo</label>
                        </div>
                      </div>
                    </div>
                    <br>

                    <div class="col-lg-10 col-md-10" id="family">
                     <label for="selectFamily">Umuryango</label>
                     <select name='selectFamily' class='form-control'>";
                       <?php
                     $connect = new mysqli("localhost","root","","umudugudu",3306);


                         $queryFamilyName = $connect -> query("SELECT `umuryango_chef` FROM `umuryango` WHERE `ubwisungane_id` = 2 ORDER BY `umuryango_id` ASC");
                         $queryFamilyId = $connect -> query("SELECT `umuryango_id` FROM `umuryango`  WHERE `ubwisungane_id` = 2 ORDER BY `umuryango_id` ASC");




                     $arrayFamilyName = Array();
                     $arrayFamilyId = Array();


                     while($result = $queryFamilyName -> fetch_assoc()){
                         $arrayFamilyName[] = $result['umuryango_chef'];
                     }
                     while($result = $queryFamilyId -> fetch_assoc()){
                         $arrayFamilyId[] = $result['umuryango_id'];
                     }
                     $size = sizeof($arrayFamilyId);
                     $sizeTemp = $size - 1;



                     for ($sizeTemp; $sizeTemp >=0; $sizeTemp--){
                       $ukodeshaId = $arrayFamilyId[$sizeTemp];

                         echo "<option value='$arrayFamilyId[$sizeTemp]'>$arrayFamilyName[$sizeTemp]</option>";




                     }



                     ?>
                   </select></div>

                   <br>

                   <div class="col-lg-10 col-md-10" id="umukozi">
                    <label for="selectMaid">Umukozi</label>
                    <select name='selectMaid' class='form-control'>";
                      <?php
                    $connect = new mysqli("localhost","root","","umudugudu",3306);


                        $queryMaidFName = $connect -> query("SELECT `first_name` FROM `umuturage` WHERE `isano` LIKE '%mukozi%'  AND `ubwisungane_id` = 2  ORDER BY `umuturage_id` ASC");
                        $queryMaidLName = $connect -> query("SELECT `last_name` FROM `umuturage` WHERE `isano` LIKE '%mukozi%'  AND `ubwisungane_id` = 2  ORDER BY `umuturage_id` ASC");
                        $queryMaidId = $connect -> query("SELECT `umuturage_id` FROM `umuturage` WHERE `isano` LIKE '%mukozi%'  AND `ubwisungane_id` = 2  ORDER BY `umuturage_id` ASC");




                    $arrayMaidFName = Array();
                    $arrayMaidLName = Array();
                    $arrayMaidId = Array();


                    while($result = $queryMaidFName -> fetch_assoc()){
                        $arrayMaidFName[] = $result['first_name'];
                    }

                    while($result = $queryMaidLName -> fetch_assoc()){
                        $arrayMaidLName[] = $result['last_name'];
                    }
                    while($result = $queryMaidId -> fetch_assoc()){
                        $arrayMaidId[] = $result['umuturage_id'];
                    }
                    $size = sizeof($arrayMaidId);
                    $sizeTemp = $size - 1;




                    for ($sizeTemp; $sizeTemp >=0; $sizeTemp--){
                      $ukodeshaId = $arrayMaidId[$sizeTemp];
                      $famCheck = "SELECT `umuryango_id` FROM `umuturage` WHERE `umuturage_id` = ".$arrayMaidId[$sizeTemp]." ORDER BY `umuryango_id` ASC";
                      $famCheckQuery = mysqli_query($connection,$famCheck);
                      $famCheckArray = mysqli_fetch_array($famCheckQuery);
                      $famID = $famCheckArray['umuryango_id'];
                      $famNameQuery = mysqli_query($connection,"SELECT `umuryango_chef` FROM `umuryango` WHERE `umuryango_id` = $famID");
                      $famNameArray = mysqli_fetch_array($famNameQuery);
                      $famName = $famNameArray['umuryango_chef'];
                      $ukodeshaId = $arrayMaidId[$sizeTemp];
                      $sql = "SELECT `umuturage_id` FROM `umuturage` WHERE `isano` LIKE '%mukozi%' ORDER BY `umuturage_id` ASC";
                      $sqlQuery = mysqli_query($connection,$sql);
                      if(mysqli_num_rows($sqlQuery)>0){

                        echo "<option value='$arrayMaidId[$sizeTemp]'>$arrayMaidFName[$sizeTemp] $arrayMaidLName[$sizeTemp] (Umukozi w'umuryango wa $famName)</option>";
                      }
                    }



                    ?>
                  </select></div>
                  <script type="text/javascript">
                  $(document).ready(function () {

                      $('input[type="radio"]').click(function () {
                          if ($(this).attr("value") == "Family") {
                            $("#umukozi").hide('fast');
                            $("#family").show('fast');


                          }

                          else if ($(this).attr("value") == "Maid"){
                            $("#family").hide('fast');
                            $("#umukozi").show('fast');


                          }
                      });

                      $('input[type="radio"]').trigger('click');  // trigger the event
                  });
                  </script>
                  <br>


                  <div class="col-lg-10 col-md-10">
                    <label for="year">Umwaka w'ubwishyu</label>
                    <select class="form-control" name="year">
                      <option value="2019-2020">2019-2020</option>
                      <option value="2020-2021">2020-2021</option>
                      <option value="2021-2022">2021-2022</option>
                      <option value="2022-2023">2022-2023</option>
                      <option value="2023-2024">2023-2024</option>
                      <option value="2024-2025">2024-2025</option>
                      <option value="2025-2026">2025-2026</option>
                      <option value="2026-2027">2026-2027</option>
                      <option value="2027-2028">2027-2028</option>
                    </select>
                  </div>
                  <br>


                  <div class="container">
                    <div class="row">
                      <div class="col-xs-6">
                        <input type="radio" class="option-input radio" id="kwishyuraConfirm" value="Yego" name="pay">
                        <label for="otherConfirm">Yarishyuye</label>
                      </div>
                    </div>
                  </div>
                  <br>
                  <div class="container">
                    <div class="row">
                      <div class="col-xs-6">
                        <input type="radio" class="option-input radio" id="brokeConfirm" value="Oya" name="pay">
                        <label for="otherConfirm">Ntabwo arishyura</label>
                      </div>
                    </div>
                  </div>
                  <br>

                  <div class="col-lg-10 col-md-10" id="placediv">
                  <label for="lname">Aho yishyuriwe</label>
                  <input type="text" class="form-control" name="place"></div>
                  <br>

                  <div class="col-lg-10 col-md-10" id="reasondiv">
                  <label for="lname">Impamvu atarishyura</label>
                  <input type="text" class="form-control" name="reason"></div>
                  <br>

                  <script type="text/javascript">
                  $(document).ready(function () {

                      $('input[type="radio"]').click(function () {
                          if ($(this).attr("value") == "Yego") {
                            $("#reasondiv").hide('fast');
                            $("#placediv").show('fast');


                          }

                          else if ($(this).attr("value") == "Oya"){
                            $("#placediv").hide('fast');
                            $("#reasondiv").show('fast');


                          }
                      });

                      $('input[type="radio"]').trigger('click');  // trigger the event
                  });
                  </script>



                  <button type="submit" class="btn btn-primary m-2" name="injiza">Emeza</button>

                </form>
                <?php
                  if(isset($_POST['injiza']))
                  {
                    $debugCount = 0;
                      $year = $_POST['year'];


                    if($_POST['famaid']=='Family'){
                      $niceFam = array();
                      $FamilyID = $_POST['selectFamily'];
                      $memberCheckSql = "SELECT umuturage_id FROM umuturage WHERE umuryango_id = $FamilyID AND isano NOT LIKE '%mukozi%' AND ubwisungane_id = 2";
                      $memberCheckQuery = mysqli_query($connection,$memberCheckSql);
                      while($memberCheckArray = mysqli_fetch_array($memberCheckQuery))
                      {
                        array_push($niceFam,$memberCheckArray);
                      }
                      $sizeFam = sizeof($niceFam);
                      $sizeFamTemp = $sizeFam - 1;

                      if($_POST['pay']=='Yego'){
                        $reason = "-";
                        $place = $_POST['place'];




                        for($sizeFamTemp;$sizeFamTemp>=0;$sizeFamTemp--){
                          $now = $niceFam[$sizeFamTemp][0];
                          $payCheckSql = "SELECT * FROM ubwishyu_mituweli WHERE umuturage_id = $now AND umwaka_yishyuriye = '".$year."'";
                          $payCheckQuery = mysqli_query($connection,$payCheckSql);
                          if(mysqli_num_rows($payCheckQuery)==0){
                            $insertSql = "INSERT INTO ubwishyu_mituweli (umuturage_id,aho_yishyuriye,umwaka_yishyuriye,impamvu_atishyuye) VALUES ('$now','$place','$year','$reason')";
                            $insertQuery = mysqli_query($connection,$insertSql);
                            if(!$insertQuery){
                              $debugCount = $debugCount + 1;
                            }
                          }
                          else if(mysqli_num_rows($payCheckQuery)>0){
                               echo '
                                 <script type="text/javascript">
                                 swal.fire({
                                  title: "Biranze",
                                  text: "Ayo makuru asanzwe ari muri sisiteme",
                                  icon: "error",
                                  timer: 89000
                                  }).then(function() {
                                   //  window.location.href = "umuturage.php";
                                });


                                </script>';
                          }
                        }
                        if($debugCount!=0){
                             echo '
                               <script type="text/javascript">
                               swal.fire({
                                title: "Biranze",
                                text: "Amakuru yanze kujya muri sisiteme",
                                icon: "error",
                                timer: 89000
                                }).then(function() {
                                 //  window.location.href = "umuturage.php";
                              });


                              </script>';
                        }
                        else if($debugCount==0){
                             echo '
                                <script type="text/javascript">
                                swal.fire({
                                 title: "Byakunze",
                                 text: "Imyorondoro yageze muri sisiteme!.",
                                 icon: "success",
                                 timer: 89000
                                 }).then(function() {
                                    //window.location.href = "abitabye_imana_data.php";
                                });
                                </script>';
                        }
                       }

                      else if($_POST['pay']=='Oya'){
                        $reason = $_POST['reason'];
                        $place = "-";

                        for($sizeFamTemp;$sizeFamTemp>=0;$sizeFamTemp--){
                          $now = $niceFam[$sizeFamTemp][0];
                          $payCheckSql = "SELECT * FROM ubwishyu_mituweli WHERE umuturage_id = $now AND umwaka_yishyuriye = '".$year."'";
                          $payCheckQuery = mysqli_query($connection,$payCheckSql);
                          if(mysqli_num_rows($payCheckQuery)==0){
                            $insertSql = "INSERT INTO ubwishyu_mituweli (umuturage_id,aho_yishyuriye,umwaka_yishyuriye,impamvu_atishyuye) VALUES ('$now','$place','$year','$reason')";
                            $insertQuery = mysqli_query($connection,$insertSql);
                            if(!$insertQuery){
                              $debugCount = $debugCount + 1;
                            }
                          }
                          else if(mysqli_num_rows($payCheckQuery)>0){
                               echo '
                                 <script type="text/javascript">
                                 swal.fire({
                                  title: "Biranze",
                                  text: "Ayo makuru asanzwe ari muri sisiteme",
                                  icon: "error",
                                  timer: 89000
                                  }).then(function() {
                                   //  window.location.href = "umuturage.php";
                                });


                                </script>';
                          }
                        }
                        if($debugCount!=0){
                             echo '
                               <script type="text/javascript">
                               swal.fire({
                                title: "Biranze",
                                text: "Amakuru yanze kujya muri sisiteme",
                                icon: "error",
                                timer: 89000
                                }).then(function() {
                                 //  window.location.href = "umuturage.php";
                              });


                              </script>';
                        }
                        else if($debugCount!=0){
                             echo '
                                <script type="text/javascript">
                                swal.fire({
                                 title: "Byakunze",
                                 text: "Imyorondoro yageze muri sisiteme!.",
                                 icon: "success",
                                 timer: 89000
                                 }).then(function() {
                                    //window.location.href = "abitabye_imana_data.php";
                                });
                                </script>';
                        }
                      }

                    }

                    else if($_POST['famaid']=='Maid'){
                      $niceMaid = array();
                      $MaidID = $_POST['selectMaid'];
                      $maidCheckSql = "SELECT umuturage_id FROM umuturage WHERE umuturage_id = $MaidID AND isano LIKE '%mukozi%'";
                      $maidCheckQuery = mysqli_query($connection,$maidCheckSql);
                      while($maidCheckArray = mysqli_fetch_array($maidCheckQuery))
                      {
                        array_push($niceMaid,$maidCheckArray);
                      }
                      $sizeFam = sizeof($niceMaid);
                      $sizeFamTemp = $sizeFam - 1;

                      if($_POST['pay']=='Yego'){
                        $reason = "-";
                        $place = $_POST['place'];




                        for($sizeFamTemp;$sizeFamTemp>=0;$sizeFamTemp--){
                          $now = $niceMaid[$sizeFamTemp][0];
                          $payCheckSql = "SELECT * FROM ubwishyu_mituweli WHERE umuturage_id = $now AND umwaka_yishyuriye = '".$year."'";
                          $payCheckQuery = mysqli_query($connection,$payCheckSql);
                          if(mysqli_num_rows($payCheckQuery)==0){
                            $insertSql = "INSERT INTO ubwishyu_mituweli (umuturage_id,aho_yishyuriye,umwaka_yishyuriye,impamvu_atishyuye) VALUES ('$now','$place','$year','$reason')";
                            $insertQuery = mysqli_query($connection,$insertSql);
                            if(!$insertQuery){
                              $debugCount = $debugCount + 1;
                            }
                          }
                          else if(mysqli_num_rows($payCheckQuery)>0){
                               echo '
                                 <script type="text/javascript">
                                 swal.fire({
                                  title: "Biranze",
                                  text: "Ayo makuru asanzwe ari muri sisiteme",
                                  icon: "error",
                                  timer: 89000
                                  }).then(function() {
                                   //  window.location.href = "umuturage.php";
                                });


                                </script>';
                          }
                        }
                        if($debugCount!=0){
                             echo '
                               <script type="text/javascript">
                               swal.fire({
                                title: "Biranze",
                                text: "Amakuru yanze kujya muri sisiteme",
                                icon: "error",
                                timer: 89000
                                }).then(function() {
                                 //  window.location.href = "umuturage.php";
                              });


                              </script>';
                        }
                        else if($debugCount==0){
                             echo '
                                <script type="text/javascript">
                                swal.fire({
                                 title: "Byakunze",
                                 text: "Imyorondoro yageze muri sisiteme!.",
                                 icon: "success",
                                 timer: 89000
                                 }).then(function() {
                                    //window.location.href = "abitabye_imana_data.php";
                                });
                                </script>';
                        }
                       }

                      else if($_POST['pay']=='Oya'){
                        $reason = $_POST['reason'];
                        $place = "-";

                        for($sizeFamTemp;$sizeFamTemp>=0;$sizeFamTemp--){
                          $now = $niceMaid[$sizeFamTemp][0];
                          $payCheckSql = "SELECT * FROM ubwishyu_mituweli WHERE umuturage_id = $now AND umwaka_yishyuriye = '".$year."'";

                          $payCheckQuery = mysqli_query($connection,$payCheckSql);
                          if(mysqli_num_rows($payCheckQuery)==0){
                            $insertSql = "INSERT INTO ubwishyu_mituweli (umuturage_id,aho_yishyuriye,umwaka_yishyuriye,impamvu_atishyuye) VALUES ('$now','$place','$year','$reason')";
                            $insertQuery = mysqli_query($connection,$insertSql);
                            if(!$insertQuery){
                              $debugCount = $debugCount + 1;
                            }
                          }
                          else if(mysqli_num_rows($payCheckQuery)>0){
                               echo '
                                 <script type="text/javascript">
                                 swal.fire({
                                  title: "Biranze",
                                  text: "Ayo makuru asanzwe ari muri sisiteme",
                                  icon: "error",
                                  timer: 89000
                                  }).then(function() {
                                   //  window.location.href = "umuturage.php";
                                });


                                </script>';
                          }
                        }
                        if($debugCount!=0){
                             echo '
                               <script type="text/javascript">
                               swal.fire({
                                title: "Biranze",
                                text: "Amakuru yanze kujya muri sisiteme",
                                icon: "error",
                                timer: 89000
                                }).then(function() {
                                 //  window.location.href = "umuturage.php";
                              });


                              </script>';
                        }
                        else if($debugCount!=0){
                             echo '
                                <script type="text/javascript">
                                swal.fire({
                                 title: "Byakunze",
                                 text: "Imyorondoro yageze muri sisiteme!.",
                                 icon: "success",
                                 timer: 89000
                                 }).then(function() {
                                    //window.location.href = "abitabye_imana_data.php";
                                });
                                </script>';
                        }
                      }

                    }


                            // if($resultB)
                            // {
                            //   echo '
                            //    <script type="text/javascript">
                            //    swal.fire({
                            //     title: "Byakunze",
                            //     text: "Imyorondoro yageze muri sisiteme!.",
                            //     icon: "success",
                            //     timer: 89000
                            //     }).then(function() {
                            //        window.location.href = "abitabye_imana_data.php";
                            //    });
                            //    </script>';
                            // }
                            // else{
                            //   echo '
                            //   <script type="text/javascript">
                            //   swal.fire({
                            //    title: "Biranze",
                            //    text: "Amakuru yanze kujya muri sisiteme",
                            //    icon: "error",
                            //    timer: 89000
                            //    }).then(function() {
                            //     //  window.location.href = "umuturage.php";
                            //   });
                            //
                            //
                            //   </script>';
                            //  }
                            // }
                            // /*Swal*/
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
