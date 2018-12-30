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

### Test8 - Migrate to component

> [Tutorial: Migrate to component](https://www.vuemastery.com/courses/intro-to-vue-js/components)

A component is a block of HTML / JS code that can be reuse in another projects.

The declaration is like:

```html
<div id="app"><product></product></div>
<script>
  Vue.component('product' {
    template: `<h1>I'm a product component</h1>`
  })
  var app = new Vue({
    el: '#app'
  });
</script>
```

The Vue component should be placed inside the Vue root element (which is `#app` here above); not outside.

Using property (without any validation):

```html
<div id="app"><product productname="Socks"></product></div>
<script>
  Vue.component("product", {
    props: ["productname"],
    template: `<h1>I'm an amazing {{ productname }} product.</h1>`
  });
  var app = new Vue({
    el: "#app"
  });
</script>
```

Using property (with built-in validation):

```html
<div id="app"><product name="Socks"></product></div>
<script>
  Vue.component("product", {
    props: {
      name: {
        type: String,
        required: true,
        default: "AnyProductName"
      },
    template: `<h1>I'm an amazing {{ name }} product.</h1>`
  });
  var app = new Vue({
    el: "#app"
  });
</script>
```

A Vue instance can be easily converted to a component. Almost everything can be migrated to a component **without any changes**.

In the previous test (#7), we had data, methods and computed elements. And, of course, in our HTML, we had our DOM elements (the image, the product name, detailed information's, colors and buttons for adding to / removing from cart).

```javascript
var app = new Vue({
  el: "#app",
  data: {
    [...]
  },
  methods: {
    [...]
  },
  computed: {
    [...]
  }
});
```

`data` should become a function (because we should be able to override data when using the component in our final code), `methods` and `computed` remains unchanged:

```javascript
Vue.component("product", {
  template: `[ OUR HTML ]`,
  data() {
    return {
      [...]
    }
  },
  methods: {
    [...]
  },
  computed: {
    [...]
  }
});
```

The final code will be (lighter version):

```html
<div id="app"><product></product></div>

<script src="https://unpkg.com/vue"></script>

<script>
  Vue.component("product", {
    template: `
      <div class="product">
        <div class="product-image">
          <img v-bind:src="image" width="400px"/>
        </div>
        <div class="product-info">
          <h2>{{ titleProduct }}</h2>
          <button v-on:click="addToCart">Add to Cart</button>
        </div>
      </div>
    `,
    data() {
      return {
        brand: "Master banch",
        product: "Socks",
        image: "assets/images/Socks-green.png",
        cart: 0
      };
    },
    methods: {
      addToCart() {
        this.cart += 1;
      }
    },
    computed: {
      titleProduct() {
        return this.brand + " " + this.product;
      }
    }
  });

  var app = new Vue({
    el: "#app"
  });
</script>
```

### Test9 - Communicating events

> [Tutorial: Communicating events](https://www.vuemastery.com/courses/intro-to-vue-js/communicating-events)

A component will emit an event to inform the parent (the DOM that includes the component) that something has arrived like clicking on the `Add to cart` button.

For instance, in our Product component, we already have a `addToCart()` method. Instead of using the `this.cart += 1;` code, we can put the cart outside the component (so every products will use only one global cart). So `this.cart += 1;` can't work anymore if we remove `cart` from the `data()` function of the component.

The component below has his own cart:

```html
<script>
  Vue.component("product", {
    [...]
    data() {
      return {
        cart: 0
      }
    },
    methods: {
      addToCart() {
        this.cart += 1;
      }
    }
  });

  var app = new Vue({
    el: "#app"
  });
</script>
```

Will be refactored by removing the `cart` data and emitting an event:

```html
<script>
  Vue.component("product", {
    [...]
    data() {
      return {
      }
    },
    methods: {
      addToCart() {
        this.$emit('add-to-cart')
      }
    }
  });

  var app = new Vue({
    el: "#app"
  });
</script>
```

Listening the event is just like any other events:

```html
<div id="app">
  <div class="cart"><p>Cart({{cart}})</p></div>
  <product @add-to-cart="addCart"></product>
</div>

<script>
  Vue.component("product", {
      template: `[...]`,
      data() {
          return {
              [...]
          }
      },
      methods: {
          addToCart() {
              this.$emit('add-to-cart');
          },
          removeFromCart() {
              this.$emit('remove-from-cart');
          }
      }
  });

  var app = new Vue({
      el: '#app',
      data: {
          cart: 0
      },
      methods: {
          updateCart() {
              this.cart += 1;
          },
          removeCart() {
              if (this.cart > 0) this.cart -= 1;
          }
      },
  });
</script>
```

### Test10 - Forms

> [Tutorial: Forms](https://www.vuemastery.com/courses/intro-to-vue-js/forms)

For allowing a two-ways binding (not only getting a value but also setting it), we need to use `v-model` instead of `v-bind`.

The edit box below will be initialized to `data.name` but will also update the value when the user will type something in the form.

```html
<input id="name" v-model="name" />
```

To typecast the value as a number:

```html
<select id="rating" v-model.number="rating"></select>
```

#### Building a review form

The code below will build a review form with four entries: the username, does he/she will recommend or not the product, a rating and his/her review.

- `@submit.prevent`: attach our code to the submit event of the form and also prevent the normal feature of the browser i.e. refresh the page after a form's submission;
- `v-if="errors.length"`: our `onSubmit` function will check if fields are all filled in and if not, will add errors messages ('Please fill in ...') into global `errors` array. So the syntax `v-if` will check if the array is empty or not and if not, will display each errors (_this part can be migrated into a component_);
- `v-model.number="rating"`: the `.number` suffix will typecast the data as a number;

```javascript
Vue.component("product-review", {
  template: `
      <form class="review-form" @submit.prevent="onSubmit">
          <p v-if="errors.length">
              <b>Please correct the following error(s):</b>
              <ul>
                  <li v-for="error in errors">{{  error }}</li>
              </ul>
          </p>
          <p>
              <label for="name">Name:</label>
              <input id="name" v-model="name"/>
          </p>
          <p>
              <label for="review">Review:</label>
              <textarea id="review" v-model="review"></textarea>
          </p>
          <p>
              <label for="rating">Rating:</label>
              <select id="rating" v-model.number="rating">
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
              </select>
          </p>
          <p>Would you recommend this product?</p>
          <label>Yes<input type="radio" value="Yes" v-model="recommend"/></label>
          <label>No<input type="radio" value="No" v-model="recommend"/></label>
          <p>
              <input type="submit" value="Submit"/>
          </p>
      </form>
  `,
  data() {
    return {
      name: null,
      review: null,
      rating: null,
      recommend: null,
      errors: []
    };
  },
  methods: {
    onSubmit() {
      this.errors = [];
      if (this.name && this.review && this.rating && this.recommend) {
        let ProductReview = {
          name: this.name,
          review: this.review,
          rating: this.rating,
          recommend: this.recommend
        };
        this.$emit("review-submitted", ProductReview);
        this.name = null;
        this.review = null;
        this.rating = null;
        this.recommend = null;
      } else {
        if (!this.name) this.errors.push("Name required.");
        if (!this.review) this.errors.push("Review required.");
        if (!this.rating) this.errors.push("Rating required.");
        if (!this.recommend) this.errors.push("Recommendation required.");
      }
    }
  }
});
```

The `onSubmit()` method here above will create a new `ProductReview` object only when the four fields are filled in and will the emit an event `review-submitted` with the object as parameter so the parent can receive posted information's and display them f.i.

### Test11 - Tabs

> [Tutorial: Tabs](https://www.vuemastery.com/courses/intro-to-vue-js/tabs)

Quickly, we'll have a master component lets say `product` that will contains child components: `product-detail`, `product-reviews-tabs`, ... and child components will also have child components. For instance `product-review-tabs` can contain a component for displaying reviews and one for showing a form to add a review.

So: Product --> Product-review-tabs --> Product-review-add-form

By submitting a product review, the _grandfather_ needs to receive the event `a review has been submitted`. To allow this, a `bus event` will be instantiated. This is just like any other Vue instance...

```javascript
var eventBus = new Vue();
```

By submitting the review, an event will be triggered:

```javascript
eventBus.$emit("review-submitted", ProductReview);
```

And the grandfather will listen this event by using a new property called `mounted`:

```javascript
Vue.component('product', {
  props: {
      [ ... ]
  },
  template: `[ ... ]`,
  data() {
      return {
          [ ... ],
          reviews: []
      }
  },
  methods: {
      [ ... ]
  },
  computed: {
      [ ... ]
  },
  mounted() {
      eventBus.$on('review-submitted', productReview => {
          this.reviews.push(productReview)
      })
  }
});
```
