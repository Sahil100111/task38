
<?php 
  require 'classes/Database.php';
  require 'classes/User.php';

  $database = new Database();
  $conn = $database->getdb(); 
  
  $id = $_GET['id'];
  
  if (  $_SERVER['REQUEST_METHOD'] == "POST"  ){
     $name = $_POST['name'];
     $email = $_POST['email'];
     $password = $_POST['password'];
     
    if ( User::updateOne( $conn , $id , $name , $email , $password ) ){
        echo "<p class='text-center text-success border border-success'> Updated Successfully </p> ";
    } ;

  }

  $user = User::showOne( $conn , $id );
  
  
?>



<html>
    <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous" defer></script>
    </head>
    <body>
        <!-- we will have one form CREATE and one table READ here -->
        <div class="container">
            <div class="row">
                <!-- Column for form creation  -->
                <div class="col border border-primary" style="height : 400px">
                    <h3 class="my-3 text-center text-primary">Update <?= $user['name'] ?> User </h3>
                    <form action="" method="POST">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Name</label>
                            <input type="text" value="<?= $user['name'] ?>"  name="name" class="form-control" id="exampleFormControlInput1" placeholder="User Name">
                        </div>
                        
                        <div class="mb-3">
                            <label for="exampleFormControlInputE" class="form-label">Email address</label>
                            <input type="email" value=" <?= $user['email'] ?>" name="email" class="form-control" id="exampleFormControlInputE" >
                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlInputP" class="form-label">Password</label>
                            <input type="password" value=" <?= $user['password'] ?>" name="password" class="form-control" id="exampleFormControlInputP" placeholder="********">
                        </div>

                        <div class="mb-3">
                            <input type="submit" class="btn btn-primary form-control" value="Update">
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>