<?php
include 'header.html';
//include any specific css file


echo '<link rel= "stylesheet" href="css/payment_gateway.css">';
echo '<link rel= "stylesheet" href="css/contentAlign.css">';

echo "</head>";
include "header2.php";
include "profileLoginHeader.php";
?>
	<div id="content">
	<?php 
		$con=mysqli_connect("localhost","root","","artesania");
		if(!$con){
			die("Connection error".mysqli_connect_error());
		}
		$query="select * from bank where username='".$_SESSION['username']."'";
		$result=mysqli_query($con,$query);
		$row=mysqli_fetch_array($result);
		$_SESSION['pwd']=$row['password'];
		$amount=$_POST['quantity']*$_SESSION['price'];
		$_SESSION['amount']=$amount;
		$_SESSION['quantity']=$_POST['quantity'];
		if(($_POST['account_no']==$row['bank_acc_no'])&&($_POST['bank_name']==$row['bank_name']) ){		
				echo
				"
						<form id='pwd_form' method='post' action='paymentProcess.php'>
							 <fieldset>
							  <legend>Payment Gateway</legend>
							  <table id='pwd_table'>
							  <tr>	<td>Account Number :</td>
									<td>".$_POST['account_no']."</td>	
							  </tr>
							  <tr>	<td>Account Holder :</td>
									<td>".$_SESSION['username']."</td>	
							  </tr>
							  <tr>	<td>Amount Payable :</td>
									<td>".$amount."</td>	
							  </tr>
							  <tr>	<td>Password :</td>
									<td><input type='password' name='pwd'></input></td>	
							  </tr>
							  <tr>
							  <td><input type='submit' name='submit' value='PAY NOW'></input></td>
							  </tr>
							  </table>
							 </fieldset>
						</form>
				";

		}
		else{
			echo "Account holder could not be veified.Please try again.";
		}
	?>
	</div>
	<div class="clear"></div>
</div> <!--close main-->
<?php 
include "footer.php";
?>
</div> <!--close container-->
</body>
</html>