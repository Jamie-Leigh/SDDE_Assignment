<div class="container">
    <h1 class="mb-4 pb-2">My Account</h1>
    <p>Welcome to your account.</p>
    <?php
        if($_SESSION['user_data']['image']) {
            echo '<img class="mb-3" style="max-width: 100px;" src="./user-images/'.$_SESSION['user_data']['image'].'" />';
            echo '<p><a class="btn btn-ybac" href="index.php?p=editprofileimage">Edit profile image</a></p>';
        } else {
            echo '<p><a class="btn btn-ybac" href="index.php?p=editprofileimage">Add profile image</a></p>';
        }
        ?>
    </ul>
</div>