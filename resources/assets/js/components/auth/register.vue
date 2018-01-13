<style lang='scss'>
    .error {
        color: #ff0000;
    }

    .fa-check {
        color: #008000;
    }
</style>
<template>
    <div>
        <se-nav :user="user"></se-nav>
        <div class="container">
            <div class="row">
                <div class="col-xs-6 col-xs-offset-3">
                    <div class="alert alert-danger" role="alert" v-if="showErrorBanner === true">
                        <p class="text-center">Your passwords did not match. Please try again.</p>
                    </div>
                    <div class="alert alert-danger" role="alert" v-if="showTermsError === true">
                        <p class="text-center">Please agree to our Terms of Service.</p>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <h2 class="text-center">Southeast PHP Register</h2>
                            <form method="post" @submit.prevent="submitLoginForm">
                                <div class="form-group">
                                    <label for="inputEmail"><i v-if="this.showSuccess === true" class="fa fa-check"></i> Email</label>
                                    <input type="text" class="form-control" id="inputEmail" placeholder="Email" v-model="username">
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword"><i v-if="this.showSuccess === true" class="fa fa-check"></i> Password</label>
                                    <input type="password" class="form-control" id="inputPassword" placeholder="Password" v-model="password">
                                </div>
                                <div class="form-group">
                                    <label for="inputConfirmPassword"><i v-if="this.showSuccess === true" class="fa fa-check"></i> Confirm Password</label>
                                    <input type="password" class="form-control" id="inputConfirmPassword" placeholder="Confirm Password" v-model="confirmPassword">
                                </div>
                                <div class="checkbox">
                                    <label><input v-bind:class="{ error: showTermsError }" type="checkbox" v-model="termsOfService"> You agree to our <a href="/terms-of-service">terms of service</a>.</label>
                                </div>
                                <button type="submit" class="btn btn-success btn-lg">Login</button>
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
  import auth from '../../auth.js';
  import modal from '../modal.vue';
  import SeNav from '../navbar.vue';
  import SeFooter from '../footer.vue';

  export default {
    data() {
      return {
        username: '',
        password: '',
        confirmPassword: '',
        termsOfService: false,
        link: '',
        auth: auth,
        user: auth.user,
        showErrorBanner: false,
        showTermsError: false,
        showSuccess: false,
      };
    },

    created() {
      return auth.check();
    },

    methods: {
      submitLoginForm() {
        if (this.password !== this.confirmPassword || this.password === '') {
          this.showPasswordError();
        }

        if (!this.termsOfService) {
          this.showTermsError = true;

          setTimeout(() => {
            this.showTermsError = false;
          }, 5000);
        }

        if (this.password === this.confirmPassword && this.termsOfService) {
          this.showSuccess = true;

          setTimeout(() => {
            this.showSuccess = false;
            auth.register(this, this.username, this.password, this.rememberMe);
          }, 5000);
        }
      },

      showPasswordError() {
        this.showErrorBanner = true;
        this.password = '';
        this.confirmPassword = '';

        setTimeout(() => {
          this.showErrorBanner = false;
        }, 5000);
      },
    },

    components: {
      modal,
      SeNav,
      SeFooter,
    }
  };
</script>