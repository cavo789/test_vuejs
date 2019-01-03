<?php
define('REPO', 'https://github.com/cavo789/test_vuejs#test12---example-tasks');

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
            <div id="app">
                <h2>Don't forget</h2>
                <ul>
                    <li v-for='task in incompleteTasks' v-text="task.description" :key="task.id"></li>
                </ul>
                <h2>Already completed</h2>
                <ul>
                    <li class="completed" v-for='task in completeTasks' v-text="task.description"></li>                    
                </ul>
            </div>
            <a href="..">Return to the index</a> -
            <a href="../test13-tasks-component/index.php">Next</a> - 
             <a href="<?php echo REPO; ?>">Get explanations on Github</a>
        </div>
        <script src="https://unpkg.com/vue"></script>
        <script>
            var app = new Vue({
                el: '#app',
                data: {
                    tasks: [
                        { id: 1, description: 'Go to the store', completed: true },
                        { id: 2, description: 'Finish screencast', completed: false },
                        { id: 3, description: 'Make donation', completed: false },
                        { id: 4, description: 'Clear inbox', completed: false },
                        { id: 5, description: 'Make dinner', completed: false },
                        { id: 6, description: 'Clean room', completed: true }
                    ]
                },
                computed: {
                    completeTasks() {
                        return this.tasks.filter(task => task.completed);
                    },
                    incompleteTasks() {
                        return this.tasks.filter(task => !task.completed);
                    }
                }
            })
        </script>
    </body>
</html>


