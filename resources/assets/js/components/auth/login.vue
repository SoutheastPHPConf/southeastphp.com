<style lang='scss' scoped>
    input[type="text"],
    input[type="email"],
    input[type="password"],
    select.form-control {
        background: transparent;
        border: none;
        border-bottom: 1px solid #000000;
        -webkit-box-shadow: none;
        box-shadow: none;
        border-radius: 0;
    }

    input[type="text"]:focus,
    input[type="email"]:focus,
    input[type="password"]:focus,
    select.form-control:focus {
        -webkit-box-shadow: none;
        box-shadow: none;
        border-bottom: 1px solid #BF2127;

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
        email: '',
        password: '',
        rememberMe: false,
        link: '',
        auth: auth,
        user: auth.user,
      };
    },

    created() {
      return auth.check();
    },

    methods: {
      submitLoginForm() {
        auth.signin(this, this.email, this.password, this.rememberMe);
      },
    },

    components: {
      modal,
      SeNav,
      SeFooter,
    }
  };
</script>