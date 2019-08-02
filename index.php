<?php

require_once('Models/Todo.php');

// DBからデータを取得する

// インスタンスを$todoという変数に代入
// インスタンス化 === new クラス名()
$todo = new Todo();

// 変数の中身を確認したい時
// echo '<pre>';
// var_dump($todo);
// exit;

// DBからデータを取得して、$tasksという変数に代入
// DBからデータを取得 === TodoクラスのインスタンスのgetAllメソッドを実行
$tasks = $todo->getAll();

echo '<pre>';
var_dump($tasks);
exit;


