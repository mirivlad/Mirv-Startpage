<?php
include "vars.php";
include "quotes.php";
include "get_fav.php";
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <title>New Tab</title>
  <meta charset="utf-8"/>

  <link rel="shortcut icon" href="./assets/img/fav.png"/>
  <link type="text/css" rel="stylesheet" href="./assets/css/style.css" media="screen, projection"/>
  <script src="./assets/js/iconify.js" type="text/javascript"></script>
  <script src="./assets/js/jquery.js" type="text/javascript"></script>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
</head>
<body>
    <main id="container" class="fade">
        <section id="header">
            <h1 id="header-time">00:00</h1>
            <h2 id="header-date">Date</h2>
            <div id="search" class="searchbar">
                <input type="text" class="searchbox" name="q" title="Search Google"
                placeholder="Search..." id="main-search" spellcheck="false"
                autocomplete="off" size="40" maxlength="255" />
                <ul class="search-engines"></ul>
            </div>
        </section>
        <section id="apps">
        <!--<h3>> Frequent Websites</h3>-->
            <div id="apps-loop">
                <?php
                foreach ($apps['app'] as $app){
                ?>
                    <a id="link" class="apps-item" href="<?=$app['url']?>">
                    <div class="apps-icon">
                        <span class="iconify icon" data-icon="<?=$app['icon']?>"></span>
                    </div>
                    <div class="apps-text">
                        <span><?=$app['name']?></span>
                        <span><?=$app['desc']?></span>
                    </div>
                    </a>
                <?php
                }
                ?>
            </div>
        </section>
        <section id="links">
        <!--<h3>> Bookmarks</h3>-->
            <div id="links-loop">
                <?php
                foreach ($apps['link'] as $cat=>$val){
                    echo '<div class="links-item">';
                    echo '<h4>'.$cat.'</h4>';
                        foreach ($val as $link){
                            echo '<a id="link" href="'.$link['url'].'"><img src="'.save_favicon($link['url']).'" style="width:16px;vertical-align: middle; margin-right: 0.5rem;" >'.$link['name'].'</a>';
                        }
                        
                    echo '</div>';
                }
                ?>
            </div>
        </section>
	<div id="header-quote">
                <?php
	                echo $quote;
                ?>
        </div>

    </main>
<script src="./assets/js/script.js" type="text/javascript"></script>
</body>
</html>
