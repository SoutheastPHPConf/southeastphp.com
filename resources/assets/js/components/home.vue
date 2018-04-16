<style lang='scss' scoped>
  .container {
    padding-top: 7rem;
  }

  a {
    color: #fff;
    text-decoration: none;
    &:hover {
      color: #fff;
      text-decoration: none;
    }
  }

  .img-circle {
    background-color: #FFE8BE;
  }

  .panel {
    min-height: 51rem;
    max-height: 51rem;
    box-shadow: 0 0 5px 0 rgba(0,0,0,0.75);
  }

  .bottom-coc {
    padding-bottom: 1rem;
  }

  .logo {
    box-shadow: 0px -1px 5px 0px rgba(0,0,0,0.75);
  }

  .well {
    img {
      min-width: 30rem;
      max-width: 30rem;
    }
  }

  .pitch {
    width: 100%;
    padding-left: 6rem;
  }
</style>

<template>
  <div>
    <se-nav :user="user"></se-nav>

    <div class="container">
      <div class="row">
        <div class="col-xs-12 info">
          <div class="row">
            <div class="col-lg-6">
              <img class="img-responsive center-block logo" src="../../../../public/img/sephp-lg.png">
            </div>
            <div class="col-lg-6">
              <h3 class="text-center tracking-wide font-serif text-grey-light">Nashville, TN</h3>
              <h2 class="text-center dates tracking-wide font-serif">August 16th - 17th, 2018</h2>
              <button class="btn btn-lg btn-red center-block w-80"><a class="font-white font-sans font-2xl tracking-wide" href="/tickets">Buy Tickets</a></button>
              <p class="font-serif tracking-wide font-3xl padding-top-2 pitch">Music City invites you to spend a few days talking code, networking and making new friends with us!</p>
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
  import auth from '../auth.js';
  import SeNav from './navbar.vue';
  import SeFooter from './footer.vue';

  export default {

    data() {
      return {
        email: '',
        flashSuccessBanner: false,
        flashErrorBanner: false,
        sponsors: [],
        auth: auth,
        user: auth.user || null,
      };
    },

    created() {
      auth.check();
      this.getSponsors();
    },

    methods: {
      addEmailToList() {
        axios.post('api/email', {email: this.email}).then((response) => {
          if (response.status === 200) {
            this.flashSuccessBanner = true;
            this.email = '';

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

      getSponsors() {
        axios.get('api/sponsors/top').then(response => {
          this.sponsors = response.data;
        }).catch(error => {
          console.error(error);
        })
      }
    },

    components: {
      SeNav,
      SeFooter,
    },
  };
</script>
