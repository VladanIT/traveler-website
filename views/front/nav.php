<body>
		
	<div class="gtco-loader"></div>
	
	<div id="page">

	
	<!-- <div class="page-inner"> -->
	<nav class="gtco-nav" role="navigation">
		<div class="gtco-container">
			
			<div class="row">
				<div class="col-sm-4 col-xs-12">
					<div id="gtco-logo"><a href="index.php?page=home">Traveler <em>.</em></a></div>
				</div>
				<div class="col-xs-8 text-right menu-1">
					<ul>
						<?php
						
							$query = "SELECT * FROM nav";

							$result = $konekcija->prepare($query);
							if($result->execute()){
								$result = $result->fetchAll();
							}
							
							foreach($result as $menu):

						?>

						<li><a href="<?= $menu->href ?>"><?= $menu->name ?></a></li>

						<?php
							endforeach;
						?>

						<?php if(isset($_SESSION['user']) || isset($_SESSION['admin'])):?>
							<a href="index.php?page=anketa">Anketa</a>
							<li><a href="php/logout.php">Odjava</a></li>
						<?php endif; ?>
						<?php if(isset($_SESSION['admin'])):?>
							<li><a href="admin.php">Admin Panel</a></li>
						<?php endif; ?>
					</ul>	
				</div>
			</div>
			
		</div>
	</nav>