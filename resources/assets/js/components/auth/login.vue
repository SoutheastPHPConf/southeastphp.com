<style lang='scss' scoped>
    .container {
        padding-top: 7rem;
    }

    .panel {
        box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.75);
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
        <se-nav :user="user"></se-nav>
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
                                    <label><input type="checkbox" v-model="rememberMe"> Remember me</label>
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
                    <a href="#" @click.prevent="showFacebookLogin = false"><button class="btn btn-danger">Cancel</button></a>
                    <a :href="link"><button class="facebook btn">Connect With Facebook</button></a>
                </div>
            </modal>

            <modal v-if="showGithubLogin">
                <h3 slot="header">Login to Github</h3>
                <p slot="body">In order to connect with Github, we need your permission to connect! You know the drill.</p>
                <div slot="footer">
                    <a href="#" @click.prevent="showGithubLogin = false"><button class="btn btn-danger">Cancel</button></a>
                    <a :href="link"><button class="facebook btn">Connect With Github</button></a>
                </div>
            </modal>

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
        email: '',
        password: '',
        rememberMe: false,
        link: '',
        showFacebookLogin: false,
        showGithubLogin: false,
        auth: auth,
        user: auth.user,
      };
    },

    created() {
      return auth.check();
    },

    methods: {
      submitLoginForm() {
        axios.post('/api/auth/login', {email: this.email, password: this.password, rememberMe: this.rememberMe}).then(response => {
            console.log('hello world');
        }).catch(error => {
          console.error(error);
        });
      },

      facebookLogin() {
        axios.get('/api/login/facebook').then(response => {
          this.link = response.data.data.link;
          this.showFacebookLogin = true;
          console.log(response);
          localStorage.setItem('id_token', response.data.token);
          window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('id_token');

          this.user.authenticated = true;
          this.user.profile = response.data.user;
          this.user.posts = response.data.posts;
        }).catch(error => {
          console.error(error);
        })
      },

      twitterLogin() {

      },

      githubLogin() {
        axios.get('/api/login/github').then(response => {
          this.link = response.data.data.link;
          this.showGithubLogin = true;
        }).catch(error => {
          console.error(error);
        })
      },

      googleLogin() {

      },
    },

    components: {
      modal,
      SeNav,
      SeFooter,
    }
  };
</script>