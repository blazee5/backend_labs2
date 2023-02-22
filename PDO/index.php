<?php
$user = 'root';
$pass = '';
try {
$pdo = new PDO("mysql:host=localhost;dbname=PDO;charset=utf8mb4", $user, $pass);

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST["name"];
    $parent_id = $_POST["parent_id"];
    $stmt = $pdo->prepare("INSERT INTO categories (name,parent_id) VALUES(?, ?)");
    $stmt->execute([$name, $parent_id]);
}
}
catch (Exception $e) {
    error_log($e->getMessage());
    exit('Something bad happened');
}
if (isset($_GET['id'])) {
    $stmt = $pdo->prepare("DELETE FROM categories WHERE id = {$_GET['id']}");
    $stmt->execute();
    header("Location: $_SERVER[HTTP_REFERER]");
}
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="" method="POST">
    <input name="name">
    <select name="parent_id">
        <option value="0"></option>
        <option value="1">Первая категория</option>
        <option value="2">Вторая категория</option>
        <option value="3">Третья категория</option>
    </select>
    <input type="submit" value="Создать">
    <table>
        <tr>
            <th>ID</th>
            <th>name</th>
            <th>parent_id</th>
            <th>Delete</th>
        </tr>
        <?php
        $sql = 'SELECT * FROM categories';
        foreach ($pdo->query($sql) as $item) {
            echo "<tr>";
            echo "<td>".$item['id']."</td>";
            echo "<td>".$item['name']."</td>";
            echo "<td>".$item['parent_id']."</td>";
            echo "<td>"."<a href='index.php?id={$item['id']}'>Удалить</a>";
            echo "</tr>";
        }
        ?>
    </table>
</form>
</body>
</html>
