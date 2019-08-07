<?php
require_once('Models/Todo.php');
//入力されたデータを変数taskに保存
$task_name = $_POST['task'];
$id = $_POST['id'];
//Todoクラスをインスタンス化
$todo = New Todo;
//Todoクラスのcreateメソッドを実行
$todo->update($task_name, $id);
//index.phpに戻る
header('Location: index.php');