<?php
include 'config.php';

$email_user=$_POST['useremail'];
$passA=$_POST['userpass1'];
$passB=$_POST['userpass2'];

//check if the two passwords match else alert error
if(strcmp($passA,$passB)==0)
{
    //proceed call fun update pass
    funResetPassword($connection,$email_user,$passA);

}
else
{
    //alert passds dont match
    alertUserNoMatch("passwords do not match try again!");

}


function funResetPassword($conn,$email,$pass)
{
//update the user password connected to the email

$sql="SELECT * FROM Registrationtb WHERE `email`='$email'";
$querry=mysqli_query($conn,$sql) or die("failed to update user");

$rows=mysqli_num_rows($querry);

if($rows==1)
{
  //proceed update email present/ user has an account
    $row_result=mysqli_fetch_assoc($querry);   
    //obtain the id which will be used to update the user pass
    $user_ID=$row_result['id'];

    //sql update the user pass that has been hashed
    $hash_pass=password_hash($pass,PASSWORD_DEFAULT);

    //begin the process of updating the password
    $query_update="UPDATE Registrationtb SET `password`='$hash_pass' WHERE `id`='$user_ID'";

    //execute update querry
    if(mysqli_query($conn,$query_update))
    {
        //password updated successfully!
        alertUserPopUp("Congratulations! password updated successfully");
    }
    else
    {
        //something went wrong during update process
        alertUserPopUp("password update failure!");
    }
}
else
{
    //user does not exist
    alertUserPopUp("user does not exist!");
}


}



function alertUserPopUp($message)
{
    //alert
    echo "    <script>alert('$message'); window.open('home.php','_self');</script>";
}

function alertUserNoMatch($message)
{
    //alert
    echo "    <script>alert('$message'); window.open('reset.php','_self');</script>";
}