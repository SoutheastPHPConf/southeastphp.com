<template>
    <div>
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="/" class="navbar-brand">SoutheastPHP</a>
                </div>
                <!-- Collection of nav links and other content for toggling -->
                <div id="navbarCollapse" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="/nashville">Nashville</a></li>
                        <li><a href="/sponsors">Sponsors</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="https://twitter.com/southeastphp"><i class="fa fa-twitter"></i> @southeastphp</a></li>
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
      };
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