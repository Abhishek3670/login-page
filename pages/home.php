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
      <a class="logo" href="home.php">Ad<span>It</span></a>
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

  <!-- POST SECTION -->
  <div class="post">
    <div class="container_post">
      <div class="grid">
        <div class="card">
          <div class="card_img">
            <img src="https://images.unsplash.com/photo-1624593895161-c2d67791ef7a?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1050&q=80" alt="">
          </div>
          <div class="card_body">
            <h2 class="card_title">Get yourself motivated</h2>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolorum porro, illum totam nostrum sit delectus nisi sint magni perspiciatis adipisci?</p>
            <p class="card_author">by <a href="#" class="author_link">sofiullah chowdhury</a></p>
            <a href="#" class="comment">Comment</a>
          </div>
        </div>
        <div class="card">
          <div class="card_img">
            <img src="https://images.unsplash.com/photo-1606787619248-f301830a5a57?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1050&q=80" alt="">
          </div>
          <div class="card_body">
            <h2 class="card_title">Learn the art of cooking</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid optio quidem, est labore earum reprehenderit quibusdam id iure delectus nemo.</p>
            <p class="card_author">by <a href="#" class="author_link">sofiullah chowdhury</a></p>
            <a href="#" class="comment">Comment</a>
          </div>
        </div>
        <div class="card">
          <div class="card_img">
            <img src="https://images.unsplash.com/photo-1587772247228-20c9f67a327b?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1050&q=80" alt="">
          </div>
          <div class="card_body">
            <h2 class="card_title">Get your freedom</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid optio quidem, est labore earum reprehenderit quibusdam id iure delectus nemo.</p>
            <p class="card_author">by <a href="#" class="author_link">sofiullah chowdhury</a></p>
            <a href="#" class="comment">Comment</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- POST SECTION -->
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