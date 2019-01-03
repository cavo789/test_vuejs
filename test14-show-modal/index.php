<?php
define('REPO', 'https://github.com/cavo789/test_vuejs#test14---show-modal');

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
                    <modal v-if="showModal" @close="showModal = false">Hello world</modal>
                    <button type="button" @click="showModal = true">Show modal</button>
                </div>
                <a href="..">Return to the index</a> - 
                <a href="../test15-slots/index.php">Next</a> - 
                <a href="<?php echo REPO; ?>">Get explanations on Github</a>
            </div>
        </section>
        <script src="https://unpkg.com/vue"></script>
        <script src="assets/app.js"></script>
    </body>
</html>
