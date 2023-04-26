<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/animations.css">  
    <link rel="stylesheet" href="../css/main.css">  
    <link rel="stylesheet" href="../css/admin.css">
        
    <title>Doctor</title>
    <style>
        .popup{
            animation: transitionIn-Y-bottom 0.5s;
        }
</style>
</head>
<body>
    <?php

    //learn from w3schools.com

    session_start();

    if(isset($_SESSION["user"])){
        if(($_SESSION["user"])=="" or $_SESSION['usertype']!='a'){
            header("location: ../login.php");
        }

    }else{
        header("location: ../login.php");
    }
    
    

    //import database
    include("../connection.php");

    $email = $_SESSION["user"];
    //echo($email);
    $hosid1 = $database->query("select hosid from hospitals where email = '$email';");
    for ($y=0;$y<$hosid1->num_rows;$y++){
        $row00 = $hosid1->fetch_assoc();
        $hosid = $row00["hosid"];
    }
    ;

    if($_POST){
        //print_r($_POST);
        $result= $database->query("select * from patients");
        $PatientName=$_POST['PatientName'];
        $Blood_Grp=$_POST["Blood_Grp"];
        $pemail=$_POST['pemail'];
        $Phone_no=$_POST['Phone_no'];
        $Age=$_POST["Age"];
        $gender=$_POST['gender'];
        $Admission_Date=$_POST['Admission_Date'];
        $DOB=$_POST['DOB'];
        $Admission_Date=$_POST['Admission_Date'];
        $Disease_Hist=$_POST["Disease_Hist"];
        $bedid=$_POST["bedid"];


        
        $result= $database->query("select * from patients where pemail='$pemail';");
            if($result->num_rows==1){
                $error='1';
            }else{

                $sql1="insert into patients(pemail,hosid,PatientName,Phone_no,Admission_Date,gender,Age,DOB,Disease_Hist,Blood_Grp,bedid) values('$pemail','$hosid','$PatientName','$Phone_no','$Admission_Date','$gender','$Age','$DOB','$Disease_Hist','$Blood_Grp','$bedid');";
                //$sql2="insert into webuser values('$email','d')";
                $database->query($sql1);
                //$database->query($sql2);

                //echo $sql1;
                //echo $sql2;
                $error= '4';
                
            }


        // if ($password==$cpassword){
        //     $error='3';
        //     $result= $database->query("select * from doctors where docEmail='$docEmail';");
        //     if($result->num_rows==1){
        //         $error='1';
        //     }else{

        //         $sql1="insert into doctor(docEmail,doctorName,contactno,specilization) values('$docEmail','$name','$tele',$spec);";
        //         //$sql2="insert into webuser values('$email','d')";
        //         $database->query($sql1);
        //         //$database->query($sql2);

        //         //echo $sql1;
        //         //echo $sql2;
        //         $error= '4';
                
        //     }
            
        // }else{
        //     $error='2';
        // }
    
    
        
        
    }else{
        //header('location: signup.php');
        $error='3';
    }
    

    header("location: doctors.php?action=add&error=".$error);
    ?>
    
   

</body>
</html>