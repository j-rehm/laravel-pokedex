<?php
  $title = "Pokémon Manager";
  $logo = url('/assets/pokeball.svg');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?=$title?></title>
  <link href="/css/style.css" rel="stylesheet" />
</head>

<body>
  <nav class="nav-bar-blue">
    <div class="container">
      <ul>
        <!-- <li id="nav-brand"><img src="http://localhost:8000/assets/pokeball.svg" id="logo" /></li> -->
        <li id="nav-brand"><img src=<?=$logo?> id="logo" /></li>
        <li><a href="/" >Home</a></li>
        <li><a href="/pokemon" >Pokémon</a></li>
        <li><a href="/team" >Team</a></li>
        <li><a href="/signup" >Sign Up</a></li>
        <li><a href="/login" >Login</a></li>
      </ul>
    </div>
  </nav>
  <div class="container" id="content">