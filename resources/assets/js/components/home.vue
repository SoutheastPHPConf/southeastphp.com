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

  .bottom-coc {
      padding-bottom: 1rem;
  }

  .pitch {
    width: 100%;
    padding-left: 6rem;
  }

  .sponsor {
    min-height: 15rem;
    max-height: 15rem;
  }

  img.speaker, img.sponsor {
    box-shadow: 0px -1px 5px 0px rgba(0,0,0,0.75);
  }

  .hero { margin-left: 12%; }
</style>

<template>
  <div>
    <se-nav :user="user"></se-nav>

    <div class="section home-intro bg-orange">
      <div class="section-inner w-80 hero">
        <div class="col-lg-2 col col-40">
          <img style="max-width:290px;" class="logo" src="../../../../public/img/sephp-lg.png">
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
          <div class="grid-item" v-for="speaker in shuffledKeynotes">
            <img class="speaker" :src="speaker.image"/><span class="image-label"><div v-html="speaker.name"></div></span>
          </div>
        </div>
      </div>
    </div>
    <div class="section home-tagline bg-red center">
      <div class="section-inner w-80">
        <h2 class="section-heading white">Session Speakers</h2>
        <div class="keynote-grid flex-grid flex-1-3-5">
          <div class="grid-item" v-for="speaker in limitedSpeakers">
            <img class="speaker" :src="speaker.image"/><span class="image-label"><div class="white" v-html="speaker.name"></div></span>
          </div>
        </div>
      </div>
    </div>
    <div class="section home-tagline bg-orange center">
      <div class="section-inner w-80">
        <h2 class="section-heading white">Sponsors</h2>
        <div class="keynote-grid flex-grid flex-1-3-5">
          <div class="grid-item" v-for="sponsor in shuffledSponsors">
            <img class="sponsor img-thumbnail" :src="sponsor.image"/><span class="image-label"><div v-html="sponsor.name"></div></span>
          </div>
        </div>
      </div>
    </div>
    <div class="section home-intro bg-yellow center">
      <div class="section-inner w-80">
        <h2 class="section-heading red">The Venue</h2>
        <div class="keynote-grid flex-grid flex-1-3-5">
          <div class="col-lg-2 col col-40">
            <h2 class="section-heading center">Hotel Preston</h2>
            <p class="feature-text center">Minutes from the airport and downtown Nashville, Hotel Preston is the go-to spot for Nashville business and events. We’ve got lots of extras to make you feel like a star: Provenance Signature Amenities, an art collection, complimentary airport shuttle and free Wi-Fi. Grab a bite at Café Isabella, or check out live entertainment at Pink Slip. We’ll even send up boardgames to make your stay truly memorable.</p>
          </div>
          <div class="col-lg-2 col col-50">
            <img src="https://s3.amazonaws.com/southeastphp/venue/hotel-preston.png" alt="Hotel Preston">
          </div>
        </div>
      </div>v
    </div>
    <se-footer></se-footer>
  </div>
</template>
<script>
  import { shuffle, sampleSize } from 'lodash';
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
        keynotes: [],
        speakers: [],
        auth: auth,
        user: auth.user || null,
      };
    },

    created() {
      auth.check();
      this.getSponsors();
      this.getKeynotes();
      this.getSpeakers();
    },

    computed: {
      shuffledKeynotes() {
        return shuffle(this.keynotes);
      },

      shuffledSponsors() {
        return shuffle(this.sponsors);
      },

      limitedSpeakers() {
        return sampleSize(this.speakers, 6);
      }
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

      getKeynotes() {
        axios.get('/api/keynotes').then(response => {
          this.keynotes = response.data.data;
        }).catch(error => {
          console.log('error: ' + error);
        })
      },

      getSpeakers() {
        axios.get('/api/speakers').then(response => {
          this.speakers = response.data.data;
        }).catch(error => {
          console.log('error: ' + error);
        });
      },

      getSponsors() {
        axios.get('api/sponsors').then(response => {
          this.sponsors = response.data.data;
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
