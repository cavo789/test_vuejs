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
        <div class="container">
            <h1>List of tests</h1>

            <?php
                // get the list of sub-folders and remove /assets
                $dirs = array_filter(glob('*'), 'is_dir');
                if (false !== ($key = array_search('assets', $dirs))) {
                    unset($dirs[$key]);
                }

                // Convert the list of folders into list items and add an hyperlink on each
                // so we can visit the folder
                echo '<ul><li>' . implode(array_map(function ($tag) {
                    return sprintf('<a href="%s/index.php">%s</a>', $tag, $tag);
                }, $dirs), '</li><li>') . '</li></ul>';
            ?>
        </div>
        <script src="assets/js/jquery-3.3.1.min.js" type="text/javascript"></script>
        <script src="assets/js/bootstrap.min.js"></script>
    </body>
</html>
