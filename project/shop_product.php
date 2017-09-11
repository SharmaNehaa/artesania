<?php

include 'header.html';
//include any specific css file
//echo '<link rel= "stylesheet" href="css/product_profile.css">';

echo '<link rel= "stylesheet" href="css/shop_product.css">';
echo '<link rel= "stylesheet" href="css/contentAlign.css">';

echo "</head>";
include "header2.php";
if(!isset($_SESSION['username'])){
	header("Location:sign_in.php");
}
include "profileLoginHeader.php";
?>
	<div id="content">
		<div id="div_one">
			<div id="div_image">
		<?php
					
					$con=mysqli_connect("localhost","root","","artesania");
					if(!$con){
						die("Connection error".mysqli_connect_error());
					}
					$query="select * from products where path='".$_GET['path']."'";
					$_SESSION['path']=$_GET['path'];
					$result=mysqli_query($con,$query);
					if((mysqli_num_rows($result))>=1){
						$row = mysqli_fetch_array($result);					
							echo "<embed src='".$row['path']."'></embed>";		
					}
					else
						die("23432Some Problem occured in retrieving images from the database");
					$query1="select * from ".$row['category']." where product_id=".$row['product_id']."";
					$result1=mysqli_query($con,$query1);
					if((mysqli_num_rows($result1))>=1){
						$row1 = mysqli_fetch_array($result1);						
					}
					else
						die(" qwewqrSome Problem occured in retrieving images from the database");
						
					$_SESSION['price']=$row1['price'];
					$_SESSION['product_id']=$row['product_id'];
					$_SESSION['seller']=$row['username'];
						
						
		?>
			</div>
			<div id="div_details">
				<table id="details">
					<tr>
						<td>Artist:</td>
						<td><?php echo $row['username'];?></td>
					</tr>
					<tr>
						<td>Category:</td>
						<td><?php echo $row['category']."/".$row1['subcategory']."";?></td>
					</tr>
					<tr>
						<td>Price:</td>
						<td><?php echo $row1['price'];?></td>
					</tr>
					<?php
					if($row1['size']!='') {
						echo "<tr>
						<td>Size:</td>
						<td>". $row1['size']."</td>
					</tr>";
					}
					?>
				</table>
			</div>
		</div>
		<div class="clear"></div>
		
		<div id="bank_div">
			<form id="bank_form" action="payment_gateway.php" method="post">
			<fieldset>
			  <legend>Transaction Details:</legend>
			  <table id="bank_table">
			  <tr>	<td>Bank Name:</td>
					<td><select id="bank_name" name="bank_name" label="Bank Name">
							<option value="default" selected="selected">Select Bank</option>
							<option value="Axis">Axis</option>
							<option value="Canera">Canera</option>
							<option value="HDFC">HDFC</option>
							<option value="ICICI">ICICI</option>
							<option value="PNB">PNB</option>
							<option value="SBI">SBI</option>
							<option value="UTI">UTI</option>
						</select></td>	
			  </tr>
			  <tr>
				  <td>Account Number: </td>
				  <td><input type="text" name="account_no"></td>
			  </tr>
			  <tr>
				  <td>Quantity : </td>
				  <td><input type="text" name="quantity"></td>
			  </tr>
			  <tr id="proceed">
				<td ><input type="submit" name="submit" value="PROCEED" ></input></td>
			  </tr>
			  </table>
			 </fieldset>
			</form>
		</div>	
	</div>
	<div class="clear"></div>
	<?php mysqli_close($con);?>
</div> <!--close main-->
<?php 
include "footer.php";
?>
</div> <!--close container-->
</body>
</html>
