<style lang='scss' scoped>
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
                            <div id='map' style='width: 500px; height: 380px;'></div>
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
                            <p>Some of the things you can do while at the Hotel Preston:</p>
                            <ul>
                                <li>24 hour gym</li>
                                <li>Listen to live music in their lounge</li>
                                <li>Be 20 minutes away from downtown and 10 minutes away from the airport</li>
                            </ul>
                            <p>In order to help our attendees out, we have got a nice little deal with the hotel to get a discount on a room! The best part about this code is that it does not expire. Use it today, tomorrow or the day before the conference (rooms permitting of course).</p>
                            <p>To book, <a href="https://tinyurl.com/SEPHPPreston"><button class="btn button-red">click here!</button></a> and use the code SOUTHEAST. This is good till the day of the conference, so take advantage of it!</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 padding-top">
                            <h3>Nashville, Tennessee</h3>
                            <p>There is just so much to do in Nashville. From history to nature to music, you can throw a rock and hit something interesting to do!</p>

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
      mapboxgl.accessToken = 'pk.eyJ1IjoibWF0dGhld3RyYXNrIiwiYSI6ImNqZ3V4MzBzNzBzamgycW1yaDV1amszYXMifQ.cP-afVK46dTSY_7S4wGmSA';
      var map = new mapboxgl.Map({
        container: "map",
        style: "mapbox://styles/mapbox/streets-v10",
        zoom:11.0,
        center: [-86.73713,36.15255]
      });

      map.on("load", function () {
          /* Image: An image is loaded and added to the map. */
        map.loadImage("https://i.imgur.com/MK4NUzI.png", function(error, image) {
          if (error) throw error;
          map.addImage("custom-marker", image);
            /* Style layer: A style layer ties together the source and image and specifies how they are displayed on the map. */
          map.addLayer({
            id: "markers",
            type: "symbol",
              /* Source: A data source specifies the geographic coordinate where the image marker gets placed. */
            source: {
              type: "geojson",
              data: {
                type: "FeatureCollection",
                features:[{"type":"Feature","geometry":{"type":"Point","coordinates":[-86.7011997734279,36.14201751917369]}}]}
            },
            layout: {
              "icon-image": "custom-marker",
            }
          });
        });
      });
    },

    components: {
      SeNavbar,
      SeFooter,
    }
};
</script>