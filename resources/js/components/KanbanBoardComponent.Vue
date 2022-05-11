<template>
  <div class="">
    <!-- Columns (Statuses) -->
    <div
      v-for="status in statuses" :key="status.slug" class="">
      <div class="">
        <div class="">
          <h4 class="">
            {{ status.title }}
          </h4>
          <button class="">Add Task</button>
        </div>
        <div class="">

          <!-- Tasks -->
          <div v-for="task in status.tasks" :key="task.id" class="" >
            <span class="">
              {{ task.title }}
            </span>
            <p class="">{{ task.description }} </p>
          </div>
          <!-- ./Tasks -->

          <!-- No Tasks -->
          <div v-show="!status.tasks.length" class="">
            <span class="">No tasks yet</span>
            <button class=""> Add one</button>
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