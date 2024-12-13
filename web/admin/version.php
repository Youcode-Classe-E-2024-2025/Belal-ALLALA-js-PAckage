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
            $package=$_POST['package'];
            $version=$_POST['version'];
            $date = date('Y-m-d');

            if(!empty($package) && !empty($version)){
                $sqlState=$pdo->prepare('INSERT INTO versions (version_number, package_id, release_date) VALUES (?,?,?)');
                $sqlState->execute([$version,$package,$date]);
                ?>
                    <div class="alert alert-success" role="alert">
                        la version est ajouter avec succée
                    </div>
                <?php
            }else{
                ?>
                    <div class="alert alert-danger" role="alert">
                        tout les champs sont obligatoire sont obligatoire!
                    </div>
                <?php
            }
        }
    ?>
    <h4>Ajouter une version</h4>
    <form method='post'>

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

        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">entrer le nombre de la version</label>
            <input type="text" class="form-control" name="version"></input>
        </div>
        <button type="submit" class="btn btn-primary" name='ajouter'>Ajouter</button>
    </form>
    </div>
    <div class="container py-2">
        <h4>TABLEAU DES VERSIONS</h4>
        <?php
            $versions = $pdo->query("SELECT versions.*, packages.name AS 'package' FROM versions INNER JOIN packages ON versions.package_id = packages.id")->fetchAll(PDO::FETCH_ASSOC);
        ?>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>package</th>
                <th>version</th>
                <th>date de creation</th>
                <th>Opérations</th>
            </tr>
            </thead>
            <tbody>
                <?php 
                    foreach($versions as $version){
                        ?>
                        <tr>
                            <td><?php echo $version['id'] ?></td>
                            <td><?php echo $version['package'] ?></td>
                            <td><?php echo $version['version_number'] ?></td>
                            <td><?php echo $version['release_date'] ?></td>
                            <td>
                                <a href="php/modifier_version.php?id=<?php echo $version['id'] ?>" class="btn btn-primary btn-sm" >Modifier</a>
                                <a href="php/delete_version.php?id=<?php echo $version['id'] ?>" onclick="return confirm('Vouler vous vraiment supprimer la version <?php echo $version['version_number'] ?>')" class="btn btn-danger btn-sm" >Supprimer</a>
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