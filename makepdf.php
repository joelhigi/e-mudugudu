<?php
    require('fpdf/fpdf.php');
    require('headerFooter_1.php');

    //creating fpdf object to access fpdf classes
    $pdf = new FPDF('L','mm','A4');
    $pdf = new PDF('L','mm','A4');
    $con = mysqli_connect("localhost","root","","umudugudu") or die("Connection was not established");
    // // $con = mysqli_connect("localhost","root","","depression") or die("Connection was not established");
    // if(isset($_POST['report'])){
    //     $select = $_POST['choice1'];
    //     if($select == 'abaturage'){
            // require('headerFooter_1.php');
    //     }else{
    //         require('headerFooter_2.php');
    //     }
    // }
    /*creating a page where to insert data
    ***AddPage([string orientation [, mixed size [, int rotation]]])
    */
    $pdf->AliasNbPages();
    $pdf->AddPage('L', 'A4');

    /*setting format of the data on the page
    ***##SYNTAX###
    *$app->SetFont()
    *** font-family : Arial
    *** font-weight : Bold(B is used)
    *** font-size   : 16
    */
    $pdf->SetFont('Arial','B',10);
    // $pdf->SetFont();
    /*adding a cell
    ***
    ***
    ***
    ***
    */
    // Cell(width[int], height[int], text[stiring], border[int], newLine[int], alignment[char], fill,[bool] link)
    // $pdf->Cell(70,10,'',0);
    // $pdf->Cell(50,10,'');
    $pdf->Cell(70,10,'' ,0,1);
    // $pdf->Cell(0,10,'', 0, 1);
    // $pdf->Cell(0,10,'', 0, 1);

    if(isset($_POST['report'])){
      if($_POST['choice1']=='HITAMO RAPORO...'){
        echo '
        <script type="text/javascript">
        alert("Nta raporo mwahisemo.");
        window.location="report.php";

        </script>';
      }

        $select1 = $_POST['choice1'];
        switch ($select1) {
            case 'abaturage':
                $select2 = $_POST['choice2'];
                switch($select2){
                    case 'none':
                        $pdf->SetFont('Arial','BU',12);
                        $pdf->Cell(0,10,"URUTONDE RW'ABATURAGE BOSE", 0, 1, 'C');
                        $pdf->Cell(0,10,'', 0, 1);
                        //build a query to bring every record under that email
                        $query = "SELECT umuturage.ubwisungane_id,ubwisungane.ubwisungane_name,umuturage.gender,umuturage.nationality,umuturage.ibyiciro_id,ibyiciro.ibyiciro_name as ibyiciro,
                        umuturage.icyo_akora,umuturage.tel,umuturage.nid,umuturage.umuturage_id,umuturage.first_name, umuturage.last_name,
                        umuturage.umuturage_dad, umuturage.umuturage_mum, umuturage.dob,umuturage.umuryango_id,nyirinzu.umuryango_id,nyirinzu.inzu_id,
                        inzu.inzu_id,inzu.igipangu_id,igipangu.igipangu_id,igipangu.isibo_id,isibo.isibo_id,isibo.isibo_name
                        FROM `umuturage`,`nyirinzu`,`inzu`,`igipangu`,`isibo`,`ibyiciro`,`ubwisungane`
                        WHERE umuturage.umuryango_id = nyirinzu.umuryango_id
                        AND ibyiciro.ibyiciro_id = umuturage.ibyiciro_id
                        AND ubwisungane.ubwisungane_id = umuturage.ubwisungane_id
                        AND nyirinzu.inzu_id = inzu.inzu_id
                        AND inzu.igipangu_id = igipangu.igipangu_id
                        AND igipangu.isibo_id = isibo.isibo_id
                        ORDER BY umuturage.first_name ASC";
                        $pdf->SetFont('Arial','B',8);
                        //execute the query and keep the result in result variable
                        $res = mysqli_query($con,$query);
                        $count =1;
                        $pdf->Cell(5,8,'No', 1, 0);
                        $pdf->Cell(45,8,"AMAZINA YOMBI", 1, 0, 'C');
                        $pdf->Cell(20,8,'IMYAKA', 1, 0, 'C');
                        $pdf->Cell(15,8,'IGITSINA', 1, 0, 'C');
                        $pdf->Cell(30,8,'IKIMURANGA', 1, 0, 'C');
                        $pdf->Cell(20,8,'TEL', 1, 0, 'C');
                        $pdf->Cell(20,8,'ICYICIRO', 1, 0, 'C');
                        $pdf->Cell(20,8,'KWIVUZA', 1, 0, 'C');
                        $pdf->Cell(30,8,'AKAZI', 1, 0, 'C');
                        $pdf->Cell(30,8,'UBWENEGIHUGU', 1, 0, 'C');
                        $pdf->Cell(35,8,'ISIBO', 1, 1, 'C');
                        $pdf->SetFont('Arial','', 8);
                        while($umuturage = mysqli_fetch_assoc($res)){
                            //UMUTURAGE DATA

                            $fullname = $umuturage['first_name'].' '.$umuturage['last_name'];
                            $tel = $umuturage['tel'];
                            $dob = $umuturage['dob'];
                            $job = $umuturage['icyo_akora'];
                            $id = $umuturage['nid'];
                            $gender = $umuturage['gender'];
                            $nationality = $umuturage['nationality'];
                            $icyiciro = $umuturage['ibyiciro'];
                            $ubwisungane = $umuturage['ubwisungane_name'];
                            $isibo = $umuturage['isibo_name'];
                            $pdf->Cell(5,8,$count++, 1, 0);
                            $pdf->Cell(45,8,$fullname, 1, 0);
                            $pdf->Cell(20,8,$dob, 1, 0);
                            $pdf->Cell(15,8,$gender, 1, 0);
                            $pdf->Cell(30,8,$id, 1, 0);
                            $pdf->Cell(20,8,$tel, 1, 0);
                            $pdf->Cell(20,8,$icyiciro, 1, 0);
                            $pdf->Cell(20,8,$ubwisungane, 1, 0);
                            $pdf->Cell(30,8,$job, 1, 0);
                            $pdf->Cell(30,8,$nationality, 1, 0);
                            $pdf->Cell(35,8,$isibo, 1, 1);

                        }
                        break;

                        case 'umuganda':
                            $pdf->SetFont('Arial','BU',12);
                            $pdf->Cell(0,10,"URUTONDE RW'ABATURAGE BAGOMBA KWITABIRA UMUGANDA", 0, 1, 'C');
                            $pdf->Cell(0,10,'', 0, 1);
                            //build a query to bring every record under that email
                            $query = "SELECT umuturage.ubwisungane_id,ubwisungane.ubwisungane_name,umuturage.gender,umuturage.nationality,umuturage.ibyiciro_id,ibyiciro.ibyiciro_name as ibyiciro,
                            umuturage.icyo_akora,umuturage.tel,umuturage.nid,umuturage.umuturage_id,umuturage.first_name, umuturage.last_name,
                            umuturage.umuturage_dad, umuturage.umuturage_mum, umuturage.dob,umuturage.umuryango_id,nyirinzu.umuryango_id,nyirinzu.inzu_id,
                            inzu.inzu_id,inzu.igipangu_id,igipangu.igipangu_id,igipangu.isibo_id,isibo.isibo_id,isibo.isibo_name
                            FROM `umuturage`,`nyirinzu`,`inzu`,`igipangu`,`isibo`,`ibyiciro`,`ubwisungane`
                            WHERE umuturage.umuryango_id = nyirinzu.umuryango_id
                            AND ibyiciro.ibyiciro_id = umuturage.ibyiciro_id
                            AND ubwisungane.ubwisungane_id = umuturage.ubwisungane_id
                            AND nyirinzu.inzu_id = inzu.inzu_id
                            AND inzu.igipangu_id = igipangu.igipangu_id
                            AND igipangu.isibo_id = isibo.isibo_id
                            AND TIMESTAMPDIFF(YEAR, umuturage.dob, now()) >= 18
                            AND TIMESTAMPDIFF(YEAR, umuturage.dob, now()) <= 70
                            ORDER BY umuturage.first_name ASC";
                            $pdf->SetFont('Arial','B',8);
                            //execute the query and keep the result in result variable
                            $res = mysqli_query($con,$query);
                            $count =1;
                            $pdf->Cell(5,8,'No', 1, 0);
                            $pdf->Cell(45,8,"AMAZINA YOMBI", 1, 0, 'C');
                            $pdf->Cell(20,8,'IMYAKA', 1, 0, 'C');
                            $pdf->Cell(15,8,'IGITSINA', 1, 0, 'C');
                            $pdf->Cell(30,8,'IKIMURANGA', 1, 0, 'C');
                            $pdf->Cell(20,8,'TEL', 1, 0, 'C');
                            $pdf->Cell(15,8,'ICYICIRO', 1, 0, 'C');
                            $pdf->Cell(25,8,'UBWISUNGANE', 1, 0, 'C');
                            $pdf->Cell(30,8,'AKAZI', 1, 0, 'C');
                            $pdf->Cell(30,8,'UBWENEGIHUGU', 1, 0, 'C');
                            $pdf->Cell(35,8,'ISIBO', 1, 1, 'C');
                            $pdf->SetFont('Arial','', 8);
                            while($umuturage = mysqli_fetch_assoc($res)){
                                //UMUTURAGE DATA

                                $fullname = $umuturage['first_name'].' '.$umuturage['last_name'];
                                $tel = $umuturage['tel'];
                                $dob = $umuturage['dob'];
                                $job = $umuturage['icyo_akora'];
                                $id = $umuturage['nid'];
                                $gender = $umuturage['gender'];
                                $nationality = $umuturage['nationality'];
                                $icyiciro = $umuturage['ibyiciro'];
                                $ubwisungane = $umuturage['ubwisungane_name'];
                                $isibo = $umuturage['isibo_name'];
                                $pdf->Cell(5,8,$count++, 1, 0);
                                $pdf->Cell(45,8,$fullname, 1, 0);
                                $pdf->Cell(20,8,$dob, 1, 0);
                                $pdf->Cell(15,8,$gender, 1, 0);
                                $pdf->Cell(30,8,$id, 1, 0);
                                $pdf->Cell(20,8,$tel, 1, 0);
                                $pdf->Cell(15,8,$icyiciro, 1, 0);
                                $pdf->Cell(25,8,$ubwisungane, 1, 0);
                                $pdf->Cell(30,8,$job, 1, 0);
                                $pdf->Cell(30,8,$nationality, 1, 0);
                                $pdf->Cell(35,8,$isibo, 1, 1);

                            }
                            break;

                    case 'ubwisungane':
                        $select3 = $_POST['choice3'];
                        $insuranceName = mysqli_query($con,"SELECT * FROM ubwisungane WHERE ubwisungane_id = $select3 ORDER BY `ubwisungane_id` ASC");
                        $row = mysqli_fetch_array($insuranceName);
                        if($select3==0){
                            $name = "BWOSE";
                        }
                        else{
                            $name = $row['ubwisungane_name'];
                        }
                        $pdf->SetFont('Arial','BU',12);
                        $pdf->Cell(0,10,"RAPORO Y'UBWISUNGANE MU KWIVUZA ($name)", 0, 1, 'C');
                        $pdf->Cell(0,10,'', 0, 1);
                        //build a query to bring every record under that email
                        if ($select3 == '0') {
                            $query = "SELECT  umuturage.first_name as firstname, umuturage.dob as dob,umuturage.nid as id, umuturage.last_name as lastname,umuturage.tel as tel, umuturage.icyo_akora as akazi, umuturage.nationality as nationality, umuturage.gender as gender, ibyiciro.ibyiciro_name as ibyiciro, ubwisungane.ubwisungane_name as ubwisungane,
                            umuturage.umuryango_id,nyirinzu.umuryango_id,nyirinzu.inzu_id,inzu.inzu_id,inzu.igipangu_id,igipangu.igipangu_id,igipangu.isibo_id,isibo.isibo_id,isibo.isibo_name ";
                            $query.= "FROM umuturage,ibyiciro,ubwisungane,nyirinzu,inzu,igipangu,isibo ";
                            $query.= "WHERE ibyiciro.ibyiciro_id = umuturage.ibyiciro_id ";
                            $query.= "AND ubwisungane.ubwisungane_id = umuturage.ubwisungane_id
                            AND umuturage.umuryango_id = nyirinzu.umuryango_id
                            AND nyirinzu.inzu_id = inzu.inzu_id
                            AND inzu.igipangu_id = igipangu.igipangu_id
                            AND igipangu.isibo_id = isibo.isibo_id
                            ORDER BY ubwisungane ASC";
                        } else {
                            $query = "SELECT  umuturage.first_name as firstname, umuturage.dob as dob,umuturage.nid as id, umuturage.last_name as lastname,umuturage.tel as tel, umuturage.icyo_akora as akazi,
                            umuturage.nationality as nationality, umuturage.gender as gender, ibyiciro.ibyiciro_name as ibyiciro, ubwisungane.ubwisungane_name as ubwisungane,
                            umuturage.umuryango_id,nyirinzu.umuryango_id,nyirinzu.inzu_id,inzu.inzu_id,inzu.igipangu_id,igipangu.igipangu_id,igipangu.isibo_id,isibo.isibo_id,isibo.isibo_name
                            FROM umuturage,ibyiciro,ubwisungane,nyirinzu,inzu,igipangu,isibo
                            WHERE umuturage.ubwisungane_id = '$select3'
                            AND ibyiciro.ibyiciro_id = umuturage.ibyiciro_id
                            AND ubwisungane.ubwisungane_id = umuturage.ubwisungane_id
                            AND umuturage.umuryango_id = nyirinzu.umuryango_id
                            AND nyirinzu.inzu_id = inzu.inzu_id
                            AND inzu.igipangu_id = igipangu.igipangu_id
                            AND igipangu.isibo_id = isibo.isibo_id
                            ORDER BY ubwisungane ASC";
                        }
                        $pdf->SetFont('Arial','B',8);
                        //execute the query and keep the result in result variable
                        $res = mysqli_query($con,$query);
                        $count =1;
                        $pdf->Cell(5,8,'No', 1, 0);
                        $pdf->Cell(45,8,"AMAZINA YOMBI", 1, 0, 'C');
                        $pdf->Cell(20,8,'IMYAKA', 1, 0, 'C');
                        $pdf->Cell(15,8,'IGITSINA', 1, 0, 'C');
                        $pdf->Cell(30,8,'IKIMURANGA', 1, 0, 'C');
                        $pdf->Cell(20,8,'TEL', 1, 0, 'C');
                        $pdf->Cell(15,8,'ICYICIRO', 1, 0, 'C');
                        $pdf->Cell(25,8,'UBWISUNGANE', 1, 0, 'C');
                        $pdf->Cell(30,8,'AKAZI', 1, 0, 'C');
                        $pdf->Cell(30,8,'UBWENEGIHUGU', 1, 0, 'C');
                        $pdf->Cell(25,8,'ISIBO', 1, 1, 'C');
                        $pdf->SetFont('Arial','', 8);
                        while($umuturage = mysqli_fetch_assoc($res)){
                            //UMUTURAGE DATA
                            $fullname = $tel = $dob = $job = $icyiciro = $gender = $nationality = $inshingano = $ubwisungane = '';
                            $fullname = $umuturage['firstname'].' '.$umuturage['lastname'];
                            $tel = $umuturage['tel'];
                            $dob = $umuturage['dob'];
                            $job = $umuturage['akazi'];
                            $id = $umuturage['id'];
                            $gender = $umuturage['gender'];
                            $isibo = $umuturage['isibo_name'];
                            $nationality = $umuturage['nationality'];
                            $icyiciro = $umuturage['ibyiciro'];
                            $ubwisungane = $umuturage['ubwisungane'];
                            $pdf->Cell(5,8,$count++, 1, 0);
                            $pdf->Cell(45,8,$fullname, 1, 0);
                            $pdf->Cell(20,8,$dob, 1, 0);
                            $pdf->Cell(15,8,$gender, 1, 0);
                            $pdf->Cell(30,8,$id, 1, 0);
                            $pdf->Cell(20,8,$tel, 1, 0);
                            $pdf->Cell(15,8,$icyiciro, 1, 0,'C');
                            $pdf->Cell(25,8,$ubwisungane, 1, 0);
                            $pdf->Cell(30,8,$job, 1, 0);
                            $pdf->Cell(30,8,$nationality, 1, 0);
                            $pdf->Cell(25,8,$isibo, 1, 1);

                        }
                        break;
                    case 'abanyamahanga':
                    $pdf->SetFont('Arial','BU',12);
                    $pdf->Cell(0,10,"URUTONDE RW'ABANYAMAHANGA", 0, 1, 'C');
                    $pdf->Cell(0,10,'', 0, 1);
                    //build a query to bring every record under that email
                    $query = "SELECT umuturage.ubwisungane_id,ubwisungane.ubwisungane_name,umuturage.gender,umuturage.nationality,umuturage.ibyiciro_id,ibyiciro.ibyiciro_name as ibyiciro,
                    umuturage.icyo_akora,umuturage.tel,umuturage.passport_id,umuturage.other_identification,umuturage.umuturage_id,umuturage.first_name, umuturage.last_name,
                    umuturage.umuturage_dad, umuturage.umuturage_mum, umuturage.dob,umuturage.umuryango_id,nyirinzu.umuryango_id,nyirinzu.inzu_id,
                    inzu.inzu_id,inzu.igipangu_id,igipangu.igipangu_id,igipangu.isibo_id,isibo.isibo_id,isibo.isibo_name
                    FROM umuturage,nyirinzu,inzu,igipangu,isibo,ibyiciro,ubwisungane
                    WHERE umuturage.umuryango_id = nyirinzu.umuryango_id
                    AND umuturage.nationality NOT LIKE '%rwanda%'
                    AND ibyiciro.ibyiciro_id = umuturage.ibyiciro_id
                    AND ubwisungane.ubwisungane_id = umuturage.ubwisungane_id
                    AND nyirinzu.inzu_id = inzu.inzu_id
                    AND inzu.igipangu_id = igipangu.igipangu_id
                    AND igipangu.isibo_id = isibo.isibo_id
                    ORDER BY umuturage.first_name ASC";
                    $pdf->SetFont('Arial','B',8);
                    //execute the query and keep the result in result variable
                    $res = mysqli_query($con,$query);
                    $count =1;
                    $pdf->Cell(5,8,'No', 1, 0);
                    $pdf->Cell(45,8,"AMAZINA YOMBI", 1, 0, 'C');
                    $pdf->Cell(20,8,'IMYAKA', 1, 0, 'C');
                    $pdf->Cell(15,8,'IGITSINA', 1, 0, 'C');
                    $pdf->Cell(30,8,'UBWENEGIHUGU', 1, 0, 'C');
                    $pdf->Cell(30,8,'PASIPORO', 1, 0, 'C');
                    $pdf->Cell(30,8,'IKINDI KIMURANGA', 1, 0, 'C');
                    $pdf->Cell(20,8,'TEL', 1, 0, 'C');
                    $pdf->Cell(20,8,'ICYICIRO', 1, 0, 'C');
                    $pdf->Cell(20,8,'KWIVUZA', 1, 0, 'C');
                    $pdf->Cell(30,8,'AKAZI', 1, 0, 'C');
                    $pdf->Cell(35,8,'ISIBO', 1, 1, 'C');
                    $pdf->SetFont('Arial','', 8);
                    while($umuturage = mysqli_fetch_assoc($res)){
                        //UMUTURAGE DATA

                        $fullname = $umuturage['first_name'].' '.$umuturage['last_name'];
                        $tel = $umuturage['tel'];
                        $dob = $umuturage['dob'];
                        $job = $umuturage['icyo_akora'];
                        $id = $umuturage['passport_id'];
                        $gender = $umuturage['gender'];
                        $nationality = $umuturage['nationality'];
                        $other = $umuturage['other_identification'];
                        $icyiciro = $umuturage['ibyiciro'];
                        $ubwisungane = $umuturage['ubwisungane_name'];
                        $isibo = $umuturage['isibo_name'];
                        $pdf->Cell(5,8,$count++, 1, 0);
                        $pdf->Cell(45,8,$fullname, 1, 0);
                        $pdf->Cell(20,8,$dob, 1, 0);
                        $pdf->Cell(15,8,$gender, 1, 0);
                        $pdf->Cell(30,8,$nationality, 1, 0);
                        $pdf->Cell(30,8,$id, 1, 0);
                        $pdf->Cell(30,8,$other, 1, 0);
                        $pdf->Cell(20,8,$tel, 1, 0);
                        $pdf->Cell(20,8,$icyiciro, 1, 0);
                        $pdf->Cell(20,8,$ubwisungane, 1, 0);
                        $pdf->Cell(30,8,$job, 1, 0);
                        $pdf->Cell(35,8,$isibo, 1, 1);

                    }
                        break;
                    case 'abadafiteIbyangombwa':
                    $pdf->SetFont('Arial','BU',12);
                    $pdf->Cell(0,10,"URUTONDE RW'ABATURAGE BADAFITE IBYANGOMBWA", 0, 1, 'C');
                    $pdf->Cell(0,10,'', 0, 1);
                    //build a query to bring every record under that email
                    $query = "SELECT umuturage.ubwisungane_id,ubwisungane.ubwisungane_name,umuturage.gender,umuturage.nationality,umuturage.ibyiciro_id,ibyiciro.ibyiciro_name as ibyiciro,
                    umuturage.icyo_akora,umuturage.tel,umuturage.nid,umuturage.passport_id,umuturage.other_identification,umuturage.impamvu_atagifite,umuturage.umuturage_id,umuturage.first_name, umuturage.last_name,
                    umuturage.umuturage_dad, umuturage.umuturage_mum, umuturage.dob,umuturage.umuryango_id,nyirinzu.umuryango_id,nyirinzu.inzu_id,
                    inzu.inzu_id,inzu.igipangu_id,igipangu.igipangu_id,igipangu.isibo_id,isibo.isibo_id,isibo.isibo_name
                    FROM `umuturage`,`nyirinzu`,`inzu`,`igipangu`,`isibo`,`ibyiciro`,`ubwisungane`
                    WHERE umuturage.umuryango_id = nyirinzu.umuryango_id
                    AND umuturage.impamvu_atagifite != '-'
                    AND ibyiciro.ibyiciro_id = umuturage.ibyiciro_id
                    AND ubwisungane.ubwisungane_id = umuturage.ubwisungane_id
                    AND nyirinzu.inzu_id = inzu.inzu_id
                    AND inzu.igipangu_id = igipangu.igipangu_id
                    AND igipangu.isibo_id = isibo.isibo_id
                    AND TIMESTAMPDIFF(YEAR, umuturage.dob, now()) >= 18
                    ORDER BY umuturage.first_name ASC";

                    $pdf->SetFont('Arial','B',8);
                    //execute the query and keep the result in result variable
                    $res = mysqli_query($con,$query);
                    $count =1;
                    $pdf->Cell(5,8,'No', 1, 0);
                    $pdf->Cell(45,8,"AMAZINA YOMBI", 1, 0, 'C');
                    $pdf->Cell(20,8,'IMYAKA', 1, 0, 'C');
                    $pdf->Cell(15,8,'IGITSINA', 1, 0, 'C');
                    $pdf->Cell(30,8,'IMPAMVU ATAGIFITE', 1, 0, 'C');
                    $pdf->Cell(20,8,'TEL', 1, 0, 'C');
                    $pdf->Cell(20,8,'ICYICIRO', 1, 0, 'C');
                    $pdf->Cell(20,8,'KWIVUZA', 1, 0, 'C');
                    $pdf->Cell(30,8,'AKAZI', 1, 0, 'C');
                    $pdf->Cell(30,8,'UBWENEGIHUGU', 1, 0, 'C');
                    $pdf->Cell(35,8,'ISIBO', 1, 1, 'C');
                    $pdf->SetFont('Arial','', 8);
                    while($umuturage = mysqli_fetch_assoc($res)){
                        //UMUTURAGE DATA

                        $fullname = $umuturage['first_name'].' '.$umuturage['last_name'];
                        $tel = $umuturage['tel'];
                        $dob = $umuturage['dob'];
                        $job = $umuturage['icyo_akora'];
                        $id = $umuturage['impamvu_atagifite'];
                        $gender = $umuturage['gender'];
                        $nationality = $umuturage['nationality'];
                        $icyiciro = $umuturage['ibyiciro'];
                        $ubwisungane = $umuturage['ubwisungane_name'];
                        $isibo = $umuturage['isibo_name'];
                        $pdf->Cell(5,8,$count++, 1, 0);
                        $pdf->Cell(45,8,$fullname, 1, 0);
                        $pdf->Cell(20,8,$dob, 1, 0);
                        $pdf->Cell(15,8,$gender, 1, 0);
                        $pdf->Cell(30,8,$id, 1, 0);
                        $pdf->Cell(20,8,$tel, 1, 0);
                        $pdf->Cell(20,8,$icyiciro, 1, 0);
                        $pdf->Cell(20,8,$ubwisungane, 1, 0);
                        $pdf->Cell(30,8,$job, 1, 0);
                        $pdf->Cell(30,8,$nationality, 1, 0);
                        $pdf->Cell(35,8,$isibo, 1, 1);

                    }
                        break;
                    case 'abamugaye':
                    $pdf->SetFont('Arial','BU',12);
                    $pdf->Cell(0,10,"URUTONDE RW'ABATURAGE BABANA N'UBUMUGA", 0, 1, 'C');
                    $pdf->Cell(0,10,'', 0, 1);
                    //build a query to bring every record under that email
                    $query = "SELECT umuturage.ubwisungane_id,ubwisungane.ubwisungane_name,umuturage.gender,umuturage.nationality,umuturage.ibyiciro_id,ibyiciro.ibyiciro_name as ibyiciro,
                    umuturage.icyo_akora,umuturage.tel,umuturage.nid,umuturage.passport_id,umuturage.other_identification,umuturage.ubumuga_details,umuturage.impamvu_atagifite,umuturage.umuturage_id,umuturage.first_name, umuturage.last_name,
                    umuturage.umuturage_dad, umuturage.umuturage_mum, umuturage.dob,umuturage.umuryango_id,nyirinzu.umuryango_id,nyirinzu.inzu_id,
                    inzu.inzu_id,inzu.igipangu_id,igipangu.igipangu_id,igipangu.isibo_id,isibo.isibo_id,isibo.isibo_name
                    FROM `umuturage`,`nyirinzu`,`inzu`,`igipangu`,`isibo`,`ibyiciro`,`ubwisungane`
                    WHERE umuturage.umuryango_id = nyirinzu.umuryango_id
                    AND umuturage.ubumuga_details != '-'
                    AND ibyiciro.ibyiciro_id = umuturage.ibyiciro_id
                    AND ubwisungane.ubwisungane_id = umuturage.ubwisungane_id
                    AND nyirinzu.inzu_id = inzu.inzu_id
                    AND inzu.igipangu_id = igipangu.igipangu_id
                    AND igipangu.isibo_id = isibo.isibo_id
                    ORDER BY umuturage.first_name ASC";
                    $pdf->SetFont('Arial','B',8);
                    //execute the query and keep the result in result variable
                    $res = mysqli_query($con,$query);
                    $count =1;
                    $pdf->Cell(5,8,'No', 1, 0);
                    $pdf->Cell(45,8,"AMAZINA YOMBI", 1, 0, 'C');
                    $pdf->Cell(20,8,'IMYAKA', 1, 0, 'C');
                    $pdf->Cell(15,8,'IGITSINA', 1, 0, 'C');
                    $pdf->Cell(33,8,'UBUMUGA', 1, 0, 'C');
                    $pdf->Cell(17,8,'TEL', 1, 0, 'C');
                    $pdf->Cell(20,8,'ICYICIRO', 1, 0, 'C');
                    $pdf->Cell(20,8,'KWIVUZA', 1, 0, 'C');
                    $pdf->Cell(30,8,'INDANGAMUNTU', 1, 0, 'C');
                    $pdf->Cell(30,8,'UBWENEGIHUGU', 1, 0, 'C');
                    $pdf->Cell(35,8,'ISIBO', 1, 1, 'C');
                    $pdf->SetFont('Arial','', 8);
                    while($umuturage = mysqli_fetch_assoc($res)){
                        //UMUTURAGE DATA

                        $fullname = $umuturage['first_name'].' '.$umuturage['last_name'];
                        $tel = $umuturage['tel'];
                        $dob = $umuturage['dob'];
                        $nid = $umuturage['nid'];
                        $id = $umuturage['ubumuga_details'];
                        $gender = $umuturage['gender'];
                        $nationality = $umuturage['nationality'];
                        $icyiciro = $umuturage['ibyiciro'];
                        $ubwisungane = $umuturage['ubwisungane_name'];
                        $isibo = $umuturage['isibo_name'];
                        $pdf->Cell(5,8,$count++, 1, 0);
                        $pdf->Cell(45,8,$fullname, 1, 0);
                        $pdf->Cell(20,8,$dob, 1, 0);
                        $pdf->Cell(15,8,$gender, 1, 0);
                        $pdf->Cell(33,8,$id, 1, 0);
                        $pdf->Cell(17,8,$tel, 1, 0);
                        $pdf->Cell(20,8,$icyiciro, 1, 0);
                        $pdf->Cell(20,8,$ubwisungane, 1, 0);
                        $pdf->Cell(30,8,$nid, 1, 0);
                        $pdf->Cell(30,8,$nationality, 1, 0);
                        $pdf->Cell(35,8,$isibo, 1, 1);

                    }
                        break;
                    case 'abafunzwe':
                    $pdf->SetFont('Arial','BU',12);
                    $pdf->Cell(0,10,"URUTONDE RW'ABATURAGE BAFUNZWE MURI GEREZA UBU", 0, 1, 'C');
                    $pdf->Cell(0,10,'', 0, 1);
                    //build a query to bring every record under that email
                    $query = "SELECT umuturage.ubwisungane_id,ubwisungane.ubwisungane_name,umuturage.gender,umuturage.nationality,umuturage.ibyiciro_id,ibyiciro.ibyiciro_name as ibyiciro,
                    umuturage.icyo_akora,umuturage.tel,umuturage.nid,umuturage.passport_id,umuturage.other_identification,umuturage.ubumuga_details,umuturage.impamvu_atagifite,umuturage.umuturage_id,umuturage.first_name, umuturage.last_name,
                    umuturage.umuturage_dad, umuturage.umuturage_mum, umuturage.dob,umuturage.umuryango_id,nyirinzu.umuryango_id,nyirinzu.inzu_id,
                    inzu.inzu_id,inzu.igipangu_id,igipangu.igipangu_id,igipangu.isibo_id,isibo.isibo_id,isibo.isibo_name
                    FROM `umuturage`,`nyirinzu`,`inzu`,`igipangu`,`isibo`,`ibyiciro`,`ubwisungane`
                    WHERE umuturage.umuryango_id = nyirinzu.umuryango_id
                    AND umuturage.gufungwa_status = 'Ntabwo afunzwe'
                    AND ibyiciro.ibyiciro_id = umuturage.ibyiciro_id
                    AND ubwisungane.ubwisungane_id = umuturage.ubwisungane_id
                    AND nyirinzu.inzu_id = inzu.inzu_id
                    AND inzu.igipangu_id = igipangu.igipangu_id
                    AND igipangu.isibo_id = isibo.isibo_id
                    ORDER BY umuturage.first_name ASC";
                    $pdf->SetFont('Arial','B',8);
                    //execute the query and keep the result in result variable
                    $res = mysqli_query($con,$query);
                    $count =1;
                    $pdf->Cell(5,8,'No', 1, 0);
                    $pdf->Cell(45,8,"AMAZINA YOMBI", 1, 0, 'C');
                    $pdf->Cell(20,8,'IMYAKA', 1, 0, 'C');
                    $pdf->Cell(15,8,'IGITSINA', 1, 0, 'C');
                    $pdf->Cell(17,8,'TEL', 1, 0, 'C');
                    $pdf->Cell(20,8,'ICYICIRO', 1, 0, 'C');
                    $pdf->Cell(20,8,'KWIVUZA', 1, 0, 'C');
                    $pdf->Cell(30,8,'AKAZI', 1, 0, 'C');
                    $pdf->Cell(30,8,'UBWENEGIHUGU', 1, 0, 'C');
                    $pdf->Cell(35,8,'ISIBO', 1, 1, 'C');
                    $pdf->SetFont('Arial','', 8);
                    while($umuturage = mysqli_fetch_assoc($res)){
                        //UMUTURAGE DATA

                        $fullname = $umuturage['first_name'].' '.$umuturage['last_name'];
                        $tel = $umuturage['tel'];
                        $dob = $umuturage['dob'];
                        $job = $umuturage['icyo_akora'];
                        $gender = $umuturage['gender'];
                        $nationality = $umuturage['nationality'];
                        $icyiciro = $umuturage['ibyiciro'];
                        $ubwisungane = $umuturage['ubwisungane_name'];
                        $isibo = $umuturage['isibo_name'];
                        $pdf->Cell(5,8,$count++, 1, 0);
                        $pdf->Cell(45,8,$fullname, 1, 0);
                        $pdf->Cell(20,8,$dob, 1, 0);
                        $pdf->Cell(15,8,$gender, 1, 0);
                        $pdf->Cell(17,8,$tel, 1, 0);
                        $pdf->Cell(20,8,$icyiciro, 1, 0);
                        $pdf->Cell(20,8,$ubwisungane, 1, 0);
                        $pdf->Cell(30,8,$job, 1, 0);
                        $pdf->Cell(30,8,$nationality, 1, 0);
                        $pdf->Cell(35,8,$isibo, 1, 1);

                    }
                        break;

                        case 'ahobaba':
                        $pdf->SetFont('Arial','BU',12);
                        $pdf->Cell(0,10,"RAPORO Y'AHO BURI MUTURAGE ATUYE", 0, 1, 'C');
                        $pdf->Cell(0,10,'', 0, 1);
                        //build a query to bring every record under that email
                        $query = "SELECT umuturage.ubwisungane_id,ubwisungane.ubwisungane_name,umuturage.gender,umuturage.nationality,umuturage.ibyiciro_id,ibyiciro.ibyiciro_name as ibyiciro,
                        umuturage.icyo_akora,umuturage.tel,umuturage.nid,umuturage.passport_id,umuturage.other_identification,umuturage.ubumuga_details,umuturage.impamvu_atagifite,umuturage.umuturage_id,umuturage.first_name, umuturage.last_name,
                        umuturage.umuturage_dad, umuturage.umuturage_mum, umuturage.dob,umuturage.umuryango_id,nyirinzu.umuryango_id,nyirinzu.inzu_id,
                        inzu.inzu_id,inzu.owner_name,inzu.igipangu_id,igipangu.igipangu_id,igipangu.address_code,igipangu.isibo_id,isibo.isibo_id,isibo.isibo_name
                        FROM `umuturage`,`nyirinzu`,`inzu`,`igipangu`,`isibo`,`ibyiciro`,`ubwisungane`
                        WHERE umuturage.umuryango_id = nyirinzu.umuryango_id
                        AND ibyiciro.ibyiciro_id = umuturage.ibyiciro_id
                        AND ubwisungane.ubwisungane_id = umuturage.ubwisungane_id
                        AND nyirinzu.inzu_id = inzu.inzu_id
                        AND inzu.igipangu_id = igipangu.igipangu_id
                        AND igipangu.isibo_id = isibo.isibo_id
                        ORDER BY umuturage.first_name ASC";
                        $pdf->SetFont('Arial','B',8);
                        //execute the query and keep the result in result variable
                        $res = mysqli_query($con,$query);
                        $count =1;
                        $pdf->Cell(5,8,'No', 1, 0);
                        $pdf->Cell(45,8,"AMAZINA YOMBI", 1, 0, 'C');
                        $pdf->Cell(20,8,'IMYAKA', 1, 0, 'C');
                        $pdf->Cell(15,8,'IGITSINA', 1, 0, 'C');
                        $pdf->Cell(20,8,'TEL', 1, 0, 'C');
                        $pdf->Cell(20,8,'ICYICIRO', 1, 0, 'C');
                        $pdf->Cell(35,8,'ISIBO', 1, 0, 'C');
                        $pdf->Cell(50,8,'IGIPANGU', 1, 0, 'C');
                        $pdf->Cell(65,8,'INZU', 1, 1, 'C');
                        $pdf->SetFont('Arial','', 8);
                        while($umuturage = mysqli_fetch_assoc($res)){
                            //UMUTURAGE DATA

                            $fullname = $umuturage['first_name'].' '.$umuturage['last_name'];
                            $tel = $umuturage['tel'];
                            $dob = $umuturage['dob'];
                            $job = $umuturage['icyo_akora'];
                            $gender = $umuturage['gender'];
                            $house = $umuturage['owner_name'];
                            $icyiciro = $umuturage['ibyiciro'];
                            $igipangu = $umuturage['address_code'];
                            $isibo = $umuturage['isibo_name'];
                            $pdf->Cell(5,8,$count++, 1, 0);
                            $pdf->Cell(45,8,$fullname, 1, 0);
                            $pdf->Cell(20,8,$dob, 1, 0);
                            $pdf->Cell(15,8,$gender, 1, 0);
                            $pdf->Cell(20,8,$tel, 1, 0);
                            $pdf->Cell(20,8,$icyiciro, 1, 0);
                            $pdf->Cell(35,8,$isibo, 1, 0);
                            $pdf->Cell(50,8,$igipangu, 1, 0,'C');
                            $pdf->Cell(65,8,$house, 1, 1,'C');

                        }
                            break;
                }
                break;
            case 'abayobozi':
                $select2 = $_POST['choice2'];
                switch($select2){
                    case 'mutwarasibo':
                        //chief from isibo table

                        //ddddddddd

                        $pdf->SetFont('Arial','BU',12);
                        //ISIBO INFORMATION
                        $qIsibo = "SELECT * ";
                        $qIsibo.= "FROM isibo";
                        $runIsibo = mysqli_query($con, $qIsibo);
                        $isibo_name = mysqli_fetch_assoc($runIsibo);
                        $pdf->Cell(0,10,"URUTONDE RW'ABAYOBOZI B'AMASIBO", 0, 1, 'C');

                        //build a query to bring every record under that email
                        $query = "SELECT umuturage.first_name as firstname,umuturage.gender as gender,umuyobozi_isibo.umuturage_id,umuyobozi_isibo.isibo_id, umuturage.dob as dob,umuturage.nid as id, umuturage.last_name as lastname,umuturage.tel as tel, umuturage.icyo_akora as akazi, inshingano.inshingano_name as inshingano, inshingano.aho_bireba as focus,umuturage.gender as gender,isibo.isibo_name
                                  FROM umuturage,inshingano,umuyobozi_isibo,isibo,ibyiciro
                                  WHERE (inshingano.inshingano_id = umuturage.inshingano_id OR inshingano.inshingano_id = umuturage.inshingano2_id OR inshingano.inshingano_id=umuturage.inshingano3_id)
                                  AND (umuturage.inshingano_id != 1 OR umuturage.inshingano2_id != 1 OR umuturage.inshingano3_id != 1)
                                  AND inshingano.aho_bireba = 'Isibo'
                                  AND umuyobozi_isibo.umuturage_id = umuturage.umuturage_id
                                  AND umuyobozi_isibo.isibo_id = isibo.isibo_id
                                  AND ibyiciro.ibyiciro_id = umuturage.ibyiciro_id
                                  ORDER BY isibo.isibo_id ASC";
                        $pdf->SetFont('Arial','B',8);
                        $pdf->Cell(0,10,'', 0, 1);
                        //execute the query and keep the result in result variable
                        $res = mysqli_query($con,$query);
                        $count =1;
                        $pdf->Cell(5,8,'No', 1, 0);
                        $pdf->Cell(55,8,"AMAZINA YOMBI", 1, 0, 'C');
                        $pdf->Cell(40,8,'ITARIKI YAVUKIYEHO', 1, 0, 'C');
                        $pdf->Cell(15,8,'IGITSINA', 1, 0, 'C');
                        $pdf->Cell(30,8,'IKIMURANGA', 1, 0, 'C');
                        $pdf->Cell(20,8,'TEL', 1, 0, 'C');
                        $pdf->Cell(55,8,'INSHINGANO', 1, 0, 'C');
                        $pdf->Cell(45,8,'ISIBO AYOBORA', 1, 1, 'C');
                        $pdf->SetFont('Arial','', 8);
                        while($umuturage = mysqli_fetch_assoc($res)){
                            //UMUTURAGE DATA
                            $fullname = $umuturage['firstname'].' '.$umuturage['lastname'];
                            $tel = $umuturage['tel'];
                            $dob = $umuturage['dob'];
                            $job = $umuturage['akazi'];
                            $id = $umuturage['id'];
                            $gender = $umuturage['gender'];
                            $inshingano = $umuturage['inshingano'];
                            $isibo = $umuturage['isibo_name'];
                            $pdf->Cell(5,8,$count++, 1, 0);
                            $pdf->Cell(55,8,$fullname, 1, 0);
                            $pdf->Cell(40,8,$dob, 1, 0);
                            $pdf->Cell(15,8,$gender, 1, 0);
                            $pdf->Cell(30,8,$id, 1, 0);
                            $pdf->Cell(20,8,$tel, 1, 0);
                            $pdf->Cell(55,8,$inshingano, 1, 0);
                            $pdf->Cell(45,8,$isibo, 1, 1);
                        }

                        break;

                        //dddddddd
                        case 'umugoroba':
                        $pdf->SetFont('Arial','BU',12);
                        //ISIBO INFORMATION

                        $pdf->Cell(0,10,"URUTONDE RWA KOMITE Y'UMUGOROBA W'UMURYANGO", 0, 1, 'C');

                        //build a query to bring every record under that email
                        $query = "SELECT umuturage.first_name as firstname,umuturage.gender as gender, umuturage.dob as dob,umuturage.nid as id, umuturage.last_name as lastname,umuturage.tel as tel, umuturage.icyo_akora as akazi, inshingano.inshingano_name as inshingano, inshingano.aho_bireba as focus,umuturage.gender as gender
                                  FROM umuturage,inshingano
                                  WHERE (inshingano.inshingano_id = umuturage.inshingano_id OR inshingano.inshingano_id = umuturage.inshingano2_id OR inshingano.inshingano_id=umuturage.inshingano3_id)
                                  AND (inshingano.aho_bireba='Umugoroba w''umuryango')";
                        $pdf->SetFont('Arial','B',8);
                        $pdf->Cell(0,10,'', 0, 1);
                        //execute the query and keep the result in result variable
                        $res = mysqli_query($con,$query);
                        $count =1;
                        $pdf->Cell(5,8,'No', 1, 0);
                        $pdf->Cell(55,8,"AMAZINA YOMBI", 1, 0, 'C');
                        $pdf->Cell(40,8,'ITARIKI YAVUKIYEHO', 1, 0, 'C');
                        $pdf->Cell(15,8,'IGITSINA', 1, 0, 'C');
                        $pdf->Cell(30,8,'IKIMURANGA', 1, 0, 'C');
                        $pdf->Cell(20,8,'TEL', 1, 0, 'C');
                        $pdf->Cell(55,8,'INSHINGANO', 1, 1, 'C');
                        $pdf->SetFont('Arial','', 8);
                        while($umuturage = mysqli_fetch_assoc($res)){
                            //UMUTURAGE DATA
                            $fullname = $umuturage['firstname'].' '.$umuturage['lastname'];
                            $tel = $umuturage['tel'];
                            $dob = $umuturage['dob'];
                            $job = $umuturage['akazi'];
                            $id = $umuturage['id'];
                            $gender = $umuturage['gender'];
                            $inshingano = $umuturage['inshingano'];
                            $pdf->Cell(5,8,$count++, 1, 0);
                            $pdf->Cell(55,8,$fullname, 1, 0);
                            $pdf->Cell(40,8,$dob, 1, 0);
                            $pdf->Cell(15,8,$gender, 1, 0);
                            $pdf->Cell(30,8,$id, 1, 0);
                            $pdf->Cell(20,8,$tel, 1, 0);
                            $pdf->Cell(55,8,$inshingano, 1, 1);
                        }
                            break;


                    case 'umudugudu':
                    $pdf->SetFont('Arial','BU',12);
                    //ISIBO INFORMATION

                    $pdf->Cell(0,10,"URUTONDE RWA KOMITE NYOBOZI Y'UMUDUGUDU", 0, 1, 'C');

                    //build a query to bring every record under that email
                    $query = "SELECT umuturage.first_name as firstname,umuturage.gender as gender, umuturage.dob as dob,umuturage.nid as id, umuturage.last_name as lastname,umuturage.tel as tel, umuturage.icyo_akora as akazi, inshingano.inshingano_name as inshingano, inshingano.aho_bireba as focus,umuturage.gender as gender
                              FROM umuturage,inshingano,ibyiciro
                              WHERE (inshingano.inshingano_id = umuturage.inshingano_id OR inshingano.inshingano_id = umuturage.inshingano2_id OR inshingano.inshingano_id=umuturage.inshingano3_id)
                              AND (umuturage.inshingano_id != 1 OR umuturage.inshingano2_id != 1 OR umuturage.inshingano3_id != 1)
                              AND inshingano.aho_bireba = 'Umudugudu'
                              AND ibyiciro.ibyiciro_id = umuturage.ibyiciro_id";
                    $pdf->SetFont('Arial','B',8);
                    $pdf->Cell(0,10,'', 0, 1);
                    //execute the query and keep the result in result variable
                    $res = mysqli_query($con,$query);
                    $count =1;
                    $pdf->Cell(5,8,'No', 1, 0);
                    $pdf->Cell(55,8,"AMAZINA YOMBI", 1, 0, 'C');
                    $pdf->Cell(40,8,'ITARIKI YAVUKIYEHO', 1, 0, 'C');
                    $pdf->Cell(15,8,'IGITSINA', 1, 0, 'C');
                    $pdf->Cell(30,8,'IKIMURANGA', 1, 0, 'C');
                    $pdf->Cell(20,8,'TEL', 1, 0, 'C');
                    $pdf->Cell(55,8,'INSHINGANO', 1, 1, 'C');
                    $pdf->SetFont('Arial','', 8);
                    while($umuturage = mysqli_fetch_assoc($res)){
                        //UMUTURAGE DATA
                        $fullname = $umuturage['firstname'].' '.$umuturage['lastname'];
                        $tel = $umuturage['tel'];
                        $dob = $umuturage['dob'];
                        $job = $umuturage['akazi'];
                        $id = $umuturage['id'];
                        $gender = $umuturage['gender'];
                        $inshingano = $umuturage['inshingano'];
                        $pdf->Cell(5,8,$count++, 1, 0);
                        $pdf->Cell(55,8,$fullname, 1, 0);
                        $pdf->Cell(40,8,$dob, 1, 0);
                        $pdf->Cell(15,8,$gender, 1, 0);
                        $pdf->Cell(30,8,$id, 1, 0);
                        $pdf->Cell(20,8,$tel, 1, 0);
                        $pdf->Cell(55,8,$inshingano, 1, 1);
                    }
                        break;
                    case 'ubudehe':
                    $pdf->SetFont('Arial','BU',12);
                    //ISIBO INFORMATION

                    $pdf->Cell(0,10,"URUTONDE RWA KOMITE NYOBOZI Y'UBUDEHE", 0, 1, 'C');

                    //build a query to bring every record under that email
                    $query = "SELECT umuturage.first_name as firstname,umuturage.gender as gender, umuturage.dob as dob,umuturage.nid as id, umuturage.last_name as lastname,umuturage.tel as tel, umuturage.icyo_akora as akazi, inshingano.inshingano_name as inshingano, inshingano.aho_bireba as focus,umuturage.gender as gender
                              FROM umuturage,inshingano
                              WHERE (inshingano.inshingano_id = umuturage.inshingano_id OR inshingano.inshingano_id = umuturage.inshingano2_id OR inshingano.inshingano_id=umuturage.inshingano3_id)
                              AND (inshingano.aho_bireba='Ubudehe')";
                    $pdf->SetFont('Arial','B',8);
                    $pdf->Cell(0,10,'', 0, 1);
                    //execute the query and keep the result in result variable
                    $res = mysqli_query($con,$query);
                    $count =1;
                    $pdf->Cell(5,8,'No', 1, 0);
                    $pdf->Cell(55,8,"AMAZINA YOMBI", 1, 0, 'C');
                    $pdf->Cell(40,8,'ITARIKI YAVUKIYEHO', 1, 0, 'C');
                    $pdf->Cell(15,8,'IGITSINA', 1, 0, 'C');
                    $pdf->Cell(30,8,'IKIMURANGA', 1, 0, 'C');
                    $pdf->Cell(20,8,'TEL', 1, 0, 'C');
                    $pdf->Cell(55,8,'INSHINGANO', 1, 1, 'C');
                    $pdf->SetFont('Arial','', 8);
                    while($umuturage = mysqli_fetch_assoc($res)){
                        //UMUTURAGE DATA
                        $fullname = $umuturage['firstname'].' '.$umuturage['lastname'];
                        $tel = $umuturage['tel'];
                        $dob = $umuturage['dob'];
                        $job = $umuturage['akazi'];
                        $id = $umuturage['id'];
                        $gender = $umuturage['gender'];
                        $inshingano = $umuturage['inshingano'];
                        $pdf->Cell(5,8,$count++, 1, 0);
                        $pdf->Cell(55,8,$fullname, 1, 0);
                        $pdf->Cell(40,8,$dob, 1, 0);
                        $pdf->Cell(15,8,$gender, 1, 0);
                        $pdf->Cell(30,8,$id, 1, 0);
                        $pdf->Cell(20,8,$tel, 1, 0);
                        $pdf->Cell(55,8,$inshingano, 1, 1);
                    }
                        break;
                    case 'abajyanamaUbuzima':
                    $pdf->SetFont('Arial','BU',12);
                    //ISIBO INFORMATION

                    $pdf->Cell(0,10,"URUTONDE RW'ABAJYANAMA B'UBUZIMA", 0, 1, 'C');

                    //build a query to bring every record under that email
                    $query = "SELECT umuturage.first_name as firstname,umuturage.gender as gender, umuturage.dob as dob,umuturage.nid as id, umuturage.last_name as lastname,umuturage.tel as tel, umuturage.icyo_akora as akazi, inshingano.inshingano_name as inshingano, inshingano.aho_bireba as focus,umuturage.gender as gender
                              FROM umuturage,inshingano
                              WHERE (inshingano.inshingano_id = umuturage.inshingano_id OR inshingano.inshingano_id = umuturage.inshingano2_id OR inshingano.inshingano_id=umuturage.inshingano3_id)
                              AND (inshingano.inshingano_id=31)";
                    $pdf->SetFont('Arial','B',8);
                    $pdf->Cell(0,10,'', 0, 1);
                    //execute the query and keep the result in result variable
                    $res = mysqli_query($con,$query);
                    $count =1;
                    $pdf->Cell(5,8,'No', 1, 0);
                    $pdf->Cell(55,8,"AMAZINA YOMBI", 1, 0, 'C');
                    $pdf->Cell(40,8,'ITARIKI YAVUKIYEHO', 1, 0, 'C');
                    $pdf->Cell(15,8,'IGITSINA', 1, 0, 'C');
                    $pdf->Cell(30,8,'IKIMURANGA', 1, 0, 'C');
                    $pdf->Cell(20,8,'TEL', 1, 0, 'C');
                    $pdf->Cell(55,8,'INSHINGANO', 1, 1, 'C');
                    $pdf->SetFont('Arial','', 8);
                    while($umuturage = mysqli_fetch_assoc($res)){
                        //UMUTURAGE DATA
                        $fullname = $umuturage['firstname'].' '.$umuturage['lastname'];
                        $tel = $umuturage['tel'];
                        $dob = $umuturage['dob'];
                        $job = $umuturage['akazi'];
                        $id = $umuturage['id'];
                        $gender = $umuturage['gender'];
                        $inshingano = $umuturage['inshingano'];
                        $pdf->Cell(5,8,$count++, 1, 0);
                        $pdf->Cell(55,8,$fullname, 1, 0);
                        $pdf->Cell(40,8,$dob, 1, 0);
                        $pdf->Cell(15,8,$gender, 1, 0);
                        $pdf->Cell(30,8,$id, 1, 0);
                        $pdf->Cell(20,8,$tel, 1, 0);
                        $pdf->Cell(55,8,$inshingano, 1, 1);
                    }
                        break;
                    case 'inshutiUmuryango':
                    $pdf->SetFont('Arial','BU',12);
                    //ISIBO INFORMATION

                    $pdf->Cell(0,10,"URUTONDE RW'INSHUTI Z'UMURYANGO", 0, 1, 'C');

                    //build a query to bring every record under that email
                    $query = "SELECT umuturage.first_name as firstname,umuturage.gender as gender, umuturage.dob as dob,umuturage.nid as id, umuturage.last_name as lastname,umuturage.tel as tel, umuturage.icyo_akora as akazi, inshingano.inshingano_name as inshingano, inshingano.aho_bireba as focus,umuturage.gender as gender
                              FROM umuturage,inshingano
                              WHERE (inshingano.inshingano_id = umuturage.inshingano_id OR inshingano.inshingano_id = umuturage.inshingano2_id OR inshingano.inshingano_id=umuturage.inshingano3_id)
                              AND (inshingano.inshingano_id=37)";
                    $pdf->SetFont('Arial','B',8);
                    $pdf->Cell(0,10,'', 0, 1);
                    //execute the query and keep the result in result variable
                    $res = mysqli_query($con,$query);
                    $count =1;
                    $pdf->Cell(5,8,'No', 1, 0);
                    $pdf->Cell(55,8,"AMAZINA YOMBI", 1, 0, 'C');
                    $pdf->Cell(40,8,'ITARIKI YAVUKIYEHO', 1, 0, 'C');
                    $pdf->Cell(15,8,'IGITSINA', 1, 0, 'C');
                    $pdf->Cell(30,8,'IKIMURANGA', 1, 0, 'C');
                    $pdf->Cell(20,8,'TEL', 1, 0, 'C');
                    $pdf->Cell(55,8,'INSHINGANO', 1, 1, 'C');
                    $pdf->SetFont('Arial','', 8);
                    while($umuturage = mysqli_fetch_assoc($res)){
                        //UMUTURAGE DATA
                        $fullname = $umuturage['firstname'].' '.$umuturage['lastname'];
                        $tel = $umuturage['tel'];
                        $dob = $umuturage['dob'];
                        $job = $umuturage['akazi'];
                        $id = $umuturage['id'];
                        $gender = $umuturage['gender'];
                        $inshingano = $umuturage['inshingano'];
                        $pdf->Cell(5,8,$count++, 1, 0);
                        $pdf->Cell(55,8,$fullname, 1, 0);
                        $pdf->Cell(40,8,$dob, 1, 0);
                        $pdf->Cell(15,8,$gender, 1, 0);
                        $pdf->Cell(30,8,$id, 1, 0);
                        $pdf->Cell(20,8,$tel, 1, 0);
                        $pdf->Cell(55,8,$inshingano, 1, 1);
                    }
                        break;
                    case 'urubyiruko':
                    $pdf->SetFont('Arial','BU',12);
                    //ISIBO INFORMATION

                    $pdf->Cell(0,10,"URUTONDE RWA KOMITE NYOBOZI Y'URUBYIRUKO (CNJ)", 0, 1, 'C');

                    //build a query to bring every record under that email
                    $query = "SELECT umuturage.first_name as firstname,umuturage.gender as gender, umuturage.dob as dob,umuturage.nid as id, umuturage.last_name as lastname,umuturage.tel as tel, umuturage.icyo_akora as akazi, inshingano.inshingano_name as inshingano, inshingano.aho_bireba as focus,umuturage.gender as gender
                              FROM umuturage,inshingano
                              WHERE (inshingano.inshingano_id = umuturage.inshingano_id OR inshingano.inshingano_id = umuturage.inshingano2_id OR inshingano.inshingano_id=umuturage.inshingano3_id)
                              AND (inshingano.aho_bireba='CNJ')";
                    $pdf->SetFont('Arial','B',8);
                    $pdf->Cell(0,10,'', 0, 1);
                    //execute the query and keep the result in result variable
                    $res = mysqli_query($con,$query);
                    $count =1;
                    $pdf->Cell(5,8,'No', 1, 0);
                    $pdf->Cell(55,8,"AMAZINA YOMBI", 1, 0, 'C');
                    $pdf->Cell(40,8,'ITARIKI YAVUKIYEHO', 1, 0, 'C');
                    $pdf->Cell(15,8,'IGITSINA', 1, 0, 'C');
                    $pdf->Cell(30,8,'IKIMURANGA', 1, 0, 'C');
                    $pdf->Cell(20,8,'TEL', 1, 0, 'C');
                    $pdf->Cell(55,8,'INSHINGANO', 1, 1, 'C');
                    $pdf->SetFont('Arial','', 8);
                    while($umuturage = mysqli_fetch_assoc($res)){
                        //UMUTURAGE DATA
                        $fullname = $umuturage['firstname'].' '.$umuturage['lastname'];
                        $tel = $umuturage['tel'];
                        $dob = $umuturage['dob'];
                        $job = $umuturage['akazi'];
                        $id = $umuturage['id'];
                        $gender = $umuturage['gender'];
                        $inshingano = $umuturage['inshingano'];
                        $pdf->Cell(5,8,$count++, 1, 0);
                        $pdf->Cell(55,8,$fullname, 1, 0);
                        $pdf->Cell(40,8,$dob, 1, 0);
                        $pdf->Cell(15,8,$gender, 1, 0);
                        $pdf->Cell(30,8,$id, 1, 0);
                        $pdf->Cell(20,8,$tel, 1, 0);
                        $pdf->Cell(55,8,$inshingano, 1, 1);
                    }
                        break;
                    case 'CNF':
                    $pdf->SetFont('Arial','BU',12);
                    //ISIBO INFORMATION

                    $pdf->Cell(0,10,"URUTONDE RWA KOMITE NYOBOZI YA CNF", 0, 1, 'C');

                    //build a query to bring every record under that email
                    $query = "SELECT umuturage.first_name as firstname,umuturage.gender as gender, umuturage.dob as dob,umuturage.nid as id, umuturage.last_name as lastname,umuturage.tel as tel, umuturage.icyo_akora as akazi, inshingano.inshingano_name as inshingano, inshingano.aho_bireba as focus,umuturage.gender as gender
                              FROM umuturage,inshingano
                              WHERE (inshingano.inshingano_id = umuturage.inshingano_id OR inshingano.inshingano_id = umuturage.inshingano2_id OR inshingano.inshingano_id=umuturage.inshingano3_id)
                              AND (inshingano.aho_bireba='CNF')";
                    $pdf->SetFont('Arial','B',8);
                    $pdf->Cell(0,10,'', 0, 1);
                    //execute the query and keep the result in result variable
                    $res = mysqli_query($con,$query);
                    $count =1;
                    $pdf->Cell(5,8,'No', 1, 0);
                    $pdf->Cell(55,8,"AMAZINA YOMBI", 1, 0, 'C');
                    $pdf->Cell(40,8,'ITARIKI YAVUKIYEHO', 1, 0, 'C');
                    $pdf->Cell(15,8,'IGITSINA', 1, 0, 'C');
                    $pdf->Cell(30,8,'IKIMURANGA', 1, 0, 'C');
                    $pdf->Cell(20,8,'TEL', 1, 0, 'C');
                    $pdf->Cell(55,8,'INSHINGANO', 1, 1, 'C');
                    $pdf->SetFont('Arial','', 8);
                    while($umuturage = mysqli_fetch_assoc($res)){
                        //UMUTURAGE DATA
                        $fullname = $umuturage['firstname'].' '.$umuturage['lastname'];
                        $tel = $umuturage['tel'];
                        $dob = $umuturage['dob'];
                        $job = $umuturage['akazi'];
                        $id = $umuturage['id'];
                        $gender = $umuturage['gender'];
                        $inshingano = $umuturage['inshingano'];
                        $pdf->Cell(5,8,$count++, 1, 0);
                        $pdf->Cell(55,8,$fullname, 1, 0);
                        $pdf->Cell(40,8,$dob, 1, 0);
                        $pdf->Cell(15,8,$gender, 1, 0);
                        $pdf->Cell(30,8,$id, 1, 0);
                        $pdf->Cell(20,8,$tel, 1, 0);
                        $pdf->Cell(55,8,$inshingano, 1, 1);
                    }
                        break;
                }
                break;
            case 'abana':
                $select2 = $_POST['choice2'];
                switch($select2){
                    case 'none':
                        $pdf->SetFont('Arial','BU',12);
                        $pdf->Cell(0,10,"RAPORO Y'ABANA BOSE", 0, 1, 'C');
                        $pdf->Cell(0,10,'', 0, 1);
                        //build a query to bring every record under that email
                        $query = "SELECT  umuturage.first_name as firstname, umuturage.dob as dob,umuturage.nid as id, umuturage.last_name as lastname,umuturage.tel as tel, umuturage.icyo_akora as akazi, inshingano.inshingano_name as inshingano, umuturage.gender as gender, ibyiciro.ibyiciro_name as ibyiciro, ubwisungane.ubwisungane_name as ubwisungane ";
                        $query.= "FROM umuturage,ibyiciro,ubwisungane,inshingano ";
                        $query.= "WHERE not umuturage.inshingano_id = 1 ";
                        $query.= "AND ibyiciro.ibyiciro_id = umuturage.ibyiciro_id ";
                        $query.= "AND ubwisungane.ubwisungane_id = umuturage.ubwisungane_id";

                        $pdf->SetFont('Arial','B',8);
                        //execute the query and keep the result in result variable
                        $res = mysqli_query($con,$query);
                        $count =1;
                        $pdf->Cell(5,8,'No', 1, 0);
                        $pdf->Cell(46,8,"AMAZINA YOMBI", 1, 0, 'C');
                        $pdf->Cell(16,8,'IMYAKA', 1, 0, 'C');
                        $pdf->Cell(15,8,'IGITSINA', 1, 0, 'C');
                        $pdf->Cell(28,8,'IKIMURANGA', 1, 0, 'C');
                        $pdf->Cell(20,8,'TEL', 1, 0, 'C');
                        $pdf->Cell(15,8,'ICYICIRO', 1, 0, 'C');
                        $pdf->Cell(20,8,'KWIVUZA', 1, 0, 'C');
                        $pdf->Cell(30,8,'AKAZI', 1, 0, 'C');
                        $pdf->Cell(55,8,'INSHINGANO', 1, 0, 'C');
                        $pdf->Cell(15,8,'IGIPANGU', 1, 0, 'C');
                        $pdf->Cell(15,8,'INZU', 1, 1, 'C');
                        $pdf->SetFont('Arial','', 8);
                        while($umuturage = mysqli_fetch_assoc($res)){
                            //UMUTURAGE DATA
                            $fullname = $tel = $dob = $job = $icyiciro = $gender  = $inshingano = $ubwisungane = '';
                            $fullname = $umuturage['firstname'].' '.$umuturage['lastname'];
                            $tel = $umuturage['tel'];
                            $dob = $umuturage['dob'];
                            $job = $umuturage['akazi'];
                            $id = $umuturage['id'];
                            $gender = $umuturage['gender'];
                            $inshingano = $umuturage['inshingano'];
                            $icyiciro = $umuturage['ibyiciro'];
                            $ubwisungane = $umuturage['ubwisungane'];
                            $pdf->Cell(5,8,$count++, 1, 0);
                            $pdf->Cell(46,8,$fullname, 1, 0);
                            $pdf->Cell(16,8,$dob, 1, 0);
                            $pdf->Cell(15,8,$gender, 1, 0);
                            $pdf->Cell(28,8,$id, 1, 0);
                            $pdf->Cell(20,8,$tel, 1, 0);
                            $pdf->Cell(15,8,$icyiciro, 1, 0);
                            $pdf->Cell(20,8,$ubwisungane, 1, 0);
                            $pdf->Cell(30,8,$job, 1, 0);
                            $pdf->Cell(55,8,$inshingano, 1, 0);
                            $pdf->Cell(15,8,"igipangu", 1, 0);
                            $pdf->Cell(15,8,"inzu", 1, 1);
                        }
                        break;
                    case 'imirire':
                        $pdf->SetFont('Arial','BU',12);
                        $pdf->Cell(0,10,"RAPORO Y'IMIRIRE Y'ABANA", 0, 1, 'C');
                        $pdf->Cell(0,10,'', 0, 1);
                        //build a query to bring every record under that email
                        $query = "SELECT  umuturage.first_name as firstname, umuturage.dob as dob,umuturage.nid as id, umuturage.last_name as lastname,umuturage.tel as tel, umuturage.icyo_akora as akazi, inshingano.inshingano_name as inshingano, umuturage.gender as gender, ibyiciro.ibyiciro_name as ibyiciro, ubwisungane.ubwisungane_name as ubwisungane ";
                        $query.= "FROM umuturage,ibyiciro,ubwisungane,inshingano ";
                        $query.= "WHERE not umuturage.inshingano_id = 1 ";
                        $query.= "AND ibyiciro.ibyiciro_id = umuturage.ibyiciro_id ";
                        $query.= "AND ubwisungane.ubwisungane_id = umuturage.ubwisungane_id";

                        $pdf->SetFont('Arial','B',8);
                        //execute the query and keep the result in result variable
                        $res = mysqli_query($con,$query);
                        $count =1;
                        $pdf->Cell(5,8,'No', 1, 0);
                        $pdf->Cell(46,8,"AMAZINA YOMBI", 1, 0, 'C');
                        $pdf->Cell(16,8,'IMYAKA', 1, 0, 'C');
                        $pdf->Cell(15,8,'IGITSINA', 1, 0, 'C');
                        $pdf->Cell(28,8,'IKIMURANGA', 1, 0, 'C');
                        $pdf->Cell(20,8,'TEL', 1, 0, 'C');
                        $pdf->Cell(15,8,'ICYICIRO', 1, 0, 'C');
                        $pdf->Cell(20,8,'KWIVUZA', 1, 0, 'C');
                        $pdf->Cell(30,8,'AKAZI', 1, 0, 'C');
                        $pdf->Cell(55,8,'INSHINGANO', 1, 0, 'C');
                        $pdf->Cell(15,8,'IGIPANGU', 1, 0, 'C');
                        $pdf->Cell(15,8,'INZU', 1, 1, 'C');
                        $pdf->SetFont('Arial','', 8);
                        while($umuturage = mysqli_fetch_assoc($res)){
                            //UMUTURAGE DATA
                            $fullname = $tel = $dob = $job = $icyiciro = $gender  = $inshingano = $ubwisungane = '';
                            $fullname = $umuturage['firstname'].' '.$umuturage['lastname'];
                            $tel = $umuturage['tel'];
                            $dob = $umuturage['dob'];
                            $job = $umuturage['akazi'];
                            $id = $umuturage['id'];
                            $gender = $umuturage['gender'];
                            $inshingano = $umuturage['inshingano'];
                            $icyiciro = $umuturage['ibyiciro'];
                            $ubwisungane = $umuturage['ubwisungane'];
                            $pdf->Cell(5,8,$count++, 1, 0);
                            $pdf->Cell(46,8,$fullname, 1, 0);
                            $pdf->Cell(16,8,$dob, 1, 0);
                            $pdf->Cell(15,8,$gender, 1, 0);
                            $pdf->Cell(28,8,$id, 1, 0);
                            $pdf->Cell(20,8,$tel, 1, 0);
                            $pdf->Cell(15,8,$icyiciro, 1, 0);
                            $pdf->Cell(20,8,$ubwisungane, 1, 0);
                            $pdf->Cell(30,8,$job, 1, 0);
                            $pdf->Cell(55,8,$inshingano, 1, 0);
                            $pdf->Cell(15,8,"igipangu", 1, 0);
                            $pdf->Cell(15,8,"inzu", 1, 1);
                        }
                        break;
                    case 'imyigire':
                        $pdf->SetFont('Arial','BU',12);
                        $pdf->Cell(0,10,"RAPORO Y'IMYIGIRE Y'ABANA", 0, 1, 'C');
                        $pdf->Cell(0,10,'', 0, 1);
                        //build a query to bring every record under that email
                        $query = "SELECT  umuturage.first_name as firstname, umuturage.dob as dob,umuturage.nid as id, umuturage.last_name as lastname,umuturage.tel as tel, umuturage.icyo_akora as akazi, inshingano.inshingano_name as inshingano, umuturage.gender as gender, ibyiciro.ibyiciro_name as ibyiciro, ubwisungane.ubwisungane_name as ubwisungane ";
                        $query.= "FROM umuturage,ibyiciro,ubwisungane,inshingano ";
                        $query.= "WHERE not umuturage.inshingano_id = 1 ";
                        $query.= "AND ibyiciro.ibyiciro_id = umuturage.ibyiciro_id ";
                        $query.= "AND ubwisungane.ubwisungane_id = umuturage.ubwisungane_id";

                        $pdf->SetFont('Arial','B',8);
                        //execute the query and keep the result in result variable
                        $res = mysqli_query($con,$query);
                        $count =1;
                        $pdf->Cell(5,8,'No', 1, 0);
                        $pdf->Cell(46,8,"AMAZINA YOMBI", 1, 0, 'C');
                        $pdf->Cell(16,8,'IMYAKA', 1, 0, 'C');
                        $pdf->Cell(15,8,'IGITSINA', 1, 0, 'C');
                        $pdf->Cell(28,8,'IKIMURANGA', 1, 0, 'C');
                        $pdf->Cell(20,8,'TEL', 1, 0, 'C');
                        $pdf->Cell(15,8,'ICYICIRO', 1, 0, 'C');
                        $pdf->Cell(20,8,'KWIVUZA', 1, 0, 'C');
                        $pdf->Cell(30,8,'AKAZI', 1, 0, 'C');
                        $pdf->Cell(55,8,'INSHINGANO', 1, 0, 'C');
                        $pdf->Cell(15,8,'IGIPANGU', 1, 0, 'C');
                        $pdf->Cell(15,8,'INZU', 1, 1, 'C');
                        $pdf->SetFont('Arial','', 8);
                        while($umuturage = mysqli_fetch_assoc($res)){
                            //UMUTURAGE DATA
                            $fullname = $tel = $dob = $job = $icyiciro = $gender  = $inshingano = $ubwisungane = '';
                            $fullname = $umuturage['firstname'].' '.$umuturage['lastname'];
                            $tel = $umuturage['tel'];
                            $dob = $umuturage['dob'];
                            $job = $umuturage['akazi'];
                            $id = $umuturage['id'];
                            $gender = $umuturage['gender'];
                            $inshingano = $umuturage['inshingano'];
                            $icyiciro = $umuturage['ibyiciro'];
                            $ubwisungane = $umuturage['ubwisungane'];
                            $pdf->Cell(5,8,$count++, 1, 0);
                            $pdf->Cell(46,8,$fullname, 1, 0);
                            $pdf->Cell(16,8,$dob, 1, 0);
                            $pdf->Cell(15,8,$gender, 1, 0);
                            $pdf->Cell(28,8,$id, 1, 0);
                            $pdf->Cell(20,8,$tel, 1, 0);
                            $pdf->Cell(15,8,$icyiciro, 1, 0);
                            $pdf->Cell(20,8,$ubwisungane, 1, 0);
                            $pdf->Cell(30,8,$job, 1, 0);
                            $pdf->Cell(55,8,$inshingano, 1, 0);
                            $pdf->Cell(15,8,"igipangu", 1, 0);
                            $pdf->Cell(15,8,"inzu", 1, 1);
                        }
                        break;
                }
                break;
            case 'abagore':
                $select2 = $_POST['choice2'];
                switch($select2){
                    case 'none':
                        $pdf->SetFont('Arial','BU',12);
                        $pdf->Cell(0,10,"RAPORO Y'ABAGORE BOSE", 0, 1, 'C');
                        $pdf->Cell(0,10,'', 0, 1);
                        //build a query to bring every record under that email
                        $query = "SELECT  umuturage.first_name as firstname, umuturage.dob as dob,umuturage.nid as id, umuturage.last_name as lastname,umuturage.tel as tel, umuturage.icyo_akora as akazi, umuturage.nationality as nationality, umuturage.gender as gender, ibyiciro.ibyiciro_name as ibyiciro, ubwisungane.ubwisungane_name as ubwisungane ";
                        $query.= "FROM umuturage,ibyiciro,ubwisungane ";
                        $query.= "WHERE ibyiciro.ibyiciro_id = umuturage.ibyiciro_id ";
                        $query.= "AND ubwisungane.ubwisungane_id = umuturage.ubwisungane_id";
                        $pdf->SetFont('Arial','B',8);
                        //execute the query and keep the result in result variable
                        $res = mysqli_query($con,$query);
                        $count =1;
                        $pdf->Cell(5,8,'No', 1, 0);
                        $pdf->Cell(40,8,"AMAZINA YOMBI", 1, 0, 'C');
                        $pdf->Cell(20,8,'IMYAKA', 1, 0, 'C');
                        $pdf->Cell(15,8,'IGITSINA', 1, 0, 'C');
                        $pdf->Cell(30,8,'IKIMURANGA', 1, 0, 'C');
                        $pdf->Cell(20,8,'TEL', 1, 0, 'C');
                        $pdf->Cell(15,8,'ICYICIRO', 1, 0, 'C');
                        $pdf->Cell(20,8,'KWIVUZA', 1, 0, 'C');
                        $pdf->Cell(20,8,'AKAZI', 1, 0, 'C');
                        $pdf->Cell(30,8,'UBWENEGIHUGU', 1, 0, 'C');
                        $pdf->Cell(25,8,'ISIBO', 1, 0, 'C');
                        $pdf->Cell(15,8,'IGIPANGU', 1, 0, 'C');
                        $pdf->Cell(15,8,'INZU', 1, 1, 'C');
                        $pdf->SetFont('Arial','', 8);
                        while($umuturage = mysqli_fetch_assoc($res)){
                            //UMUTURAGE DATA
                            $fullname = $tel = $dob = $job = $icyiciro = $gender = $nationality = $inshingano = $ubwisungane = '';
                            $fullname = $umuturage['firstname'].' '.$umuturage['lastname'];
                            $tel = $umuturage['tel'];
                            $dob = $umuturage['dob'];
                            $job = $umuturage['akazi'];
                            $id = $umuturage['id'];
                            $gender = $umuturage['gender'];
                            $nationality = $umuturage['nationality'];
                            $icyiciro = $umuturage['ibyiciro'];
                            $ubwisungane = $umuturage['ubwisungane'];
                            $pdf->Cell(5,8,$count++, 1, 0);
                            $pdf->Cell(40,8,$fullname, 1, 0);
                            $pdf->Cell(20,8,$dob, 1, 0);
                            $pdf->Cell(15,8,$gender, 1, 0);
                            $pdf->Cell(30,8,$id, 1, 0);
                            $pdf->Cell(20,8,$tel, 1, 0);
                            $pdf->Cell(15,8,$icyiciro, 1, 0);
                            $pdf->Cell(20,8,$ubwisungane, 1, 0);
                            $pdf->Cell(20,8,$job, 1, 0);
                            $pdf->Cell(30,8,$nationality, 1, 0);
                            $pdf->Cell(25,8,"isibo", 1, 0);
                            $pdf->Cell(15,8,"igipangu", 1, 0);
                            $pdf->Cell(15,8,"inzu", 1, 1);

                        }
                        break;
                    case 'ababyariyeIwabo':
                        $pdf->SetFont('Arial','BU',12);
                        $pdf->Cell(0,10,"RAPORO Y'ABAKOBWA BABYARIYE IWABO BOSE", 0, 1, 'C');
                        $pdf->Cell(0,10,'', 0, 1);
                        //build a query to bring every record under that email
                        $query = "SELECT  umuturage.first_name as firstname, umuturage.dob as dob,umuturage.nid as id, umuturage.last_name as lastname,umuturage.tel as tel, umuturage.icyo_akora as akazi, umuturage.nationality as nationality, umuturage.gender as gender, ibyiciro.ibyiciro_name as ibyiciro, ubwisungane.ubwisungane_name as ubwisungane ";
                        $query.= "FROM umuturage,ibyiciro,ubwisungane ";
                        $query.= "WHERE ibyiciro.ibyiciro_id = umuturage.ibyiciro_id ";
                        $query.= "AND ubwisungane.ubwisungane_id = umuturage.ubwisungane_id";
                        $pdf->SetFont('Arial','B',8);
                        //execute the query and keep the result in result variable
                        $res = mysqli_query($con,$query);
                        $count =1;
                        $pdf->Cell(5,8,'No', 1, 0);
                        $pdf->Cell(40,8,"AMAZINA YOMBI", 1, 0, 'C');
                        $pdf->Cell(20,8,'IMYAKA', 1, 0, 'C');
                        $pdf->Cell(15,8,'IGITSINA', 1, 0, 'C');
                        $pdf->Cell(30,8,'IKIMURANGA', 1, 0, 'C');
                        $pdf->Cell(20,8,'TEL', 1, 0, 'C');
                        $pdf->Cell(15,8,'ICYICIRO', 1, 0, 'C');
                        $pdf->Cell(20,8,'KWIVUZA', 1, 0, 'C');
                        $pdf->Cell(20,8,'AKAZI', 1, 0, 'C');
                        $pdf->Cell(30,8,'UBWENEGIHUGU', 1, 0, 'C');
                        $pdf->Cell(25,8,'ISIBO', 1, 0, 'C');
                        $pdf->Cell(15,8,'IGIPANGU', 1, 0, 'C');
                        $pdf->Cell(15,8,'INZU', 1, 1, 'C');
                        $pdf->SetFont('Arial','', 8);
                        while($umuturage = mysqli_fetch_assoc($res)){
                            //UMUTURAGE DATA
                            $fullname = $tel = $dob = $job = $icyiciro = $gender = $nationality = $inshingano = $ubwisungane = '';
                            $fullname = $umuturage['firstname'].' '.$umuturage['lastname'];
                            $tel = $umuturage['tel'];
                            $dob = $umuturage['dob'];
                            $job = $umuturage['akazi'];
                            $id = $umuturage['id'];
                            $gender = $umuturage['gender'];
                            $nationality = $umuturage['nationality'];
                            $icyiciro = $umuturage['ibyiciro'];
                            $ubwisungane = $umuturage['ubwisungane'];
                            $pdf->Cell(5,8,$count++, 1, 0);
                            $pdf->Cell(40,8,$fullname, 1, 0);
                            $pdf->Cell(20,8,$dob, 1, 0);
                            $pdf->Cell(15,8,$gender, 1, 0);
                            $pdf->Cell(30,8,$id, 1, 0);
                            $pdf->Cell(20,8,$tel, 1, 0);
                            $pdf->Cell(15,8,$icyiciro, 1, 0);
                            $pdf->Cell(20,8,$ubwisungane, 1, 0);
                            $pdf->Cell(20,8,$job, 1, 0);
                            $pdf->Cell(30,8,$nationality, 1, 0);
                            $pdf->Cell(25,8,"isibo", 1, 0);
                            $pdf->Cell(15,8,"igipangu", 1, 0);
                            $pdf->Cell(15,8,"inzu", 1, 1);

                        }
                        break;
                    case 'abashatse':
                        $select3 = $_POST['choice3'];
                        switch ($select3) {
                            // abagore bose bashatse
                            case '0':
                                $pdf->SetFont('Arial','BU',12);
                                $pdf->Cell(0,10,"RAPORO Y'ABAGORE BOSE BUBATSE", 0, 1, 'C');
                                $pdf->Cell(0,10,'', 0, 1);
                                //build a query to bring every record under that email
                                $query = "SELECT  umuturage.first_name as firstname, umuturage.dob as dob,umuturage.nid as id, umuturage.last_name as lastname,umuturage.tel as tel, umuturage.icyo_akora as akazi, umuturage.nationality as nationality, umuturage.gender as gender, ibyiciro.ibyiciro_name as ibyiciro, ubwisungane.ubwisungane_name as ubwisungane ";
                                $query.= "FROM umuturage,ibyiciro,ubwisungane ";
                                $query.= "WHERE ibyiciro.ibyiciro_id = umuturage.ibyiciro_id ";
                                $query.= "AND ubwisungane.ubwisungane_id = umuturage.ubwisungane_id";
                                $pdf->SetFont('Arial','B',8);
                                //execute the query and keep the result in result variable
                                $res = mysqli_query($con,$query);
                                $count =1;
                                $pdf->Cell(5,8,'No', 1, 0);
                                $pdf->Cell(40,8,"AMAZINA YOMBI", 1, 0, 'C');
                                $pdf->Cell(20,8,'IMYAKA', 1, 0, 'C');
                                $pdf->Cell(15,8,'IGITSINA', 1, 0, 'C');
                                $pdf->Cell(30,8,'IKIMURANGA', 1, 0, 'C');
                                $pdf->Cell(20,8,'TEL', 1, 0, 'C');
                                $pdf->Cell(15,8,'ICYICIRO', 1, 0, 'C');
                                $pdf->Cell(20,8,'KWIVUZA', 1, 0, 'C');
                                $pdf->Cell(20,8,'AKAZI', 1, 0, 'C');
                                $pdf->Cell(30,8,'UBWENEGIHUGU', 1, 0, 'C');
                                $pdf->Cell(25,8,'ISIBO', 1, 0, 'C');
                                $pdf->Cell(15,8,'IGIPANGU', 1, 0, 'C');
                                $pdf->Cell(15,8,'INZU', 1, 1, 'C');
                                $pdf->SetFont('Arial','', 8);
                                while($umuturage = mysqli_fetch_assoc($res)){
                                    //UMUTURAGE DATA
                                    $fullname = $tel = $dob = $job = $icyiciro = $gender = $nationality = $inshingano = $ubwisungane = '';
                                    $fullname = $umuturage['firstname'].' '.$umuturage['lastname'];
                                    $tel = $umuturage['tel'];
                                    $dob = $umuturage['dob'];
                                    $job = $umuturage['akazi'];
                                    $id = $umuturage['id'];
                                    $gender = $umuturage['gender'];
                                    $nationality = $umuturage['nationality'];
                                    $icyiciro = $umuturage['ibyiciro'];
                                    $ubwisungane = $umuturage['ubwisungane'];
                                    $pdf->Cell(5,8,$count++, 1, 0);
                                    $pdf->Cell(40,8,$fullname, 1, 0);
                                    $pdf->Cell(20,8,$dob, 1, 0);
                                    $pdf->Cell(15,8,$gender, 1, 0);
                                    $pdf->Cell(30,8,$id, 1, 0);
                                    $pdf->Cell(20,8,$tel, 1, 0);
                                    $pdf->Cell(15,8,$icyiciro, 1, 0);
                                    $pdf->Cell(20,8,$ubwisungane, 1, 0);
                                    $pdf->Cell(20,8,$job, 1, 0);
                                    $pdf->Cell(30,8,$nationality, 1, 0);
                                    $pdf->Cell(25,8,"isibo", 1, 0);
                                    $pdf->Cell(15,8,"igipangu", 1, 0);
                                    $pdf->Cell(15,8,"inzu", 1, 1);

                                }
                            // abagore bashatse byemewe
                            case '1':
                                $pdf->SetFont('Arial','BU',12);
                                $pdf->Cell(0,10,"RAPORO Y'ABAGORE BOSE BUBATSE BITEMEWE", 0, 1, 'C');
                                $pdf->Cell(0,10,'', 0, 1);
                                //build a query to bring every record under that email
                                $query = "SELECT  umuturage.first_name as firstname, umuturage.dob as dob,umuturage.nid as id, umuturage.last_name as lastname,umuturage.tel as tel, umuturage.icyo_akora as akazi, umuturage.nationality as nationality, umuturage.gender as gender, ibyiciro.ibyiciro_name as ibyiciro, ubwisungane.ubwisungane_name as ubwisungane ";
                                $query.= "FROM umuturage,ibyiciro,ubwisungane ";
                                $query.= "WHERE ibyiciro.ibyiciro_id = umuturage.ibyiciro_id ";
                                $query.= "AND ubwisungane.ubwisungane_id = umuturage.ubwisungane_id";
                                $pdf->SetFont('Arial','B',8);
                                //execute the query and keep the result in result variable
                                $res = mysqli_query($con,$query);
                                $count =1;
                                $pdf->Cell(5,8,'No', 1, 0);
                                $pdf->Cell(40,8,"AMAZINA YOMBI", 1, 0, 'C');
                                $pdf->Cell(20,8,'IMYAKA', 1, 0, 'C');
                                $pdf->Cell(15,8,'IGITSINA', 1, 0, 'C');
                                $pdf->Cell(30,8,'IKIMURANGA', 1, 0, 'C');
                                $pdf->Cell(20,8,'TEL', 1, 0, 'C');
                                $pdf->Cell(15,8,'ICYICIRO', 1, 0, 'C');
                                $pdf->Cell(20,8,'KWIVUZA', 1, 0, 'C');
                                $pdf->Cell(20,8,'AKAZI', 1, 0, 'C');
                                $pdf->Cell(30,8,'UBWENEGIHUGU', 1, 0, 'C');
                                $pdf->Cell(25,8,'ISIBO', 1, 0, 'C');
                                $pdf->Cell(15,8,'IGIPANGU', 1, 0, 'C');
                                $pdf->Cell(15,8,'INZU', 1, 1, 'C');
                                $pdf->SetFont('Arial','', 8);
                                while($umuturage = mysqli_fetch_assoc($res)){
                                    //UMUTURAGE DATA
                                    $fullname = $tel = $dob = $job = $icyiciro = $gender = $nationality = $inshingano = $ubwisungane = '';
                                    $fullname = $umuturage['firstname'].' '.$umuturage['lastname'];
                                    $tel = $umuturage['tel'];
                                    $dob = $umuturage['dob'];
                                    $job = $umuturage['akazi'];
                                    $id = $umuturage['id'];
                                    $gender = $umuturage['gender'];
                                    $nationality = $umuturage['nationality'];
                                    $icyiciro = $umuturage['ibyiciro'];
                                    $ubwisungane = $umuturage['ubwisungane'];
                                    $pdf->Cell(5,8,$count++, 1, 0);
                                    $pdf->Cell(40,8,$fullname, 1, 0);
                                    $pdf->Cell(20,8,$dob, 1, 0);
                                    $pdf->Cell(15,8,$gender, 1, 0);
                                    $pdf->Cell(30,8,$id, 1, 0);
                                    $pdf->Cell(20,8,$tel, 1, 0);
                                    $pdf->Cell(15,8,$icyiciro, 1, 0);
                                    $pdf->Cell(20,8,$ubwisungane, 1, 0);
                                    $pdf->Cell(20,8,$job, 1, 0);
                                    $pdf->Cell(30,8,$nationality, 1, 0);
                                    $pdf->Cell(25,8,"isibo", 1, 0);
                                    $pdf->Cell(15,8,"igipangu", 1, 0);
                                    $pdf->Cell(15,8,"inzu", 1, 1);

                                }
                                break;
                            // abagore bashatse bitemewe
                            case '2':
                                $pdf->SetFont('Arial','BU',12);
                                $pdf->Cell(0,10,"RAPORO Y'ABAGORE BOSE", 0, 1, 'C');
                                $pdf->Cell(0,10,'', 0, 1);
                                //build a query to bring every record under that email
                                $query = "SELECT  umuturage.first_name as firstname, umuturage.dob as dob,umuturage.nid as id, umuturage.last_name as lastname,umuturage.tel as tel, umuturage.icyo_akora as akazi, umuturage.nationality as nationality, umuturage.gender as gender, ibyiciro.ibyiciro_name as ibyiciro, ubwisungane.ubwisungane_name as ubwisungane ";
                                $query.= "FROM umuturage,ibyiciro,ubwisungane ";
                                $query.= "WHERE ibyiciro.ibyiciro_id = umuturage.ibyiciro_id ";
                                $query.= "AND ubwisungane.ubwisungane_id = umuturage.ubwisungane_id";
                                $pdf->SetFont('Arial','B',8);
                                //execute the query and keep the result in result variable
                                $res = mysqli_query($con,$query);
                                $count =1;
                                $pdf->Cell(5,8,'No', 1, 0);
                                $pdf->Cell(40,8,"AMAZINA YOMBI", 1, 0, 'C');
                                $pdf->Cell(20,8,'IMYAKA', 1, 0, 'C');
                                $pdf->Cell(15,8,'IGITSINA', 1, 0, 'C');
                                $pdf->Cell(30,8,'IKIMURANGA', 1, 0, 'C');
                                $pdf->Cell(20,8,'TEL', 1, 0, 'C');
                                $pdf->Cell(15,8,'ICYICIRO', 1, 0, 'C');
                                $pdf->Cell(20,8,'KWIVUZA', 1, 0, 'C');
                                $pdf->Cell(20,8,'AKAZI', 1, 0, 'C');
                                $pdf->Cell(30,8,'UBWENEGIHUGU', 1, 0, 'C');
                                $pdf->Cell(25,8,'ISIBO', 1, 0, 'C');
                                $pdf->Cell(15,8,'IGIPANGU', 1, 0, 'C');
                                $pdf->Cell(15,8,'INZU', 1, 1, 'C');
                                $pdf->SetFont('Arial','', 8);
                                while($umuturage = mysqli_fetch_assoc($res)){
                                    //UMUTURAGE DATA
                                    $fullname = $tel = $dob = $job = $icyiciro = $gender = $nationality = $inshingano = $ubwisungane = '';
                                    $fullname = $umuturage['firstname'].' '.$umuturage['lastname'];
                                    $tel = $umuturage['tel'];
                                    $dob = $umuturage['dob'];
                                    $job = $umuturage['akazi'];
                                    $id = $umuturage['id'];
                                    $gender = $umuturage['gender'];
                                    $nationality = $umuturage['nationality'];
                                    $icyiciro = $umuturage['ibyiciro'];
                                    $ubwisungane = $umuturage['ubwisungane'];
                                    $pdf->Cell(5,8,$count++, 1, 0);
                                    $pdf->Cell(40,8,$fullname, 1, 0);
                                    $pdf->Cell(20,8,$dob, 1, 0);
                                    $pdf->Cell(15,8,$gender, 1, 0);
                                    $pdf->Cell(30,8,$id, 1, 0);
                                    $pdf->Cell(20,8,$tel, 1, 0);
                                    $pdf->Cell(15,8,$icyiciro, 1, 0);
                                    $pdf->Cell(20,8,$ubwisungane, 1, 0);
                                    $pdf->Cell(20,8,$job, 1, 0);
                                    $pdf->Cell(30,8,$nationality, 1, 0);
                                    $pdf->Cell(25,8,"isibo", 1, 0);
                                    $pdf->Cell(15,8,"igipangu", 1, 0);
                                    $pdf->Cell(15,8,"inzu", 1, 1);

                                }
                                break;
                        }
                }
                break;
            case 'urubyiruko':
                $choice2 = $_POST['choice1'];
                switch($choice2){
                    // urubyiruko rwose
                    case 'none':
                        $pdf->SetFont('Arial','BU',12);
                        $pdf->Cell(0,10,"RAPORO Y'URUBYIRUKO RWOSE", 0, 1, 'C');
                        $pdf->Cell(0,10,'', 0, 1);
                        //build a query to bring every record under that email
                        $query = "SELECT  umuturage.first_name as firstname, umuturage.dob as dob,umuturage.nid as id, umuturage.last_name as lastname,umuturage.tel as tel, umuturage.icyo_akora as akazi, umuturage.nationality as nationality, umuturage.gender as gender, ibyiciro.ibyiciro_name as ibyiciro, ubwisungane.ubwisungane_name as ubwisungane ";
                        $query.= "FROM umuturage,ibyiciro,ubwisungane ";
                        $query.= "WHERE ibyiciro.ibyiciro_id = umuturage.ibyiciro_id ";
                        $query.= "AND ubwisungane.ubwisungane_id = umuturage.ubwisungane_id";
                        $pdf->SetFont('Arial','B',8);
                        //execute the query and keep the result in result variable
                        $res = mysqli_query($con,$query);
                        $count =1;
                        $pdf->Cell(5,8,'No', 1, 0);
                        $pdf->Cell(40,8,"AMAZINA YOMBI", 1, 0, 'C');
                        $pdf->Cell(20,8,'IMYAKA', 1, 0, 'C');
                        $pdf->Cell(15,8,'IGITSINA', 1, 0, 'C');
                        $pdf->Cell(30,8,'IKIMURANGA', 1, 0, 'C');
                        $pdf->Cell(20,8,'TEL', 1, 0, 'C');
                        $pdf->Cell(15,8,'ICYICIRO', 1, 0, 'C');
                        $pdf->Cell(20,8,'KWIVUZA', 1, 0, 'C');
                        $pdf->Cell(20,8,'AKAZI', 1, 0, 'C');
                        $pdf->Cell(30,8,'UBWENEGIHUGU', 1, 0, 'C');
                        $pdf->Cell(25,8,'ISIBO', 1, 0, 'C');
                        $pdf->Cell(15,8,'IGIPANGU', 1, 0, 'C');
                        $pdf->Cell(15,8,'INZU', 1, 1, 'C');
                        $pdf->SetFont('Arial','', 8);
                        while($umuturage = mysqli_fetch_assoc($res)){
                            //UMUTURAGE DATA
                            $fullname = $tel = $dob = $job = $icyiciro = $gender = $nationality = $inshingano = $ubwisungane = '';
                            $fullname = $umuturage['firstname'].' '.$umuturage['lastname'];
                            $tel = $umuturage['tel'];
                            $dob = $umuturage['dob'];
                            $job = $umuturage['akazi'];
                            $id = $umuturage['id'];
                            $gender = $umuturage['gender'];
                            $nationality = $umuturage['nationality'];
                            $icyiciro = $umuturage['ibyiciro'];
                            $ubwisungane = $umuturage['ubwisungane'];
                            $pdf->Cell(5,8,$count++, 1, 0);
                            $pdf->Cell(40,8,$fullname, 1, 0);
                            $pdf->Cell(20,8,$dob, 1, 0);
                            $pdf->Cell(15,8,$gender, 1, 0);
                            $pdf->Cell(30,8,$id, 1, 0);
                            $pdf->Cell(20,8,$tel, 1, 0);
                            $pdf->Cell(15,8,$icyiciro, 1, 0);
                            $pdf->Cell(20,8,$ubwisungane, 1, 0);
                            $pdf->Cell(20,8,$job, 1, 0);
                            $pdf->Cell(30,8,$nationality, 1, 0);
                            $pdf->Cell(25,8,"isibo", 1, 0);
                            $pdf->Cell(15,8,"igipangu", 1, 0);
                            $pdf->Cell(15,8,"inzu", 1, 1);

                        }
                        break;
                    case 'urwiga':
                        $pdf->SetFont('Arial','BU',12);
                        $pdf->Cell(0,10,"RAPORO Y'URUBYIRUKO RWIGA", 0, 1, 'C');
                        $pdf->Cell(0,10,'', 0, 1);
                        //build a query to bring every record under that email
                        $query = "SELECT  umuturage.first_name as firstname, umuturage.dob as dob,umuturage.nid as id, umuturage.last_name as lastname,umuturage.tel as tel, umuturage.icyo_akora as akazi, umuturage.nationality as nationality, umuturage.gender as gender, ibyiciro.ibyiciro_name as ibyiciro, ubwisungane.ubwisungane_name as ubwisungane ";
                        $query.= "FROM umuturage,ibyiciro,ubwisungane ";
                        $query.= "WHERE ibyiciro.ibyiciro_id = umuturage.ibyiciro_id ";
                        $query.= "AND ubwisungane.ubwisungane_id = umuturage.ubwisungane_id";
                        $pdf->SetFont('Arial','B',8);
                        //execute the query and keep the result in result variable
                        $res = mysqli_query($con,$query);
                        $count =1;
                        $pdf->Cell(5,8,'No', 1, 0);
                        $pdf->Cell(40,8,"AMAZINA YOMBI", 1, 0, 'C');
                        $pdf->Cell(20,8,'IMYAKA', 1, 0, 'C');
                        $pdf->Cell(15,8,'IGITSINA', 1, 0, 'C');
                        $pdf->Cell(30,8,'IKIMURANGA', 1, 0, 'C');
                        $pdf->Cell(20,8,'TEL', 1, 0, 'C');
                        $pdf->Cell(15,8,'ICYICIRO', 1, 0, 'C');
                        $pdf->Cell(20,8,'KWIVUZA', 1, 0, 'C');
                        $pdf->Cell(20,8,'AKAZI', 1, 0, 'C');
                        $pdf->Cell(30,8,'UBWENEGIHUGU', 1, 0, 'C');
                        $pdf->Cell(25,8,'ISIBO', 1, 0, 'C');
                        $pdf->Cell(15,8,'IGIPANGU', 1, 0, 'C');
                        $pdf->Cell(15,8,'INZU', 1, 1, 'C');
                        $pdf->SetFont('Arial','', 8);
                        while($umuturage = mysqli_fetch_assoc($res)){
                            //UMUTURAGE DATA
                            $fullname = $tel = $dob = $job = $icyiciro = $gender = $nationality = $inshingano = $ubwisungane = '';
                            $fullname = $umuturage['firstname'].' '.$umuturage['lastname'];
                            $tel = $umuturage['tel'];
                            $dob = $umuturage['dob'];
                            $job = $umuturage['akazi'];
                            $id = $umuturage['id'];
                            $gender = $umuturage['gender'];
                            $nationality = $umuturage['nationality'];
                            $icyiciro = $umuturage['ibyiciro'];
                            $ubwisungane = $umuturage['ubwisungane'];
                            $pdf->Cell(5,8,$count++, 1, 0);
                            $pdf->Cell(40,8,$fullname, 1, 0);
                            $pdf->Cell(20,8,$dob, 1, 0);
                            $pdf->Cell(15,8,$gender, 1, 0);
                            $pdf->Cell(30,8,$id, 1, 0);
                            $pdf->Cell(20,8,$tel, 1, 0);
                            $pdf->Cell(15,8,$icyiciro, 1, 0);
                            $pdf->Cell(20,8,$ubwisungane, 1, 0);
                            $pdf->Cell(20,8,$job, 1, 0);
                            $pdf->Cell(30,8,$nationality, 1, 0);
                            $pdf->Cell(25,8,"isibo", 1, 0);
                            $pdf->Cell(15,8,"igipangu", 1, 0);
                            $pdf->Cell(15,8,"inzu", 1, 1);

                        }
                        break;
                    case "urutiga":
                        $pdf->SetFont('Arial','BU',12);
                        $pdf->Cell(0,10,"RAPORO Y'URUBYIRUKO RUTIGA", 0, 1, 'C');
                        $pdf->Cell(0,10,'', 0, 1);
                        //build a query to bring every record under that email
                        $query = "SELECT  umuturage.first_name as firstname, umuturage.dob as dob,umuturage.nid as id, umuturage.last_name as lastname,umuturage.tel as tel, umuturage.icyo_akora as akazi, umuturage.nationality as nationality, umuturage.gender as gender, ibyiciro.ibyiciro_name as ibyiciro, ubwisungane.ubwisungane_name as ubwisungane ";
                        $query.= "FROM umuturage,ibyiciro,ubwisungane ";
                        $query.= "WHERE ibyiciro.ibyiciro_id = umuturage.ibyiciro_id ";
                        $query.= "AND ubwisungane.ubwisungane_id = umuturage.ubwisungane_id";
                        $pdf->SetFont('Arial','B',8);
                        //execute the query and keep the result in result variable
                        $res = mysqli_query($con,$query);
                        $count =1;
                        $pdf->Cell(5,8,'No', 1, 0);
                        $pdf->Cell(40,8,"AMAZINA YOMBI", 1, 0, 'C');
                        $pdf->Cell(20,8,'IMYAKA', 1, 0, 'C');
                        $pdf->Cell(15,8,'IGITSINA', 1, 0, 'C');
                        $pdf->Cell(30,8,'IKIMURANGA', 1, 0, 'C');
                        $pdf->Cell(20,8,'TEL', 1, 0, 'C');
                        $pdf->Cell(15,8,'ICYICIRO', 1, 0, 'C');
                        $pdf->Cell(20,8,'KWIVUZA', 1, 0, 'C');
                        $pdf->Cell(20,8,'AKAZI', 1, 0, 'C');
                        $pdf->Cell(30,8,'UBWENEGIHUGU', 1, 0, 'C');
                        $pdf->Cell(25,8,'ISIBO', 1, 0, 'C');
                        $pdf->Cell(15,8,'IGIPANGU', 1, 0, 'C');
                        $pdf->Cell(15,8,'INZU', 1, 1, 'C');
                        $pdf->SetFont('Arial','', 8);
                        while($umuturage = mysqli_fetch_assoc($res)){
                            //UMUTURAGE DATA
                            $fullname = $tel = $dob = $job = $icyiciro = $gender = $nationality = $inshingano = $ubwisungane = '';
                            $fullname = $umuturage['firstname'].' '.$umuturage['lastname'];
                            $tel = $umuturage['tel'];
                            $dob = $umuturage['dob'];
                            $job = $umuturage['akazi'];
                            $id = $umuturage['id'];
                            $gender = $umuturage['gender'];
                            $nationality = $umuturage['nationality'];
                            $icyiciro = $umuturage['ibyiciro'];
                            $ubwisungane = $umuturage['ubwisungane'];
                            $pdf->Cell(5,8,$count++, 1, 0);
                            $pdf->Cell(40,8,$fullname, 1, 0);
                            $pdf->Cell(20,8,$dob, 1, 0);
                            $pdf->Cell(15,8,$gender, 1, 0);
                            $pdf->Cell(30,8,$id, 1, 0);
                            $pdf->Cell(20,8,$tel, 1, 0);
                            $pdf->Cell(15,8,$icyiciro, 1, 0);
                            $pdf->Cell(20,8,$ubwisungane, 1, 0);
                            $pdf->Cell(20,8,$job, 1, 0);
                            $pdf->Cell(30,8,$nationality, 1, 0);
                            $pdf->Cell(25,8,"isibo", 1, 0);
                            $pdf->Cell(15,8,"igipangu", 1, 0);
                            $pdf->Cell(15,8,"inzu", 1, 1);
                        }
                        break;
                    case "urukora":
                        $pdf->SetFont('Arial','BU',12);
                        $pdf->Cell(0,10,"RAPORO Y'URURBYIRUKO RUFITE AKAZI", 0, 1, 'C');
                        $pdf->Cell(0,10,'', 0, 1);
                        //build a query to bring every record under that email
                        $query = "SELECT  umuturage.first_name as firstname, umuturage.dob as dob,umuturage.nid as id, umuturage.last_name as lastname,umuturage.tel as tel, umuturage.icyo_akora as akazi, umuturage.nationality as nationality, umuturage.gender as gender, ibyiciro.ibyiciro_name as ibyiciro, ubwisungane.ubwisungane_name as ubwisungane ";
                        $query.= "FROM umuturage,ibyiciro,ubwisungane ";
                        $query.= "WHERE ibyiciro.ibyiciro_id = umuturage.ibyiciro_id ";
                        $query.= "AND ubwisungane.ubwisungane_id = umuturage.ubwisungane_id";
                        $pdf->SetFont('Arial','B',8);
                        //execute the query and keep the result in result variable
                        $res = mysqli_query($con,$query);
                        $count =1;
                        $pdf->Cell(5,8,'No', 1, 0);
                        $pdf->Cell(40,8,"AMAZINA YOMBI", 1, 0, 'C');
                        $pdf->Cell(20,8,'IMYAKA', 1, 0, 'C');
                        $pdf->Cell(15,8,'IGITSINA', 1, 0, 'C');
                        $pdf->Cell(30,8,'IKIMURANGA', 1, 0, 'C');
                        $pdf->Cell(20,8,'TEL', 1, 0, 'C');
                        $pdf->Cell(15,8,'ICYICIRO', 1, 0, 'C');
                        $pdf->Cell(20,8,'KWIVUZA', 1, 0, 'C');
                        $pdf->Cell(20,8,'AKAZI', 1, 0, 'C');
                        $pdf->Cell(30,8,'UBWENEGIHUGU', 1, 0, 'C');
                        $pdf->Cell(25,8,'ISIBO', 1, 0, 'C');
                        $pdf->Cell(15,8,'IGIPANGU', 1, 0, 'C');
                        $pdf->Cell(15,8,'INZU', 1, 1, 'C');
                        $pdf->SetFont('Arial','', 8);
                        while($umuturage = mysqli_fetch_assoc($res)){
                            //UMUTURAGE DATA
                            $fullname = $tel = $dob = $job = $icyiciro = $gender = $nationality = $inshingano = $ubwisungane = '';
                            $fullname = $umuturage['firstname'].' '.$umuturage['lastname'];
                            $tel = $umuturage['tel'];
                            $dob = $umuturage['dob'];
                            $job = $umuturage['akazi'];
                            $id = $umuturage['id'];
                            $gender = $umuturage['gender'];
                            $nationality = $umuturage['nationality'];
                            $icyiciro = $umuturage['ibyiciro'];
                            $ubwisungane = $umuturage['ubwisungane'];
                            $pdf->Cell(5,8,$count++, 1, 0);
                            $pdf->Cell(40,8,$fullname, 1, 0);
                            $pdf->Cell(20,8,$dob, 1, 0);
                            $pdf->Cell(15,8,$gender, 1, 0);
                            $pdf->Cell(30,8,$id, 1, 0);
                            $pdf->Cell(20,8,$tel, 1, 0);
                            $pdf->Cell(15,8,$icyiciro, 1, 0);
                            $pdf->Cell(20,8,$ubwisungane, 1, 0);
                            $pdf->Cell(20,8,$job, 1, 0);
                            $pdf->Cell(30,8,$nationality, 1, 0);
                            $pdf->Cell(25,8,"isibo", 1, 0);
                            $pdf->Cell(15,8,"igipangu", 1, 0);
                            $pdf->Cell(15,8,"inzu", 1, 1);
                        }
                        break;
                    case 'urudakora':
                        $pdf->SetFont('Arial','BU',12);
                        $pdf->Cell(0,10,"RAPORO Y'URUBYIRUKO RUDAFITE AKAZI", 0, 1, 'C');
                        $pdf->Cell(0,10,'', 0, 1);
                        //build a query to bring every record under that email
                        $query = "SELECT  umuturage.first_name as firstname, umuturage.dob as dob,umuturage.nid as id, umuturage.last_name as lastname,umuturage.tel as tel, umuturage.icyo_akora as akazi, umuturage.nationality as nationality, umuturage.gender as gender, ibyiciro.ibyiciro_name as ibyiciro, ubwisungane.ubwisungane_name as ubwisungane ";
                        $query.= "FROM umuturage,ibyiciro,ubwisungane ";
                        $query.= "WHERE ibyiciro.ibyiciro_id = umuturage.ibyiciro_id ";
                        $query.= "AND ubwisungane.ubwisungane_id = umuturage.ubwisungane_id";
                        $pdf->SetFont('Arial','B',8);
                        //execute the query and keep the result in result variable
                        $res = mysqli_query($con,$query);
                        $count =1;
                        $pdf->Cell(5,8,'No', 1, 0);
                        $pdf->Cell(40,8,"AMAZINA YOMBI", 1, 0, 'C');
                        $pdf->Cell(20,8,'IMYAKA', 1, 0, 'C');
                        $pdf->Cell(15,8,'IGITSINA', 1, 0, 'C');
                        $pdf->Cell(30,8,'IKIMURANGA', 1, 0, 'C');
                        $pdf->Cell(20,8,'TEL', 1, 0, 'C');
                        $pdf->Cell(15,8,'ICYICIRO', 1, 0, 'C');
                        $pdf->Cell(20,8,'KWIVUZA', 1, 0, 'C');
                        $pdf->Cell(20,8,'AKAZI', 1, 0, 'C');
                        $pdf->Cell(30,8,'UBWENEGIHUGU', 1, 0, 'C');
                        $pdf->Cell(25,8,'ISIBO', 1, 0, 'C');
                        $pdf->Cell(15,8,'IGIPANGU', 1, 0, 'C');
                        $pdf->Cell(15,8,'INZU', 1, 1, 'C');
                        $pdf->SetFont('Arial','', 8);
                        while($umuturage = mysqli_fetch_assoc($res)){
                            //UMUTURAGE DATA
                            $fullname = $tel = $dob = $job = $icyiciro = $gender = $nationality = $inshingano = $ubwisungane = '';
                            $fullname = $umuturage['firstname'].' '.$umuturage['lastname'];
                            $tel = $umuturage['tel'];
                            $dob = $umuturage['dob'];
                            $job = $umuturage['akazi'];
                            $id = $umuturage['id'];
                            $gender = $umuturage['gender'];
                            $nationality = $umuturage['nationality'];
                            $icyiciro = $umuturage['ibyiciro'];
                            $ubwisungane = $umuturage['ubwisungane'];
                            $pdf->Cell(5,8,$count++, 1, 0);
                            $pdf->Cell(40,8,$fullname, 1, 0);
                            $pdf->Cell(20,8,$dob, 1, 0);
                            $pdf->Cell(15,8,$gender, 1, 0);
                            $pdf->Cell(30,8,$id, 1, 0);
                            $pdf->Cell(20,8,$tel, 1, 0);
                            $pdf->Cell(15,8,$icyiciro, 1, 0);
                            $pdf->Cell(20,8,$ubwisungane, 1, 0);
                            $pdf->Cell(20,8,$job, 1, 0);
                            $pdf->Cell(30,8,$nationality, 1, 0);
                            $pdf->Cell(25,8,"isibo", 1, 0);
                            $pdf->Cell(15,8,"igipangu", 1, 0);
                            $pdf->Cell(15,8,"inzu", 1, 1);
                        }
                        break;
                }
                break;
            case 'imiryango':
                $choice2 = $_POST['choice2'];
                switch($choice2){
                    case 'none':
                        $pdf->SetFont('Arial','BU',12);
                        $pdf->Cell(0,10,"URUTONDE RW'IMIRYANGO YOSE", 0, 1, 'C');
                        $pdf->Cell(0,10,'', 0, 1);
                        //build a query to bring every record under that email
                        $query = "SELECT umuryango.umuryango_id, umuryango.umuryango_chef, nyirinzu.umuryango_id,nyirinzu.inzu_id,inzu.inzu_id,inzu.owner_name,inzu.igipangu_id,igipangu.address_code,igipangu.igipangu_id,igipangu.isibo_id,isibo.isibo_id,isibo.isibo_name FROM `umuryango`,`nyirinzu`,`inzu`,`igipangu`,`isibo`
                        WHERE umuryango.umuryango_id = nyirinzu.umuryango_id
                        AND nyirinzu.inzu_id = inzu.inzu_id
                        AND inzu.igipangu_id = igipangu.igipangu_id
                        AND igipangu.isibo_id = isibo.isibo_id
                        ORDER BY umuryango.umuryango_chef ASC";
                        $pdf->SetFont('Arial','B',8);
                        //execute the query and keep the result in result variable
                        $res = mysqli_query($con,$query);
                        $count =1;
                        $pdf->Cell(5,8,'No', 1, 0);
                        $pdf->Cell(40,8,"UMUKURU W'UMURYANGO", 1, 0, 'C');
                        $pdf->Cell(30,8,'TELEFONI YE', 1, 0, 'C');
                        $pdf->Cell(40,8,"UMUBARE B'ABAWUGIZE", 1, 0, 'C');
                        $pdf->Cell(40,8,'ISIBO', 1, 0, 'C');
                        $pdf->Cell(45,8,'IGIPANGU', 1, 0, 'C');
                        $pdf->Cell(65,8,'INZU', 1, 1, 'C');
                        $pdf->SetFont('Arial','', 8);
                        while($umuturage = mysqli_fetch_assoc($res)){
                            //UMUTURAGE DATA
                            $fam = $umuturage['umuryango_id'];
                            $chef = $umuturage['umuryango_chef'];
                            $telSql = mysqli_query($con,"SELECT tel from umuturage WHERE umuryango_id = '$fam' AND isano LIKE '%nyirurugo%'");
                            $telAssoc = mysqli_fetch_assoc($telSql);
                            $tel = $telAssoc['tel'];
                            $numSql = mysqli_query($con,"SELECT tel from umuturage WHERE umuryango_id = '$fam'");
                            $numb = mysqli_num_rows($numSql);
                            $isibo = $umuturage['isibo_name'];
                            $igipangu = $umuturage['address_code'];
                            $inzu = $umuturage['owner_name'];
                            $pdf->Cell(5,8,$count++, 1, 0);
                            $pdf->Cell(40,8,$chef, 1, 0);
                            $pdf->Cell(30,8,$tel, 1, 0,'C');
                            $pdf->Cell(40,8,$numb, 1, 0,'C');
                            $pdf->Cell(40,8,$isibo, 1, 0,'C');
                            $pdf->Cell(45,8,$igipangu, 1, 0);
                            $pdf->Cell(65,8,$inzu, 1, 1);
                        }
                        break;
                    case 'isibo':
                        $isibo_id = $_POST['choice3'];
                        $qIsibo = "SELECT * ";
                        $qIsibo.= "FROM isibo ";
                        $qIsibo.= "WHERE isibo_id = ".$isibo_id;
                        $runIsibo = mysqli_query($con, $qIsibo);
                        $isibo_name = mysqli_fetch_assoc($runIsibo);
                        $truename = $isibo_name['isibo_name'];
                        $pdf->SetFont('Arial','BU',12);
                        $pdf->Cell(0,10,"URUTONDE RW'IMIRYANGO YOSE IBA MW'ISIBO '$truename'", 0, 1, 'C');
                        $pdf->Cell(0,10,'', 0, 1);
                        //build a query to bring every record under that email
                        $query = "SELECT umuryango.umuryango_id, umuryango.umuryango_chef, nyirinzu.umuryango_id,nyirinzu.inzu_id,inzu.inzu_id,inzu.owner_name,inzu.igipangu_id,igipangu.address_code,igipangu.igipangu_id,igipangu.isibo_id,isibo.isibo_id,isibo.isibo_name FROM `umuryango`,`nyirinzu`,`inzu`,`igipangu`,`isibo`
                        WHERE umuryango.umuryango_id = nyirinzu.umuryango_id
                        AND nyirinzu.inzu_id = inzu.inzu_id
                        AND inzu.igipangu_id = igipangu.igipangu_id
                        AND igipangu.isibo_id = isibo.isibo_id
                        AND isibo.isibo_id = '$isibo_id'
                        ORDER BY umuryango.umuryango_chef ASC";
                        $pdf->SetFont('Arial','B',8);
                        //execute the query and keep the result in result variable
                        $res = mysqli_query($con,$query);
                        $count =1;
                        $pdf->Cell(5,8,'No', 1, 0);
                        $pdf->Cell(40,8,"UMUKURU W'UMURYANGO", 1, 0, 'C');
                        $pdf->Cell(30,8,'TELEFONI YE', 1, 0, 'C');
                        $pdf->Cell(40,8,"UMUBARE B'ABAWUGIZE", 1, 0, 'C');
                        $pdf->Cell(60,8,'IGIPANGU', 1, 0, 'C');
                        $pdf->Cell(80,8,'INZU', 1, 1, 'C');
                        $pdf->SetFont('Arial','', 8);
                        while($umuturage = mysqli_fetch_assoc($res)){
                            //UMUTURAGE DATA
                            $fam = $umuturage['umuryango_id'];
                            $chef = $umuturage['umuryango_chef'];
                            $telSql = mysqli_query($con,"SELECT tel from umuturage WHERE umuryango_id = '$fam' AND isano LIKE '%nyirurugo%'");
                            $telAssoc = mysqli_fetch_assoc($telSql);
                            $tel = $telAssoc['tel'];
                            $numSql = mysqli_query($con,"SELECT tel from umuturage WHERE umuryango_id = '$fam'");
                            $numb = mysqli_num_rows($numSql);
                            $isibo = $umuturage['isibo_name'];
                            $igipangu = $umuturage['address_code'];
                            $inzu = $umuturage['owner_name'];
                            $pdf->Cell(5,8,$count++, 1, 0);
                            $pdf->Cell(40,8,$chef, 1, 0);
                            $pdf->Cell(30,8,$tel, 1, 0,'C');
                            $pdf->Cell(40,8,$numb, 1, 0,'C');
                            $pdf->Cell(60,8,$igipangu, 1, 0);
                            $pdf->Cell(80,8,$inzu, 1, 1);
                        }
                        break;


                }
                break;

                case 'ingo':
                    $choice2 = $_POST['choice2'];
                    switch($choice2){
                        case 'none':
                            $pdf->SetFont('Arial','BU',12);
                            $pdf->Cell(0,10,"URUTONDE RW'INZU ZOSE ZO MU MUDUGUDU", 0, 1, 'C');
                            $pdf->Cell(0,10,'', 0, 1);
                            //build a query to bring every record under that email
                            $query = "SELECT inzu.inzu_id,inzu.owner_name as housecode,inzu.inzu_details as details,inzu.igipangu_id,igipangu.address_code,igipangu.owner_name as landlord,igipangu.igipangu_id,igipangu.isibo_id,isibo.isibo_id,isibo.isibo_name FROM `inzu`,`igipangu`,`isibo`
                            WHERE inzu.igipangu_id = igipangu.igipangu_id
                            AND igipangu.isibo_id = isibo.isibo_id
                            ORDER BY inzu.inzu_id ASC";
                            $pdf->SetFont('Arial','B',8);
                            //execute the query and keep the result in result variable
                            $res = mysqli_query($con,$query);
                            $count =1;
                            $pdf->Cell(5,8,'No', 1, 0);
                            $pdf->Cell(50,8,"KODE Y'INZU", 1, 0, 'C');
                            $pdf->Cell(50,8,"KODE Y'IGIPANGU", 1, 0, 'C');
                            $pdf->Cell(40,8,"AMAZINA YA NYIRIGIPANGU", 1, 0, 'C');
                            $pdf->Cell(40,8,"ISIBO", 1, 0, 'C');
                            $pdf->Cell(40,8,'UMURYANGO UBAMO', 1, 0, 'C');
                            $pdf->Cell(25,8,'ICYO YAGENWE', 1, 1, 'C');
                            $pdf->SetFont('Arial','', 8);
                            while($umuturage = mysqli_fetch_assoc($res)){
                                //UMUTURAGE DATA'
                                $id = $umuturage['inzu_id'];
                                $house = $umuturage['housecode'];
                                $landcode = $umuturage['address_code'];
                                $landlord = $umuturage['landlord'];
                                $famSql = mysqli_query($con,"SELECT umuryango_id from nyirinzu WHERE inzu_id = $id");
                                if(mysqli_num_rows($famSql)>0){
                                  $famAssoc = mysqli_fetch_assoc($famSql);
                                  $famId = $famAssoc['umuryango_id'];
                                  $famNameSql = mysqli_query($con,"SELECT umuryango_chef from umuryango WHERE umuryango_id = '$famId'");
                                  $famNameAssoc = mysqli_fetch_assoc($famNameSql);
                                  $family = $famNameAssoc['umuryango_chef'];
                                }
                                else{
                                  $family = "Nta muryango urashirwamo";
                                }

                                $details = $umuturage['details'];
                                $isibo = $umuturage['isibo_name'];
                                $pdf->Cell(5,8,$count++, 1, 0);
                                $pdf->Cell(50,8,$house, 1, 0);
                                $pdf->Cell(50,8,$landcode, 1, 0,'C');
                                $pdf->Cell(40,8,$landlord, 1, 0,'C');
                                $pdf->Cell(40,8,$isibo, 1, 0,'C');
                                $pdf->Cell(40,8,$family, 1, 0);
                                $pdf->Cell(25,8,$details, 1, 1);
                            }
                            break;
                        case 'isibo':
                            $isibo_id = $_POST['choice3'];
                            $qIsibo = "SELECT * ";
                            $qIsibo.= "FROM isibo ";
                            $qIsibo.= "WHERE isibo_id = ".$isibo_id;
                            $runIsibo = mysqli_query($con, $qIsibo);
                            $isibo_name = mysqli_fetch_assoc($runIsibo);
                            $truename = $isibo_name['isibo_name'];
                            $truebigname = strtoupper($truename);
                            $pdf->SetFont('Arial','BU',12);
                            $pdf->Cell(0,10,"URUTONDE RW'INZU ZOSE ZO MW'ISIBO '$truebigname'", 0, 1, 'C');
                            $pdf->Cell(0,10,'', 0, 1);
                            //build a query to bring every record under that email
                            $query = "SELECT inzu.inzu_id,inzu.owner_name as housecode,inzu.inzu_details as details,inzu.igipangu_id,igipangu.address_code,igipangu.owner_name as landlord,igipangu.igipangu_id,igipangu.isibo_id,isibo.isibo_id,isibo.isibo_name FROM `inzu`,`igipangu`,`isibo`
                            WHERE inzu.igipangu_id = igipangu.igipangu_id
                            AND igipangu.isibo_id = isibo.isibo_id
                            AND isibo.isibo_id = $isibo_id
                            ORDER BY inzu.inzu_id ASC";
                            $pdf->SetFont('Arial','B',8);
                            //execute the query and keep the result in result variable
                            $res = mysqli_query($con,$query);
                            $count =1;
                            $pdf->Cell(5,8,'No', 1, 0);
                            $pdf->Cell(50,8,"KODE Y'INZU", 1, 0, 'C');
                            $pdf->Cell(50,8,"KODE Y'IGIPANGU", 1, 0, 'C');
                            $pdf->Cell(50,8,"AMAZINA YA NYIRIGIPANGU", 1, 0, 'C');
                            $pdf->Cell(50,8,'UMURYANGO UBAMO', 1, 0, 'C');
                            $pdf->Cell(35,8,'ICYO YAGENEWE', 1, 1, 'C');
                            $pdf->SetFont('Arial','', 8);
                            while($umuturage = mysqli_fetch_assoc($res)){
                                //UMUTURAGE DATA'
                                $id = $umuturage['inzu_id'];
                                $house = $umuturage['housecode'];
                                $landcode = $umuturage['address_code'];
                                $landlord = $umuturage['landlord'];
                                $famSql = mysqli_query($con,"SELECT umuryango_id from nyirinzu WHERE inzu_id = $id");
                                if(mysqli_num_rows($famSql)>0){
                                  $famAssoc = mysqli_fetch_assoc($famSql);
                                  $famId = $famAssoc['umuryango_id'];
                                  $famNameSql = mysqli_query($con,"SELECT umuryango_chef from umuryango WHERE umuryango_id = '$famId'");
                                  $famNameAssoc = mysqli_fetch_assoc($famNameSql);
                                  $family = $famNameAssoc['umuryango_chef'];
                                }
                                else{
                                  $family = "Nta muryango urashirwamo";
                                }

                                $details = $umuturage['details'];
                                $isibo = $umuturage['isibo_name'];
                                $pdf->Cell(5,8,$count++, 1, 0);
                                $pdf->Cell(50,8,$house, 1, 0);
                                $pdf->Cell(50,8,$landcode, 1, 0,'C');
                                $pdf->Cell(50,8,$landlord, 1, 0,'C');
                                $pdf->Cell(50,8,$family, 1, 0);
                                $pdf->Cell(35,8,$details, 1, 1);
                            }
                            break;


                    }
                    break;

            // case 'ingo':
            //     switch(true):
            // case 'amazuMabi':
            //     $pdf->SetFont('Arial','BU',12);
            //     $pdf->Cell(0,10,'RAPORO Y\'IMIRYANGO IFITE AMAZU MABI', 0, 1, 'C');
            //     $pdf->Cell(0,10,'', 0, 1);
            //     //build a query to bring every record under that email
            //     $query = "SELECT * ";
            //     $query.= "FROM umuturage";
            //     $query.= " WHERE status_tura_kodesha = 'Aratuye'";

            //     $pdf->SetFont('Arial','B',8);
            //     //execute the query and keep the result in result variable
            //     $res = mysqli_query($con,$query);
            //     $pdf->Cell(60,8,"Umukuru w'umuryango", 1, 0, 'C');
            //     $pdf->Cell(40,8,'Telephone', 1, 0, 'C');
            //     $pdf->Cell(40,8,'Isibo', 1, 0, 'C');
            //     $pdf->Cell(40,8,'Akazi', 1, 1, 'C');

            //     $pdf->SetFont('Arial','', 8);
            //     while($appoint = mysqli_fetch_assoc($res)){
            //         //PATIENT DATA
            //         $query = "SELECT * ";
            //         $query.= "FROM patient";
            //         $query.= " WHERE p_id = ". $appoint['p_id'];
            //         $patient = mysqli_fetch_assoc(mysqli_query($con,$query));
            //         $patientName = $patient['p_fname'].' '.$patient['p_lname'];
            //         $pdf->Cell(60, 8, $patientName, 1, 0);

            //         //THERAPIST DATA
            //         $query = "SELECT * ";
            //         $query.= "FROM therapist";
            //         $query.= " WHERE T_ID = ". $appoint['T_ID'];
            //         $therapist = mysqli_fetch_assoc(mysqli_query($con,$query));
            //         $therapistName = $therapist['T_fname'].' '.$therapist['T_lname'];
            //         $pdf->Cell(40, 8, $therapistName, 1, 0);

            //         //CLINIC DATA
            //         $query = "SELECT * ";
            //         $query.= "FROM clinic";
            //         $query.= " WHERE C_Id = ". $appoint['C_Id'];
            //         $clinic = mysqli_fetch_assoc(mysqli_query($con,$query));
            //         $clinicName = $clinic['C_Name'];
            //         $pdf->Cell(40, 8, $clinicName, 1, 0);

            //         //ISSUE DATA
            //         $query = "SELECT * ";
            //         $query.= "FROM type";
            //         $query.= " WHERE Type_id = ". $appoint['Type_id'];
            //         $type = mysqli_fetch_assoc(mysqli_query($con,$query));
            //         $typeName = $type['Type_name'];
            //         $pdf->Cell(40, 8, $typeName, 1, 1);
            //     }
            //     break;
            // case 'ubwihereroBubi':
            //     $pdf->SetFont('Arial','BU',12);
            //     $pdf->Cell(0,10,'RAPORO Y\'INGO ZIFITE UBWIHERERO BUTUJUJE IBISABWA', 0, 1, 'C');
            //     $pdf->Cell(0,10,'', 0, 1);
            //     //build a query to bring every record under that email
            //     $query = "SELECT * ";
            //     $query.= "FROM appointment";
            //     $query.= " WHERE A_status = 'not Taken'";

            //     $pdf->SetFont('Arial','B',8);
            //     //execute the query and keep the result in result variable
            //     $res = mysqli_query($con,$query);
            //     $pdf->Cell(60,8,'PATIENT', 1, 0, 'C');
            //     $pdf->Cell(40,8,'THERAPIST', 1, 0, 'C');
            //     $pdf->Cell(40,8,'CLINIC', 1, 0, 'C');
            //     $pdf->Cell(40,8,'ISSUE', 1, 1, 'C');

            //     $pdf->SetFont('Arial','', 8);
            //     while($appoint = mysqli_fetch_assoc($res)){
            //         //PATIENT DATA
            //         $query = "SELECT * ";
            //         $query.= "FROM patient";
            //         $query.= " WHERE p_id = ". $appoint['p_id'];
            //         $patient = mysqli_fetch_assoc(mysqli_query($con,$query));
            //         $patientName = $patient['p_fname'].' '.$patient['p_lname'];
            //         $pdf->Cell(60, 8, $patientName, 1, 0);

            //         //THERAPIST DATA
            //         $query = "SELECT * ";
            //         $query.= "FROM therapist";
            //         $query.= " WHERE T_ID = ". $appoint['T_ID'];
            //         $therapist = mysqli_fetch_assoc(mysqli_query($con,$query));
            //         $therapistName = $therapist['T_fname'].' '.$therapist['T_lname'];
            //         $pdf->Cell(40, 8, $therapistName, 1, 0);

            //         //CLINIC DATA
            //         $query = "SELECT * ";
            //         $query.= "FROM clinic";
            //         $query.= " WHERE C_Id = ". $appoint['C_Id'];
            //         $clinic = mysqli_fetch_assoc(mysqli_query($con,$query));
            //         $clinicName = $clinic['C_Name'];
            //         $pdf->Cell(40, 8, $clinicName, 1, 0);

            //         //ISSUE DATA
            //         $query = "SELECT * ";
            //         $query.= "FROM type";
            //         $query.= " WHERE Type_id = ". $appoint['Type_id'];
            //         $type = mysqli_fetch_assoc(mysqli_query($con,$query));
            //         $typeName = $type['Type_name'];
            //         $pdf->Cell(40, 8, $typeName, 1, 1);
            //     }
            //     break;
            // case 'abanaBariMunsi5':
            //     $pdf->SetFont('Arial','BU',12);
            //     $pdf->Cell(0,8,'RAPORO Y\'IMIRYANGO IFITE ABANA BARI MUNSI Y\'IMYAKA 5', 0, 1, 'C');
            //     $pdf->Cell(0,8,'', 0, 1);
            //     //build a query to bring every record under that email
            //     $query = "SELECT * ";
            //     $query.= "FROM appointment";

            //     $pdf->SetFont('Arial','',12);
            //     $number = mysqli_query($con,$query);
            //     //messages
            //     $pdf->Cell(0,8,"Mubana $number->num_rows dufite m'umudugudu wacu, habashije gukurikirana abana", 0, 1, 'C');

            //     $pdf->SetFont('Arial','B',8);
            //     //execute the query and keep the result in result variable
            //     $res = mysqli_query($con,$query);
            //     $pdf->Cell(60,8,'PATIENT', 1, 0, 'C');
            //     $pdf->Cell(40,8,'THERAPIST', 1, 0, 'C');
            //     $pdf->Cell(40,8,'CLINIC', 1, 0, 'C');
            //     $pdf->Cell(40,8,'ISSUE', 1, 1, 'C');

            //     $pdf->SetFont('Arial','', 8);
            //     while($appoint = mysqli_fetch_assoc($res)){
            //         //PATIENT DATA
            //         $query = "SELECT * ";
            //         $query.= "FROM patient";
            //         $query.= " WHERE p_id = ". $appoint['p_id'];
            //         $patient = mysqli_fetch_assoc(mysqli_query($con,$query));
            //         $patientName = $patient['p_fname'].' '.$patient['p_lname'];
            //         $pdf->Cell(60, 8, $patientName, 1, 0);

            //         //THERAPIST DATA
            //         $query = "SELECT * ";
            //         $query.= "FROM therapist";
            //         $query.= " WHERE T_ID = ". $appoint['T_ID'];
            //         $therapist = mysqli_fetch_assoc(mysqli_query($con,$query));
            //         $therapistName = $therapist['T_fname'].' '.$therapist['T_lname'];
            //         $pdf->Cell(40, 8, $therapistName, 1, 0);

            //         //CLINIC DATA
            //         $query = "SELECT * ";
            //         $query.= "FROM clinic";
            //         $query.= " WHERE C_Id = ". $appoint['C_Id'];
            //         $clinic = mysqli_fetch_assoc(mysqli_query($con,$query));
            //         $clinicName = $clinic['C_Name'];
            //         $pdf->Cell(40, 8, $clinicName, 1, 0);

            //         //ISSUE DATA
            //         $query = "SELECT * ";
            //         $query.= "FROM type";
            //         $query.= " WHERE Type_id = ". $appoint['Type_id'];
            //         $type = mysqli_fetch_assoc(mysqli_query($con,$query));
            //         $typeName = $type['Type_name'];
            //         $pdf->Cell(40, 8, $typeName, 1, 1);
            //     }
            //     break;
            // case 'abanaImirireMibi':
            //     $pdf->SetFont('Arial','BU',12);
            //     $pdf->Cell(0,10,'RAPORO Y\'ABANA BAFITE IMIRIRE MIBI', 0, 1, 'C');
            //     $pdf->Cell(0,10,'', 0, 1);
            //     //build a query to bring every record under that email
            //     $query = "SELECT * ";
            //     $query.= "FROM appointment";
            //     $query.= " WHERE A_status = 'taken'";

            //     $pdf->SetFont('Arial','B',8);
            //     //execute the query and keep the result in result variable
            //     $res = mysqli_query($con,$query);
            //     $pdf->Cell(60,8,'PATIENT', 1, 0, 'C');
            //     $pdf->Cell(40,8,'THERAPIST', 1, 0, 'C');
            //     $pdf->Cell(40,8,'CLINIC', 1, 0, 'C');
            //     $pdf->Cell(40,8,'ISSUE', 1, 1, 'C');

            //     $pdf->SetFont('Arial','', 8);
            //     while($appoint = mysqli_fetch_assoc($res)){
            //         //PATIENT DATA
            //         $query = "SELECT * ";
            //         $query.= "FROM patient";
            //         $query.= " WHERE p_id = ". $appoint['p_id'];
            //         $patient = mysqli_fetch_assoc(mysqli_query($con,$query));
            //         $patientName = $patient['p_fname'].' '.$patient['p_lname'];
            //         $pdf->Cell(60, 8, $patientName, 1, 0);

            //         //THERAPIST DATA
            //         $query = "SELECT * ";
            //         $query.= "FROM therapist";
            //         $query.= " WHERE T_ID = ". $appoint['T_ID'];
            //         $therapist = mysqli_fetch_assoc(mysqli_query($con,$query));
            //         $therapistName = $therapist['T_fname'].' '.$therapist['T_lname'];
            //         $pdf->Cell(40, 8, $therapistName, 1, 0);

            //         //CLINIC DATA
            //         $query = "SELECT * ";
            //         $query.= "FROM clinic";
            //         $query.= " WHERE C_Id = ". $appoint['C_Id'];
            //         $clinic = mysqli_fetch_assoc(mysqli_query($con,$query));
            //         $clinicName = $clinic['C_Name'];
            //         $pdf->Cell(40, 8, $clinicName, 1, 0);

            //         //ISSUE DATA
            //         $query = "SELECT * ";
            //         $query.= "FROM type";
            //         $query.= " WHERE Type_id = ". $appoint['Type_id'];
            //         $type = mysqli_fetch_assoc(mysqli_query($con,$query));
            //         $typeName = $type['Type_name'];
            //         $pdf->Cell(40, 8, $typeName, 1, 1);
            //     }
            //     break;
            // case 'ikiciroCya1':
            //     $pdf->SetFont('Arial','BU',12);
            //     $pdf->Cell(0,10,'RAPORO Y\'IMIRYANGO IRI MU CYICIRO CYA 1', 0, 1, 'C');
            //     $pdf->Cell(0,10,'', 0, 1);
            //     //build a query to bring every record under that email
            //     $query = "SELECT * ";
            //     $query.= "FROM appointment";
            //     $query.= " WHERE A_status = 'taken'";

            //     $pdf->SetFont('Arial','B',8);
            //     //execute the query and keep the result in result variable
            //     $res = mysqli_query($con,$query);
            //     $pdf->Cell(60,8,'PATIENT', 1, 0, 'C');
            //     $pdf->Cell(40,8,'THERAPIST', 1, 0, 'C');
            //     $pdf->Cell(40,8,'CLINIC', 1, 0, 'C');
            //     $pdf->Cell(40,8,'ISSUE', 1, 1, 'C');

            //     $pdf->SetFont('Arial','', 8);
            //     while($appoint = mysqli_fetch_assoc($res)){
            //         //PATIENT DATA
            //         $query = "SELECT * ";
            //         $query.= "FROM patient";
            //         $query.= " WHERE p_id = ". $appoint['p_id'];
            //         $patient = mysqli_fetch_assoc(mysqli_query($con,$query));
            //         $patientName = $patient['p_fname'].' '.$patient['p_lname'];
            //         $pdf->Cell(60, 8, $patientName, 1, 0);

            //         //THERAPIST DATA
            //         $query = "SELECT * ";
            //         $query.= "FROM therapist";
            //         $query.= " WHERE T_ID = ". $appoint['T_ID'];
            //         $therapist = mysqli_fetch_assoc(mysqli_query($con,$query));
            //         $therapistName = $therapist['T_fname'].' '.$therapist['T_lname'];
            //         $pdf->Cell(40, 8, $therapistName, 1, 0);

            //         //CLINIC DATA
            //         $query = "SELECT * ";
            //         $query.= "FROM clinic";
            //         $query.= " WHERE C_Id = ". $appoint['C_Id'];
            //         $clinic = mysqli_fetch_assoc(mysqli_query($con,$query));
            //         $clinicName = $clinic['C_Name'];
            //         $pdf->Cell(40, 8, $clinicName, 1, 0);

            //         //ISSUE DATA
            //         $query = "SELECT * ";
            //         $query.= "FROM type";
            //         $query.= " WHERE Type_id = ". $appoint['Type_id'];
            //         $type = mysqli_fetch_assoc(mysqli_query($con,$query));
            //         $typeName = $type['Type_name'];
            //         $pdf->Cell(40, 8, $typeName, 1, 1);
            //     }
            //     break;
            // case 'ingoZifiteUbwishingizi':
            //     $pdf->SetFont('Arial','BU',12);
            //     $pdf->Cell(0,10,'RAPORO Y\'INGO ZIFITE UBWISHINGIZI BWO KWIFUZA', 0, 1, 'C');
            //     $pdf->Cell(0,10,'', 0, 1);
            //     //build a query to bring every record under that email
            //     $query = "SELECT * ";
            //     $query.= "FROM appointment";
            //     $query.= " WHERE A_status = 'taken'";

            //     $pdf->SetFont('Arial','B',8);
            //     //execute the query and keep the result in result variable
            //     $res = mysqli_query($con,$query);
            //     $pdf->Cell(60, 8, 'PATIENT', 1, 0, 'C');
            //     $pdf->Cell(40, 8, 'THERAPIST', 1, 0, 'C');
            //     $pdf->Cell(40, 8, 'CLINIC', 1, 0, 'C');
            //     $pdf->Cell(40, 8, 'ISSUE', 1, 1, 'C');

            //     $pdf->SetFont('Arial','', 12);
            //     while($appoint = mysqli_fetch_assoc($res)){
            //         //PATIENT DATA
            //         $query = "SELECT * ";
            //         $query.= "FROM patient";
            //         $query.= " WHERE p_id = ". $appoint['p_id'];
            //         $patient = mysqli_fetch_assoc(mysqli_query($con,$query));
            //         $patientName = $patient['p_fname'].' '.$patient['p_lname'];
            //         $pdf->Cell(60, 8, $patientName, 1, 0);

            //         //THERAPIST DATA
            //         $query = "SELECT * ";
            //         $query.= "FROM therapist";
            //         $query.= " WHERE T_ID = ". $appoint['T_ID'];
            //         $therapist = mysqli_fetch_assoc(mysqli_query($con,$query));
            //         $therapistName = $therapist['T_fname'].' '.$therapist['T_lname'];
            //         $pdf->Cell(40, 8, $therapistName, 1, 0);

            //         //CLINIC DATA
            //         $query = "SELECT * ";
            //         $query.= "FROM clinic";
            //         $query.= " WHERE C_Id = ". $appoint['C_Id'];
            //         $clinic = mysqli_fetch_assoc(mysqli_query($con,$query));
            //         $clinicName = $clinic['C_Name'];
            //         $pdf->Cell(40, 8, $clinicName, 1, 0);

            //         //ISSUE DATA
            //         $query = "SELECT * ";
            //         $query.= "FROM type";
            //         $query.= " WHERE Type_id = ". $appoint['Type_id'];
            //         $type = mysqli_fetch_assoc(mysqli_query($con,$query));
            //         $typeName = $type['Type_name'];
            //         $pdf->Cell(40, 8, $typeName, 1, 1);
            //     }
            //     break;
            // case 'imirimaYIgikoni':
                $pdf->SetFont('Arial', 'BU', 12);
                $pdf->Cell(0, 10, 'RAPORO Y\'INGO ZIFITE UMURIMAW\'IGIKONI', 0, 1, 'C');
                $pdf->Cell(0, 10, '', 0, 1);
                //build a query to bring every record under that email
                $query = "SELECT * ";
                $query.= "FROM appointment";
                $query.= " WHERE A_status = 'taken'";

                $pdf->SetFont('Arial','B',8);
                //execute the query and keep the result in result variable
                $res = mysqli_query($con,$query);
                $pdf->Cell(60, 8,'PATIENT', 1, 0, 'C');
                $pdf->Cell(40, 8,'THERAPIST', 1, 0, 'C');
                $pdf->Cell(40, 8,'CLINIC', 1, 0, 'C');
                $pdf->Cell(40, 8,'ISSUE', 1, 1, 'C');

                $pdf->SetFont('Arial', '', 8);
                while($appoint = mysqli_fetch_assoc($res)){
                    //PATIENT DATA
                    $query = "SELECT * ";
                    $query.= "FROM patient";
                    $query.= " WHERE p_id = ". $appoint['p_id'];
                    $patient = mysqli_fetch_assoc(mysqli_query($con,$query));
                    $patientName = $patient['p_fname'].' '.$patient['p_lname'];
                    $pdf->Cell(60, 8, $patientName, 1, 0);

                    //THERAPIST DATA
                    $query = "SELECT * ";
                    $query.= "FROM therapist";
                    $query.= " WHERE T_ID = ". $appoint['T_ID'];
                    $therapist = mysqli_fetch_assoc(mysqli_query($con,$query));
                    $therapistName = $therapist['T_fname'].' '.$therapist['T_lname'];
                    $pdf->Cell(40, 8, $therapistName, 1, 0);

                    //CLINIC DATA
                    $query = "SELECT * ";
                    $query.= "FROM clinic";
                    $query.= " WHERE C_Id = ". $appoint['C_Id'];
                    $clinic = mysqli_fetch_assoc(mysqli_query($con,$query));
                    $clinicName = $clinic['C_Name'];
                    $pdf->Cell(40, 8, $clinicName, 1, 0);

                    //ISSUE DATA
                    $query = "SELECT * ";
                    $query.= "FROM type";
                    $query.= " WHERE Type_id = ". $appoint['Type_id'];
                    $type = mysqli_fetch_assoc(mysqli_query($con,$query));
                    $typeName = $type['Type_name'];
                    $pdf->Cell(40, 8, $typeName, 1, 1);
                }
                break;


                case 'ingamba':
                    $select2 = $_POST['choice2'];
                    switch($select2){
                      case 'ibirezi':
                          $pdf->SetFont('Arial','BU',12);
                          //chief from isibo table


                          $pdf->SetFont('Arial','BU',12);
                          //ISIBO INFORMATION
                          $qIngamba = "SELECT umuturage.gender,umuturage.umuturage_id,umuturage.first_name, umuturage.last_name, umuturage.umuturage_dad, umuturage.umuturage_mum, umuturage.dob,umuturage.umuryango_id,nyirinzu.umuryango_id,nyirinzu.inzu_id,inzu.inzu_id,inzu.igipangu_id,igipangu.igipangu_id,igipangu.isibo_id,isibo.isibo_id,isibo.isibo_name FROM `umuturage`,`nyirinzu`,`inzu`,`igipangu`,`isibo`
                          WHERE umuturage.umuryango_id = nyirinzu.umuryango_id
                          AND nyirinzu.inzu_id = inzu.inzu_id
                          AND inzu.igipangu_id = igipangu.igipangu_id
                          AND igipangu.isibo_id = isibo.isibo_id
                          AND TIMESTAMPDIFF(YEAR, umuturage.dob, now()) >= 0 AND TIMESTAMPDIFF(YEAR, umuturage.dob, now()) <= 5
                          ORDER BY umuturage.dob DESC";
                          $pdf->Cell(0,10,"RAPORO Y'INGAMBA 'IBIREZI'", 0, 1, 'C');
                          $pdf->Cell(0,10,'', 0, 1);
                          //build a query to bring every record under that email

                          $pdf->SetFont('Arial','B',8);
                          //execute the query and keep the result in result variable
                          $res = mysqli_query($con,$qIngamba);
                          $count =1;
                          $pdf->Cell(5,8,'No', 1, 0);
                          $pdf->Cell(75,8,"AMAZINA", 1, 0, 'C');
                          $pdf->Cell(20,8,"IGITSINA", 1, 0, 'C');
                          $pdf->Cell(20,8,'IMYAKA', 1, 0, 'C');
                          $pdf->Cell(60,8,'SE', 1, 0, 'C');
                          $pdf->Cell(60,8,'NYINA', 1, 0, 'C');
                          $pdf->Cell(40,8,'ISIBO', 1, 1, 'C');
                          $pdf->SetFont('Arial','', 8);
                          while($umuturage = mysqli_fetch_assoc($res)){
                              //UMUTURAGE DATA
                              $id = $umuturage['umuturage_id'];
                              $fullname = $umuturage['first_name'].' '.$umuturage['last_name'];
                              $dad = $umuturage['umuturage_dad'];
                              $mum = $umuturage['umuturage_mum'];
                              $sex = $umuturage['gender'];
                              $agecheck = "SELECT TIMESTAMPDIFF(YEAR, dob, now()) as age FROM umuturage WHERE umuturage_id=$id";
                              $runAge = mysqli_query($con,$agecheck);
                              $ageArray = mysqli_fetch_assoc($runAge);
                              $finalAge = $ageArray['age'];
                              $isibo = $umuturage['isibo_name'];
                              $pdf->Cell(5,8,$count++, 1, 0, 'C');
                              $pdf->Cell(75,8,$fullname, 1, 0);
                              $pdf->Cell(20,8,$sex, 1, 0,'C');
                              $pdf->Cell(20,8,$finalAge, 1, 0, 'C');
                              $pdf->Cell(60,8,$dad, 1, 0);
                              $pdf->Cell(60,8,$mum, 1, 0);
                              $pdf->Cell(40,8,$isibo, 1, 1, 'C');

                          }
                          break;

                      case 'imbuto':
                          $pdf->SetFont('Arial','BU',12);
                          //chief from isibo table


                          $pdf->SetFont('Arial','BU',12);
                          //ISIBO INFORMATION
                          $qIngamba = "SELECT umuturage.gender,umuturage.umuturage_id,umuturage.first_name, umuturage.last_name, umuturage.umuturage_dad, umuturage.umuturage_mum, umuturage.dob,umuturage.umuryango_id,nyirinzu.umuryango_id,nyirinzu.inzu_id,inzu.inzu_id,inzu.igipangu_id,igipangu.igipangu_id,igipangu.isibo_id,isibo.isibo_id,isibo.isibo_name FROM `umuturage`,`nyirinzu`,`inzu`,`igipangu`,`isibo`
                          WHERE umuturage.umuryango_id = nyirinzu.umuryango_id
                          AND nyirinzu.inzu_id = inzu.inzu_id
                          AND inzu.igipangu_id = igipangu.igipangu_id
                          AND igipangu.isibo_id = isibo.isibo_id
                          AND TIMESTAMPDIFF(YEAR, umuturage.dob, now()) >= 6 AND TIMESTAMPDIFF(YEAR, umuturage.dob, now()) <= 12
                          ORDER BY umuturage.dob DESC";
                          $pdf->Cell(0,10,"RAPORO Y'INGAMBA 'IMBUTO'", 0, 1, 'C');
                          $pdf->Cell(0,10,'', 0, 1);
                          //build a query to bring every record under that email

                          $pdf->SetFont('Arial','B',8);
                          //execute the query and keep the result in result variable
                          $res = mysqli_query($con,$qIngamba);
                          $count =1;
                          $pdf->Cell(5,8,'No', 1, 0);
                          $pdf->Cell(75,8,"AMAZINA", 1, 0, 'C');
                          $pdf->Cell(20,8,"IGITSINA", 1, 0, 'C');
                          $pdf->Cell(20,8,'IMYAKA', 1, 0, 'C');
                          $pdf->Cell(60,8,'SE', 1, 0, 'C');
                          $pdf->Cell(60,8,'NYINA', 1, 0, 'C');
                          $pdf->Cell(40,8,'ISIBO', 1, 1, 'C');
                          $pdf->SetFont('Arial','', 8);
                          while($umuturage = mysqli_fetch_assoc($res)){
                              //UMUTURAGE DATA
                              $id = $umuturage['umuturage_id'];
                              $fullname = $umuturage['first_name'].' '.$umuturage['last_name'];
                              $dad = $umuturage['umuturage_dad'];
                              $mum = $umuturage['umuturage_mum'];
                              $sex = $umuturage['gender'];
                              $agecheck = "SELECT TIMESTAMPDIFF(YEAR, dob, now()) as age FROM umuturage WHERE umuturage_id=$id";
                              $runAge = mysqli_query($con,$agecheck);
                              $ageArray = mysqli_fetch_assoc($runAge);
                              $finalAge = $ageArray['age'];
                              $isibo = $umuturage['isibo_name'];
                              $pdf->Cell(5,8,$count++, 1, 0,'C');
                              $pdf->Cell(75,8,$fullname, 1, 0);
                              $pdf->Cell(20,8,$sex, 1, 0,'C');
                              $pdf->Cell(20,8,$finalAge, 1, 0,'C');
                              $pdf->Cell(60,8,$dad, 1, 0);
                              $pdf->Cell(60,8,$mum, 1, 0);
                              $pdf->Cell(40,8,$isibo, 1, 1,'C');

                          }
                          break;

                          case 'indirira':
                              $pdf->SetFont('Arial','BU',12);
                              //chief from isibo table


                              $pdf->SetFont('Arial','BU',12);
                              //ISIBO INFORMATION
                              $qIngamba = "SELECT umuturage.gender,umuturage.tel,umuturage.nid,umuturage.umuturage_id,umuturage.first_name, umuturage.last_name, umuturage.umuturage_dad, umuturage.umuturage_mum, umuturage.dob,umuturage.umuryango_id,nyirinzu.umuryango_id,nyirinzu.inzu_id,inzu.inzu_id,inzu.igipangu_id,igipangu.igipangu_id,igipangu.isibo_id,isibo.isibo_id,isibo.isibo_name FROM `umuturage`,`nyirinzu`,`inzu`,`igipangu`,`isibo`
                              WHERE umuturage.umuryango_id = nyirinzu.umuryango_id
                              AND nyirinzu.inzu_id = inzu.inzu_id
                              AND inzu.igipangu_id = igipangu.igipangu_id
                              AND igipangu.isibo_id = isibo.isibo_id
                              AND TIMESTAMPDIFF(YEAR, umuturage.dob, now()) >= 13 AND TIMESTAMPDIFF(YEAR, umuturage.dob, now()) <= 18
                              ORDER BY umuturage.dob DESC";
                              $pdf->Cell(0,10,"RAPORO Y'INGAMBA 'INDIRIRA'", 0, 1, 'C');
                              $pdf->Cell(0,10,'', 0, 1);
                              //build a query to bring every record under that email

                              $pdf->SetFont('Arial','B',8);
                              //execute the query and keep the result in result variable
                              $res = mysqli_query($con,$qIngamba);
                              $count =1;
                              $pdf->Cell(5,8,'No', 1, 0);
                              $pdf->Cell(50,8,"AMAZINA", 1, 0, 'C');
                              $pdf->Cell(20,8,"IGITSINA", 1, 0, 'C');
                              $pdf->Cell(15,8,'IMYAKA', 1, 0, 'C');
                              $pdf->Cell(30,8,"INDANGAMUNTU", 1, 0, 'C');
                              $pdf->Cell(35,8,"TEREFONE", 1, 0, 'C');
                              $pdf->Cell(50,8,'SE', 1, 0, 'C');
                              $pdf->Cell(50,8,'NYINA', 1, 0, 'C');
                              $pdf->Cell(30,8,'ISIBO', 1, 1, 'C');
                              $pdf->SetFont('Arial','', 8);
                              while($umuturage = mysqli_fetch_assoc($res)){
                                  //UMUTURAGE DATA
                                  $id = $umuturage['umuturage_id'];
                                  $fullname = $umuturage['first_name'].' '.$umuturage['last_name'];
                                  $dad = $umuturage['umuturage_dad'];
                                  $mum = $umuturage['umuturage_mum'];
                                  $sex = $umuturage['gender'];
                                  $agecheck = "SELECT TIMESTAMPDIFF(YEAR, dob, now()) as age FROM umuturage WHERE umuturage_id=$id";
                                  $runAge = mysqli_query($con,$agecheck);
                                  $ageArray = mysqli_fetch_assoc($runAge);
                                  $finalAge = $ageArray['age'];
                                  $isibo = $umuturage['isibo_name'];
                                  $nid = $umuturage['nid'];
                                  $tel = $umuturage['tel'];
                                  $pdf->Cell(5,8,$count++, 1, 0,'C');
                                  $pdf->Cell(50,8,$fullname, 1, 0);
                                  $pdf->Cell(20,8,$sex, 1, 0,'C');
                                  $pdf->Cell(15,8,$finalAge, 1, 0,'C');
                                  $pdf->Cell(30,8,$nid, 1, 0, 'C');
                                  $pdf->Cell(35,8,$tel, 1, 0,'C');
                                  $pdf->Cell(50,8,$dad, 1, 0);
                                  $pdf->Cell(50,8,$mum, 1, 0);
                                  $pdf->Cell(30,8,$isibo, 1, 1,'C');

                              }
                              break;

                              case 'indahangarwa':
                                  $pdf->SetFont('Arial','BU',12);
                                  //chief from isibo table


                                  $pdf->SetFont('Arial','BU',12);
                                  //ISIBO INFORMATION
                                  $qIngamba = "SELECT umuturage.gender,umuturage.icyo_akora,umuturage.tel,umuturage.nid,umuturage.umuturage_id,umuturage.first_name, umuturage.last_name, umuturage.umuturage_dad, umuturage.umuturage_mum, umuturage.dob,umuturage.umuryango_id,nyirinzu.umuryango_id,nyirinzu.inzu_id,inzu.inzu_id,inzu.igipangu_id,igipangu.igipangu_id,igipangu.isibo_id,isibo.isibo_id,isibo.isibo_name FROM `umuturage`,`nyirinzu`,`inzu`,`igipangu`,`isibo`
                                  WHERE umuturage.umuryango_id = nyirinzu.umuryango_id
                                  AND nyirinzu.inzu_id = inzu.inzu_id
                                  AND inzu.igipangu_id = igipangu.igipangu_id
                                  AND igipangu.isibo_id = isibo.isibo_id
                                  AND TIMESTAMPDIFF(YEAR, umuturage.dob, now()) >= 19 AND TIMESTAMPDIFF(YEAR, umuturage.dob, now()) <= 35
                                  ORDER BY umuturage.dob DESC";
                                  $pdf->Cell(0,10,"RAPORO Y'INGAMBA 'INDAHANGARWA'", 0, 1, 'C');
                                  $pdf->Cell(0,10,'', 0, 1);
                                  //build a query to bring every record under that email

                                  $pdf->SetFont('Arial','B',8);
                                  //execute the query and keep the result in result variable
                                  $res = mysqli_query($con,$qIngamba);
                                  $count =1;
                                  $pdf->Cell(5,8,'No', 1, 0);
                                  $pdf->Cell(80,8,"AMAZINA", 1, 0, 'C');
                                  $pdf->Cell(20,8,"IGITSINA", 1, 0, 'C');
                                  $pdf->Cell(15,8,'IMYAKA', 1, 0, 'C');
                                  $pdf->Cell(30,8,"INDANGAMUNTU", 1, 0, 'C');
                                  $pdf->Cell(35,8,"TEREFONE", 1, 0, 'C');
                                  $pdf->Cell(50,8,"ICYO AKORA", 1, 0, 'C');
                                  $pdf->Cell(40,8,'ISIBO', 1, 1, 'C');
                                  $pdf->SetFont('Arial','', 8);
                                  while($umuturage = mysqli_fetch_assoc($res)){
                                      //UMUTURAGE DATA
                                      $id = $umuturage['umuturage_id'];
                                      $fullname = $umuturage['first_name'].' '.$umuturage['last_name'];
                                      $dad = $umuturage['umuturage_dad'];
                                      $mum = $umuturage['umuturage_mum'];
                                      $job = $umuturage['icyo_akora'];
                                      $sex = $umuturage['gender'];
                                      $agecheck = "SELECT TIMESTAMPDIFF(YEAR, dob, now()) as age FROM umuturage WHERE umuturage_id=$id";
                                      $runAge = mysqli_query($con,$agecheck);
                                      $ageArray = mysqli_fetch_assoc($runAge);
                                      $finalAge = $ageArray['age'];
                                      $isibo = $umuturage['isibo_name'];
                                      $nid = $umuturage['nid'];
                                      $tel = $umuturage['tel'];
                                      $pdf->Cell(5,8,$count++, 1, 0,'C');
                                      $pdf->Cell(80,8,$fullname, 1, 0);
                                      $pdf->Cell(20,8,$sex, 1, 0,'C');
                                      $pdf->Cell(15,8,$finalAge, 1, 0,'C');
                                      $pdf->Cell(30,8,$nid, 1, 0,'C');
                                      $pdf->Cell(35,8,$tel, 1, 0,'C');
                                      $pdf->Cell(50,8,$job, 1, 0);
                                      $pdf->Cell(40,8,$isibo, 1, 1,'C');

                                  }
                                  break;

                                  case 'ingobokarugamba':
                                      $pdf->SetFont('Arial','BU',12);
                                      //chief from isibo table


                                      $pdf->SetFont('Arial','BU',12);
                                      //ISIBO INFORMATION
                                      $qIngamba = "SELECT umuturage.gender,umuturage.icyo_akora,umuturage.tel,umuturage.nid,umuturage.umuturage_id,umuturage.first_name, umuturage.last_name, umuturage.umuturage_dad, umuturage.umuturage_mum, umuturage.dob,umuturage.umuryango_id,nyirinzu.umuryango_id,nyirinzu.inzu_id,inzu.inzu_id,inzu.igipangu_id,igipangu.igipangu_id,igipangu.isibo_id,isibo.isibo_id,isibo.isibo_name FROM `umuturage`,`nyirinzu`,`inzu`,`igipangu`,`isibo`
                                      WHERE umuturage.umuryango_id = nyirinzu.umuryango_id
                                      AND nyirinzu.inzu_id = inzu.inzu_id
                                      AND inzu.igipangu_id = igipangu.igipangu_id
                                      AND igipangu.isibo_id = isibo.isibo_id
                                      AND TIMESTAMPDIFF(YEAR, umuturage.dob, now()) >= 36 AND TIMESTAMPDIFF(YEAR, umuturage.dob, now()) <= 55
                                      ORDER BY umuturage.dob DESC";
                                      $pdf->Cell(0,10,"RAPORO Y'INGAMBA 'INGOBOKARUGAMBA'", 0, 1, 'C');
                                      $pdf->Cell(0,10,'', 0, 1);
                                      //build a query to bring every record under that email

                                      $pdf->SetFont('Arial','B',8);
                                      //execute the query and keep the result in result variable
                                      $res = mysqli_query($con,$qIngamba);
                                      $count =1;
                                      $pdf->Cell(5,8,'No', 1, 0);
                                      $pdf->Cell(80,8,"AMAZINA", 1, 0, 'C');
                                      $pdf->Cell(20,8,"IGITSINA", 1, 0, 'C');
                                      $pdf->Cell(15,8,'IMYAKA', 1, 0, 'C');
                                      $pdf->Cell(30,8,"INDANGAMUNTU", 1, 0, 'C');
                                      $pdf->Cell(35,8,"TEREFONE", 1, 0, 'C');
                                      $pdf->Cell(40,8,"ICYO AKORA", 1, 0, 'C');
                                      $pdf->Cell(50,8,'ISIBO', 1, 1, 'C');
                                      $pdf->SetFont('Arial','', 8);
                                      while($umuturage = mysqli_fetch_assoc($res)){
                                          //UMUTURAGE DATA
                                          $id = $umuturage['umuturage_id'];
                                          $fullname = $umuturage['first_name'].' '.$umuturage['last_name'];
                                          $dad = $umuturage['umuturage_dad'];
                                          $mum = $umuturage['umuturage_mum'];
                                          $job = $umuturage['icyo_akora'];
                                          $sex = $umuturage['gender'];
                                          $agecheck = "SELECT TIMESTAMPDIFF(YEAR, dob, now()) as age FROM umuturage WHERE umuturage_id=$id";
                                          $runAge = mysqli_query($con,$agecheck);
                                          $ageArray = mysqli_fetch_assoc($runAge);
                                          $finalAge = $ageArray['age'];
                                          $isibo = $umuturage['isibo_name'];
                                          $nid = $umuturage['nid'];
                                          $tel = $umuturage['tel'];
                                          $pdf->Cell(5,8,$count++, 1, 0,'C');
                                          $pdf->Cell(80,8,$fullname, 1, 0);
                                          $pdf->Cell(20,8,$sex, 1, 0,'C');
                                          $pdf->Cell(15,8,$finalAge, 1, 0,'C');
                                          $pdf->Cell(30,8,$nid, 1, 0,'C');
                                          $pdf->Cell(35,8,$tel, 1, 0,'C');
                                          $pdf->Cell(40,8,$job, 1, 0);
                                          $pdf->Cell(50,8,$isibo, 1, 1,'C');

                                      }
                                      break;

                                      case 'inararibonye':
                                          $pdf->SetFont('Arial','BU',12);
                                          //chief from isibo table


                                          $pdf->SetFont('Arial','BU',12);
                                          //ISIBO INFORMATION
                                          $qIngamba = "SELECT umuturage.gender,umuturage.icyo_akora,umuturage.tel,umuturage.nid,umuturage.umuturage_id,umuturage.first_name, umuturage.last_name, umuturage.umuturage_dad, umuturage.umuturage_mum, umuturage.dob,umuturage.umuryango_id,nyirinzu.umuryango_id,nyirinzu.inzu_id,inzu.inzu_id,inzu.igipangu_id,igipangu.igipangu_id,igipangu.isibo_id,isibo.isibo_id,isibo.isibo_name FROM `umuturage`,`nyirinzu`,`inzu`,`igipangu`,`isibo`
                                          WHERE umuturage.umuryango_id = nyirinzu.umuryango_id
                                          AND nyirinzu.inzu_id = inzu.inzu_id
                                          AND inzu.igipangu_id = igipangu.igipangu_id
                                          AND igipangu.isibo_id = isibo.isibo_id
                                          AND TIMESTAMPDIFF(YEAR, umuturage.dob, now()) >= 56
                                          ORDER BY umuturage.dob DESC";
                                          $pdf->Cell(0,10,"RAPORO Y'INGAMBA 'INARARIBONYE'", 0, 1, 'C');
                                          $pdf->Cell(0,10,'', 0, 1);
                                          //build a query to bring every record under that email

                                          $pdf->SetFont('Arial','B',8);
                                          //execute the query and keep the result in result variable
                                          $res = mysqli_query($con,$qIngamba);
                                          $count =1;
                                          $pdf->Cell(5,8,'No', 1, 0);
                                          $pdf->Cell(80,8,"AMAZINA", 1, 0, 'C');
                                          $pdf->Cell(20,8,"IGITSINA", 1, 0, 'C');
                                          $pdf->Cell(15,8,'IMYAKA', 1, 0, 'C');
                                          $pdf->Cell(30,8,"INDANGAMUNTU", 1, 0, 'C');
                                          $pdf->Cell(35,8,"TEREFONE", 1, 0, 'C');
                                          $pdf->Cell(50,8,"ICYO AKORA", 1, 0, 'C');
                                          $pdf->Cell(50,8,'ISIBO', 1, 1, 'C');
                                          $pdf->SetFont('Arial','', 8);
                                          while($umuturage = mysqli_fetch_assoc($res)){
                                              //UMUTURAGE DATA
                                              $id = $umuturage['umuturage_id'];
                                              $fullname = $umuturage['first_name'].' '.$umuturage['last_name'];
                                              $dad = $umuturage['umuturage_dad'];
                                              $mum = $umuturage['umuturage_mum'];
                                              $sex = $umuturage['gender'];
                                              $job = $umuturage['icyo_akora'];
                                              $agecheck = "SELECT TIMESTAMPDIFF(YEAR, dob, now()) as age FROM umuturage WHERE umuturage_id=$id";
                                              $runAge = mysqli_query($con,$agecheck);
                                              $ageArray = mysqli_fetch_assoc($runAge);
                                              $finalAge = $ageArray['age'];
                                              $isibo = $umuturage['isibo_name'];
                                              $nid = $umuturage['nid'];
                                              $tel = $umuturage['tel'];
                                              $pdf->Cell(5,8,$count++, 1, 0,'C');
                                              $pdf->Cell(80,8,$fullname, 1, 0);
                                              $pdf->Cell(20,8,$sex, 1, 0,'C');
                                              $pdf->Cell(15,8,$finalAge, 1, 0,'C');
                                              $pdf->Cell(30,8,$nid, 1, 0,'C');
                                              $pdf->Cell(35,8,$tel, 1, 0,'C');
                                              $pdf->Cell(50,8,$job, 1, 0,'C');
                                              $pdf->Cell(50,8,$isibo, 1, 1,'C');

                                          }
                                          break;

                                          case 'none':
                                              $pdf->SetFont('Arial','BU',12);
                                              //chief from isibo table


                                              $pdf->SetFont('Arial','BU',12);
                                              //ISIBO INFORMATION
                                              $qIngamba = "SELECT umuturage.gender,umuturage.icyo_akora,umuturage.tel,umuturage.nid,umuturage.umuturage_id,umuturage.first_name, umuturage.last_name, umuturage.umuturage_dad, umuturage.umuturage_mum, umuturage.dob,umuturage.umuryango_id,nyirinzu.umuryango_id,nyirinzu.inzu_id,inzu.inzu_id,inzu.igipangu_id,igipangu.igipangu_id,igipangu.isibo_id,isibo.isibo_id,isibo.isibo_name FROM `umuturage`,`nyirinzu`,`inzu`,`igipangu`,`isibo`
                                              WHERE umuturage.umuryango_id = nyirinzu.umuryango_id
                                              AND nyirinzu.inzu_id = inzu.inzu_id
                                              AND inzu.igipangu_id = igipangu.igipangu_id
                                              AND igipangu.isibo_id = isibo.isibo_id
                                              ORDER BY umuturage.dob DESC";
                                              $pdf->Cell(0,10,"RAPORO Y'INGAMBA ZOSE", 0, 1, 'C');
                                              $pdf->Cell(0,10,'', 0, 1);
                                              //build a query to bring every record under that email

                                              $pdf->SetFont('Arial','B',8);
                                              //execute the query and keep the result in result variable
                                              $res = mysqli_query($con,$qIngamba);
                                              $count =1;
                                              $pdf->Cell(5,8,'No', 1, 0);
                                              $pdf->Cell(60,8,"AMAZINA", 1, 0, 'C');
                                              $pdf->Cell(20,8,"IGITSINA", 1, 0, 'C');
                                              $pdf->Cell(15,8,'IMYAKA', 1, 0, 'C');
                                              $pdf->Cell(30,8,'INGAMBA', 1, 0, 'C');
                                              $pdf->Cell(30,8,"INDANGAMUNTU", 1, 0, 'C');
                                              $pdf->Cell(25,8,"TEREFONE", 1, 0, 'C');
                                              $pdf->Cell(40,8,"ICYO AKORA", 1, 0, 'C');
                                              $pdf->Cell(35,8,'ISIBO', 1, 1, 'C');
                                              $pdf->SetFont('Arial','', 8);
                                              while($umuturage = mysqli_fetch_assoc($res)){
                                                  //UMUTURAGE DATA
                                                  $id = $umuturage['umuturage_id'];
                                                  $fullname = $umuturage['first_name'].' '.$umuturage['last_name'];
                                                  $dad = $umuturage['umuturage_dad'];
                                                  $mum = $umuturage['umuturage_mum'];
                                                  $sex = $umuturage['gender'];
                                                  $job = $umuturage['icyo_akora'];
                                                  $agecheck = "SELECT TIMESTAMPDIFF(YEAR, dob, now()) as age FROM umuturage WHERE umuturage_id=$id";
                                                  $runAge = mysqli_query($con,$agecheck);
                                                  $ageArray = mysqli_fetch_assoc($runAge);
                                                  $finalAge = $ageArray['age'];
                                                  $isibo = $umuturage['isibo_name'];
                                                  $nid = $umuturage['nid'];
                                                  $tel = $umuturage['tel'];
                                                  $pdf->Cell(5,8,$count++, 1, 0,'C');
                                                  $pdf->Cell(60,8,$fullname, 1, 0);
                                                  $pdf->Cell(20,8,$sex, 1, 0,'C');
                                                  $pdf->Cell(15,8,$finalAge, 1, 0,'C');
                                                  if(($finalAge>=0)&&($finalAge<=5)){$pdf->Cell(30,8,'Ibirezi', 1, 0,'C');}
                                                  else if(($finalAge>=6)&&($finalAge<=12)){$pdf->Cell(30,8,'Imbuto', 1, 0,'C');}
                                                  else if(($finalAge>=13)&&($finalAge<=18)){$pdf->Cell(30,8,'Indirira', 1, 0,'C');}
                                                  else if(($finalAge>=19)&&($finalAge<=35)){$pdf->Cell(30,8,'Indahangarwa', 1, 0,'C');}
                                                  else if(($finalAge>=36)&&($finalAge<=55)){$pdf->Cell(30,8,'Ingobokarugamba', 1, 0,'C');}
                                                  else if($finalAge>=56){$pdf->Cell(30,8,'Inararibonye', 1, 0,'C');}
                                                  $pdf->Cell(30,8,$nid, 1, 0,'C');
                                                  $pdf->Cell(25,8,$tel, 1, 0,'C');
                                                  $pdf->Cell(40,8,$job, 1, 0,'C');
                                                  $pdf->Cell(35,8,$isibo, 1, 1,'C');

                                              }
                                              break;
                    }

        }

    }

    // Cell(width[int], height[int], text[stiring], border[int], newLine[int], alignment[char], fill,[bool] link)
    // $pdf->setY();
    $pdf->Ln(20);
    $pdf->Cell(70,10,'Bikozwe tariki '.date('d/m/y'),0, 2, 'L');
    $pdf->Cell(70,10,"Umukono w'umukuru w'umudugudu",0,0,'L');
    $pdf->Cell(50,10,'');
	$pdf->AliasNbPages();
    $pdf->Output();
?>
