<?php
    include("head.php");
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="css/index.css">

</head>
<body>
    <?php
    include "header.php";
    ?>
    <!------image slider------>
    <div class="slide-container">

    <div class="slider">
        <img src="images/1.png">
        <div class="content-container">
            <h2> Analyst</h2>
            <p>For those of you who are not familiar with the Single Post Template yet, the single post determines the layout of your blog posts. Custom single post templates enable.....</p>
            <a href="single_post.php?id=22"> Apply Now</a>
        </div>
</div>
       
        <div class="slider">
        <img src="images/2.png">
        <div class="content-container">
            <h2> DNB Anaesthesia</h2>
            <p>Roles and Responsibilities Looking for MD/DNB Anaesthesia Location: Sount Mumbai Experience: MBBS + 0 to 2 yr Post PG Salary : As per year of experience ...</p>
            <a href="single_post.php?id=21"> Apply Now</a>
        </div>
        </div>
        <div class="slider">
        <img src="images/3.png">
        <div class="content-container">
            <h2> web developer</h2>
            <p>Graphic Designer Job Description We are seeking a new graphic designer to for Mumbai and Hyderabad location. You will be designing a wide variety of things across digital...</p>
            <a href="single_post.php?id=20"> Apply Now</a>
        </div>

         </div>
        <i class="fa-solid fa-angle-left arrow"  id="prev" ></i>
        <i class="fa-solid fa-angle-right arrow" id="next" ></i>
    </div>
    <!--------------category  wise Job------------->

    <h2 class="top"> Top Companies</h2>

    <div class="category_container">

        <div class="single_container container_1">
            <img src="images/5.png">
            <div class="image_content image_content_1">
                <h2> Web Perfecto</h2>
                <div>
                <a href="top_company.php?id=1">View</a>
</div>
            </div>

        </div>
        <div class="single_container container_2">
            <img src="images/6.png">
            <div class="image_content image_content_2">
                <h2> TCS</h2>
                <div>
                <a href="top_company.php?id=2">View</a>
</div>
            </div>

        </div>
        <div class="single_container container_3">
            <img src="images/7.png ">
            <div class="image_content image_content_3">
                <h2> Sun pharma</h2>
                <div>
                <a href="top_company.php?id=3">View</a>
</div>
            </div>

        </div>
    </div>


    <!-------------Recently add jobs------>

    
    <h2 class="recent-heading"> 
    <span>R</span> 
    <span>E</span>
    <span>C</span>
    <span>E</span>
    <span>N</span>
    <span>T</span>
     &nbsp;
    <span>J</span> 
    <span>O</span> 
    <span>B</span> 
    <span>S</span>   
    </h2>



    <div class="all-recent-Post-container">
    
    <div class="Post-container">
<?php
    $con=mysqli_connect("localhost","root","","campus") or die("<script>alert('connection error')</script>");
    $sql="SELECT * FROM vacancy 

    INNER JOIN category ON vacancy.vacancy_category_name=category.category_id
    INNER JOIN company ON vacancy.company_name = company.id ORDER BY post_id DESC LIMIT 4 
";
$result= mysqli_query($con , $sql)or die("query failed");
if(mysqli_num_rows($result)>0){
    while($row=mysqli_fetch_assoc($result)){
    ?>

        <div class="single-post">
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
                    <p> <?php echo $row['monthly_salary']?></p>
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



    <div class="right-images">

    <img src="images/9.png">
    <img src="images/10.png">
    <img src="images/11.png">
    </div>


</div>
   

<!----------why choose us--------------------->
<h2 id="heading"> Why Choose Us</h2>
<div class="choose">


    <div class="choose-container">
    <i class="fa-solid fa-chart-line"></i>
    <h3> Flexibility</h3>
    <p>we create custom solutions to maximize profitability for our candidates and perfect-fit opportunities for our workers.</p>
    </div>

    <div class="choose-container">
    <i class="fa-solid fa-hand-holding-medical"></i>


    <h3> Uncompromising quality</h3>
    <p>we know we are only as good as our last placement, so we seek to make every connection a perfect match.</p>
    </div>

    <div class="choose-container">
    <i class="fa-solid fa-chalkboard-user"></i>
    <h3> Local experience</h3>
    <p>we know the Indianapolis market. That means we uncover the best opportunities for our candidates and deliver the highest quality help for our clients.</p>
    </div>
</div>




<!----- hero saction------>
<div class="hero-section">
    <div class="hero-overlay">
        <h2>
            Get Your Dreams?
        </h2>
        <p>Are you looking for a new job, or starting to think about job hunting?</p>
        <a href="#"> Contact Us</a>
    </div>


</div>

<?php
    include "footer.php";
    ?>
 <!--javascript------>
<script src="jquery/jquery.js"></script>
    <script>
       $( document ).ready(function() {


        let container_1=$(".container_1");
        let container_2=$(".container_2");
        let container_3=$(".container_3");
        let image_content_1=$(".image_content_1");
        let image_content_2=$(".image_content_2");
        let image_content_3=$(".image_content_3");
        container_1.hover(function(){
            image_content_1.toggleClass("active_category");
        });
        container_2.hover(function(){
            image_content_2.toggleClass("active_category");
        });
        container_3.hover(function(){
            image_content_3.toggleClass("active_category");
        });
            
        let choose=$(".choose-container");
        choose.click(function(){
            
        choose[0].fadeIn();
        });

        let slider=$(".slider");
        
        flag=0;
        

        let prev=$("#prev");
        let next=$("#next");
       
       prev.click(function(){
            
            flag=flag-1;
           slide(flag);
        });
        next.click(function(){
            
            flag=flag+1;
           slide(flag);
        });
        window.setInterval(function () {
            
            flag=flag+1;
            slide(flag);
        },5000);
        slide(flag);
           

        function slide(num){
            if(num>=slider.length){
                flag=0;
                num=0;
            }
            else if(num<0){
                flag=slider.length;
                num=slider.length;
            }
            for(let y of slider){
                y.style.display="none ";
            }
            
            slider[num].style.display="block ";
        }
    
        
    });
    </script>
      
        
</body>
</html>