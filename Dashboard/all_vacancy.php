<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/all_vacancy.css">
</head>
<body>
    <div class="body_container">
    <?php
    include "header.php";
    ?>
    <h2> Company Vacancy</h2>


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

$company_id=$_SESSION["company_id"];

if(isset($_GET['page'])){
    $page=$_GET['page'];
        }
        else{
            $page=1;
        }
        $limit=3;
        $offset=($page-1)*$limit;
   
   
   
$sql="SELECT * FROM vacancy 

INNER JOIN category ON vacancy.vacancy_category_name=category.category_id
INNER JOIN company ON vacancy.company_name = company.id 
where company.id={$company_id} {$categoryall} ORDER BY post_id DESC  LIMIT {$offset},{$limit}

";
$result= mysqli_query($con , $sql)or die("query failed");
if(mysqli_num_rows($result)>0){
    ?>
    <table border="1px solid rgb(38, 38, 38)" cellspacing="0px">
        <thead>
            <tr>
                <th>Job Title</th>
                <th>Company Name</th>
                <th>Category</th>
                <th>Salary</th>
                <th>No. of Opening</th>
                <th>Time</th>
                <th>Apply Date</th>
                <th>Last Date </th>
                <th>Aplied Student </th>
                <th>View Students </th>
                <th>Update </th>
                <th>Delete </th>
            </tr>
        </thead>
        <tbody>
        <?php
    
        while($row=mysqli_fetch_assoc($result)){
            $post_date=date("d-m-Y");
     ?>
        <tr>
                <td><?php echo $row['Post_title'] ;?></td>
                <td><?php echo $row['name'] ;?></td>
                <td><?php echo $row['category_name'] ;?></td>
                <td><?php echo $row['monthly_salary'] ;?></td>

                <td><?php echo $row['no_of_opening'] ;?></td>

                <td><?php echo $row['time'] ;?></td>
                <td><?php echo $row['apply_date'] ;?></td>
                <td><?php echo $row['last_date'] ;?></td>
                <td><?php echo $row['applied_student'] ;?></td>

                <td ><a href="view_student.php?id=<?php echo $row['Post_id'];?>"><i class="fa-solid fa-arrow-up-right-from-square"></i></a></td>
                
                <td ><a href="edit_vacancy.php?id=<?php echo $row['Post_id'];?>"><i class="fa-solid fa-pen-to-square"></i></a></td>
                <td ><a href="delete_vacancy.php?id=<?php echo $row['Post_id'];?>&cat_id=<?php echo $row['category_id'];?>"><i class="fa-solid fa-trash-can"></i></a></td>
            </tr>
            <?php }
        
        }
        else{echo "<h2 style='color:black; text-align:center ; margin-top:20px'>No data found</h2>";}
        ?>
        </tbody>

    
    </table>

    <?php
    $sql5="SELECT * FROM vacancy 

    INNER JOIN category ON vacancy.vacancy_category_name=category.category_id
    INNER JOIN company ON vacancy.company_name = company.id 
    where company.id={$company_id} {$categoryall}";
    
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
        echo"<td><a href='all_vacancy.php?page=$i'class='$active'>$i</a></td>";
    }
    echo"</tr></table>";
   }
    
    ?>
    </div>
    
</body>
</html>