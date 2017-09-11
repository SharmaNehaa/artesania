<?php
include 'header.html';
//include any specific css file
echo '<link rel= "stylesheet" href="css/product_profile.css">';
echo '<link rel= "stylesheet" href="css/shop_product.css">';
echo '<link rel= "stylesheet" href="css/contentAlign.css">';
echo '<link rel= "stylesheet" href="css/payment_gateway.css">';
echo '
	<style>
		#main{
			background-color:rgba(247, 236, 236, 0.88);
			height:350px;
		}
	</style>
';
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
		if(($_POST['account_no']==$row['bank_acc_no'])&&($_POST['bank_name']==$row['bank_name']) ){		
				echo
				"<div id='content'>
						<form id='pwd_form' method='post' action='adFinalProcess.php'>
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
									<td>".$_SESSION['price']."</td>	
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
				</div>";

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