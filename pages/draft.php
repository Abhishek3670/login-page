<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>AdIt | Home</title>
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <div class="navbar">
        <div class="container">
            <a class="logo" href="home.html">Ad<span>It</span></a>
            <img id="mobile-cta" class="mobile-menu" src="assets/svg/menu.svg" alt="Open navigation" />
            <nav>
                <img id="mobile-exit" class="mobile-menu-exit" src="assets/svg/exit.svg" alt="Close navigation" />
                <ul class="primary-nav">
                    <li class="current"><a href="home.php">Home</a></li>
                    <li><a href="myPost.php">My Publish</a></li>
                    <li><a href="draft.php">Drafts</a></li>
                </ul>
                <!-- right navbar options-->
                <ul class="secondary-nav">
                    <li class="current"><a href="#"> <img src="../assets/svg/plus-circle-solid.svg" alt="My Account" width="30px" height="30px" /></a></li>
                    <!--user  profile button-->
                    <li class="account-cta"><a href="#">
                            <img src="../assets/svg/user-circle-solid.svg" alt="My Account" width="30px" height="30px" />
                        </a></li>
                </ul>
            </nav>
        </div>
    </div>

    <!-- DRAFT SECTION -->

    <!-- DRAFT SECTION ENDING-->
    <script>
        const mobileBtn = document.getElementById("mobile-cta");
        nav = document.querySelector("nav");
        mobileBtnExit = document.getElementById("mobile-exit");

        mobileBtn.addEventListener("click", () => {
            nav.classList.add("menu-btn");
        });

        mobileBtnExit.addEventListener("click", () => {
            nav.classList.remove("menu-btn");
        });
    </script>
</body>

</html>