<style lang='scss' scoped>

    .ramsey {
        height: 10rem;
    }

    a.twitter {
        color: #00aced;
    }

    li {
        list-style-type: none;
    }

    .fa-github {
        color: #000;
    }
</style>
<template>
    <div>
        <se-nav></se-nav>
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h3 class="">About Southeast PHP Conference</h3>
                    <h2>{{ tagline }}</h2>
                    <hr>
                </div>
                <div class="col-xs-12">
                    <h3>The organizers</h3>
                </div>
                <div class="col-xs-12 col-md-4" v-for="organizer in organizers.data">
                    <div class="row">
                        <div class="col-xs-12 col-md-4">
                            <img :src="organizer.image" class="img-responsive img-rounded ramsey">
                        </div>
                        <div class="col-xs-12 col-md-8">
                            <h3>{{ organizer.name }}</h3>
                            <a class="twitter" :href="organizer.twitterLink"><i class="fa fa-twitter"></i> @{{ organizer.twitter }}</a>
                            <p><i class="fa fa-envelope"> {{ organizer.email }}</i></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-md-12">
                            <p v-html="organizer.about"></p>
                            <p class="small" v-if="organizer.name === 'Ben Ramsey'">Photo credit to <a href="https://twitter.com/afilina">Anna Filina</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <h3>Colophon</h3>
                    <p>This website could not have been built without some of these following open source technologies:</p>
                    <ul>
                        <li><i class="devicon-laravel-plain colored"></i> Laravel</li>
                        <li><i class="devicon-vuejs-plain colored"></i> Vue.js</li>
                        <li><i class="devicon-bootstrap-plain colored"></i> Bootstrap</li>
                        <li><i class="devicon-github-plain colored"></i> Github</li>
                        <li><i class="devicon-nginx-original colored"></i> Nginx</li>
                    </ul>
                    <p>The fonts used are Raleway and Bitter. The website is published under the MIT license, and publicly available on <a href="https://github.com/southeastphpconf/southeastphp.com"><i class="fa fa-github"></i> Github</a>.</p>
                </div>
            </div>
        </div>
        <se-footer></se-footer>
    </div>
</template>
<script>
  import axios from 'axios';
  import { sample } from 'lodash';
  import SeNav from './navbar.vue';
  import SeFooter from './footer.vue';

  export default {
    data() {
      return {
        title: 'About the SoutheastPHP Conference Organizers',
        about: {
          'whySouthEastPHP': '',
        },
        taglines: [
          'A Conference for the PHP Community',
          'Cause we\'ve all heard Matt rave about Hot Chicken',
          'We love music',
          'We didn\'t have enough stuff to do already',
          'We just wanted to see our friends',
          'Cause why not?',
          'Tired of going without hot chicken at other conferences',
          'We wanna show off our sweet traffic problems',
          'It\'s the only way we can get people to spend time with us',
          'The more we get together,the more we Unexpected T_PAAMAYIM_NEKUDOTAYIM',
        ],
        organizers: [],
      }
    },

    created() {
      this.getOrganizers();
    },

    computed: {
      tagline() {
        return sample(this.taglines);
      },
    },

    methods: {
      getOrganizers() {
        axios.get('/api/organizers').then(response => {
          this.organizers = response.data;
        }).catch(error => {
          console.error(error);
        });
      },
    },

    components: {
      SeNav,
      SeFooter,
    }
  };
</script>