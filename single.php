<?php if($_GET){ ?>
<html>
  <head>
     <?php 
		$id = $_GET['id'];
		include('function.php');
     	require("head.php"); 
     ?>
  </head>
  <body>
  	<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Achtung!</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		      		Willst du wirklich diese Person löschen?
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Nein, sorry</button>
		        <a id="mdel" class="btn btn-primary">Ja, löschen</a>
		      </div>
		    </div>
		  </div>
		</div>
	  	<div class="container">
			<?php require("navbar.php"); ?>
		</div>
		<div class="container trans">
			<i class="fa fa-home" aria-hidden="true"></i>  <a href="index.php">Home</a> > View
		</div>
		<div class="container adres">
			<h2><?php echo html_entity_decode($adressen[$id]['Vorname']) ." ". html_entity_decode($adressen[$id]['Name']); ?> <a data-toggle="modal" data-target="#delete" id="del_id" href="index.php?id=<?php echo $id;?>"><i class="fa fa-trash pull-right" aria-hidden="true"></i></a><a href="form.php?id=<?php echo $id; ?>"><i class="fa fa-pencil pull-right"></i></a></h2>
			<iframe src="https://www.google.com/maps/embed/v1/place?key=AIzaSyCXO4-V7tNkIa8HEoTvlUQk8fkPWjSuGNM&q=<?php echo $adressen[$id]['Strasse'] . ',' . $adressen[$id]['Ort'];?>" width="100%" height="400px" class="map"></iframe>
			<br>
			<h4><?php echo html_entity_decode($adressen[$id]['Ort']);?></h4>
			<p><?php echo html_entity_decode($adressen[$id]['Strasse']) . PHP_EOL . html_entity_decode($adressen[$id]['Postleitzahl']);?></p>
		</div>
   </body>
   <script type="text/javascript">
   	        $( "#mdel" ).click(function() {
            window.location.replace($('#del_id').attr('href')); 
         });
   </script>
</html>
<?php }else{ header("Location: index.php");} ?>