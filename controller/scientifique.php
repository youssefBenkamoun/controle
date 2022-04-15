<?php


extract($_POST);
/*
 //'Getting file name'
$filename = $_FILES['file']['name'];
$file_ext = substr($filename, strripos($filename, '.')); // get file name
$newfilename = md5($cin) . $file_ext;

//'Location'
$location = "../img/" . $newfilename;
$uploadOk = 1;
$imageFileType = pathinfo($location, PATHINFO_EXTENSION);

 //'Valid Extensions '
$valid_extensions = array("jpg","zip", "jpeg", "png");
//' Check file extension '
if (!in_array(strtolower($imageFileType), $valid_extensions)) {
    $uploadOk = 0;
}

if ($uploadOk == 0) {
    echo 0;
} else {
    //' Upload file '
    if (move_uploaded_file($_FILES['file']['tmp_name'], $location)) {
        echo $newfilename;
    } else {
        echo 0;
    }
}
*/
/*
// connect to database
$conn = mysqli_connect('localhost', 'root', '', 'pointage1');

$sql = "SELECT * FROM files";
$result = mysqli_query($conn, $sql);

$files = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Uploads files
 // if save button on the form is clicked
// name of the uploaded file
$filename = $_FILES['file']['name'];

// destination of the file on the server
$destination = 'uploads/' . $filename;

// get the file extension
$extension = pathinfo($filename, PATHINFO_EXTENSION);

// the physical file on a temporary uploads directory on the server
$file = $_FILES['file']['tmp_name'];
$size = $_FILES['file']['size'];

if (!in_array($extension, ['zip', 'pdf', 'docx'])) {
    echo "You file extension must be .zip, .pdf or .docx";
} elseif ($_FILES['file']['size'] > 1000000) { // file shouldn't be larger than 1Megabyte
    echo "File too large!";
} else {
    // move the uploaded (temporary) file to the specified destination
    if (move_uploaded_file($file, $destination)) {
        /*echo $filename;
        $sql = "INSERT INTO `files`(`name`, `size`, `downloads`) VALUES ('$filename',$size,0)";
        if (mysqli_query($conn, $sql)) {
            echo md5($cin);*/
            //echo "File uploaded successfully";
          /*  
        }
    } else {
        echo 0;
        echo "Failed to upload file.";
    }
}
*/
if (isset($_GET['id'])) {
    
    $id = $_GET['id'];
    
    $conn = mysqli_connect('localhost', 'root', '', 'pointage1');
    // fetch file to download from database
    $sql = "SELECT * FROM professeurs WHERE id='".$id."'";
    $result = mysqli_query($conn, $sql);

    $file = mysqli_fetch_assoc($result);
    $filepath = 'uploads/' . $file['dossier_scientifique'];
echo $file['dossier_scientifique']; 
    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('uploads/' . $file['dossier_scientifique']));
        readfile('uploads/' . $file['dossier_scientifique']);
        /*
        // Now update downloads count
        $newCount = $file['downloads'] + 1;
        $updateQuery = "UPDATE files SET downloads=$newCount WHERE id=$id";
        mysqli_query($conn, $updateQuery);*/
        exit;
    }

}
