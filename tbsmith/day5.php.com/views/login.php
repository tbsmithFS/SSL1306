<p>Login:</p>
<p>
<form 
    action="/user/login"
    enctype="multipart/form-data"
    method="post">
<?php
if (!empty($data['username']) && !empty($data['username']['msg'])) {
    echo $data['username']['msg'];
    echo "<br/>\n";
}
?>
    Username: <input name="username"><br/>

<?php 
if (!empty($data['password']) && !empty($data['password']['msg'])) {
    echo $data['password']['msg'];
    echo "<br/>\n";
}
?>
    Password: <input name="password"><br/>
    <input type="submit" value="Login">
</form>
</p>
