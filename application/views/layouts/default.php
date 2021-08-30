<?php if(!defined("MCPROJECT")){ exit("Hacking Attempt!"); } ?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <link rel="icon" href="public/images/favicon.ico" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo $title; ?></title>
    <link href="/public/styles/bootstrap.css" rel="stylesheet">
    <link href="/public/styles/minecraft-skinviewer.css" rel="stylesheet">
    <link href="/public/styles/main.css" rel="stylesheet">
    <link href="/public/styles/font-awesome.css" rel="stylesheet">
    <script src="/public/scripts/jquery.js"></script>
    <script src="/public/scripts/form.js"></script>
    <script src="/public/scripts/popper.js"></script>
    <script src="/public/scripts/bootstrap.js"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="/">Проект маникрафт</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/rules">Правила</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/servers">Сервера</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/forum/">Форум</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/donate">Донат</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <header class="masthead" style="background-image: url('/public/images/home-bg.jpg')">

    </header>
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <?php echo $content; ?>
            </div>
            <div class="col-lg-4">
                <div class="head-block">                    
                    <?php require_once('_default/profile.bar.php') ?>                    
                </div>
                <div class="head-block">                    
                    <?php require_once('_default/monitoring.bar.php') ?>                    
                </div>
                <div class="head-block" style="padding: 0">                    
                    <?php require_once('_default/vk.bar.php') ?>                    
                </div>
                <div class="head-block" style="padding: 0">                    
                    <?php require_once('_default/discord.bar.php') ?>                    
                </div>
            </div>
        </div>
    </div>
    <hr>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <ul class="list-inline text-center">
                        <li class="list-inline-item">
                            <a href="/" target="_blank">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-youtube fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="/" target="_blank">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-vk fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="/" target="_blank">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-github fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                    </ul>
                    <p class="copyright text-muted">&copy; <?php echo date("Y"); ?> EphemeralCraft</p>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>