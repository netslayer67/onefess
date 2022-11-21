<?php require "header.php" ?>

<link rel="stylesheet" href="./assets/css/index.css">
<link rel="icon" type="image/x-icon" href="./assets/picture/logo2.png">
</head>

<body class="background">

    <?php

    include_once "./php/config.php";
    $unique_id = $_SESSION['unique_id'];
    if (!isset($unique_id)) {
        header("location: index.php");
    }

    ?>

    <?php
    $searchData = $_GET['search'];
    if ($searchData == "") {
        $cardQuery = mysqli_query($conn, "SELECT * FROM curhat ORDER BY id DESC");
    } else {
        $cardQuery = mysqli_query($conn, "SELECT * FROM curhat WHERE body LIKE '%$searchData%' ORDER BY id DESC");
    }
    ?>

    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark position-absolute w-100 top-0" style="border-bottom-left-radius: 25px; border-bottom-right-radius: 25px;">
        <div class="container-fluid">
            <a class="navbar-brand" href="home.php">
                <img src="../assets/picture/logo2.png" alt="" width="73px" height="60px">
            </a>


            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                </ul>
                </li>
                </ul>

                <form action="" method="GET" class=" d-flex align-item-center" style="margin-right: 532px;">
                    <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search" />
                    <button class="btn btn-outline-primary" type="submit">
                        Search
                    </button>
                </form>



                <div>
                    <a href="./profile.php">

                        <i class="fa-solid fa-circle-user" style="font-size:60px ; color: aqua;"></i>
                    </a>
                </div>


            </div>
        </div>
    </nav>

    <!-- navbar -->


    <div style="margin: 0 20px;">
        <!-- <img src="../assets/picture/BG.png" alt="BG picture" width="1519px" height="1080px"/> -->
        <div class="d-flex flex-column justify-content-center align-items-center" style="margin-top: 150px;">
            <form action="" method="POST" class="mb-3" id="formCurhat">
                <div class="alert" id="curhatMsg" role="alert" style="border-radius: 20px; display: none;"></div>
                <label for="curhat" class="form-label" style="font-size: 25px; color:rgb(79, 241, 217); font-family: serif;">Yuk luapkan isi hati kamu...
                    💕</label>
                <textarea class="form-control" name="curhat" id="curhat" rows="10" cols="100" style="border-radius: 20px;"></textarea>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary btn-lg my-3" style="margin-left: 625px; border-radius: 20px;">Submit</button>
                </div>

            </form>

        </div>
    </div>

    <div class="neon d-flex flex justify-content-center align-items-center" style="margin-left: 27px;">
        Contact Me...
    </div>

    <div class="d-flex flex justify-content-center align-items-center mt-3" style="font-size:67px; margin-bottom: 80px;">

        <a href="https://www.instagram.com/trianditanazwa/" target="_blank" class="text-decoration-none">
            <img src="./assets/picture/IG.png" alt="" class="sosmedIcon ig">
        </a>

        <a href="https://wa.me/+6289603213740" target="_blank" class="text-decoration-none">
            <img src="./assets/picture/WA.png" alt="" class="sosmedIcon wa">
        </a>

        <a href="https://github.com/TrianditaNazwa" target="_blank" class="text-decoration-none">
            <img src="./assets/picture/GH.png" alt="" class="sosmedIcon gh">
        </a>
    </div>

    <div>
        <hr style="height: 10px; color: black; margin:0 auto ;">
    </div>

    <div class="row justify-content-center px-3">

        <?php while ($card = mysqli_fetch_array($cardQuery)) : ?>
            <?php
            $userCard = $card['user_id'];
            $userQuery = mysqli_query($conn, "SELECT * FROM user WHERE unique_id = $userCard");
            if (mysqli_num_rows($userQuery)) {
                $user = mysqli_fetch_assoc($userQuery);
            }
            ?>
            <div class="col-md-4">
                <a href="./detailCard.php?id=<?= $card['id']; ?>" class="text-decoration-none text-dark">
                    <div class="card my-5">
                        <div class="card-body">
                            <h5 class="card-title">Dari : <?= $user['name']; ?>
                            </h5>
                            <p class="card-text">
                                <?= $card['body']; ?>
                            </p>
                        </div>
                    </div>
                </a>

            </div>
        <?php endwhile; ?>


    </div>




    <script src="./js/addCard.js"></script>


    <?php require "footer.php" ?>