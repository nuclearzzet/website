<?php htmlspecialchars(include 'src/config/database.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style> <?php htmlspecialchars(include 'css/header.css') ?> </style>
</head>
<body>
    <header>
        <nav class="navbar">
            <ul class="navbar_list">
                <li class="nav_link nav_link_1"><a href="index.php">nuclearzzet.dev</a></li>
                <li class="nav_link nav_link_2"><a href="index.php#about">About</a></li>
                <li class="nav_link nav_link_3"><a href="index.php#skills">Skills</a></li>
                <li class="nav_link nav_link_4"><a href="index.php#projects">Projects</a></li>
            </ul>
            <a href="./contact.php" class="btn_contact"><button>Contact</button></a>
        </nav>
    </header>