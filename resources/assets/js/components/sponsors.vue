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

    .sponsor-image {
        display: block;
        margin: 10px auto;
        border-radius: 6px;
    }

    p.sponsor-metadata {
        text-align:center;
    }
</style>
<template>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h1>Our Sponsors</h1>
                </div>
                <div class="col-xs-12" v-if="loading == false && (sponsorLevels.data.length == 0 || sponsors.data.length == 0)">
                    <h2>No sponsors at this time, please check back later.</h2>
                </div>
                <div v-for="sponsorLevel in sponsorLevels.data">
                    <div class="row">
                        <div class="col-xs-12">
                            <h2>{{sponsorLevel.name}}</h2>
                        </div>
                    </div>
                    <div v-if="sponsorsByLevel(sponsorLevel.name).length > 0">
                        <div class="col-xs-12 col-md-4" v-for="sponsor in sponsorsByLevel(sponsorLevel.name)">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <img :src="sponsor.image" class="sponsor-image" :alt="sponsor.name">
                                </div>
                                <div class="panel-body">
                                    <p>{{sponsor.about}}</p>
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
                <div class="col-xs-12">
                    <h1>Our Sponsor Levels</h1>
                </div>

                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Sponsor Level</th>
                        <th>Spots Remaining</th>
                        <th>Information</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="sponsorLevel in sponsorLevels.data">
                        <td>{{sponsorLevel.name}}</td>
                        <td>{{sponsorLevel.remaining}}</td>
                        <td>{{sponsorLevel.information}}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>
<script>
    import axios from 'axios';

    export default {
        data() {
            return {
                loading: true,
                sponsorLevels: [],
                sponsors: [],
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
                    return sponsor.sponsorLevel == level;
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
        }
    };
</script>