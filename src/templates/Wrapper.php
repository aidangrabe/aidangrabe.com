<!DOCTYPE html>

<html lang="en">

<head>
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="<?php echo App::getResource("/css/main.css"); ;?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
</head>

<body>

    <a href="#main-content" id="skip-link">Skip to content</a>

    <div id="wrapper">

        <header>
            <div class="social-icons">
                <a class="social twitter" title="Twitter"
                   href="http://www.twitter.com/#!/AidanGrabe/"></a>
                <a class="social github" title="Github"
                   href="https://github.com/AidanGrabe/"></a>
                <a class="social google" title="Google+"i
                   href="http://gplus.to/AidanGrabe"></a>
                <a class="social linkedin" title="LinkedIn"
                   href="http://www.linkedin.com/profile/view?id=151822991"></a>
            </div> <!-- .social-icons -->
            <div class="avatar"></div>
        </header>

        <section id="main-body">
            <?php echo $nav; ?>
            <section id="main-content"><?php echo $content; ?></section> <!-- #main-content -->
        </section> <!-- #main-body -->

        <footer>
            This is the footer
        </footer>

    </div> <!-- #wrapper -->

    <script src="<?php echo App::getResource("/js/main.js"); ?>"></script>
</body>

</html>
