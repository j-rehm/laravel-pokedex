<?php
  $title = "Pokémon Manager";
  $logo = url('/assets/pokeball.svg');
  if (isset($_SESSION) && isset($_SESSION['CurrentUser'])) {
    $trainer = $_SESSION['CurrentUser'];
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?=$title?></title>
  <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
  <link rel="shortcut icon" href="/assets/favicon.ico"/>
  <link href="/css/style.css" rel="stylesheet" />
</head>

<body>
  <nav class="nav-bar-blue">
    <div class="container">
      <ul>
        <li id="nav-brand"><img src=<?=$logo?> id="logo" /></li>
        <li><a href="/" >Home</a></li>
        <li><a href="/pokemon" >Pokémon</a></li>
        @if(isset($trainer))
        <li><a href="/team" >Team</a></li>
        @endif
        <span class="nav-buffer"></span>
        @if(isset($trainer) && isset($trainer->name))
        <li><a href="/team" ><?=$trainer->name?></a></li>
        <li><a href="/logout" >Log Out</a></li>
        @else
        <li><a href="/signup" >Sign Up</a></li>
        <li><a href="/login" >Login</a></li>
        @endif
      </ul>
    </div>
  </nav>
  <div class="container" id="content">
    @yield('content')
  </div>
</body>

<footer class="footer-blue">
  <div class="container">
    <h3>Pokémon Manager</h3>
    <p>&copy; Three Webs No Gaige 2020</p>
  </div>
</footer>

</html>