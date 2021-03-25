<div class="content">
    <h1>Rezervacije</h1>
    <div class="gal-content">    
        <table id="mainTable" class="table">
            <thead>
            <tr>
                <th>Ime</th>
                <th>Email</th>
                <th>Naslov</th>
                <th>Poruka</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            <?php
                
                $query = "SELECT * FROM messages";

                $result = $konekcija->prepare($query);
                if($result->execute()){
                    $result = $result->fetchAll();
                }
                
                foreach($result as $message):
            ?>

            <tr>
                <td><?= $message->name ?></td>
                <td><a href="mailto:<?= $message->email ?>"><?= $message->email ?></a></td>
                <td><?= $message->subject ?></td>
                <td><?= $message->message ?></td>
                <td><a href="php/delete_destinacion.php" id="<?= $message->id_message?>">Delete</a></td>
            </tr>

            <?php
                endforeach;
            ?>
            </tbody>
        </table>       
    </div>
</div>