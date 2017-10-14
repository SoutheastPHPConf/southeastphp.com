<style lang='scss' scoped>
    .container  {
        padding-top: 7rem;
    }

    .cfp {
        font-size: 5rem;
    }

    .links {
        a {
            color: #000;
        }

        a:hover {
            color: #c0c0c0;
        }
    }
    .speaker-image {
        display: block;
        margin: 10px auto;
        border-radius: 6px;
    }
</style>
<template>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h2>SoutheastPHP Call For Papers</h2>
                    <hr>
                    <h4 class="cfp">Call For Papers opens: {{ countdown }}</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <p>When we open our CfP, we hope you submit! We hope to bring together a wide vary of experience, expertise and passion!</p>
                    <p>We welcome anyone who wants to submit. If you have talked at every conference known to humans, or at your local user group, or never spoken at a conference before!</p>
                    <p>Here is some ideas we would love to see submitted:</p>
                    <ul>
                        <li v-for="idea in talkIdeas">{{ idea }}</li>
                        <li>And many more!</li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <p>While you wait for our CfP to open, here are some helpful links for speakers and potential speakers!</p>
                    <ul>
                        <li v-for="link in links" class="links">
                            <a v-bind:href='link'>{{ link }}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h1 class="text-center cfp">Speakers</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6 col-md-4" v-for="speaker in speakers.data">
                   <div class="panel panel-default">
                      <div class="panel-heading">
                          <h3 class="panel-title">{{ speaker.name }}</h3>
                      </div>
                      <div class="panel-body">
                          <div class="col-xs-12">
                              <img :src="speaker.image" class="speaker-image">
                          </div>
                          <h2 class="text-center"><a :href="speaker.detail_link" target="_blank">{{ speaker.session_name}}</a></h2>
                          <p>{{ speaker.session_info}}</p>
                          <p><a :href="speaker.twitter"><i class="fa fa-twitter" v-if="speaker.twitter" area-hidden="true"></i>@{{ speaker.twitter }}</a></p>
                      </div>
                   </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
  import axios from 'axios';
  import moment from 'moment';

  export default {

    data() {
      return {
        openCfp: '',
        talkIdeas: [
          'PHP Basics',
          'Popular Frameworks',
          'Rapid Application Development',
          'Tooling',
          'Testing',
          'DevOps',
          'Contributing to the PHP Project'
        ],
        links: [
          'http://helpmeabstract.com',
          'http://speaking.io/',
          'https://medium.com/@karen_meep/how-to-start-speaking-in-tech-conferences-f64a9f3a84a6',
          'http://speaking-easy.com/',
          'https://sendgrid.com/blog/write-speaking-proposal-tech-conference/'
        ],
        speakers: [],
      };
    },

    computed: {
      countdown() {
        const now = moment();
        const cfp = moment('2018-02-01T06:00:00.000Z');
        return now.to(cfp);
      }
    },

    created() {
      this.getSpeakersList();
    },

    methods: {
      getSpeakersList() {
        axios.get('/api/speakers').then(response => {
            this.speakers = response.data;
        })
      }
    }
  }
</script>