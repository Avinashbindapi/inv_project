<?php
include_once("../database/constants.php");
include_once("./DBOperation.php");
include_once("./user.php");
include_once("./manage.php");

if (isset($_POST["username"]) and isset($_POST["email"])) {
    $user = new User();
    $result = $user->createUserAccount($_POST["username"], $_POST["email"], $_POST["password1"], $_POST["usertype"]);
    echo $result;
}

// For login processing
if (isset($_POST["log_email"]) and isset($_POST["log_password"])) {
    $user = new User();
    $result = $user->userLogin($_POST["log_email"], $_POST["log_password"]);
    echo $result;
}

// To Get Category
if (isset($_POST["getBrand"])) {
    $obj = new DBOperation();
    $rows = $obj->getAllRecords("brand");

    foreach ($rows as $row) {
        echo "<option value='" . $row["bid"] . "'>" . $row["brand_name"] . "</option>";
    }

    exit();
}

// Fetch Brand
if (isset($_POST["getCategory"])) {
    $obj = new DBOperation();
    $rows = $obj->getAllRecords("categories");

    foreach ($rows as $row) {
        echo "<option value='" . $row["cid"] . "'>" . $row["category_name"] . "</option>";
    }

    exit();
}

// Add Category

if (isset($_POST["catgory_name"]) and isset($_POST["parent_cat"])) {
    $obj = new DBOperation();
    $result = $obj->addCategory($_POST["parent_cat"], $_POST["catgory_name"]);
    echo $result;
    exit();
}

// Add Brand

if (isset($_POST["brand_name"])) {
    $obj = new DBOperation();
    $result = $obj->addBrand($_POST["brand_name"]);
    echo $result;
    exit();
}

// Add Product

if (isset($_POST["added_date"]) && isset($_POST["product_name"])) {
    $obj = new DBOperation();
    $result = $obj->addProduct(
        $_POST["select_cat"],
        $_POST["select_brand"],
        $_POST["product_name"],
        $_POST["product_price"],
        $_POST["product_qty"],
        $_POST["added_date"]
    );
    echo $result;
    exit();
}

// Manage Category

if (isset($_POST["manageCategory"])) {
    $m = new Manage();
    $result = $m->manageRecordWithPagination("categories", 1);
    $row = $result["rows"];
    $pagination = $result["pagination"];
    if (count($row) > 0) {
        $n = 0;
        foreach ($rows as $row) {
            ?>
                <tr>
                    <td><?php echo ++$n; ?></td>
                    <td><?php echo $row["category"]; ?></td>
                    <td><?php echo $row["parent"]; ?></td>
                    <td><a href="#" class="btn btn-success btn-sm">Action</a></td>
                    <td>
                        <a href="#" class="btn btn-danger btn-sm">Delete</a>
                        <a href="#" class="btn btn-info btn-sm">Edit</a>
                    </td>
                </tr>
            <?php
        }
        ?>
            <tr><td colspan="5"><?php echo $pagination; ?></td></tr>
        <?php 
        exit();   
    }
}
