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

  <title>E-mudugudu</title>

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

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


          <!-- DataTales Example -->
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
                      <th>Abanyamuryango</th>
                      <th>Umubare w'abanyamuryango bari munsi y'imyaka 5</th>
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
                      <th>Abanyamuryango</th>
                      <th>Umubare w'abanyamuryango bari munsi y'imyaka 5</th>
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

                                    echo "<td><a class='btn btn-success' href='kwinjiza_umuturage.php?umuryango_id=$familyID'>Abanyamuryango</a></td>";
                                    $checkAge = mysqli_query($connection,"SELECT dob FROM umuturage WHERE umuryango_id = $familyID");
                                    if(mysqli_num_rows($checkAge)>0){


                                      $count = 0;
                                      while($rowAge = mysqli_fetch_array($checkAge)){
                                        $birthDate = $rowAge['dob'];
                                        //explode the date to get month, day and year
                                        $birthDate = explode("-", $birthDate);
                                        $compBirthDate = Array();
                                        array_push($compBirthDate,$birthDate[2],$birthDate[1],$birthDate[0]);
                                        //get age from date or birthdate
                                        $age = (date("md", date("U", mktime(0, 0, 0, $compBirthDate[0], $compBirthDate[1], $compBirthDate[2]))) > date("md")
                                          ? ((date("Y") - $compBirthDate[2]) - 1)
                                          : (date("Y") - $compBirthDate[2]));
                                        if($age < 5){
                                          $count = $count + 1;
                                        }

                                      }
                                      if($count!=0)
                                        {echo "<td>".$count."</td>";}
                                      else{
                                        echo "<td>Ntawe</td>";
                                      }
                                    }
                                    else{
                                      echo "<td>Nta banyamuryango barashirwa muri sisiteme</td>";
                                    }
                                    $resultAdd1=mysqli_query($connection,"SELECT * FROM umuturage WHERE umuryango_id = $familyID AND isano LIKE '%nyirurugo%'");
                                    $resultAdd2=mysqli_query($connection,"SELECT * FROM andi_makuru_umuryango WHERE umuryango_id = $familyID");
                                    $resultAdd3=mysqli_query($connection,"SELECT * FROM umuyobozi_umuryango WHERE umuryango_id = $familyID");

                                      if(mysqli_num_rows($resultAdd2)>0)
                                        {

                                              if(mysqli_num_rows($resultAdd3)>0)
                                            {
                                              echo"<td><a href='guhindura_umuryango.php?umuryango_id=$familyID' class='btn btn-primary btn-block'>Andi makuru</a></td>";
                                              echo"<td><a href='gusiba.php?umuryango_id=$familyID' class='btn btn-danger btn-block'>Siba</a></td>";

                                            }
                                            else
                                            {
                                              echo"<td><a href='andi_makuru_umuryango.php?umuryango_id=$familyID' class='btn btn-info btn-block'>Ongeramo andi makuru</a></td>";
                                              echo"<td><a href='gusiba.php?umuryango_id=$familyID' class='btn btn-danger btn-block'>Siba</a></td>";
                                            }

                                        }
                                        else
                                        {
                                          echo"<td><a href='andi_makuru_umuryango.php?umuryango_id=$familyID' class='btn btn-info btn-block'>Ongeramo andi makuru</a></td>";
                                          echo"<td><a href='gusiba.php?umuryango_id=$familyID' class='btn btn-danger btn-block'>Siba</a></td>";
                                        }

                                    }




                              echo "</tr>";


                          }

                        
                        ?>

                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2020</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

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
