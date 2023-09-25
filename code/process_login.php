<?php

//start session that will be used to determine the status of the user if logged in or not
session_start();



include 'config.php';

$email_user=$_POST['useremail'];
$pass_user=$_POST['userpass'];

if(isset($email_user)&&isset($pass_user))
{

    //call fun to login user
    loginUser($connection,$email_user,$pass_user);

}



function loginUser($conn,$email,$pass_login)
{
    //querry information related to that specific  email only
    $sql_fetch="SELECT * FROM Registrationtb WHERE `email`='$email'";
    $res=mysqli_query($conn,$sql_fetch);

    //coz will be fetching details of only one specific user thus use
    $row_returned=mysqli_num_rows($res);
    if($row_returned==1)
    {
       //user email exists thus obtaining the value of passd associated with this email
        $row=mysqli_fetch_assoc($res);
        $db_password=$row['password'];

        //verify the password using the pass_ver fun
        if(password_verify($pass_login,$db_password))
        {
            //define mechanism of disabling the visibility of login and register button while
            //activating the MyProfile and Cart Buttons

            //setting the session variable of user ID which can be used to retrieve all the info of the user whenever needed
           
            //obtain the 1st name of the user after split of whole name ,this name will be used to create the cart table of the user 
            $name_split_array=explode(" ",$row['name']);
            $name_final_user=$name_split_array[0];

            $uniqueUID=$row['id'];
            $_SESSION['user_id']=$uniqueUID;
            $_SESSION['user_name']=$name_final_user;

            //alert user and then start page migration to home
            alertUserPopUp('Congratulations! login successful');
            
        }
        else
        {
            //passd not matching
           alertUserPopUp("incorect login credentials!");
        }
    }
    else
    {
        //provided email is not recognised in the system
       
        alertUserPopUp("user does not exist!");
    }

    
}


function alertUserPopUp($message)
{
    //alert
    echo " <script>alert('$message'); window.open('home.php','_self');</script>";
}

