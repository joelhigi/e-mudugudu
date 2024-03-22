<!DOCTYPE html>
<?php
session_start();
  if(!isset($_SESSION['user_email']) || (!isset($_GET['umuturage_id'])))
  {
    header('Location:index.php');
  }
else{
  require 'connection/connection.php';
  if(isset($_GET['umuturage_id'])){
    $umuturageID = $_GET['umuturage_id'];
    $sql = "SELECT * FROM umuturage WHERE umuturage_id = '$umuturageID'";


  }
  $run_status = mysqli_query($connection,$sql);
  $rowStatus = mysqli_fetch_array($run_status);
  $first_name = $rowStatus['first_name'];
  $last_name = $rowStatus['last_name'];
  $gender = $rowStatus['gender'];
  $nid = $rowStatus['nid'];
  $dad = $rowStatus['umuturage_dad'];
  $mum = $rowStatus['umuturage_mum'];
  $passport = $rowStatus['passport_id'];
  $otherID = $rowStatus['other_identification'];
  $reason = $rowStatus['impamvu_atagifite'];
  $reason = str_replace("'", "''", $reason);
  $dob = $rowStatus['dob'];
  $tel = $rowStatus['tel'];
  $nationality = $rowStatus['nationality'];
  $country = $rowStatus['country'];
  $profession = $rowStatus['icyo_akora'];
  $education = $rowStatus['amashuri_yize'];
  $relationship = $rowStatus['isano'];
  $ubumugastatus = $rowStatus['ubumuga_status'];
  $ubumugatype = $rowStatus['ubumuga_details'];
  $prisonstatus = $rowStatus['gufungwa_status'];
  if(strcasecmp($relationship,'nyirurugo')==0){
    $pass = 1;
  }
  else{
    $pass = 0;
  }
  $insurance = $rowStatus['ubwisungane_id'];
  $family = $rowStatus['umuryango_id'];
  $ubudehe = $rowStatus['ibyiciro_id'];
  $isib = 0;
  $position = $rowStatus['inshingano_id'];
  $assoc1 = mysqli_query($connection,"SELECT aho_bireba FROM inshingano WHERE inshingano_id = $position");
  $array1 = mysqli_fetch_assoc($assoc1);

  $name1 = $array1['aho_bireba'];
  if($name1 == 'Isibo'){$isib = 1;}
  $position2 = $rowStatus['inshingano2_id'];
  $assoc2 = mysqli_query($connection,"SELECT aho_bireba FROM inshingano WHERE inshingano_id = $position2");
  $array2 = mysqli_fetch_assoc($assoc2);
  $name2 = $array2['aho_bireba'];
  if($name2 == 'Isibo'){$isib = 1;}
  $position3 = $rowStatus['inshingano3_id'];
  $assoc3 = mysqli_query($connection,"SELECT aho_bireba FROM inshingano WHERE inshingano_id = $position3");
  $array3 = mysqli_fetch_assoc($assoc3);
  $name3 = $array3['aho_bireba'];
  if($name3 == 'Isibo'){$isib = 1;}
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
          <h1 class="h3 mb-2 text-gray-800">GUHINDURA AMAKURU Y'UMUTURAGE</h1>
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
                  <input type="text" class="form-control" placeholder="Kalisa" name="lname" value='<?php echo $last_name;?>' required></div>
                  <br>
                  <div class="col-lg-10 col-md-10">
                  <label for="fname">Andi mazina</label>
                  <input type="text" class="form-control" placeholder="Hamza" name="fname" value='<?php echo $first_name;?>' required></div>
                  <br>
                  <div class="col-lg-10 col-md-10">
                  <label for="gender">Igitsina</label>
                  <select class="form-control" name="gender">
                    <option value="Gabo"<?php if($gender=='Gabo'){echo "selected";}?>>Gabo</option>
                    <option value="Gore"<?php if($gender=='Gore'){echo "selected";}?>>Gore</option>
                  </select>
                </div>
                  <br>
                  <div class="container">
                    <div class="row">
                      <div class="col-xs-6">
                        <input type="radio" class="option-input radio" id="nidConfirm" value="indangamuntu" name="identify" checked="true">
                        <label for="nidConfirm">Afite Indangamuntu  </label>
                      </div>
                    </div>
                  </div>
                  <br>

                  <div class="container">
                    <div class="row">
                      <div class="col-xs-6">
                        <input type="radio" class="option-input radio" id="passConfirm" value="pasiporo" name="identify">
                        <label for="passConfirm">Afite Pasiporo  </label>
                      </div>
                    </div>
                  </div>
                  <br>
                  <div class="container">
                    <div class="row">
                      <div class="col-xs-6">
                        <input type="radio" class="option-input radio" id="otherConfirm" value="ikindi" name="identify">
                        <label for="otherConfirm">Afite Ikindi kimuranga  </label>
                      </div>
                    </div>
                  </div>
                  <br>
                  <div class="container">
                    <div class="row">
                      <div class="col-xs-6">
                        <input type="radio" class="option-input radio" id="noneConfirm" value="ntacyo" name="identify">
                        <label for="otherConfirm">Nta cyangombwa kimuranga afite  </label>
                      </div>
                    </div>
                  </div>
                  <br>
                  <div class="col-lg-10 col-md-10" id="nidDIV">
                  <label for="nid">Nimero y'Indangamuntu</label>
                  <input type="text" class="form-control" placeholder="" value='<?php echo $nid;?>' name="nid"><br></div>

                 <div class="col-lg-10 col-md-10" id="passDIV">
                  <label for="passport">Nimero ya Pasiporo</label>
                  <input type="text" class="form-control" placeholder="" value='<?php echo $passport;?>' name="passport"><br></div>

                 <div class="col-lg-10 col-md-10" id="otherDIV">
                  <label for="otherID">Nimero y'Ikindi cyangombwa</label>
                  <input type="text" class="form-control" placeholder="" value='<?php echo $otherID;?>' name="otherID"><br></div>

                  <div class="col-lg-10 col-md-10" id="noneDIV">
                   <label for="noneID">Impamvu atagifite</label>
                   <input type="text" class="form-control" placeholder="" value='<?php echo $reason;?>' name="noneID"><br></div>

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
                  <input type="date" class="form-control" placeholder="" name="dob" value='<?php echo $dob;?>' required></div>
                  <br>
                  <div class="col-lg-10 col-md-10">
                   <label for="tel">Nimero ya Telefone</label>
                   <input type="text" class="form-control" placeholder="" value='<?php echo $tel;?>' name="tel" maxlength="15" required></div>
                   <br>
                   <div class="col-lg-10 col-md-10">
                    <label for="dad">Amazina ya Se</label>
                    <input type="text" class="form-control" placeholder="" value='<?php echo $dad;?>' name="dad" required></div>
                    <br>
                    <div class="col-lg-10 col-md-10">
                     <label for="mum">Amazina ya Nyina</label>
                     <input type="text" class="form-control" placeholder="" value='<?php echo $mum;?>' name="mum" required></div>
                     <br>
                   <div class="col-lg-10 col-md-10">
                    <label for="country">Igihugu Akomokamo</label>
                    <input type="text" class="form-control" placeholder="" name="country" value='<?php echo $country;?>' required></div>
                    <br>
                    <div class="col-lg-10 col-md-10">
                     <label for="country">Ubwenegihugu</label>
                     <input type="text" class="form-control" placeholder="" name="nationality" value='<?php echo $nationality;?>' required></div>
                     <br>

                   <div class="col-lg-10 col-md-10">
                    <label for="profession">Icyo akora</label>
                    <input type="text" class="form-control" placeholder="" name="profession"value='<?php echo $profession;?>' required></div>
                    <br>
                    <div class="col-lg-10 col-md-10">
                     <label for="education">Amashuri Yize</label>
                     <input type="text" class="form-control" placeholder="" name="education" value='<?php echo $education;?>' required></div>
                     <br>
                     <div class="col-lg-10 col-md-10">
                      <label for="relationship">Isano afitanye na Nyirurugo</label>
                      <input type="text" class="form-control" placeholder="" name="relationship" value='<?php echo $relationship;?>' required></div>
                      <br>



                 <div class="col-lg-10 col-md-10">
                  <label for="insurance">Ubwishingizi</label>
                  <select name='insurance' class='form-control' required>";
                    <?php
                  $connect = new mysqli("localhost","root","","umudugudu",3306);
                  $queryUn = $connect -> query("SELECT `ubwisungane_name` FROM `ubwisungane` ORDER BY `ubwisungane_id`");
                  $queryId = $connect -> query("SELECT `ubwisungane_id` FROM `ubwisungane` ORDER BY `ubwisungane_id`");

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
                      echo "<option value='$arrayId[$sizeTemp]'";
                      if($insurance==$arrayId[$sizeTemp]){echo " selected";}
                      echo">$arrayUn[$sizeTemp]</option>";
                  }

                  ?>
                </select></div>
                <br>

                 <div class="col-lg-10 col-md-10">
                  <label for="family">Umuryango</label>
                  <select name='family' class='form-control'>";
                    <?php
                  $connect = new mysqli("localhost","root","","umudugudu",3306);

                  $queryUmuryangoId = $connect -> query("SELECT `umuryango_id` FROM `umuryango` ORDER BY `umuryango_id`");
                  $queryChefId = $connect -> query("SELECT `umuryango_chef` FROM `umuryango`  ORDER BY `umuryango_id`");

                  $arrayUmuryangoId = Array();
                  $arrayChefId = Array();

                  while($result = $queryUmuryangoId -> fetch_assoc()){
                      $arrayUmuryangoId[] = $result['umuryango_id'];
                  }
                  while($result = $queryChefId -> fetch_assoc()){
                      $arrayChefId[] = $result['umuryango_chef'];
                  }
                  $size = sizeof($arrayUmuryangoId);
                  $sizeTemp = $size - 1;

                  for ($sizeTemp; $sizeTemp >=0; $sizeTemp--){
                      echo "<option value='$arrayUmuryangoId[$sizeTemp]'";
                      if($family==$arrayUmuryangoId[$sizeTemp]){echo " selected";}
                      echo">$arrayChefId[$sizeTemp]</option>";
                  }

                  ?>
                </select></div>
                <br>

                <div class="col-lg-10 col-md-10">
                 <label for="ubudehe">Icyiciro cy'Ubudehe</label>
                 <select name='ubudehe' class='form-control'>";
                   <?php
                 $connect = new mysqli("localhost","root","","umudugudu",3306);

                 $queryIbyiciroId = $connect -> query("SELECT `ibyiciro_id` FROM `ibyiciro` ORDER BY `ibyiciro_id`");
                 $queryIbyiciroName = $connect -> query("SELECT `ibyiciro_name` FROM `ibyiciro` ORDER BY `ibyiciro_id`");

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
                     echo "<option value='$arrayIbyiciroId[$sizeTemp]'";
                     if($ubudehe==$arrayIbyiciroId[$sizeTemp]){echo " selected";}
                     echo">$arrayIbyiciroName[$sizeTemp]</option>";
                 }

                 ?>
               </select></div>
               <br>

                 <div class="col-lg-10 col-md-10">
                  <label for="position">Inshingano</label>
                  <select name='position' class='form-control'>";
                    <?php
                  $connect = new mysqli("localhost","root","","umudugudu",3306);

                  $queryInshinganoId = $connect -> query("SELECT `inshingano_id` FROM `inshingano` ORDER BY `inshingano_id`");
                  $queryInshinganoName = $connect -> query("SELECT `inshingano_name` FROM `inshingano` ORDER BY `inshingano_id`");
                  $queryInshinganoPlace = $connect -> query("SELECT `aho_bireba` FROM `inshingano` ORDER BY `inshingano_id` ASC");

                  $arrayInshinganoId = Array();
                  $arrayInshinganoName = Array();
                  $arrayInshinganoPlace = Array();

                  while($result = $queryInshinganoId -> fetch_assoc()){
                      $arrayInshinganoId[] = $result['inshingano_id'];
                  }
                  while($result = $queryInshinganoName -> fetch_assoc()){
                      $arrayInshinganoName[] = $result['inshingano_name'];
                  }
                  while($result = $queryInshinganoPlace -> fetch_assoc()){
                      $arrayInshinganoPlace[] = $result['aho_bireba'];
                  }

                  $size = sizeof($arrayInshinganoId);
                  $sizeTemp = $size - 1;

                  for ($sizeTemp; $sizeTemp >=0; $sizeTemp--){
                      echo "<option value='$arrayInshinganoId[$sizeTemp]'";
                      if($position==$arrayInshinganoId[$sizeTemp]){echo " selected";}
                      echo">$arrayInshinganoName[$sizeTemp] ($arrayInshinganoPlace[$sizeTemp])</option>";
                  }

                  ?>
                </select></div>

                  <br>

                  <div class="col-lg-10 col-md-10">
                   <label for="position2">Inshingano ya kabiri (Niba ayifite)</label>
                   <select name='position2' class='form-control'>";
                     <?php
                   $connect = new mysqli("localhost","root","","umudugudu",3306);

                   $queryInshinganoId = $connect -> query("SELECT `inshingano_id` FROM `inshingano` ORDER BY `inshingano_id`");
                   $queryInshinganoName = $connect -> query("SELECT `inshingano_name` FROM `inshingano` ORDER BY `inshingano_id`");
                   $queryInshinganoPlace = $connect -> query("SELECT `aho_bireba` FROM `inshingano` ORDER BY `inshingano_id` ASC");

                   $arrayInshinganoId = Array();
                   $arrayInshinganoName = Array();
                   $arrayInshinganoPlace = Array();

                   while($result = $queryInshinganoId -> fetch_assoc()){
                       $arrayInshinganoId[] = $result['inshingano_id'];
                   }
                   while($result = $queryInshinganoName -> fetch_assoc()){
                       $arrayInshinganoName[] = $result['inshingano_name'];
                   }
                   while($result = $queryInshinganoPlace -> fetch_assoc()){
                       $arrayInshinganoPlace[] = $result['aho_bireba'];
                   }

                   $size = sizeof($arrayInshinganoId);
                   $sizeTemp = $size - 1;

                   for ($sizeTemp; $sizeTemp >=0; $sizeTemp--){
                       echo "<option value='$arrayInshinganoId[$sizeTemp]'";
                       if($position2==$arrayInshinganoId[$sizeTemp]){echo " selected";}
                       echo">$arrayInshinganoName[$sizeTemp] ($arrayInshinganoPlace[$sizeTemp])</option>";
                   }

                   ?>
                 </select></div>

                   <br>

                   <div class="col-lg-10 col-md-10">
                    <label for="position3">Inshingano ya gatatu (Niba ayifite)</label>
                    <select name='position3' class='form-control'>";
                      <?php
                    $connect = new mysqli("localhost","root","","umudugudu",3306);

                    $queryInshinganoId = $connect -> query("SELECT `inshingano_id` FROM `inshingano` ORDER BY `inshingano_id`");
                    $queryInshinganoName = $connect -> query("SELECT `inshingano_name` FROM `inshingano` ORDER BY `inshingano_id`");
                    $queryInshinganoPlace = $connect -> query("SELECT `aho_bireba` FROM `inshingano` ORDER BY `inshingano_id` ASC");

                    $arrayInshinganoId = Array();
                    $arrayInshinganoName = Array();
                    $arrayInshinganoPlace = Array();

                    while($result = $queryInshinganoId -> fetch_assoc()){
                        $arrayInshinganoId[] = $result['inshingano_id'];
                    }
                    while($result = $queryInshinganoName -> fetch_assoc()){
                        $arrayInshinganoName[] = $result['inshingano_name'];
                    }
                    while($result = $queryInshinganoPlace -> fetch_assoc()){
                        $arrayInshinganoPlace[] = $result['aho_bireba'];
                    }

                    $size = sizeof($arrayInshinganoId);
                    $sizeTemp = $size - 1;

                    for ($sizeTemp; $sizeTemp >=0; $sizeTemp--){
                        echo "<option value='$arrayInshinganoId[$sizeTemp]'";
                        if($position3==$arrayInshinganoId[$sizeTemp]){echo " selected";}
                        echo">$arrayInshinganoName[$sizeTemp] ($arrayInshinganoPlace[$sizeTemp])</option>";
                    }

                    ?>
                  </select></div>

                    <br>
                  <div class="container">
                    <div class="row">
                      <div class="col-xs-6">
                        <input type="radio" class="option-input radio" id="mugayeConfirm" value="Yego" name="hand" <?php if($ubumugastatus=="Yego"){echo"checked";}?>>
                        <label for="otherConfirm">Afite ubumuga</label>
                      </div>
                    </div>
                  </div>
                  <br>
                  <div class="container">
                    <div class="row">
                      <div class="col-xs-6">
                        <input type="radio" class="option-input radio" id="noneConfirm" value="Oya" name="hand" <?php if($ubumugastatus=="Oya"){echo"checked";}?>>
                        <label for="otherConfirm">Nta bumuga afite</label>
                      </div>
                    </div>
                  </div>
                  <br>

                  <div class="col-lg-10 col-md-10" id="mugaDIV">
                   <label for="dob">Ubumuga ubw'ari bwo</label>
                   <input type="text" class="form-control" placeholder="" name="handicapdetail" value="<?php echo $ubumugatype;?>"></div>
                   <br>

                   <script type="text/javascript">
                   $(document).ready(function () {

                       $('input[type="radio"]').click(function () {
                           if ($(this).attr("value") == "Yego") {
                             $("#mugaDIV").show('fast');

                           }

                           else if ($(this).attr("value") == "Oya"){
                             $("#mugaDIV").hide('fast');


                           }
                       });

                       $('input[type="radio"]').trigger('click');  // trigger the event
                   });
                   </script>

                   <hr width="75%">


                   <div class="container">
                     <div class="row">
                       <div class="col-xs-6">
                         <input type="radio" class="option-input radio" id="funzweConfirm" value="Funzwe" name="prison" <?php if($prisonstatus=="Arafunzwe"){echo"checked";}?>>
                         <label for="otherConfirm">Arafunzwe</label>
                       </div>
                     </div>
                   </div>
                   <br>
                   <div class="container">
                     <div class="row">
                       <div class="col-xs-6">
                         <input type="radio" class="option-input radio" id="funguyeConfirm" value="Funguye" name="prison" <?php if($prisonstatus=="Ntabwo afunzwe"){echo"checked";}?>>
                         <label for="otherConfirm">Ntabwo afunzwe</label>
                       </div>
                     </div>
                   </div>
                   <br>
                   <button type="submit" class="btn btn-primary m-2" name="injiza">Emeza</button><button onclick="<?php echo"window.location.href='umuturage_data.php'";?>" type="button" class="btn btn-danger m-2" name="inyuma">Subira inyuma</button>

                </form>
                <?php

                  if(isset($_POST['injiza']))
                  {
                    $first_name = $_POST['fname'];
                    $first_name = str_replace("'", "''", $first_name);
                    $last_name = $_POST['lname'];
                    $last_name = str_replace("'", "''", $last_name);
                    $gender = $_POST['gender'];
                    if(!empty($_POST['nid']))
                      {$nid = $_POST['nid'];}
                    else{
                      $nid = '-';
                    }
                    if(!empty($_POST['passport']))
                      {$passport = $_POST['passport'];}
                    else{
                      $passport = '-';
                    }
                    if(!empty($_POST['otherID']))
                      {$otherID = $_POST['otherID'];}
                    else{
                      $otherID = '-';
                    }
                    if(!empty($_POST['noneID']))
                      {$reason = $_POST['noneID'];}
                    else{
                      $reason = '-';
                    }
                    $dob = $_POST['dob'];
                    $tel = $_POST['tel'];
                    $dad = $_POST['dad'];
                    $mum = $_POST['mum'];
                    $country = $_POST['country'];
                    $nationality = $_POST['nationality'];
                    $profession = $_POST['profession'];
                    $profession = str_replace("'", "''", $profession);
                    $education = $_POST['education'];
                    $relationship = $_POST['relationship'];
                    $insurance = $_POST['insurance'];
                    $family = $_POST['family'];
                    $ubudehe = $_POST['ubudehe'];
                    $isib2 = 0;
                    $position = $_POST['position'];
                    $assoc1 = mysqli_query($connection,"SELECT aho_bireba FROM inshingano WHERE inshingano_id = $position");
                    $array1 = mysqli_fetch_assoc($assoc1);
                    $name1 = $array1['aho_bireba'];
                    if($name1 == 'Isibo'){$isib2 = 1;}
                    $position = str_replace("'", "''" , $position);
                    $position2 = $_POST['position2'];
                    $assoc2 = mysqli_query($connection,"SELECT aho_bireba FROM inshingano WHERE inshingano_id = $position2");
                    $array2 = mysqli_fetch_assoc($assoc2);
                    $name2 = $array2['aho_bireba'];
                    if($name2 == 'Isibo'){$isib2 = 1;}
                    $position2 = str_replace("'", "''" , $position2);
                    $position3 = $_POST['position3'];
                    $assoc3 = mysqli_query($connection,"SELECT aho_bireba FROM inshingano WHERE inshingano_id = $position3");
                    $array3 = mysqli_fetch_assoc($assoc3);
                    $name3 = $array3['aho_bireba'];
                    if($name3 == 'Isibo'){$isib2 = 1;}
                    $position3 = str_replace("'", "''" , $position3);

                    $ubumugastatus = $_POST['hand'];
                    if($ubumugastatus=="Yego")
                    {
                      $ubumugatype = $_POST['handicapdetail'];
                    }
                    else if($ubumugastatus=="Oya"){
                      $ubumugatype='-';
                    }
                    $prisonstatus = $_POST['prison'];
                    if($prisonstatus=="Funzwe"){
                      $prisonstatus = "Arafunzwe";
                    }
                    else if($prisonstatus=="Funguye"){
                      $prisonstatus = "Ntabwo afunzwe";
                    }



                    if(strcasecmp($relationship,'nyirurugo')==0){

                        $existHead = mysqli_query($connection,"SELECT * FROM umuturage WHERE isano LIKE '%nyirurugo%' AND umuryango_id='$family'");
                        if(mysqli_num_rows($existHead)==0 || $pass==1){

                            $checkIsib = mysqli_query($connection,"SELECT * FROM umuyobozi_isibo WHERE umuturage_id = $umuturageID");
                            if((mysqli_num_rows($checkIsib)>0)&&($isib2==0)){
                              $delete = mysqli_query($connection,"DELETE FROM umuyobozi_isibo WHERE umuturage_id = $umuturageID");
                            }
                            else if((mysqli_num_rows($checkIsib)>0)&&($isib2==1)){
                              $delete = mysqli_query($connection,"DELETE FROM umuyobozi_isibo WHERE umuturage_id = $umuturageID");
                            }
                            $insert = "UPDATE umuturage SET first_name='$first_name', last_name='$last_name', gender='$gender', nid='$nid',
                            passport_id='$passport', other_identification='$otherID', impamvu_atagifite='$reason', dob='$dob', tel='$tel', nationality='$country', icyo_akora='$profession', isano='$relationship', umuturage_dad='$dad',umuturage_mum='$mum', amashuri_yize='$education',
                            ibyiciro_id='$ubudehe', ubwisungane_id='$insurance', umuryango_id='$family', inshingano_id='$position',inshingano2_id='$position2',inshingano3_id='$position3', ubumuga_status='$ubumugastatus',ubumuga_details='$ubumugatype',gufungwa_status='$prisonstatus'
                            WHERE umuturage_id = $umuturageID";
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
                                  location.reload();
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
                               //  window.location.href = "kwinjiza_umuturage.php?umuryango_id='.$family.'";
                             });


                             </script>';
                           }


                          }

                          else{
                            echo '
                             <script type="text/javascript">
                             swal.fire({
                              title: "Biranze",
                              text: "Uyu muryango ufite nyirurugo wundi muri sisiteme",
                              icon: "error",
                              timer: 89000
                              }).then(function() {
                               //  window.location.href = "kwinjiza_umuturage.php?umuryango_id='.$family.'";
                             });


                             </script>';

                          }






                    }


              else{





                        $insert = "UPDATE umuturage SET first_name='$first_name', last_name='$last_name', gender='$gender', nid='$nid',
                        passport_id='$passport', other_identification='$otherID', impamvu_atagifite='$reason', dob='$dob', tel='$tel', nationality='$country', icyo_akora='$profession', isano='$relationship',umuturage_dad='$dad',umuturage_mum='$mum', amashuri_yize='$education',
                        ibyiciro_id='$ubudehe', ubwisungane_id='$insurance', umuryango_id='$family', inshingano_id='$position',inshingano2_id='$position2',inshingano3_id='$position3', ubumuga_status='$ubumugastatus',ubumuga_details='$ubumugatype',gufungwa_status='$prisonstatus'
                        WHERE umuturage_id = $umuturageID";
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
                            location.reload();
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
                           //  window.location.href = "kwinjiza_umuturage.php?umuryango_id='.$family.'";
                         });


                         </script>';
                       }



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
