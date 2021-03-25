    <header id="gtco-header" class="gtco-cover gtco-cover-sm" role="banner" style="background-image: url(slike/travel.jpg)">
		<div class="overlay"></div>
		<div class="gtco-container">
			<div class="row">
				<div class="col-md-12 col-md-offset-0 text-center">
					<div class="row row-mt-15em">

						<div class="col-md-12 mt-text animate-box" data-animate-effect="fadeInUp">
							<h1>Galerija</h1>	
						</div>
						
					</div>
					
				</div>
			</div>
		</div>
	</header>
	
	<div class="gtco-section">
		<div class="gtco-container">
			
			<div class="row">
                <?php
                    
                    $query = "SELECT * FROM gallery";

                    $result = $konekcija->prepare($query);
                    if($result->execute()){
                        $result = $result->fetchAll();
                    }
                    
                    foreach($result as $picture):
                ?>
				
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="pack">
                        <a class="fancybox" rel="group" href="<?= $picture->putanja ?>"><img class="pack" alt="<?= $picture->alt ?>" src="<?= $picture->putanja ?>"/></a>
                    </div>
				</div>
                
                <?php
                    endforeach;
                ?>
			</div>

		</div>
	</div>