Vue.component("task-list", {
  template: `
    <div class="columns">
      <div class="column" v-for="task in tasks" :key="task.id">
        <task>{{ task.description }}</task>
      </div>
    </div>`,
  data() {
    return {
      tasks: [
        { id: 1, description: 'Go to the store', completed: true },
        { id: 2, description: 'Finish screencast', completed: false },
        { id: 3, description: 'Make donation', completed: false },
        { id: 4, description: 'Clear inbox', completed: false },
        { id: 5, description: 'Make dinner', completed: false },
        { id: 6, description: 'Clean room', completed: true }
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

var app = new Vue({
  el: "#app",
  data: {}
});
