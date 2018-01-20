<style lang="scss" scoped>
    a:hover {
      color: #BF2127;
      border-bottom: 2px solid #BF2127;
    }
</style>
<template>
    <div>
        <nav class="navbar navbar-default">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="/" class="navbar-brand">Southeast PHP Conference</a>
                </div>
                <!-- Collection of nav links and other content for toggling -->
                <div id="navbarCollapse" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav text-center">
                        <li><a href="/about">About</a></li>
                        <li><a href="/venue">Venue</a></li>
                        <li v-if="sponsors.data.length > 0"><a href="/sponsors">Sponsors</a></li>
                        <li v-if="sessions.length > 0"><a href="/sessions">Sessions</a></li>
                        <li><a href="/code-of-conduct">Code of Conduct</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="hidden-sm hidden-xs"><a href="https://twitter.com/southeastphp"><i class="fa fa-twitter"></i> @southeastphp</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</template>
<script>
  import axios from 'axios';

  export default {
    data() {
      return {
        schedule: false,
        speakers: false,
        venue: false,
        sponsors: [],
        sessions: [],
      };
    },

    props: [
      'user',
    ],

    created() {
      this.getSponsors();
    },

    methods: {
      getSchedule() {

      },

      getSpeakers() {

      },

      getVenue() {

      },

      getSponsors() {
        axios.get('api/sponsors').then(response => {
          this.sponsors = response.data;
        }).catch(error => {
          console.error(error);
        })
      },
    },
  };
</script>