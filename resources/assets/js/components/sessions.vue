<style lang='scss'>

</style>
<template>
    <div>
        <se-navbar></se-navbar>
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h1>Check back soon!</h1>
                    <p>Our Cfp is still going on, once that is done and we select our speakers, we will update this page with all the relevant information.</p>
                </div>
            </div>
        </div>
        <se-footer></se-footer>
    </div>
</template>
<script>
  import axios from 'axios';
  import SeNavbar from './navbar.vue';
  import SeFooter from './footer.vue';

  export default {
    components: {
      SeNavbar,
      SeFooter,
    }
  };
</script>