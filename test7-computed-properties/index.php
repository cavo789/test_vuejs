<?php
define('REPO', 'https://github.com/cavo789/test_vuejs#test7---computed-properties');

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

            <p><a href="https://www.vuemastery.com/courses/intro-to-vue-js/computed-properties">Tutorial: Computed properties</a></p>

            <div id="app">
                <div class="product">
                    <div class="product-image">
                        <img v-bind:src="image" v-bind:alt="alt" v-bind:title="title" width="400px"/>
                    </div>
                    <div class="product-info">
                        <h2>{{ titleProduct }}</h2>
                        <p>I really like {{ product }}... <em>Do you also love {{ product }}?</em></p>
                        <p v-if="inStock>10">In Stock</p>
                        <p v-else-if="inStock > 0">Almost sold out!</p>
                        <p v-else :class="{ outOfStock: !inStock }">Out of Stock</p>

                        <ul>
                            <li v-for="detail in details">{{ detail }}</li>
                        </ul>

                        <div v-for="(variant, index) in variants" 
                            :key="variant.variantId" 
                            class="color-box" 
                            :style="{ backgroundColor: variant.variantColor }"
                            @mouseover="updateProduct(index)">
                        </div>

                        <button v-on:click="addToCart" 
                            :class="{ disabledButton: !inStock}"
                            :disabled="!inStock">
                            Add to Cart
                        </button>

                        <button v-on:click="removeFromCart"
                            :class="{ disabledButton: !inStock}"
                            :disabled="!inStock">
                            Remove
                        </button>

                        <div class="cart">
                            <p>Cart({{cart}})</p>
                        </div>
                    </div>
                </div>
            </div>
            <a href="..">Return to the index</a> - <a href="<?php echo REPO;?>">Get explanations on Github</a>
        </div>
        <script src="../assets/js/jquery-3.3.1.min.js" type="text/javascript"></script>
        <script src="../assets/js/bootstrap.min.js"></script>

        <script src="https://unpkg.com/vue"></script>

        <script>
            var app = new Vue({
                el: '#app',
                data: {
                    brand:'Master banch',
                    product:'Socks',
                    selectedVariant:0,
                    alt:'a pair of socks',
                    title:'My preferred socks',
                    details: ["80% cotton", "20% polyester", "Gender-neutral"],
                    variants: [ 
                        { 
                            variantId: 2234,
                            variantColor: 'green',
                            variantImage: 'assets/images/Socks-green.png',
                            variantQuantity: 100
                        },
                        { 
                            variantId: 2235,
                            variantColor: 'blue',
                            variantImage: 'assets/images/Socks-blue.png',
                            variantQuantity: 0
                        },
                        { 
                            variantId: 2236,
                            variantColor: 'gray',
                            variantImage: 'assets/images/Socks-gray.png',
                            variantQuantity: 8
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
                    updateProduct(index) {
                        this.selectedVariant = index;
                    }
                },
                computed: {
                    titleProduct() {
                        return this.brand + ' ' + this.product
                    },
                    image() {
                        return this.variants[this.selectedVariant].variantImage
                    },
                    inStock() {
                        return this.variants[this.selectedVariant].variantQuantity
                    }
                }
            });
        </script>
    </body>
</html>


