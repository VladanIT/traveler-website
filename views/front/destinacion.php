	<header id="gtco-header" class="gtco-cover gtco-cover-sm" role="banner" style="background-image: url(slike/travel.jpg)">
		<div class="overlay"></div>
		<div class="gtco-container">
			<div class="row">
				<div class="col-md-12 col-md-offset-0 text-center">
					<div class="row row-mt-15em">

						<div class="col-md-12 mt-text animate-box" data-animate-effect="fadeInUp">
							<h1>Destinacije</h1>	
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
					<h2>Putuj na omiljene destinacije</h2>
					<p>Pogledajte nase destinacije i rezervisite odmah put!</p>
				</div>
			</div>
			<div class="row">
				<?php
                    
                    $query = "SELECT * FROM destinacions";

                    $result = $konekcija->prepare($query);
                    if($result->execute()){
                        $result = $result->fetchAll();
                    }
                    
                    foreach($result as $destinacion):
                ?>
				<div class="col-lg-4 col-md-4 col-sm-6 packs">
					<div class="fh5co-card-item">
						<figure>
							<div class="overlay"><i class="ti-plus"></i></div>
							<img src="<?= $destinacion->picture ?>" alt="<?= $destinacion->name ?>" class="img-responsive">
						</figure>
						<div class="fh5co-text">
							<h2><?= $destinacion->country ?>, <?= $destinacion->continent ?></h2>
							<p><?= $destinacion->about ?></p>
							<p>$<?= $destinacion->price ?></p>
							<?php include "php/reservation.php" ?>
							<?php if(isset($_SESSION['user']) || isset($_SESSION['admin'])):?>
							<form action="php/reservation.php" method="POST">
							<input type="text" class="hidden" value="<?php if(isset($_SESSION['user'])){ echo $_SESSION['user']->id_korisnik; } else{ echo $_SESSION['user']->id_korisnik; } ?>"/>
								<input type="submit" class="btn btn-primary" value="<?= $destinacion->id_destinacion ?>" name="btnReserv"/>
							</form>
							<?php endif; ?>
							<?php if(!isset($_SESSION['user']) && !isset($_SESSION['admin'])):?>
								<p>Prijavite se da bi ste rezervisali.</p>
							<?php endif; ?>
						</div>
					</div>
				</div>

				<?php
                    endforeach;
                ?>
				
			</div>
		</div>
	</div>