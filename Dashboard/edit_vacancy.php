<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/edit_vacancy.css">
</head>
<body>
    <?php
    include "header.php";
    ?>
    <?php
    $post_id=$_GET['id'];
    $con=mysqli_connect("localhost","root","","campus") or die("<script>alert('connection error')</script>");
    $sql1="SELECT * FROM vacancy 
    INNER JOIN category ON vacancy.vacancy_category_name=category.category_id
    INNER JOIN company ON vacancy.company_name = company.id 
     WHERE post_id ='{$post_id}'";
     $result1= mysqli_query($con , $sql1)or die("query failed");

     $post_date=date("d-m-Y");
     
     
 
     if(mysqli_num_rows($result1)>0){
         while($row1=mysqli_fetch_assoc($result1)){
    ?>
    <form action="edit_vacancy_action.php" method="post" enctype="multipart/form-data">
        <h2>Update Vacancy</h2>

            <input type="text" name="id"  value="<?php echo $post_id ; ?>" disabled>
            <input type="text" name="id"  value="<?php echo $post_id ;?>" hidden>
            
                <input type="text" name="Title" value="<?php echo $row1['Post_title'] ;?>"  placeholder="Title" required>
               
               
                <input type="text" name="salary" value="<?php echo $row1['monthly_salary'] ;?>"   placeholder="salary" required>
                
                <input type="text" name="description" value="<?php echo $row1['job_description'] ;?>"placeholder="description" required>


                
                <input type="text" name="opening" value="<?php echo $row1['no_of_opening'] ;?>"  placeholder="no. of opening" required>

                

                <input type="text" name="job_location" value="<?php echo $row1['job_location'] ;?>"  placeholder="job Location" required>
                <input type="text" name="experience" value="<?php echo $row1['experience'] ;?>"  placeholder="experience" required>
                <input type="text" name="time" value="<?php echo $row1['time'] ;?>"  placeholder="time" required>

                <input type="text" name="post_date" value="<?php echo $post_date ;?>"   placeholder="Update Date" disabled required>
                <input type="text" name="post_date" value="<?php echo $post_date ;?>"   placeholder="Update Date" hidden required>
                
                <input type="date" name="apply_date" value="<?php echo $row1['apply_date'] ;?>"   placeholder="Apply Date" required>
                <input type="date" name="last_date"  value="<?php echo $row1['last_date'] ;?>" placeholder="Last Date" required>
                

                
                <div class="file">
                <label for="adm-reg-file" class="label">Post Image&nbsp;</label>
                <input type="file" name="company_file"  id="adm-reg-file" >
                <input type="hidden" name="old_company_file" value="<?php echo $row1['post_image'] ;?>"  >
                </div>
                
                <?php  
             $sql="select * from category";
             $result=mysqli_query($con , $sql);
              mysqli_num_rows($result);
             if(mysqli_num_rows($result)>0){ ?>
             <div class="category_container">
            <label for ="category"> Category : </label>
            <Select name="category">
                
                <?php while( $row=mysqli_fetch_assoc($result)){ 
                    
                   
                    
                    if($row1['vacancy_category_name'] == $row['category_id']){
                        $selected="selected";
                        
                    }
                    else{
                        $selected="";
                    }

                
                  echo "<option {$selected} value='{$row['category_id']}'>{$row['category_name']}</opyion>";
                    
                }
                    ?>

                    
          

           


                </select> 
                </div>

            <?php }?>
                
                <input type="submit" name="submit" value="update">
            </form>

            <?php } } ?>
</body>
</html>