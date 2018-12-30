<?php
define('REPO', 'https://github.com/cavo789/test_vuejs');

// Get the GitHub corner
$github = '';
if (is_file($cat = __DIR__ . DIRECTORY_SEPARATOR . 'octocat.tmpl')) {
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
        <title>Learning Vue</title>
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/style.css">
        
    </head>
    <body>
        <?php echo $github; ?>
        <div class="container">
            <img id="logoVue" src='assets/images/logo.png'/>
            <h1>Learning Vue - Step by step</h1>

            <?php
                // get the list of sub-folders and remove /assets
                $dirs = glob('*', GLOB_ONLYDIR);

                // Folder "test10" should be after "test9" and not before "test2"
                natsort($dirs);

                if (false !== ($key = array_search('assets', $dirs))) {
                    unset($dirs[$key]);
                }

                // Convert the list of folders into list items and add an hyperlink on each
                // so we can visit the folder
                echo '<ol><li>' . implode(array_map(function ($tag) {
                    return sprintf('<a href="%s/index.php">%s</a>', $tag, $tag);
                }, $dirs), '</li><li>') . '</li></ol>';
            ?>
        </div>
        <script src="assets/js/jquery-3.3.1.min.js" type="text/javascript"></script>
        <script src="assets/js/bootstrap.min.js"></script>
    </body>
</html>
