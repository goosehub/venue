<?php
header ("Location: ../index.php");

include '../connect.php';


     if($_SERVER['REQUEST_METHOD'] == 'POST')
{

$image_info = getimagesize($_FILES["file"]["tmp_name"]);
$image_width = $image_info[0];
$image_height = $image_info[1];

//upload
$allowedExts = array("gif", "jpeg", "jpg", "png");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);

if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/jpg")
|| ($_FILES["file"]["type"] == "image/pjpeg")
|| ($_FILES["file"]["type"] == "image/x-png")
|| ($_FILES["file"]["type"] == "image/png"))
&& ($_FILES["file"]["size"] < 1600000)
&& ($image_height < 1600)
&& ($image_width < 1600)
&& in_array($extension, $allowedExts)) {
  if ($_FILES["file"]["error"] > 0) {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
  } else {
    echo "Upload: " . $_FILES["file"]["name"] . "<br>";
    echo "Type: " . $_FILES["file"]["type"] . "<br>";
    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";
    if (file_exists("upload/" . $_FILES["file"]["name"])) {
      echo $_FILES["file"]["name"] . " already exists. ";
    } else {
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "../images/" . $_FILES["file"]["name"]);
      echo "Stored in: " . "images/" . $_FILES["file"]["name"];
    }
  }
} else {
  echo "Invalid file";
}

$filename = $_FILES["file"]["name"];
$filename = mysqli_real_escape_string($con, $filename);
$operation = "INSERT INTO
                    image(filename)
                VALUES('". $filename . "');";
$result = mysqli_query($con, $operation);   

}

// exit;

      ?>