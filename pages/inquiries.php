<?php 
$pageTitle = "SYSTEMNA | Inquiries"; /* Setting the page title */
include "../template/header.php"; /* Including the header file */
if($_SESSION['type']!='admin') header('Location:MakeLetter.php');
if(isset($_SESSION['type']) && $_SESSION['type']=='admin'){echo('<div style="text-align: center; align-self: center;"><div class="pages_edit" id="inq_edit">Edit</div></div>');}  /* Adding the edit button if the user is an admin */

?>
<div>
	<?php
    try {
        /* SQL query to get the data from the DB */
        $sql = " SELECT * FROM inquiries ";
        $DB->query($sql); /* Using the query function made in DB/Database.php */
        $DB->execute(); /* Using the excute function made in DB/Database.php */
        echo "<br>
        <h1 style='text-align: center;'>Latest Inquiries!</h1>
        <br><br>" ;
        for($i=$DB->numRows(); $i>0; --$i){ /* iterating the results by the num of rows */
            $x=$DB->getdata(); /* creates an array of the output result */
            /* Printing the output */
            echo "<hr><br>" . "<b>Message ID: </b>" . $x[$i-1]->id . "<br><b>Requested by: </b>" . $x[$i-1]->requester_name . "<br><b>Requester email: </b>" . $x[$i-1]->requester_email . "<br><b>Requester ID: </b>" . $x[$i-1]->requester_id . "<br><br>" . "<b>Message subject: </b>" . $x[$i-1]->subject . "<br><b>Message content: </b>" . $x[$i-1]->message . "<br>";
            echo "<br><br>";
        }
    } catch (Exception $e) {
        echo "<br><div class='alert alert-danger' style='text-align: center;'>ERROR! Please try again later</div>";
        error_log("Error while getting inquiries");
    }
    ?>
</div>
<?php include "../template/footer.php"; /* Including the footer file */ ?>