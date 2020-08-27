@extends('layouts.app')
@section('content')

<?php
$error = session()->get('error');
?>

<div class="center">
    <form method='POST' action='/login'>
        @csrf
        <h2>Login</h2>
        <span>
            <label>Username</label>
            <input name='username' type='text'/>
        </span>
        <span>
            <label>Password</label>
            <input name='password' type='password'/>
        </span>
        @if($error)
        <p class='error'><?=$error?></p>
        @endif
        <input type='submit' />
    </form>
</div>

@endsection