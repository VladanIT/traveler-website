<div class="content">
    <h1>Meni</h1>
    <form action="php/insert_destinacion.php" method="post" enctype="multipart/form-data" class="form-admin-gallery"></br>
        <input name="tbLink" type="text" placeholder="Link" class="title"></br>
        <input name="tbPutanja" type="text" placeholder="Putanja" class="title"></br>
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
                <th>Stavka</th>
                <th>Putanja</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            <?php
                
                $query = "SELECT * FROM nav";

                $result = $konekcija->prepare($query);
                if($result->execute()){
                    $result = $result->fetchAll();
                }
                
                foreach($result as $menu):
            ?>

            <tr>
                <td><?= $menu->name ?></td>
                <td><?= $menu->href ?></td>
                <td><a href="php/delete_destinacion.php" id="<?= $menu->id_menu?>">Delete</a></td>
            </tr>

            <?php
                endforeach;
            ?>
            </tbody>
        </table>       
    </div>
</div>