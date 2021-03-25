    <header id="gtco-header" class="gtco-cover gtco-cover-sm" role="banner" style="background-image: url(slike/travel.jpg)">
		<div class="overlay"></div>
		<div class="gtco-container">
			<div class="row">
				<div class="col-md-12 col-md-offset-0 text-center">
					<div class="row row-mt-15em">

						<div class="col-md-12 mt-text animate-box" data-animate-effect="fadeInUp">
							<h1>Hoteli</h1>	
						</div>
						
					</div>
					
				</div>
			</div>
		</div>
	</header>
	
	<div class="gtco-section">
		<div class="gtco-container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center gtco-heading">
					<h2>Najbolji hoteli</h2>
					<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
				</div>
			</div>
			<div class="row">

				<?php
                    
                    $query = "SELECT * FROM hotels";

                    $result = $konekcija->prepare($query);
                    if($result->execute()){
                        $result = $result->fetchAll();
                    }
                    
                    foreach($result as $hotel):
                ?>
				<div class="col-lg-4 col-md-4 col-sm-6 packs">
					<div class="fh5co-card-item">
						<figure>
							<div class="overlay"><i class="ti-plus"></i></div>
							<img src="<?= $hotel->picture ?>" alt="<?= $hotel->name ?>" class="img-responsive">
						</figure>
						<div class="fh5co-text">
							<h2><?= $hotel->country ?>, <?= $hotel->continent ?></h2>
							<p><?= $hotel->about ?></p>
							<p>$<?= $hotel->price ?></p>
						</div>
					</div>
				</div>

				<?php
                    endforeach;
                ?>

			</div>
		</div>
	</div>