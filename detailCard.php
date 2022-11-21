<?php require "header.php" ?>

<link rel="stylesheet" href="../assets/css/detail.css">


<link rel="icon" type="image/x-icon" href="../assets/picture/logo2.png">
</head>

<body class="background">

    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark position-absolute w-100 top-0"
        style="border-bottom-left-radius: 25px; border-bottom-right-radius: 25px;">
        <div class="container-fluid" style="justify-content: center;">
            <a class="navbar-brand" href="./home.php">
                <img src="./assets/picture/logo2.png" alt="" width="73px" height="60px">
            </a>
        </div>
    </nav>
    <!-- navbar -->

    <?php
    include_once "./php/config.php";
    $unique_id = $_SESSION['unique_id'];
    if (!isset($unique_id)) {
        header("location: index.php");
    }

    $cardId = $_GET['id'];

    $cardQuery = mysqli_query($conn, "SELECT * FROM curhat WHERE id = $cardId");
    if (mysqli_num_rows($cardQuery)) {
        $card = mysqli_fetch_assoc($cardQuery);

        $userCard = $card['user_id'];
        $userQuery = mysqli_query($conn, "SELECT * FROM user WHERE unique_id = $userCard");
        if (mysqli_num_rows($userQuery)) {
            $user = mysqli_fetch_assoc($userQuery);
        }
    }

    ?>

    <div class="card" style="width: 50rem; height: 20rem; margin-left: 360px; margin-top: 260px; border-radius: 25px;">
        <div class="card-body boxCard">
            <h6 class="card-subtitle mb-2 text-muted">Dari : <?= $user['name']; ?>
            </h6>
            <p class="card-text">
                <?= $card['body']; ?>
            </p>
            <a href="./home.php" class="card-link text-secondary">Go back</a>
            <!-- Button trigger modal -->
            <?php
            if ($unique_id == $card['user_id']) {
                echo "<a type='button' class='card-link text-danger' style='margin-left:620px ;' data-bs-toggle='modal' data-bs-target='#exampleModal'>
                    Delete Card
                </a>";
            }
            ?>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to delete this card ?
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body d-none" id="modalBody">
                            <strong class="text-success">Deleting Success</strong>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <form action="" method="POST" id="deleteCard">
                                <input type="hidden" name="id" value="<?= $card['id']; ?>">
                                <button type="submit" class="btn btn-danger" id="submitDeleteCard">YES, SURE</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="./js/deleteCard.js"></script>
    <?php require "footer.php" ?>