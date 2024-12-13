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
        include 'nav1.php' ;
    ?>
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
                        </tr>
                        <?php
                    }
                ?>
            </tbody>
        </table>
    </div>

</body>

</html>