<style lang='scss'>
  img.bg {
    /* Set rules to fill background */
    min-height: 100%;
    min-width: 1024px;

    /* Set up proportionate scaling */
    width: 100%;
    height: auto;

    /* Set up positioning */
    position: fixed;
    top: 0;
    left: 0;
  }

  .info {
    margin-top: 24rem;
    color: #fff;
  }

  a {
    color: #fff;
    &:hover {
      color: #fff;
      text-decoration: none;
    }
  }
</style>

<template>
  <div>
    <div class="background--image">
      <img class="bg" src="img/nashville.jpg">
    </div>


    <div class="col-xs-12 info">
      <div class="alert alert-success" role="alert" v-if="flashSuccessBanner">
        <p class="text-center">Thanks for submitting your email! We will send out periodic emails to keep you up to date with our progress!</p>
      </div>

      <div class="alert alert-danger" role="alert" v-if="flashErrorBanner">
        <p class="text-center">We had trouble saving your email, please try again soon!</p>
      </div>

      <h1 class="text-center">Southeast PHP</h1>
      <h3 class="text-center">Welcome to Nashville!</h3>
      <p class="text-center">A community conference taking place in the heart of Music City! Coming in August 2018.</p>
      <p class="text-center">Join our email list for more information</p>
      <form class="form-horizontal" method="post" action="" @submit.prevent="addEmailToList">
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label"></label>
          <div class="col-sm-8">
            <input type="email" class="form-control" id="inputEmail3" placeholder="Email" v-model="email">
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-12">
            <button type="submit" class="btn btn-primary center-block btn-lg">Submit</button>
          </div>
        </div>
      </form>
      <p class="text-center">Follow us <a href="https://twitter.com/southeastphp"><i class="fa fa-twitter"></i> @southeastphp</a> for more details</p>
    </div>
  </div>
</template>
<script>
  import axios from 'axios';
  import moment from 'moment';

  export default {

    data() {
      return {
        email: '',
        flashSuccessBanner: false,
        flashErrorBanner: false,
      };
    },

    methods: {
      addEmailToList() {
        axios.post('api/email', {email: this.email}).then((response) => {
          if (response.status === 200) {
            this.flashSuccessBanner = true;

            setTimeout(() =>  {
              this.flashSuccessBanner = false;
            }, 5000);
          }
        }).catch((error) => {
          this.flashErrorBanner = true;

          setTimeout(() => {
            this.flashErrorBanner = false;
          }, 5000);
        });
      },
    },
  };
</script>