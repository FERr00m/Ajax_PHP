<?
session_start();

require_once 'db.php';

$products = $dbh->query("SELECT * FROM products")->fetchAll();

$categories = $dbh->query("SELECT category FROM categoryies")->fetchAll();

$colors = $dbh->query("SELECT color FROM colors")->fetchAll();

$weights = $dbh->query("SELECT weight FROM weights")->fetchAll();

?>

<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
  <title>Ajax PHP</title>
</head>
<body>
  <div class="container">

    <div class="select">
      <select name="category" id="category">
        <option value="all">Все категории</option>
        <?php foreach($categories as $category): ?>
        <option value="<?=$category['category']?>" <? if ($_SESSION['category'] == $category['category']) { echo 'selected'; }?>><?=$category['category']?></option>
        <? endforeach; ?>
      </select>

      <select name="color" id="color">
        <option value="all">Все цвета</option>
        <?php foreach($colors as $color): ?>
        <option value="<?=$color['color']?>" <? if ($_SESSION['color'] == $color['color']) { echo 'selected'; }?>><?=$color['color']?></option>
        <? endforeach; ?>
      </select>

      <select name="weight" id="weight">
        <option value="all">Любой вес</option>
        <?php foreach($weights as $weight): ?>
        <option value="<?=$weight['weight']?>" <? if ($_SESSION['weight'] == $weight['weight']) { echo 'selected'; }?>><?=$weight['weight']?></option>
        <? endforeach; ?>
      </select>
    </div>

    <div class="row cards-block">
      <?php
        require_once './actions/query.php';
      ?>
    </div>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="./js/ajax.js"></script>
</body>
</html>