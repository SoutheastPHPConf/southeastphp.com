<style lang='scss' scoped>
 .container {
     padding-top: 10rem;
 }
</style>

<template>
    <div>
        <se-nav :user="user"></se-nav>
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Email</th>
                            <th>Signup Date</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="email in emails">
                            <td> {{ email.email }}</td>
                            <td> {{ email.signupDate.date }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <se-footer></se-footer>
    </div>
</template>
<script>
  import axios from 'axios';
  import auth from '../../auth.js';
  import SeNav from '../navbar.vue';
  import SeFooter from '../footer.vue';

  export default {
    created() {
      return auth.check();
    },

    mounted() {
      this.getEmailSignups();
    },

    computed: {

    },

    data() {
      return {
        emails: [],
        auth: auth,
        user: auth.user,
      };
    },

    methods: {
      getEmailSignups() {
        return axios.get('api/emails').then((response) => {
          this.emails = response.data.data;
        }).catch((error) => {
          //
        });
      },
    },

    components: {
      SeNav,
      SeFooter,
    }
  };
</script>