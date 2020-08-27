<?php
include_once '../resources/views/header.blade.php';
?>

<h1>Login</h1>
<form method='post' action='/login'>
    <input name='username' placeholder='Enter A Username...'/>
    <input name='password' type='password'/>\
    <button type='Submit'>Submit</button>
</form>

<?php include_once '../resources/views/footer.blade.php'; ?>