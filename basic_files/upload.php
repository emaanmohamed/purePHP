<?php

if (isset($_POST['submit'])) {
    echo "<pre>";
    print_r($_FILES['file_upload']);
    echo "<pre>";

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>

<form action="upload.php" enctype="multipart/form-data" method="post">
    <input type="file" name="file_upload">
    <input type="submit" name="submit">
</form>

</body>
</html>

<?php

$upload_errors = array(
        UPLOAD_ERR_OK => "There is no error",
        UPLOAD_ERR_INI_SIZE =>"exceed the max filesize" ,
        UPLOAD_ERR_FORM_SIZE =>"exceed the mas_file_size",
        UPLOAD_ERR_PARTIAL => "the uploaded file was only partial uploaded",
        UPLOAD_ERR_NO_FILE => "no file was uploaded",
        UPLOAD_ERR_NO_TMP_DIR => "missing a temporary folder",
        UPLOAD_ERR_CANT_WRITE => "failed to write a file to disk",
        UPLOAD_ERR_EXTENSION => "a php extension stopped the fule upload"




);
