<?php
session_start();
if (isset($_POST['id'])){
    $name=$_POST['id'];
    $date=$_POST['date'];
    $salary=$_POST['salary'];
    $id=$_SESSION['id'];

    try{

        include'../DB/Database.php';
        $DB=new Database();
        $sql="SELECT body,Name FROM requests_types where Name= '$name'; " ;
        $DB->query($sql);
        $DB->execute();
        $info=$DB->getdata();
        echo '<center><b>'.$name.'</b></center> <br>';
        $body=$info[0]->body;
        $name=$_SESSION['name'];
        $body=str_replace('(.NAME.)',$name,$body);
        $body=str_replace('(.DATE.)',$date,$body);
        if($salary==1){


            $sql="SELECT salary FROM add_info where emp_id= $id " ;
            $DB->query($sql);
            $DB->execute();
            $x=$DB->getdata();
            $body=str_replace('(.SALARY.)','their current gross salary is EGP '.$x[0]->salary.' per annum.',$body);
        }
        else {
            $body=str_replace('(.SALARY.)',"",$body);
        }
        
        $body=str_replace('(.POSITION.)',"modeer amn",$body);
        $body=str_replace('(.START.)',"JAN 1940",$body);
        echo $body;
    }

    catch(Exception $e)
    {
        echo $e->getMessage();;
    }
}