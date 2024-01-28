<?php
    function upload_file() 
    {
        if($_SERVER['REQUEST_METHOD'] !== 'POST') {
            exit("POST request method required");
        }
        checkFileUploaded();
        handleFileError();
        validateFileType();
        validateFileSize();
        moveUploadFile();
    }
    
    function checkFileUploaded() 
    {
        $filesUploaded = false;
        foreach ($_FILES as $file) {
            if (!empty($file['tmp_name'])) {
                $filesUploaded = true;
                break;
            }
        }
        if (!$filesUploaded) {
            exit('No file was uploaded.');
        }               
    }

    function handleFileError() 
    {
        if($_FILES['image']['error'] !== UPLOAD_ERR_OK) {
            switch($_FILES['image']['error']) {
                case UPLOAD_ERR_NO_FILE:
                    exit('No file was uploaded');
                    break; 
                case UPLOAD_ERR_EXTENSION:
                    exit('A PHP extension stopped the file upload');
                    break;
                case UPLOAD_ERR_PARTIAL:
                    exit('The uploaded file was only partially uploaded');
                    break;
                default:
                    exit('Unknown upload error');
                    break;
            }
        }
    }
    
    function validateFileSize() 
    {
        if($_FILES['image']['size'] > 1024000) {
            exit('File size is too large');
        }
    }
    
    function validateFileType() 
    {
        $mime_type = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif'];
                // in_array(search, array) 
        if(! in_array($_FILES['image']['type'], $mime_type)) {
            exit('Invalid File Upload');
        }
    }
    
    function moveUploadFile()
    {
        $target_dir =  "uploads/" ;
        $target_file = $target_dir . basename($_FILES['image']['name']);
        if(file_exists($target_file)) {
            exit('File already exists');
        }
        if(!move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
            exit('Error Uploading File');
        }else{
            echo 'Successfully Uploaded File';
        }
        
    }
    
    upload_file();

    echo json_encode($_FILES);