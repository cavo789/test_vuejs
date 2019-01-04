<template>
  <div id="app" class="container">
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
