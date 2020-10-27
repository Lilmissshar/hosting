<template>
  <div class="gallery__page">
    <div class="gallery__warp">
      <div class="row">
        <li v-for="filter in filtered" v-on:click="option(state)">
        <div class="col-lg-3 col-md-4 col-sm-6">
            <img :src="images/destinations/'+$filter->picture" alt="image" width="500" height="375">
            Name: {{ $filter.name }}<br>
            Description: {{ $filter.description}}
          </li></div>
        </div>
        </div>
      </div>
</template>

<script>
  export default {
    props: ['propDestinations'],
    data: function() {
      return {
        destinations: [{
          'name': null,
          'description': null
        }],
        filtered: [],

      };

    },
    mounted(){
      if(!this.propDestinations) {
        return;
      }

      this.destinations = JSON.parse(this.propDestinations);
    }
  }
</script>