<?php
include "../DB/Database.php";

if (isset($_POST['id']))  // Get The ud from the hidden input
{
    
    $id = $_POST['id'];
    if($id ==0) // if he tried to write id = 0
    {
        header("Location: ../pages/viewComment.php");
    }
    else
    {
        $DataBase = new Database(); // Make an instance of the Db
        // SQL Query
        $sql = "DELETE FROM comment
                WHERE Comment_id = '$id';";
        $DataBase->query($sql);
        $DataBase->execute();
        header("Location: ../pages/viewComment.php");
    }
}
else if(!isset($_GET['id'])) // If there was no such id
{
    header("Location: ../pages/viewComment.php");
}
else // If he tried to access it from the url
 {
      header("Location: ../pages/viewComment.php");
 }
?>