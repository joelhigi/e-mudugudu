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

          <p class="mb-4"><!-- DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the --> .</p>


          <div class="card shadow mb-4">
            <!-- <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Uzuza imyirondoro Y'umuturage utuye hano</h6>
            </div> -->
            <div class="card-body">
              <h1 class="h3 mb-2 text-gray-800"><strong>Amafoto y'igikorwa <?php echo $igikorwa_name. " (".$igikorwa_type.")"?></strong></h1>
              <br>
              <h1 class="h3 mb-2 text-gray-800">Hitamo ifoto ushaka gusiba:</h1>


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

  echo "<div class='row' id='gallery' data-toggle='modal' data-target='#exampleModal'>";
  for($counter=0;$counter<$rowCount;$counter++){
    $currentID = $id[$counter];
    $currentPic = $picture[$counter];
    $currentDesc = $description[$counter];
    echo "<div class='col-12 col-sm-6 col-lg-3'>
      <a href='gusiba.php?amafoto_id=$currentID'><img class='w-100' src='img/ibikorwa/".$currentPic."' alt='First slide' data-target='#carouselExample' data-slide-to='".$counter."'></a>
    </div>";

  }
  echo "</div>";

  echo "<a href='kwinjiza_igikorwa.php'><button type='button' class='btn btn-danger m-2' name='inyuma'>Subira inyuma</button></a>";



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
