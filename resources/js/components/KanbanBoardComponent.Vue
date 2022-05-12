<template>
  <div class="mb-3">
    <!-- Columns (Statuses) -->
    <div
      v-for="status in statuses" :key="status.slug" class="">
      <div class="mb-3">
        <div class="mb-3">
          <h4 class="mb-3">
            {{ status.title }}
          </h4>
          <button class="btn-primary">Add Task</button>
        </div>
        <div class="mb-3">

          <!-- Tasks -->
          <div v-for="task in status.tasks" :key="task.id" class="" >
            <span class="mb-3">
              {{ task.title }}
            </span>
            <p class="">{{ task.description }} </p>
          </div>
          <!-- ./Tasks -->

          <!-- No Tasks -->
          <div v-show="!status.tasks.length" class="">
            <span class="mb-3">No tasks yet</span>
            <button class="btn-primary"> Add one</button>
          </div>
          <!-- ./No Tasks -->
        </div>
      </div>
    </div>
    <!-- ./Columns -->

  </div>
</template>

<script>
export default {
  props: {
    initialData: Array
  },
  data() {
    return {
      statuses: []
    };
  },
  mounted() {
       console.log('Kanban Component mounted.');
    // 'clone' the statuses so we don't alter the prop when making changes
    this.statuses = JSON.parse(JSON.stringify(this.initialData));
  }
};
</script>