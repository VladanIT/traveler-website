    <header id="gtco-header" class="gtco-cover gtco-cover-md" role="banner" style="background-image: url(slike/plane.png)">
		<div class="overlay"></div>
		<div class="gtco-container">
			<div class="row">
				<div class="col-md-12 col-md-offset-0 text-left">
					

					<div class="row row-mt-15em">
						<div class="col-md-7 mt-text animate-box" data-animate-effect="fadeInUp">
							<h1>Planiraj put bilo gde po svetu.</h1>	
						</div>
						<?php if(!isset($_SESSION['user']) && !isset($_SESSION['admin'])):?>
						<div class="col-md-4 col-md-push-1 animate-box" data-animate-effect="fadeInRight">
							<div class="form-wrap">
								<div class="tab">
									
									<div class="tab-content">
										<div class="tab-content-inner active" data-content="signup">
											<h3>Prijavite se</h3>
											<form method="POST">
												<div class="row form-group">
													<div class="col-md-12">
														<label for="Username">Korisnicko ime</label>
														<input type="text" name="tbUser" id="Username" class="form-control">
													</div>
												</div>
												<div class="row form-group">
													<div class="col-md-12">
														<label for="password">Lozinka</label>
														<input type="password" name="tbPass" id="password" class="form-control">
													</div>
												</div>
												<div class="row form-group">
													<div class="col-md-12">
														<input type="submit" name="btnLogin" class="btn btn-primary btn-block" value="Potvrdi">
													</div>
												</div>
												<div class="row form-group">
													<div class="col-md-12">
														<label><a href="index.php?page=reg">Registrujte se</a></label>
													</div>
												</div>
											</form>	
										</div>										
									</div>

								</div>
							</div>
						</div>
						<?php endif;?>
					</div>
							
					
				</div>
			</div>
		</div>
    </header>
    

    <div id="gtco-counter" class="gtco-section">
		<div class="gtco-container">

			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center gtco-heading animate-box">
					<h2>Naš uspeh</h2>
					<p>Registrujte se, rezervišite i uđite i vi u nasu statistiku.</p>
				</div>
			</div>

			<div class="row">
				
				<div class="col-md-3 col-sm-6 animate-box" data-animate-effect="fadeInUp">
					<div class="feature-center">
						<span class="counter js-counter" data-from="0" data-to="196" data-speed="5000" data-refresh-interval="50">1</span>
						<span class="counter-label">Destination</span>

					</div>
				</div>
				<div class="col-md-3 col-sm-6 animate-box" data-animate-effect="fadeInUp">
					<div class="feature-center">
						<span class="counter js-counter" data-from="0" data-to="97" data-speed="5000" data-refresh-interval="50">1</span>
						<span class="counter-label">Hotels</span>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 animate-box" data-animate-effect="fadeInUp">
					<div class="feature-center">
						<span class="counter js-counter" data-from="0" data-to="12402" data-speed="5000" data-refresh-interval="50">1</span>
						<span class="counter-label">Travelers</span>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 animate-box" data-animate-effect="fadeInUp">
					<div class="feature-center">
						<span class="counter js-counter" data-from="0" data-to="12202" data-speed="5000" data-refresh-interval="50">1</span>
						<span class="counter-label">Happy Customer</span>

					</div>
				</div>
					
			</div>
		</div>
	</div>
    

    <div class="gtco-cover gtco-cover-sm" style="background-image: url(images/img_bg_1.jpg)"  data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="gtco-container text-center">
			<div class="display-t">
				<div class="display-tc">
					<h1>Imamo visok kvalitet usluga koje ce vam se sigurno svideti!</h1>
				</div>	
			</div>
		</div>
	</div>