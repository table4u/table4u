<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Table4U</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/cashierOrderMenu.css">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/toast.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js" ></script>
    <title>Table4U</title>
   
</head>

<?php if (isset($_SESSION['successMsg'])) : ?>

<body onload="Toast.show('<?php echo $_SESSION['successMsg']; ?>' , 'success')">
    <?php unset($_SESSION['successMsg']); ?>

<?php else : ?>

    <body s>
    <?php endif; ?>
  <div class="dashboard"> <!--Dashboard start-->

    <section class="navigation"> <!--Section navigation start-->
      <div class="logo">
      <img src="<?php echo URLROOT ?>/public/images/logo_table4u.png" width="270px" height="150px">

      <h7>Table 4U<br> Cashier Panel</h7>
    </div>
          <div>
              <ul>
              <!-- <li> <a href="<?php echo URLROOT ?>/CashierReserveTable/showPendingReservations"> Reservation</a> </li>
              <li> <a href="<?php echo URLROOT ?>/CashierOrderMenu/showOrderDetails">Orders </a> </li> -->
              <li class="table-navigation"> <a href="<?php echo URLROOT ?>/CashierReserveTable">Reservations </a> </li>
              <li> <a href="<?php echo URLROOT ?>/CashierOrderMenu">Orders </a> </li>
              <li> <a href="<?php echo URLROOT ?>/CashierGuests/loadAddCustomer">Customers </a> </li>
              <li> <a href="<?php echo URLROOT ?>/CashierPayment/showCompletedpayments">Payments </a> </li>
          
              <br><br>
              <!-- <li> <a href="<?php echo URLROOT ?>/Login/logout">Logout </a> </li> -->

              </ul>
          </div>
          <a class="logout" a href="<?php echo URLROOT ?>/Login/logout">Log Out</a>
          
  </section><!--Section navigation end-->


        <section class="main_area"> <!--Section main area start-->
        <div class="login_name"><p>Cashier</p></div>
        <div class="user-image"><img src="<?php echo URLROOT ?>/public/images/profile.png" width="30px" height="30px">  </div>

        <!-- Start of menu buttons -->
        <div class="menutypeButtons">
         
          <?php $menuT = array("appetizer","maincourse","dessert","drinks");?>
          
          <button class="btn1 menu_btn"  onclick="menutype(event, 'appetizer')" id="defaultOpen2">
            <div class="appertizer">
            <img class="icon1" src="<?php echo URLROOT ?>/public/images/fast-food.svg" alt=""/>
                <h3 class="text1">Appetizers </h3>
            </div>
          </button>

          <button class="btn2 menu_btn"  onclick="menutype(event, 'maincourse')">
            <div class="maincourse">
              <img class="icon2" src="<?php echo URLROOT ?>/public/images/dinner.svg" alt=""/>
              <h3 class="text2"> Main Course</h3>
            </div>
          </button>

          <button class="btn3 menu_btn"  onclick="menutype(event, 'dessert')">
            <div class="dessert">
              <img class="icon3" src="<?php echo URLROOT ?>/public/images/desert.svg" alt=""/>
              <h3 class="text3">Dessert</h3>
            </div>
          </button>
        
        <button class="btn4 menu_btn"  onclick="menutype(event, 'drinks')">
            <div class="drinks">
              <img class="icon4" src="<?php echo URLROOT ?>/public/images/desert.svg" alt=""/>
              <h3 class="text4">Drinks</h3>
            </div>
        </button>
        </div>
    <!-- End of menu buttons -->

  <div id="list1">

    <!-- Start Menu List -->
    <div class="menulist">
      <form class="search" action="<?php echo URLROOT ?>/CashierOrders/searchMenuItem" method="GET">
        <input type="text" placeholder="Search.." name="search" value="<?php if(isset($_GET['search'])){echo $_GET['search'];}?>">
        <!-- <button type="submit"><i class="fa fa-search"></i></button> -->
      </form>
      
      <div class="menuItems" id="appetizer" >
        <div class="row">
        <?php foreach($data as $menu): 
          if($menu->menuID == "1"){?>
          <div class="column">
            <div class="cardS"  onclick="addToCartClickedS()">
                <img class="icon" src="<?php echo URLROOT ?>/public/images/<?php echo $menu->picture;?>" alt=""/>
                <h5 class="text1"><?php echo $menu->name ?></h5>
                <h5 class="text1">Small</h5>
                <h5 class="price1">Rs . <span class="priceS"><?php echo $menu->priceSmall ?></span></h5>
                <h5 class="size1" style="display:none">S</h5>
                <h5 class="id1" style="display:none"><?php $menu->menuItemID;?></h5>
            </div>
            <div class="cardM"  onclick="addToCartClickedM()">
                <img class="icon" src="<?php echo URLROOT ?>/public/images/<?php echo $menu->picture;?>" alt=""/>
                <h5 class="text2"><?php echo $menu->name ?></h5>
                <h5 class="text2">Medium</h5>
                <h5 class="price2">Rs . <span class="priceM"><?php echo $menu->priceMedium ?></span></h5>
                <h5 class="size2" style="display:none">M</h5>
                <h5 class="id2" style="display:none"><?php $menu->menuItemID;?></h5>
            </div>
            <div class="cardL"  onclick="addToCartClickedL()">
                <img class="icon" src="<?php echo URLROOT ?>/public/images/<?php echo $menu->picture;?>" alt=""/>
                <h5 class="text3"><?php echo $menu->name ?></h5>
                <h5 class="text3">Large</h5>
                <h5 class="price3">Rs . <span class="priceL"><?php echo $menu->priceLarge ?></span></h5>
                <h5 class="size3" style="display:none">L</h5>
                <h5 class="id3" style="display:none"><?php $menu->menuItemID;?></h5>
            </div>
          </div>
          <?php } endforeach; ?>
      </div>
      </div>
      <div class="menuItems" id="maincourse" >
        <div class="row">
        <?php foreach($data as $menu): 
          if($menu->menuID == "2"){?>
          <div class="column">
            <div class="cardS"  onclick="addToCartClickedS()">
                <img class="icon" src="<?php echo URLROOT ?>/public/images/<?php echo $menu->picture;?>" alt=""/>
                <h5 class="text1"><?php echo $menu->name ?></h5>
                <h5 class="text1">Small</h5>
                <h5 class="price1">Rs . <span class="priceS"><?php echo $menu->priceSmall ?></span></h5>
                <h5 class="size1" style="display:none">S</h5>
                <h5 class="id1" style="display:none"><?php $menu->menuItemID;?></h5>
            </div>
            <div class="cardM"  onclick="addToCartClickedM()">
                <img class="icon" src="<?php echo URLROOT ?>/public/images/<?php echo $menu->picture;?>" alt=""/>
                <h5 class="text2"><?php echo $menu->name ?></h5>
                <h5 class="text2">Medium</h5>
                <h5 class="price2">Rs . <span class="priceM"><?php echo $menu->priceMedium ?></span></h5>
                <h5 class="size2" style="display:none">M</h5>
                <h5 class="id2" style="display:none"><?php $menu->menuItemID;?></h5>
            </div>
            <div class="cardL"  onclick="addToCartClickedL()">
                <img class="icon" src="<?php echo URLROOT ?>/public/images/<?php echo $menu->picture;?>" alt=""/>
                <h5 class="text3"><?php echo $menu->name ?></h5>
                <h5 class="text3">Large</h5>
                <h5 class="price3">Rs . <span class="priceL"><?php echo $menu->priceLarge ?></span></h5>
                <h5 class="size3" style="display:none">L</h5>
                <h5 class="id3" style="display:none"><?php $menu->menuItemID;?></h5>
                <?php echo $menu->menuItemID; ?>
            </div>
          </div>
          <?php } endforeach; ?>
      </div>
      </div>
      <div class="menuItems" id="dessert" >
        <div class="row">
        <?php foreach($data as $menu): 
          if($menu->menuID == "4"){?>
          <div class="column">
            <div class="cardS"  onclick="addToCartClickedS()">
                <img class="icon" src="<?php echo URLROOT ?>/public/images/<?php echo $menu->picture;?>" alt=""/>
                <h5 class="text1"><?php echo $menu->name ?></h5>
                <h5 class="text1">Small</h5>
                <h5 class="price1">Rs . <span class="priceS"><?php echo $menu->priceSmall ?></span></h5>
                <h5 class="size1" style="display:none">S</h5>
                <h5 class="id1" style="display:none"><?php $menu->menuItemID;?></h5>
            </div>
            <div class="cardM"  onclick="addToCartClickedM()">
                <img class="icon" src="<?php echo URLROOT ?>/public/images/<?php echo $menu->picture;?>" alt=""/>
                <h5 class="text2"><?php echo $menu->name ?></h5>
                <h5 class="text2">Medium</h5>
                <h5 class="price2">Rs . <span class="priceM"><?php echo $menu->priceMedium ?></span></h5>
                <h5 class="size2" style="display:none">M</h5>
                <h5 class="id2" style="display:none"><?php $menu->menuItemID;?></h5>
            </div>
            <div class="cardL"  onclick="addToCartClickedL()">
                <img class="icon" src="<?php echo URLROOT ?>/public/images/<?php echo $menu->picture;?>" alt=""/>
                <h5 class="text3"><?php echo $menu->name ?></h5>
                <h5 class="text3">Large</h5>
                <h5 class="price3">Rs . <span class="priceL"><?php echo $menu->priceLarge ?></span></h5>
                <h5 class="size3" style="display:none">L</h5>
                <h5 class="id3" style="display:none"><?php $menu->menuItemID;?></h5>
            </div>
          </div>
          <?php } endforeach; ?>
      </div>
      </div>
      <div class="menuItems" id="drinks" >
        <div class="row">
        <?php foreach($data as $menu): 
          if($menu->menuID == "3"){?>
          <div class="column">
            <div class="cardS"  onclick="addToCartClickedS()">
                <img class="icon" src="<?php echo URLROOT ?>/public/images/<?php echo $menu->picture;?>" alt=""/>
                <h5 class="text1"><?php echo $menu->name ?></h5>
                <h5 class="text1">Small</h5>
                <h5 class="price1">Rs . <span class="priceS"><?php echo $menu->priceSmall ?></span></h5>
                <h5 class="size1" style="display:none">S</h5>
                <h5 class="id1" style="display:none"><?php $menu->menuItemID;?></h5>
            </div>
            <div class="cardM"  onclick="addToCartClickedM()">
                <img class="icon" src="<?php echo URLROOT ?>/public/images/<?php echo $menu->picture;?>" alt=""/>
                <h5 class="text2"><?php echo $menu->name ?></h5>
                <h5 class="text2">Medium</h5>
                <h5 class="price2">Rs . <span class="priceM"><?php echo $menu->priceMedium ?></span></h5>
                <h5 class="size2" style="display:none">M</h5>
                <h5 class="id2" style="display:none"><?php $menu->menuItemID;?></h5>
            </div>
            <div class="cardL"  onclick="addToCartClickedL()">
                <img class="icon" src="<?php echo URLROOT ?>/public/images/<?php echo $menu->picture;?>" alt=""/>
                <h5 class="text3"><?php echo $menu->name ?></h5>
                <h5 class="text3">Large</h5>
                <h5 class="price3">Rs . <span class="priceL"><?php echo $menu->priceLarge ?></span></h5>
                <h5 class="size3" style="display:none">L</h5>
                <h5 class="id3" style="display:none"><?php $menu->menuItemID;?></h5>
            </div>
          </div>
          <?php } endforeach; ?>
      </div>
      </div>
      
    </div>
          
    
    <!-- End of Menu List -->

  </div>

  <!-- Start Checkout Box -->
  <div class="checkoutBox">
    <h1>Checkout</h1>
    <h2>Item  Price(Rs.) Qty</h2>
    
    <div class="list">
      <section class="container content-section">
            <div class="cart-items">
            </div>
        </section>
    </div>
    <div class="cart-total">
        <strong class="cart-total-title">Total</strong>
        <span class="cart-total-price">00000.00</span>
        
    </div>

    <div id="total" ></div>
    
    <!-- <a class="paybyCash" id=""  href="<?php echo URLROOT ?>/CashierOrderMenu/paybyCash">
      <img class="iconpay" src="<?php echo URLROOT ?>/public/images/cash.png" alt=""/>
      <h6 class="text1">Cash Pay</h3>
    </a> -->

    <!-- <a class="paybyCard"  href="<?php echo URLROOT ?>/CashierOrderMenu/paybyCard">
      <img class="iconpay" src="<?php echo URLROOT ?>/public/images/card.png" alt=""/>
      <h6 class="text1">Card Pay</h3>
    </a> -->
  </div>

  <!-- End of Checkout Box -->

  <script src="<?php echo URLROOT ?>/public/js/cashierOrders.js"></script>  
</body>
</html>
