<!-- HEADER is header to be used in the WELCOME page where the Clicking on Profile redirects with GET Request-->

<!-- START OF HEADER-->
<link href=css/header.css rel=stylesheet type=text/css>

    <!--LOGOUT-->
    <div style="right: 1em;" class="header">
        <a href="logout.php">Logout</a>
    </div>

    <!--PROFILE-->
    <div style="right: 5em;" class="header">
        <a href="profile.php?user_name=<?php echo $user_data['user_name'] ?>">Profile</a>
    </div>

    <!--Delete Account-->
    <div style="right: 9em;" class="header">
        <a href="delete_user.php">Delete</a>
    </div>

     <!--Edit Profile-->
    <div style="right: 12.5em;" class="header">
        <a href="edit_profile.php">Edit Profile</a>
    </div>

     <!--Import/Export Data-->
     <div style="right: 18em;" class="header">
        <a href="Exports/import_export.php">Export</a>
    </div>


     <!--Feed-->
     <div style="right: 22em;" class="header">
        <a href="feed.php">Feed</a>
    </div>

    <!--Diary-->
    <div style="right: 25em;" class="header">
        <a href="diary.php">Diary</a>
    </div>


    <!--WELCOME TO WRYDRN-->
    <div style="left:2.3em;" class="header">
    <a href="welcome.php" class="wydrn-logo">WDYRN</a>
    </div>

<!-- END OF HEADER-->