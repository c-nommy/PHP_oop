<?php
require_once('Models/Todo.php');
//入力されたデータを変数taskに保存
$task = $_POST['task'];
//Todoクラスをインスタンス化
$todo = New Todo;
//Todoクラスのcreateメソッドを実行
$createdTaskId = $todo->create($task);
$task = $todo->get($createdTaskId);
echo json_encode($task);
exit();