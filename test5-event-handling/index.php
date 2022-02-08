<?php
define('REPO', 'https://github.com/cavo789/test_vuejs#test5---event-handling');

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
            <p><a href="https://www.vuemastery.com/courses/intro-to-vue-js/list-rendering">Tutorial: List rendering</a></p>
            <div id="app">
                <div class="product">
                    <div class="product-image">
                        <img v-bind:src="image" v-bind:alt="alt" v-bind:title="title" width="400px"/>
                    </div>
                    <div class="product-info">
                        <h2>{{ product }}</h2>
                        <p>I really like {{ product }}... <em>Do you also love {{ product }}?</em></p>
                        <p v-if="inStock>10">In Stock</p>
                        <p v-else-if="inStock > 0">Almost sold out!</p>
                        <p v-else>Out of Stock</p>
                        <ul>
                            <li v-for="detail in details">{{ detail }}</li>
                        </ul>
                        <div v-for="variant in variants" :key="variant.variantId">
                            <p v-on:mouseover="updateProduct(variant.variantImage)">{{ variant.variantColor }}</p>
                        </div>
                        <button v-on:click="addToCart">Add to Cart</button>
                        <button v-on:click="removeFromCart">Remove</button>
                        <div class="cart">
                            <p>Cart({{cart}})</p>
                        </div>
                    </div>
                </div>
            </div>
            <a href="..">Return to the index</a> -
            <a href="../test6-class-and-style-binding/index.php">Next</a> -
            <a href="<?php echo REPO;?>">Get explanations on Github</a>
        </div>
        <script src="https://unpkg.com/vue@2"></script>
        <script>
            var app = new Vue({
                el: '#app',
                data: {
                    product:'Socks',
                    image:'assets/images/Socks-green.png',
                    alt:'a pair of socks',
                    title:'My preferred socks',
                    inStock: 8,
                    details: ["80% cotton", "20% polyester", "Gender-neutral"],
                    variants: [
                        {
                            variantId: 2234,
                            variantColor: 'green',
                            variantImage: 'assets/images/Socks-green.png'
                        },
                        {
                            variantId: 2235,
                            variantColor: 'blue',
                            variantImage: 'assets/images/Socks-blue.png'
                        }
                    ],
                    cart: 0
                },
                methods: {
                    addToCart() {
                        this.cart += 1
                    },
                    removeFromCart() {
                        if(this.cart>0) this.cart -= 1
                    },
                    updateProduct(imgSrc) {
                        this.image = imgSrc;
                    }
                }
            });
        </script>
    </body>
</html>


