<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/header.css">
    <script src="https://kit.fontawesome.com/8ae6d017a9.js" crossorigin="anonymous"></script>
    <title>Dashboard</title>
</head>
<body>
    <?php session_start();?>
<i class="fa-solid fa-bars toggle" ></i>
    <div class="menu-container">
        
    <h2><a href="../index.php">
    <i class="fa-solid fa-arrow-left"></i></a>

          <p>  <span>C</span>ampus</p>
            <i class="fa-solid fa-xmark"></i>

        </h2>
       
        <ul> <?php if(isset($_SESSION["company_username"]) or isset($_SESSION["student_username"])){ ?>
            <li class="sub_menu"><a href="index.php" ><i class="fa-solid fa-user"></i> Profile</a> <i class="fa-solid fa-angle-down profile"></i></li>
            <?php }?>


            <?php if(isset($_SESSION["company_username"]) or isset($_SESSION["student_username"])){ ?>
            <li class="edit_profile"><a href="edit_profile.php"><i class="fa-solid fa-pen-to-square"></i> Edit Profile</a> </li>

            <?php } ?>
            <?php if(isset($_SESSION["company_username"]) or isset($_SESSION["student_username"])){ ?>
            <li class="edit_profile"><a href="change_password.php"><i class="fa-solid fa-user-pen"></i></i> Change Password</a> </li>

            <?php } ?>


            <?php if(isset($_SESSION["company_username"]) ){ ?>
            <li class="category"><a href="add_category.php"><i class="fa-solid fa-object-ungroup"></i> Add category</a>  </li>
            <?php }?>

           
            
            <?php if(isset($_SESSION["company_username"]) ){ ?>
            <li><a href="add_vacancy.php"><i class="fa-solid fa-plus"></i> Add Vacancy</a></li>
            <?php }?>

            <?php if(isset($_SESSION["company_username"]) ){ ?>
            <li><a href="all_vacancy.php"><i class="fa-solid fa-clipboard-list"></i>All Vacancy</a></li>
            <?php }?>




            



            <?php if(isset($_SESSION["company_username"]) ){ ?>
            <li><a href="applied_student.php"><i class="fa-solid fa-hand-pointer"></i>Applied student</a></li>
            <?php }?>








            <?php if( isset($_SESSION["student_username"])){ ?>
            <li><a href="applied_company.php"><i class="fa-solid fa-clipboard-list"></i>Applied Companies</a></li>
            <?php }?>

            <?php if( isset($_SESSION["student_username"])){ ?>
            <li><a href="all_company.php"><i class="fa-solid fa-clipboard-list"></i>All Companies</a></li>
            <?php }?>






            <?php if(isset($_SESSION["company_username"]) or isset($_SESSION["student_username"])){ ?>
            <li class="Status"><a href="" ><i class="fa-solid fa-user"></i> Status</a> <i class="fa-solid fa-angle-down company_status"></i></li>
            <?php }?>


            <?php if(isset($_SESSION["company_username"]) or isset($_SESSION["student_username"])){ ?>
            <li class="pending"><a href="pending.php"><i class="fa-solid fa-business-time"></i> Pending</a> </li>

            <?php } ?>
            <?php if(isset($_SESSION["company_username"]) or isset($_SESSION["student_username"])){ ?>
            <li class="pending"><a href="approved.php"><i class="fa-solid fa-circle-check"></i> Approved</a> </li>

            <?php } ?>
            <?php if(isset($_SESSION["company_username"]) or isset($_SESSION["student_username"])){ ?>
            <li class="pending"><a href="rejected.php"><i class="fa-solid fa-ban"></i> Rejected</a> </li>

            <?php } ?>


            <?php if(isset($_SESSION["company_username"]) or isset($_SESSION["student_username"])){ ?>
            <li><a href="http://localhost/campus/logout.php"><i class="fa-solid fa-arrow-right-from-bracket"></i>Logout</a></li>
            <?php }?>
        </ul>
    </div>
    <!--------successfully added---------->
<div class="succesfully_add">
    <p>succesfully Registered</p>

</div>

<!-----------script----------------->
    <script src="../jquery/jquery.js"></script>
    <script>
        $(document).ready(function(){
        let toggle=$(".toggle");
        let cross=$(".fa-xmark");
        let sub_menu=$(".sub_menu");
        let profile=$(".profile");
        let edit_profile=$(".edit_profile");
       let  categoryall=$(".categoryall");
       let view_category=$(".view_category");
       let company_status=$(".company_status");
       let pending=$(".pending");
       console.log(pending);

        
        profile.click(function(){
            
            edit_profile.toggleClass("edit_profile_active");
            profile.toggleClass("fa-chevron-up");
        });

        company_status.click(function(){
            
            
          
            company_status.toggleClass("fa-chevron-up");
            pending.toggleClass("edit_profile_deactive");
        });
        

        categoryall.click(function(){
            
            view_category.toggleClass("view_category_active");
            categoryall.toggleClass("fa-chevron-up");
        });



        let menu_container=$(".menu-container");
        toggle.click(function(){
            menu_container.addClass("menu-active");
        });
        cross.click(function(){
            menu_container.removeClass("menu-active");
        });
    }
        );
    </script>
</body>
</html>