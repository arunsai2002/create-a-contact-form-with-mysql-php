<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="" enctype="multipart/form-data">
        <label>Full Name:</label><input type="text" name="name" ><br>
        <label>Phone Number:</label><input type="text" name="contact" ><br>
        <label>Email:</label><input type="email" name="email" ><br>
        <label>Subject:</label><input type="text" name="subject" ><br>
        <label>Message:</label><input type="text" name="message" ><br>
        <button type="submit" name="submit">submit</button>
    </form>

    <!--required is an html attribute to validate inputs-->

</body>
</html>

<!--form input validation using server request method-->
<?php
$name = $contact = $email = $subject = $message = "";
if(isset($_POST['submit'])){
    if($_SERVER['REQUEST_METHOD']=='POST'){
        if(empty($_POST['name'])){
            $name = "enter valid name"; 
            echo $name;
        }
        if(empty($_POST['contact'])){
            $contact = "enter valid contact no";  
            echo $contact;
        }
        if(empty($_POST['email'])){
            $email = "enter valid email id"; 
            echo $email;
        }
        if(empty($_POST['subject'])){
            $subject = "enter valid subject"; 
            echo $subject;
        }
        if(empty($_POST['message'])){
            $message = "enter valid message";  
            echo $message;
        }
    }
}
?>

<!--to print success message after form submit -->
<?php
if(isset($_POST['submit'])){
    if($_SERVER['REQUEST_METHOD']=='POST'){
        if(!empty($_POST['name']) && !empty($_POST['contact']) && !empty($_POST['email']) && !empty($_POST['subject']) && !empty($_POST['message'])){
            echo "success";
        }
    }
}
?>

<!--inserting data into mysql database -->
<?php
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    // $timestamp = CURRENT_TIMESTAMP();

    $headers = "MIME-Version:1.0"."\r\n";
    $headers  = "content-type:text\html;charset=UTF-8"."\r\n";
    mail("arunsainihith03@gmail.com",$subject,$message,$headers);
}

$conn = mysqli_connect("localhost","root","","contact");
//inserting data into table contact_form

$sql = "INSERT INTO `contact_form`(`name`, `contact`, `email`, `subject`, `message`) VALUES ('$name','$contact','$email','$subject','$message')";
mysqli_query($conn,$sql);
?>