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
    $chefID = $_GET['umuturage_id'];
    $sql = "SELECT * FROM umuturage WHERE umuturage_id='$chefID'";
    $run_status = mysqli_query($connection,$sql);
    $rowStatus = mysqli_fetch_array($run_status);
    $first_name = $rowStatus['first_name'];
    $last_name = $rowStatus['last_name'];
    $inshinganoID = $rowStatus['inshingano_id'];

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

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
   <script src="nocheck.js"></script>
   <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
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
          <h1 class="h3 mb-2 text-gray-800"><?php echo "<h4 class='h3 mb-2 text-blue-800'>Hitamo isibo ".$first_name." ".$last_name." ayobora"."</h4>"."</h1>";?>
          <p class="mb-4"><!-- DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the --> .</p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <!-- <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Uzuza imyirondoro Y'umuturage utuye hano</h6>
            </div> -->
            <div class="card-body">

                  <form action="" method="post">
                  <!-- <div class="form-group control "col-md-6> -->

                  <!-- WHAT AMMA BE USIN -->




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
                     $isiboCheckID = $arrayIsiboId[$sizeTemp];
                     $isiboCheck = mysqli_query($connection,"SELECT * FROM umuyobozi_isibo WHERE isibo_id='$isiboCheckID' AND inshingano_id='$inshinganoID'");
                     if(mysqli_num_rows($isiboCheck)==0){
                       echo "<option value='$arrayIsiboId[$sizeTemp]'>$arrayIsiboName[$sizeTemp]</option>";
                     }
                   }

                   ?>
                 </select></div>



                <br>



                  <!-- END FORM -->



                  <input type="submit" value="Emeza" class="btn btn-primary" name="injiza"><button onclick="<?php echo"window.location.href='umuyobozi_isibo_data.php'";?>" type="button" class="btn btn-danger m-2" name="inyuma">Subira inyuma</button>
                </form>
                <?php

                  if(isset($_POST['injiza']))
                  {
                    $isibo = $_POST['isibo'];
                      $insertAD = "INSERT INTO umuyobozi_isibo (isibo_id, umuturage_id,inshingano_id)
                      VALUES ('$isibo','$chefID','$inshinganoID')";

                        $resultAD = mysqli_query($connection,$insertAD);

                        if($resultAD){
                          /*Hano ushiremo ka ka model kawe kari cool man*/
                          echo '
                            <script type="text/javascript">
                            swal.fire({
                             title: "Byakoze",
                             text: "Amakuru yageze muri sisiteme.",
                             icon: "success",
                             timer: 89000
                             }).then(function() {
                                window.location.href = "umuyobozi_isibo_data.php";
                            });


                            </script>';

                        }
                        else{
                          echo '
                            <script type="text/javascript">
                            swal.fire({
                             title: "Byanze",
                             text: Amakuru ntabwo yageze muri sisiteme.",
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
