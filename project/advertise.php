<?php
include 'header.html';

//include any specific css file
echo '<link rel= "stylesheet" href="css/contentAlign.css">';
echo "	<style>
		#tbl tr{
			font-size:12px;
			font-weight:bold;
		}
		#tbl tr td h1{
			color:#808080;
			padding-top:10px;
		}
		
		#policy_tr td{
			min-width:180px;
		}
		
		#support_td{
			width:160px;
		}
	</style>
	
</head>";
include "header2.php";
include "profileLoginHeader.php";

?>
				<div id = "content">
					<form method="post" action="adProcess.php" enctype="multipart/form-data">
						<table id="tbl" align="center">
							<tr>
										<td><h1>AdCast POSTS YOUR AD ON THE MEMBERS' PROFILE</h1></td>
									</tr>
									<tr >
										<td><img src="images/ad_exmple.jpeg"></img></td>
										<td id="support_td">Supported formats are png, jpg, jpeg and gif</td>
									</tr>
									 <tr id="policy_tr">
									    <td>Choose the Pricing Policy</td>	    
									     <td><input type="radio" name="max_clicks" value="50">Rs.25 for 50 ad views</td>
									     <td><input type="radio" name="max_clicks" value="150">Rs.50 for 150 ad views</td>
									     <td><input type="radio" name="max_clicks" value="1000">Rs.100 for 1000 ad views</td>
									 </tr>
									<tr>
										<td>Start Date</td>
									</tr>
									<tr>   
										
										<td>
											<select name=birthMonth>
												<option value="">Month</option>
												<option value="1">January</option>
												<option value="2">February</option>
												<option value="3">March</option>
												<option value="4">April</option>
												<option value="5">May</option>
												<option value="6">June</option>
												<option value="7">July</option>
												<option value="8">August</option>
												<option value="9">September</option>
												<option value="10">October</option>
												<option value="11">November</option>
												<option value="12">December</option>
											</select>	
											<select name=birthDay>
												<option value="">Day</option>
												<option value="1">1</option>
												<option value="2">2</option>
												<option value="3">3</option>
												<option value="4">4</option>
												<option value="5">5</option>
												<option value="6">6</option>
												<option value="7">7</option>
												<option value="8">8</option>
												<option value="9">9</option>
												<option value="10">10</option>
												<option value="11">11</option>
												<option value="12">12</option>
												<option value="13">13</option>
												<option value="14">14</option>
												<option value="15">15</option>
												<option value="16">16</option>
												<option value="17">17</option>
												<option value="18">18</option>
												<option value="19">19</option>
												<option value="20">20</option>
												<option value="21">21</option>
												<option value="22">22</option>
												<option value="23">23</option>
												<option value="24">24</option>
												<option value="25">25</option>
												<option value="26">26</option>
												<option value="27">27</option>
												<option value="28">28</option>
												<option value="29">29</option>
												<option value="30">30</option>
												<option value="31">31</option>
											</select>	
											<select name=birthYear>
												<option value="">Year</option>
												<option value="2013">2013</option>
												<option value="2012">2012</option>
												<option value="2011">2011</option>
												<option value="2010">2010</option>
												<option value="2009">2009</option>
												<option value="2008">2008</option>
												<option value="2007">2007</option>
												<option value="2006">2006</option>
												<option value="2005">2005</option>
												<option value="2004">2004</option>
												<option value="2003">2003</option>
												<option value="2002">2002</option>
												<option value="2001">2001</option>
												<option value="2000">2000</option>
												<option value="1999">1999</option>
												<option value="1998">1998</option>
												<option value="1997">1997</option>
												<option value="1996">1996</option>
												<option value="1995">1995</option>
												<option value="1994">1994</option>
												<option value="1993">1993</option>
												<option value="1992">1992</option>
												<option value="1991">1991</option>
												<option value="1990">1990</option>
											</select>	

										</td>
									</tr>
									<tr>
										<td><input type="text" name="web_url" placeholder="Website URL of uploaded file"></input></td>
									</tr>
									<tr>
										<td><label for="file">Filename:</label></td>
										<td><input type="file" name="file" id="file"></td>
									</tr>
									<tr>
										<td><input type="submit" value="UPLOAD MY AD" class="button" ></input></td>								<tr>
									</tr>
									</tr>
						</table>
					</form>
				</div>
				<div class="clear"></div>
			</div><!--div main close-->
<?php 
include "footer.php";
?>
		</div><!--div container close-->
	</body>
</html>
				
