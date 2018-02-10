<style lang='scss' scoped>
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

    .sponsor-image {
        display: block;
        margin: 10px auto;
        border-radius: 6px;
        max-width: 33rem;
        max-height: 12rem;
    }

    p.sponsor-metadata {
        text-align:center;
    }

    .fa {
        padding-left: 1rem;
        padding-right: 1rem;
    }
</style>
<template>
    <div>
        <se-navbar :user="user"></se-navbar>
        <div class="container">
            <div class="row">
                <h1>Our Sponsors</h1>
                <p>We could not make this conference, and our community, possible without all of our sponsors! Sponsors help us keep the conference at the lowest price possible, while letting us work to bring you the best speakers our community has to offer. We encourage you to thank the sponsors via Twitter, or in person at the conference!</p>
                <p>For more information about sponsoring <a href="/docs/southeastphp-sponsor-prospectus.pdf" download>download our prospectus</a></p>

                <h4>Interested in shaping the diversity of the Southeast PHP Conference?</h4>
                <p>We set up a <a href="/diversity">page</a> to detail some of our efforts and ideas to help make the Southeast PHP Conference as diverse as possible. If you or your company would like to help us, please let us know!</p>

                <div class="col-xs-12" v-if="loading == false && (sponsorLevels.data.length == 0 || sponsors.data.length == 0)">
                    <h2>No sponsors at this time, please check back later.</h2>
                </div>
                <div v-for="sponsorLevel in sponsorList">
                    <div class="row">
                        <div class="col-xs-12">
                            <h2 class="sponsor">{{sponsorLevel.name}}</h2>
                        </div>
                    </div>
                    <div v-if="sponsorsByLevel(sponsorLevel.name).length > 0">
                        <div class="col-xs-12 col-md-4" v-for="sponsor in sponsorsByLevel(sponsorLevel.name)">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <a :href="sponsor.website"><img :src="sponsor.image" class="sponsor-image" :alt="sponsor.name"></a>
                                </div>
                                <div class="panel-body">
                                    <p class="sponsor-metadata">
                                        <a :href="sponsor.twitter"><i class="fa fa-twitter" v-if="sponsor.twitter" area-hidden="true"></i></a>
                                        <a :href="sponsor.facebook"><i class="fa fa-facebook" v-if="sponsor.facebook" area-hidden="true"></i></a>
                                        <a :href="sponsor.website"><i class="fa fa-id-card" v-if="sponsor.website" area-hidden="true"></i></a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12" v-else>
                        <h3>No sponsors at this level yet.</h3>
                    </div>
                </div>
            </div>

            <div class="row">
                <h1>Our Sponsor Levels</h1>

                <p>If you are interested in sponsoring the Southeast PHP Conference, please email us at <a href="mailto:organizers@southeastphp.com">organizers@southeastphp.com</a> and we will be more than happy to discuss potential sponsorships!</p>

                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Sponsor Level</th>
                        <th>Cost</th>
                        <th>Spots Remaining</th>
                        <th>Information</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="sponsorLevel in sponsorLevels.data">
                        <td>{{sponsorLevel.name}}</td>
                        <td>${{ sponsorLevel.cost }}</td>
                        <td>{{sponsorLevel.remaining}}</td>
                        <td>{{sponsorLevel.information}}</td>
                    </tr>
                    </tbody>
                </table>

                <h3>Additional Sponsorship Opportunities</h3>
                <p>We do not want to limit the opportunities for companies and groups to sponsor the Southeast PHP Conference. Below are a few suggestions, limited only by our imaginations. If you want to be involved in the conference, here are some suggestions</p>
                <ul>
                    <li>After Party Sponsor (Two sponsorships available)</li>
                    <li>Speaker Dinner Sponsor</li>
                    <li>T-shirt Sponsor</li>
                    <li>Coffee/Snack Sponsor - Price to be determined</li>
                    <li>Laynard Sponsor</li>
                    <li>Swag Bag Sponsor</li>
                </ul>
            </div>
        </div>
        <se-footer></se-footer>
    </div>
</template>
<script>
    import axios from 'axios';
    import auth from '../auth.js';
    import SeNavbar from './navbar.vue';
    import SeFooter from './footer.vue';
    import { reverse } from 'lodash';

    export default {
      created() {
        return auth.check();
      },

      computed: {
        sponsorList() {
          return reverse(this.sponsorLevels.data);
        },
      },

      data() {
        return {
          loading: true,
          sponsorLevels: [],
          sponsors: [],
          auth: auth,
          user: auth.user || null,
        };
      },

        created() {
            axios.all([this.getSponsorLevels(), this.getSponsors()]).then(axios.spread((sponsorLevels, sponsors) => {
                this.sponsorLevels = sponsorLevels;
                this.sponsors = sponsors;
                this.loading = false;
            }));
        },
        methods: {
            sponsorsByLevel(level) {
                return this.sponsors.data.filter((sponsor) => {
                    return sponsor.sponsorLevel === level;
                });
            },
            getSponsorLevels() {
                return axios.get('/api/sponsors/levels').then(response => {
                    return response.data;
                }, function (e) {
                    console.log(e);
                })
            },
            getSponsors() {
                return axios.get('/api/sponsors').then(response => {
                    return response.data;
                }, function (e) {
                    console.log(e);
                })
            }
        },

        components: {
          SeNavbar,
          SeFooter,
        }
    };
</script>
