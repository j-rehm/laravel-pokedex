@extends('layouts.app')
@section('content')

<?php
$error = session()->get('error');
?>

<div class="center">
    <form method='POST' action='/signup'>
        @csrf
        <h2>Sign Up</h2>
        <span>
            <label>Trainer Name</label>
            <input name='username' type='text' />
        </span>
        <span>
            <label>Password</label>
            <input name='password' type='password' />
        </span>
        <span>
            <label>Confirm Password</label>
            <input name='confirmPass' type='password' />
        </span>
        @if($error)
        <p class='error'><?=$error?></p>
        @endif
        <input type='submit' />
    </form>
</div>

@endsection