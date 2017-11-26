<template>
  <div
    style="max-width: 1000px; margin: auto;"
    class="grey lighten-3"
  >
    <v-container
      fluid
      style="min-height: 0;"
      grid-list-lg
    >
      <v-layout row wrap>
        <v-flex xs12>
          <table-g/>
        </v-flex>
      </v-layout>
    </v-container>
  </div>
</template>

<script>
import TableG from './components/table';
export default {
  name: 'app',
  data() {
    return {
      msg: 'Welcome to Your Vue.js App'
    };
  },
  template: '<TableG/>',
  components: { TableG }
};
</script>

<style lang="scss" scoped>

</style>
