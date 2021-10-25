<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <!-- custom styling sheet -->
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/foodPkg.css">

    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Food Package</title>

</head>

<body>

    <header>
        <a href="#" class="logo"> <i class="fas fa-utensils"></i> Hotel De Luna</a>
        <div id="menu-bar" class="fas fa-bars"></div>
        <nav class="navbar">
            <a href="<?php echo URLROOT ?>/customerMenu/menu">Menu</a>
            <a href="<?php echo URLROOT ?>/reservations/reservationDetails">Reservations</a>
            <a href="<?php echo URLROOT ?>/customerFoodpackage/index">Food Package</a>
            <a href="<?php echo URLROOT ?>/login/logout">Logout</a>
            <a href="#"><i class="fas fa-bell"></i></a>
            <a href="<?php echo URLROOT ?>/customerProfile/profile"><i class="fas fa-user"></i></a>
        </nav>
    </header>


    <section>
        <button class="btn">
            Create New FoodPackage
        </button>
        <div>
            <hr>
        </div>
        <div>
            <h2 class="heading">Food Packages</h2>
            <hr class="hrule">
        </div>

        <div style="width: 100%; position: relative">
            <table style="width: 100%;">
                <thead style="border: 0">
                    <th>Food Package Name</th>
                    <th>Food Item</th>
                    <th>Number of Servings</th>
                    <th>Price</th>
                    <th></th>
                </thead>
                <tbody>
                    <tr>
                        <td>Breakfast</td>
                        <td>
                            <ul>
                                <li>
                                    Fried Rice
                                </li>
                                <li>
                                    Soup
                                </li>
                                <li>
                                    Fruit Salad
                                </li>
                            </ul>
                        </td>
                        <td>
                            <ul>
                                <li>
                                    <span>Medium</span>
                                    <span>X2</span>
                                </li>
                                <li>
                                    <span>Medium</span>
                                    <span>X2</span>
                                </li>
                                <li>
                                    <span>Medium</span>
                                    <span>X2</span>
                                </li>
                            </ul>

                        </td>
                        <td>Rs 1000</td>
                        <td class="buttons">
                            <button class="button edit">Edit</button>
                            <button class="button delete">Delete</button>
                        </td>
                    </tr>
                    <tr>
                        <td>Dinner</td>
                        <td>
                            <ul>
                                <li>
                                    Chicken Soup
                                </li>
                                <li>
                                    Spaghetti
                                </li>
                                <li>
                                    Pizza
                                </li>
                            </ul>
                        </td>
                        <td>
                            <ul>
                                <li>
                                    <span>Medium</span>
                                    <span>X2</span>
                                </li>
                                <li>
                                    <span>Medium</span>
                                    <span>X2</span>
                                </li>
                                <li>
                                    <span>Large</span>
                                    <span>X1</span>
                                </li>
                            </ul>

                        </td>
                        <td>Rs 1000</td>
                        <td class="buttons">
                            <button class="button edit">Edit</button>
                            <button class="button delete">Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>

    <div class="bg inactive"></div>

    </div>
</body>

</html>