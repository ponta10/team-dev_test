<?php  
ini_set('display_errors', 1);
require(dirname(__FILE__) . "/dbconnect.php");
// $id = filter_input(INPUT_GET,'id',FILTER_SANITIZE_NUMBER_INT);
// $stmt = $db->prepare('delete from study where id=?');
// $stmt->bind_param('i',$id);
// $stmt->execute();
// $selectDate = filter_input(INPUT_GET,'nengetu',FILTER_SANITIZE_SPECIAL_CHARS);
$delete = $_GET['delete'] ;
$stmt_delete = $pdo->prepare("delete from agent where agent_name = '$delete'");
$stmt_delete->execute();
$cnt = $stmt_delete->fetch();

header('Location: index.php'); 
exit();
?>