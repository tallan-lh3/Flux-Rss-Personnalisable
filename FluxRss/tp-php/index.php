<?php
// Permet l'affichage de la date en français
setlocale(LC_TIME, "fr_FR");

$numberOfItemx = 5;
if (isset($_POST['items3'])) {
  $numberOfItemx = 3;
};
if (isset($_POST['items8'])) {
  $numberOfItemx = 8;
};
if (isset($_POST['items5'])) {
  $numberOfItemx = 5;
};
// La fonction génère les cards et crée leur modal
function sortItems($subjectColor, $url, $numberOfItemsDisplayed)
{
    $rss = simplexml_load_file($url); ?>
    <div>
        <?php $itemsCounter = 0;
            foreach ($rss->channel->item as $item) {
                $itemsCounter++;
                // Lorsque le compteur dépasse le nombre d'articles souhaités par l'utilisateur, on sort de la fonction
                if ($itemsCounter > $numberOfItemsDisplayed) {
                    break;
                } else {
                    // Variables pour formater la date en toutes lettres et en français
                    $datetime = date_timestamp_get(date_create($item->pubDate));
                    $date = utf8_encode(strftime('%d %B %Y &agrave %Hh%I', $datetime)); ?>
                <!-- Génération des fiches articles -->
                <div class="d-flex mb-3">
                    <div>
                        <div style="width: 35px; height: 35px; border-radius: 25%; margin-right: 5px; background-color:<?= $subjectColor; ?>">
                        </div>
                    </div>
                    <div >
                        <a target="_blank" class=""><?= $item->title; ?></a>
                        <div>
                            <button id="loupe" class="btn float-right " data-toggle="modal" data-target="#modal<?= $itemsCounter . $subjectColor; ?>">
                                Loupe
                            </button>
                            <a id="readArticles" target="_blank" class="btn float-right" href="<?= $item->link; ?>">Lire l'article</a>
                        </div>
                    </div>
                </div>
                <!-- Création de la modal -->
                <div class="modal fade" id="modal<?= $itemsCounter . $subjectColor; ?>" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <p class="text-center mt-2"><?= $date; ?></p>
                            <div class="modal-header">
                                <h5 class="modal-title"><?= $item->title; ?></h5>
                                <button type="button" class="close" data-dismiss="modal">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body text-center">
                                <?= $item->description; ?>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                <a target="_blank" class="btn bg-dark text-white" href="<?= $item->link; ?>">Aller vers l'article</a>
                            </div>
                        </div>
                    </div>
                </div>
        <?php }
            } ?>
    </div>
<?php };
?>
<!doctype html>
<html lang="fr">

<head>
    <title>Index - RSS</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

     <!-- Font Awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
<!-- Bootstrap core CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
<!-- Material Design Bootstrap -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.11/css/mdb.min.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/style.css" />
</head>

<body>

    <!--Barre de navigation-->
 
    <ul class="nav nav-pills nav-justified">
        <li class="nav-item">
            <a id="secu" class="nav-link text-info security shadow  m-2" href="pages/security.php"> <b id="security" >Sécurité</b> </a>
        </li>
        <li class="nav-item ">
            <a id="applis" class="nav-link text-info appli shadow m-2" href="pages/software.php"><b id="appli" >Applis, logiciels</b> </a>
        </li>
        <li class="nav-item">
            <a id="game" class="nav-link text-info jeux shadow m-2" href="pages/subject.php"><b id="jeux" >Jeux</b></a>
        </li>
        <li class="nav-item">
        <a id="allsetting" class=" shadow-sm m-2 nav-link text-info bg-warning border border-info rounded navbartext" name="setting" type="submit" href="#">Paramètre</a>
        <span class="float-left  rounded-pill" id="numbersetting">
            
          <form class="float-none" action="" method="post" name="items3"><button type="submit" name="items3" class="shadow border border-info colornumbers text-info rounded-pill m-1 btn">3</button></form>
          <form class="float-none" action="" method="post" name="items5"><button type="submit" name="items5" class="shadow border border-info text-info colornumbers rounded-pill m-1 btn">5</button></form>
          <form class="float-none" action="" method="post" name="items8"><button type="submit" name="items8" class="shadow text-info border border-info rounded-pill colornumbers btn m-1">8</button>
          </form>
        </span>
        <div class="float-right" id="colorsetting">
          <ul>
            <li><button type="submit" id="redblue" class="redblue shadow m-1 btn text-info border border-info colornumbers rounded">Theme1</button></li>
            <li><button type="submit" id="greenyellow" class="shadow m-1 btn text-info border border-info colornumbers rounded">Theme2</button></li>
            <li><button type="submit" id="pinkblack" class="shadow m-1 btn text-info border border-info colornumbers rounded">Theme3</button></li>
            <li><button type="submit" id="remove" class="shadow m-1 text-info border border-info rounded btn colornumbers">Reset</button></li>
          </ul>
          </div>
      </li>

    </ul>
    <p class="text-center p-2 "><img class="img-fluid" src="../assets/img/image-flux.png"/></p>

    <!--CARDS SUJETS-->

    <div class="container-fluid">
        <div class="row mt-2">
            <div class="col-12 d-flex">

                <!--Sujet 1-->

                <div class="card m-3 p-2 " style="width: 30rem;">
                    <ul class="list-group list-group-flush ">
                        <p class="text-center h4 p-1">Sécurité</p>
                        <div class="moove">
                        <p class="text-center text-info"> <b>Dernières infos :</b> </p>
                            <hr>
                        <li  class="list-group-item">
                            <?= sortItems('SkyBlue', 'https://www.01net.com/rss/actualites/securite/', $numberOfItemx); ?>
                        </li>
                        </div>
                    </ul>
                </div>

                <!--Sujet 2-->

                <div class="card m-3 p-2" style="width: 30rem;">
                    <ul class="list-group list-group-flush ">
                        <p class="text-center h4  p-1">Applis, logiciels</p>
                        <div class="moove">
                        <p class="text-center text-info"> <b>Dernières infos :</b> </p>
                        <hr>
                        <li class="list-group-item sujetcard">
                            <?= sortItems('CornflowerBlue', 'https://www.01net.com/rss/actualites/applis-logiciels/', $numberOfItemx); ?>
                        </li>
                        </div>
                    </ul>
                </div>

                <!--Sujet 3-->

                <div class="card m-3 p-2 " style="width: 30rem;">
                    <ul class="list-group list-group-flush ">
                        <p class="text-center h4  p-1 ">
                            Jeux
                        </p>
                        <div class="moove">
                        <p class="text-center text-info"> <b>Dernières infos :</b> </p>
                        <hr>
                        <li class="list-group-item sujetcard p-2">
                            <?= sortItems('LightSeaGreen', 'https://www.01net.com/rss/actualites/jeux/', $numberOfItemx); ?>
                        </li>
                        </div>
                    </ul>
                </div>
            </div>
        </div>
        

        <!-- JQUERY -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <!-- JQUERY UI  -->
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <!-- MON JS +boostrap js -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
  </script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.11/js/mdb.min.js"></script>
  <script src="assets/script.js"></script>
</body>

</html>
