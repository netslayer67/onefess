<?php require "header.php" ?>

<link rel="stylesheet" href="./assets/css/landingPage.css">
<link rel="icon" type="image/x-icon" href="./assets/picture/logo2.png">
</head>

<body class="background">

    <?php

    include_once "./php/config.php";
    if (isset($_SESSION['unique_id'])) {
        header("location: home.php");
    }

    ?>

    <!-- Button trigger modal -->
    <div class="d-flex justify-content-center align-items-center d-grid gap-2" style="margin-top: 470px;">
        <button type="button" class="btn btn-dark w-50" data-bs-toggle="modal" data-bs-target="#exampleModal">
            GET STARTED
        </button>
    </div>

    <!-- Modal Register -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width:350px;">
            <div class="modal-content" style="border-radius:20px">

                <div class="modal-body bg-dark" style="box-shadow: 10px 10px 23px 0px rgba(64,164,199,0.75);
                -webkit-box-shadow: 10px 10px 23px 0px rgba(64,164,199,0.75);
                -moz-box-shadow: 10px 10px 23px 0px rgba(64,164,199,0.75);border-radius:17px">
                    <form action="" method="POST" style="padding: 30px;" id="formRegister">
                        <div class="mb-4">
                            <h4 class="text-center text-white"
                                style=" text-shadow: 1px 1px 2px blue, 0 0 25px blue, 0 0 5px darkblue;letter-spacing: 15px;">
                                Register
                            </h4>
                        </div>

                        <div class="alert alert-danger fade show mb-2" role="alert"
                            style="border-radius: 15px; display: none;" id="registerError">
                        </div>

                        <!-- fullname -->
                        <div class="mb-3">
                            <label for="name" class="form-label"
                                style="color: aqua;font-size:15px;text-shadow: 1px 1px 2px black, 0 0 25px blue, 0 0 5px darkblue;">FULLNAME</label>
                            <input type="text" class="form-control" name="name" id="name" aria-describedby="name"
                                style="border-radius: 20px ;">
                        </div>

                        <!-- email -->
                        <div class="mb-3">
                            <label for="email" class="form-label"
                                style="color: aqua;font-size:15px;text-shadow: 1px 1px 2px black, 0 0 25px blue, 0 0 5px darkblue;">EMAIL</label>
                            <input type="email" class="form-control" name="email" id="email"
                                aria-describedby="emailHelp" style="border-radius: 20px ;">
                        </div>


                        <div class="mb-3 position-relative passwordRegister">
                            <label for="passwordRegister" class="form-label"
                                style="color: aqua;font-size:15px;text-shadow: 1px 1px 2px black, 0 0 25px blue, 0 0 5px darkblue;">PASSWORD</label>
                            <input type="password" class="form-control" name="password" id="passwordRegister"
                                style="border-radius: 20px ;">
                            <div class="position-absolute d-flex pw-btn-container"
                                onclick="showPw('passwordRegister', '#pwIconRegister')">
                                <i class="fas fa-eye-slash" id="pwIconRegister"></i>
                            </div>
                        </div>

                        <div class="mb-3 mt-2 d-flex gap-2" style="width: 100%;">
                            <button type="button" class="btn btn-secondary flex-grow-1" data-bs-dismiss="modal"
                                style="border-radius:15px">Close</button>
                            <button type="submit" class="btn btn-primary" style="border-radius:15px"
                                id="submitRegister">Create account</button>
                            <button type="button" id="loadingRegister" class="btn btn-primary disabled d-none"
                                style="border-radius: 15px;">
                                <i class="fas fa-spinner spinner"></i>
                                Please Wait...
                            </button>
                        </div>

                        <div id="emailHelp" class="form-text text-white text-center">Already have an account ? <button
                                class="clickHereBtn" type="button" data-bs-toggle="modal" data-bs-target="#modalLogin"
                                data-bs-dismiss="modal">Click
                                Here
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <!-- Akhir Modal Register -->

    <!-- Awal Modal Login -->
    <div class="modal fade" id="modalLogin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width:350px;">
            <div class="modal-content" style="border-radius:20px">

                <div class="modal-body bg-dark" style="box-shadow: 10px 10px 23px 0px rgba(64,164,199,0.75);
                -webkit-box-shadow: 10px 10px 23px 0px rgba(64,164,199,0.75);
                -moz-box-shadow: 10px 10px 23px 0px rgba(64,164,199,0.75);border-radius:17px">
                    <form action="" method="POST" style="padding: 30px;" id="formLogin">
                        <div class="mb-4">
                            <h4 class="text-center text-white"
                                style=" text-shadow: 1px 1px 2px blue, 0 0 25px blue, 0 0 5px darkblue;letter-spacing: 15px;">
                                Login
                            </h4>
                        </div>

                        <div class="alert alert-danger fade show mb-2" role="alert"
                            style="border-radius: 15px; display: none;" id="loginError">
                        </div>


                        <!-- email -->
                        <div class="mb-3">
                            <label for="email" class="form-label"
                                style="color: aqua;font-size:15px;text-shadow: 1px 1px 2px black, 0 0 25px blue, 0 0 5px darkblue;">EMAIL</label>
                            <input type="email" class="form-control" name="loginEmail" id="email"
                                aria-describedby="emailHelp" style="border-radius: 20px ;">
                        </div>


                        <div class="mb-3 position-relative passwordLogin">
                            <label for="passwordLogin" class="form-label"
                                style="color: aqua;font-size:15px;text-shadow: 1px 1px 2px black, 0 0 25px blue, 0 0 5px darkblue;">PASSWORD</label>
                            <input type="password" class="form-control" name="loginPassword" id="passwordLogin"
                                style="border-radius: 20px ;">
                            <div class="position-absolute d-flex pw-btn-container"
                                onclick="showPw('passwordLogin', '#pwIconLogin')">
                                <i class="fas fa-eye-slash" id="pwIconLogin"></i>
                            </div>
                        </div>


                        <div class="mb-3 mt-2 d-flex gap-2" style="width: 100%;">
                            <button type="button" class="btn btn-secondary w-50" data-bs-dismiss="modal"
                                style="border-radius:15px">Close</button>
                            <button type="submit" class="btn btn-primary w-50" id="submitLogin"
                                style="border-radius:15px">Login</button>
                            <button type="button" id="loadingLogin" class="btn btn-primary disabled d-none"
                                style="border-radius: 15px;">
                                <i class="fas fa-spinner spinner"></i>
                                Please Wait...
                            </button>
                        </div>

                        <div id="emailHelp" class="form-text text-white text-center">Don't have an account ? <span
                                class="clickHereBtn"><button type="button" class="clickHereBtn" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal" data-bs-dismiss="modal">Click
                                    Here</button>
                            </span>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <script>
        function showPw(input, icon) {
            const pwInput = document.getElementById(input);
            const pwIcon = document.querySelector(icon);

            if (pwInput.type === "password") {
                pwInput.type = "text";
                pwIcon.className = "fas fa-eye";
            } else {
                pwInput.type = "password";
                pwIcon.className = "fas fa-eye-slash";
            }
        };
    </script>
    <script src="./js/auth.js"></script>
    <?php require "footer.php" ?>