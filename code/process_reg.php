<?php 
include 'config.php';

$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];
$userEmail=$_POST['useremail'];
$userPass=$_POST['userpass'];
$userCounty=$_POST['usercounty'];
$userPhone=$_POST['userphone'];

if(strcmp($firstname,"")==0 || strcmp($userEmail,"")==0 ||
 strcmp($userPass,"")==0 || strcmp($userCounty,"")==0|| 
 strcmp($userPhone,"")==0 ||strcmp($lastname,"")==0)
{
    //some fields are empty
    alertUser('empty fields unacceptable!');
}
else
{
    //no field is empty
    echo "<pre>";
    echo "all fields";

    var_dump($_POST);
    echo "</pre>";
    //

    //obtain the full name in one string
    $fullName="$firstname $lastname";

    if(str_contains($userEmail,".com"))
    {
        //check if there is any number inside the full name provided
        if(str_contains($fullName,"0")||str_contains($fullName,"1")||str_contains($fullName,"2")||str_contains($fullName,"3")||
        str_contains($fullName,"4")||str_contains($fullName,"5")||str_contains($fullName,"6")||str_contains($fullName,"7")||
        str_contains($fullName,"8")||str_contains($fullName,"9"))
        {
            //user entered a alphanumeric name disallow
            alertUser("please enter a valid name! ($fullName)");

        }

        else
        {
            
            //test the number entered if is valid. mostly disallow numbers containing letters
          if(is_numeric($userPhone))
          {
           
            //call fun regist
            registerUserBackend($connection,$fullName,$userEmail,$userPass,$userCounty,$userPhone);
          }
          else
          {
            alertUser("phone number is invalid ($userPhone)");
          }

        }
    }
    else
    {
        //email does not end in gmal format
        alertUser("please enter a valid email! ($userEmail)");
    }

}

function alertUser($message)
{
    echo "<script> alert('$message'); window.open('registration.php','_self');</script>";
}

function registerUserBackend($connector,$name,$email,$pass,$county,$phone)
{
    $encryptedPass=password_hash($pass,PASSWORD_DEFAULT);
    
    $sql_register="INSERT INTO registrationtb VALUES ('', '$name', '$email', '$encryptedPass', '$phone', '$county')";

    if(mysqli_query($connector,$sql_register))
    {
        //user registered successfully
        alertSuccess("Congratulations! Registration Successful");

    }

    else
    {
        //error occured during the process of regis
        alertUser("Registration Failed! try again later");
    }
}

function alertSuccess($message)
{
    echo "<script> alert('$message'); window.open('home.php','_self');</script>";

}
