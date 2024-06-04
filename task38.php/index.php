<?php 
  require 'classes/Database.php';
  require 'classes/User.php';

  $database = new Database();
  $conn = $database->getdb(); 
  
  if ( $_SERVER['REQUEST_METHOD'] == "POST"  ){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if ( User::createOne( $conn , $name , $email , $password ) ){
        echo "<p class='text-center text-success border border-success'> Created Successfully </p> ";
      }

  } 
  


  $users = User::showAll( $conn );
  
  
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
                <div class="col border border-success" style="height : 400px">
                    <h3 class="my-3 text-center text-success">Create New User</h3>
                    <form action="" method="POST">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="User Name">
                        </div>
                        
                        <div class="mb-3">
                            <label for="exampleFormControlInputE" class="form-label">Email address</label>
                            <input type="email" name="email" class="form-control" id="exampleFormControlInputE" placeholder="name@example.com">
                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlInputP" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="exampleFormControlInputP" placeholder="********">
                        </div>

                        <div class="mb-3">
                            <input type="submit" class="btn btn-success form-control" value="Create">
                        </div>
                        
                    </form>
                </div>

                <!-- Column for table to show all data -->
                <div class="col">
                    <h3 class="my-3 text-center">My Entire Data</h3>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Password</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ( $users as $user ) : ?>
                            <tr>
                                <th scope="row"> <?= $user['id'] ?> </th>
                                <td> <?= $user['name'] ?> </td>
                                <td><?= $user['email'] ?></td>
                                <td><?= $user['password'] ?></td>
                                <td > <a class="text-primary" href="update.php?id=<?= $user['id'] ?>">Edit</a>    </td>
                                <td > <a class="text-danger" href="delete.php?id=<?= $user['id'] ?>">Del</a> </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>