<template>
    <div align="center" :style="{color:$store.state.color_code}">
        <h2>{{ $store.state.counter }}</h2>
        <div class="math">
            {{ $store.state.counter }}
            <sup>2</sup>  =
           {{ $store.getters.counter_squared }}
        </div>
        <div class="buttons">
            <button class="btn btn-sm btn-success" @click="$store.dispatch('increase_counter')">+</button>
            <button class="btn btn-sm btn-danger" @click="$store.dispatch('decrease_counter')">-</button>
        </div>
        <div class="color_code">
            <input type="text" name="color_code" placeholder="please enter a color" v-model="color_code">
        </div>
    </div>

</template>
<script>
    export default {
        mounted() {
            console.log('Counter Component mounted.');
        },
        computed:{
            color_code: {
                get() {
                    return this.$store.state.color_code
                },
                set(new_value) {
                    this.$store.dispatch('set_color_code',new_value)
                },
            }
        }
    }
</script>