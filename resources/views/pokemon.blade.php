@extends('layouts.app')
@section('content')

<?php
// $icon_full = url('/assets/star_full.svg');
// $icon_empty = url('/assets/star_empty.svg');
$icon_full = url('/assets/pokeball_full.svg');
$icon_empty = url('/assets/pokeball_empty.svg');
$url = 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/';
if (isset($_SESSION) && isset($_SESSION['CurrentUser'])) {
  $trainer = $_SESSION['CurrentUser'];
}
$i = 0;
?>

<h2><?=$header?></h2>
<hr />

@if(count($pokemon) == 0)
<div class="center">
  <h3>Looks like you don't have ant pokemon yet. Head to the <a href="/pokemon" >Pokémon</a> tab to catch some!</h3>
</div>
  @endif

<div class="pokemon-container">
  @foreach($pokemon as $key => $p)
  <?php $i++ ?>
  {{-- Header to Indicate the Generation of Pokemon --}}
  @if($parent == 'pokemon')
    @if($p->Id == 1)
      <form class="generation" id="gen-1">
        <h1>Generation 1</h1>
      </form>
    @elseif($p->Id == 152)
      <form class="generation" id="gen-2">
        <h1>Generation 2</h1>
      </form>
    @elseif($p->Id == 252)
      <form class="generation" id="gen-3">
        <h1>Generation 3</h1>
      </form>
    @endif
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
          <?php
            $caught = count(DB::table('TeamMembers')
                              ->where('TrainerId', '=', $trainer->id)
                              ->where('PokemonId', '=', $p->Id)
                              ->get());
          ?>
          @if($caught)
          <button type="action"><img src=<?=$icon_full?> class="pokemon-favorite" /></button>
          @else
          <button type="action"><img src=<?=$icon_empty?> class="pokemon-favorite" /></button>
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