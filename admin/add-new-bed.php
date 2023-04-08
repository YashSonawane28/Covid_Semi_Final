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
        $result= $database->query("select * from beds");
        $wardno=$_POST['wardno'];
        //$bg=$_POST['bg'];
        $roomtype=$_POST['roomtype'];
        //$Phone_no=$_POST['Phone_no'];
        //$Age=$_POST['Age'];
       // $gender=$_POST['gender'];
        
        

                $sql1="insert into beds(wardno,roomtype,hosid) values('$wardno','$roomtype','$hosid');";
                //$sql2="insert into webuser values('$email','d')";
                $database->query($sql1);
                //$database->query($sql2);

                //echo $sql1;
                //echo $sql2;
                $error= '4';
                
            


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
    

    header("location: appointment.php?action=add&error=".$error);
    ?>
    
   

</body>
</html>