<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_FILES['file'])) {
        $ftp_server = 'ftp_container'; // Replace with the hostname or IP of your FTP container
        $ftp_user = 'ftpuser'; // Replace with your FTP username
        $ftp_pass = 'ftp_password'; // Replace with your FTP password
        $remote_file = '/home/ftuser/' . $filename;

        $filename = $_FILES['file']['name'];
        $file = $_FILES['file']['tmp_name'];

        if (!empty($filename) && !empty($file)) {
            $conn_id = ftp_connect($ftp_server);
            if (ftp_login($conn_id, $ftp_user, $ftp_pass)) {
                // Create the remote directory if it doesn't exist
                if (!ftp_nlist($conn_id, $remote_directory)) {
                    ftp_mkdir($conn_id, $remote_directory);
                }

                // Define the remote file path
                $remote_file = $remote_directory . $filename;

                if (ftp_put($conn_id, $remote_file, $file, FTP_BINARY)) {
                    echo 'File uploaded successfully.';
                } else {
                    echo 'Error uploading file.';
                }
                ftp_close($conn_id);
            } else {
                echo 'FTP login failed.';
            }
        } else {
            echo 'No file selected for upload.';
        }
    } else {
        echo 'No file uploaded.';
    }
} else {
    echo 'Invalid request method.';
}
?>
