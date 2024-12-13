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
        include 'nav1.php';
    ?>
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
                        </tr>
                        <?php
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>