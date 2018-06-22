<style lang='scss' scoped>
  .container { padding-top: 7rem; }

  .panel-danger {
      border-color: #BF2127;
  }

    .panel-heading {
        color: #fff;
        background-color: #BF2127;
        border-color: #ebccd1;
    }

    .speakers {
        img {
            height: 20rem;
            width: 20rem;
            padding-bottom: .2rem;
        }
    }

    .sponsors {
        img {
            height: 15rem;
            width: 35rem;
            padding-bottom: .2rem;
        }
    }


    .labels {
        font-size: 1.7rem;
    }

</style>
<template>
    <div>
        <se-navbar></se-navbar>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-10">
                    <h2 class="tracking-wide">Session Speakers</h2>
                    <p>We aimed to pick the very best talk submitted. Our team had a lot of tough work laid out in front of us and we think we came up with the best talks out of more then 250 submitted talks!</p>
                    <div v-for="speaker in orderedSpeakers">
                        <div class="panel panel-danger" id="speaker.id">
                            <div class="panel-heading">
                                <h3 class="panel-title">{{ speaker.name }}</h3>
                            </div>
                            <div class="panel-body speakers">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-9">
                                        <h4 class="tracking-wide" >About</h4>
                                        <div class="tracking-wide"  v-html="speaker.bio"></div>
                                        <h4 class="tracking-wide" >Session</h4>
                                        <p>Session: <a :href="speaker.links.sessionLink">{{ speaker.sessionName }}</a></p>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-3">
                                        <img class="img-responsive" :src="speaker.image" :alt="speaker.name">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <h2>Sponsors</h2>
                    <p>We counldn't do this conference without these amazing companies!</p>
                    <div class="panel panel-default" v-for="sponsor in shuffledSponsors">
                        <div class="panel-body sponsors">
                            <a :href="sponsor.website"><img class="img-responsive img-thumbnail" :src="sponsor.image" :alt="sponsor.name"></a>
                            <p class="tracking-wide text-center font-2xl sponsors">{{ sponsor.name }}</p>
                            <p class="tracking-wide text-center font-2xl sponsors">{{ sponsor.sponsorLevel }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <se-footer></se-footer>
    </div>
</template>
<script>
  import { orderBy, shuffle } from 'lodash';
  import axios from 'axios';
  import moment from 'moment';
  import SeNavbar from './navbar.vue';
  import SeFooter from './footer.vue';

  export default {
    created() {
      this.getSpeakers();
      this.getSponsors();
    },

    computed: {
      orderedSpeakers() {
        return orderBy(this.speakers, 'name');
      },

      shuffledSponsors() {
        return shuffle(this.sponsors);
      }
    },

    data() {
      return {
        speakers: [],
        sponsors: [],
      };
    },

    methods: {
      getSpeakers() {
        axios.get('/api/speakers').then(response => {
          this.speakers = response.data.data;
        }).catch(error => {
          console.log(error);
        });
      },

      getSponsors() {
        axios.get('api/sponsors').then(response => {
          this.sponsors = response.data.data;
        }).catch(error => {
          console.error(error);
        })
      },
    },

    components: {
      SeNavbar,
      SeFooter
    }
  }
</script>