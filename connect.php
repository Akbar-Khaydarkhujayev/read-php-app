<?php
$connect = mysqli_connect('localhost', 'root', '', 'read_app');
// Соединяемся с БД, переданные параметры работают только на моей машине

// При ошибке соединения исполнение кода остановится
if(!$connect){
    die('Error with connection to DB');
}