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
      width: 30rem;
      padding-bottom: .2rem;
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
                <h2  class="col-xs-12 tracking-wide">Session Speakers</h2>
                <div class="col-xs-12 col-md-8" v-for="speaker in orderedSpeakers">
                    <div class="panel panel-danger">
                        <div class="panel-heading">
                            <h3 class="panel-title">{{ speaker.name }}</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-7">
                                    <h4 class="tracking-wide" >About</h4>
                                    <div class="tracking-wide"  v-html="speaker.bio"></div>
                                    <h4 class="tracking-wide" >Session</h4>
                                    <b><div class="tracking-wide"  v-html="speaker.sessionName"></div></b>
                                    <div class="tracking-wide"  v-html="speaker.sessionInfo"></div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-5">
                                    <img class="img-responsive" :src="speaker.image" :alt="speaker.name">
                                    <p class="labels tracking-wide"><i class="fa fa-twitter"></i> <a :href="speaker.twitterLinkr">@{{speaker.twitter}}</a></p>
                                    <p class="labels tracking-wide"><span class="label label-success">{{ speaker.level }}</span> | <span class="label label-success">{{ speaker.category }}</span></p>
                                </div>
                            </div>
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