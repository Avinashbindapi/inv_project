$(document).ready(function () {
    var DOMAIN = "http://localhost/inv_project/public_html/";
    $("#register_form").on("submit", function () {
        var status = false;
        var name = $("#username");
        var email = $("#email");
        var pass1 = $("#password1");
        var pass2 = $("#password2");
        var type = $("#usertype");
        var e_patt = new RegExp(/^[a-z0-9_-]+(\.[a-z0-9_-]+)*@[a-z0-9_-]+(\.[a-z0-9_-]+)*(\.[a-z]{2,4})$/);
        if (name.val() == "" || name.val().length < 6) {
            name.addClass("border-danger");
            $("#u_error").html("<span class='text-danger'>Please Enter Name and Name should be more than 6 char</span>");
            status = false;
        } else {
            name.removeClass("border-danger");
            $("#u_error").html("");
            status = true;
        }
        if (!e_patt.test(email.val())) {
            email.addClass("border-danger");
            $("#e_error").html("<span class='text-danger'>Please Enter a valid Email Address</span>");
            status = false;
        } else {
            email.removeClass("border-danger");
            $("#e_error").html("");
            status = true;
        }

        if (pass1.val() == "" || pass1.val().length < 4) {
            pass1.addClass("border-danger");
            $("#p1_error").html("<span class='text-danger'>Please Enter more than 9 digit</span>");
            status = false;
        } else {
            pass1.removeClass("border-danger");
            $("#p1_error").html("");
            status = true;
        }

        if (pass2.val() == "" || pass2.val().length < 4) {
            pass2.addClass("border-danger");
            $("#p2_error").html("<span class='text-danger'>Please Enter more than 4 digit</span>");
            status = false;
        } else {
            pass2.removeClass("border-danger");
            $("#p2_error").html("");
            status = true;
        }

        if (type.val() == "") {
            type.addClass("border-danger");
            $("#t_error").html("<span class='text-danger'>Please Select a type</span>");
            status = false;
        } else {
            type.removeClass("border-danger");
            $("#t_error").html("");
            status = true;
        }

        if ((pass1.val() == pass2.val()) && status == true) {
            $(".overlay").show();
            $.ajax({
                url: DOMAIN + "/includes/process.php",
                method: "POST",
                data: $("#register_form").serialize(),
                success: function (data) {
                    if (data == "Email_Already_Exists") {
                        $(".overlay").hide();
                        alert("It seems like you email already used");
                    } else if (data == "Some_Error") {
                        $(".overlay").hide();
                        alert("Something Wrong");
                    } else {
                        $(".overlay").hide();
                        window.location.href = encodeURI(DOMAIN + "/index.php?msg=You are registered Now you can login");
                    }
                }
            })
        } else {
            pass2.addClass("border-danger");
            $("#p2_error").html("<span class='text-danger'>Password is not matched</span>");
            status = true;
        }
    });

    // Login Form
    $("#form_login").on("submit", function () {
        var status = false;
        var email = $("#log_email");
        var pass = $("#log_Password");

        // Validation for email
        if (email.val() == "") {
            email.addClass("border-danger");
            $("#e_error").html("<span class='text-danger'>Please Enter Email Address</span>")
            status = false;
        } else {
            email.removeClass("border-danger");
            $("#e_error").html("");
            status = true;
        }

        // Validation for password
        if (pass.val() == "") {
            pass.addClass("border-danger");
            $("#p_error").html("<span class='text-danger'>Please Enter Password</span>");
            status = false;
        } else {
            pass.removeClass("border-danger");
            $("#p_error").html("");
            status = true;
        }

        // If all validations pass
        if (status) {
            $(".overlay").show();
            $.ajax({
                url: DOMAIN + "/includes/process.php",
                method: "POST",
                data: $("#form_login").serialize(),
                success: function (data) {
                    if (data == "NOT_REGISTER") {
                        $(".overlay").hide();
                        email.addClass("border-danger");
                        $("#e_error").html("<span class='text-danger'>It seems like you are not registerd</span>");
                    } else if (data == "PASSWORD_NOT_MATCHED") {
                        $(".overlay").hide();
                        pass.addClass("border-danger");
                        $("#p_error").html("<span class='text-danger'>Please Enter Correct Password</span>");
                        status = false;
                    } else {
                        $(".overlay").hide();
                        console.log(data);
                        window.location.href = DOMAIN + "/dashbord.php";
                    }
                }
            })
        }

    });

    // Fetch category
    fetch_category();
    function fetch_category() {
        $.ajax({
            url: DOMAIN + "/includes/process.php",
            method: "POST",
            data: { getCategory: 1 },
            success: function (data) {
                var root = "<option value='0'>Root</option>";
                var Choose = "<option value=''>Choose Category</option>";
                $("#parent_cat").html(root + data);
                $("#select_cat").html(Choose + data);
            }
        })
    };


    // Fetch Brand
    fetch_brand();
    function fetch_brand() {
        $.ajax({
            url: DOMAIN + "/includes/process.php",
            method: "POST",
            data: { getBrand: 1 },
            success: function (data) {
                var Choose = "<option value=''>Choose Brand</option>";
                $("#select_brand").html(Choose + data);
            }
        })
    }

    // Add Category
    $("#category_form").on("submit", function () {
        if ($("#catgory_name").val() == "") {
            $("#catgory_name").addClass("border-danger");
            $("#cat_error").html("<span class='text-danger'>Please Enter Category Name</span>")
        } else {
            $.ajax({
                url: DOMAIN + "/includes/process.php",
                method: "POST",
                data: $("#category_form").serialize(),
                success: function (data) {
                    if ($(data == "CATEGORY_ADDED")) {
                        $("#catgory_name").removeClass("border-danger");
                        $("#cat_error").html("<span class='text-success'>New Category Added Successfully..!</span>");
                        $("#catgory_name").val("");
                        fetch_category();
                    } else {
                        alert(data)
                    }
                }
            })
        }
    });

    //Add Brand
    $("#brand_form").on("submit", function () {
        if ($("#brand_name").val() == "") {
            $("#brand_name").addClass("border-danger");
            $("#brand_error").html("<span class='text-danger'>Please Enter Brand Name</span>")
        } else {
            $.ajax({
                url: DOMAIN + "/includes/process.php",
                method: "POST",
                data: $("#brand_form").serialize(),
                success: function (data) {
                    if ($(data == "BRAND_ADDED")) {
                        $("#brand_name").removeClass("border-danger");
                        $("#brand_error").html("<span class='text-success'>New Brand Added Successfully..!</span>");
                        $("#brand_name").val("");
                        fetch_brand();
                    } else {
                        alert(data)
                    }
                }
            })
        }
    });

    // Add Product
    $("#product_form").on("submit", function () {
        $.ajax({
            url: DOMAIN + "/includes/process.php",
            method: "POST",
            data: $("#product_form").serialize(),
            contentType: 'application/x-www-form-urlencoded; charset=UTF-8', // Added this line
            success: function (data) {
                if (data == "NEW_PRODUCT_ADDED") {
                    // $("#product_name").val("");
                    // $("#product_qty").val("");
                    alert("New Product Added Successfully..!");
                    $("#select_cat").val("");
                    alert(data);
                } else {
                    console.log(data);
                    alert(data);
                }
            }
        });
    });

    // Manage Category
    function manageCategory() {
        $.ajax({
            url: DOMAIN + "/includes/process.php",
            method: "POST",
            data: { manageCategory },
            success: function (data) {
                alert(data);
            }
        });
    }

});