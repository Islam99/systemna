<?php
include "../DB/Database.php";
$DB = new Database();
if(isset($_GET['id'])){
    $d_id = $_GET['id'];
    $sql = "update employee set active=0 where id = '$d_id;'";
    $DB->query($sql);
    $DB->execute();
    header("Location: ../pages/index.php");
}
else if(isset($_GET['qid'])){
    $qid = $_GET['qid'];
    $sql = "delete from faq where ID = '$qid';";
    $DB->query($sql);
    $DB->execute();
    header("Location: ../pages/viewFAQ.php");
}
else if(isset($_GET['lid'])){
    $lid = $_GET['lid'];
    $sql = "delete from requests_types where type_id = '$lid';";
    $DB->query($sql);
    $DB->execute();
    header("Location: ../pages/allLetters.php");
} 
else { header("Location: ../index.php"); }
?>