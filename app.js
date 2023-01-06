$(document).ready(function () {
  $(".complete").click(function () {
    let id = $(this).data("id");
    let textContainer = $(this).parents(".todo__item").children("p.todo__text");
    if (textContainer.hasClass("todo-done")) {
      $.ajax({
        method: "POST",
        url: "./status-change.php",
        data: {
          todoId: id,
          statusChange: true,
        },
        success: function ($res) {
          let data = JSON.parse($res);
          if (data.status) {
            //window.location.reload();
            $(".todo_todos").load(window.location.href + " .todo_todos");
          } else {
            alert(data.message);
          }
        },
      });
    } else {
      $.ajax({
        method: "POST",
        url: "./status-update.php",
        data: {
          todoId: id,
          statusUpdate: true,
        },
        success: function (response) {
          let data = JSON.parse(response);

          if (data.status) {
            textContainer.html(`<s>${textContainer.text()}</s>`);
            textContainer.addClass("todo-done");
          } else if (data.status == "updated") {
            alert(data.message);
          } else {
            alert(data.message);
          }
        },
      });
    }
  });
});
