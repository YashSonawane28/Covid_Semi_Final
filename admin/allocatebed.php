<?php



//import database
include("../connection.php");

if ($_POST) {
    //print_r($_POST);
    //$result= $database->query("select * from webuser");
    $bedid = $_POST['bedid'];
    // $oldemail=$_POST["oldemail"];
    // $roomtype=$_POST['roomtype'];
    // $patientid=$_POST['patientid'];

    $enqid = $_POST['enqid'];
    // $tele=$_POST['Tele'];
    // $experience=$_POST['experience'];
    // $id=$_POST['id00'];



    $enqperson = $database->query("select *from enquiry where enqid=$enqid;");
    for ($y = 0; $y < $enqperson->num_rows; $y++) {
        $row00 = $enqperson->fetch_assoc();
        $hosid = $row00["hosid"];
        $PatientName = $row00["PatientName"];
        $Blood_Grp = $row00["Blood_Grp"];
        $Weight = $row00["Weight"];
        $Phone_no = $row00["Phone_no"];
        $DOB = $row00["DOB"];
        $Age = $row00["Age"];
        $pemail = $row00["pemail"];
        $Disease_Hist = $row00["Disease_Hist"];
        $Reqbed = $row00["Reqbed"];
        $Address = $row00["Address"];
        $Oxygenlevel = $row00["Oxygenlevel"];
        $gender = $row00["gender"];

    }
    
    //$sql1="insert into doctor(docemail,docname,docpassword,docnic,doctel,specialties) values('$email','$name','$password','$nic','$tele',$spec);";
    $sql1 = "insert into patients(pemail,hosid,PatientName,Phone_no,Admission_Date,gender,Age,DOB,Disease_Hist,Blood_Grp,bedid) values('$pemail','$hosid','$PatientName','$Phone_no',sysdate(),'$gender','$Age','$DOB','$Disease_Hist','$Blood_Grp','$bedid');";
    //$sql2="insert into webuser values('$email','d')";
    $database->query($sql1);
    $sql3 = "delete from enquiry where pemail='$pemail' ;";
    $database->query($sql3);

    // $sql1="update webuser set email='$email' where email='$oldemail' ;";
    // $database->query($sql1);
    //echo $sql1;
    //echo $sql2;
    $error = '4';

    // if ($password==$cpassword){
    //     $error='3';
    //     $result= $database->query("select doctor.docid from doctor inner join webuser on doctor.docemail=webuser.email where webuser.email='$email';");
    //     //$resultqq= $database->query("select * from doctor where docid='$id';");
    //     if($result->num_rows==1){
    //         $id2=$result->fetch_assoc()["docid"];
    //     }else{
    //         $id2=$id;
    //     }

    //     echo $id2."jdfjdfdh";
    //     if($id2!=$id){
    //         $error='1';
    //         //$resultqq1= $database->query("select * from doctor where docemail='$email';");
    //         //$did= $resultqq1->fetch_assoc()["docid"];
    //         //if($resultqq1->num_rows==1){

    //     }else{

    //         //$sql1="insert into doctor(docemail,docname,docpassword,docnic,doctel,specialties) values('$email','$name','$password','$nic','$tele',$spec);";
    //         $sql1="update doctor set docEmail='$email',doctorName='$name',contactno='$tele',specilization=$spec,experience='$experience' where docid=$id ;";
    //         $database->query($sql1);

    //         // $sql1="update webuser set email='$email' where email='$oldemail' ;";
    //         // $database->query($sql1);
    //         //echo $sql1;
    //         //echo $sql2;
    //         $error= '4';

    //     }

    // }else{
    //     $error='2';
    // }




} else {
    //header('location: signup.php');
    $error = '3';
}


header("location: appointment.php?action=edit&error=" . $error . "&id=" . $id);
?>



</body>

</html>