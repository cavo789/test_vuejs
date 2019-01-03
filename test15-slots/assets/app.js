Vue.component("modal", {
  template: `
    <div class="modal is-active" v-if="isVisible">
      <div class="modal-background"></div>
      <div class="modal-card">
        <header class="modal-card-head">
          <p class="modal-card-title">
            <slot name="header"></slot>
          </p>
          <button class="delete" @click="isVisible = false"></button>
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
    </div>`,
  data() {
    return {
      isVisible: true
    }
  }
});

var app = new Vue({
  el: "#app",
  data: {
    showModal: false
  }
});
