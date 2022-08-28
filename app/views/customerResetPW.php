<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>

    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        * {
            font-family: sans-serif;
            padding: 0;
            margin: 0;
            text-decoration: none;
        }

        body {
            background: #d5dbd9;
        }

        :root {
            --orange: #FF6000;
        }


        .container {
            background: white;
            position: fixed;
            top: 20%;
            left: 30%;
            width: 40%;
            right: auto;
            border: 1rem solid #fff;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.3);
            font-size: 1rem;
            text-align: center;
            padding: 1.5rem;
        }

        .form-group{
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            /* font-weight: bolder; */
        }

        .form-group input {
            width: 50%;
            outline: none;
            /* border: 1px solid #d5dbd9; */
            border: none;
            font-size: 15px;
            padding: 8px 10px;
            border-radius: 3px;
            transition: all 0.3s ease;
            justify-content: center;
        }

        .form-group .input-field:focus {
            border-bottom: 1px solid var(--orange);
            box-shadow: 0 0 0 var(--orange);

        }

        .btn {
            background-color: #181818;
            color: whitesmoke;
            font-weight: 600;
            font-size: 1.5rem;
            text-align: center;
            display: inline-block;
            padding: 0.8rem 3rem;
            cursor: pointer;
            border-radius: 0.5rem;
            position: relative;
            overflow: hidden;
            margin-top: 1rem;
            width: 30%;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2),
                0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }
    </style>
</head>


<body>

    <div class="container">
        <h3>
            Reset Your Password
        </h3>
        <br>
        <p>
            An email will be sent to you with instructions on how to reset your password.
        </p>
        <form style="padding: 1.5rem;" action="<?php echo URLROOT; ?>/login/resetRequest" method="POST">
            <div class="form-group">
                <input type="email" required class="input-field" id="" placeholder="Enter email address" name="email">
            </div>
            <div class="form-group">
                <input type="submit" class="btn" id="" name="submit" value="Send Email">
            </div>

        </form>
    </div>

</body>