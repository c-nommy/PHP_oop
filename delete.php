<?php
require_once('Models/Todo.php');
$id = $_GET['id'];
//Todoクラスをインスタンス化
$todo = New Todo;
//Todoクラスのcreateメソッドを実行
$res = $todo->delete($id);
echo json_encode($res);
exit();