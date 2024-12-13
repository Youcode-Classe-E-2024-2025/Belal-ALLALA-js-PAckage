<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <title>package</title>
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
            $description=$_POST['description'];

            if(!empty($name) && !empty($description)){
                $sqlState=$pdo->prepare('INSERT INTO packages (name, description) VALUES (?,?)');
                $sqlState->execute([$name,$description]);
                ?>
                    <div class="alert alert-success" role="alert">
                        le package est ajouter avec succée
                    </div>
                <?php
            }else{
                ?>
                    <div class="alert alert-danger" role="alert">
                        username et password sont obligatoire!
                    </div>
                <?php
            }
        }
    ?>
    <h4>Ajouter un Packages</h4>
    <form method='post'>

        <div class="mb-3">
            <label class="form-label">Le nom de package js</label>
            <input type="text" class="form-control" name='name'>
        </div>

        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Description</label>
            <textarea class="form-control" name="description"></textarea>
        </div>
        <button type="submit" class="btn btn-primary" name='ajouter'>Ajouter</button>
    </form>
    </div>
    <div class="container py-2">
        <h4>TABLEAU DES PACKAGES</h4>
        <?php
            $packages = $pdo->query('SELECT * FROM packages')->fetchAll(PDO::FETCH_ASSOC);
        ?>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Packages</th>
                <th>Description</th>
                <th>Opérations</th>
            </tr>
            </thead>
            <tbody>
                <?php 
                    foreach($packages as $package){
                        ?>
                        <tr>
                            <td><?php echo $package['id'] ?></td>
                            <td><?php echo $package['name'] ?></td>
                            <td><?php echo $package['description'] ?></td>
                            <td>
                            <a href="php/modifier_package.php?id=<?php echo $package['id'] ?>" class="btn btn-primary btn-sm" >Modifier</a>
                            <a href="php/delete_package.php?id=<?php echo $package['id'] ?>" onclick="return confirm('Vouler vous vraiment supprimer le package <?php echo $package['name'] ?>')" class="btn btn-danger btn-sm" >Supprimer</a>
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