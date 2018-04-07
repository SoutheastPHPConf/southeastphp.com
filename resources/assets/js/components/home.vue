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

    <div class="section home-intro bg-orange">
      <div class="section-inner">
        <div class="col-lg-2 col col-40">
          <img style="max-width:290px;" class="img-responsive center-block logo" src="../../../../public/img/sephp-lg.png">
        </div>
        <div class="col-lg-2 col col-40">
          <span class="small-header yellow">Southeast PHP Conference</span>
          <div class="hero-text white">
            August 16th - 17th, 2018<br/>
            Nashville, TN<br/>
            Hotel Preston<br/>
          </div>
          <a href="/tickets" class="button">Buy Tickets</a>
        </div>
      </div>
    </div>
    <div class="section home-tagline bg-red">
      <div class="section-inner">
        <h2>The Modern PHP Toolkit</h2>
        Come over to Nashville and connect with the best speakers in the PHP community sharing their knowledge and tutorials in a wide variety of topics relevant to PHP and its ecosystem.
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
