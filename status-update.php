<?php require('database.php');
ini_set("display_errors", 1);
global $connection;

if(!isset($_POST['statusUpdate']) && !isset($_POST['todoId'])){
    echo json_encode(
        array(
            "status" => false,
            "message" => "Status Update Failed"
        )
    );
} else {
    $todoId = $_POST['todoId'];
    $date_modified = date("j/n/Y h:i:s A");
    try {
        $sql = "UPDATE todos 
            SET complete_status = :status, date_modified = :date_modified 
            WHERE id = :id";
        $stmt = $connection->prepare($sql);
        $stmt->execute([
            ":status" => 1,
            ":id" => $todoId,
            ":date_modified" => $date_modified
        ]);

        if($stmt->rowCount() > 0) {
            echo json_encode(
                array(
                    "status" => true,
                    "message" => "Status Update Successful"
                )
            );
        } else {
            echo json_encode(
                array(
                    "status" => "updated",
                    "message" => "Status Already Updated!"
                )
            );
        }
    } catch(PDOException $e) {
        echo json_encode(
            array(
                "status" => false,
                "message" => $e->getMessage()
            )
        );
    }


}