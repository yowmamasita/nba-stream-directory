<!DOCTYPE html>
<html class="no-js">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>NBA Stream Directory - <?=$month.' '.$year?></title>
        <meta name="description" content="NBA regular seasons and play-offs 2011-2012, 2012-2013 game stream directory">
        <meta name="viewport" content="width=device-width">

        <link rel="stylesheet" href="/static/css/bootstrap.css">
        <style>
            body {
                padding-top: 60px;
                padding-bottom: 40px;
            }
        </style>
        <link rel="stylesheet" href="/static/css/bootstrap-responsive.css">
        <link rel="stylesheet" href="/static/css/main.css">

        <!--[if lt IE 9]>
            <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
            <script>window.html5 || document.write('<script src="/static/js/html5shiv.js"><\/script>')</script>
        <![endif]-->
    </head>
    <body>

        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <a class="brand" href="/">NBA Stream Directory</a>
                </div>
            </div>
        </div>

        <div class="container">
            <!-- Example row of columns -->
            <div class="row">
                <div class="span12 text-center">
                    <h2><?=$month.' '.$year?></h2>
                    <?php
                    $new_day = 0;
                    foreach ($games as $game) {
                        if(isset($last_day) && $game['game_day'] > $last_day) {
                            break;
                        } 
                        if($new_day != $game['game_day']) {
                            $new_day = $game['game_day']; ?>
                    <h3><?=$month.' '.$new_day?></h3>
                    <?php } ?>
                    <p><?=$game['home_team']?> <a class="score" href="#" data-toggle="tooltip" title="<?=$game['home_score']?> - <?=$game['away_score']?>">vs</a> @<?=$game['away_team']?> <i class="icon-facetime-video"></i> <a href="http://nbalp1-f.akamaihd.net/nba/big/leaguepass/<?=$game['game_year']?>/<?=$game['game_month']<10?'0'.$game['game_month']:$game['game_month']?>/<?=$game['game_day']<10?'0'.$game['game_day']:$game['game_day']?>/<?=$game['game_id']?>_,low,.mp4.csmil_0_0@1?v=seek=1000">low</a> <a href="http://nbalp1-f.akamaihd.net/nba/big/leaguepass/<?=$game['game_year']?>/<?=$game['game_month']<10?'0'.$game['game_month']:$game['game_month']?>/<?=$game['game_day']<10?'0'.$game['game_day']:$game['game_day']?>/<?=$game['game_id']?>_,medium,.mp4.csmil_0_0@1?v=seek=1000">med</a> <a href="http://nbalp1-f.akamaihd.net/nba/big/leaguepass/<?=$game['game_year']?>/<?=$game['game_month']<10?'0'.$game['game_month']:$game['game_month']?>/<?=$game['game_day']<10?'0'.$game['game_day']:$game['game_day']?>/<?=$game['game_id']?>_,high,.mp4.csmil_0_0@1?v=seek=1000">high</a> <a href="http://nbalp1-f.akamaihd.net/nba/big/leaguepass/<?=$game['game_year']?>/<?=$game['game_month']<10?'0'.$game['game_month']:$game['game_month']?>/<?=$game['game_day']<10?'0'.$game['game_day']:$game['game_day']?>/<?=$game['game_id']?>_,full,.mp4.csmil_0_0@1?v=seek=1000">full</a></p>
                    <?php }?>
                </div>
            </div>

            <hr>

            <footer>
                <p>&copy; NBA Stream Direcotry 2013</p>
            </footer>
        </div> <!-- /container -->

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
        <script>window.jQuery || document.write('<script src="/static/js/vendor/jquery-1.9.1.js"><\/script>')</script>

        <script src="/static/js/bootstrap.js"></script>

        <script src="/static/js/main.js"></script>

        <script>$('.score').tooltip();</script>

        <!--<script>
            var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
        </script>-->
    </body>
</html>