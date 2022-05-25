<template>
  <div class="container">
    <div class="card">
      <div class="card-header">
          <h2>Tasks</h2>                        
      </div>
      <div class="card-body">
        <div class="row">
          <!-- Columns (Statuses) -->
          <div v-for="status in statuses" :key="status.slug" class="col">
            <div class="rounded-md shadow-md overflow-hidden">
              <div class="p-3 flex justify-between items-baseline bg-blue-800">
                <h4 class="font-medium text-blac">
                  {{ status.title }}
                </h4>
                <button class="btn-sm float-left">Add Task</button>
              </div>

                <div class="p-2 bg-blue-100">
                <!-- Tasks -->
                    <draggable
      class="flex-1 overflow-hidden"
      v-model="status.tasks"
      v-bind="taskDragOptions"
      @end="handleTaskMoved"
    >
          <transition-group
        class="flex-1 flex flex-col h-full overflow-x-hidden overflow-y-auto rounded shadow-xs"
        tag="div"
      >
                <div 
                  v-for="task in status.tasks" 
                  :key="task.id" 
                  class="mb-3 p-3 h-24 flex flex-col bg-white rounded-md shadow transform hover:shadow-md cursor-pointer"
                  >
                  <span class="">
                    {{ task.title }}
                  </span>
                  <p class="">{{ task.description }} </p>
                </div>
                <!-- ./Tasks -->
            </transition-group>
          </draggable>
                <!-- No Tasks -->
                <div v-show="!status.tasks.length" class="">
                  <span class="mb-3">No tasks yet</span>
                  <button class="btn-sm btn-primary">Add one</button>
                </div>
                <!-- ./No Tasks -->
              </div>
            </div>
          </div>
          <!-- ./Columns -->
        </div>
      </div>
      <div class="card-footer">
        <a type="button" href="/admin">Dashboard</a>
      </div>
    </div>
  </div>
</template>

<script>
import draggable from "vuedraggable";
export default {
  components: { 
    draggable
  },
  props: {
    initialData: Array
  },
  data() {
    return {
      statuses: []
    };
  },
  computed: {
    taskDragOptions() {
      return {
        animation: 200,
        group: "task-list",
        dragClass: "status-drag"
      };
    }
  },
  methods: {
    // ...
    handleTaskMoved() {
      // Send the entire list of statuses to the server
      axios.put("/admin/task/sync", {columns: this.statuses})
      .then(response => {
        console.log(response.data);
      })
      .catch(error => {
        // console.log(error);
      });
    }
  },
  mounted() {
    console.log('Kanban Component mounted.');
    // 'clone' the statuses so we don't alter the prop when making changes
    this.statuses = JSON.parse(JSON.stringify(this.initialData));
  }
};
</script>
<style>
.status-drag {
  transition: transform 0.5s;
  transition-property: all;
}
</style>
