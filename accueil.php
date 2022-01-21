<?php
require_once 'inc/fonction.php';

$host = 'localhost';
$port = 3306;
$database = 'cbs_php_inter_monteiro';
$user = 'root';
$password = '';

// Connection à la base de donnée cbs
require_once 'inc/login_BDD.php';
$pdoCBS = getInstancePDO($dsn, $user, $password);

// debug($pdoCBS);

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Le Bon Appart</title>
</head>
<body>
    <header class="containeur-fluid">

        <?php
        require_once 'inc/navbar.php';
        ?>

        <h1>Le Bon Appart</h1>
    </header>

    <div class="container">
        <section class="row">
            <?php
            $link = $pdoCBS->query ( " SELECT * FROM advert ORDER BY id DESC LIMIT 0,15 " );
            $details = $link->rowCount();
            echo "<h3>Les $details annonces les plus récente</h3>";
            ?>

<table class="table table-dark table-hover table-striped">
                    <thead class="">
                        <tr>
                            <th class="text-center" style="background-color: darkorange; color: black">Id</th>
                            <th class="text-center">Titre</th>
                            <th class="text-center">Description</th>
                            <th class="text-center">Code postal</th>
                            <th class="text-center">Ville</th>
                            <th class="text-center">Type</th>
                            <th class="text-center">Prix</th>
                            <th class="text-center">Réservation annonce</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($annonce = $link->fetch(PDO::FETCH_ASSOC)) { ?>
                            <tr>
                                <td class="text-center"><?php echo $annonce['id'] ?></td>
                                <td class="text-center"><?php echo strtoupper($annonce['title']) ?></td>
                                <td class="text-center"><?php echo $annonce['description'] ?></td>
                                <td class="text-center"><?php echo $annonce['zip_code'] ?></td>
                                <td class="text-center"><?php echo $annonce['city'] ?></td>
                                <td class="text-center"><?php echo $annonce['type'] ?></td>
                                <td class="text-center"><?php echo $annonce['price'] ?></td>

                                <!-- Si une annonce est réservée on affiche le texte correspondant -->
                                <td class="text-center"><?php
                                                        if ($annonce['reservation_message'] !== null) {
                                                            echo "Annonce réservée";
                                                        } else {
                                                            echo "Annonce non réservée";
                                                        } ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
        </section>
    </div>


    
    <?php
    require_once 'inc/footer.php';
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>