<?php
//require_once __DIR__ . '/vendor/autoload.php';
//use \nadar\quill\Lexer;
include $_SERVER["DOCUMENT_ROOT"] . "/php/config.php";
include $_SERVER["DOCUMENT_ROOT"] . "/php/functions.php";
?><!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>TestDB</title>
    <meta name="viewport" content="width=device-width">
    <a href="index.php">Главная</a> |
    <a href="room.php">Квартиры</a>
</head>
<body class="testdb">
<h1>Квартиры</h1>
</body>
</html>
<?php

    $mysqli = new mysqli("127.0.0.1", "root", "", "testdb");
    $mysqli->query("SET NAMES 'utf8'");
    $result = $mysqli->query("SELECT * FROM `NL_PROP_RESALE`");

    if($result->num_rows > 0){
        echo '<h2>Список квартир</h2>';
        echo '<table border="1" cellpadding="10" cellspacing="0">';
        echo '<tr style="background-color: #f2f2f2;">';
        echo '<th>ID</th>';
        echo '<th>VIEW</th>';
        echo '<th>FLOOR</th>';
        echo '<th>AREA_FULL</th>';
        echo '<th>PHOTO_URLS</th>';
        echo '<th>COST_TOTAL</th>';
        echo '<th>DESCRIPTION</th>';
        echo '</tr>';

        while($row = $result->fetch_assoc()){
            echo '<tr>';
            echo '<td>'.$row["ID_NL_PROP_RESALE"].'</td>';
            echo '<td>'.$row["ID_NL_VIEW"].'</td>';
            echo '<td>'.$row["NL_PROP_RESALE_FLOOR"].'</td>';
            echo '<td>'.$row["NL_PROP_RESALE_AREA_FULL"].'</td>';
            echo '<td>'.$row["NL_PROP_RESALE_PHOTO_URLS"].'</td>';
            echo '<td>'.$row["NL_PROP_RESALE_COST_TOTAL"].'</td>';
            echo '<td>'.$row["NL_PROP_RESALE_DESCRIPTION"] . '</td>';
            echo '</tr>';
        }
//        class Mention
//        {
//            /**
//             * {@inheritDoc}
//             */
//            public function process(Line $line)
//            {
//                $mention = $line->insertJsonKey('mention');
//                if ($mention) {
//                    $this->updateInput($line, '<strong>'.$mention['value'].'</strong>');
//                }
//            }
//        }
        echo '</table>';
    }
    $mysqli->close();
?>

