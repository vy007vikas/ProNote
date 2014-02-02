<?php

	session_start();

	if(!isset($_SESSION['userid'])){
		header("Location:../index.php");
	}


	function printName(){
		//Printing the name of the user
		include('../config.inc');
		$resultprintName = $link->prepare('SELECT * FROM userdata WHERE userid=:vuserid');
		$resultprintName->bindParam(':vuserid',$_SESSION['userid']);
		$resultprintName->execute();
		$resultnamerow = $resultprintName->fetch(PDO::FETCH_ASSOC);
		echo $resultnamerow['name'];
	}

	function showNotes(){
		//Displaying the notes of the user
		include('../config.inc');
		$resultshowNotes = $link->prepare('SELECT * FROM allNotes WHERE userid=:userid');
		$resultshowNotes->bindParam(':userid',$_SESSION['userid']);
		$resultshowNotes->execute();
		if($resultshowNotes->rowCount()==0){
		} else {
			while($arrayvar = $resultshowNotes->fetch(PDO::FETCH_ASSOC)){
				//Display one by one all the notes by forming div as shown
				$myvar = $arrayvar['index'];
				echo "<div class='note' id='" . $myvar . "'>";
				echo "<div class='heading'>";
				echo $arrayvar['heading'] . "<br>";
				echo "</div>";
				echo "<img src='../images/temp/delete.png' onclick='deleteNote(" . $myvar . ")'>";
				echo "<div class='data'>";
				echo $arrayvar['data'];
				echo "</div>";
				echo "</div>";
			}
		}
	}

?>

<html>
	<head>
		<title>ProNote</title>
		<link rel="stylesheet" type="text/css" href="./userBoard.css">
		<link rel="stylesheet" type="text/css" href="../fonts/web-fonts.css">
		<link rel="stylesheet" type="text/css" href="../pure-rollup.css">
		<script src="../index.js"></script>
		<script src="../jquery-1.10.2.min.js"></script>
		<script>
		
		function addNote(){
			var data = document.getElementById('newnotedata').value;
			var heading = document.getElementById('newnoteheading').value;
			console.log(heading, data)
			if(!((heading=='' || heading==null)&&(data=='' || data==null))){
				$.ajax({
					url: "./addNote.php",
					type: 'POST',
					data: {
						heading: heading,
						data: data
					},
					success:function(received){
						if(!(received==0)){
							//If there was no problem enetering the note in the database
							//make a new div for the note
							var newdiv = '<div class="note" id="' + received +'">';
							newdiv += '<div class="heading">' + heading + '</div>';
							newdiv += "<img src='../images/temp/delete.png' onclick='deleteNote(" + received + ")'>";
							newdiv += '<div class="data">' + data + '</div>';
							newdiv += '</div>';
							$('#allnotes').append(newdiv);
							$('#newnoteheading').val('');
							$('#newnotedata').val('');
						}						
					}
				});
			}
		}

		function deleteNote(myVar){
			$.ajax({
				url: "./delNote.php",
				type: 'POST',
				data: {
					index: myVar
				},
				success:function( data ){
					$("#"+myVar).hide();
					console.log(data);
				},
				error: function(data) {
					console.log(data);
				}
			});
		}

		</script>
	</head>
	<body>
		<div class="topbar">
			<span class="heading">ProNote</span>
			<div class="userButtons">
				<button class="pure-button" onclick="loadmyprofile()" style="text-transform:uppercase;"><?php printName() ?></button>
				<button class="pure-button pure-button-primary" onclick="gotologout()">LOG OUT</button>
			</div>
		</div>
		<div class="content">
			<div class="addnewnote">
				<div class="pure-form pure-form-stacked">
					<legend><b>ADD NEW NOTE</b></legend>
 					<input type="text" id="newnoteheading" name="heading" placeholder="Title" required>
					<textarea name="data" id="newnotedata" name="data" placeholder="Your notes here" required></textarea>
					<button class="pure-button pure-button-primary addnote" onclick="addNote()">ADD</button>
				</div>
			</div>
			<div id="allnotes">
				<?php showNotes(); ?>
			</div>
		</div>
		<div class="bottombar">
			&copy; SDSLABS
		</div>
	</body>
</html>