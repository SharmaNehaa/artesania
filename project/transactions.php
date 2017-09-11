<?php
include 'header.html';
//include any specific css file
echo '<link rel= "stylesheet" href="css/sign_in.css">';
echo '<link rel= "stylesheet" href="css/admin_profile.css">';
echo '<link rel= "stylesheet" href="css/forum.css">';
echo '<link rel= "stylesheet" href="css/admin_forum.css">';
echo '<link rel= "stylesheet" href="css/transactions.css">';
echo '<link rel= "stylesheet" href="css/contentAlign.css">';
echo '<style>
		#topic_table{
			
		}
	</style>';

echo "</head>";
include "header2.php";
?>
	<div id="content">
		<div id="query">
					<table id="topic_table">
						<tr id="aa">
							<td>TRANSACTION ID</td>
							<td>BUYER</td>
							<td>TIME</td>
							<td>DATE</td>
							<td>AMOUNT</td>
							<td>PRODUCT ID</td>
							<td>AD ID</td>
							<td>STATUS</td>
							<td>CHANGE STATUS</td>
						</tr>
						<?php
							$con=mysqli_connect("localhost","root","","artesania");
							if(!$con){
								die("Connection error".mysqli_connect_error());
							}
							$query="select * from transaction";
							$result=mysqli_query($con,$query);
							if((mysqli_num_rows($result))>=1){
								while($row=mysqli_fetch_array($result)){
										echo "<tr>";
										echo "<td><p>".$row['trans_id']."</p></td>";
										echo "<td><p>".$row['buyer']."</p></td>";
										echo "<td><p>".$row['time']."</p></td>";
										echo "<td><p>".$row['amount']."</p></td>";
										echo "<td><p>".$row['date']."</p></td>";
										echo "<td><p>".$row['product_id']."</p></td>";
										echo "<td><p>".$row['ad_id']."</p></td>";
										echo "<td><p>".$row['status']."</p></td>";
										echo "<td><button value= 'change_status' type='button' name='change_status' onclick="."location.href='changeStatus.php?trans_id=".$row['trans_id']."&status=".$row['status']."';".">Change Status</button></td>";
										echo "</tr>";
								}
							}
							else
								echo "Transaction history is empty";
						?>
					</table>
		</div>
	</div>
	<div class="clear"></div>

<?php 
include "footer.php";
?>
</div> <!--close container-->
</body>
</html>
