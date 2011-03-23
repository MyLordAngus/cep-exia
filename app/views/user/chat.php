
<div class="grid_16" id="contenu">
	<div class="grid_1 alpha">&nbsp;</div>
    <div class="grid_15 omega" id="discussion">
		<h3>
			<?php echo "Conversation entre {$relation->Prestataire->prenom} 
						{$relation->Prestataire->nom} et 
						{$relation->Entreprise->raisonSoc}";
			?>
		</h3>
		<?php
		$boiteVide = '<div class="grid_6 alpha"><p class="grid_6"></p></div>';
		$form = '<div class="grid_8 omega"><form action="'.URL_BASE.'index.php/chat_controller/post/'.$relation->id.'" method="post">
					<p><textarea id="post" name="post" cols="160" rows="4">
					</textarea></p>
					<p><input type="submit" value="Poster"/></p>
					<script>
						CKEDITOR.replace( "post", {toolbar : "Basic", width : 470, height: 100} );
					</script>
				</form></div>';
		echo $boiteVide;
		echo $form;
		$i = 0;
		foreach($relation->listeMessages as $m){
			$boite = '<div class="grid_8 omega radius-5 shadow-5">
							<h6 >'.$m->Compte->login.' : </h6>
							<div class="grid_7">'.$m->message.'</div>
							<span class="grid_6">'.date('\l\e d/m/Y : H\H', $m->date).'</span>
						</div>';
			if($i%2 == 0){
				echo $boite;
				echo $boiteVide;
			}else{
				echo $boiteVide;
				echo $boite;
			}
			echo '<p  class="grid_15"></p>';
			$i++;
		}
		?>
	</div>
	<p class="grid_15"></p>
	<div class="grid_1 alpha">&nbsp;</div>
    <div class="grid_15 omega" id="discussion">
		
	</div>
</div>
