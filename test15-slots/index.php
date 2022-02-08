<?php
define('REPO', 'https://github.com/cavo789/test_vuejs#test15---slots');

// Get the GitHub corner
$github = '';
if (is_file($cat = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'octocat.tmpl')) {
    $github = str_replace('%REPO%', REPO, file_get_contents($cat));
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8"/>
        <meta name="author" content="Christophe Avonture" />
        <meta name="robots" content="noindex, nofollow" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=9; IE=8;" />
        <title>VueJS - Testing</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.css"/>
        <link rel="stylesheet" href="../assets/css/style.css">
        <link rel="stylesheet" href="assets/css/style.css">
    </head>
    <body>
        <?php echo $github; ?>
        <img id="logoVue" src='../assets/images/logo.png'/>
        <section class="section">
            <div class="container">
                <h1 class="title"><?php echo basename(__DIR__); ?></h1>
                <p class="subtitle">Using <strong>Bulma</strong> CSS framework</p>
                <div id="app" class="container">
                    <modal>
                        <template slot="header">This is my header slot</template>
                        Lorem ispo dolor sit amet.
                        <div slot="footer">
                            <a class="button is-primary">Save change</a>
                            <a class="button">Cancel</a>
                        </div>
                    </modal>
                </div>
                <a href="..">Return to the index</a> -
                <a href="../test16-inline-template/index.php">Next</a> -
                <a href="<?php echo REPO; ?>">Get explanations on Github</a>
            </div>
        </section>
        <script src="https://unpkg.com/vue@2"></script>
        <script src="assets/app.js"></script>
    </body>
</html>
