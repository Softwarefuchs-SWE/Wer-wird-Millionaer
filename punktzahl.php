<?php
session_start();


include "./../Ressources/templates/header/full_header.php";
require_once ("./../SWE_DB/DB_Funktionen.php");

$pts_list = [
        0 => 0,
        1 => 100,
        2 => 200,
        3 => 300,
        4 => 400,
        5 => 500,
        6 => 1000,
        7 => 1500,
        8 => 2000,
        8 => 2500,
        9 => 3000,
        10 => 4000,
        11 => 5000,
        12 => 6000,
        13 => 8000,
        14 => 10000
];


$pts = isset($_SESSION['question_nr']) ? $pts_list[($_SESSION['question_nr']) - 1] : 0;

if(isset($_SESSION['training']) && $_SESSION['training'] === false){
    $link = connect_to_db();

    $sql = "UPDATE swe_db.benutzerdaten
SET Punktzahl = Punktzahl + ?
WHERE ID = ?";

    $playerID = $_SESSION['spielerId'] ?? -1;

    $stmt = $link->prepare($sql);
    $stmt->bind_param("ii", $pts, $playerID);

    $stmt->execute();

    $link->close();

    $msg = "";
} else $msg = "Bitte beachte, dass deine Punktzahl nicht gespeichert wird, da du dich im Trainingsmodus befindest!";


?>

<head>
    <head>
        <title>Game Over</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../css/inputTemplate.css">
        <link rel="stylesheet" href="../css/frage.css">
        <link rel="stylesheet" href="../Stylesheets/basics.css">
    </head>
</head>
<body class="gameOverBody">

    <article class="points_report">
        <h1 class="noMarginBot dark_FH_text">Deine Punktzahl!</h1>
    </article>
    <article>
        <h1 class="noMarginTop dark_FH_text"><?php echo $pts ?></h1>
    </article>
    <p><?php echo $msg ?></p>
    <article>
        <a href="../Hauptmenue/hauptmenue.php"><button class="knopfT1Medium" >Okay</button></a>
    </article>

</body>
