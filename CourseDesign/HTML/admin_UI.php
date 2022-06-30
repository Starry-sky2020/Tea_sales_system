<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="../BootStrap5/css/bootstrap.min.css">
    <link rel="stylesheet" href="../CSS/admin_UI.css">
<!--    <script src="../CSS/admin_UI.css"></script>-->
</head>
<body>
<div class="container" style="z-index: 1">
    <div class="row">
        <div class="col-md-2" style="background-color: #ffdb02">
            <div>
                <ul class="nav flex-column nav-pills" id="myTab" role="tablist" aria-orientation="vertical" style="margin: 300px 0px">
                    <li class="nav-item" role="presentation" style="height: 100px;">
                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Home</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Profile</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="messages-tab" data-bs-toggle="tab" data-bs-target="#messages" type="button" role="tab" aria-controls="messages" aria-selected="false">Messages</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="settings-tab" data-bs-toggle="tab" data-bs-target="#settings" type="button" role="tab" aria-controls="settings" aria-selected="false">Settings</button>
                    </li>
                </ul>
            </div>


        </div>

<!--            </div>-->


                <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div style="height: 50px;"></div>


                </div>
                <div class="tab-pane" id="messages" role="tabpanel" aria-labelledby="messages-tab"style="width: 1000px">



    <div style="height: 100px"></div>
</div>

<script src="../BootStrap5/js/bootstrap.bundle.min.js"></script>
</body>
</html>