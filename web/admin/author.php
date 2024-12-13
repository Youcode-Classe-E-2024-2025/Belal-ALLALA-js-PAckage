<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <title>Authors</title>
</head>

<body>

    <?php 
        require_once '../../config/database.php';
        include 'php/nav.php';
    ?>

    <div class="container py-2">

    <?php 
        if(isset($_POST['ajouter'])){
            $name=$_POST['name'];
            $email=$_POST['email'];

            if(!empty($name) && !empty($email)){
                $sqlState=$pdo->prepare('INSERT INTO authors (name, email) VALUES (?,?)');
                $sqlState->execute([$name,$email]);
                ?>
                    <div class="alert alert-success" role="alert">
                        l'author est ajouter avec succée
                    </div>
                <?php
            }else{
                ?>
                    <div class="alert alert-danger" role="alert">
                        le nom et l'email sont obligatoire!
                    </div>
                <?php
            }
        }
    ?>
    <h4>Ajouter un author</h4>
    <form method='post'>

        <div class="mb-3">
            <label class="form-label">Le nom de l'author</label>
            <input type="text" class="form-control" name='name'>
        </div>

        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">email de l'author</label>
            <input type="email" class="form-control" name='email'>
        </div>
        <button type="submit" class="btn btn-primary" name='ajouter'>Ajouter</button>
    </form>
    </div>
    <div class="container py-2">
        <h4>TABLEAU DES AUTHORS</h4>
        <?php
            $authors = $pdo->query('SELECT * FROM authors')->fetchAll(PDO::FETCH_ASSOC);
        ?>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Opérations</th>
            </tr>
            </thead>
            <tbody>
                <?php 
                    foreach($authors as $author){
                        ?>
                        <tr>
                            <td><?php echo $author['id'] ?></td>
                            <td><?php echo $author['name'] ?></td>
                            <td><?php echo $author['email'] ?></td>
                            <td>
                            <a href="php/modifier_author.php?id=<?php echo $author['id'] ?>" class="btn btn-primary btn-sm" >Modifier</a>
                            <a href="php/delete_author.php?id=<?php echo $author['id'] ?>" onclick="return confirm('Vouler vous vraiment supprimer le author <?php echo $author['name'] ?>')" class="btn btn-danger btn-sm" >Supprimer</a>
                            </td>
                        </tr>
                        <?php
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>