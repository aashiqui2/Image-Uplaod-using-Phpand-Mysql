<?php  
include 'connect.php';
if(isset($_POST['submit'])){
$username=$_POST['name'];
$mobile=$_POST['mobile'];
$image=$_FILES['file'];//$_Files is  superglobal and an two dimentional assosiative array
// echo $username;
// echo "<br>";
// echo $mobile;
// echo "<br>";
// print_r($image);//to prin array use this function print_r();
// echo "<br>";
$imagefilename=$image['name'];
// print_r($imagefilename);
// echo "<br>";
$imagefileerror=$image['error'];
// print_r($imagefileerror);
// echo "<br>";
$imagetmpname=$image['tmp_name'];
// print_r($imagetmpname);
// echo "<br>";

$filenameseparate=explode('.',$imagefilename);
// print_r($filenameseparate);
// echo "<br>";
// $fileextensiom=strtolower($filenameseparate[1]);
// print_r($fileextensiom);
$fileextension=strtolower(end($filenameseparate));
// print_r($fileextension);


$extension=array('jpeg','jpg','png');
if(in_array($fileextension,$extension)){
    $uploadimage='images/'.$imagefilename;
    move_uploaded_file($imagetmpname,$uploadimage);
    $sql="insert into imageupload (name,mobile,image) values('$username','$mobile',' $uploadimage')";
    $result=mysqli_query($conn,$sql);
    if($result){
        echo '<div class="alert alert-success" role="alert">
      <strong>Success </strong> Data Inserted Succesfully
      </div>';

    }
    else{
        die(mysqli_error($conn));
    }

}

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Data</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" >
    <style>
      img{
        width: 200px;
      }
        
    </style>
</head>
<body>
    
    <button class="btn btn-primary mx-5 my-4"> <a href="index.php" class="text-light"> Add Image</a></button>
<h1 class="text-center my-4">User Data</h1>
<div class="container mt-5 d-flex  justify-content-center">
<table class="table table-bordered w-50 ">
  <thead class="table-dark">
    <tr>
      <th scope="col">Sno</th>
      <th scope="col">Username</th>
      <!-- <th scope="col">Mobile</th> -->
      <th scope="col">Image</th>
    </tr>
  </thead> 
  <tbody>
<?php  
$sql="select * from imageupload";
$result=mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($result)){
    $id=$row['id'];
    $username=$row['name'];
    $image=$row['image'];
    echo '<tr>
    <th scope="row">'.$id.'</th>
    <td>'.$username.'</td>
    <td><img src='.$image.' /></td>
   
  </tr>';

}




?>



    
    <!-- <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Larry</td>
      <td>the Bird</td>
      <td>@twitter</td>
    </tr> -->
  </tbody>
</table>

</div>

</body>
</html>