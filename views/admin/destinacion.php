<div class="content">
    <h1>Destinacije</h1>
    <form action="php/insert_destinacion.php" method="post" enctype="multipart/form-data" class="form-admin-gallery"></br>
        <input name="tbTitle" type="text" placeholder="Ime destinacije" class="title"></br>
        <label for="picture" class="picture">Slika:</label>
        <input name="picture" type="file" id="picture"></br>
        <input name="tbPrice" type="text" placeholder="Cena" class="title"></br>
        <input name="taAbout" type="textarea" placeholder="Opis(do 150 karaktera)" class="title"></br>
        <input name="tbContinent" type="text" placeholder="Kontinent" class="title"></br>
        <input name="tbCountry" type="text" placeholder="Drzava" class="title"></br>
        <input type="submit" value="Add" class="gallery-add" name="btnInsert"></br>
    </form>
    <?php
		if(isset($_SESSION['poruka'])){
			echo $_SESSION['poruka'];
		}
	?>
    <div class="gal-content">    
        <table id="mainTable" class="table">
            <thead>
            <tr>
                <th>Ime</th>
                <th>Slika</th>
                <th>Cena</th>
                <th>Opis</th>
                <th>Kontinent</th>
                <th>Drzava</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            <?php
                
                $query = "SELECT * FROM destinacions";

                $result = $konekcija->prepare($query);
                if($result->execute()){
                    $result = $result->fetchAll();
                }
                
                foreach($result as $destinacion):
            ?>
            <tr>
                <td><?= $destinacion->name ?></td>
                <td>
                    <div class="photo-destinacion">
                        <a class="fancybox" rel="group" href="<?= $destinacion->picture ?>"><img class="gal-photo" alt="<?= $destinacion->name ?>" src="<?= $destinacion->picture ?>"/></a>
                    </div>
                </td>
                <td>$<?= $destinacion->price ?></td>
                <td><?= $destinacion->about ?></td>
                <td><?= $destinacion->continent ?></td>
                <td><?= $destinacion->country ?></td>
                <td><a href="">Edit</a></td>
                <td><a href="php/delete_destinacion.php" id="<?= $destinacion->id_destinacion ?>">Delete</a></td>
            </tr>
            <?php
                endforeach;
            ?>
            </tbody>
        </table>       
    </div>
</div>