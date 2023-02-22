<?php
/* Основные настройки */
$DB_HOST = "localhost";
$DB_LOGIN = "root";
$DB_PASSWORD = "";
$DB_NAME = "gbook";
$con = mysqli_connect($DB_HOST, $DB_LOGIN, $DB_PASSWORD, $DB_NAME);
/* Основные настройки */

/* Сохранение записи в БД */
if ($_SERVER['REQUEST_METHOD'] === "POST") {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $msg = $_POST['msg'];
  $query = "INSERT INTO msgs(name, email, msg) VALUES (?, ?, ?)";
  $stmt = mysqli_prepare($con, $query);
  mysqli_stmt_bind_param($stmt, "sss", $name, $email, $msg);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);
  if (!$stmt) {
    echo 'Ошибка: '
      . mysqli_errno($con)
      . ':'
      . mysqli_error($con);
  }
}
/* Сохранение записи в БД */

/* Удаление записи из БД */
if (isset($_GET['del'])) {
  $del = $_GET['del'];
  $delete = "DELETE FROM msgs WHERE id = (?)";
  $stmt = mysqli_prepare($con, $delete);
  mysqli_stmt_bind_param($stmt, "i", $del);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);
  header("Location: $_SERVER[HTTP_REFERER]");
}

/* Удаление записи из БД */
?>
  <h3>Оставьте запись в нашей Гостевой книге</h3>

  <form method="post" action="">
    Имя: <br/><input type="text" name="name"/><br/>
    Email: <br/><input type="text" name="email"/><br/>
    Сообщение: <br/><textarea name="msg"></textarea><br/>
    <br/>

    <input type="submit" value="Отправить!"/>

  </form>
<?php
/* Вывод записей из БД */
$select = mysqli_query($con, "SELECT id, name, email, msg, UNIX_TIMESTAMP(datetime) as dt FROM msgs ORDER BY id DESC");
$res = mysqli_fetch_all($select);
$count = mysqli_num_rows($select);
mysqli_close($con);
echo "<p>" . "Всего записей в гостевой книге: " . $count . "</p>";
foreach ($res as $item) {
  echo "<p>" . "<a href='$item[2]'>$item[1] </a>" . " " . gmdate("d-m-Y", $item[4]) . " в " . gmdate("H:i", $item[4]) . " написал<br />$item[3]" . "</p>" . "<p align='right'>" . "<a href='index.php?id=gbook&del=$item[0]'>Удалить</a>" . "</p>";
}
/* Вывод записей из БД */

?>