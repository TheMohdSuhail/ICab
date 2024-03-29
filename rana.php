<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Rana</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Get/Post</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/cwhphp/21_Get_Post.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Dropdown
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>
    <?php
          
      
      // Connecting to the Database
      $servername = "localhost";
      $username = "root";
      $password = "";
      $database = "car";


      $conn = mysqli_connect($servername, $username, $password, $database);

      if(isset($_POST['submit'])){
       
          $file = $_FILES['img1'];
          $file = $_FILES['img2'];
          $file = $_FILES['img3'];


    //     //   print_r($car_name);
    //     //   print_r($car_desc);
    //     //   print_r($file);
          
            $filename = $file['name'];
            $fileerror = $file['error'];
            $filepath = $file['tmp_name'];

              if($fileerror == 0){
                  $destinationfile1 = 'Upload/'.$filename;
                //   echo "$destinationfile";
                move_uploaded_file($filepath,$destinationfile1);
                  $destinationfile2 = 'Upload/'.$filename;
                //   echo "$destinationfile";
                move_uploaded_file($filepath,$destinationfile2);
                  $destinationfile3 = 'Upload/'.$filename;
                //   echo "$destinationfile";
                move_uploaded_file($filepath,$destinationfile3);

                $sql = "INSERT INTO `img` ( `img1`, `img2`, `img3`, `car_add_dt`) VALUES ('$destinationfile1','$destinationfile2','$destinationfile3', current_timestamp())";

                $result = mysqli_query($conn, $sql); 

                if($result){
                    echo "Inserted";
                }
                else{
                    echo "Not insert";
                }

              }
        }

?>

     <!-- inset item -->
    <div class="container mt-3">
        <h1>Contact us for your concerns</h1>
        <form action="/project/rana.php" method="post" enctype="multipart/form-data">
            
            <div class="form-group">
            
                <label for="email">Car Image1</label>
                <input type="file" name="img1" class="form-control" id="img1" aria-describedby="emailHelp">
                <label for="email">Car Image2</label>
                <input type="file" name="img2" class="form-control" id="img2" aria-describedby="emailHelp">
                <label for="email">Car Imag3e</label>
                <input type="file" name="img3" class="form-control" id="img3" aria-describedby="emailHelp">
            </div>

           <input type="submit" name="submit" value="Submit" class="btn btn-primary">

        </form>
    </div>

   

        

        <div class="container">
        <table class="table">
  <thead>
    <tr>
      <th scope="col">IMG 1</th>
      <th scope="col">IMG 2</th>
      <th scope="col">Image 3</th>
    </tr>
  </thead>
  <tbody>
  <?php 
      
        $sql = "SELECT * FROM `img`";
          $result = mysqli_query($conn, $sql);
          $sno = 0;
          while($row = mysqli_fetch_assoc($result)){
              ?>
          
<tr>


<td><img src="<?php echo $row['img1']; ?>" width="80" alt=""></td>
<td><img src="<?php echo $row['img2']; ?>" width="80" alt=""></td>
<td><img src="<?php echo $row['img3']; ?>" width="80" alt=""></td>

</tr>

       <?php       
          
        } 
          ?>
    </tbody>
</table>
        </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
</body>

</html>