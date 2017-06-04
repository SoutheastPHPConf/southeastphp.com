<style lang='scss'>

</style>

<template>
    <div class="col-xs-12">
        <form class="" action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="subject">Subject</label>
                <input type="text" class="form-control" id="subject" v-model="subject">
            </div>
            <div class="form-group">
                <label for="message">Message</label>
                <textarea id="message" class="form-control" v-model="message"></textarea>
                <p><small>Supports Markdown</small></p>
            </div>
            <button type="submit" class="btn btn-primary" @click.prevent="sendEmail">Login</button>
        </form>
    </div>
</template>
<script>
  import axios from 'axios';

  export default {

    data() {
      return {
        subject: '',
        message: '',
      };
    },

    methods: {
      sendEmail() {
        axios.post('/api/email/send', { subject: this.subject, message: this.message }).then(response => {
          this.successBanner = true;
        }).then(error => {
          console.log(error);
        });
      },
    },
  };
</script>
