<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="wogel123">

    <title><?= $seo_config['title'] ?></title>
    <link rel="icon" type="image/png" href="<?= $seo_config['favicon_url'] ?>"/>
    <meta name="title" content="<?= $seo_config['title'] ?>">
    <meta property="og:title" content="<?= $seo_config['title'] ?>">
    <meta name="description" content="<?= $seo_config['description'] ?>">
    <meta property="og:description" content="<?= $seo_config['description'] ?>">
    <meta property="og:image" content="<?= $seo_config['img_url'] ?>">

    <?= $this->Html->css('bootstrap.min.css') ?>
    <?= $this->Html->css('all.min.css') ?>
    <?= $this->Html->css('style.css') ?>
    <?= $this->Html->script('bootstrap.bundle.min.js') ?>

</head>

<body>
<?php if (isset($Lang)) { ?>

<header>

    <?php if($title_for_layout != "Maintenance") { ?>
    <nav class="navbar">
        <div class="container">
            <div class="row w-100 mx-auto">
                <div class="d-flex d-md-none col-12">
                    <a href="" class="menu ms-auto"> <i class="fas fa-bars"></i></a>
                </div>
                <div class="d-none d-md-block col-md-6 col-lg-5 ">
                    <ul class="text-center text-lg-start justify-content-around">
                        <?php
                        if (!empty($nav))
                        {
                            $count = count($nav);
                            $i = 0;
                            foreach ($nav as $key => $value)
                            {
                                if ($i < $count / 2)
                                {
                                    if (empty($value['Navbar']['submenu']))
                                    {
                                        echo '<li class="navbar-item';
                                        if ($this->params['controller'] == $value['Navbar']['name'])
                                        {
                                            echo 'active">';
                                        }
                                        else
                                        {
                                            echo '">';
                                        }
                                        echo '<a href="' . $value['Navbar']['url'] . '"';
                                        if ($value['Navbar']['open_new_tab'])
                                        {
                                            echo 'target="_blank"';
                                        }
                                        echo '>';
                                        echo $value['Navbar']['name'];
                                        echo '</a>';
                                        echo '</li>';
                                    }
                                    else
                                    {
                                        echo '<li class="dropdown">';
                                        echo '<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">' . $value['Navbar']['name'] . '<span class="caret"></span></a>';
                                        echo '<ul class="dropdown-menu" role="menu">';
                                        $submenu = json_decode($value['Navbar']['submenu']);
                                        foreach ($submenu as $k => $v)
                                        {
                                            echo '<li>';
                                            echo '<a href="' . rawurldecode($v) . '"';
                                            if ($value['Navbar']['open_new_tab'])
                                            {
                                                echo 'target="_blank"';
                                            }
                                            echo '>' . rawurldecode(str_replace('+', ' ', $k)) . '</a>';
                                            echo '</li>';
                                        }
                                        echo '</ul>';
                                        echo '</li>';
                                    }
                                }
                                $i++;
                            }
                        }
                        ?>
                    </ul>
                </div>
                <div class="d-none d-md-block col-md-6 col-lg-5 ms-auto">
                    <ul class="text-center text-lg-end justify-content-around">
                        <?php
                        if (!empty($nav))
                        {
                            $count = count($nav);
                            $i = 0;
                            foreach ($nav as $key => $value)
                            {
                                if ($i >= $count / 2)
                                {
                                    if (empty($value['Navbar']['submenu']))
                                    {
                                        echo '<li class="navbar-item';
                                        if ($this->params['controller'] == $value['Navbar']['name'])
                                        {
                                            echo 'active">';
                                        }
                                        else
                                        {
                                            echo '">';
                                        }
                                        echo '<a href="' . $value['Navbar']['url'] . '"';
                                        if ($value['Navbar']['open_new_tab'])
                                        {
                                            echo 'target="_blank"';
                                        }
                                        echo '>';
                                        echo $value['Navbar']['name'];
                                        echo '</a>';
                                        echo '</li>';
                                    }
                                    else
                                    {
                                        echo '<li class="dropdown">';
                                        echo '<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">' . $value['Navbar']['name'] . '<span class="caret"></span></a>';
                                        echo '<ul class="dropdown-menu" role="menu">';
                                        $submenu = json_decode($value['Navbar']['submenu']);
                                        foreach ($submenu as $k => $v)
                                        {
                                            echo '<li>';
                                            echo '<a href="' . rawurldecode($v) . '"';
                                            if ($value['Navbar']['open_new_tab'])
                                            {
                                                echo 'target="_blank"';
                                            }
                                            echo '>' . rawurldecode(str_replace('+', ' ', $k)) . '</a>';
                                            echo '</li>';
                                        }
                                        echo '</ul>';
                                        echo '</li>';
                                    }
                                }
                                $i++;
                            }
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <div class="sub-navbar">
        <div class="container my-auto">
            <div class="row w-100 mx-auto">
                <div class="col-md-12">
                    <ul class="text-center justify-content-between">
                        <li class="sub-navbar-store">
                            <a href="" class="d-flex"><?= $this->Html->image('icons/shopping-bag.png') ?> <p>Boutique</p></a>
                        </li>
                        <li class="sub-navbar-account <?php if(isset($isConnected) && $isConnected) { ?>connected<?php } ?>">
                            <?php if(isset($isConnected) && $isConnected) { ?>
                                <a href="#" data-bs-toggle="dropdown" class="d-flex">
                                    <img src="http://cravatar.eu/avatar/<?= $user['pseudo'] ?>.png" width="33" height="33">
                                    <p>
                                        <?= $user['pseudo'] ?>
                                        <i class="fas fa-angle-down"></i>
                                    </p>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item" href="<?= $this->Html->url(array('controller' => 'profile', 'action' => 'index', 'plugin' => false)) ?>">Mon profil</a>
                                    </li>
                                    <li style="position:relative;">
                                        <a class="dropdown-item d-flex" href="#notifications_modal" onclick="notification.markAllAsSeen(2)" data-bs-toggle="modal">Mes notifications <i class="fas fa-envelope" style="color: #959595; margin-left: 16px;margin-bottom: auto;margin-top: auto;"></i></a>
                                        <span class="notification-indicator"></span>
                                    </li>
                                    <?php if($Permissions->can('ACCESS_DASHBOARD')) { ?>
                                        <li>
                                            <a class="dropdown-item" href="<?= $this->Html->url(array('controller' => 'admin', 'action' => 'index', 'plugin' => false, 'admin' => true)) ?>"><?= $Lang->get('GLOBAL__ADMIN_PANEL') ?></a>
                                        </li>
                                    <?php } ?>
                                    <li>
                                        <a class="dropdown-item" href="<?= $this->Html->url(array('controller' => 'user', 'action' => 'logout', 'plugin' => false)) ?>"><?= $Lang->get('USER__LOGOUT') ?></a>
                                    </li>                                </ul>
                            <?php } else { ?>
                                <a href="#login" data-bs-toggle="modal" class="d-flex"><?= $this->Html->image('icons/user.png') ?> <p>Se connecter</p></a>
                            <?php } ?>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
    <div class="layout">
        <div class="container my-auto">
            <div class="row w-100 mx-auto">
                <div class="col-md-12 d-flex">
                    <div class="layout-brand">
                        <div class="layout-server">
                            <a href="">
                                <p>play.linarium.fr</p>
                                <p class="desc">Cliquez pour copier</p>
                            </a>
                        </div>
                        <span></span>
                        <?= $this->Html->image('logo.png') ?>
                        <div class="layout-discord">
                            <a href="">
                                <p>Notre discorrd</p>
                                <p class="desc">Rejoignez-nous</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php if($title_for_layout == "Maintenance") { ?>
    <div class="container">
        <div class="row">
            <div class="col-md-5 mx-auto">
                <div class="alert alert-danger" role="alert">
                    <h4 class="alert-heading">Maintenance</h4>
                    <hr>
                    <p class="mb-0">Désolé, le site web est actuellement en maintenance.</p>
                </div>
            </div>
        </div>
    </div>
        <p class="maintenance-login mt-auto ms-auto d-flex">© Linarium -&nbsp; <a href="#login" data-bs-toggle="modal" class="d-flex">Connexion</a></p>
    <?php } ?>


</header>

<?php } ?>


<!-- Page content -->
<?php
$flash_messages = $this->Session->flash();
if (!empty($flash_messages)) {
    echo '<div class="container">' . $flash_messages . '</div>';
} ?>
<?= $this->fetch('content'); ?>





<?php if (isset($Lang)) { ?>

<!-- Footer -->
<?php if($title_for_layout != "Maintenance") { ?>
<footer>
    <div class="container">
        <div class="row footer-header">
            <div class="col-12 col-xl-9">
                <div class="row">
                    <div class="col-md-12 footer-header-content">
                        <h4 class="copyright">2020 - 2021 © Linarium. Tous droits réservés.</h4>
                        <small class="affiliate">Nous ne sommes pas affiliés à Mojang AB.</small>
                        <p class="mineweb">Propulsé par Mineweb | Thème par <a href="">wogel123</a></p>
                        <div class="social">
                            <a href="" class="discord"><?= $this->Html->image('icons/discord.png') ?></a>
                            <a href="" class="instagram"><?= $this->Html->image('icons/instagram.png') ?></a>
                            <a href="" class="twitter"><?= $this->Html->image('icons/twitter.png') ?></a>
                        </div>
                    </div>
                    <div class="col-md-12 footer-content">
                        <div class="row flex-column flex-md-row">
                            <div class="col-12 col-md-4 col-xxl-3">
                                <div class="last-news">
                                    <h3>Dernières news</h3>
                                    <ul>
                                        <li>
                                            <div class="news-date">
                                                <span class="day">21</span>
                                                <span class="month">Mai</span>
                                            </div>
                                            <div class="news-content">
                                                <h5 class="title">Mise a jour de notre spawn principal</h5>
                                                <p class="author">Par <a href="">wogel123</a></p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="news-date">
                                                <span class="day">21</span>
                                                <span class="month">Mai</span>
                                            </div>
                                            <div class="news-content">
                                                <h5 class="title">Mise a jour de notre spawn principal</h5>
                                                <p class="author">Par <a href="">wogel123</a></p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="news-date">
                                                <span class="day">21</span>
                                                <span class="month">Mai</span>
                                            </div>
                                            <div class="news-content">
                                                <h5 class="title">Mise a jour de notre spawn principal</h5>
                                                <p class="author">Par <a href="">wogel123</a></p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>

                            </div>
                            <div class="col-12 col-md-4 col-lg-2">
                                <div class="links">
                                    <h3>Liens utiles</h3>
                                    <ul>
                                        <li>
                                            <a href=""><?= $this->Html->image('icons/home.png') ?></a>
                                            Accueil
                                        </li>
                                        <li>
                                            <a href=""><?= $this->Html->image('icons/forum.png') ?></a>
                                            Forum
                                        </li>
                                        <li>
                                            <a href=""><?= $this->Html->image('icons/store.png') ?></a>
                                            Boutique
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-12 col-md-4 col-lg-3 col-xl-4 support">
                                <h3>Comment nous supporter ?</h3>
                                <p>
                                    En soutenant le serveur, vous permettez le développement de nouveaux mini-jeux, de meilleurs serveurs et de nouvelles maps ! Merci à vous !
                                </p>
                                <a href="" class="btn btn-info">Boutique <?= $this->Html->image('icons/arrow.png') ?></a>
                            </div>
                            <div class="col-md-2 d-none d-lg-flex logo d-xl-none">
                                <?= $this->Html->image('logo-bw.png') ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 d-flex logo d-none d-xl-block">
                <?= $this->Html->image('logo-bw.png') ?>
            </div>
        </div>
    </div>
</footer>
<?php } ?>
<!-- End footer-->















<?= $this->element('modals') ?>
<?= $this->Html->script('jquery-1.11.0.js') ?>
<?= $this->Html->script('app.js') ?>
<?= $this->Html->script('form.js') ?>
<?= $this->Html->script('notification.js') ?>
<script>
    <?php if($isConnected) { ?>
    // Notifications
    var notification = new $.Notification({
        'url': {
            'get': '<?= $this->Html->url(['plugin' => false, 'controller' => 'notifications', 'action' => 'getAll']) ?>',
            'clear': '<?= $this->Html->url(['plugin' => false, 'controller' => 'notifications', 'action' => 'clear', 'NOTIF_ID']) ?>',
            'clearAll': '<?= $this->Html->url(['plugin' => false, 'controller' => 'notifications', 'action' => 'clearAll']) ?>',
            'markAsSeen': '<?= $this->Html->url(['plugin' => false, 'controller' => 'notifications', 'action' => 'markAsSeen', 'NOTIF_ID']) ?>',
            'markAllAsSeen': '<?= $this->Html->url(['plugin' => false, 'controller' => 'notifications', 'action' => 'markAllAsSeen']) ?>'
        },
        'messages': {
            'markAsSeen': '<?= $Lang->get('NOTIFICATION__MARK_AS_SEEN') ?>',
            'notifiedBy': '<?= $Lang->get('NOTIFICATION__NOTIFIED_BY') ?>'
        }
    });
    <?php } ?>

    // Config FORM/APP.JS

    var LIKE_URL = "<?= $this->Html->url(['controller' => 'news', 'action' => 'like']) ?>";
    var DISLIKE_URL = "<?= $this->Html->url(['controller' => 'news', 'action' => 'dislike']) ?>";

    var LOADING_MSG = "<?= $Lang->get('GLOBAL__LOADING') ?>";
    var ERROR_MSG = "<?= $Lang->get('GLOBAL__ERROR') ?>";
    var INTERNAL_ERROR_MSG = "<?= $Lang->get('ERROR__INTERNAL_ERROR') ?>";
    var FORBIDDEN_ERROR_MSG = "<?= $Lang->get('ERROR__FORBIDDEN') ?>"
    var SUCCESS_MSG = "<?= $Lang->get('GLOBAL__SUCCESS') ?>";

    var CSRF_TOKEN = "<?= $csrfToken ?>";

    $(".navbar-collapse").css({maxHeight: ($(window).height() - 130) - $(".navbar-header").height() + "px"});
</script>

<?php if (isset($google_analytics) && !empty($google_analytics)) { ?>
<script>
    (function (i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function () {
            (i[r].q = i[r].q || []).push(arguments)
        }, i[r].l = 1 * new Date();
        a = s.createElement(o),
            m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

    ga('create', '<?= $google_analytics ?>', 'auto');
    ga('send', 'pageview');
</script>
<?php } ?>
<?= (isset($configuration_end_code)) ? $configuration_end_code : '' ?>
<?php } ?>
</body>

</html>


