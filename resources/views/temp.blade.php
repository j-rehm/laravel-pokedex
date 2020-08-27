@extends('layouts.app')
@section('content')

<?php
$url = 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/';
if (isset($_SESSION) && isset($_SESSION['CurrentUser'])) {
  $trainer = $_SESSION['CurrentUser'];
}
?>

<h2><?=$header?></h2>
<hr />

<div class="pokemon-container">
  @foreach($pokemon as $key => $p)
  <?php var_dump($p) ?>
  @endforeach
</div>

@endsection