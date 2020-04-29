<?php
setlocale(LC_TIME, "fr_FR.utf8");
$url = "https://www.01net.com/rss/actualites/jeux/"; /* insérer ici l'adresse du flux RSS de votre choix */
$rss = simplexml_load_file($url);
foreach ($rss->channel->item as $item) {
    $datetime = date_timestamp_get(date_create($item->pubDate));
    $date = strftime('%d %B %Y, %Hh%I', $datetime);
}
?>
<!doctype html>
<html lang="fr">

<head>
    <title>Subject - RSS</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.11/css/mdb.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/style2.css" />
</head>

<body>

    <!--Barre de navigation-->

    <ul class="nav nav-pills nav-justified">
    <li class="nav-item">
            <a class="nav-link text-info shadow  m-2" href="../index.php"> <b id="acceuil">Acceuil</b> </a>
        </li>
        <li class="nav-item">
        <a id="acceuilbg" class="nav-link text-info shadow  m-2" href="../index.php"> <b id="acceuil">Acceuil</b> </a>
        </li>
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
        
        <div class="float-right" id="colorsetting">
          <ul>
            <li><button type="submit" id="redblue" class="shadow m-1 btn text-info border border-info colornumbers rounded">Theme1</button></li>
            <li><button type="submit" id="greenyellow" class="shadow m-1 btn text-info border border-info colornumbers rounded">Theme2</button></li>
            <li><button type="submit" id="pinkblack" class="shadow m-1 btn text-info border border-info colornumbers rounded">Theme3</button></li>
            <li><button type="submit" id="remove" class="shadow m-1 text-info border border-info rounded btn colornumbers">Reset</button></li>
          </ul>
          </div>
      </li>

    </ul>

    <!--BOUTON SCROLL TOP-->
    <button class="btn-primary" onclick="topFunction()" id="myBtn" title="Go to top">Top</button>

    <!--CARD HORIZONTALE-->

    <!--Sujet-->
    <section>
        <div class="container py-3">
            <div class="row justify-content-center">
                <div class="col-10">
                    <h1 class=" z-depth-2 d-inline-block px-5">Jeux</h1>
                </div>
                <?php
                foreach ($rss->channel->item as $item) {
                    $datetime = date_timestamp_get(date_create($item->pubDate));
                    $date = strftime('%d %B %Y à %Hh%I', $datetime);
                    $description = explode('<', $item->description);
                    ?>
                    <div class="card col-10 col-lg-10 my-4 example hoverable">
                        <div class="row justify-content-center">
                            <div class="col-12 my-auto col-lg-4 p-3">
                                <img src="<?= (string) $item->enclosure['url'][0] ?>" class="w-100" alt="Photo Rey">
                            </div>
                            <div class=" col-12 col-lg-8 px-3">
                                <div class="card-block px-3">
                                    <h1 class="card-title font-weight-bolder h4"><?= $item->title ?></h1>
                                    <p class="card-text"><?= $description[0] ?></p>
                                    <small class="card-text"><?= $date ?></small>
                                    <a href="<?= $item->link ?>" class="btn btn-primary my-2 float-right bg-dark text-white">Aller vers l'article</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
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
  <script src="../assets/script.js"></script>
</body>

</html>