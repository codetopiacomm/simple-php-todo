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
        <h1 class="todo__head">Todo App</h1>
        <form method="" action="" class="todo__form">
            <input type="text" class="todo__label" id="todo__add">
            <button class="todo__add">Add Todo</button>
        </form>
        <div class="todo__todos">
            <ul class="todo__list">
                <li class="todo__item">
                  <p class="todo__text">I am here now</p>     
                  <div class="todo__buttons">
                    <a href="">
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
                        date created - 12/2/43
                    </span>
                    <span class="last-modified"> 
                        last modified - 23/2/34
                    </span>
                  </p>
                </li>
            </ul>
        </div>
    </div>
</body>
</html>