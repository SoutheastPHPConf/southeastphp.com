<style lang='scss' scoped>
    .container {
        padding-top: 7rem;
    }

    div.editr--content {
        background-color: #fff;
    }
</style>
<template>
    <div>
        <se-navbar :user="user"></se-navbar>
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="alert alert-success" v-if="showSuccess === true">
                        {{ name }} was successfully added!
                    </div>

                    <h2>Add Sponsor</h2>

                    <form method="post" action="" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="sponsorName">Company Name</label>
                            <input type="email" class="form-control" id="sponsorName" aria-describedby="emailHelp" placeholder="Company/Sponsor Name" v-model="name">
                        </div>
                        <div class="form-group">
                            <label for="sponsorLevel">Sponsor Level</label>
                            <select class="form-control" id="sponsorLevel" v-model="level">
                                <option selected>Pick One</option>
                                <option value="fan-level">Fan Level</option>
                                <option value="session-player-level">Session Player</option>
                                <option value="touring-level">Touring Level</option>
                                <option value="with-the-band-level">With The Band Level</option>
                                <option value="star-level">Star Level</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <wysiwyg v-model="about" />
                        </div>

                        <div class="form-group">
                            <label for="sponsorWebsite">Sponsor Website</label>
                            <input type="text" id="sponsorWebsite" class="form-control" aria-describedby="sponsorWebsiteHelp" placeholder="Company/Sponsor Website" v-model="website">
                        </div>

                        <div class="form-group">
                            <label for="sponsorTwitter">Sponsor Twitter</label>
                            <input type="text" id="sponsorTwitter" class="form-control" aria-describedby="sponsorTwitterHelp" placeholder="Company/Sponsor twitter" v-model="twitter">
                        </div>

                        <div class="form-group">
                            <label for="sponsorFacebook">Sponsor Facebook</label>
                            <input type="text" id="sponsorFacebook" class="form-control" aria-describedby="sponsorFacebookHelp" placeholder="Company/Sponsor Facebook" v-model="facebook">
                        </div>

                        <div class="form-group">
                            <!--<vue-core-image-upload-->
                                    <!--:class="['btn', 'btn-primary']"-->
                                    <!--:crop="false"-->
                                    <!--@imageuploaded="imageuploaded"-->
                                    <!--:data="data"-->
                                    <!--:max-file-size="5242880"-->
                                    <!--url="/api/admin/sponsors/image" >-->
                            <!--</vue-core-image-upload>-->
                            <img v-if="sponsorImage !== ''" :src="sponsorImage" class="img-responsive">
                        </div>

                        <button type="submit" class="btn btn-primary" @click.prevent="saveSponsor">Submit</button>
                    </form>
                </div>
            </div>
        </div>
        <br>
        <se-footer></se-footer>
    </div>
</template>
<script>
  import axios from 'axios';
  import auth from '../../auth.js';
  //import VueCoreImageUpload  from 'vue-core-image-upload';
  import SeNavbar from '../navbar.vue';
  import SeFooter from '../footer.vue';

  export default {
    created() {
      return auth.check();
    },

    data() {
      return {
        name: '',
        about: '',
        level: '',
        website: '',
        twitter: '',
        facebook: '',
        sponsorImage: '',
        showSuccess: false,
        auth: auth,
        user: auth.user || null,
      };
    },

    methods: {
      saveSponsor() {
        let token = localStorage.getItem('id_token');

        axios.post('/api/admin/sponsors', {
          headers: {
            'Authorization': 'Bearer ' + token
          },
          name: this.name,
          about: this.about,
          level: this.level,
          website: this.website,
          sponsorImage: this.sponsorImage,
          facebook: this.facebook,
          twitter: `https://twitter.com/${this.twitter}`,
        }).then(response => {
          this.showSuccess = true;

          setTimeout(() => {
            this.showSuccess = false;
          }, 5000);
        });
      },

      imageuploaded(res) {
        this.sponsorImage = `https://s3.amazonaws.com/southeastphp/sponsors/${res}`;
      },
    },

    components: {
     // VueCoreImageUpload,
      SeFooter,
      SeNavbar,
    }
  };
</script>3