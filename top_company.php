<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/campus.css">
    <?php
    include "head.php";
    ?>
</head>
<body>
<?php
    include "header.php";
    ?>



<!-----------post-container-------------->

<h2 class="recent-heading"> 
    <span>T</span> 
    <span>O</span>
    <span>P</span>
    &nbsp;
    <span>C</span>
    <span>O</span>
    <span>M</span>
    <span>P</span> 
    <span>A</span> 
    <span>N</span> 
    <span>Y</span>   
    </h2>


    <?php  
    $company_id=$_GET['id'];
             $con=mysqli_connect("localhost","root","","campus") or die("<script>alert('connection error')</script>");
             $sql1="select * from category";
             $result1=mysqli_query($con , $sql1);
              mysqli_num_rows($result1);
             if(mysqli_num_rows($result1)>0){ ?>
            <form action="<?php $_SERVER['PHP_SELF']?>" method="post" class="category_form">
            <Select name="category">
                <option selected disabled value="6"> Select Category</option>
                
            
            
                <?php while( $row1=mysqli_fetch_assoc($result1)){  ?>
            <option value="<?php echo $row1['category_id'];?>"><?php echo $row1['category_name'];?></option>

            <?php } ?>


                </select>
                <input type="submit" name="submit">
                </form>

            <?php }
            
            
           if(isset($_POST['submit'])){

            if(empty($_POST['category'])){
                $categoryall="";
            }
            else{
              $category=$_POST['category'];
              $categoryall="AND category.category_id={$category}";
            }
            }
            else{
                
                $categoryall="";
            }
            ?>
 

       


<div class="Post-container">
        

        <?php
    $con=mysqli_connect("localhost","root","","campus") or die("<script>alert('connection error')</script>");
    $sql="SELECT * FROM vacancy 

    INNER JOIN category ON vacancy.vacancy_category_name=category.category_id
    INNER JOIN company ON vacancy.company_name = company.id where id={$company_id} $categoryall ORDER BY post_id DESC 
   
";
$result= mysqli_query($con , $sql)or die("query failed");
if(mysqli_num_rows($result)>0){
    while($row=mysqli_fetch_assoc($result)){

    ?><div class="single-post">
            <div class="post-image">
                <img src="dashboard/upload/<?php echo $row['logo'];?>" >
            </div>
            <div class="post-content">
            <h2 class="job-role"><a href="single_post.php?id=<?php echo $row['Post_id']?>"><?php echo $row['Post_title']?></a></h2>
                <p class="company-name"><?php echo $row['name']?></p>
                <div class="post-description">
                    <i class="fa-solid fa-user"></i>
                    <p> <?php echo $row['no_of_opening']?></p>
                    <i class="fa-solid fa-briefcase"></i>
                    <p>  <?php echo $row['monthly_salary']?></p>
                    <i class="fa-solid fa-location-dot"></i>
                    <p> <?php echo $row['job_location']?></p>
                    <i class="fa-solid fa-calendar"></i>
                    <p><?php echo $row['post_date']?></p>

                </div>
            </div>
            <a href="single_post.php?id=<?php echo $row['Post_id']?>" class="details"> Details</a>
        </div>
        <?php }  } ?>


      
    
    </div>











<?php
    include "footer.php";
    ?>
    
</body>
</html>