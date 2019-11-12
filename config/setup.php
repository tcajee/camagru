<?php
    include("database.php");

    function execute($sql, $pdo){
        try {
            $db = $pdo->prepare($sql);
            $db->execute();
        } catch(PDOException $e) {
            die($e->getMessage());
        }
    }

    foreach ($statements as $statement) {
        execute($$statement, $pdo);
    }