<div class="content">
    <h1>Rezervacije</h1>
    <div class="gal-content">    
        <table id="mainTable" class="table">
            <thead>
            <tr>
                <th>Drzava</th>
                <th>Kontinent</th>
                <th>Cena</th>
                <th>Ime</th>
                <th>Prezime</th>
                <th>Email</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            <?php
                
                $query = "SELECT * FROM korisnik k INNER JOIN reservation r ON k.id_korisnik = r.korisnik_id";

                $result = $konekcija->prepare($query);
                if($result->execute()){
                    $result = $result->fetchAll();
                }
                
                foreach($result as $reservation):
            ?>

            <tr>
                <td><?= $reservation->country ?></td>
                <td><?= $reservation->continent ?></td>
                <td><?= $reservation->price ?></td>
                <td><?= $reservation->ime ?></td>
                <td><?= $reservation->prezime ?></td>
                <td><?= $reservation->email ?></td>
                <td><a href="php/delete_destinacion.php" id="<?= $reservation->id_reservation?>">Delete</a></td>
            </tr>

            <?php
                endforeach;
            ?>
            </tbody>
        </table>       
    </div>
</div>