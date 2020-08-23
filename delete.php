<?php
session_start();
require('join/dbconnect.php');
ini_set('display_errors', 1);


if (isset($_SESSION['id'])) {
    $id = $_REQUEST['id'];

$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);        $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

    $messages = $db->prepare('SELECT * FROM posts WHERE id=?');
    $messages -> execute(array($id));
    $message = $messages->fetch();

    if ($message['member_id'] == $_SESSION['id']) {
        $del = $db->prepare('DELETE FROM posts WHERE id=?');
        $del->execute(array($id));
    }
}

header('Location: index.php');
exit();
?>
