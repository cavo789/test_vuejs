# Test VueJS

> THIS REPOSITORY HAS NO ADDED-VALUE FOR ANYONE EXCEPT JUST ME. Personal learning application to understand VueJS.

- website : https://vuejs.org/
- laracast tutorials : https://laracasts.com/series/learn-vue-2-step-by-step/

![Logo](https://vuejs.org/images/logo.png)

## Quick introduction

[https://www.vuemastery.com/courses/intro-to-vue-js/vue-instance/](https://www.vuemastery.com/courses/intro-to-vue-js/vue-instance/)

- Vue is **Reactive**: the Vue instance data object is linked to every places where this data is used so, by assigning a new value to a data, Vue will guarantee that the newest value will be displayed in the DOM. No coding is required.

## Installation

Easy way, just include the .js file by adding a reference to the unpkg CDN: https://unpkg.com/vue@2.5.16/dist/vue.js

Read more: https://fr.vuejs.org/v2/guide/installation.html#CDN

## Debugging

[Vue.js devtools for Chrome](https://chrome.google.com/webstore/detail/vuejs-devtools/nhdogjmejiglipccpnnnanhbledajbpd).

In the options of the add-on, we'll need to `Allow access to file URLs`.

## Playing with Vue

### Test1 - Minimal application

> [Tutorial: The Vue instance](https://www.vuemastery.com/courses/intro-to-vue-js/vue-instance/)

1. Creating an `app` DOM object and put in there `expression` by using the `{{ ... }}` syntax.
2. In JS, create a Vue instance that refers to the `app` DOM element. Put in the `data` store an attribute called `product` and assign a value.

During the HTML rendering, Vue will replace in the `app` div any expression that refers to `product` by his value.

Tip: in the developer console, we can reassign a new value to `app.product`. Vue will ensure that the DOM will reflect the change.

```html
<div id="app">
  <h2>{{ product }}</h2>
  <p>I really like {{ product }}...</p>
</div>

<script src="https://unpkg.com/vue"></script>

<script>
  var app = new Vue({
    el: "#app",
    data: {
      product: "Socks"
    }
  });
</script>
```

### Test2 - Binding attribute

> [Tutorial: Binding attribute](https://www.vuemastery.com/courses/intro-to-vue-js/attribute-binding)

We can bind HTML attributes thanks to `v-bind` like this:

```html
<div id="app">
  <div class="product">
    <img v-bind:src="image" v-bind:alt="alt" v-bind:title="title" />
  </div>
</div>

<script src="https://unpkg.com/vue"></script>

<script>
  var app = new Vue({
    el: "#app",
    data: {
      image: "assets/images/Socks-blue.png",
      alt: "a pair of socks",
      title: "My preferred socks"
    }
  });
</script>
```

**The shorthand for `v-bind:` is `:`**

```html
<img :src="image" :alt="alt" :title="title" />
```

### Test3 - Conditional rendering

> [Tutorial: Conditional rendering](https://www.vuemastery.com/courses/intro-to-vue-js/conditional-rendering)

Display DOM elements based on a condition like:

```html
<div id="app">
  <div class="product-info">
    <h2>{{ product }}</h2>
    <p v-if="inStock">In Stock</p>
    <p v-else>Out of Stock</p>
  </div>
</div>
<script src="https://unpkg.com/vue"></script>

<script>
  var app = new Vue({
    el: "#app",
    data: {
      product: "Socks",
      inStock: true
    }
  });
</script>
```

`v-if="inStock"` will just compare `true` or `false` but the expression can be more complex like `v-if="inStock > 10"` (when lower or equal to 10, we'll display `Out of stock` f.i.).

```html
<div id="app">
  <div class="product-info">
    <h2>{{ product }}</h2>
    <p v-if="inStock > 10">In Stock</p>
    <p v-else-if="inStock > 0">Almost sold out!</p>
    <p v-else>Out of Stock</p>
  </div>
</div>
<script src="https://unpkg.com/vue"></script>

<script>
  var app = new Vue({
    el: "#app",
    data: {
      product: "Socks",
      inStock: true
    }
  });
</script>
```

**Remark:** With `v-if`, when the condition isn't met, the DOM element is **removed** from the page. By displaying the rendered HTML, paragraphs with "Almost sold out!" and "Out of Stock" aren't in the DOM when products are "In Stock". With `v-show` the DOM is just displayed or not with CSS (`display: none;` when the condition isn't met).

### Test4 - List rendering

> [Tutorial: List rendering](https://www.vuemastery.com/courses/intro-to-vue-js/list-rendering)

The `v-for` syntax will traverse an array and, for each item, will create a DOM element.

The example here below will create bullets:

```html
<div id="app">
  <div class="product-info">
    <h2>{{ product }}</h2>
    <ul>
      <li v-for="detail in details">{{ detail }}</li>
    </ul>
  </div>
</div>
<script src="https://unpkg.com/vue"></script>

<script>
  var app = new Vue({
    el: "#app",
    data: {
      product: "Socks",
      details: ["80% cotton", "20% polyester", "Gender-neutral"]
    }
  });
</script>
```

And here one DIV by variants:

```html
<div id="app">
  <div class="product-info">
    <h2>{{ product }}</h2>
    <div v-for="variant in variants" :key="variant.variantId">
      <p>{{ variant.variantColor }}</p>
    </div>
  </div>
</div>
<script src="https://unpkg.com/vue"></script>

<script>
  var app = new Vue({
    el: "#app",
    data: {
      product: "Socks",
      variants: [
        {
          variantId: 2234,
          variantColor: "green"
        },
        {
          variantId: 2235,
          variantColor: "blue"
        }
      ]
    }
  });
</script>
```

Note: it is recommended to use a special key attribute when rendering elements like above so that Vue can keep track of each node's identity.

### Test5 - Event handling

> [Tutorial: Event handling](https://www.vuemastery.com/courses/intro-to-vue-js/event-handling)

Just using the syntax `v-on:` followed by the event and a valid expression.

Below a `Add to cart` button. Each time we'll click on it, the `cart` variable will be incremented and, since Vue is reactive, each time a value is changed, every place where that value is used is automatically updated so, without need of code, the paragraph `<p>Cart({{cart}})</p>` will be updated.

```html
<div id="app">
  <div class="product-info">
    <h2>{{ product }}</h2>
    <button v-on:click="cart +=1">Add to Cart</button>
    <div class="cart"><p>Cart({{cart}})</p></div>
  </div>
</div>
<script src="https://unpkg.com/vue"></script>

<script>
  var app = new Vue({
    el: "#app",
    data: {
      product: "Socks",
      cart: 0
    }
  });
</script>
```

While `<button v-on:click="cart +=1">Add to Cart</button>` is valid, it'll be better to use a function like `<button v-on:click="addToCart">Add to Cart</button>`

```html
<div id="app">
  <div class="product-info">
    <h2>{{ product }}</h2>
    <button v-on:click="addToCart">Add to Cart</button>
    <div class="cart"><p>Cart({{cart}})</p></div>
  </div>
</div>
<script src="https://unpkg.com/vue"></script>

<script>
  var app = new Vue({
    el: "#app",
    data: {
      product: "Socks",
      cart: 0
    },
    methods: {
      addToCart: function() {
        this.cart += 1;
      }
    }
  });
</script>
```

**The shorthand for `v-on:` is `@`.**

**ES6 Syntax** Instead of writing out an anonymous function like `addToCart: function()`, we can use the ES6 shorthand and just say `addToCart()`. These are equivalent ways of saying the same thing.

#### Update the source of the image

The code below will display the image by using `data.image` thus a green sock.

```html
<div id="app">
  <div class="product">
    <div class="product-image"><img v-bind:src="image" /></div>
  </div>
</div>
<script src="https://unpkg.com/vue"></script>
<script>
  var app = new Vue({
    el: "#app",
    data: {
      product: "Socks",
      image: "assets/images/Socks-green.png"
    }
  });
</script>
```

We'll display a list of variations i.e. the fact that the socks are available in green or blue and, when the user will move the mouse cursor over a color, we'll dynamically replace the image by the colored one.

```html
<div id="app">
  <div class="product">
    <div class="product-image"><img v-bind:src="image" /></div>
    <div class="product-info">
      <div v-for="variant in variants" :key="variant.variantId">
        <p v-on:mouseover="updateProduct(variant.variantImage)">
          {{ variant.variantColor }}
        </p>
      </div>
    </div>
  </div>
</div>
<script src="https://unpkg.com/vue"></script>

<script>
  var app = new Vue({
    el: "#app",
    data: {
      product: "Socks",
      image: "assets/images/Socks-green.png"
      variants: [
        {
          variantId: 2234,
          variantColor: "green",
          variantImage: "assets/images/Socks-green.png"
        },
        {
          variantId: 2235,
          variantColor: "blue",
          variantImage: "assets/images/Socks-blue.png"
        }
      ]
    },
    methods: {
      updateProduct(imgSrc) {
        this.image = imgSrc;
      }
    }
  });
</script>
```

### Test6 - Class and style binding

> [Tutorial: Class and style binding](https://www.vuemastery.com/courses/intro-to-vue-js/class-&-style-binding)

The `v-bind` can also be applied to a `style` attribute but, then, we don't must to use the double `{{ ... }}` but a single one `{ ... }`.

Below, the code will add two divs, one with a blue background and one with a green.

```html
<div id="app">
  <div class="product">
    <div class="product-image"><img v-bind:src="image" /></div>
    <div class="product-info">
      <div
        v-for="variant in variants"
        :key="variant.variantId"
        class="color-box"
        :style="{ backgroundColor: variant.variantColor }"
      ></div>
    </div>
  </div>
</div>
<script src="https://unpkg.com/vue"></script>

<script>
  var app = new Vue({
    el: "#app",
    data: {
      product: "Socks",
      image: "assets/images/Socks-green.png"
      variants: [
        {
          variantId: 2234,
          variantColor: "green"
        },
        {
          variantId: 2235,
          variantColor: "blue"
        }
      ]
    }
  });
</script>
```

HTML disabled attribute can be easily set like this:

```html
<button v-on:click="addToCart" :disabled="!inStock">Add to Cart</button>
```

This will add the `disabled="disabled"` attribute as soon as `data.inStock` is false.

```html
<script>
  var app = new Vue({
    el: "#app",
    data: {
      inStock: false
    }
  });
</script>
```

For applying a special CSS class depending on the boolean result (true / false):

```html
<button
  v-on:click="addToCart"
  :disabled="!inStock"
  :class="{ disabledButton: !inStock}"
>
  Add to Cart
</button>
```

### Test7 - Computed properties

> [Tutorial: Computed properties](https://www.vuemastery.com/courses/intro-to-vue-js/computed-properties)

Vue offers `computed` data in a very easy way:

```html
<div id="app">
  <div class="product">
    <div class="product-info"><h2>{{ titleProduct }}</h2></div>
  </div>
</div>
<script src="https://unpkg.com/vue"></script>

<script>
  var app = new Vue({
    el: "#app",
    data: {
      brand: "Master banch",
      product: "Socks"
    },
    computed: {
      titleProduct() {
        return this.brand + " " + this.product;
      }
    }
  });
</script>
```

We can now modify, separately, `app.brand` or `app.product`, the computed `titleProduct` variable will be keep up-to-date by Vue.

Note: the computed value is cached so only rerun when a value is changed.

Instead of using a `inStock` static value, we can use a computed value like below.
This code will display two DIVs (coming from `app.data.variants`, one with a green background (index=0) and one with a blue (index=1).

Thanks the `mouseover` event, the index will be captured (0 or 1) and the `updateProduct` and the index will be used to initialize `app.data.selectedVariant` to 0 or 1.

Due to a data has been modified, Vue will recalculate the value of `inStock` and then reevaluate `this.variants[this.selectedVariant].variantQuantity` taking the green (0) or the blue (1) entry.

And redraw the DOM so buttons like `Add to cart` will be disabled when `inStock` return false.

```html
<div id="app">
  <div class="product">
    <div class="product-info">
      <div
        v-for="(variant, index) in variants"
        :key="variant.variantId"
        class="color-box"
        :style="{ backgroundColor: variant.variantColor }"
        @mouseover="updateProduct(index)"
      ></div>
    </div>
  </div>
</div>
<script>
  var app = new Vue({
    el: '#app',
    data: {
        selectedVariant:0,
        variants: [
            {
                variantId: 2234,
                variantColor: 'green',
                variantQuantity: 100
            },
            {
                variantId: 2235,
                variantColor: 'blue',
                variantQuantity: 0
            }
        ],
        cart: 0
    },
    methods: {
      updateProduct(index) {
        this.selectedVariant = index;
      }
    },
    computed: {
      inStock() {
          return this.variants[this.selectedVariant].variantQuantity
      }
    }
  }
</script>
```
