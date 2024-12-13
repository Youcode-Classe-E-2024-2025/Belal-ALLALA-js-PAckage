<?php
    require_once '../../../config/database.php';
    $id = $_GET['id'];
    $sqlCollaboration = $pdo->prepare('DELETE FROM collaborations WHERE author_id = ?');
    $sqlCollaboration->execute([$id]);
    $sqlState = $pdo->prepare('DELETE FROM authors WHERE id=?');
    $supprime = $sqlState->execute([$id]);
    header('location:../author.php')
?>