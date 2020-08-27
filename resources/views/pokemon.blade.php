@extends('layouts.app')
@section('content')

<?php
$star_full = url('/assets/star_full.svg');
$star_empty = url('/assets/star_empty.svg');
$url = 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/';
if (isset($_SESSION) && isset($_SESSION['CurrentUser'])) {
  $trainer = $_SESSION['CurrentUser'];
}
$i = 0;
?>

<h2><?=$header?></h2>
<hr />


<div class="pokemon-container">
  @foreach($pokemon as $key => $p)
  <?php $i++ ?>
  {{-- Header to Indicate the Generation of Pokemon --}}
  @if($p->Id == 1)
  <form style='width:100%;background-color:#f15746;'>
    <h1 style='text-align:center;color:white'>Generation 1</h1>
  </form>
  @elseif($p->Id == 152)
  <form style='width:100%;background-color:#8fc854;'>
    <h1 style='text-align:center;color:white'>Generation 2</h1>
  </form>
  @elseif($p->Id == 252)
  <form style='width:100%;background-color:#6aa7db;'>
    <h1 style='text-align:center;color:white'>Generation 3</h1>
  </form>
  @endif

  <form method="POST" action="/team" class="pokemon" >
    @csrf
    {{-- Form Post Data --}}
    <input type="hidden" name="id" value=<?=$p->Id?> />
    <input type="hidden" name="index" value=<?=$i?> />
    <input type="hidden" name="parent" value=<?=$parent?> />
    
    {{-- Pokemon Card --}}
    <div class="row">
      <img src="<?=$url . $p->Id . '.png'?>" class="pokemon-sprite" />
      <div class="col">
        <div class="row pokemon-title">
          <h1 class="pokemon-species"><?=$p->Species?></h1>
          @if(isset($trainer))
            {{-- @if($p->Team != 0) --}}
            {{-- <button type="action"><img src=<?=$star_full?> class="pokemon-favorite" /></button> --}}
            {{-- @else --}}
            <button type="action"><img src=<?=$star_empty?> class="pokemon-favorite" /></button>
            {{-- @endif --}}
          @endif
        </div>
        <div class="row">
          <div class="pokemon-type <?=$p->Type1?>"><p><?=$p->Type1?></p></div>
          @if($p->Type2 != null)
          <div class="pokemon-type <?=$p->Type2?>"><p><?=$p->Type2?></p></div>
          @endif
        </div>
        <div class="id-container">
          <h1 class="pokemon-id"><?=$p->Id?></h1>
        </div>
      </div>
    </div>
  </form>
  @endforeach
</div>

@endsection