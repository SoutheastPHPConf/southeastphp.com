<style lang='scss' scoped>
    .container {
        padding-top: 7rem;
    }

    .facebook {
        color: #fff;
        background-color: #3b5998;
        margin-left: 1.5rem;
    }

    .github {
        color: #fff;
        background-color: #4078c0;
    }

    .twitter {
        color: #fff;
        background-color: #00aced;
    }
</style>
<template>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-xs-6 col-xs-offset-3">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <h2 class="text-center">Southeast PHP Login</h2>
                            <form method="post" @submit.prevent="submitLoginForm">
                                <div class="form-group">
                                    <label for="inputEmail">Email</label>
                                    <input type="email" class="form-control" id="inputEmail" placeholder="Email" v-model="email">
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword">Password</label>
                                    <input type="password" class="form-control" id="inputPassword" placeholder="Password" v-model="password">
                                </div>
                                <div class="checkbox">
                                    <label><input type="checkbox"> Remember me</label>
                                </div>
                                <button type="submit" class="btn btn-success btn-lg">Login</button>
                            </form>
                            <br>
                            <button type="button" @click.prevent="facebookLogin" class="facebook btn"><i class="fa fa-facebook"></i> Login With Facebook</button>
                            <button type="button" @click.prevent="twitterLogin" class="twitter btn"><i class="fa fa-twitter"></i> Login With Twitter</button>
                            <button type="button" @click.prevent="githubLogin" class="github btn"><i class="fa fa-github"></i> Login With Github</button>
                        </div>
                    </div>
                </div>
            </div>

            <modal v-if="showFacebookLogin">
                <h3 slot="header">Login to Facebook</h3>
                <p slot="body">In order to connect with Facebook, we need your permission to connect! You know the drill.</p>
                <div slot="footer">
                    <a :href="link"><button class="facebook btn">Connect With Facebook</button></a>
                </div>
            </modal>

        </div>
    </div>
</template>
<script>
  import axios from 'axios';
  import modal from '../modal.vue';

  export default {
    data() {
      return {
        email: '',
        password: '',
        link: '',
        showFacebookLogin: false,
      };
    },

    methods: {
      submitLoginForm() {
        axios.post('/api/auth/login', {email: this.email, password: this.password}).then(response => {
            console.log('hello world');
        }).catch(error => {
          console.error(error);
        });
      },

      facebookLogin() {
        axios.get('/api/login/facebook').then(response => {
            this.link = response.data.data.link;
            this.showFacebookLogin = true;
        }).catch(error => {
          console.error(error);
        })
      },

      twitterLogin() {

      },

      githubLogin() {

      },
    },

    components: {
      modal,
    }
  };
</script>