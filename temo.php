<div class="container">
  <div class="row">
    <div class="col-xs-6">
      <input type="radio" class="option-input radio" id="NoKodeConfirm" value="NoKodeshwa" name="turakodesha">
      <label for="NoKodeConfirm">Inzu Idakodeshwa</label>
    </div>
  </div>
</div>
<br>
<div class="container">
  <div class="row">
    <div class="col-xs-6">
      <input type="radio" class="option-input radio" id="KodeConfirm" value="Kodeshwa" name="turakodesha">
      <label for="KodeConfirm">Inzu Ikodeshwa</label>
    </div>
  </div>
</div>
<br>

<div class="col-lg-10 col-md-10" id="utuyeDIV">
 <label for="selectUtuye">Nyirigipangu</label>
 <select name='selectUtuye' class='form-control'>";
   <?php
 $connect = new mysqli("localhost","root","","umudugudu",3306);
 $queryUtuyeFn = $connect -> query("SELECT `first_name` FROM `umuturage` ORDER BY `umuturage_id`");
 $queryUtuyeLn = $connect -> query("SELECT `last_name` FROM `umuturage` ORDER BY `umuturage_id`");
 $queryUtuyeId = $connect -> query("SELECT `umuturage_id` FROM `umuturage` ORDER BY `umuturage_id`");


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
   if(mysqli_num_rows(mysqli_query($connection,"SELECT umuturage_id FROM umuyobozi_umuryango WHERE umuturage_id = $utuyeId"))==0)
     echo "<option value='$arrayUtuyeId[$sizeTemp]'>$arrayUtuyeLn[$sizeTemp] $arrayUtuyeFn[$sizeTemp]</option>";
 }

 ?>
</select></div>
<br>

<div id="ukodeshaDIV">
<div class="col-lg-10 col-md-10">
<label for="selectUtuyeAlone">Nyirigipangu</label>
<select name='selectUtuyeAlone' class='form-control'>";
 <?php
$connect = new mysqli("localhost","root","","umudugudu",3306);
$queryUtuyeFn = $connect -> query("SELECT `first_name` FROM `umuturage` ORDER BY `umuturage_id`");
$queryUtuyeLn = $connect -> query("SELECT `last_name` FROM `umuturage` ORDER BY `umuturage_id`");
$queryUtuyeId = $connect -> query("SELECT `umuturage_id` FROM `umuturage` ORDER BY `umuturage_id`");


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
 if(mysqli_num_rows(mysqli_query($connection,"SELECT umuturage_id FROM umuyobozi_umuryango WHERE umuturage_id = $utuyeId"))==0)
   echo "<option value='$arrayUtuyeId[$sizeTemp]'>$arrayUtuyeLn[$sizeTemp] $arrayUtuyeFn[$sizeTemp]</option>";
}

?>
</select></div>

<br>

<div class="col-lg-10 col-md-10">
<label for="selectUkodesha">Nyirurugo (Ukodesha)</label>
<select name='selectUkodesha' class='form-control'>";
  <?php
$connect = new mysqli("localhost","root","","umudugudu",3306);
$queryUkodeshaFn = $connect -> query("SELECT `first_name` FROM `umuturage` WHERE `isano` LIKE '%nyirurugo%' AND status_tura_kodesha = 'Arakodesha' ORDER BY `umuturage_id` ASC");
$queryUkodeshaLn = $connect -> query("SELECT `last_name` FROM `umuturage`  WHERE `isano` LIKE '%nyirurugo%' AND status_tura_kodesha = 'Arakodesha' ORDER BY `umuturage_id` ASC");
$queryUkodeshaId = $connect -> query("SELECT `umuturage_id` FROM `umuturage` WHERE `isano` LIKE '%nyirurugo%' AND status_tura_kodesha = 'Arakodesha' ORDER BY `umuturage_id` ASC");


$arrayUkodeshaFn = Array();
$arrayUkodeshaLn = Array();
$arrayUkodeshaId = Array();

while($result = $queryUkodeshaFn -> fetch_assoc()){
    $arrayUkodeshaFn[] = $result['first_name'];
}
while($result = $queryUkodeshaLn -> fetch_assoc()){
    $arrayUkodeshaLn[] = $result['last_name'];
}
while($result = $queryUkodeshaId -> fetch_assoc()){
    $arrayUkodeshaId[] = $result['umuturage_id'];
}
$size = sizeof($arrayUkodeshaId);
$sizeTemp = $size - 1;
if(mysqli_num_rows($queryUkodeshaId)==0)
{
  echo "<option value='nope'>Nta ba nyirurugo badafite urugo bari muri sisiteme, murabanza mubongeremo</option>";
}

else{
for ($sizeTemp; $sizeTemp >=0; $sizeTemp--){
  $ukodeshaId = $arrayUkodeshaId[$sizeTemp];
  $resultt = mysqli_query($connection,"SELECT umuturage_id FROM nyirigipangu WHERE umuturage_id = $ukodeshaId");
  if(mysqli_num_rows($resultt)==0)
  {

    echo "<option value='$arrayUkodeshaId[$sizeTemp]'>$arrayUkodeshaLn[$sizeTemp] $arrayUkodeshaFn[$sizeTemp]</option>";
  }
  else{echo "<option>Nta ba nyirurugo badafite urugo bari muri sisiteme, murabanza mubongeremo</option>";}

}

}
?>
</select></div>



</div>

<script type="text/javascript">
$(document).ready(function () {

  $('input[type="radio"]').click(function () {
      if ($(this).attr("value") == "NoKodeshwa") {
        $("#ukodeshaDIV").hide('fast');
        $("#utuyeDIV").show('fast');


      }

      if ($(this).attr("value") == "Kodeshwa") {
        $("#utuyeDIV").hide('fast');
        $("#ukodeshaDIV").show('fast');



      }

  });

  $('input[type="radio"]').trigger('click');  // trigger the event
});</script>

<br>
<hr>
