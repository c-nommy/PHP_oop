<?php

require_once('config/dbconnect.php');

// Todo
class Todo
{
    // プロパティ
    private $table = 'tasks';
    private $db_manager;

    // インスタンス化した時に呼ばれるメソッド
    public function __construct()
    {
        // db_managerプロパティは、
        // DbManagerクラスのインスタンス
        $this->db_manager = new DbManager();
        $this->db_manager->connect();
    }

    public function create($name)
    {
        // DBに保存
        // このクラスのインスタンスの
        // db_managerプロパティの
        // DbManagerクラスのインスタンス
        // dbhプロパティの
        // PDOのインスタンス
        // prepareメソッドを実行
        $stmt = $this->db_manager->dbh->prepare('INSERT INTO ' . $this->table . ' (name) VALUES (?)');
        $stmt->execute([$name]);
    }

    public function getAll()
    {

        //実行するSQLを準備
        $stmt = $this->db_manager->dbh->prepare('SELECT * FROM ' . $this->table .';');
        //準備してSQLを実行する
        $stmt->execute();
        //実行結果を取得する
        $task = $stmt->fetchAll();

        // return === 関数の呼び出し元に、値を返す
        return $task;
    }

    public function get($id)
    {

        //実行するSQLを準備
        $stmt = $this->db_manager->dbh->prepare('SELECT * FROM ' . $this->table .' WHERE id = ?');
        //準備してSQLを実行する
        $stmt->execute([$id]);
        //実行結果を取得する
        $task = $stmt->fetch();

        // return === 関数の呼び出し元に、値を返す
        return $task;
    }

    public function update($task_name,$id)
    {
        $stmt = $this->db_manager->dbh->prepare('UPDATE ' . $this->table . ' SET name = ? WHERE id = ?');
        $stmt->execute([$task_name,$id]);
    }
}
?>




