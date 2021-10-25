<?php 
    if(isset($_GET['title'])){
        $title = $_GET['title'];
    } else {
        $title = 'Dashboard';
    }
?>
<nav class="navbar">
    <div class="nav">
        <div class="heading">
            <h1><?php echo $title; ?></h1>
        </div>
        <div class="profile">
            <span class="user">Kitchen Manager</span>
            <img src="<?php echo URLROOT;?>/images/profile.png" alt="">
        </div>
    </div>
    <div class="search_box">
        <form action="">
            <input type="text" id ="search" name= "search" placeholder="Search..." autocomplete="off">
            <img src="<?php echo URLROOT;?>/images/search_icon.png" id="input_img">
        </form>
    </div>
</nav>