<div class="content">
    <h1>Korisnici</h1>
    <form action="" method="post" enctype="multipart/form-data" class="form-admin-gallery"></br>
        <input name="ime" type="text" placeholder="Ime" class="title"/>
        <input name="prezime" type="text" placeholder="Prezime" class="title"/>
        <input name="korisnicko_ime" type="text" placeholder="Korisnicko ime" class="title"/>
        <input name="lozinka" type="password" placeholder="Lozinka" class="title"/>
        <input name="uloga" type="text" placeholder="Uloga" class="title"/>
        <input type="submit" value="Dodaj" class="gallery-add"/>
    </form>
    <div class="gal-content">    
        <table id="mainTable" class="table">
            <thead>
            <tr>
                <th>Ime</th>
                <th>Prezime</th>
                <th>Korisnicko ime</th>
                <th>Lozinka</th>
                <th>Uloga</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            <?php
                
                $query = "SELECT * FROM korisnik k INNER JOIN uloga u ON k.uloga_id = u.id_uloga";

                $result = $konekcija->prepare($query);
                if($result->execute()){
                    $result = $result->fetchAll();
                }
                
                foreach($result as $korisnik):
            ?>
            <tr>
                <td><?= $korisnik->ime ?></td>
                <td><?= $korisnik->prezime ?></td>
                <td><?= $korisnik->korisnicko_ime ?></td>
                <td><?= $korisnik->lozinka ?></td>
                <td><?= $korisnik->naziv ?></td>
                <td><a href="">Edit</a></td>
                <td><a href="" id="<?= $korisnik->id_korisnik ?>">Delete</a></td>
            </tr>
            <?php
                endforeach;
            ?>
            </tbody>
        </table>       
    </div>
</div>