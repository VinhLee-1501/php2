<?php

namespace App\Core;
//define('STORAGE_PATH', __DIR__ . '/storage');

class HomeLab5
{

    public static function index(): string
    {
        return <<<FORM
        <form action="/" method="post" enctype="multipart/form-data">
            <input type="file" name="fileToUpload" class="form-control" id="inputGroupFile01">
            <button type="submit" name="submit">Upload</button>
        </form>
        FORM;

    }

    public static function upload()
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        if (isset($_POST['submit'])) {

            $old_name = $_FILES['fileToUpload']['name'];
            $file_extension = pathinfo($old_name, PATHINFO_EXTENSION);
            $new_name = date('Y-m-d-H-i-s') . '.' . $file_extension;
            echo $new_name;
            move_uploaded_file($_FILES['fileToUpload']['tmp_name'], 'Upload/' . $new_name);

        };
    }
}