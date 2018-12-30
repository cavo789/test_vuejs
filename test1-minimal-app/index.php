<link rel="stylesheet" href="../assets/css/style.css">

<h1>Minimal Vue app</h1>

<p><a href="https://www.vuemastery.com/courses/intro-to-vue-js/vue-instance/">Tutorial: The Vue instance</a></p>

<div id="app">
    <h2>{{ product }}</h2>
    <p>I really like {{ product }}... <em>Do you also love {{ product }}?</em></p>
</div>

<small>Tip: open the Develop window, go to the Console and type <em>app.product='Boots';</em>. Part of the DOM will be refreshed and the new product name will be displayed.</small>

<p><a href="..">Return to the list</a></p>

<script src="https://unpkg.com/vue"></script>

<script>
    var app = new Vue({
        el: '#app',
        data: {
            product:'Socks'
        }  
    });
</script>
