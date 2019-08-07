<?php
    require_once('function.php');
    require_once('Models/Todo.php');
    //Todoクラスのインスタンス化
    $todo = new Todo();
    //DBからデータを全件取得
    $tasks = $todo->getAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TODO APP</title>
    <link rel="stylesheet" href="assets/css/reset.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <header class="px-5 bg-primary">
        <nav class="navbar navbar-dark">
            <a href="index.php" class="navbar-brand">TODO APP</a>
            <div class="justify-content-end">
                <span class="text-light">
                    SeedKun
                </span>
            </div>
        </nav>
    </header>
    <main class="container py-5">

        <section>
            <form class="form-row">
                <div class="col-12 col-md-9 py-2">
                <input type="text" name="task" class="form-control" placeholder="ADD TODO"></div>
                <div class="py-2 col-md-3 col-12">
                    <button class="col-12 btn btn-primary btn-block" id="js-add-task">ADD</button>
                </div>
            </form>
        </section>

        <section class="mt-5">
          <table class="table table-hover">
              <thead>
                <tr class="bg-primary text-light">
                    <th class=>TODO</th>
                    <th>DUE DATE</th>
                    <th></th>
                    <th></th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($tasks as $task): ?>
                    <tr id="js-task-<?php echo h($task['id']); ?>">
                        <td><?php echo h($task['name']); ?></td>
                        <td><?php echo h($task['due_date']); ?></td>
                        <td>
                            <a class="text-success" href="edit.php?id=<?php echo h($task['id']); ?>">EDIT</a>
                        </td>
                        <td>
                            <a class="text-danger" id="js-delete-btn-<?php echo h($task['id']) ?>" href="">DELETE</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
              </tbody>
          </table>  
        </section>
    </main>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="assets/js/app.js"></script>
</body>
</html>