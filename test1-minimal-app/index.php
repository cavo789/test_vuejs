<?php
define('REPO', 'https://github.com/cavo789/test_vuejs#test1---minimal-application');

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
        <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="../assets/css/style.css">
        <link rel="stylesheet" href="assets/css/style.css">
    </head>
    <body>
        <?php echo $github; ?>
        <div class="container">
            <img id="logoVue" src='../assets/images/logo.png'/>
            <?php echo '<h1>' . basename(__DIR__) . '</h1>'; ?>

            <p><a href="https://www.vuemastery.com/courses/intro-to-vue-js/vue-instance/">Tutorial: The Vue instance</a></p>

            <div id="app">
                <h2>{{ product }}</h2>
                <p>I really like {{ product }}... <em>Do you also love {{ product }}?</em></p>
            </div>

            <p>Tip: open the Develop window, go to the Console and type <em>app.product='Boots';</em>. Part of the DOM will be refreshed and the new product name will be displayed.</p>

            <a href="..">Return to the index</a> - <a href="<?php echo REPO;?>">Get explanations on Github</a>            
        </div>
        <script src="https://unpkg.com/vue"></script>

        <script>
            var app = new Vue({
                el: '#app',
                data: {
                    product:'Socks'
                }  
            });
        </script>

    </body>
</html>
