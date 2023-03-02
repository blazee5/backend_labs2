<?php
include "INewsDB.class.php";

class NewsDB implements INewsDB {
    public $title;
    public $category;
    public $description;
    public $source;
    function saveNews($title, $category, $description, $source) {
        $dt = time();
        $sql = "INSERT INTO msgs($title, $category, $description, $source, $dt)";
        return $this->_db->exec($sql);
    }

    function getNews() {

    }

    public function showNews($id) {

    }

    const DB_NAME = 'news.db';
    private $_db;

    function __construct() {
        $this->_db= new PDO("sqlite:".self::DB_NAME);
        if (!filesize(self::DB_NAME)) {
            $sql = "CREATE TABLE msgs(
	    id INTEGER PRIMARY KEY AUTOINCREMENT,
	    title TEXT,
	    category INTEGER,
	    description TEXT,
	    source TEXT,
	    datetime INTEGER
        )";
            $sql2 = "CREATE TABLE category(
	        id INTEGER,
	        name TEXT
        )";
            $sql3 = "INSERT INTO category(id, name)
            SELECT 1 as id, 'Политика' as name
            UNION SELECT 2 as id, 'Культура' as name
            UNION SELECT 3 as id, 'Спорт' as name ";
            $this->_db->exec($sql);
            $this->_db->exec($sql2);
            $this->_db->exec($sql3);
        }
    }

    function __destruct() {
        unset($this->_db);
    }
}