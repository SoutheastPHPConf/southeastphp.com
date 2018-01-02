<style lang='scss' scoped>
  .container {
    padding-top: 7rem;
  }

  a {
    color: #fff;
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
    box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.75);
  }

  .bottom-coc {
    padding-bottom: 1rem;
  }
  
  .logo {
    box-shadow: 0px -1px 5px 0px rgba(0,0,0,0.75);
  }
</style>

<template>
  <div>
    <se-nav :user="user"></se-nav>

    <div class="container">

      <div class="col-xs-12 info">
        <img class="img-responsive center-block logo" src="../../../../public/img/sephp-lg.png">
        <h2 class="text-center">Nashville, TN</h2>
        <h3 class="text-center"><small>August, 2018</small></h3>
        <hr>
        <h4 class="text-center">The Modern PHP Toolkit</h4>
        <p class="text-center">Southeast PHP was formed by the organizers of the Nashville PHP Meetup who wanted to provide a conference for PHP developers in the South Eastern United States and abroad. Currently, the Southeast does not host a regional PHP conference, even though there are lots of PHP developers. Southeast PHP was born to serve this community and to help connect it with the worldwide PHP community by giving regional developers a chance to connect with each other and the broader PHP community.</p>
        <p class="text-center">We plan on bringing the best speakers in the PHP Community and a few from the JS/Python community to give talks and tutorials in a wide variety of topics relevant to PHP and its ecosystem.</p>
        <p class="text-center">While you are here in Nashville, we hope you will take in the sights of our loved city. We have compiled a list, and are still adding more to it, of things to check out in Nashville while you visit!</p>
        <p class="text-center">To read more about the organizers, check out the <a href="/about/organizers">Organizers</a> page!</p>
        <hr>
        <div class="row" v-if="today === '02-01-2017'">
          <div class="col-xs-12">
            <h2>Our Call for Papers is open!</h2>
            <p>We welcome everyone to submit! From first time speakers to those speakers at every conference known to us, we want them all!</p>
            <p>If you have never spoke before, please consider checking out <a href="http://helpmeabstract.org">HelpMeAbstract</a> to get feedback on making your proposal as strong as possible.</p>
            <p>When you are ready to submit, head over to our CfP and submit as many talks as you want!</p>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-12">
            <h3 class="text-center">Sponsors</h3>
            <p class="text-center">We would love to talk to you about becoming a sponsor! We have sponsorship levels that fit every budget and we can even take some time to come up with the perfect sponsorship opportunity.</p>
            <p class="text-center">If you are interested in sponsoring Southeast PHP, you can download our sponsor prospectus <a download href="/docs/southeastphp-sponsor-prospectus.pdf">here</a></p>
            <p class="text-center">To see who is sponsoring Southeast PHP, head over to our <a href="/sponsors">Sponsors</a> page!</p>
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
                  <li>Closeness to airport</li>
                  <li>Low prices</li>
                  <li>Close to downtown</li>
                </ul>
                <p>We hope that you will use the venue as a place to learn, grow and meet new people, and we hope that you can use the venue as a spring board to downtown and check out Nashville!</p>
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
                <p><b>We take inclusion, safety, and diversity seriously.</b><br><br> We set up a Code of Conduct to make sure that every attendee feels safe and welcome at Southeast PHP Conference. </p>
                <p class="bottom-coc">Before buying a ticket to Southeast PHP, we ask that you take a look and understand our Code of Conduct. While it is not different from any other conference, we do want everyone to be made aware of it.</p>
                <a href="/code-of-conduct"><button class="btn btn-success">Code of Conduct</button></a>
              </div>
            </div>
          </div>
          <div class="col-sm-12 col-md-4">
            <div class="panel panel-default">
              <div class="panel-body">
                <p class="text-center"><i class="fa fa-music fa-2x" aria-hidden="true"></i></p>
                <hr>
                <h4 class="text-center">Nashville</h4>
                <p>As the organizers of NashvillePHP, we felt it was right for us to put on a community conference here in our city. The last time a conference was here in 2002, the landscape for PHP was completely different.</p>
                <p>We hope to follow in the footsteps of some of our favorite conferences and not just give you a great conference, but also a fun time in our city. We have even started a list of things to do while you are here!</p>
                <p>Something, something hot chicken.</p>
                <a href="/nashville"><button class="btn btn-success">Nashville</button></a>
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
            <p>Our Call For Papers will start in February.</p>
            <p>Till then, check out our <a href="#">Talk Submission</a> page for talk submission tips to help make your proposal stronger.</p>
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
  import moment from 'moment';
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

    computed: {
      today() {
        return moment().format('MM-DD-YYYY');
      },
    },

    created() {
      return auth.check();
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
