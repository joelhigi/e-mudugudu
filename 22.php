<!DOCTYPE html>
<?php
session_start();
  if(!isset($_SESSION['user_email']) || !isset($_GET['umuryango_id']))
  {
    header('Location:index.php');
  }


  else{
    $familyID = $_GET['umuryango_id'];
    require 'connection/connection.php';
    $get_status = "select * from umuryango where umuryango_id='$familyID'";
    $run_status = mysqli_query($connection,$get_status);
    $rowStatus = mysqli_fetch_array($run_status);
    $turakodesha = $rowStatus['status_tura_kodesha'];
    $uyobora = $rowStatus['umuryango_chef'];
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
          <h1 class="h3 mb-2 text-gray-800">Kwandika umunyamuryango wa <?php echo $uyobora; ?> muri sisiteme</h1>
          <p class="mb-4"><!-- DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the --> <a target="_blank" href="https://datatables.net">Umuturage Kw'isonga</a>.</p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <!-- <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Uzuza imyirondoro Y'umuturage utuye hano</h6>
            </div> -->
            <div class="card-body">

                  <form action="" method="post">
                  <!-- <div class="form-group control "col-md-6> -->

                  <div class="col-lg-10 col-md-10">
                  <label for="lname">Izina ry'umuryango</label>
                  <input type="text" class="form-control" name="lname" required></div>
                  <br>
                  <div class="col-lg-10 col-md-10">
                  <label for="fname">Andi mazina</label>
                  <input type="text" class="form-control" name="fname" required></div>
                  <br>
                  <div class="col-lg-10 col-md-10">
                  <label for="gender">Igitsina</label>
                  <select class="form-control" name="gender">
                    <option value="Gabo">Gabo</option>
                    <option value="Gore">Gore</option>
                  </select>
                </div>
                  <br>
                  <div class="container">
                    <div class="row">
                      <div class="col-xs-6">
                        <label for="nidConfirm">Afite Indangamuntu  </label>


                        <input type="radio" class="option-input radio" class="option-input radio"id="nidConfirm" value="indangamuntu" name="identify" checked="true">
                      </div>
                    </div>
                  </div>
                  <br>

                  <div class="container">
                    <div class="row">
                      <div class="col-xs-6">
                        <label for="passConfirm">Afite Pasiporo  </label>

                        <input type="radio" class="option-input radio" class="option-input radio"id="passConfirm" value="pasiporo" name="identify">
                      </div>
                    </div>
                  </div>
                  <br>
                  <div class="container">
                    <div class="row">
                      <div class="col-xs-6">
                        <label for="otherConfirm">Afite Ikindi kimuranga  </label>

                        <input type="radio" class="option-input radio" class="option-input radio" id="otherConfirm" value="ikindi" name="identify">
                      </div>
                    </div>
                  </div>
                  <br>
                  <div class="container">
                    <div class="row">
                      <div class="col-xs-6">
                        <label for="otherConfirm">Nta cyangombwa kimuranga afite  </label>

                        <input type="radio" class="option-input radio" class="option-input radio" id="noneConfirm" value="ntacyo" name="identify">
                      </div>
                    </div>
                  </div>
                  <br>
                  <div class="col-lg-10 col-md-10" id="nidDIV">
                  <label for="nid">Nimero y'Indangamuntu</label>
                  <input type="text" class="form-control" placeholder="" name="nid"><br></div>

                 <div class="col-lg-10 col-md-10" id="passDIV">
                  <label for="passport">Nimero ya Pasiporo</label>
                  <input type="text" class="form-control" placeholder="" name="passport"><br></div>

                 <div class="col-lg-10 col-md-10" id="otherDIV">
                  <label for="otherID">Nimero y'Ikindi cyangombwa</label>
                  <input type="text" class="form-control" placeholder="" name="otherID"><br></div>

                  <div class="col-lg-10 col-md-10" id="noneDIV">
                   <label for="noneID">Impamvu atagifite</label>
                   <input type="text" class="form-control" placeholder="" name="noneID"><br></div>

                  <script type="text/javascript">
                  $(document).ready(function () {

                      $('input[type="radio"]').click(function () {
                          if ($(this).attr("value") == "indangamuntu") {
                            $("#passDIV").hide('fast');
                            $("#otherDIV").hide('fast');
                            $("#noneDIV").hide('fast');
                            $("#nidDIV").show('fast');

                          }

                          if ($(this).attr("value") == "pasiporo") {
                            $("#nidDIV").hide('fast');
                            $("#otherDIV").hide('fast');
                            $("#noneDIV").hide('fast');
                            $("#passDIV").show('fast');


                          }


                          if ($(this).attr("value") == "ikindi") {
                            $("#passDIV").hide('fast');
                            $("#nidDIV").hide('fast');
                            $("#noneDIV").hide('fast');
                            $("#otherDIV").show('fast');


                          }


                          if ($(this).attr("value") == "ntacyo") {
                            $("#passDIV").hide('fast');
                            $("#nidDIV").hide('fast');
                            $("#otherDIV").hide('fast');
                            $("#noneDIV").show('fast');


                          }
                      });

                      $('input[type="radio"]').trigger('click');  // trigger the event
                  });</script>
                 <div class="col-lg-10 col-md-10">
                  <label for="dob">Itariki y'Amavuko</label>
                  <input type="date" class="form-control" placeholder="" name="dob" required></div>
                  <br>
                  <div class="col-lg-10 col-md-10">
                   <label for="tel">Nimero ya Telefone</label>
                   <input type="text" class="form-control" placeholder="" name="tel"></div>
                   <br>
                   <div class="col-lg-10 col-md-10">
                    <label for="country">Igihugu Akomokamo</label>
                    <input type="text" class="form-control" placeholder="" name="country" required></div>
                    <br>
                   <div class="col-lg-10 col-md-10">
                    <label for="profession">Icyo akora</label>
                    <input type="text" class="form-control" placeholder="" name="profession" required></div>
                    <br>
                    <div class="col-lg-10 col-md-10">
                     <label for="education">Amashuri Yize</label>
                     <input type="text" class="form-control" placeholder="" name="education" required></div>
                     <br>
                     <div class="col-lg-10 col-md-10">
                      <label for="relationship">Isano afitanye na Nyirurugo</label>
                      <input type="text" class="form-control" placeholder="" name="relationship" required></div>
                      <br>


                 <div class="col-lg-10 col-md-10">
                  <label for="insurance">Ubwishingizi</label>
                  <select name='insurance' class='form-control' required>";
                    <?php
                  $connect = new mysqli("localhost","root","","umudugudu",3306);
                  $queryUn = $connect -> query("SELECT `ubwisungane_name` FROM `ubwisungane` ORDER BY `ubwisungane_id` ASC");
                  $queryId = $connect -> query("SELECT `ubwisungane_id` FROM `ubwisungane` ORDER BY `ubwisungane_id` ASC");

                  $arrayUn = Array();
                  $arrayId = Array();
                  while($result = $queryUn -> fetch_assoc()){
                      $arrayUn[] = $result['ubwisungane_name'];
                  }
                  while($result = $queryId -> fetch_assoc()){
                      $arrayId[] = $result['ubwisungane_id'];
                  }
                  $size = sizeof($arrayId);
                  $sizeTemp = $size - 1;

                  for ($sizeTemp; $sizeTemp >=0; $sizeTemp--){
                      echo "<option value='$arrayId[$sizeTemp]'>$arrayUn[$sizeTemp]</option>";
                  }

                  ?>
                </select></div>
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
                  <label for="position">Inshingano</label>
                  <select name='position' class='form-control'>";
                    <?php
                  $connect = new mysqli("localhost","root","","umudugudu",3306);

                  $queryInshinganoId = $connect -> query("SELECT `inshingano_id` FROM `inshingano` ORDER BY `inshingano_id` ASC");
                  $queryInshinganoName = $connect -> query("SELECT `inshingano_name` FROM `inshingano` ORDER BY `inshingano_id` ASC");

                  $arrayInshinganoId = Array();
                  $arrayInshinganoName = Array();

                  while($result = $queryInshinganoId -> fetch_assoc()){
                      $arrayInshinganoId[] = $result['inshingano_id'];
                  }
                  while($result = $queryInshinganoName -> fetch_assoc()){
                      $arrayInshinganoName[] = $result['inshingano_name'];
                  }
                  $size = sizeof($arrayInshinganoId);
                  $sizeTemp = $size - 1;

                  for ($sizeTemp; $sizeTemp >=0; $sizeTemp--){
                      echo "<option value='$arrayInshinganoId[$sizeTemp]'>$arrayInshinganoName[$sizeTemp]</option>";
                  }

                  ?>
                </select></div>

                  <br>
                  <div class="col-md-2">
                  <input type="submit" value="Emeza" class="btn btn-block btn-primary" name="injiza"></div>
                </form>
                <?php
                  if(isset($_POST['injiza']))
                  {
                    $first_name = $_POST['fname'];
                    $last_name = $_POST['lname'];
                    $gender = $_POST['gender'];
                    $nid = $_POST['nid'];
                    $passport = $_POST['passport'];
                    $otherID = $_POST['otherID'];
                    $reason = $_POST['noneID'];
                    $dob = $_POST['dob'];
                    $tel = $_POST['tel'];
                    $country = $_POST['country'];
                    $profession = $_POST['profession'];
                    $education = $_POST['education'];
                    $relationship = $_POST['relationship'];
                    $insurance = $_POST['insurance'];
                    $family = $familyID;
                    $ubudehe = $_POST['ubudehe'];
                    $position = $_POST['position'];
                    $dateREG = date('Y-m-d H:i:s');

                    if($turakodesha=='Urakodesha'){
                      $existHead = mysqli_query($connection,"SELECT * FROM umuturage_ukodesha WHERE isano='$relationship'");
                      if(mysqli_num_rows($existHead)==0){
                        $exist = mysqli_query($connection,"SELECT * FROM umuturage_ukodesha WHERE umuryango_id ='$family' AND first_name = '$first_name' AND last_name='$last_name' AND dob='$dob'");
                        if(mysqli_num_rows($exist)==0){
                          $rrr = "SELECT * FROM umuturage_ukodesha WHERE umuryango_id =$family AND first_name = $first_name AND last_name=$last_name AND dob=$dob";
                          echo $rrr;
                          $insert = "INSERT INTO umuturage_ukodesha (first_name, last_name, gender, nid, passport_id, other_identification, impamvu_atagifite, dob, tel, nationality, icyo_akora, isano, amashuri_yize, ibyiciro_id, ubwisungane_id, umuryango_id, inshingano_id, reg_datetime)
                          VALUES ('$first_name','$last_name','$gender','$nid','$passport','$otherID','$reason','$dob','$tel','$country','$profession','$relationship','$education','$ubudehe','$insurance','$family','$position','$dateREG')";
                          $result = mysqli_query($connection,$insert);
                          if($result){
                            /*Swal*/

                           echo '
                            <script type="text/javascript">
                            swal.fire({
                             title: "Byakunze",
                             text: "Imyorondoro yageze  muri  sisiteme!.",
                             icon: "success",
                             timer: 89000
                             }).then(function() {
                              //  window.location.href = "kwinjiza_umuturage.php?umuryango_id='.$familyID.'";
                            });


                            </script>';
                         }
                         else{
                           echo '
                           <script type="text/javascript">
                           swal.fire({
                            title: "Biranze",
                            text: "Amakuru yanze kujya muri sisiteme",
                            icon: "error",
                            timer: 89000
                            }).then(function() {
                             //  window.location.href = "kwinjiza_umuturage.php?umuryango_id='.$familyID.'";
                           });


                           </script>';
                         }
                        }
                          else{
                            echo '
                             <script type="text/javascript">
                             swal.fire({
                              title: "Biranze",
                              text: "Uyu muturage yigeze kwandikwa, ari muri sisiteme",
                              icon: "error",
                              timer: 89000
                              }).then(function() {
                               //  window.location.href = "kwinjiza_umuturage.php?umuryango_id='.$familyID.'";
                             });


                             </script>';
                          }
                        }

                        else{
                          echo '
                           <script type="text/javascript">
                           swal.fire({
                            title: "Biranze",
                            text: "Uyu muryango ufite nyirurugo muri sisiteme",
                            icon: "error",
                            timer: 89000
                            }).then(function() {
                             //  window.location.href = "kwinjiza_umuturage.php?umuryango_id='.$familyID.'";
                           });


                           </script>';
                        }


                      }


                  else if($turakodesha=='Uratuye'){
                    $exist = mysqli_query($connection,"SELECT * FROM umuturage_utuye WHERE umuryango_id ='$family' AND first_name = '$first_name' AND last_name='$last_name' AND dob='$dob'");
                    if(mysqli_num_rows($exist)==0){
                      $insert = "INSERT INTO umuturage_utuye (first_name, last_name, gender, nid, passport_id, other_identification, impamvu_atagifite, dob, tel, nationality, icyo_akora, isano, amashuri_yize, ibyiciro_id, ubwisungane_id, umuryango_id, inshingano_id, reg_datetime)
                      VALUES ('$first_name','$last_name','$gender','$nid','$passport','$otherID','$reason','$dob','$tel','$country','$profession','$relationship','$education','$ubudehe','$insurance','$family','$position','$dateREG')";
                      $result = mysqli_query($connection,$insert);
                      if($result){
                        /*Swal*/

                       echo '
                        <script type="text/javascript">
                        swal.fire({
                         title: "Byakunze",
                         text: "Imyorondoro yageze muri sisiteme!.",
                         icon: "success",
                         timer: 89000
                         }).then(function() {
                          //  window.location.href = "kwinjiza_umuturage.php?umuryango_id='.$familyID.'";
                        });


                        </script>';
                      }
                      else{
                        echo '
                        <script type="text/javascript">
                        swal.fire({
                         title: "Biranze",
                         text: "Amakuru yanze kujya muri sisiteme",
                         icon: "error",
                         timer: 89000
                         }).then(function() {
                          //  window.location.href = "kwinjiza_umuturage.php?umuryango_id='.$familyID.'";
                        });


                        </script>';
                      }
                    }

                      else{
                        echo '
                         <script type="text/javascript">
                         swal.fire({
                          title: "Biranze",
                          text: "Uyu muturage yigeze kwandikwa, ari muri sisiteme",
                          icon: "error",
                          timer: 89000
                          }).then(function() {
                           //  window.location.href = "kwinjiza_umuturage.php?umuryango_id='.$familyID.'";
                         });


                         </script>';
                      }

              }
}
                ?>
              </div>
                </div>



                <div class="card shadow mb-4">
                  <div class="card-header py-3">
                    <h4 class="m-0 font-weight-bold text-primary">Lisiti y'abanyamuryango bo kwa <?php echo $uyobora; ?></h4>
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
                             <th>Icyo apfana na Nyirurugo</th>
                             <th>Numero Y'irangamuntu</th>
                             <th>Pasiporo</th>
                             <th>Ikindi cyangombwa</th>
                             <th>Impamvu atagifite</th>
                             <th>Telephone</th>
                             <th>Ubwenegihugu</th>
                             <th>Icyo akora</th>
                             <th>Amashuri yize</th>
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
                            <th>Igitsina</th>
                            <th>Itariki y'amavuko</th>
                            <th>Icyo apfana na Nyirurugo</th>
                            <th>Numero Y'irangamuntu</th>
                            <th>Pasiporo</th>
                            <th>Ikindi cyangombwa</th>
                            <th>Impamvu atagifite</th>
                            <th>Telephone</th>
                            <th>Ubwenegihugu</th>
                            <th>Icyo akora</th>
                            <th>Amashuri yize</th>
                            <th>Icyiciro cy'ubudehe</th>
                            <th>Ubwisungane</th>
                            <th>Igihe yandikiwe</th>
                          </tr>
                        </tfoot>
                        <tbody>
                           <?php


                           if($turakodesha=='Urakodesha'){
                              $sql="SELECT first_name,last_name,gender,nid,passport_id,other_identification,impamvu_atagifite,dob,tel,nationality,icyo_akora,isano,amashuri_yize,ibyiciro_name,ubwisungane_name,umuryango_chef,inshingano_name, umuturage_ukodesha.reg_datetime
                               FROM umuturage_ukodesha,ibyiciro,ubwisungane,umuryango,inshingano
                               WHERE ibyiciro.ibyiciro_id = umuturage_ukodesha.ibyiciro_id
                               AND ubwisungane.ubwisungane_id = umuturage_ukodesha.ubwisungane_id
                               AND umuryango.umuryango_id = umuturage_ukodesha.umuryango_id
                               AND inshingano.inshingano_id = umuturage_ukodesha.inshingano_id";
                             }

                            else if($turakodesha=='Uratuye')
                            {
                              $sql="SELECT first_name,last_name,gender,nid,passport_id,other_identification,impamvu_atagifite,dob,tel,nationality,icyo_akora,isano,amashuri_yize,ibyiciro_name,ubwisungane_name,umuryango_chef,inshingano_name, umuturage_utuye.reg_datetime
                               FROM umuturage_utuye,ibyiciro,ubwisungane,umuryango,inshingano
                               WHERE ibyiciro.ibyiciro_id = umuturage_utuye.ibyiciro_id
                               AND ubwisungane.ubwisungane_id = umuturage_utuye.ubwisungane_id
                               AND umuryango.umuryango_id = umuturage_utuye.umuryango_id
                               AND inshingano.inshingano_id = umuturage_utuye.inshingano_id";
                           }
      $result=mysqli_query($connection,$sql);
      $checkresult=mysqli_num_rows($result);
      if ($checkresult > 0) {
        while ($row=mysqli_fetch_array($result)) {
          echo"<tr>
                  <td>".$row['last_name']."</td>
                  <td>".$row['first_name']."</td>
                  <td>".$row['gender']."</td>
                  <td>".$row['dob']."</td>
                  <td>".$row['isano']."</td>
                  <td>".$row['nid']."</td>
                  <td>".$row['passport_id']."</td>
                  <td>".$row['other_identification']."</td>
                  <td>".$row['impamvu_atagifite']."</td>
                  <td>".$row['tel']."</td>
                  <td>".$row['nationality']."</td>
                  <td>".$row['icyo_akora']."</td>
                  <td>".$row['amashuri_yize']."</td>
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

</body>

</html>
