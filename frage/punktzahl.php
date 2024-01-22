<?php
session_start();

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
    $link = mysqli_connect("localhost", "root", "root", "swe_db");
    mysqli_set_charset($link, "utf8");

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
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../Stylesheets/inputTemplate.css">
        <link rel="stylesheet" href="../Stylesheets/frage.css">
        <link rel="stylesheet" href="../Stylesheets/basics.css">
        <link rel="stylesheet" type="text/css"  href="../admin_panel/view/header.css">
    </head>
</head>

<body>
<?php include ("../Ressources/templates/header/lite_header.php")?>

    <div class="gameOverBody">

        <article class="points_report">
            <h1 class="noMarginBot dark_FH_text">Deine Punktzahl!</h1>
        </article>
        <article>
            <h1 class="noMarginTop dark_FH_text"><?php echo $pts ?></h1>
        </article>
        <p><?php echo $msg ?></p>
        <article>
            <a href="../Hauptmenu/hauptmenu.php"><button class="knopfT1Medium" >Okay</button></a>
        </article>

    </div>
</body>

