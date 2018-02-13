<style lang='scss' scoped>
  .container {
    padding-top: 7rem;
  }

  a {
    text-decoration: none;
    &:hover {
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
</style>

<template>
  <div>
    <se-nav :user="user"></se-nav>

    <div class="container">

      <div class="col-xs-12 info">
        <img class="img-responsive center-block logo" src="../../../../public/img/sephp-lg.png">
        <h3 class="text-center">Nashville, TN</h3>
        <h2 class="text-center dates">August, 16th - 17th, 2018</h2>
        <hr>
        <h4 class="text-center">The Modern PHP Toolkit</h4>
        <p class="text-center">The Southeast PHP Conference was formed by the organizers of the Nashville PHP Meetup who wanted to provide a conference for PHP developers in the Southeastern United States and abroad. Currently, the Southeast does not host a regional PHP conference, even though there are lots of PHP developers. The Southeast PHP Conference was born to serve this community and to help connect it with the worldwide PHP community by giving regional developers a chance to connect with each other and the broader PHP community.</p>
        <p class="text-center">We plan on bringing the best speakers in the PHP Community and a few from the JS/Python community to give talks and tutorials in a wide variety of topics relevant to PHP and its ecosystem.</p>
        <p class="text-center">While you are here in Nashville, we hope you will take in the sights of our beloved city. We have compiled a list of things to check out in Nashville while you visit (and are still adding more)!</p>
        <p class="text-center">To read more about the organizers, check out the <a href="/about/">Organizers</a> page!</p>

        <div class="row">
          <div class="col-xs-12">
            <h3 class="text-center">Call For Papers!</h3>
            <div class="row">
              <p class="text-center">Our CfP is now open! We want everyone who has ever thought of speaking at a conference to submit a talk or three!</p>
              <p class="text-center">You can submit talks to our CfP site <a href="https://cfp.southeastphp.com">here!</a></p>
              <p class="text-center">If you need help forming your abstract, check out <a href="http://helpmeabstract.com">Help Me Abstract</a>.</p>
              <h4 class="text-center">Our CfP closes on April 15th, 2018!</h4>
            </div>
        </div>

        <hr>
        <div class="row">
          <div class="col-xs-12">
            <h3 class="text-center">Sponsors</h3>
            <div class="row">
              <div v-for="sponsor in sponsors.data" class="col-xs-12 col-md-4">
                <div class="well">
                  <h3 class="text-center">{{ sponsor.sponsorName }}</h3>
                  <img class="img-responsive center-block" :src="sponsor.sponsorImage" alt="Sponsor Logo">
                </div>
              </div>
            </div>

            <p class="text-center">We would love to talk to you about becoming a sponsor! We have sponsorship levels that fit every budget and we can work with you to come up with the perfect sponsorship opportunity.</p>
            <p class="text-center">If you are interested in sponsoring Southeast PHP, you can download our sponsor prospectus <a download href="/docs/southeastphp-sponsor-prospectus.pdf">here</a></p>
            <p class="text-center">To see who is sponsoring the Southeast PHP Conference, head over to our <a href="/sponsors">Sponsors</a> page!</p>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-sm-12 col-md-4">
            <div class="panel panel-default">
              <div class="panel-body">
                <p class="text-center"><i class="fa fa-building fa-2x" aria-hidden="true"></i></p>
                <hr>

                <h4 class="text-center">Venue</h4>
                <p>We have picked the wonderful Hotel Preston as our venue this year. We picked it for a few reasons:</p>
                <ul>
                  <li>Close to the airport</li>
                  <li>Low prices</li>
                  <li>Close to downtown</li>
                </ul>
                <p>We hope that you will use the venue as a place to learn, grow, and meet new people, and we hope that you can use the venue as a springboard to downtown and check out Nashville!</p>
                <br>
                <a href="https://hotelpreston.com"><button class="btn btn-success">The Venue</button></a>
              </div>
            </div>
          </div>
          <div class="col-sm-12 col-md-4">
            <div class="panel panel-default">
              <div class="panel-body">
                <p class="text-center"><i class="fa fa-heart fa-2x" aria-hidden="true"></i></p>
                <hr>

                <h4 class="text-center">Code of Conduct</h4>
                <p><b>We take inclusion, safety, and diversity seriously.</b><br><br> We set up a Code of Conduct to make sure that every attendee feels safe and welcome at the Southeast PHP Conference. </p>
                <p class="bottom-coc">Before buying a ticket to the conference, we ask that you take a look and understand our Code of Conduct. While it is not different from any other conference, we do want everyone to be made aware of it.</p>
                <a href="/code-of-conduct"><button class="btn btn-success">Code of Conduct</button></a>
              </div>
            </div>
          </div>
          <div class="col-sm-12 col-md-4">
            <div class="panel panel-default">
              <div class="panel-body">
                <p class="text-center"><i class="fa fa-users fa-2x" aria-hidden="true"></i></p>
                <hr>
                <h4 class="text-center">Diversity</h4>
                <p>As the organizers of NashvillePHP, we want to make sure we make sure everyone has a chance to attend our conference, whether you live in Nashville or some place further away.</p>
                <p>We have set up a way for companies to reach out and work with us to provide tickets to those in under-represented groups working with PHP and JS. If your company, or you as an individual, want to sponsor some tickets, please let us know!</p>
                <a href="/diversity"><button class="btn btn-success">Diversity</button></a>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-12">
            <h2 class="text-center"></h2>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-8">
            <h3 class="text-center">Get our email updates!</h3>
            <div class="alert alert-success" v-if="flashSuccessBanner === true">
              <p>Your email was saved! Thanks!</p>
            </div>
            <form>
              <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email" placeholder="Email" v-model="email">
              </div>
              <button type="submit" class="btn btn-default" @click.submit="addEmailToList">Submit</button>
            </form>

            <h2>Call For Papers <i class="fa fa-bullhorn fa-2x" aria-hidden="true"></i> </h2>
            <p>Our Call For Papers is Open!</p>
            <p>You can submit papers at <a href="https://cfp.southeastphp.com">our CfP site</a> till April 15th, 2018!</p>
            <!--<p>Check out our <a href="#">Talk Submission</a> page for talk submission tips to help make your proposal stronger.</p>-->
          </div>
          <div class="col-xs-12 col-sm-12 col-md-4">
            <a class="twitter-timeline" data-width="400" data-height="500" href="https://twitter.com/SoutheastPHP?ref_src=twsrc%5Etfw">Tweets by SoutheastPHP</a>
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
