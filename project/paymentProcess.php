<?php
	include 'header.html';
	//include any specific css file
	echo '<link rel= "stylesheet" href="css/product_profile.css">';
	echo '<link rel= "stylesheet" href="css/paymentProcess.css">';
	echo "</head>";
	include "header2.php";
	include "profileLoginHeader.php";
	//for storing the quantity required
	echo "<div id='content'>";
	if($_SESSION['pwd']==md5($_POST['pwd'])){
		$con=mysqli_connect("localhost","root","","artesania");
		if(!$con){
			die("Connection error".mysqli_connect_error());
		}
		$date=date("Y-m-d");
		$time=date("H:i:s", time());
		$query="update bank set amount=(amount-".$_SESSION['amount'].") where username='".$_SESSION['username']."'";
		$query1="update bank set amount=(amount+".$_SESSION['amount'].") where username='".$_SESSION['seller']."'";
		$query2="insert into transaction (buyer,date,time,product_id,quantity,amount) values ('".$_SESSION['username']."','".$date."','".$time."',".$_SESSION['product_id'].",".$_SESSION['quantity'].",".$_SESSION['amount'].")";
		$query3="select max(trans_id) from transaction";
		$result3=mysqli_query($con,$query3);
		$row2=mysqli_fetch_array($result3);
		if((mysqli_query($con,$query))&& (mysqli_query($con,$query1)) && (mysqli_query($con,$query2)) ){
			echo "<div >
			<table id='congo_table'>
			<tr>
			<td text-align='center'><p id='congo'>Congratulations! The transaction is complete.</p></td>
			</tr>
			<tr>
			<td text-align='center'><p id='congo'>Your transaction ID is ".$row2['max(trans_id)']."</p></td>
			</tr>
			<tr>
			<td><p>The product will be delivered within three working days.If you have any query related to transaction, you can <a href='forum.php'>contact us</a></p></td>
			</tr>
			<tr>
			<td><button id='another_trans' name='another_trans' onclick="."location.href='shop.php';".">Perform Another Transaction</button></td>
			</tr>
			</table>
			</div>";
		}
		else{
			echo "some error";
		}

	}
	else{
		echo "<p id='congo'>Authentication Failed.Please try again.</p>";
	}
?>
	</div> <!--close content -->
	<div class="clear"></div>
</div> <!--close main-->
<?php 
include "footer.php";
?>
</div> <!--close container-->
</body>
</html>