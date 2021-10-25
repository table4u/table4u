<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        * {
            font-family: sans-serif;
            padding: 0;
            margin: 0;
            text-decoration: none;
        }

        .container {
            position: fixed;
            top: 10%;
            left: auto;
            right: auto;
            border: 1rem sold #fff;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.3);
            font-size: 1.5rem;
        }
    </style>
</head>


<body>
    <!-- if successful verification login -->

    <!-- if unsuccessful  -->
    <div class="container">
        <p>Something went wrong. Please try again!</p>
        <a href="<?php echo URLROOT ?>/login">Back to Login Page</a>
    </div>
</body>