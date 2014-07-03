<?php include_once '../pg_connect.php'; ?>

<?php

if (isset($_GET['action']) && $_GET['action'] == 'delete') {

    $id = (int) $_GET['id'];

    $pgDelete = 'DELETE  FROM categorias where cate_id = :id';


    try {

        $delete = $db->prepare($pgDelete);
        $delete->bindValue(':id', $id, PDO::PARAM_INT);
        $delete->execute();
    } catch (PDOexception $error) {
        echo $error->getMessage();
    }
}

header("Location:cateList.php");
?>





