<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <title>Connexion</title>
</head>
<body>
  <?php include 'php/nav.php' ?>
  <div class="container py-2">
    <?php
        if(isset($_POST['connexion'])){
            $username=$_POST['username'];
            $password=$_POST['password'];
            if(!empty($username) && !empty($password)){
                require_once '../config/database.php';
                $sqlState = $pdo->prepare('SELECT * FROM users
                                            WHERE username=? 
                                            AND password=?');
                $sqlState ->execute([$username,$password]);
                if($sqlState->rowCount()>=1){
                    if($username=="admin" && $password=="admin"){
                        header('location: admin/index.php');
                    }else{
                        header('location: php/user.php');
                    }
                }else{
                    ?>
                    <div class="alert alert-danger" role="alert">
                    username et password sont incorecte!
                    </div>
                  <?php 
                }
            }else{
                ?>
                  <div class="alert alert-danger" role="alert">
                  username et password sont obligatoire!
                  </div>
                <?php
            }
        }
    ?>
    <h4>Connexion</h4>
    <form method='post'>
      <div class="mb-3">
        <label class="form-label">Username</label>
        <input type="text" class="form-control" name='username'>
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" class="form-control" name='password'>
      </div>
      <button type="submit" class="btn btn-primary" name='connexion'>Connexion</button>
    </form>
  </div>
  
</body>
</html>