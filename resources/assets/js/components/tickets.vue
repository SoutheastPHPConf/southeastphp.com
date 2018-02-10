<style lang='scss'>
    #eventbrite-widget-container-43007986044 {
        width: 95%;
    }
</style>
<template>
    <div>
      <se-navbar></se-navbar>
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h2>Tickets and Registration</h2>
                    <p>The conference is August 16th and 17th, 2018</p>
                    <p>NOTE: If you are using a mobile device the form below may not work as expected. Instead please use <a href="https://www.eventbrite.com/e/southeast-php-tickets-43007986044?aff=es2">this link</a>.</p>
                    <div class="center-block" id="eventbrite-widget-container-43007986044"></div>
                    <p class="text-center">By buying a ticket, you agree to abide by our <a href="/code-of-conduct">Code Of Conduct</a>.</p>

                    <h2>Cancellation Policy</h2>
                    <p>Cancellations of conference registrations made prior to May 15th are subject to a cancellation fee. Cancellations made thereafter are nonrefundable. All cancellations must be made via our Contact Form. Substitutions may be made at any time, also by using our Contact Form. Confirmed registrants who do not attend the conference will not receive a refund and are liable for the entire fee. Cancellations of travel and hotel arrangements are the responsibility of the registrant. Southeast PHP Conference reserves the right to refuse registrations. Due to insurance restrictions, no one under 18 will be admitted to the conference. All speakers, programs and descriptions are subject to change without notice.</p>
                    <h2>VAT Invoices</h2>
                    <p>This conference is organized by a U.S. based entity and is held in the U.S. Thus there is no need of a VAT invoice for registrations of EU based attendees. After registration a confirmation email with all related financial information is automatically sent to the registrant. Nothing more is available.</p>
                    <h2>International Attendees:</h2>
                    <p>The only exception to our cancellation policy is in the case of an international attendee not being granted a U.S. Visa to enter the country, because they must purchase a ticket in order to receive an invitation letter to include in the U.S. Visa application.</p>
                    <p>For those attendees who are required to gain a U.S. Visa there are some steps that need to be followed:</p>
                    <ul>
                        <li>First, purchase a ticket to the conference.</li>
                        <li>Then, send us the vital information below so we can generate an invitation letter for you.</li>
                        <li>Wait for the invitation letter, typically 1 to 2 days.</li>
                        <li>If your U.S. Visa application is rejected, simply email us a copy of the rejection letter for <b>immediate full refund</b> which will go back on the card used for purchase.</li>
                    </ul>
                    <p> The information we need to prepare the invitation letter is:</p>
                    <p> <b>Name</b>: {name}</p>
                    <p> <b>Job Title</b>: {title}</p>
                    <p> <b>Company</b>: {company}</p>
                    <p> <b>Address 1</b>: {address1}</p>
                    <p> <b>Address 2</b>: {address2}</p>
                    <p> <b>City/Postal Code</b>: {city} {postal_code}</p>
                    <p> <b>Country</b>: {country}</p>
                    <p> <b>Phone</b>: {phone}</p>
                    <p> <b>E-mail</b>: {email}</p>
                    <p> <b>Passport No.</b>: {passport_number}</p>
                    <p> <b>Passport Expiration Date</b>: {passport_expiration_date}</p>
                    <p> <b>Date of Birth</b>: {date_of_birth}</p>
                    <p> Email the above information to: Contact[at]SoutheastPHP[dot]com or use our Contact Form. </p>
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
    created() {
      let exampleCallback = function() {
        console.log('Order complete!');
      };

      window.EBWidgets.createWidget({
        // Required
        widgetType: 'checkout',
        eventId: '43007986044',
        iframeContainerId: 'eventbrite-widget-container-43007986044',
        // Optional
        iframeContainerHeight: 580,  // Widget height in pixels. Defaults to a minimum of 425px if not provided
        onOrderComplete: exampleCallback  // Method called when an order has successfully completed
      });
    },

    data() {
      return {
        eventbrite: '',
      };
    },

    components: {
      SeNavbar,
      SeFooter,
    },
  };
</script>