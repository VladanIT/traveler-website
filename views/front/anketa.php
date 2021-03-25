<header id="gtco-header" class="gtco-cover gtco-cover-sm" role="banner" style="background-image: url(slike/travel.jpg)">
		<div class="overlay"></div>
		<div class="gtco-container">
			<div class="row">
				<div class="col-md-12 col-md-offset-0 text-center">
					<div class="row row-mt-15em">

						<div class="col-md-12 mt-text animate-box" data-animate-effect="fadeInUp">
							<h1>Anketa</h1>	
						</div>
						
					</div>
					
				</div>
			</div>
		</div>
	</header>
	
	<div class="gtco-section">
		<div class="gtco-container">
			
			<div class="row">
                <div class="panel-body">
                    <div class="col-md-6">
                        <form method="POST" id="poll_form" action="">
                            <h3>Da li Vam se dopada turisticka agencija? Ocenite!</h3>
                            <br />
                            <div class="radio">
                                <label><h4><input type="radio" name="poll_option" class="poll_option" value="5" /> Odličan</h4></label>
                            </div>
                            <div class="radio">
                                <label><h4><input type="radio" name="poll_option" class="poll_option" value="4" /> Veoma dobar</h4></label>
                            </div>
                            <div class="radio">
                                <label><h4><input type="radio" name="poll_option" class="poll_option" value="3" /> Nije loš</h4></label>
                            </div>
                            <div class="radio">
                                <label><h4><input type="radio" name="poll_option" class="poll_option" value="2" /> Prilično loš</h4></label>
                            </div>
                            <div class="radio">
                                <label><h4><input type="radio" name="poll_option" class="poll_option" value="1" /> Loš</h4></label>
                            </div>
                            <br />
                            <input type="submit" name="poll_button" id="poll_button" class="btn btn-primary" value="Potvrdi" />
                        </form>
                        <br />
                    </div>
                    <div class="col-md-6">
                        <br />
                        <br />
                        <br />
                        <h4>Rezultati</h4><br />
                        <div id="poll_result"></div>




                        <?php

                            if(isset($_POST["poll_option"])) {

                                $query = "INSERT INTO anketa (ocena) VALUES (:ocena)";
                                
                                $data = array(':ocena'  => $_POST["poll_option"]);

                                $statement = $konekcija->prepare($query);
                                $statement->execute($data);

                            }

                            $ocena = array("5", "4", "3", "2", "1");

                            $total_poll_row = get_total_rows($konekcija);

                            $output = '';

                            if($total_poll_row > 0){
                                foreach($ocena as $row){

                                    $query = "SELECT * FROM anketa WHERE ocena = '".$row."'";

                                    $statement = $konekcija->prepare($query);
                                    $statement->execute();
                                    $total_row = $statement->rowCount();

                                    $percentage_vote = round(($total_row/$total_poll_row)*100);
                                    $progress_bar_class = '';

                                    if($percentage_vote >= 40){
                                        $progress_bar_class = 'progress-bar-success';
                                    }
                                    else if($percentage_vote >= 25 && $percentage_vote < 40){
                                        $progress_bar_class = 'progress-bar-info';
                                    }
                                    else if($percentage_vote >= 10 && $percentage_vote < 25){
                                        $progress_bar_class = 'progress-bar-warning';
                                    }
                                    else{
                                        $progress_bar_class = 'progress-bar-danger';
                                    }
                                    $output .= '
                                    <div class="row">
                                        <div class="col-md-2" align="right">
                                            <label>'.$row.'</label>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="progress">
                                                <div class="progress-bar '.$progress_bar_class.'"%" role="progressbar" aria-valuenow="%"'.$percentage_vote.'"%" aria-valuemin="0" aria-valuemax="100" style="color:black" style="width:'.$percentage_vote.'"%">'.$percentage_vote.'%  <b></b> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    ';
                                }
                            }

                            echo $output;


                            function get_total_rows($konekcija)
                            {
                                $query = "SELECT * FROM anketa";
                                $statement = $konekcija->prepare($query);
                                $statement->execute();
                                return $statement->rowCount();
                            }            
                        
                        ?>


                    </div>
                </div>
                
                
                <br />
                <br />
                    <!-- </div> -->
                <!-- </div> -->
			</div>

		</div>
	</div>