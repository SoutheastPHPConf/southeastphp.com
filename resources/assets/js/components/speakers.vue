<style lang='scss' scoped>

</style>
<template>
    <div>
        <se-navbar></se-navbar>
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <p>You still have a few days! Our Cfp is still going on, till April 15th, 11:59pm/23:59!</p>
                    <p>Go to <a href="https://cfp.southeastphp.com">our cfp site</a> and submit as many talks as you want!</p>
                </div>
            </div>
        </div>
        <se-footer></se-footer>
    </div>
</template>
<script>
  import axios from 'axios';
  import moment from 'moment';
  import SeNavbar from './navbar.vue';
  import SeFooter from './footer.vue';

  export default {
    components: {
      SeNavbar,
      SeFooter
    }
  }
</script>