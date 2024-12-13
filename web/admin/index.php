<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <title>Collaboration</title>
</head>

<body>
    
    <?php 
        require_once '../../config/database.php';
        include 'php/nav.php' ;
    ?>
    <div class="container py-2">
        <h4>Ajouter un collaboration</h4>
        <?php 
            if(isset($_POST['ajouter'])){
                $author=$_POST['author'];
                $package=$_POST['package'];

                if(!empty($author) && !empty($package)){
                    $sqlState=$pdo->prepare('INSERT INTO collaborations (author_id, package_id) VALUES (?,?)');
                    $sqlState->execute([$author,$package]);
                    ?>
                        <div class="alert alert-success" role="alert">
                            la collaboration est ajouter avec succée
                        </div>
                    <?php
                }else{
                    ?>
                        <div class="alert alert-danger" role="alert">
                            tout les champs sont obligatoire!
                        </div>
                    <?php
            }
        }
    ?>
        <form method='post'>

            <div class="mb-3">
                <?php
                    $authors = $pdo->query('SELECT * FROM authors')->fetchAll(PDO::FETCH_ASSOC);
                ?>
                <label class="form-label">Authors</label>
                <select class="form-select" aria-label="Default select example" name = "author">
                    <?php
                        foreach ($authors as $author){
                            echo "<option value='".$author['id']."'>".$author['name']."</option>";
                        }
                    ?>
                </select>
            </div>

            <div class="mb-3">
                <?php
                    $packages = $pdo->query('SELECT * FROM packages')->fetchAll(PDO::FETCH_ASSOC);
                ?>
                <label class="form-label">packages</label>
                <select class="form-select" aria-label="Default select example" name = "package">
                    <?php
                        foreach ($packages as $package){
                            echo "<option value='".$package['id']."'>".$package['name']."</option>";
                        }
                    ?>
                </select>
            </div>

            <button type="submit" class="btn btn-primary" name='ajouter'>Ajouter</button>
        </form>
    </div>
    <div class="container py-2">
        <h4>TABLEAU DES COLLABORATIONS</h4>
        <?php
            $collaborations = $pdo->query("SELECT 
                                        collaborations.id AS id, 
                                        authors.name AS author, 
                                        packages.name AS package
                                    FROM 
                                        collaborations
                                    INNER JOIN 
                                        authors 
                                    ON 
                                        collaborations.author_id = authors.id
                                    INNER JOIN 
                                        packages 
                                    ON 
                                        collaborations.package_id = packages.id;
                                    ")->fetchAll(PDO::FETCH_ASSOC);
        ?>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Packages</th>
                <th>Authors</th>
                <th>Opérations</th>
            </tr>
            </thead>
            <tbody>
                <?php 
                    foreach($collaborations as $collaboration){
                        ?>
                        <tr>
                            <td><?php echo $collaboration['id'] ?></td>
                            <td><?php echo $collaboration['package'] ?></td>
                            <td><?php echo $collaboration['author'] ?></td>
                            <td>
                                <a href="php/modifier_collaboration.php?id=<?php echo $collaboration['id'] ?>" class="btn btn-primary btn-sm" >Modifier</a>
                                <a href="php/delete_collaboration.php?id=<?php echo $collaboration['id'] ?>" onclick="return confirm('Vouler vous vraiment supprimer la collaboration d id <?php echo $collaboration['id'] ?>')" class="btn btn-danger btn-sm" >Supprimer</a>
                            </td>
                        <!-- </tr> -->
                        <?php
                    }
                ?>
            </tbody>
        </table>
    </div>

</body>

</html>