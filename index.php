<?php
session_start();
@include('connect.php');

if(!$_SESSION['logged_in']){
  // header('Location:auth/login.php');
}

$query = "SELECT * FROM plans";
$res = mysqli_query($conn, $query);


?>
<!DOCTYPE html>
<html lang="en">


<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bitscap</title>

  <!-- 
    - favicon
  -->
  <link rel="shortcut icon" href="./favicon.svg" type="image/svg+xml">

  <!-- 
    - custom css link
  -->
  <link rel="stylesheet" href="./assets/css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- 
    - google font link
  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&display=swap" rel="stylesheet">
  <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">-->
        <link href='https://fonts.googleapis.com/css?family=Tangerine' rel='stylesheet'>
    <style>
        .heading-title
        {
        	margin-bottom: 50px;
        }
        .pricingTable {
            border: 1px solid #dbdbdb;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.14);
            margin: 0 -15px;
            text-align: center;
            transition: all 0.4s ease-in-out 0s;
        }
        
        .pricingTable:hover{
            border: 2px solid #e46367;
            margin-top: -30px;
        }
        
        .pricingTable .pricingTable-header{
            padding: 30px 10px;
        }
        
        .pricingTable .heading{
            display: block;
            color: #000;
            font-weight: 900;
            text-transform: uppercase;
            font-size:21px;
        }
        
        .pricingTable .pricing-plans {
            padding-bottom: 25px;
            border-bottom: 1px solid #d0d0d0;
            color: #000;
            font-weight: 900;
        }
        
        .pricingTable .price-value{
            color: #474747;
            display: block;
            font-size: 25px;
            font-weight: 800;
            line-height: 35px;
            padding: 0 10px;
        }
        
        .pricingTable .price-value span{
            font-size: 50px;
        }
        
        .pricingTable .subtitle{
            color: #82919f;
            display: block;
            font-size: 15px;
            margin-top: 15px;
            font-weight: 100;
        }
        
        .pricingTable .pricingContent ul{
            padding: 0;
            list-style: none;
            margin-bottom: 0;
        }
        
        .pricingTable .pricingContent ul li{
            padding: 20px 0;
        }
        
        .pricingTable .pricingContent ul li:nth-child(odd) {
            background-color: #fff;
        }
        
        .pricingTable .pricingContent ul li:last-child{
            border-bottom: 1px solid #dbdbdb;
        }
        
        .pricingTable .pricingTable-sign-up{
            padding: 25px 0;
        }
        
        .pricingTable .btn-block{
            width: 50%;
            margin: 0 auto;
            background: #e46367;
            border:1px solid transparent;
            padding: 10px 5px;
            color:#fff;
            text-transform: capitalize;
            border-radius: 5px;
            transition:0.3s ease;
        }
        
        .pricingTable .btn-block:after{
            content: "\f090";
            font-family: 'FontAwesome';
            padding-left: 10px;
            font-size: 15px;
        }
        
        .pricingTable:hover .btn-block{
            background:#fff;
            color: #e46367;
            border:1px solid #e46367;
        }
        
        .card-container {
            display: flex;
            justify-content: space-between;
        }
        
        .card-container .card {
            width: 30%;
            background-color: #fff;
            color: black;
        }
        
        @media screen and (max-width:990px){
            .pricingTable{
                margin-bottom: 30px;
            }
        }
        
        @media screen and (max-width:767px){
            .pricingTable{
               margin: 0 0 30px 0;
            }
        }
        .avatar-container {
          position: relative;
          display: inline-block;
        }
        
        .avatar {
          width: 40px;
          height: 40px;
          border-radius: 50%;
          cursor: pointer;
        }
        
        .dropdown {
          position: absolute;
          top: 60px;
          right: 0;
          background-color: #fff;
          box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
          display: none;
        }
        
        .dropdown ul {
          list-style: none;
          padding: 0;
          margin: 0;
        }
        
        .dropdown li {
          padding: 10px;
        }
        
        .dropdown li:hover {
          background-color: #f1f1f1;
        }
        .plan-container {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        margin: 5rem 10rem;
        }
        .plan-container .badge {
            text-transform: uppercase;
            color: #fff;
            letter-spacing: 1px;
            font-size: 11px;
        }
        .plan-container .heading {
            font-size: 26px;
            margin: 20px 0;
        }
        .plan-container .card_group {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-wrap: wrap;
        }
        .plan-container .pricing-card {
            margin: 20px 30px;
            height: 400px;
            width: 275px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: space-around;
            transition: 0.5s ease-in-out;
            padding: 16px 14px;
            border-radius: 10px;
            border: 2px solid blue;
        }
        .plan-container .pricing-card i {
            color: #fff;
            height: 60px;
            width: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            border-radius: 50%;
            box-shadow: 0 0 34px -12px gray;
        }
        .plan-container .pricing-card span {
            color: #fff;
            margin: -10px 0;
            font-weight: bold;
            font-size: 14px;
        }
        .plan-container .price {
            font-size: 30px;
            font-family: "Baloo 2";
        }
        .package_list {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 0 20px;
        }
        .package_list li {
            list-style: none;
            margin: 6px 0;
            color: gray;
            font-size: 14px;
        }
        .get_started_btn {
            border: 2px solid blue;
            color: white;
            background: transparent;
            padding: 8px 25px;
            border-radius: 20px;
            text-decoration: none;
            font-weight: bold;
            transition: 0.3s ease-in-out;
        }
        .get_started_btn:hover {
            background: transparent;
            color: blue;
        }

    </style>
</head>

<body>

  <!-- 
    - #HEADER
  -->

  <header class="header" data-header>
    <div class="container">

      <a href="#" class="logo">
        <img src="./assets/images/logo.svg" width="32" height="32" alt="Cryptex logo">
        Bitscap
      </a>

      <nav class="navbar" data-navbar>
        <ul class="navbar-list">

          <li class="navbar-item">
            <a href="#" class="navbar-link active" data-nav-link>Homepage</a>
          </li>

          <li class="navbar-item">
            <a href="#about" class="navbar-link" data-nav-link>About Us</a>
          </li>

          <li class="navbar-item">
            <a href="#plans" class="navbar-link" data-nav-link>Plans</a>
          </li>

          <!--<li class="navbar-item">-->
          <!--  <a href="#" class="navbar-link" data-nav-link>FAQ</a>-->
          <!--</li>-->

          <li class="navbar-item">
            <a href="#coins" class="navbar-link" data-nav-link>Coins</a>
          </li>

          <!--<li class="navbar-item">-->
          <!--  <a href="#" class="navbar-link" data-nav-link>Contact us</a>-->
          <!--</li>-->

        </ul>
      </nav>

      <button class="nav-toggle-btn" aria-label="Toggle menu" data-nav-toggler>
        <span class="line line-1"></span>
        <span class="line line-2"></span>
        <span class="line line-3"></span>
      </button>

      <div id="userIcon" class="user-icon" onclick="toggleUserDropdown()" style="display: none;">
        <i></i>
      </div>
      <!-- <div id="userDropdown" class="dropdown">
          <a href="#" class="dropdown-item" onclick="redirectToProfile()">Profile</a>
          <a href="#" class="dropdown-item" onclick="redirectToDashboard()">Dashboard</a>
          <a href="#" class="dropdown-item" onclick="logout()">Logout</a>
      </div> -->

      <div id="loginButtons" style="display: flex; gap: 8px;">
      
      <?php
        // Display appropriate content based on login status
        // echo $userLoggedIn ? $avatarDropdown : $signButtons;
        if(!isset($_SESSION['logged_in'])){
            
            echo '<div style="display: flex; gap: 10px">
            <a href="auth/login.php" class="btn text-white">Sign in</a>
            <a href="auth/register.php" class="btn btn-g-blue-veronica text-white">Sign up</a>
            </div>';
        }else{
            // echo '<h3 style="color:white;"><a href="user/dashboard.php"> '.$_SESSION['username'].'</a></h3>';
            // echo '<a href="auth/logout.php" class="btn btn-outline" id="loginButton">Logout</a>';
            echo "
            <div class='avatar-container'>
              <img src='assets/images/avatar.jpg' alt='User Avatar' class='avatar' id='avatar'>
              <div class='dropdown' id='dropdown'>
                <ul>
                  <li><a href='user/dashboard.php'>Profile</a></li>
                  <li><a href='user/dashboard.php'>Dashboard</a></li>
                  <li><a href='logout.php'>Logout</a></li>
                </ul>
              </div>
            </div>
            ";
            
    
        }
    ?>
          
          <!-- <a href="auth/register.php" class="btn btn-outline" id="signUpButton">Sign Up</a> -->
      </div>

      <!-- <div style="display: flex; gap: 8px">
        <a href="#" class="btn btn-outline">Login</a>
        <a href="auth/register.php" class="btn btn-outline">Sign Up</a>
      </div> -->

    </div>
  </header>





  <main>
    <article>

      <!-- 
        - #HERO
      -->

      <section class="section hero" aria-label="hero" data-section>
        <div class="container">

          <div class="hero-content">

            <h1 class="h1 hero-title">Join the exciting world of crypto investments!</h1>

            <p class="hero-text">
              At Bitscap, we empower you to navigate this dynamic market with confidence.
            </p>

            <a href="auth/register.php" class="btn btn-primary">Get started now</a>

          </div>

          <figure class="hero-banner">
            <img src="./assets/images/hero-banner.png" width="570" height="448" alt="hero banner" class="w-100">
          </figure>

        </div>
      </section>





      <!-- 
        - #TREND
      -->

      <section class="section trend" aria-label="crypto trend" id="coins" data-section>
        <div class="container">

          <div class="trend-tab">

            <ul class="tab-nav">

              <li>
                <button class="tab-btn active">Bitcoin</button>
              </li>

              <li>
                <button class="tab-btn">USDT</button>
              </li>

              <!--<li>-->
              <!--  <button class="tab-btn">BSC</button>-->
              <!--</li>-->

              <!--<li>-->
              <!--  <button class="tab-btn">NFT</button>-->
              <!--</li>-->

              <!--<li>-->
              <!--  <button class="tab-btn">Metaverse</button>-->
              <!--</li>-->

              <!--<li>-->
              <!--  <button class="tab-btn">Polkadot</button>-->
              <!--</li>-->

              <!--<li>-->
              <!--  <button class="tab-btn">Solana</button>-->
              <!--</li>-->

              <!--<li>-->
              <!--  <button class="tab-btn">Opensea</button>-->
              <!--</li>-->

              <!--<li>-->
              <!--  <button class="tab-btn">Makersplace</button>-->
              <!--</li>-->

            </ul>

            <ul class="tab-content">

              <li>
                <div class="trend-card">

                  <div class="card-title-wrapper">
                    <img src="./assets/images/coin-1.svg" width="24" height="24" alt="bitcoin logo">

                    <a href="#" class="card-title">
                      Bitcoin <span class="span">BTC/USD</span>
                    </a>
                  </div>

                  <data class="card-value" value="46168.95">USD 46,168.95</data>

                  <div class="card-analytics">
                    <data class="current-price" value="36641.20">36,641.20</data>

                    <div class="badge red">-0.79%</div>
                  </div>

                </div>
              </li>

              <!--<li>-->
              <!--  <div class="trend-card active">-->

              <!--    <div class="card-title-wrapper">-->
              <!--      <img src="./assets/images/coin-2.svg" width="24" height="24" alt="ethereum logo">-->

              <!--      <a href="#" class="card-title">-->
              <!--        Ethereum <span class="span">ETH/USD</span>-->
              <!--      </a>-->
              <!--    </div>-->

              <!--    <data class="card-value" value="3480.04">USD 3,480.04</data>-->

              <!--    <div class="card-analytics">-->
              <!--      <data class="current-price" value="36641.20">36,641.20</data>-->

              <!--      <div class="badge green">+10.55%</div>-->
              <!--    </div>-->

              <!--  </div>-->
              <!--</li>-->

              <li>
                <div class="trend-card">

                  <div class="card-title-wrapper">
                    <img src="./assets/images/coin-3.svg" width="24" height="24" alt="tether logo">

                    <a href="#" class="card-title">
                      Tether <span class="span">USDT/USD</span>
                    </a>
                  </div>

                  <data class="card-value" value="1.00">USD 1.00</data>

                  <div class="card-analytics">
                    <data class="current-price" value="36641.20">36,641.20</data>

                    <div class="badge red">-0.01%</div>
                  </div>

                </div>
              </li>

              <!--<li>-->
              <!--  <div class="trend-card">-->

              <!--    <div class="card-title-wrapper">-->
              <!--      <img src="./assets/images/coin-4.svg" width="24" height="24" alt="bnb logo">-->

              <!--      <a href="#" class="card-title">-->
              <!--        BNB <span class="span">BNB/USD</span>-->
              <!--      </a>-->
              <!--    </div>-->

              <!--    <data class="card-value" value="443.56">USD 443.56</data>-->

              <!--    <div class="card-analytics">-->
              <!--      <data class="current-price" value="36641.20">36,641.20</data>-->

              <!--      <div class="badge red">-1.24%</div>-->
              <!--    </div>-->

              <!--  </div>-->
              <!--</li>-->

            </ul>

          </div>

        </div>
      </section>





      <!-- 
        - #MARKET
      -->

      <section class="section market" aria-label="market update" style="display: none;" data-section>
        <div class="container">

          <div class="title-wrapper">
            <h2 class="h2 section-title">Market Update</h2>

            <a href="#" class="btn-link">See All Coins</a>
          </div>

          <div class="market-tab">

            <!--<ul class="tab-nav">-->

            <!--  <li>-->
            <!--    <button class="tab-btn active">View All</button>-->
            <!--  </li>-->

            <!--  <li>-->
            <!--    <button class="tab-btn">Metaverse</button>-->
            <!--  </li>-->

            <!--  <li>-->
            <!--    <button class="tab-btn">Entertainment</button>-->
            <!--  </li>-->

            <!--  <li>-->
            <!--    <button class="tab-btn">Energy</button>-->
            <!--  </li>-->

            <!--  <li>-->
            <!--    <button class="tab-btn">NFT</button>-->
            <!--  </li>-->

            <!--  <li>-->
            <!--    <button class="tab-btn">Gaming</button>-->
            <!--  </li>-->

            <!--  <li>-->
            <!--    <button class="tab-btn">Music</button>-->
            <!--  </li>-->

            <!--</ul>-->

            <table class="market-table">

              <!--<thead class="table-head">-->

              <!--  <tr class="table-row table-title">-->

              <!--    <th class="table-heading"></th>-->

              <!--    <th class="table-heading" scope="col">#</th>-->

              <!--    <th class="table-heading" scope="col">Name</th>-->

              <!--    <th class="table-heading" scope="col">Last Price</th>-->

              <!--    <th class="table-heading" scope="col">24h %</th>-->

              <!--    <th class="table-heading" scope="col">Market Cap</th>-->

              <!--    <th class="table-heading" scope="col">Last 7 Days</th>-->

              <!--    <th class="table-heading"></th>-->

              <!--  </tr>-->

              <!--</thead>-->

              <tbody class="table-body">

                <tr class="table-row">

                  <td class="table-data">
                    <button class="add-to-fav" aria-label="Add to favourite" data-add-to-fav>
                      <ion-icon name="star-outline" aria-hidden="true" class="icon-outline"></ion-icon>
                      <ion-icon name="star" aria-hidden="true" class="icon-fill"></ion-icon>
                    </button>
                  </td>

                  <th class="table-data rank" scope="row">1</th>

                  <td class="table-data">
                    <div class="wrapper">
                      <img src="./assets/images/coin-1.svg" width="20" height="20" alt="Bitcoin logo" class="img">

                      <h3>
                        <a href="#" class="coin-name">Bitcoin <span class="span">BTC</span></a>
                      </h3>
                    </div>
                  </td>

                  <td class="table-data last-price">$56,623.54</td>

                  <td class="table-data last-update green">+1.45%</td>

                  <td class="table-data market-cap">$880,423,640,582</td>

                  <td class="table-data">
                    <img src="./assets/images/chart-1.svg" width="100" height="40" alt="profit chart" class="chart">
                  </td>

                  <td class="table-data">
                    <button class="btn btn-outline">Trade</button>
                  </td>

                </tr>

                <!--<tr class="table-row">-->

                <!--  <td class="table-data">-->
                <!--    <button class="add-to-fav" aria-label="Add to favourite" data-add-to-fav>-->
                <!--      <ion-icon name="star-outline" aria-hidden="true" class="icon-outline"></ion-icon>-->
                <!--      <ion-icon name="star" aria-hidden="true" class="icon-fill"></ion-icon>-->
                <!--    </button>-->
                <!--  </td>-->

                <!--  <th class="table-data rank" scope="row">2</th>-->

                <!--  <td class="table-data">-->
                <!--    <div class="wrapper">-->
                <!--      <img src="./assets/images/coin-2.svg" width="20" height="20" alt="Ethereum logo" class="img">-->

                <!--      <h3>-->
                <!--        <a href="#" class="coin-name">Ethereum <span class="span">ETH</span></a>-->
                <!--      </h3>-->
                <!--    </div>-->
                <!--  </td>-->

                <!--  <td class="table-data last-price">$56,623.54</td>-->

                <!--  <td class="table-data last-update red">-5.12%</td>-->

                <!--  <td class="table-data market-cap">$880,423,640,582</td>-->

                <!--  <td class="table-data">-->
                <!--    <img src="./assets/images/chart-2.svg" width="100" height="40" alt="loss chart" class="chart">-->
                <!--  </td>-->

                <!--  <td class="table-data">-->
                <!--    <button class="btn btn-outline">Trade</button>-->
                <!--  </td>-->

                <!--</tr>-->

                <!--<tr class="table-row">-->

                <!--  <td class="table-data">-->
                <!--    <button class="add-to-fav" aria-label="Add to favourite" data-add-to-fav>-->
                <!--      <ion-icon name="star-outline" aria-hidden="true" class="icon-outline"></ion-icon>-->
                <!--      <ion-icon name="star" aria-hidden="true" class="icon-fill"></ion-icon>-->
                <!--    </button>-->
                <!--  </td>-->

                <!--  <th class="table-data rank" scope="row">3</th>-->

                <!--  <td class="table-data">-->
                <!--    <div class="wrapper">-->
                <!--      <img src="./assets/images/coin-3.svg" width="20" height="20" alt="Tether logo" class="img">-->

                <!--      <h3>-->
                <!--        <a href="#" class="coin-name">Tether <span class="span">USDT/USD</span></a>-->
                <!--      </h3>-->
                <!--    </div>-->
                <!--  </td>-->

                <!--  <td class="table-data last-price">$56,623.54</td>-->

                <!--  <td class="table-data last-update green">+1.45%</td>-->

                <!--  <td class="table-data market-cap">$880,423,640,582</td>-->

                <!--  <td class="table-data">-->
                <!--    <img src="./assets/images/chart-1.svg" width="100" height="40" alt="profit chart" class="chart">-->
                <!--  </td>-->

                <!--  <td class="table-data">-->
                <!--    <button class="btn btn-outline">Trade</button>-->
                <!--  </td>-->

                <!--</tr>-->

                <!--<tr class="table-row">-->

                <!--  <td class="table-data">-->
                <!--    <button class="add-to-fav" aria-label="Add to favourite" data-add-to-fav>-->
                <!--      <ion-icon name="star-outline" aria-hidden="true" class="icon-outline"></ion-icon>-->
                <!--      <ion-icon name="star" aria-hidden="true" class="icon-fill"></ion-icon>-->
                <!--    </button>-->
                <!--  </td>-->

                <!--  <th class="table-data rank" scope="row">4</th>-->

                <!--  <td class="table-data">-->
                <!--    <div class="wrapper">-->
                <!--      <img src="./assets/images/coin-4.svg" width="20" height="20" alt="BNB logo" class="img">-->

                <!--      <h3>-->
                <!--        <a href="#" class="coin-name">BNB <span class="span">BNB/USD</span></a>-->
                <!--      </h3>-->
                <!--    </div>-->
                <!--  </td>-->

                <!--  <td class="table-data last-price">$56,623.54</td>-->

                <!--  <td class="table-data last-update red">-3.75%%</td>-->

                <!--  <td class="table-data market-cap">$880,423,640,582</td>-->

                <!--  <td class="table-data">-->
                <!--    <img src="./assets/images/chart-2.svg" width="100" height="40" alt="loss chart" class="chart">-->
                <!--  </td>-->

                <!--  <td class="table-data">-->
                <!--    <button class="btn btn-outline">Trade</button>-->
                <!--  </td>-->

                <!--</tr>-->

                <!--<tr class="table-row">-->

                <!--  <td class="table-data">-->
                <!--    <button class="add-to-fav" aria-label="Add to favourite" data-add-to-fav>-->
                <!--      <ion-icon name="star-outline" aria-hidden="true" class="icon-outline"></ion-icon>-->
                <!--      <ion-icon name="star" aria-hidden="true" class="icon-fill"></ion-icon>-->
                <!--    </button>-->
                <!--  </td>-->

                <!--  <th class="table-data rank" scope="row">5</th>-->

                <!--  <td class="table-data">-->
                <!--    <div class="wrapper">-->
                <!--      <img src="./assets/images/coin-5.svg" width="20" height="20" alt="Solana logo" class="img">-->

                <!--      <h3>-->
                <!--        <a href="#" class="coin-name">Solana <span class="span">SOL</span></a>-->
                <!--      </h3>-->
                <!--    </div>-->
                <!--  </td>-->

                <!--  <td class="table-data last-price">$56,623.54</td>-->

                <!--  <td class="table-data last-update green">+1.45%</td>-->

                <!--  <td class="table-data market-cap">$880,423,640,582</td>-->

                <!--  <td class="table-data">-->
                <!--    <img src="./assets/images/chart-1.svg" width="100" height="40" alt="profit chart" class="chart">-->
                <!--  </td>-->

                <!--  <td class="table-data">-->
                <!--    <button class="btn btn-outline">Trade</button>-->
                <!--  </td>-->

                <!--</tr>-->

                <!--<tr class="table-row">-->

                <!--  <td class="table-data">-->
                <!--    <button class="add-to-fav" aria-label="Add to favourite" data-add-to-fav>-->
                <!--      <ion-icon name="star-outline" aria-hidden="true" class="icon-outline"></ion-icon>-->
                <!--      <ion-icon name="star" aria-hidden="true" class="icon-fill"></ion-icon>-->
                <!--    </button>-->
                <!--  </td>-->

                <!--  <th class="table-data rank" scope="row">6</th>-->

                <!--  <td class="table-data">-->
                <!--    <div class="wrapper">-->
                <!--      <img src="./assets/images/coin-6.svg" width="20" height="20" alt="XRP logo" class="img">-->

                <!--      <h3>-->
                <!--        <a href="#" class="coin-name">XRP <span class="span">XRP</span></a>-->
                <!--      </h3>-->
                <!--    </div>-->
                <!--  </td>-->

                <!--  <td class="table-data last-price">$56,623.54</td>-->

                <!--  <td class="table-data last-update red">-2.22%</td>-->

                <!--  <td class="table-data market-cap">$880,423,640,582</td>-->

                <!--  <td class="table-data">-->
                <!--    <img src="./assets/images/chart-2.svg" width="100" height="40" alt="loss chart" class="chart">-->
                <!--  </td>-->

                <!--  <td class="table-data">-->
                <!--    <button class="btn btn-outline">Trade</button>-->
                <!--  </td>-->

                <!--</tr>-->

                <!--<tr class="table-row">-->

                <!--  <td class="table-data">-->
                <!--    <button class="add-to-fav" aria-label="Add to favourite" data-add-to-fav>-->
                <!--      <ion-icon name="star-outline" aria-hidden="true" class="icon-outline"></ion-icon>-->
                <!--      <ion-icon name="star" aria-hidden="true" class="icon-fill"></ion-icon>-->
                <!--    </button>-->
                <!--  </td>-->

                <!--  <th class="table-data rank" scope="row">7</th>-->

                <!--  <td class="table-data">-->
                <!--    <div class="wrapper">-->
                <!--      <img src="./assets/images/coin-7.svg" width="20" height="20" alt="Cardano logo" class="img">-->

                <!--      <h3>-->
                <!--        <a href="#" class="coin-name">Cardano <span class="span">ADA</span></a>-->
                <!--      </h3>-->
                <!--    </div>-->
                <!--  </td>-->

                <!--  <td class="table-data last-price">$56,623.54</td>-->

                <!--  <td class="table-data last-update green">+0.8%</td>-->

                <!--  <td class="table-data market-cap">$880,423,640,582</td>-->

                <!--  <td class="table-data">-->
                <!--    <img src="./assets/images/chart-1.svg" width="100" height="40" alt="profit chart" class="chart">-->
                <!--  </td>-->

                <!--  <td class="table-data">-->
                <!--    <button class="btn btn-outline">Trade</button>-->
                <!--  </td>-->

                <!--</tr>-->

                <tr class="table-row">

                  <td class="table-data">
                    <button class="add-to-fav" aria-label="Add to favourite" data-add-to-fav>
                      <ion-icon name="star-outline" aria-hidden="true" class="icon-outline"></ion-icon>
                      <ion-icon name="star" aria-hidden="true" class="icon-fill"></ion-icon>
                    </button>
                  </td>

                  <th class="table-data rank" scope="row">8</th>

                  <td class="table-data">
                    <div class="wrapper">
                      <img src="./assets/images/coin-8.svg" width="20" height="20" alt="Avalanche logo" class="img">

                      <h3>
                        <a href="#" class="coin-name">Avalanche <span class="span">AVAX</span></a>
                      </h3>
                    </div>
                  </td>

                  <td class="table-data last-price">$56,623.54</td>

                  <td class="table-data last-update green">+1.41%</td>

                  <td class="table-data market-cap">$880,423,640,582</td>

                  <td class="table-data">
                    <img src="./assets/images/chart-1.svg" width="100" height="40" alt="profit chart" class="chart">
                  </td>

                  <td class="table-data">
                    <button class="btn btn-outline">Trade</button>
                  </td>

                </tr>

              </tbody>

            </table>

          </div>

        </div>
      </section>





      <!-- 
        - #INSTRUCTION
      -->

      <section class="section instruction" aria-label="instruction" data-section>
        <div class="container">

          <h2 class="h2 section-title">How It Work</h2>

          <p class="section-text">
            Our platform provides a user-friendly interface for exploring a diverse range of cryptocurrencies, backed by comprehensive market analyses and real-time data.
          </p>

          <ul class="instruction-list">

            <li>
              <div class="instruction-card">

                <figure class="card-banner">
                  <img src="./assets/images/instruction-1.png" width="96" height="96" loading="lazy" alt="Step 1"
                    class="img">
                </figure>

                <p class="card-subtitle">Step 1</p>

                <h3 class="h3 card-title">Create Account</h3>

                <p class="card-text">
                  Create an account with us and provide all the required details.
                </p>

              </div>
            </li>

            <li>
              <div class="instruction-card">

                <figure class="card-banner">
                  <img src="./assets/images/instruction-2.png" width="96" height="96" loading="lazy" alt="Step 2"
                    class="img">
                </figure>

                <p class="card-subtitle">Step 2</p>

                <h3 class="h3 card-title">Sign In</h3>

                <p class="card-text">
                  Sign In to access your dashboard by clicking on the profile icon at the top right of the website.
                </p>

              </div>
            </li>

            <li>
              <div class="instruction-card">

                <figure class="card-banner">
                  <img src="./assets/images/instruction-3.png" width="96" height="96" loading="lazy" alt="Step 3"
                    class="img">
                </figure>

                <p class="card-subtitle">Step 3</p>

                <h3 class="h3 card-title">Deposit Coins</h3>

                <p class="card-text">
                  Start investing by depositing coins to your account and watch as your crypto investment grows.
                </p>

              </div>
            </li>

            <li>
              <div class="instruction-card">

                <figure class="card-banner">
                  <img src="./assets/images/instruction-4.png" width="96" height="96" loading="lazy" alt="Step 4"
                    class="img">
                </figure>

                <p class="card-subtitle">Step 4</p>

                <h3 class="h3 card-title">Withdraw your Profit</h3>

                <p class="card-text">
                  Submit a request to withdraw your profit to your wallet.
                </p>

              </div>
            </li>

          </ul>

        </div>
      </section>





      <!-- 
        - #ABOUT
      -->

      <section id="about" class="section about" aria-label="about" data-section>
        <div class="container">

          <figure class="about-banner">
            <img src="./assets/images/about-banner.png" width="748" height="436" loading="lazy" alt="about banner"
              class="w-100">
          </figure>

          <div class="about-content">

            <h2 class="h2 section-title">What Is Bitscap</h2>

            <p class="section-text">
              As the digital revolution continues to reshape the financial landscape, 
              savvy investors are turning their attention 
              to the potential rewards offered by blockchain technology
            </p>

            <ul class="section-list">

              <li class="section-item">
                <div class="title-wrapper">
                  <ion-icon name="checkmark-circle" aria-hidden="true"></ion-icon>

                  <h3 class="h3 list-title">View real-time cryptocurrency prices</h3>
                </div>

                <p class="item-text">
                  Experience a variety of trading on Bitcost. You can use various types of coin transactions such as
                  Spot Trade, Futures
                  Trade, P2P, Staking, Mining, and margin.
                </p>
              </li>

              <li class="section-item">
                <div class="title-wrapper">
                  <ion-icon name="checkmark-circle" aria-hidden="true"></ion-icon>

                  <h3 class="h3 list-title">Buy and sell BTC, ETH, XRP, OKB, Etc...</h3>
                </div>

                <p class="item-text">
                  Experience a variety of trading on Bitcost. You can use various types of coin transactions such as
                  Spot Trade, Futures
                  Trade, P2P, Staking, Mining, and margin.
                </p>
              </li>

            </ul>

            <a href="auth/register.php" class="btn btn-primary">Explore More</a>

          </div>

        </div>
      </section>





      <!-- 
        - #APP
      -->

      <section class="section" aria-label="" id="plans" data-section>
        <div class="plan-container">
            <h5 class="badge">Investment Plans</h5>
            <h1 class="heading">Choose Your Best Pricing Plan</h1>
            <div class="card_group">
                <?php 
                    while($row=mysqli_fetch_array($res)){
                ?>       
                    <div class="pricing-card">
                    <i class="fab fa-telegram-plane"></i>
                    <span><?php echo $row['name'] ?></span>
                    <h4 class="price">$ <?php echo $row['price'] ?></h4>
                    <ul class="package_list">
                        <li>Period: <?php echo $row['hourly_time'] ?> hours</li>
                        <li>Profit: <?php echo $row['profit'] ?></li>
                        <li>Coin: <?php echo $row['coin'] ?></li>
                        <li>Guaranteed</li>
                    </ul>
                    <a href="user/pages/deposit/deposit_request.php" class="get_started_btn">Get Started</a>
                </div>
                <?php
                    }
                ?>
                
            </div>
        </div>
      </section>

    </article>
  </main>





  <!-- 
    - #FOOTER
  -->

  <footer class="footer">

    <div class="footer-top" data-section>
      <div class="container">

        <div class="footer-brand">

          <a href="#" class="logo">
            <img src="./assets/images/logo.svg" width="50" height="50" alt="Cryptex logo">
            Bitscap
          </a>

          <h2 class="footer-title">Let's talk! 🤙</h2>

          <a href="tel:+123456789101" class="footer-contact-link">(202) 281-0599</a>

          <a href="mailto:hello.cryptex@gmail.com" class="footer-contact-link">hello.bitscap@gmail.com</a>

          <!--<address class="footer-contact-link">-->
          <!--  Cecilia Chapman 711-2880 Nulla St. Mankato Mississippi 96522-->
          <!--</address>-->

        </div>

        

        <ul class="footer-list">

          <li>
            <p class="footer-list-title">Support</p>
          </li>

          <li>
            <a href="#" class="footer-link">Bitscap Learn</a>
          </li>
        </ul>

        <ul class="footer-list">

          <li>
            <p class="footer-list-title">About Us</p>
          </li>

          <li>
            <a href="#" class="footer-link">About Bitscap</a>
          </li>

          <li>
            <a href="#" class="footer-link">Blog</a>
          </li>

        </ul>

      </div>
    </div>

    <div class="footer-bottom">
      <div class="container">

        <ul class="social-list">

          <li>
            <a href="#" class="social-link">
              <ion-icon name="logo-facebook"></ion-icon>
            </a>
          </li>

          <li>
            <a href="#" class="social-link">
              <ion-icon name="logo-twitter"></ion-icon>
            </a>
          </li>

          <li>
            <a href="#" class="social-link">
              <ion-icon name="logo-instagram"></ion-icon>
            </a>
          </li>

          <li>
            <a href="#" class="social-link">
              <ion-icon name="logo-linkedin"></ion-icon>
            </a>
          </li>

        </ul>

      </div>
    </div>

  </footer>



    

  <script>
  var userIcon = document.getElementById('userIcon');
  var userDropdown = document.getElementById('userDropdown');
  var loginButtons = document.getElementById('loginButtons');
  var loginButton = document.getElementById('loginButton');
  var signUpButton = document.getElementById('signUpButton');

  // Check if the user is logged in (you may need to adjust this based on your session logic)
  function checkLoginStatus() {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
      if (xhr.readyState === 4 && xhr.status === 200) {
        var isLoggedIn = JSON.parse(xhr.responseText).isLoggedIn;

        // Show/hide user icon and login buttons based on login status
        if (isLoggedIn) {
          userIcon.style.display = 'block';
          loginButtons.style.display = 'none';
        } else {
          userIcon.style.display = 'none';
          loginButtons.style.display = 'flex';
        }
      }
    };

    // Make an Ajax request to check login status
    xhr.open('GET', 'check_login_status.php', true);
    xhr.send();
  }
  function toggleUserDropdown() {
      userDropdown.style.display = (userDropdown.style.display === 'block') ? 'none' : 'block';
  }

  window.addEventListener('click', function(event) {
      if (event.target !== userIcon && event.target !== userDropdown) {
          userDropdown.style.display = 'none';
      }
  });

  function redirectToProfile() {
      // Implement your redirection logic here
      console.log('Redirect to profile');
  }

  function redirectToDashboard() {
      // Implement your redirection logic here
      console.log('Redirect to dashboard');
  }

  function logout() {
      // Implement your logout logic here
      console.log('Logout');
  }

  // Example: Add click event listeners for login and sign up buttons
  loginButton.addEventListener('click', function() {
      // Implement login button click logic
      console.log('Login button clicked');
  });

  signUpButton.addEventListener('click', function() {
      // Implement sign up button click logic
      console.log('Sign Up button clicked');
  });
</script>
<!--Start of Tawk.to Script-->
    <script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/65bcaa798d261e1b5f5b2cef/1hlkfjrlp';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
    </script>
<!--End of Tawk.to Script-->
  <!-- 
    - custom js link
  -->
  <script src="./assets/js/script.js" defer></script>
  <script>
  
    document.addEventListener("DOMContentLoaded", function () {
      const avatar = document.getElementById("avatar");
      const dropdown = document.getElementById("dropdown");
    
      avatar.addEventListener("click", function () {
        dropdown.style.display = dropdown.style.display === "block" ? "none" : "block";
      });
    
      // Close dropdown if clicked outside
      document.addEventListener("click", function (event) {
        if (!avatar.contains(event.target) && !dropdown.contains(event.target)) {
          dropdown.style.display = "none";
        }
      });
    });

  </script>

  <!-- 
    - ionicon link
  -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>