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
</body>
</html>