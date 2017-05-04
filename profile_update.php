<?php

include_once 'database.php';
include_once 'session.php';

$user_id = $_SESSION['user_id'];

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$country_id = $_POST['country_id'];

$target_dir = "slike/";
$random = date('Ymdhis').rand(1,1000);
$target_file = $target_dir.$random.basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
//dobi končnico datoteke
$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check !== false) {
        //echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        //echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
/*if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}*/
// Check file size
if ($_FILES["fileToUpload"]["size"] > 5000000) {
    //echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if ($imageFileType != "jpg" && 
        $imageFileType != "png" && 
        $imageFileType != "jpeg" &&
        $imageFileType != "gif") {
    //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    //echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], 
                            $target_file)) {
        //vse je ok
           
        //echo $query; die();
    } else {
        //echo "Sorry, there was an error uploading your file.";
    }
}
//če je $uploadOk = 0, pomeni, da ni bila naložena nobena slika
//če je $uploadOk = 1 je bila naložena slika
if ($uploadOk) {
    //pomeni uporabnik je naložil sliko
    $query = sprintf("UPDATE users SET first_name='%s',
                                           last_name='%s',
                                           country_id=$country_id,
                                           avatar='%s'
                           WHERE id=$user_id",
                    mysqli_real_escape_string($link, $first_name),
                    mysqli_real_escape_string($link, $last_name),
                    mysqli_real_escape_string($link, $target_file));
        //pošljemo nove podatke v bazo
     mysqli_query($link, $query);
}
else {
    $query = sprintf("UPDATE users SET first_name='%s',
                                           last_name='%s',
                                           country_id=$country_id
                           WHERE id=$user_id",
                    mysqli_real_escape_string($link, $first_name),
                    mysqli_real_escape_string($link, $last_name));
        //pošljemo nove podatke v bazo
        mysqli_query($link, $query);
}

//preusmeritev nazaj na profile stran!
header("Location: profile.php");
?>