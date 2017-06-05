<style lang='scss'>
 .container {
     padding-top: 10rem;
 }
</style>

<template>

    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Email</th>
                            <th>Signup Date</th>
                            <th>Duplicate</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="email in emails">
                            <td> {{ email.email }}</td>
                            <td> {{ email.signupDate.date }}</td>
                            <td>
                                <label>
                                    <input type="checkbox"> Duplicate
                                </label>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</template>
<script>
  import axios from 'axios';

  export default {

    mounted() {
      this.getEmailSignups();
    },

    computed: {

    },

    data()
    {
      return {
        emails: [],
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
  };
</script>