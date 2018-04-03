<style lang='scss'>
    img {
        box-shadow: 0px -1px 5px 0px rgba(0,0,0,0.75);
    }
</style>
<template>
    <div>
      <se-navbar></se-navbar>
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h1>Venue</h1>
                    <h3>Hotel Preston, Nashville TN</h3>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-6">
                            <gmap-map
                                    :center="{lat:36.1426883, lng:-86.7003575}"
                                    :zoom="15"
                                    map-type-id="roadmap"
                            ></gmap-map>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6">
                            <img class="img-thumbnail center-block img-responsive" src="https://s3.amazonaws.com/southeastphp/venue/hotel-preston.png" alt="Hotel Preston, Nashville TN">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 padding-top">
                            <p>We picked the Hotel Preston for its location in Nashville. Less then a 10 minute drive to the airport, so no one has to go to far, yet right outside of the main downtown area.
                                It has been recently remodeled and we can not wait to show you. They have a convenient shuttle that runs downtown in case you want to explore the music and sights of Nashville, and you
                                are also minutes away from one of Nashville's most history sites: The Grand Ole Opry.
                            </p>
                            <p>In order to help our attendees out, we have got a nice little deal with the hotel to get a discount on a room! The best part about this code is that it does not expire. Use it today, tomorrow or the day before the conference (rooms permitting of course).</p>
                            <p>To book, <a href="https://tinyurl.com/SEPHPPreston"><button class="btn button-red">click here!</button></a></p>
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
  import SeNavbar from './navbar.vue';
  import SeFooter from './footer.vue';

  export default {
    mounted() {

    },

    components: {
      SeNavbar,
      SeFooter,
    }
  };
</script>