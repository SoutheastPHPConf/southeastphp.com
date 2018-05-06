<style lang='scss'>

</style>
<template>
    <div>
        <div class="col-md-2">
            <h2>Sponsors</h2>
            <p>We counldn't do this conference without these amazing companies!</p>
            <div class="panel panel-default" v-for="sponsor in shuffledSponsors">
                <div class="panel-body sponsors">
                    <a :href="sponsor.website"><img class="img-responsive img-thumbnail" :src="sponsor.image" :alt="sponsor.name"></a>
                    <p class="tracking-wide text-center font-2xl sponsors">{{ sponsor.name }}</p>
                    <p class="tracking-wide text-center font-2xl sponsors">{{ sponsor.sponsorLevel }}</p>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
  import axios from 'axios';

  export default {
    created() {
      this.getSponsors();
    },

    computed: {
      shuffledSponsors() {
        return shuffle(this.sponsors);
      }
    },

    data() {
      return {
        sponsors: [],
      };
    },

    getSponsors() {
      axios.get('/api/sponsors').then(response => {
        this.sponsors = response.data.data;
      }).catch(error => {
        console.error(error);
      })
    },
  };
</script>