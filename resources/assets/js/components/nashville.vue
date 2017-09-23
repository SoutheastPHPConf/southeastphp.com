<style lang='scss' scoped>
    .container {
        padding-top: 7rem;
    }

    #select {
        padding-bottom: 1rem;
    }

    .panel {
        min-height: 27rem;
    }
</style>
<template>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h2>Nashville, TN <br><small>Things to do and see in between our conference!</small></h2>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 col-md-6" v-for="attraction in attractions.data">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">{{ attraction.activity }}</h3> <span class="label label-default">{{ attraction.activityType }}</span>
                        </div>
                        <div class="panel-body">
                            <p> {{ attraction.description }}</p>
                            <p><a :href="attraction.link" target="_blank"><i class="fa fa-globe" aria-hidden="true"></i> Website</a></p>
                            <p><a :href="attraction.yelp" v-if="attraction.yelp"><i class="fa fa-yelp" v-if="attraction.yelp" aria-hidden="true"></i> Yelp Link</a></p>
                            <p><a :href="attraction.map"><i class="fa fa-map-marker" aria-hidden="true"></i> Google Map</a></p>
                          </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
  import axios from 'axios';

  export default {
    data() {
      return {
        attractions: [],
      };
    },

    created() {
      this.getNashvilleList();
    },

    methods: {
      getNashvilleList() {
        axios.get('/api/nashville').then(response => {
          this.attractions = response.data;
        })
      }
    }
  };
</script>