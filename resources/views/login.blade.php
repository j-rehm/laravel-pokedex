<?php
include_once '../resources/views/header.blade.php';
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
        <input type='submit' />
    </form>
</div>

<?php include_once '../resources/views/footer.blade.php'; ?>