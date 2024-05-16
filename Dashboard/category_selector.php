<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="css/category_selector.css">
</head>
<body>
<?php  
             $con=mysqli_connect("localhost","root","","campus") or die("<script>alert('connection error')</script>");
             $sql="select * from category";
             $result=mysqli_query($con , $sql);
              mysqli_num_rows($result);
             if(mysqli_num_rows($result)>0){ ?>
            <form action="<?php $_SERVER['PHP_SELF']?>" method="post" class="category_form">
            <Select name="category">
                <option selected disabled value="6"> Select Category</option>
                
            
            
                <?php while( $row=mysqli_fetch_assoc($result)){  ?>
            <option value="<?php echo $row['category_id'];?>"><?php echo $row['category_name'];?></option>

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
              $categoryall="where category.category_id={$category}";
            }
            }
            else{
                
                $categoryall="";
            }
            ?>
</body>
</html>