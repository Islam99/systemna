<?php include "../template/header.php"; ?>
<link rel="stylesheet" href="../css/QC_style.css">
<h1 style="text-align:center">Quality Control</h1>
<input type="text" id='tblsearch' class='tblsearch' placeholder='Search' style="left:680px;">
<select id='choice' class='tblselect' style="left:720px;padding:15px">
    <option value="email">Email</option>
    <option value="ssn">SSN</option>
    <option value="username">UserName</option>
</select>
<table id='Display'>
    <tr id='must'>
        <th>#</th>
        <th>Status</th>
        <th>ID</th>
        <th>FullName</th>
        <th>Username</th>
        <th>Email</th>
        <th>Location</th>
        <th>SSN</th>
        <th>Passport_ID</th>
        <th>Birthday</th>
        <th>Phone</th>
        <th>Gender</th>
        <th>Salary</th>
    </tr>
    <?php
        function check($c){
         if($c==null)
          $c='-';
         else if($c=='')
          $c='-';
          return $c;
        }

        $sql="
        SELECT *
        FROM employee left join add_info
        on emp_id=id where employee.active = 1 AND privilege = 'user'
              ";
        try
        {
              
        $DB->query($sql);
        $DB->execute();
        $y=0;
        if($DB->numRows()>0)
        {
            for($i=0;$i<$DB->numRows();$i++)
            {
                $x=$DB->getdata();
                $y++;
                $id=$x[$i]->id;
                $phone=check($x[$i]->phone);
                $ssn=check($x[$i]->ssn);
                $bdate=check($x[$i]->bdate);
                $salary=check($x[$i]->salary);
                $passport_id=check($x[$i]->passport_id);
                $gender=check($x[$i]->gender);
                $fullname=check($x[$i]->fullname);
                $username = check($x[$i]->username);
                $email = check($x[$i]->email);
                $location = check($x[$i]->location);




                echo  "<tr>";
                echo "<td>{$y}</td>";
                if($x[$i]->accepted==1)
                    echo "<td><a type='submit' href='QualityControl.php?accepted=1&id={$id}' id='button-accepted'  disabled>Accepted</a></td>";
                else if($x[$i]->accepted==0)
                    echo "<td><a type='submit' href='QualityControl.php?accepted=0&id={$id}' id='button-rejected'>Rejected</a></td>";
                else 
                    echo "<td><a type='submit' href='QualityControl.php?accepted=2&id={$id}' id='button-pending'>Pending</a></td>";
                echo "
                <td>{$id}</td>
                <td>{$fullname}</td>
                <td>{$username}</td>
                <td>{$email}</td>
                <td>{$location}</td>
                <td>{$ssn}</td>
                <td>{$passport_id}</td>
                <td>{$bdate}</td>
                <td>{$phone}</td>
                <td>{$gender}</td>
                <td ><div class='sal' id={$x[$i]->id}>{$salary}</div></td>";
                ?></tr>
    <?php
            }
        }
      }
      catch(Exception $e)
      {
          $_SESSION['error'] = 'error in sql';
      }

        ?>
</table>
<br><br><br><br><br><br><br><br>
<div class="AddComment">
<h2>Add a Comment !</h2>
<br>
<textarea placeholder="Add your comment here..." name="" id="" cols="60" rows="10"></textarea>
<br><br>
<input type="submit" value="Submit Comment">
</div>
<script src="../js/jquery-3.4.1.min.js"></script>
<script src="../js/backend.js"></script>
<?php include "../template/footer.php"; ?>
