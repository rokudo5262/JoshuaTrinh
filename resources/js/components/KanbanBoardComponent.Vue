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
            <div class="">
              <div class="">
                <h4 class="">
                  {{ status.title }}
                </h4>
                <button class="btn-sm float-left">Add Task</button>
              </div>

              <div class="">
                <!-- Tasks -->
                <div v-for="task in status.tasks" :key="task.id" class="bg-white border rounded overflow-hidden">
                  <span class="">
                    {{ task.title }}
                  </span>
                  <p class="">{{ task.description }} </p>
                </div>
                <!-- ./Tasks -->

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
<style>

</style>
