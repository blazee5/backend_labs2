<?php
if (isset($_POST)) {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $msg = htmlspecialchars($_POST['msg']);
}
    /* Основные настройки */
    $DB_HOST = "localhost";
    $DB_LOGIN = "root";
    $DB_PASSWORD = "";
    $DB_NAME = "gbook";
    $con = mysqli_connect($DB_HOST, $DB_LOGIN, $DB_PASSWORD, $DB_NAME);
    /* Основные настройки */

    /* Сохранение записи в БД */
    $query = "INSERT INTO msgs(name, email, msg) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, "sss", $name, $email, $msg);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    $result = mysqli_query($con, 'SELECT * FROM msgs');
    if (!$result) {
        echo 'Ошибка: '
            . mysqli_errno($con)
            . ':'
            . mysqli_error($con);
    }
    $row = mysqli_fetch_assoc($result);
    /* Сохранение записи в БД */

    /* Удаление записи из БД */

    /* Удаление записи из БД */
?>
<h3>Оставьте запись в нашей Гостевой книге</h3>

<form method="post" action="">
Имя: <br /><input type="text" name="name" /><br />
Email: <br /><input type="text" name="email" /><br />
Сообщение: <br /><textarea name="msg"></textarea><br />
<br />

<input type="submit" value="Отправить!" />

</form>
<?php
/* Вывод записей из БД */
$select = mysqli_query($con, "SELECT id, name, email, msg, UNIX_TIMESTAMP(datetime) as dt FROM msgs ORDER BY id DESC");
$res = mysqli_fetch_all($select);
$count = mysqli_num_rows($select);
mysqli_close($con);
echo "<p>" . "Всего записей в гостевой книге: " . $count . "</p>";
foreach ($res as $item) {
    echo "<p>" . "<a href='$item[2]'>$item[1] </a>" . $item[3] . $item[4] . " в " . $item[4] . " написал<br />$item[3]" . "</p>" . "<p align='right'>" . "<a href='http://localhost/backend_labs2/index.php?id=gbook&del=$item[0]'>Удалить</a>" . "</p>";
}
/* Вывод записей из БД */
?>