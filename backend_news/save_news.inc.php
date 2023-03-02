<?php
if (!empty(['title']) && !empty($_POST['category']) && !empty($_POST['description']) && !empty($_POST['source'])) {
    $title = htmlspecialchars($_POST['title']);
    $category = htmlspecialchars($_POST['category']);
    $description = htmlspecialchars($_POST['description']);
    $source = htmlspecialchars($_POST['source']);

    try {
        $res = $news->saveNews($title, $category, $description, $source);
        header("Location: news.php");

    }
    catch (PDOException $e) {
        $errMsg = $e;
    }
} else {
    $errMsg = "Заполните все поля формы!";
}