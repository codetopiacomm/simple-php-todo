<?php require("database.php");
session_start();
global $connection;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
</head>
<body>
    <div class="todo">
        <p>
            <?php 
              echo isset($_SESSION['success']) ? $_SESSION['success'] : "";
            unset($_SESSION['success']);
            ?>
        </p>
        <h1 class="todo__head">Todo App</h1>
        <form method="POST" action="./add-todo.php" class="todo__form"> 
            <input type="text" class="todo__label" id="todo__add" name="todo-text">
            <button class="todo__add" type="submit" name="add-todo">Add Todo</button>
        </form>
        <div class="todo__todos"> 
            <?php
            $sql = "SELECT * FROM todos"; 
            $result = $connection->query($sql);
            $todos = $result->fetchAll();
            ?>
            <ul class="todo__list">
                <?php 
                if (!$todos):
                    echo "<p style='margin-top: 10px'>No Todos</p>";
                else: 
                    foreach ($todos as $todo): ?>
                  
                <li class="todo__item">
                  <p class="todo__text"><?php echo $todo->content ?></p>     
                  <div class="todo__buttons">
                    <a href="./index.php?edit&id=<?php echo $todo->id ?>">
                    <button class="edit">
                       <i class="fa-sharp fa-solid fa-pen"></i>
                    </button>
                    </a>
                   <a href="">
                    <button class="complete">
                       <i class="fa-sharp fa-solid fa-check"></i>
                    </button>
                   </a>
                    <a href="">
                        <button class="delete">
                           <i class="fa-solid fa-trash"></i>
                       </button>
                    </a>
                    
                  </div>
                  <p class="dates">
                    <span class="date-created">
                        date created - <?php echo $todo->date_created ?>
                    </span>
                    <span class="last-modified"> 
                        last modified - <?php echo $todo->date_modified ?>
                    </span>
                  </p>
                </li>
                <?php endforeach; endif; ?>
            </ul>
        </div>
    </div>
</body>
</html>