<!DOCTYPE html>

<?php
session_start();
  if(!isset($_SESSION['user_email']))
  {
    header('Location:index.php');
  }
else{
  require 'connection/connection.php';
  if(!isset($_GET['igikorwa_id'])){
    header('Location:index.php');
  }
  else if(isset($_GET['igikorwa_id'])){
    $igikorwaID = $_GET['igikorwa_id'];
    $get_name = mysqli_query($connection,"SELECT * FROM igikorwa WHERE igikorwa_id = $igikorwaID");
    $rowFoto = mysqli_fetch_array($get_name);
    $igikorwa_name = $rowFoto['igikorwa_detail'];
    $igikorwa_type = $rowFoto['igikorwa_type'];
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
          <h1 class="h3 mb-2 text-gray-800">Amafoto ya <?php echo $igikorwa_name. " (".$igikorwa_type.")"?></h1>
          <p class="mb-4"><!-- DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the --> .</p>

          <div class="card shadow mb-4">
            <!-- <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Uzuza imyirondoro Y'umuturage utuye hano</h6>
            </div> -->
            <div class="card-body">

                <form action="" method="POST" enctype="multipart/form-data">
                  <div>
                    <label for="m_image">Hitamo Ifoto</label><br>
                   <input class="btn btn-primary" type="file" name="m_image" required/>
                 </div>
                   <br><br>
                   <div class="col-lg-10 col-md-10">
                    <label for="desc">Igisobanuro cy'ibiri kubera mw'ifoto</label>
                    <textarea class="form-control" name="desc" rows="4" cols="50"></textarea>
                    </div>
                    <br>
                   <br>
                   <button type="submit" class="btn btn-primary m-2" name="injiza">Emeza</button><a href="<?php echo "kwinjiza_igikorwa.php";?>"><button type="button" class="btn btn-danger m-2" name="inyuma">Subira inyuma</button></a>

                </form>


                <?php

                      if (isset($_POST['injiza']))
                      {
                          $desc = $_POST['desc'];
                          $m_image = $_FILES['m_image']['name'];
                          $image_tmp = $_FILES['m_image']['tmp_name'];
                          $random_number = rand(1, 100000);

                          if ($m_image == '')
                          {
                            echo '
                             <script type="text/javascript">
                             swal.fire({
                              title: "Byanze",
                              text: "Nta foto mwahisemo",
                              icon: "error",
                              timer: 89000
                              }).then(function() {
                                 window.location.reload();
                             })
                             </script>';

                          }
                          else
                          {
                              $temp = explode(".", $_FILES["m_image"]["name"]);
                              $newfilename = round(microtime(true)) . '.' . end($temp);
                              move_uploaded_file($_FILES["m_image"]["tmp_name"], "img/ibikorwa/" . $newfilename);
                              $update = "INSERT INTO amafoto (amafoto_name,amafoto_description,igikorwa_id) VALUES ('$newfilename','$desc','$igikorwaID')";

                              $run = mysqli_query($connection, $update);

                              if ($run)
                              {

                                echo '
                                 <script type="text/javascript">
                                 swal.fire({
                                  title: "Byakoze",
                                  text: "Ifoto yageze muri sisiteme",
                                  icon: "success",
                                  timer: 89000
                                  }).then(function() {
                                  //   window.location.reload();
                                 })
                                 </script>';
                              }
                              else{
                                echo '
                                 <script type="text/javascript">
                                 swal.fire({
                                  title: "Byanze",
                                  text: "pwet pwet",
                                  icon: "error",
                                  timer: 89000
                                  }).then(function() {
                                  //   window.location.reload();
                                 })
                                 </script>';
                              }
                          }

                      }

                  ?>

                </div>
                </div>
          <div class="card shadow mb-4">
            <!-- <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Uzuza imyirondoro Y'umuturage utuye hano</h6>
            </div> -->
            <div class="card-body">


<!-- Gallery -->
<!--
Gallery is linked to lightbox using data attributes.

To open lightbox, this is added to the gallery element: {data-toggle="modal" data-target="#exampleModal"}.

To open carousel on correct image, this is added to each image element: {data-target="#carouselExample" data-slide-to="0"}.
Replace '0' with corresponding slide number.
-->
<?php
$sql = "SELECT amafoto_id,amafoto_name,amafoto_description FROM amafoto WHERE igikorwa_id = $igikorwaID";
$get_foto = mysqli_query($connection,$sql);
if($get_foto){
  $id = array();
  $picture = array();
  $description = array();
  while($rowFoto = mysqli_fetch_assoc($get_foto)){
    $rowFotoID[] = $rowFoto['amafoto_id'];
    $rowFotoArray[] = $rowFoto['amafoto_name'];
    $rowFotoDesc[] = $rowFoto['amafoto_description'];
  }

  $rowCount = mysqli_num_rows($get_foto);
  $arraycount = 0;

  while($arraycount<$rowCount){
    array_push($id,$rowFotoID[$arraycount]);
    array_push($picture,$rowFotoArray[$arraycount]);
    array_push($description,$rowFotoDesc[$arraycount]);
    $arraycount = $arraycount + 1;
  }


  ?>

<!------------------------------------------------------------------------------------>



    <!--Carousel Wrapper-->
    <div id="carousel-example-2" class="carousel slide carousel-fade" data-ride="carousel">
      <!--Indicators-->
      <ol class="carousel-indicators">
        <?php
        for($counterpremodal=0;$counterpremodal<$rowCount;$counterpremodal++){
          echo "<li data-target='#carousel-example-2' data-slide-to='$counterpremodal'";
          if($counterpremodal==0){echo "class='active'";}
          echo "></li>";
        }
        ?>
      </ol>
      <!--/.Indicators-->
      <!--Slides-->
      <div class="carousel-inner" role="listbox">
        <?php
        for($counterpremodal=0;$counterpremodal<$rowCount;$counterpremodal++){
          $nowpic = $picture[$counterpremodal];
          $nowdesc = $description[$counterpremodal];
        echo"
        <div class='carousel-item";
        if($counterpremodal==0){
          echo " active";
        }
        echo"'>
          <div class='view'>
            <img class='d-block w-100' src='img/ibikorwa/".$nowpic."' alt='Slide'>
            <div class='mask rgba-black-light'></div>
          </div>
          <div class='carousel-caption'>
            <p>$nowdesc</p>
          </div>
        </div>";}
        ?>
      </div>
      <!--/.Slides-->
      <!--Controls-->
      <a class="carousel-control-prev" href="#carousel-example-2" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carousel-example-2" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
      <!--/.Controls-->
    </div>




















<!------------------------------------------------------------------------------------>

  <?php
  echo"<div class='modal fade' id='exampleModal' tabindex='-1' role='dialog' aria-hidden='true'>
    <div class='modal-dialog' role='document'>
      <div class='modal-content'>
        <div class='modal-header'>
          <button type='button' class='close' data-dismiss='modal' aria-label='Gusohoka'>
            <span aria-hidden='true'>&times;</span>
          </button>
        </div>
        <div class='modal-body'>
          <div id='carouselExample' class='carousel slide' data-ride='carousel'>
            <ol class='carousel-indicators'>";
            for($counterpremodal=0;$counterpremodal<$rowCount;$counterpremodal++){
              echo"<li data-target='#carouselExample' data-slide-to='$counterpremodal'";
              if($counterpremodal==0){echo"class='active'";}
              echo"></li>";

            }
            echo"</ol>
            <div class='carousel-inner'>";
            for($counterpremodal=0;$counterpremodal<$rowCount;$counterpremodal++)
            {echo"
              <div class='carousel-item";
              if($counterpremodal==0){echo " active";}
              $now = $id[$counterpremodal];
              echo"'>
              <div class='view'>
                <img class='d-block w-100 h-100' src='img/ibikorwa/".$picture[$counterpremodal]."' alt='First slide'>
              </div></div>
              <div class='carousel-caption'>
                <p>".$description[$counterpremodal]."</p>
                </div>";
              }
              echo"

            </div>
            <a class='carousel-control-prev' href='#carouselExample' role='button' data-slide='prev'>
              <span class='carousel-control-prev-icon' aria-hidden='true'></span>
              <span class='sr-only'>Previous</span>
            </a>
            <a class='carousel-control-next' href='#carouselExample' role='button' data-slide='next'>
              <span class='carousel-control-next-icon' aria-hidden='true'></span>
              <span class='sr-only'>Next</span>
            </a>
          </div>
        </div>

        <div class='modal-footer'>
          <button type='button' class='btn btn-danger' data-dismiss='modal'>Gusohoka</button>
        </div>
      </div>
    </div>
  </div>";

}

?>



<!-- Modal -->
<!--
This part is straight out of Bootstrap docs. Just a carousel inside a modal.
-->



<!--
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Gusohoka">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="carouselExample" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExample" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExample" data-slide-to="1"></li>
            <li data-target="#carouselExample" data-slide-to="2"></li>
            <li data-target="#carouselExample" data-slide-to="3"></li>
          </ol>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img class="d-block w-100" src="https://images.unsplash.com/photo-1546853020-ca4909aef454?ixlib=rb-1.2.1&q=85&fm=jpg&crop=entropy&cs=srgb&ixid=eyJhcHBfaWQiOjE0NTg5fQ" alt="First slide">
            </div>

          </div>
          <a class="carousel-control-prev" href="#carouselExample" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExample" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Gusohoka</button>
      </div>
    </div>
  </div>
</div> -->


<!-- Custom Styling Toggle. For demo purposes only. -->



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
          <h5 class="modal-title" id="exampleModalLabel">Murashaka gusohoka sisiteme?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Funga">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Kubireka</button>
          <a class="btn btn-primary" href="index.php">Gusohoka</a>
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
