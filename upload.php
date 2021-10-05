<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
if (file_exists($target_file)) {
    echo "El archivo ya existe, cambie el nombre";
    $uploadOk = 0;
}
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "El archivo de script es demasiado grande";
    $uploadOk = 0;
}
if($imageFileType != "txt" && $imageFileType != "ps1" ) {
    echo "solamente se pueden subir archivos de script en formato txt / ps1";
    $uploadOk = 0;
}
if ($uploadOk == 0) {
    echo "Lo siento, el script no se pudo subir";
} else {
    
$target_file = "uploads/temp.txt"; 

    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "El archivo ". basename( $_FILES["fileToUpload"]["name"]). " fue subido correctamente.";
        header("https://usbremote.azurewebsites.net/hostingstart.html");
        die();
    }else {
        echo "Error al subir el archivo de patrones";
    }
}
?>