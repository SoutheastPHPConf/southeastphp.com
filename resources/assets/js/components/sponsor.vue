<style lang='scss'>

</style>
<template>
    <div>
        <se-navbar :user="user"></se-navbar>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-6">
                    <img :src="sponsor.data.image" :alt="sponsor.data.name">
                </div>
                <div class="col-xs-12 col-md-6">

                </div>
            </div>
        </div>
        <se-footer></se-footer>
    </div>
</template>
<script>
  import axios from 'axios';
  import auth from '../auth.js';
  import SeFooter from './footer.vue';
  import SeNavbar from './navbar.vue';

  export default {
    created() {
      this.getSponsor();
      this.authCheck();
    },

    data() {
      return {
        sponsor: [],
        auth: auth,
        user: auth.user || null,
      };
    },

    methods: {
      getSponsor() {
        return axios.get(`/api/sponsors/${this.$route.params.id}`).then(response => {
          this.sponsor = response.data;
        }).catch(error => {
          console.error(error);
        });
      },

      authCheck() {
        return auth.check();
      }
    },

    components: {
      SeNavbar,
      SeFooter,
    }
  };
</script>