<style lang='scss'>

</style>
<template>
    <div>
      <se-navbar></se-navbar>
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h1>Venue</h1>
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