<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/applied_company.css">
</head>
<body>
    <div class="body_container">
    <?php
    include "header.php";
    ?>
    <h2>Applied Students</h2>
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
              $categoryall="AND  category.category_id={$category}";
            }
            }
            else{
                
                $categoryall="";
            }
            ?>
    
    <?php $con=mysqli_connect("localhost","root","","campus") or die("<script>alert('connection error')</script>");

$post_id=$_GET['id'];
 

if(isset($_GET['page'])){
    $page=$_GET['page'];
        }
        else{
            $page=1;
        }
        $limit=3;
        $offset=($page-1)*$limit;
   
   
   
 $sql="SELECT * FROM applied_student
INNER JOIN company ON applied_student.company_user = company.id 
INNER JOIN user ON applied_student.student_user=user.stu_id
INNER JOIN vacancy ON applied_student.post_id_all=vacancy.Post_id
INNER JOIN category ON applied_student.category_id_all=category.category_id

WHERE post_id={$post_id} {$categoryall} LIMIT {$offset},{$limit}



";
$result= mysqli_query($con , $sql)or die("query failed");
if(mysqli_num_rows($result)>0){
    ?>
    <table  cellspacing="0px">
        <thead>
            <tr>
            <th>student ID</th>
            <th>Student Name</th>
                <th>Job Title</th>
                <th>Company Name</th>
                <th>Category</th>
                <th>Apply date</th>
                <th>Status</th>
                <th>Message</th>


                <th>Details</th>

            </tr>
        </thead>
        <tbody>
        <?php
    
        while($row=mysqli_fetch_assoc($result)){
            $post_date=date("d-m-Y");
     ?>
        <tr>
        <td><?php echo $row['stu_id'] ;?></td>
        <td><?php echo $row['student_name'] ;?></td>

                <td><?php echo $row['Post_title'] ;?></td>
                <td><?php echo $row['name'] ;?></td>
                <td><?php echo $row['category_name'] ;?></td>
                <td><?php echo $row['apply_post_date'] ;?></td>
                <td><?php echo $row['status'] ;?></td>
                <td><?php echo substr($row['message'] ,0,20). "...";?></td>


                
                <td ><a href="http://localhost/campus/dashboard/applied_student_detail.php?id=<?php echo $row['main_id'];?>"><i class="fa-solid fa-arrow-up-right-from-square"></i></a></td>
                
            </tr>
            <?php }
        
        }
        else{echo "<h2 style='color:black; text-align:center ; margin-top:20px'>No data found</h2>";}
        ?>
        </tbody>

    
    </table>

    <?php
    $sql5="SELECT * FROM applied_student
    INNER JOIN company ON applied_student.company_user = company.id 
    INNER JOIN user ON applied_student.student_user=user.stu_id
    INNER JOIN vacancy ON applied_student.post_id_all=vacancy.Post_id
    INNER JOIN category ON applied_student.category_id_all=category.category_id
    
    WHERE post_id={$post_id} {$categoryall}";
    
     $result5=mysqli_query($con , $sql5)or die("query failed");
   if(mysqli_num_rows($result5)>$limit){
       $total=mysqli_num_rows($result5);
     
      $total_page=ceil($total/$limit);

    echo"<table class='pagi'> <tr class='pagination'>";
    for($i=1;$i<=$total_page;$i++){
        if($i==$page){
            $active="active_page";
        }
        else{
            $active="";
        }
        echo"<td><a href='view_student.php?page=$i'class='$active'>$i</a></td>";
    }
    echo"</tr></table>";
   }
    
    ?>
    </div>
    
</body>
</html>