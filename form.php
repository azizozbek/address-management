<html>
<?php 
  		if(@$_SERVER['HTTP_REFERER']) {
 			$id = @$_GET['id'];
		}else{
			header("Location: index.php");
		} 
?>
  <head>
     <?php 
     	include('function.php');
     	require("head.php"); 
     ?>
  </head>
  <body>
   	<div class="container">
		<?php require("navbar.php"); ?>
	</div>
	<div class="container trans">
		<i class="fa fa-home" aria-hidden="true"></i>  <a href="index.php">Home</a> > Erstellen / Bearbeiten
	</div>
	<div class="container adres ">
		<h2>Adresse Einfügen</h2>
 		<form method="post" id="adresForm">
			<div class="form-group row geschlecht">
				<div class="col-6">
					<span class="alert alert-primary">

 			    	    <input type="radio" name="geschlecht" <?php if($adressen[$id]['Geschlecht']=="herr"){echo "checked";}elseif ($adressen[$id]['Geschlecht']=="") {echo "checked";}?> id="herr" value="herr" class="wm" required> <label for="herr"> Herr <i class="fa fa-mars" aria-hidden="true"></i></label>
					</span>
 				</div>
  				<div class="col-6">
					<span class="alert alert-warning">
						<input type="radio" name="geschlecht" id="frau" <?php if($adressen[$id]['Geschlecht']=="frau"){echo "checked";}?> value="frau" class="wm" required /> <label for="frau"> Frau <i class="fa fa-venus" aria-hidden="true"></i></label>
					</span>
   				</div>
			</div>
			<div class="form-group row">
				<div class="col-6">	
			    	<input type="text" class="form-control" id="vorname" name="vorname" placeholder="Vorname" value="<?php echo $adressen[$id]['Vorname']; ?>" required>
				</div>
				<div class="col-6">	
			    	<input type="text" class="form-control" id="name" name="name" placeholder="Name" value="<?php echo $adressen[$id]['Name']; ?>" required>
				</div>
			</div>
			<div class="form-group">
			    <input type="text" class="form-control" id="strasse" name="strasse" placeholder="Strasse/Nr" value="<?php echo $adressen[$id]['Strasse']; ?>" required>
			</div>
			<div class="form-group row">
				<div class="col-6">	
			    	<input type="text" class="form-control" id="plz" name="postleitzahl" placeholder="Postleitzahl" value="<?php echo $adressen[$id]['Postleitzahl']; ?>" required>
				</div>
				<div class="col-6">	
			    	<input type="text" class="form-control" id="ort" name="ort" placeholder="Ort" value="<?php echo $adressen[$id]['Ort']; ?>" required>
			    	<input type="hidden" value="<?php echo $id; ?>" name="id">
				</div>
			</div>
			<div class="form-group">
 			<button onclick="send();return false;" style="cursor: pointer"  id="btn" class="btn btn-outline-success full-size">Speichern</button>                            
  			</div>
 		</form>
 		 <div id="info"></div> 
		<script>

			
			function kapat() {
				$('#info').fadeOut(500);
			}
			function send() {
				var vorname = $('#vorname').val();
				var name 	= $('#name').val();
				var strasse = $('#strasse').val();
				var plz 	= $('#plz').val();
				var ort 	= $('#ort').val();
				var wm 		= $('.wm').val();
				vorname 	= jQuery.trim(vorname);
				name 		= jQuery.trim(name);
				strasse 	= jQuery.trim(strasse);
				ort 		= jQuery.trim(ort);
				plz 		= jQuery.trim(plz);
				 
				  
				if( vorname == "" || name == "" || strasse == "" || ort == "" || plz == ""  || wm == "" ) exit();

 				$('#info').html('<span>Please Wait...</span>');
				$('#info').show(300);
				$.ajax( {
					type: "POST",
					url: "erstellen.php",
					data:$('#adresForm').serialize(),
					success: function(answer) {
						$('#info').show();
						if(answer==''){
							$('#info').html('<div class="alert alert-success">Änderung wurde gespeichert.</div><a href="index.php" class="btn btn-block btn-outline-primary">Person Liste</a>');
						}else{
							$('#info').html('<div class="alert alert-danger">Es gibt ein Problem, entweder machen Sie oder unser Code ist scheiss </span><br /><input  value="Close" type="reset" class="btn btn-block btn-outline-danger" onClick="kapat()" />');
						}
					}
				});
			}
</script>

	</div>


   </body>
</html>
