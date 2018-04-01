<style lang='scss'>
    span {
        padding-top: .1rem;
        color: red;
    }
</style>
<template>
    <div>
        <se-navbar></se-navbar>
        <div class="container">
            <div class="row">
                <div class="col-xs-6 col-xs-offset-3">
                    <div class="alert alert-danger" v-if="showSuccess">
                        <p>Thanks! We will reply as soon as we can!</p>
                    </div>

                    <div class="alert alert-error" v-if="showError">
                        <p>Please fill out all of the fields</p>
                    </div>
                    <h2>Contact Us!</h2>
                    <p>Use this form to contact us and we will get back to you with answers as soon as we can!</p>
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <form method="post" @submit.prevent="submitContactForm">
                                <div class="form-group">
                                    <label for="inputFirstName">First Name <span>*</span></label>
                                    <input type="text" class="form-control" id="inputFirstName" placeholder="First Name" v-model="firstName">
                                </div>
                                <div class="form-group">
                                    <label for="inputLastName">Last Name  <span>*</span></label>
                                    <input type="text" class="form-control" id="inputLastName" placeholder="Last Name" v-model="lastName">
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail">Email  <span>*</span></label>
                                    <input type="email" class="form-control" id="inputEmail" placeholder="Email" v-model="email">
                                </div>
                                <div class="form-group">
                                    <label for="inputMessage">Message  <span>*</span></label>
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
        showError: false,
      };
    },

    methods: {
      submitContactForm() {

        this.checkFirstName();
        this.checkLastName();
        this.checkEmail();
        this.checkMessage();

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
      },

      checkFirstName() {
        if (this.firstName === '') {
          this.showError = true;

          setTimeout(() => {
            this.showError = false;
          }, 3000);

          return false;
        }
      },

      checkLastName() {
        if (this.lastName === '') {
          this.showError = true;

          setTimeout(() => {
            this.showError = false;
          }, 3000);

          return false;
        }
      },

      checkEmail() {
        if (this.Email === '') {
          this.showError = true;

          setTimeout(() => {
            this.showError = false;
          }, 3000);

          return false;
        }
      },

      checkMessage() {
        if (this.Message === '') {
          this.showError = true;

          setTimeout(() => {
            this.showError = false;
          }, 3000);

          return false;
        }
      }
    },

    components: {
      SeNavbar,
      SeFooter,
    }
  };
</script>