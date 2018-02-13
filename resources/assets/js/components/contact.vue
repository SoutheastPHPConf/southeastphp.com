<style lang='scss'>

</style>
<template>
    <div>
        <se-navbar></se-navbar>
        <div class="container">
            <div class="row">
                <div class="col-xs-6 col-xs-offset-3">
                    <div class="alert alert-success" v-if="showSuccess">
                        <p>Thanks! We will reply as soon as we can!</p>
                    </div>
                    <h2>Contact Us!</h2>
                    <p>Use this form to contact us and we will get back to you with answers as soon as we can!</p>
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <form method="post" @submit.prevent="submitContactForm">
                                <div class="form-group">
                                    <label for="inputEmail">First Name</label>
                                    <input type="email" class="form-control" id="inputFirstName" placeholder="First Name" v-model="firstName">
                                </div>
                                <div class="form-group">
                                    <label for="inputLastName">Last Name</label>
                                    <input type="email" class="form-control" id="inputLastName" placeholder="Last Name" v-model="lastName">
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail">Email</label>
                                    <input type="email" class="form-control" id="inputEmail" placeholder="Email" v-model="email">
                                </div>
                                <div class="form-group">
                                    <label for="inputMessage">Email</label>
                                    <textarea class="form-control" id="inputMessage" placeholder="Message" v-model="message"></textarea>
                                </div>
                                <button type="submit" class="btn btn-success btn-lg">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <se-footer></se-footer>
    </div>
</template>
<script>
  import axios from 'axios';
  import SeNavbar from './navbar.vue';
  import SeFooter from './footer.vue';

  export default {
    data() {
      return {
        firstName: '',
        lastName: '',
        email: '',
        message: '',
        showSuccess: false,
      };
    },

    methods: {
      submitContactForm() {
        axios.post('/api/contact', {
          firstName: this.firstName,
          lastName: this.lastName,
          email: this.email,
          message: this.message,
        }).then(response => {
          this.showSuccess = true;

          setTimeout(() => {
            this.showSuccess = false;
          }, 3000);
        }).catch(error => {
          console.log(error);
        });
      }
    },

    components: {
      SeNavbar,
      SeFooter,
    }
  };
</script>