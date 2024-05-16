<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/add_category.css">
</head>
<body>


<?php include "header.php"; ?>
<?php if(isset($_POST['submit']))
{
    $con=mysqli_connect("localhost","root","","campus") or die("<script>alert('connection error')</script>");

    $category_name=$_POST['category_name'];
    $sql1="INSERT INTO category( category_name) VALUES ('{$category_name}')";
    if(mysqli_query($con , $sql1)or die("query failed")){
        echo"
        <script src='jquery/jquery.js'></script>
    
     <script > 
     $( document ).ready(function() {
         
         
        let succesfully_add=$('.succesfully_add');
        let para=$('.succesfully_add p');
        
        para.text('Category Successfully Updated');
        
        succesfully_add.addClass('active_reg');
    
    
        setTimeout(none, 3000);
        function none(){
         succesfully_add.removeClass('active_reg');
        }
    });
        </script>
       ";
    }
    ;
}
?>
 
    <div class="form_container">
    <h2>Add Category</h2>
    <form action="<?php $_SERVER['PHP_SELF']?>" method="post">
        
           
            
                <input type="text" name="category_name"  value="" id="adm-reg_name" placeholder="Enter Category Name" required>
               
                
                
                <input type="submit" name="submit" value="submit">
            </form>
            </div>
            
            
            <?php

$con=mysqli_connect("localhost","root","","campus") or die("<script>alert('connection error')</script>");
if(isset($_GET['page'])){
$page=$_GET['page'];
}
else{
    $page=1;
}
$limit=5;
$offset=($page-1)*$limit;
    $con=mysqli_connect("localhost","root","","campus") or die("<script>alert('connection error')</script>");
    $sql="SELECT * FROM category ORDER BY category_id DESC LIMIT {$offset},{$limit}";
    $result= mysqli_query($con , $sql)or die("query failed");
    if(mysqli_num_rows($result)>0){
     
    ?>
            <table  cellspacing="0px";>
                <tr>
            <th>Category ID </th>
            <th>Category </th>
            <th>Total Post</th>
            <th>edit </th>
            <th>Delete</th>
                <tr>
           <?php    
         while($row=mysqli_fetch_assoc($result)){
    ?>
                <tr>
            <td ><?php echo $row['category_id'];?> </td>
            <td><?php echo $row['category_name'];?></td>
            <td><?php echo $row['total_category'];?></td>
            <td><a href="edit_category.php?id=<?php echo $row['category_id'];?>"><i class="fa-solid fa-pen-to-square"></i></a></td>
            <td><a href="delete_category.php?id=<?php echo $row['category_id'];?>"><i class="fa-solid fa-trash-can"></i></a></td>

                <tr>
              <?php }  ?>
         </table>

         <?php
    $sql5="SELECT * FROM category ORDER BY category_id DESC";
    
     $result5=mysqli_query($con , $sql5)or die("query failed");
   if(mysqli_num_rows($result5)>$limit){
       $total=mysqli_num_rows($result5);
     
      $total_page=ceil($total/$limit);

    echo"<table> <tr class='pagination'>";
    for($i=1;$i<=$total_page;$i++){
        if($i==$page){
            $active="active_page";
        }
        else{
            $active="";
        }
        echo"<td><a href='add_category.php?page=$i'class='$active'>$i</a></td>";
    }
    echo"</tr></table>";
   }
    
    ?>

         <?php  }
         else{echo "<h2 style='color:black; text-align:center ; margin-top:20px'>No dcategory found</h2>";}
         ?>
</body>
</html>