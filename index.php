<html>
  <head>
     <?php
		require("head.php"); 
		include('function.php');
 		if ($_GET || $_SERVER['HTTP_REFERER']) {
		unset($adressen[$_GET['id']]);
		jsonSave($filename, $adressen);
		 
		}
     ?>
  </head>
  <body>
  	<div class="container">
		<?php require("navbar.php"); ?>
	</div>

	<div class="container trans">
		<i class="fa fa-home" aria-hidden="true"></i>  Home 
		<input type="text" class="suchen pull-right" placeholder="Suchen...">
	</div>
	<div class="container adres">
		<h2>Adressen</h2>
		<table class="table table-striped"  id="tbl">
		  <thead>
		    <tr>
		      <th>Anrede</th>
		      <th>Vorname</th>
		      <th>Name</th>
		      <th>Ort</th>
		      <th colspan="3"></th>
  		    </tr>
		  </thead>
		  <tbody>
		  	<?php if(empty($adressen)) {echo "<h3 class='alert alert-danger'>Kein Eintrag</h3>";}else{ ?>
			<?php foreach ($adressen as $key => $value) {	?>
 			    <tr>
			      <th scope="row"><?php echo ucfirst($value["Geschlecht"]);?></th>
			      <td><?php echo $value["Vorname"];?></td>
			      <td><?php echo $value["Name"];?></td>
			      <td><?php echo $value["Ort"];?></td>
			      <td class="pull-right"><a href="form.php?id=<?php echo $key;?>"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>
			      <td class="pull-right"><a href="single.php?id=<?php echo $key;?>"  ><i class="fa fa-eye" aria-hidden="true"></i></a></td>
 			    </tr>
  			<?php } } ?>
 		  </tbody>
		</table>
 
	</div>
	<script>
        

	$(document).ready(function(){
	    $('.suchen').on('keyup',function(){
	        var searchTerm = $(this).val().toLowerCase();
	        $('#tbl tbody tr').each(function(){
	            var lineStr = $(this).text().toLowerCase();
	            if(lineStr.indexOf(searchTerm) === -1){
	                $(this).hide();
	            }else{
	                $(this).show();
	            }
	        });
	    });
	});
	</script>
   </body>
</html>
