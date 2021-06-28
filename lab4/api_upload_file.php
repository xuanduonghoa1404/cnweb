<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $response = array(
        'status' => 201,
        'message' => 'Upload Lỗi!'
    );
    $files = array_filter($_FILES['uploads']['name']); //Use something similar before processing files.
    // Count the number of uploaded files in array
    $total_count = count($_FILES['uploads']['name']);
    $success_count = 0;
    // Loop through every file
    for ($i = 0; $i < $total_count; $i++) {
        //The temp file path is obtained
        $tmpFilePath = $_FILES['uploads']['tmp_name'][$i];
        //A file path needs to be present
        if ($tmpFilePath != "") {
            //Setup our new file path
            $newFilePath = "./uploads/" . $_FILES['uploads']['name'][$i];
            //Check file allowed
            $allowed = array('doc', 'docx', 'pdf', 'mp3', 'wav', 'png', 'jpg', 'xlsx', 'txt', 'json');
            $filename = $_FILES['uploads']['name'][$i];
            $ext = pathinfo($filename, PATHINFO_EXTENSION);
            if (!in_array($ext, $allowed)) {
                $response["status"] = 403;
                $response["error"] = "File có định dạng không được chấp nhận";
                continue;
            }
            //Check file exists
            if (file_exists($newFilePath)) {
                $response["status"] = 402;
                $response["error"] = "File đã tồn tại trên server";
                continue;
            }
            //File is uploaded to temp dir
            if (move_uploaded_file($tmpFilePath, $newFilePath)) {
                //Other code goes here
                $success_count++;
            }
        }
    }
    if ($success_count > 0) {
        $response["status"] = 201;
        $response["message"] = 201;
    } else {
        if($response["status"] != 402 && $response["status"] != 403) {
            $response["status"] = 400;
            $response["error"] = "Upload không thành công!";
        }
    }
    echo json_encode($response);
}
