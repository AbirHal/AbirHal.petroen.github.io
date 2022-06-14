<?php
	if(isset($_POST["submit"]))
	{
        include ('conn.php');
		
		$date = $_POST["cyear"]."-".$_POST["cmonth"]."-".$_POST["cdate"];
               		
		$query = "SELECT * FROM `employees` ";
		$query2 = "SELECT * FROM `salary` ";

		$result = mysqli_query($conn,$query)or die("select error");
		$result2 = mysqli_query($conn,$query2)or die("select error");

		while($rec = mysqli_fetch_array($result) and $rec2 = mysqli_fetch_array($result2) )
		{
			$mno = $rec["id_emp"];
			//$disco=$rec2["Discount"];

			if(!empty($_REQUEST['disc'])){
				$disco = $_REQUEST['disc'];
			}
			else{
				
				echo "enter your text".$disco;
			}
			





			if(isset($_POST[$mno]))
			{
				$query1 = "INSERT INTO `absent`(`id_emp`,`date`,`absente`,`Discount`) VALUES('$mno','$date','1','$disco')";
			}
			else
			{
				$query1 = "INSERT INTO `absent`(`id_emp`,`date`,`absente`,`Discount`) VALUES('$mno','$date','0','')";
			}
			mysqli_query($conn,$query1)or die("insert error".$mno);
			print "<script>";
			print "self.location='../absence.php';";
			print "</script>";
		}		
	}
	else
	{
		header("Location:../absence.php");
	}
?>