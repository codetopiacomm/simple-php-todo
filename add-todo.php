<?php require("database.php");
ini_set("display_errors", 1);
global $connection;
session_start();

$location = $_SERVER['HTTP_REFERER'];

 if(isset($_POST["add-todo"])) {
    $todo_text = $_POST['todo-text'];

    $date_created = date('j/n/Y');
    $date_modified = date('j/n/Y');

    if (empty($todo_text) && $todo_text === "") {
        $_SESSION["success"] = "Todo Empty";
        header("Location: $location");
        exit;
    }

    try {
    $sql = "INSERT INTO todos 
           (content, date_created, date_modified) 
           VALUES 
           (:content, :date_created, :date_modified)";
    $stmt = $connection->prepare($sql);
    // $stmt->bindParam(":content", $todo_text);
    // $stmt->bindParam(":date_created", $date_created);
    // $stmt->bindParam(":date_modified", $date_modified);

    $stmt->execute([
        ":content" => $todo_text,
        ":date_created" => $date_created,
        ":date_modified" => $date_modified
    ]);
    if ($stmt->rowCount() >  0) {
            $_SESSION['success'] = "Todo added successfully";
    } else {
            $_SESSION['success'] = "Todo Not Added";
    }
      
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    header("Location: $location");

}