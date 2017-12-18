<style lang='scss' scoped>
    .container {
        padding-top: 7rem;
    }

    .ramsey {
        height: 10rem;
    }

    a.twitter {
        color: #00aced;
    }
</style>
<template>
    <div>
        <se-nav></se-nav>
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h1 class="">About Southeast PHP Conf <br><small>{{ tagline }}</small></h1>
                </div>
                <div class="col-xs-12">
                    <h2>The organizers</h2>
                </div>
                <div class="col-xs-12 col-md-4" v-for="organizer in organizers.data">
                    <div class="row">
                        <div class="col-xs-12 col-md-4">
                            <img :src="organizer.image" class="img-responsive img-rounded ramsey">
                        </div>
                        <div class="col-xs-12 col-md-8">
                            <h2>{{ organizer.name }}</h2>
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