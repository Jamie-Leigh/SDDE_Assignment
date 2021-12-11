<div class="container">
    <h1>Update profile photo</h1>
    <?php
        if(isset($_FILES['photo'])) {
            $allowed_mime = array('image/gif', 'image/jpeg', 'image/png');
            if(!in_array($_FILES['photo']['type'], $allowed_mime)) {
                echo '<div class="alert alert-danger" role="alert">Only GIF, JPEG and PNG files are allowed</div>';
            } else {
                //file is image
                $random = substr(str_shuffle(MD5(microtime())), 0, 10);
                $new_filename = $random . $_FILES['photo']['name'];
                if (move_uploaded_file($_FILES['photo']['tmp_name'], __DIR__.'/../user-images/'.$new_filename)) {
                    //file moved
                    $User = new User($Conn);
                    $User->updateUserProfile($new_filename);
                    echo '<div class="alert alert-success" role="alert">Profile photo updated</div>';
                } else {
                    echo '<div class="alert alert-danger" role="alert"> Only GIF, JPEG and PNG files are allowed</div>'; 
                }
            }
        }
    ?>

    <div class="row">
        <div class="col-lg-6 column">
            <form method="post" class="form" action="" enctype="multipart/form-data">
                <div class="form-group">
                    <p>Upload a photo by clicking the Choose File button below. Then click Update Profile Photo
                        </p>
                    <input type="file" name="photo" class="form-control-file">
                </div>
                <button class="btn btn-ybac" type="submit">Update Profile Photo</button>
            </form>
        </div>
    </div>
</div>