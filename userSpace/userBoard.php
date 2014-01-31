<?php

	session_start();

	if(!isset($_SESSION['userid'])){
		header("Location:../index.php");
	}

	function printName(){
		include('../config.inc');
		$resultprintName = $link->query("select * from userdata where idno='$_SESSION[userid]'");
		$rowprintName = mysqli_fetch_array($resultprintName);
		echo $rowprintName['name'];
	}

	function showNotes(){
		include('../config.inc');
		$resultshowNotes = $link->query("select * from allNotes where idno='$_SESSION[userid]'");
		$noofrowshowNotes = mysqli_num_rows($resultshowNotes);
		if($noofrowshowNotes==0){
		} else {
			while($arrayvar = mysqli_fetch_array($resultshowNotes)){
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
		<script src="../jquery.parallax-1.1.3.js"></script>
		<script src="../jquery.localscroll-1.2.7-min.js"></script>
		<script src="../jquery.scrollTo-1.4.2-min.js"></script>
		<script>
		
		function addNote(){
			var data = document.getElementById('newnotedata').value;
			var heading = document.getElementById('newnoteheading').value;
			console.log(heading, data)
			if(!((heading=='' || heading==null)&&(data=='' || data==null))){
				$.ajax({
					url: "./addNote.php",
					type: 'POST',
					data: 'heading='+heading+'&data='+data,
					success:function(received){
						received = JSON.parse(received);
						var newdiv = '<div class="note" id="' + received[1] +'">';
						newdiv += '<div class="heading">' + received[0] + '</div>';
						newdiv += "<img src='../images/temp/delete.png' onclick='deleteNote(" + received[1] + ")'>";
						newdiv += '<div class="data">' + received[2] + '</div>';
						newdiv += '</div>';
						$('#allnotes').append(newdiv);
						$('#newnoteheading').val('');
						$('#newnotedata').val('');
					}
				});
			}
		}

		function deleteNote(myVar){
			$.ajax({
				url: "./delNote.php",
				type: 'POST',
				data: 'index='+myVar,
				success:function(){
					$("#"+myVar).hide();
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