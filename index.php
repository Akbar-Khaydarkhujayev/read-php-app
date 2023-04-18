<?php

// Импорт кода
require_once 'connect.php';

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/public/style.css">
</head>
<body>

<nav class="navbar navbar-light" style="background-color: #e3f2fd;">
    <div class="container-fluid">
        <span class="navbar-brand m-0 bigger-font">Продукты</span>
    </div>
</nav>

<div class="custom-container mt-3">
    <div class="mb-2">
        <input type="text" class="form-control width-200" id="filter-by">
        <button type="submit" class="btn btn-outline-primary ms-2" id="btn-filter">Фильтровать</button>
    </div>

    <div class="mb-2">
        <select class="form-select width-200" id="sort-by">
            <option selected value="1">По возрастанию</option>
            <option value="2">По убыванию</option>
        </select>
        <button type="button" class="btn btn-outline-primary ms-2" id="btn-sort">Сортировать по цене</button>
    </div>

    <table class="table table-bordered border-primary">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Название товара</th>
            <th scope="col">Цена</th>
        </tr>
        </thead>
        // Получаем данные, пишем в JSON, Передаем через атрибут data
        <?php
        $result = mysqli_query($connect, "SELECT * FROM `products`");
        $result = mysqli_fetch_all($result);
        $data = json_encode($result, JSON_UNESCAPED_UNICODE);
        ?>
        <tbody id="table-body" data-attr='<?php echo $data; ?>'>
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
<script src="public/script.js"></script>
</body>
</html>
