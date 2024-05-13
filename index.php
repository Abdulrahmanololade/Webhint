<?php  
session_start();
include 'db/connect.php';

if(isset($_POST['submit'])){
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $matric_num = $_POST['matric_num'];
    $level = $_POST['level'];
    $date = date("y-m-d H:i:s");

    if(empty($fullname)){
        echo 'Fullname field cannot be empty';
    }
    elseif(empty($email)){
        echo 'Email field cannot be empty';
    }
    elseif(empty($matric_num)){
        echo 'Matric number field cannot be empty';
    }
    elseif(empty($level)){
        echo 'Level field cannot be empty';
    }
    else{
        $eqry = mysqli_query($conn, "SELECT * FROM `users` WHERE `email`='$email'");
        $mqry = mysqli_query($conn, "SELECT * FROM `users` WHERE `matric_num`='$matric_num'");
        if(mysqli_num_rows($eqry)>0){
            echo 'Email has been registered with, kindly register with another one';
        }
        elseif(mysqli_num_rows($mqry)>0){
            echo 'Matric number has been registered with, kindly register with another one';
        }
        else{
           $insert = mysqli_query($conn, "INSERT INTO `users` (`fullname`,`email`,`matric_num`,`level`,`sub_at`) 
           VALUES ('$fullname','$email','$matric_num','$level','$date')");

           if(empty($insert)){
            echo 'something went wrong while trying to process your form, try again or contact support';
           }
           else{
            echo 'Your form has been submitted successfully';
           }
        }
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="css/styles.css">

</head>
<body>

<ul class="navbar">
    <li><a href="index.php">Home</a></li>
    <li><a href="about.php">About</a></li>
    <li><a href="services.php">Services</a></li>
    <li><a href="blog.php">Blog</a></li>
    <li><a href="contact.php">Contact</a></li>
</ul>

  <!-- hero section -->
 <section id="hero">
    <div class="overlay"></div>
    <div class="content">
        <h1>Welcome to my website</h1>
        <p>the best laundry service</p>

        <a href="about.php" target="_blank">Learn more...</a>
    </div>
 </section>
 
<!-- hero section ends here -->

<section class="about">
    <div class="box">
        <img src="images/img5.jpg" alt="">
    </div>
    <div class="box">
        <h3>About Us</h3>
        <p>
        Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular
         during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.
        </p>
        <p>
        Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very 
        popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32. <a href="about.php">read more...</a>
        </p>
    </div>
</section>


<hr>

<section class="customer_review">
    <h3>Customers Review</h3>
    
    <div class="container">
        <!-- review div -->
        <div class="review">
            <!-- reviewer div -->
            <div class="reviewer">
                <img src="images/img1.jpg" alt="">
                <h4>Alex Kamla</h4>
            </div>
            <!-- reviewer div ends here -->
            <p class="comment">Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
            Lorem Ipsum has been the industry's standard dummy</p>
        </div>
        <!-- review div end here -->
    

        <!-- 2nd review start here -->
        <div class="review">
            <!-- 2nd reviewer start here -->
            <div class="reviewer">
                <img src="images/img2.jpg" alt="">
                <h4>Connor Cortana</h4>
            </div>
            <!-- 2nd reviewer ends here -->
            <p class="comment">It is a long established fact that a reader will be distracted by the readable content of a 
            page when looking at its layout.</p>
        </div>
        <!-- 2nd review ends here -->
      

        <!-- 3rd review start here -->
        <div class="review">
            <!-- 3rd reviewer start here -->
            <div class="reviewer">
               <img src="images/img1.jpg" alt="">
               <h4>Jadon Rashford</h4> 
            </div>
            <!-- 3rd reviewer ends here -->
            <p class="comment">There are many variations of passages of Lorem Ipsum available, 
            but the majority have suffered alteration in some form</p>
        </div>
        <!-- 3rd review ends here -->


    </div>
</section>

<!-- blog post -->
<section class="blog_post">
    <h4>Blog /News</h4>
    <div class="container">
    <div class="post">
        <img src="images/img6.jpg" alt="">
        <h2>Arsenal beats Chelsea</h2>
        <p>There are many variations of passages of Lorem Ipsum available, 
            but the majority have suffered alteration in some form</p>
    </div>
    <div class="post">
        <img src="images/img6.jpg" alt="">
        <h2>Arsenal beats Chelsea</h2>
        <p>There are many variations of passages of Lorem Ipsum available, 
            but the majority have suffered alteration in some form</p>
    </div>
    <div class="post">
        <img src="images/img6.jpg" alt="">
        <h2>Arsenal beats Chelsea</h2>
        <p>There are many variations of passages of Lorem Ipsum available, 
            but the majority have suffered alteration in some form</p>
    </div>
</div>
</section>





<form action="" method="post">
    <label for="">Fullname:</label> 
    <br>
    <input type="text" name="fullname" id="">
    <br>

    <label for="">Email:</label>
    <br>
    <input type="Email" name="email" id="">
    <br>

    <label for="">Matric_num:</label>
    <br>
    <input type="text" name="matric_num" id="">
    <br>

    <label for="">Level:</label>
    <br>
    <input type="number" name="level" id="">
    <br> <br>
    <button type="submit" name="submit">Submit</button>
</form>
    
</body>
</html>