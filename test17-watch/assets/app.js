var app = new Vue({
  el: "#app",
  data() {
    return {
      title: 'Nice title'
    }
  },
  watch: {
    title: function (val, oldVal) {
      console.log('new title: %s, old value: %s', val, oldVal)
    }
  }
});
