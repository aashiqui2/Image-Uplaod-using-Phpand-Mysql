<?php  
require_once 'operation.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Upload</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" >
</head>
<body>
    <h1 class="text-center text-primary my-5">Registration Form</h1>
    <div class="container d-flex justify-content-center">
        <form action="display.php" class="w-50" method="post" enctype="multipart/form-data">

        <?php  

        //placeholder,name,type,value
        inputfields("username","name","text","");
        inputfields("Mobile","mobile","text","");
        inputfields("","file","file","");
        
        ?>
        <button class="btn btn-dark" type="submit" name="submit">Submit</button>


            <!-- <div class="form-group my-4">
                <input type="text" name="name" placeholder="Enter Your Username" class="form-control">
            </div>
            <div class="form-group my-4">
                <input type="text" name="Mobile" placeholder="Enter Your Mobile" class="form-control">


            </div> -->
        </form>
    </div>
    
</body>
</html>