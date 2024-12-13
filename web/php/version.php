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
        include 'nav1.php';
    ?>

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
                        </tr>
                        <?php
                    }
                ?>
            </tbody>
        </table>
    </div>

</body>
</html>