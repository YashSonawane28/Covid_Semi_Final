<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/animations.css">  
    <link rel="stylesheet" href="css/main.css">  
    <link rel="stylesheet" href="css/signup.css">
        
    <title>Create Account</title>
    <style>
        .container{
            animation: transitionIn-X 0.5s;
        }
    </style>
</head>
<body>
<?php

//learn from w3schools.com
//Unset all the server side variables

session_start();

$_SESSION["user"]="";
$_SESSION["usertype"]="";

// Set the new timezone
date_default_timezone_set('Asia/Kolkata');
$date = date('Y-m-d');

$_SESSION["date"]=$date;


//import database
include("connection.php");





if($_POST){

    $result= $database->query("select * from hospitals");

    $hosname=$_POST['hosname'];
    $hosaddress=$_POST['hosaddress'];
    $email=$_POST['newemail'];
    $Phoneno=$_POST['Phoneno'];
    $newpassword=$_POST['newpassword'];
    $cpassword=$_POST['cpassword'];
    $city=$_POST['city'];
    $capacity=$_POST['capacity'];
    $facilities=$_POST['facilities'];
    
    if ($newpassword==$cpassword){
        $sqlmain= "select * from hospitals where email=?;";
        $stmt = $database->prepare($sqlmain);
        $stmt->bind_param("s",$email);
        $stmt->execute();
        $result = $stmt->get_result();
        if($result->num_rows==1){
            $error='<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">Already have an account for this Email address.</label>';
        }else{
            //TODO
            // $city ="Pune";
            //  $capacity=25;
            //  $facilities="Multispeciality";
            // $hosname="Aditya Hospital";
            // $hosaddress="Chakur";
            echo '<script>alert($hosname)</script>';
            $database->query("insert into hospitals(hos_name, address,city,capacity,facilities,email,password,Phoneno) values('$hosname','$hosaddress','$city','$capacity','$facilities','$email','$newpassword','$Phoneno');");
            //$database->query("insert into webuser values('$email','p')");

            //print_r("insert into patient values($pid,'$email','$fname','$lname','$newpassword','$address','$nic','$dob','$tele');");
            $_SESSION["user"]=$email;
            $_SESSION["usertype"]="p";
            $_SESSION["username"]=$fname;

            header('Location: admin/index.php');
            $error='<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;"></label>';
        }
        
    }else{
        $error='<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">Password Conformation Error! Reconform Password</label>';
    }



    
}else{
    //header('location: signup.php');
    $error='<label for="promter" class="form-label"></label>';
}

?>


    <center>
    <div class="container">
        <table border="0" style="width: 69%;">
            <tr>
                <td colspan="2">
                    <p class="header-text">Let's Get Started</p>
                    <p class="sub-text">It's Okey, Now Create User Account.</p>
                </td>
            </tr>

            <tr>
                <form action="" method="POST" >
                <td class="label-td" colspan="2">
                    <label for="hosname" class="form-label">Name: </label>
                </td>
            </tr>
            <tr>
                <td class="label-td" colspan="2">
                    <input type="text" name="hosname" class="input-text" placeholder="Hospital Name" required>
                </td>
                
            </tr>


            <tr>
                <form action="" method="POST" >
                <td class="label-td" colspan="2">
                    <label for="city" class="form-label">City: </label>
                </td>
            </tr>
            <tr>
                <td class="label-td" colspan="2">
                    <input type="text" name="city" class="input-text" placeholder="City" required>
                </td>
                
            </tr>

            <tr>
                <form action="" method="POST" >
                <td class="label-td" colspan="2">
                    <label for="hosaddress" class="form-label">Address: </label>
                </td>
            </tr>
            <tr>
                <td class="label-td" colspan="2">
                    <input type="text" name="hosaddress" class="input-text" placeholder=" Address" required>
                </td>
                
            </tr>

            <tr>
                <form action="" method="POST" >
                <td class="label-td" colspan="2">
                    <label for="capacity" class="form-label">Capacity: </label>
                </td>
            </tr>
            <tr>
                <td class="label-td" colspan="2">
                    <input type="number" name="capacity" class="input-text" placeholder="Capacity of Hospital" required>
                </td>
                
            </tr>

            <tr>
                <form action="" method="POST" >
                <td class="label-td" colspan="2">
                    <label for="facility" class="form-label">Facilities: </label>
                </td>
            </tr>
            <tr>
                <td class="label-td" colspan="2">
                    <input type="text" name="facilities" class="input-text" placeholder="Facilities of Hospital" required>
                </td>
                
            </tr>



            <tr>
                <form action="" method="POST" >
                <td class="label-td" colspan="2">
                    <label for="newemail" class="form-label">Email: </label>
                </td>
            </tr>
            <tr>
                <td class="label-td" colspan="2">
                    <input type="email" name="newemail" class="input-text" placeholder="Email Address" required>
                </td>
                
            </tr>
            <tr>
                <td class="label-td" colspan="2">
                    <label for="tele" class="form-label">Mobile Number: </label>
                </td>
            </tr>
            <tr>
                <td class="label-td" colspan="2">
                    <input type="tel" name="Phoneno" class="input-text"  placeholder="ex: 0712345678" pattern="[0]{1}[0-9]{9}" >
                </td>
            </tr>
            <tr>
                <td class="label-td" colspan="2">
                    <label for="newpassword" class="form-label">Create New Password: </label>
                </td>
            </tr>
            <tr>
                <td class="label-td" colspan="2">
                    <input type="password" name="newpassword" class="input-text" placeholder="New Password" required>
                </td>
            </tr>
            <tr>
                <td class="label-td" colspan="2">
                    <label for="cpassword" class="form-label">Conform Password: </label>
                </td>
            </tr>
            <tr>
                <td class="label-td" colspan="2">
                    <input type="password" name="cpassword" class="input-text" placeholder="Conform Password" required>
                </td>
            </tr>
     
            <tr>
                
                <td colspan="2">
                    <?php echo $error ?>

                </td>
            </tr>
            
            <tr>
                <td>
                    <input type="reset" value="Reset" class="login-btn btn-primary-soft btn" >
                </td>
                <td>
                    <input type="submit" value="Sign Up" class="login-btn btn-primary btn">
                </td>

            </tr>
            <tr>
                <td colspan="2">
                    <br>
                    <label for="" class="sub-text" style="font-weight: 280;">Already have an account&#63; </label>
                    <a href="login.php" class="hover-link1 non-style-link">Login</a>
                    <br><br><br>
                </td>
            </tr>

                    </form>
            </tr>
        </table>

    </div>
</center>
</body>
</html>