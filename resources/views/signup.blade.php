<?php
include_once '../resources/views/header.blade.php';
$error = session()->get('error');
?>

<h1>Sign Up</h1>
<form method='post' action='/signup'>
    @csrf
    @if($error)
    <p style='color:red'><?= $error ?></p>
    @endif
    <span>
        <label>Username</label>
        <input name='username' placeholder='Enter A Username...'/>
    </span>
    <span>
        <label>Password</label>
        <input name='password' type='password'/>
    </span>
    <span>
        <label>Confirm Password</label>
        <input name='confirmPass' type='password'/>
    </span>
    <button type='Submit'>Submit</button>
</form>

<?php include_once '../resources/views/footer.blade.php'; ?>