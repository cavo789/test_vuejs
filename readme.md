# Test VueJS

> Personal learning application to understand Vue.js. Step by step approach

* [Quick introduction](#quick-introduction)
  * [Cheatsheet](#cheatsheet)
* [Installation](#installation)
* [Debugging](#debugging)
* [Visual Studio code - Extensions](#visual-studio-code---extensions)
* [Options](#options)
  * [Options / Data](#options--data)
    * [computed](#computed)
    * [data](#data)
    * [props](#props)
    * [methods](#methods)
    * [watch](#watch)
  * [Options / DOM](#options--dom)
    * [el](#el)
    * [template](#template)
    * [render](#render)
    * [renderError](#rendererror)
  * [Options / Lifecycle Hooks](#options--lifecycle-hooks)
  * [Options / Assets](#options--assets)
  * [Options / Composition](#options--composition)
  * [Options / Misc](#options--misc)
  * [Instance Properties](#instance-properties)
  * [Instance Methods / Data](#instance-methods--data)
  * [Instance Methods / Events](#instance-methods--events)
  * [Instance Methods / Lifecycle](#instance-methods--lifecycle)
  * [Directives](#directives)
  * [Special Attributes](#special-attributes)
  * [Built-In Components](#built-in-components)
* [Important remarks](#important-remarks)
  * [Laravel](#laravel)
  * [Webpack](#webpack)
* [Playing with Vue](#playing-with-vue)
  * [Test1 - Minimal application](#test1---minimal-application)
  * [Test2 - Binding attribute](#test2---binding-attribute)
  * [Test3 - Conditional rendering](#test3---conditional-rendering)
  * [Test4 - List rendering](#test4---list-rendering)
  * [Test5 - Event handling](#test5---event-handling)
    * [Update the source of the image](#update-the-source-of-the-image)
  * [Test6 - Class and style binding](#test6---class-and-style-binding)
  * [Test7 - Computed properties](#test7---computed-properties)
  * [Test8 - Migrate to component](#test8---migrate-to-component)
  * [Test9 - Communicating events](#test9---communicating-events)
  * [Test10 - Forms](#test10---forms)
    * [Building a review form](#building-a-review-form)
  * [Test11 - Tabs](#test11---tabs)
  * [Test12 - Todos list](#test12---todos-list)
    * [Adding a close button](#adding-a-close-button)
  * [Test13 - Tasks components](#test13---tasks-components)
  * [Test14 - Show modal](#test14---show-modal)
  * [Test15 - Slots](#test15---slots)
  * [Test16 - Inline templates](#test16---inline-templates)
  * [Test17 - Watch](#test17-watch)
  * [Test18 - Webpack - Vue cli](#test18---webpack---vue-cli)
    * [Webpack](#webpack-1)
      * [Install dependencies](#install-dependencies)
      * [Run Dev build script](#run-dev-build-script)
      * [Playing](#playing)

## Quick introduction

- website: https://vuejs.org/
- Vue mastery tutorials: https://www.vuemastery.com/courses/intro-to-vue-js/
  - The one followed for this repository (tests 1 till 11): [https://www.vuemastery.com/courses/intro-to-vue-js/vue-instance/](https://www.vuemastery.com/courses/intro-to-vue-js/vue-instance/)
- laracast tutorials: https://laracasts.com/series/learn-vue-2-step-by-step/
- A curated list of awesome things related to Vue.js: https://github.com/vuejs/awesome-vue
- vuejs on Github: https://github.com/vuejs
- French tutorial: https://fr.vuejs.org/v2/guide/

![Vue logo](https://vuejs.org/images/logo.png)

- Vue is **Reactive**: the Vue instance data object is linked to every places where this data is used so, by assigning a new value to a data, Vue will guarantee that the newest value will be displayed in the DOM. No coding is required.

### Cheatsheet

- [The one of VueMastery](https://www.vuemastery.com/pdf/Vue-Essentials-Cheat-Sheet.pdf)

## Installation

Easy way, just include the .js file by adding a reference to the unpkg CDN: https://unpkg.com/vue@2.5.16/dist/vue.js

Read more: https://fr.vuejs.org/v2/guide/installation.html#CDN

## Debugging

[Vue.js devtools for Chrome](https://chrome.google.com/webstore/detail/vuejs-devtools/nhdogjmejiglipccpnnnanhbledajbpd).

Note: when the HTML is accessed by file://a_file.html, we'll need to change the configuration of the add-on and allow `file access URL`.

In the options of the add-on, we'll need to `Allow access to file URLs`.

[https://laracasts.com/series/learn-vue-2-step-by-step/episodes/2](https://laracasts.com/series/learn-vue-2-step-by-step/episodes/2) introduce the add-on and how we can use it; from the Chrome console.

## Visual Studio code - Extensions

- Vetur - Syntax highlighting for `.vue` files
  - Github: https://github.com/vuejs/vetur
  - Marketplace Visual Studio: https://marketplace.visualstudio.com/items?itemName=octref.vetur
- Prettier - Script beautifier
  - Github: https://github.com/prettier/prettier-vscode
- ESLint: Linting utility for Javascript and JSX
  - GitHub: https://github.com/Microsoft/vscode-eslint

## Options

List of options: [https://vuejs.org/v2/api/#Options-Data](https://vuejs.org/v2/api/#Options-Data)

Options are set in the `Vue()` constructor, here below, `el` and `data`.

```javascript
var app = new Vue({
  el: "#app",
  data: {
    [...]
  }
});
```

Here below a short list of options:

### Options / Data

#### computed

https://vuejs.org/v2/api/#computed

Where to define computed values...

```javascript
var app = new Vue({
  el: "#app",
  data: {
    firstname: 'Christophe',
    lastname: 'Avonture'
  },
  computed: {
    fullname() {
      return firstname + ' ' + lastname;
    }
  }
});
```


#### data

https://vuejs.org/v2/api/#data

Where to declare variables and default values.

```javascript
var app = new Vue({
  el: "#app",
  data: {
    firstname: 'Christophe',
  }
});
```

#### props

https://vuejs.org/v2/api/#props

Where to declare properties that can be initialized by the parent (caller) and used by the component.

```javascript
var app = new Vue({
  el: "#app",
  props: {
    message: {
        type: String,
        required: true,
        default: 'Hello world'
    }
  }
});
```

#### methods

https://vuejs.org/v2/api/#methods

Where to code functions and events

```html
<button @click="showTitle">Show the title</button>
```

```javascript
var app = new Vue({
  el: '#app',
  data: {
    title:'My preferred socks'
  },
  methods: {
    showTitle() {
        alert(this.title);
    }
  }
});
```

#### watch

https://vuejs.org/v2/api/#watch

Set a watcher to a variable. The function will be called every time the data is changed.

```html
<div id="app" class="container">
      <h1>Edit the title and see the console</h1>
    <input type="text" v-model="title" />
</div>
```

```javascript
var app = new Vue({
  el: '#app',
  data: {
    title:'My preferred socks'
  },
  watch: {
    title: function (val, oldVal) {
      console.log('new title: %s, old value: %s', val, oldVal)
    }
  }
});
```

### Options / DOM

#### el

https://vuejs.org/v2/api/#el

Set the DOM element associated to the Vue instance

```html
<div id="app">
  <tasks></tasks>
</div>
```

```javascript

var app = new Vue({
  el: '#app'
});
```

#### template

https://vuejs.org/v2/api/#template

Template string that will replace the DOM element

```html
<div id="app">
  <task>This is a task</task>
</div>
```

```javascript
Vue.component("task", {
  template:
    `<div class="message-header">
      <p><slot></slot></p>
    </div>`
});
```

#### render

https://vuejs.org/v2/api/#render

Vue recommend to use `template` but, when we need javascript for creating our HTML. So, a `render` function can be used instead of `template`.

See https://vuejs.org/v2/guide/render-function.html

A nice example is given here: https://vuejs.org/v2/guide/render-function.html#Basics

#### renderError

https://vuejs.org/v2/api/#renderError

Provide a new way of outputting errors. Only since Vue 2.2.0 and during local development mode.

```javascript
new Vue({
  render (h) {
    throw new Error('oops')
  },
  renderError (h, err) {
    return h('pre', { style: { color: 'red' }}, err.stack)
  }
}).$mount('#app')
```

### Options / Lifecycle Hooks

There are a lot of events: https://vuejs.org/v2/guide/instance.html#Lifecycle-Diagram

![Lifecycle Hooks](https://vuejs.org/images/lifecycle.png)

* [beforeCreate](https://vuejs.org/v2/api/#beforeCreate)
* [created](https://vuejs.org/v2/api/#created)
* [beforeMount](https://vuejs.org/v2/api/#beforeMount)
* [mounted](https://vuejs.org/v2/api/#mounted)
* [beforeUpdate](https://vuejs.org/v2/api/#beforeUpdate)
* [updated](https://vuejs.org/v2/api/#updated)
* [activated](https://vuejs.org/v2/api/#activated)
* [deactivated](https://vuejs.org/v2/api/#deactivated)
* [beforeDestroy](https://vuejs.org/v2/api/#beforeDestroy)
* [destroyed](https://vuejs.org/v2/api/#destroyed)
* [errorCaptured](https://vuejs.org/v2/api/#errorCaptured)

### Options / Assets

* [components](https://vuejs.org/v2/api/#components)
* [directives](https://vuejs.org/v2/api/#directives)
* [filters](https://vuejs.org/v2/api/#filters)

### Options / Composition

* [extends](https://vuejs.org/v2/api/#extends)
* [mixins](https://vuejs.org/v2/api/#mixins)
* [parent](https://vuejs.org/v2/api/#parent)
* [provide/inject](https://vuejs.org/v2/api/#provide-inject)

### Options / Misc

* [comments](https://vuejs.org/v2/api/#comments)
* [delimiters](https://vuejs.org/v2/api/#delimiters)
* [functional](https://vuejs.org/v2/api/#functional)
* [inheritAttrs](https://vuejs.org/v2/api/#inheritAttrs)
* [model](https://vuejs.org/v2/api/#model)
* [name](https://vuejs.org/v2/api/#name)

### Instance Properties

* [vm.$attrs](https://vuejs.org/v2/api/#vm-attrs)
* [vm.$children](https://vuejs.org/v2/api/#vm-children)
* [vm.$data](https://vuejs.org/v2/api/#vm-data)
* [vm.$el](https://vuejs.org/v2/api/#vm-el)
* [vm.$isServer](https://vuejs.org/v2/api/#vm-isServer)
* [vm.$listeners](https://vuejs.org/v2/api/#vm-listeners)
* [vm.$options](https://vuejs.org/v2/api/#vm-options)
* [vm.$parent](https://vuejs.org/v2/api/#vm-parent)
* [vm.$props](https://vuejs.org/v2/api/#vm-props)
* [vm.$refs](https://vuejs.org/v2/api/#vm-refs)
* [vm.$root](https://vuejs.org/v2/api/#vm-root)
* [vm.$scopedSlots](https://vuejs.org/v2/api/#vm-scopedSlots)
* [vm.$slots](https://vuejs.org/v2/api/#vm-slots)

### Instance Methods / Data

* [vm.$delete( target, key )](https://vuejs.org/v2/api/#vm-delete)
* [vm.$set( target, key, value )](https://vuejs.org/v2/api/#vm-set)
* [vm.$watch( expOrFn, callback, [options] )](https://vuejs.org/v2/api/#vm-watch)

### Instance Methods / Events

* [vm.$emit( eventName, […args] )](https://vuejs.org/v2/api/#vm-emit)
* [vm.$off( [event, callback] )](https://vuejs.org/v2/api/#vm-once)
* [vm.$on( event, callback )](https://vuejs.org/v2/api/#vm-on)

### Instance Methods / Lifecycle

* [vm.$destroy()](https://vuejs.org/v2/api/#vm-destroy
* [vm.$forceUpdate()](https://vuejs.org/v2/api/#vm-forceUpdate)
* [vm.$mount( [elementOrSelector] )](https://vuejs.org/v2/api/#vm-mount)
* [vm.$nextTick( [callback] )](https://vuejs.org/v2/api/#vm-nextTick)

### Directives

* [v-bind](https://vuejs.org/v2/api/#v-bind)
* [v-cloak](https://vuejs.org/v2/api/#v-cloak)
* [v-else-if](https://vuejs.org/v2/api/#v-else-if)
* [v-else](https://vuejs.org/v2/api/#v-else)
* [v-for](https://vuejs.org/v2/api/#v-for)
* [v-html](https://vuejs.org/v2/api/#v-html)
* [v-if](https://vuejs.org/v2/api/#v-if)
* [v-model](https://vuejs.org/v2/api/#v-model)
* [v-on](https://vuejs.org/v2/api/#v-on)
* [v-once](https://vuejs.org/v2/api/#v-once)
* [v-pre](https://vuejs.org/v2/api/#v-pre)
* [v-show](https://vuejs.org/v2/api/#v-show)
* [v-text](https://vuejs.org/v2/api/#v-text)

### Special Attributes

* [is](https://vuejs.org/v2/api/#is)
* [key](https://vuejs.org/v2/api/#key)
* [ref](https://vuejs.org/v2/api/#ref)
* [slot-scope](https://vuejs.org/v2/api/#slot-scope)
* [slot](https://vuejs.org/v2/api/#slot)

### Built-In Components

* [component](https://vuejs.org/v2/api/#component)
* [keep-alive](https://vuejs.org/v2/api/#keep-alive)
* [slot](https://vuejs.org/v2/api/#slot-1)
* [transition-group](https://vuejs.org/v2/api/#transition-group)
* [transition](https://vuejs.org/v2/api/#transition)

## Important remarks

### Laravel

By coding in a Blade template in Laravel, the following syntax **WON'T WORK** while it's perfectly correct:

```html
<div id="app">
  <ul>
      <li v-for="detail in details">{{ detail }}</li>
  </ul>
</div>
```

This is because the `{{ ... }}` syntax will be intercepted by Laravel (thus on server level (`PHP`)) while, here, it's not a Laravel expression but a Vue expression (thus on server side (`javascript`)).

==> We need to inform Laravel to ignore it ! This is done by adding the `@` character before the expression:

```html
<div id="app">
  <ul>
      <li v-for="detail in details">@{{ detail }}</li>
  </ul>
</div>
```

Alternative: here we can use the `v-text` attribute to avoid to use an expression:

```html
<li v-for="detail in details" v-text="detail"></li>
```

### Webpack

When building the package, Webpack will inject `<script src="/dist/build.js"></script>` in the `index.html` file. The location of the `build.js` file will thus be set to the root of the web application and not relative to the current folder.

To use a relative path, we'll need to modify the `webpack.config.js` file and remove the `/` before the dist folder in the `publicPath` variable:

```json
module.exports = {
  [ ... ]
  output: {
    [ ... ]
    publicPath: 'dist/',
    [ ... ]
  },
```

## Playing with Vue

### Test1 - Minimal application

> [Tutorial: The Vue instance](https://www.vuemastery.com/courses/intro-to-vue-js/vue-instance/)
> Same minimal approach and really good explained on [https://laracasts.com/series/learn-vue-2-step-by-step/episodes/1](https://laracasts.com/series/learn-vue-2-step-by-step/episodes/1)

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

Notes:

- it is recommended to use a special key attribute when rendering elements like above so that Vue can keep track of each node's identity.
- another syntax is `<li v-for="detail in details" v-text="detail"></li>`: with v-text, we can specify the text to display without using an expression like `{{ detail }}`.

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
> Also look [Component Communication #2](https://laracasts.com/series/learn-vue-2-step-by-step/episodes/13) on Laracast.

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

### Test12 - Todos list

> [Tutorial: Todos list](https://laracasts.com/series/learn-vue-2-step-by-step/episodes/6)

With a simple tasks list like this:

```javascript
data: {
  tasks: [
    { description: "Go to the store", completed: true },
    { description: "Finish screencast", completed: false },
    { description: "Make donation", completed: false },
    { description: "Clear inbox", completed: false },
    { description: "Make dinner", completed: false },
    { description: "Clean room", completed: true }
  ];
}
```

It's easy to display completed tasks and the ones that should still be done:

```html
<div id="app">
  <h2>Don't forget</h2>
  <ul>
    <li v-for="task in tasks" v-if="!task.completed" v-text="task.description"></li>
  </ul>
  <h2>Already completed</h2>
  <ul>
    <li class="completed" v-for="task in tasks" v-if="task.completed" v-text="task.description"></li>
  </ul>
</div>
```

With `v-if` it's easy to put a condition before doing the display.

**Optimization**

By the use of a computed variable, the content of the variable will be put in cache so, on the next call and until the real data is changed, the list won't be filtered again and again.

```javascript
data: {
  tasks: [
    { description: "Go to the store", completed: true },
    { description: "Finish screencast", completed: false },
    { description: "Make donation", completed: false },
    { description: "Clear inbox", completed: false },
    { description: "Make dinner", completed: false },
    { description: "Clean room", completed: true }
  ];
},
computed: {
  incompleteTasks() {
    return this.tasks.filter(task => !task.completed);
  }
}
```

HTML becomes:

```html
<div id="app">
  <h2>Don't forget</h2>
  <ul>
    <li v-for="task in incompleteTasks" v-text="task.description"></li>
  </ul>
  <h2>Already completed</h2>
  <ul>
    <li class="completed" v-for="task in completeTasks" v-text="task.description"></li>
  </ul>
</div>
```

#### Adding a close button

The HTML below will display a list of tasks.

```html
<div id="app" class="container">
    <task-list></task-list>
</div>
```

`task-list` is a view component that will use another component `task`. For each task, a card will be displayed with the title and a dummy description but, very easy, will include a close button.

```html
<button type="button" @click="isVisible = false" class="delete"></button>
```

The expression will just put the `isVisible` variable to false. No need to call a jQuery `$('#div').close();` or anything else. Just by setting the variable to false will do the trick since the card is upon a `v-if` condition: `<article class="message is-info" v-show="isVisible">`. Easy! 

```javascript
Vue.component("task-list", {
  template: `
    <div>
      <task v-for="task in tasks">{{ task.description }}</task>
    </div>`,
  data() {
    return {
      tasks: [
        { description: 'Go to the store', completed: true },
        { description: 'Finish screencast', completed: false },
        { description: 'Make donation', completed: false },
        { description: 'Clear inbox', completed: false },
        { description: 'Make dinner', completed: false },
        { description: 'Clean room', completed: true }
      ]
    }
  }
});

Vue.component("task", {
  props: ["title"],
  template:
    `<article class="message is-info" v-show="isVisible">
        <div class="message-header">
          <p><slot></slot></p>
          <button type="button" @click="hideModal"></button>
        </div>
        <div class="message-body">
          Lorem ipsum dolor sit amet, consectetur adipiscing elit.
        </div>
    </article>`,
  data() {
    return {
      isVisible: true
    }
  }
});

var app = new Vue({
  el: "#app",
  data: {}
});
```

CONTINUER https://laracasts.com/series/learn-vue-2-step-by-step/episodes/10

### Test13 - Tasks components

> [Tutorial: Todos list](https://laracasts.com/series/learn-vue-2-step-by-step/episodes/6)

Using [Bulma CSS framework](https://bulma.io/) for displaying a list of todos.

A task (*todo*) is a component in Vue with a close button. Clicking on the button will just set a boolean `isVisible` variable to false. And that variable is used in the `v-show` attribute to show or hide the task.

```javascript
Vue.component("task", {
  props: ["title"],
  template:
    `<article class="message is-info" v-show="isVisible">
        <div class="message-header">
          <p><slot></slot></p>
          <button type="button" @click="isVisible = false" class="delete"></button>
        </div>
        <div class="message-body">
          Lorem ipsum dolor sit amet, consectetur adipiscing elit.
        </div>
    </article>`,
  data() {
    return {
      isVisible: true
    }
  }
});
```

### Test14 - Show modal

> [Tutorial: Show modal](https://laracasts.com/series/learn-vue-2-step-by-step/episodes/10)

In HTML, we'll show a `modal` component using a `v-if` to show the modal only when a boolean is set to true. The modal contains a button that will emit a `close` event. That event will be catched in HTML with the `@close` attribute and we'll just set the variable to false so the modal will be hidden.

```html
<div id="app" class="container">
  <modal v-if="showModal" @close="showModal = false">Hello world</modal>
  <button type="button" @click="showModal = true">Show modal</button>
</div>
```

```javascript
Vue.component("modal", {
  template: `
    <div class="modal is-active">
      <div class="modal-background"></div>
      <div class="modal-content">
        <div class="box">
          <slot></slot>
        </div>
      </div>
      <button class="modal-close is-large" aria-label="close" @click="$emit('close')"></button>
    </div>`
});
```

### Test15 - Slots

> [Tutorial: Show modal](https://laracasts.com/series/learn-vue-2-step-by-step/episodes/14)

When showing a component (like a modal form), we need to be able to specify the title to use for the modal but also the content and a footer with buttons so not only one single information but several.

Until now, we've used `<slot></slot>` for taking everything that was mentioned within the component tag like `<modal><h1>This is my slot</h1></slot>`.

In the example below, we'll use a component called `modal` with three slots: two named slots (`header` and `footer`) and one unnamed (aka `default slot`).

```html
<modal>
  <template slot="header">This is my header slot</template>
  Lorem ispo dolor sit amet.
  <div slot="footer">
      <a class="button is-primary">Save change</a>
      <a class="button">Cancel</a>
  </div>
</modal>
```

The component can be something like this:

```javascript
Vue.component("modal", {
  template: `
    <div class="modal is-active">
      <div class="modal-background"></div>
      <div class="modal-card">
        <header class="modal-card-head">
          <p class="modal-card-title">
            <slot name="header"></slot>
          </p>
          <button class="delete" aria-label="close"></button>
        </header>
        <section class="modal-card-body">
          <slot></slot>
        </section>
        <footer class="modal-card-foot">
          <slot name="footer">
            Default footer...
          </slot>
        </footer>
      </div>
    </div>`
});
```

With `<slot name="header"></slot>`, we'll use the slot called `header`.
With `<slot name="footer">`, we'll use the slot called `footer`. In this example, we'll specify a default footer. This means that if the parent doesn't provide a footer slot, we'll provide one by default.
The unnamed slot will be used by using `<slot></slot>`.

### Test16 - Inline templates

> [Tutorial: Inline templates](https://laracasts.com/series/learn-vue-2-step-by-step/episodes/15)

A Vue component always have an associate template like in:

```javascript
Vue.component("modal", {
  template: `
    <div class="modal is-active">
      ...
    </div>`
});
```

But sometimes, it's not needed to put the template there but is more useful to keep it inside our HTML file. For instance, when the need for a component is not for reusability but just to take advantage of the reactivity of Vue.

In order to use an inline template, we just need to add the `inline-template` attribute like below:

```html
<progress-review inline-template>
  <div>
    <h1>Your completion rate is {{ completionRate}}%</h1>
    <p><button @click="completionRate += 10">Increase it by 10</button></p>
  </div>
</progress-review>
```

(remember: only one root element inside a template; this is why we need a `div` here above)

```javascript
Vue.component("progress-review", {
  data() {
    return {
      completionRate: 25
    }
  }
});
```

### Test17 - Webpack - Vue cli

[Webpack and vue-cli](https://laracasts.com/series/learn-vue-2-step-by-step/episodes/16)

1. We'll need to install 
   * `Vue cli`: `npm install -g vue-cli`
2. Create a new application: 
   * `cd c:\repository` (where my-app is the desired application name).
   * `vue init webpack-simple my-app` (where my-app is the desired application name).

A new folder `c:\repository\my-app` will then be created with a template application.

The file `/src/App.vue` will contains a structure with HTML (in the `template` section), JS (`script`) and CSS (`style`). Everything in only one single file, a `.vue` file.

```html
<template>
</template>

<script>
</script>

<style>
</style>
```

#### Webpack

**The browser doesn't understand how to use such `.vue` file**: Webpack will bundle the file into files that can be understand by any browser.

The configuration is stored in the `webpack.config.js` file.

The entry point of the application is mentioned in the ´entry` node.

```javascript
module.exports = {
  entry: './src/main.js',
  [...]
```

`output` is used for specifying where to put files when we'll compile our application:

```javascript
module.exports = {
  [...]
  output: {
    path: path.resolve(__dirname, './dist'),
    publicPath: '/dist/',
    filename: 'build.js'
  },
  [...]
```

Webpack will also define various loaders:

```javascript
module.exports = {
  [...]
  module: {
    rules: [
      {
        test: /\.css$/,
        use: [
          'vue-style-loader',
          'css-loader'
        ],
      },      {
        test: /\.vue$/,
        loader: 'vue-loader',
        options: {
          loaders: {
          }
          // other vue-loader options go here
        }
      },
  [...]
```

##### Install dependencies

```
npm install
```

##### Run Dev build script

By firing the following instruction, the node environment will be set to `development`, webpack-dev-server will be instantiated and a browser automatically fired for this URL: `http://localhost:8081/`

```
npm run dev
```

`run dev` is a script defined in the `package.json` file, in the `scripts` node:

```json
"scripts": {
  "dev": "cross-env NODE_ENV=development webpack-dev-server --open --hot",
  "build": "cross-env NODE_ENV=production webpack --progress --hide-modules"
}
```

`--hot` means `hot reload`: by changing a source file and just save it, the navigator will automatically refresh the page and the changes will be reflected immediately.

##### Playing

In `/src/App.vue`, we can f.i. update the content like below i.e. using a custom component called `message`:

```html
<template>
  <div id="app">
    <message>Hello there</message>
    <message>Hello World</message>
    <message>Hello Universe</message>
  </div>
</template>

<script>
import Message from "./components/Message.vue";

export default {
  name: "app",
  components: { Message },
  data() {
    return {};
  }
};
</script>

<style>
</style>
```

That component is just a `.vue` file stored in a sub-folder `components`.

The `Message.vue` file will define a template that will show a `div` and our message; with a small styling.

```html
<template>
  <div class="box">
    <p>
      <slot></slot>
    </p>
  </div>
</template>

<<script>
export default {
}
</script>

<<style>
    .box{background: #e3e3e3; padding: 10px; border: 1px solid black; margin-bottom:10px;}
</style>
```

Thanks the hot reload, just saving the files will make the changes immediately visible in the browser tab.


CONTINUER 
* https://laracasts.com/series/learn-vue-2-step-by-step/episodes/19
