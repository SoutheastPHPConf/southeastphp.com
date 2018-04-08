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
          <img style="max-width:290px;" class="img-responsive alignright logo" src="../../../../public/img/sephp-lg.png">
        </div>
        <div class="col-lg-2 col col-50">
          <span class="small-header yellow">Southeast PHP Conference</span>
          <div class="hero-text white">
            August 16th & 17th, 2018<br/>
            Nashville, TN<br/>
            Hotel Preston<br/>
          </div>
          <a href="/tickets" class="button">Buy Tickets</a>
        </div>
      </div>
    </div>
    <div class="section home-tagline bg-red center">
      <div class="section-inner w-80">
        <h2 class="section-heading">The Modern PHP Toolkit</h2>
        <p class="feature-text center">Come over to Nashville and connect with the best speakers in the PHP community as they share knowledge and tutorials in a wide variety of topics relevant to the modern PHP ecosystem.
        </p>
      </div>
    </div>
    <div class="section home-tagline bg-yellow center">
      <div class="section-inner w-80">
         <h2 class="section-heading red">Keynote Speakers</h2>
         <div class="keynote-grid flex-grid flex-1-3-5">
           <div class="grid-item">
            <img src="../../../../public/images/keynotes/cal-evans.jpg"/><span class="image-label">Cal Evans</span>
          </div>
           <div class="grid-item">
             <img src="../../../../public/images/keynotes/josh-holmes.jpg"/><span class="image-label">Josh Holmes</span>
           </div>
           <div class="grid-item">
              <img src="../../../../public/images/keynotes/adrienne-lowe.jpg"/><span class="image-label">Adrienne Lowe</span>
            </div>
           <div class="grid-item">
              <img src="../../../../public/images/keynotes/jenna-quindica.jpg"/><span class="image-label">Jenna Quindica</span>
            </div>
           <div class="grid-item">
              <img src="../../../../public/images/keynotes/samantha-graham.jpg"/><span class="image-label">Samantha Quinones & Graham Hoefer</span>
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
