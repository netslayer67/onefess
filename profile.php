<?php require "header.php" ?>

<link rel="stylesheet" href="../assets/css/profile.css">

<style>
    body {
        background-color: black;
        font-family: cursive;
    }

    .glow {
        font-size: 40px;
        color: #fff;
        text-align: center;
        animation: glow 1s ease-in-out infinite alternate;
    }

    @keyframes glow {
        from {
            text-shadow: 0 0 10px #fff, 0 0 20px #fff, 0 0 30px #004de6, 0 0 40px #004de6, 0 0 50px #004de6, 0 0 60px #004de6, 0 0 70px #004de6;
        }

        to {
            text-shadow: 0 0 20px #fff, 0 0 30px #56d1fa, 0 0 40px #56d1fa, 0 0 50px #56d1fa, 0 0 60px #56d1fa, 0 0 70px #56d1fa, 0 0 80px #56d1fa;
        }
    }
</style>
<link rel="icon" type="image/x-icon" href="../assets/picture/logo2.png">
</head>

<body style="background-color: rgb(4, 213, 213);">

    <?php

    include_once "./php/config.php";
    $unique_id = $_SESSION['unique_id'];
    if (!isset($unique_id)) {
        header("location: index.php");
    }

    $userQuery = mysqli_query($conn, "SELECT * FROM user WHERE unique_id = '$unique_id'");
    if (mysqli_num_rows($userQuery) > 0) {
        $user = mysqli_fetch_assoc($userQuery);
    }

    ?>

    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark position-absolute w-100 top-0"
        style="border-bottom-left-radius: 25px; border-bottom-right-radius: 25px;">
        <div class="container-fluid">
            <a class="navbar-brand" href="./home.php">
                <img src="../assets/picture/logo2.png" alt="" width="73px" height="60px">
            </a>


            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                </ul>
                </li>
                </ul>

                <div style="margin-right: 600px;">
                    <h1 class="glow"> Profile Info</h1>
                </div>


            </div>
        </div>

    </nav>
    <!-- navbar -->
    <div style="margin-left:590px ; margin-right:500px;">
        <div class="profile-pic">
            <label class="-label" for="file">
                <span class="glyphicon glyphicon-camera"></span>
                <span>Change Image</span>
            </label>
            <input id="file" type="file" onchange="loadFile(event)" />
            <img src="../assets/picture/icon2.png" id="output" width="200" />
        </div>

        <form class="mb-3">
            <div class="mb-3">
                <label for="email" class="form-label">Your Email</label>
                <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp"
                    value="<?= $user['email']; ?>">
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Your Name</label>
                <input type="text" class="form-control" name="name" id="name" value="<?= $user['name']; ?>">
            </div>
            <div class="d-grid gap-2">
                <button class="btn btn-primary" type="button">Change Profile</button>
            </div>
        </form>

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-danger w-100" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Log out
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to logout ?</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <form action="./php/logout.php" method="POST">
                            <input type="hidden" name="user_id" value="<?= $user['unique_id']; ?>">
                            <button type="submit" class="btn btn-danger">Yes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        var loadFile = function (event) {
            var image = document.getElementById("output");
            image.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>

    <?php require "footer.php" ?>