<?php
include_once("./database/constants.php");
if (!isset($_SESSION["userid"])) {
    header("location:".DOMIAN."/");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Inventroy Management System</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="./js/main.js"></script>
</head>

<body>
    <?php
    include_once("./templates/header.php");
    ?>
    <br /><br />
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card mx-auto">
                    <img class="card-img-top mx-auto" style="width: 60%;" src="./images/Untitled.jpeg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fa fa-user">&nbsp;</i>Profile Info</h5>
                        <p class="card-text"><i class="fa fa-user">&nbsp;</i>Avinash Kumar</p>
                        <p class="card-text">Admin</p>
                        <p class="card-text">Last Login : xxxx-xx-xx</p>
                        <a href="#" class="btn btn-primary"><i class="fa fa-edit">&nbsp;</i>Edit Profile</a>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="jumbotron" style="width: 100%;height: 100%;">
                    <h1>Welcome Admin</h1>
                    <div class="row">
                        <div class="col-sm-6">
                            <iframe src="https://free.timeanddate.com/clock/i947vtvu/n1045/szw160/szh160/cf100/hnce1ead6" frameborder="0" width="160" height="160"></iframe>
                        </div>
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">New Orders</h5>
                                    <p class="card-text">Here you can make invoices and create new orders</p>
                                    <a href="#" class="btn btn-primary">New Order</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <p></p>
    <p></p>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Categories</h5>
                        <p class="card-text">Heare you can manage your categories and you can add new parent and sub categories</p>
                        <a href="#" data-toggle="modal" data-target="#form_category" class="btn btn-primary">Add</a>
                        <a href="manage_categories.php" class="btn btn-primary">Manage</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Brands</h5>
                        <p class="card-text">Heare you can manage your brands and you can add new brands</p>
                        <a href="#" data-toggle="modal" data-target="#form_brand" class="btn btn-primary">Add</a>
                        <a href="#" class="btn btn-primary">Manage</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Products</h5>
                        <p class="card-text">Heare you can manage your products and you can add new products</p>
                        <a href="#" data-toggle="modal" data-target="#form_products" class="btn btn-primary">Add</a>
                        <a href="#" class="btn btn-primary">Manage</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    // Category Form
    include_once("./templates/category.php");
    ?>

    <?php
    // Brand Form
    include_once("./templates/brand.php");
    ?>

    <?php
    // Products Form
    include_once("./templates/products.php");
    ?>
</body>

</html>