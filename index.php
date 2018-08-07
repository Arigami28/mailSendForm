<?php
session_start();
if(!isset($_SESSION['login'])) {
    header('LOCATION:login.php'); die();
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta http-equiv='content-type' content='text/html;charset=utf-8' />
  <title>ksausp@rfniias.ru</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
  <div class="container">
    <div class="row justify-content-md-center">
      <div class="col-md-auto">
        <h3 class="text-center">Отправка инцендента на "-Ваша почта-"</h3>
        <form action="mailSend.php" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="stationNameSelection-field">Объект:</label>
            <select name="stationNameSelection" id="stationNameSelection-field" class="form-control" required>
              <option value="Все объекты">1</option>
              <option value="Алтайская">2</option>
              <option value="Батайск">3</option>
            </select>
          </div>
          <div class="form-group">
            <label for="dataIncident-field">Дата инцендента:</label>
            <input type="date" class="form-control" name="dataIncident" id="dataIncident-field" required>
          </div>
          <div class="form-group">
            <label for="appealingMan-field">Кто обратился:</label>
            <input type="text" name="appealingMan" id="appealingMan-field" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="methodOfCirculation-field">Способ обращения:</label>
            <select name="methodOfCirculation" id="methodOfCirculation-field" required  class="form-control" >
              <option value="Viber">Мессенджер</option>
              <option value="Тел. звонок">Тел. звонок</option>
              <option value="Указание рук.">Указание рук.</option>
              <option value="Почта">Почта</option>
            </select>
          </div>
          <div class="form-group">
            <label for="comment-field">Суть обращения:</label>
            <textarea class="form-control" name="comment" id="comment-field" rows="3"></textarea>
            <label for="exampleInputFile">Приложение:</label>
            <input type="file" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp">
          </div>
          <div class="form-group">
            <label for="executor-field">Испольнитель:</label>
            <select name="executor" class="form-control" id="executor-field" required>
              <option value="a.goncharov">1</option>
              <option value="Atischenko">2</option>
              <option value="igorpa">3</option>
            </select>
          </div>
          <div class="form-group">
            <label for="result-field">Результат:</label>
            <select name="result" class="form-control" id="result-field" required>
              <option value="нужен отклик" selected>Нужен отклик</option>
              <option value="рассмотрен">Рассмотрен</option>
              <option value="подтвержден">Подтвержден</option>
              <option value="назначен">Назначен</option>
              <option value="решён">Решён</option>
            </select>
          </div>
          <button type="submit" class="btn btn-primary">Отправить</button>
        </form>
      </div>
    </div>
  </div>
</body>
</html>