<div class="content">
    <h1>Galerija</h1>
    <form action="php/insert_picture.php" method="post" enctype="multipart/form-data" class="form-admin-gallery"></br>
        <input name="tbTitle" type="text" placeholder="Title" class="title"></br>
        <label for="picture" class="picture">Slika:</label>
        <input name="picture" type="file" id="picture"></br>
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
                <th>Title</th>
                <th>Picture</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            <?php
                
                $query = "SELECT * FROM gallery";

                $result = $konekcija->prepare($query);
                if($result->execute()){
                    $result = $result->fetchAll();
                }
                
                foreach($result as $picture):
            ?>
            <tr>
                <td><?= $picture->alt ?></td>
                <td>
                    <div class="photo">
                        <a class="fancybox" rel="group" href="<?= $picture->putanja ?>"><img class="gal-photo" alt="<?= $picture->alt ?>" src="<?= $picture->putanja ?>"/></a>
                    </div>
                </td>
                <td><a href="">Edit</a></td>
                <td><a href="php/delete_picture.php" id="<?= $picture->id_slika?>">Delete</a></td>
            </tr>
            <?php
                endforeach;
            ?>
            </tbody>
        </table>       
    </div>
</div>