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
                    <p>We would love to find a company that will help us bring at least 5 under represented people to Southeast PHP! If your company is interested in this, please let us know. We want to get the event on <a href="https://diversitytickets.org">Diversity Tickets</a> so that way people can apply and work out travel needs.</p>
                    <p>As we get closer to the conference dates, we will be updating our efforts to help create a diverse environment at Southeast PHP Conference!</p>
                </div>

                <div class="col-xs-12">
                    <h3>Use this form to express your interest in buying up some tickets to help get more people to Southeast PHP! Once we get our ticketing system in place, we will take care of the financial details.</h3>
                    <div class="alert alert-success" v-if="showSuccess === true">
                        <p>Thank you for your submission! It means a lot to us!</p>
                    </div>
                    <form>
                        <div class="form-group">
                            <label for="contactName">Contact Name</label>
                            <input type="text" class="form-control" id="contactName" aria-describedby="contactName" placeholder="Contact Name" v-model="contactName">
                        </div>
                        <div class="form-group">
                            <label for="contactEmail">Contact Email</label>
                            <input type="text" class="form-control" id="contactEmail" aria-describedby="contactEmail" placeholder="Contact Email" v-model="contactEmail">
                        </div>
                        <div class="form-group">
                            <label for="contactCompany">Contact Company</label>
                            <input type="text" class="form-control" id="contactCompany" aria-describedby="contactCompany" placeholder="Contact Company" v-model="contactCompany">
                        </div>
                        <div class="form-group">
                            <label for="contactTwitter">Contact or Company Twitter</label>
                            <input type="text" class="form-control" id="contactTwitter" aria-describedby="contactTwitter" placeholder="Contact Twitter" v-model="contactTwitter">
                        </div>
                        <div class="form-group">
                            <label for="sponsorTicketAmount">Amount of Tickets To Sponsor <small><em>If you wish to sponsor more then ten, please email us directly</em></small></label>
                            <select class="form-control" id="sponsorTicketAmount" v-model="ticketAmount">
                                <option selected>Pick an amount</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="contactReason">Why is this important for you or your company? We want to highlight this at our conference.</label>
                            <input type="text" class="form-control" id="contactReason" aria-describedby="contactReason" placeholder="Why is your company sponsoring our diversity efforts?" v-model="contactReason">
                        </div>
                        <button type="submit" class="btn btn-large btn-success" @click.prevent="submitDiversityTicketForm">Submit</button>
                    </form>
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
    data() {
      return {
        contactName: '',
        contactEmail: '',
        contactCompany: '',
        contactTwitter: '',
        ticketAmount: '',
        contactReason: '',
        showSuccess: false,
      };
    },

    methods: {
      submitDiversityTicketForm() {
        axios.post('/api/tickets/diversity', {
          contactName: this.contactName,
          contactEmail: this.contactEmail,
          contactCompany: this.contactCompany,
          contactTwitter: this.contactTwitter,
          ticketAmount: this.ticketAmount,
          contactReason: this.contactReason,
        }).then(response => {
          this.showSuccess = true;

          setTimeout(() => {
            this.showSuccess = false;
          }, 3000);
        }).catch(error => {
          console.log(error);
        });
      },
    },

    components: {
      SeNav,
      SeFooter,
    },
  };
</script>