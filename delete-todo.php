<?php require("database.php");
 global $connection;
session_start();

$location = $_SERVER['HTTP_REFERER'];

if (!isset($_GET["delete"]) && !isset($_GET["id"]) && empty($_GET["id"])) {
    header("Location: $location");
} else {
    $todo_id = $_GET["id"];

    try {
        $sql = "DELETE FROM todos WHERE id = :id";
        $stmt = $connection->prepare($sql);
        $stmt->execute([
            ":id" => $todo_id
        ]);
        if ($stmt->rowCount() > 0) {
            $_SESSION["success"] = "Todo deleted successfully";
        } else {
            $_SESSION["success"] = "Todo deletion failed";
        }
    } catch (PDOException $e) {
        $_SESSION['success'] = $e->getMessage();
    }
    header("Location: $location");
}