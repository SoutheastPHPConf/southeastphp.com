<style lang='scss'>

</style>
<template>
    <div>
        <se-nav></se-nav>
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h2>Diversity at Southeast PHP</h2>
                    <p>We want to make Southeast PHP diverse and accessible to as many PHP developers as we can. With that said, we have put somethings in place to help that.</p>
                    <p>If you or your company is willing to help sponsor someone to get to Southeast PHP, please let us know by emailing us <a href="mailto:organizers@southeastphp.com">here</a> and we will do what we can to make it as smooth of a process as we can.</p>
                    <p>We have also put in place a <a href="/code-of-conduct">Code of Conduct</a> to help people feel safe while at Southeast PHP. We have Code of Conduct reporting guidelines <a href="/reporting">here</a> should you need to use it.</p>
                    <p>As we get closer to the conference dates, we will be updating our efforts to help create a diverse environment at Southeast PHP Conference!</p>
                </div>
            </div>
        </div>
        <se-footer></se-footer>
    </div>
</template>
<script>
  import axios from 'axios';
  import SeNav from './navbar.vue';
  import SeFooter from './footer.vue';

  export default {
    components: {
      SeNav,
      SeFooter,
    },
  };
</script>