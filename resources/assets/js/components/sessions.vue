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

    img {
        height: 30rem;
        width: 35rem;
        padding-bottom: .2rem;
    }
</style>
<template>
    <div>
        <se-navbar></se-navbar>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-8">
                    <h2  class="tracking-wide">Sessions</h2>
                    <div v-for="speaker in orderedSpeakers">
                        <div class="panel panel-danger">
                            <div class="panel-heading">
                                <h3 class="panel-title">{{ speaker.sessionName }}</h3>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-8">
                                        <div class="tracking-wide" v-html="speaker.sessionInfo"></div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-4">
                                        <p class="tracking-wide">{{ speaker.name }}</p>
                                        <p class="labels"><i class="fa fa-twitter"></i> <a :href="speaker.twitterLinkr">@{{speaker.twitter}}</a></p>
                                        <p class="labels"><span class="label label-success">{{ speaker.level }}</span> | <span class="label label-success">{{ speaker.category }}</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <h2>Sponsors</h2>
                    <div class="panel panel-default" v-for="sponsor in shuffledSponsors">
                        <div class="panel-body">
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