@extends('layouts.app')
@section('content')

<div class="section">
  <h2>Pokémon Manager</h2>
  <hr />

  <div class="center">
    <h2>Welcome to the world of Pokémon!</h2>
  </div>
  <br/>
  <div class="row center">
    <img class="mr-20" src="/assets/oak.png"/>
    <div>
      <form class="prompt">
        <p style="font-family: 'Press Start 2P', cursive;">My name is Oak. People call me the Pokémon Professor. This world is inhabited by creatures that we call Pokémon. Where people and Pokémon live together by supporting each other...</p>
      </form>
      <br/>
      <form class="prompt">
        <p>Now, young trainer, please follow the instructions I have laid out for you below to get started on the journey ahead of you.</p>
      </form>
    </div>
  </div>
  <br/>
  <h2>Instructions</h2>
  <hr/>
  <h3>About</h3>
  <p>This is a website to organize your preferred team from the first three generations of Pokémon.</p>
  <br/>
  <h3>Setting Up Your Trainer Account</h3>
  <p>If you don't have an account, click on the Sign Up button to register yourself as a new trainer</p>
  <p>Those who have an account already can simply click on the Login button</p>
  <br/>
  <h3>Building your Pokémon team</h3>
  <p>Click <a href="/pokemon" >Pokémon</a> to get started. Capture the pokémon you would like with the Pokéball icon to add them to your team.</p>
  <p>Note: you may only have up to 6 pokémon on your team at any given time!</p>
  <p>Click <a href="/team" >Team</a> to view the pokémon in your team. Click the Pokéball icon again to remove the pokémon from your team.</p>
</div>

@endsection