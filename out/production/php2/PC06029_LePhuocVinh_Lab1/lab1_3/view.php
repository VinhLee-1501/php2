<?
global $user;
if (isset($user['fullName'])) {
    echo $user['fullName'];
}else{
    echo '';
}
?>
<form method="post">
    <input name="email" type="email">
    <input type="submit" value="submit">
</form>