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
        $stmt = $this->db_manager->dbh->prepare('SELECT * FROM ' . $this->table);
        //準備してSQLを実行する
        $stmt->execute();
        //実行結果を取得する
        $tasks = $stmt->fetchAll();

        // return === 関数の呼び出し元に、値を返す
        return $tasks;
    }
}



