<?php
    require_once '../../../config/database.php';
    $id = $_GET['id'];
    $sqlcolla = $pdo->prepare('DELETE FROM collaborations WHERE id=?');
    $sqlcolla->execute([$id]);
    $sqlversion = $pdo->prepare('DELETE FROM versions WHERE id=?');
    $sqlversion->execute([$id]);
    $sqlState = $pdo->prepare('DELETE FROM packages WHERE id=?');
    $supprime = $sqlState->execute([$id]);
    header('location:../package.php')
?>