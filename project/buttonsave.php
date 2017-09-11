
paint.php
<div class = "picture_areas" id="area1">
	<input type="button" name="button1" id="bAbout" value="About" onclick='displayForm()'></input>
</div>
<div class = "picture_areas" id="area2">
	<input type="button" name="button2" id ="bPicture" value="Profile picture onclick='displayForm()'"></input>									
</div>
<div class = "picture_areas" id="area3">
	<input type="button" name="button3" id="bInterest" value="Interests" onclick='displayForm()'></input>									
</div>


paint.php
<img src="images/happy-lightbulb.jpg"></img>

register.js
function displayForm() {

    if (arguments.callee.caller.toString()=="bAbout") {
        document.getElementById('aboutForm').style.display = 'block';
    } else if(arguments.callee.caller.toString()=="bInterest")
    {
        document.getElementById('interestForm').style.display = 'block';
    }
	else {
	    document.getElementById('pictureForm').style.display = 'block';
	}
}
