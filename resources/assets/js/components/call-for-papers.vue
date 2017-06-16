<style lang='scss'>
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
        ]
      };
    },

    computed: {
      countdown() {
        const now = moment();
        const cfp = moment('02-01-2018');
        return now.to(cfp);
      }
    }
  }
</script>