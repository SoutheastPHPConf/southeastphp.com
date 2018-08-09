<style lang='scss' scoped>
    button{
      color: #fff;
      &:hover {
        background-color: #F37321;
        color: #fff;
      }
    }

    p {
        padding-top: 4rem;
    }
</style>
<template>
    <div>
        <se-navbar></se-navbar>
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h2 class="tracking-wide">Southeast PHP Schedule</h2>
                    <button class="btn btn-default bg-orange" @click.prevent="hideThursday">Hide Thursday</button>
                    <button class="btn btn-default bg-orange" @click.prevent="hideFriday">Hide Friday</button>
                    <a href="/tickets"><button class="btn btn-default bg-orange">Buy Ticket!</button></a>
                    <br>
                    <p class="pt-4">Three rooms spread out in the hotel to give people time to admire the local art photography exhibit as well as learn something new! We aimed to have the sessions compliment each other and hope you see tracks that make you
                        want to dive deep on various topics. There will also be plenty of time and space to catch up with friends and make new ones.
                    </p>
                    <table class="table table-striped" v-if="showThursday === true">
                        <thead>
                            <tr>
                                <th colspan="4" class="tracking-wide"><h3>Thursday, August 16th, 2018</h3></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Room</td>
                                <td class="text-center">Opry</td>
                                <td class="text-center">Ballroom</td>
                                <td class="text-center">Ryman</td>
                            </tr>
                            <tr>
                                <td>9:00am</td>
                                <td colspan="3" class="text-center">
                                    Opening Keynote - Ballroom<br>
                                    Cal Evans <br>
                                    <a href="https://southeastphp.com/sessions#31">Apple, Butter, Darmok: A communications primer for Developers</a>
                                </td>
                            </tr>
                            <tr>
                                <td>10:00am</td>
                                <td class="text-center">Jose Diaz-Gonzalez <br> <a href="https://southeastphp.com/sessions#30">12 Factor PHP Applications - The Remix</a></td>
                                <td class="text-center">James Titcumb <br> <a href="https://southeastphp.com/sessions#9">Climbing the AST</a></td>
                                <td class="text-center">Steven Wade <br> <a href="https://southeastphp.com/sessions#24">Assemble Your Code in Stages: Leveling Up With Pipelines</a></td>
                            </tr>
                            <tr>
                                <td>11:00am</td>
                                <td class="text-center">Adam Culp <br> <a href="https://southeastphp.com/sessions#23">Practical PHP Deployment with Jenkins</a></td>
                                <td class="text-center">Sara Golemon <br> <a href="https://southeastphp.com/sessions#13">How PHP Ticks</a></td>
                                <td class="text-center">Ashley Hutson <br> <a href="https://southeastphp.com/sessions#21">Win Big, Cache Out</a></td>
                            </tr>
                            <tr>
                                <td>12:00pm</td>
                                <td colspan="4" class="text-center tracking-wide">Lunch Time!</td>
                            </tr>
                            <tr>
                                <td>1:00pm/13:00</td>
                                <td colspan="3" class="text-center">
                                    Lunch Keynote - Ballroom<br>
                                    Adrienne Lowe <br>
                                    <a href="https://southeastphp.com/sessions#33">From support to engineering to management: What you take with you, what you leave behind</a>
                                </td>
                            </tr>
                            <tr>
                                <td>2:00pm/14:00</td>
                                <td class="text-center">Omni Adams <br> <a href="https://southeastphp.com/sessions#7">The Dark Corners of the SPL</a></td>
                                <td class="text-center">Larry Garfield <br> <a href="https://southeastphp.com/sessions#10">Software Management Lessons from the 1960s</a></td>
                                <td class="text-center">Jessica Mauerhan <br> <a href="https://southeastphp.com/sessions#29">Double Loop: TDD & BDD Done Right</a></td>
                            </tr>
                            <tr>
                                <td>3:00pm/15:00</td>
                                <td class="text-center">Olivia Liddell <br> <a href="https://southeastphp.com/sessions#14">Overcoming your fear of failure</a></td>
                                <td class="text-center">Amanda Folson <br> <a href="https://southeastphp.com/sessions#19">Zero to API with Lumen</a></td>
                                <td class="text-center">Korvin Szanto <br> <a href="https://southeastphp.com/sessions#26">How to use generators to beat memory bloat</a></td>
                            </tr>
                            <tr>
                                <td>4:00pm/16:00</td>
                                <td class="text-center">David Stanley <br> <a href="https://southeastphp.com/sessions#4">Getting ready for scale: Load testing your API with Gatling</a></td>
                                <td class="text-center">Jonathan Wage <br> <a href="https://southeastphp.com/sessions#15">Doctrine for Beginners</a></td>
                                <td class="text-center">Mike Willbanks <br> <a href="https://southeastphp.com/sessions#25">Queue It!</a></td>
                            </tr>
                            <tr>
                                <td>5:00pm/17:00</td>
                                <td colspan="3" class="text-center">
                                    Afternoon Keynote - Ballroom<br>
                                    Ijeoma Ezeonyebuchi <br>
                                    <a href="https://southeastphp.com/sessions#35">Becoming an everyday advocate for diversity and inclusion, small steps to impactful changes </a>
                                </td>
                            </tr>
                            <tr>
                                <td>Evening</td>
                                <td colspan="3" class="text-center">
                                    Panel Discussion - Games - Food <br>
                                    Evening Sponsor: Concrete5!
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-xs-12">
                    <table class="table table-striped" v-if="showFriday === true">
                        <thead>
                        <tr>
                            <th colspan="4" class="tracking-wide"><h3>Friday, August 17th, 2018</h3></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Room</td>
                            <td class="text-center">Opry</td>
                            <td class="text-center">Ballroom</td>
                            <td class="text-center">Ryman</td>
                        </tr>
                        <tr>
                            <td>9:00am</td>
                            <td colspan="3" class="text-center">
                                Opening Keynote - Ballroom<br>
                                Jenna Quindica <br>
                                <a href="/sessions#36">Mental health in tech: Storytime</a>
                            </td>
                        </tr>
                        <tr>
                            <td>10:00am</td>
                            <td class="text-center">Amrita Jain <br> <a href="https://southeastphp.com/sessions#18">New frontiers in voyage of APIs from REST to Reactive using MicroServices+GraphQL</a></td>
                            <td class="text-center">Joe Ferguson <br> <a href="https://southeastphp.com/sessions#2">Maintaining Homestead</a></td>
                            <td class="text-center">David Hayes <br> <a href="https://southeastphp.com/sessions#17">Banishing Loops with Functional Programming</a></td>
                        </tr>
                        <tr>
                            <td>11:00am</td>
                            <td class="text-center">Ben Edmunds <br> <a href="https://southeastphp.com/sessions#5">Modern and Secure PHP</a></td>
                            <td class="text-center">Emily Stamey <br> <a href="https://southeastphp.com/sessions#20">Hey Boss, Event Sourcing Could Fix That!</a></td>
                            <td class="text-center">Tanner Plauché <br> <a href="https://southeastphp.com/sessions#22">ES6 and Beyond for PHP Developers</a></td>
                        </tr>
                        <tr>
                            <td>12:00pm</td>
                            <td colspan="4" class="text-center tracking-wide">Lunch Time!</td>
                        </tr>
                        <tr>
                            <td>1:00pm/13:00</td>
                            <td colspan="3" class="text-center">
                                Lunch Keynote - Ballroom<br>
                                Graham Hoefer &amp; Samantha Quiñones <br>
                                <a href="https://southeastphp.com/sessions#32">The Myth of the Career Ladder </a>
                            </td>
                        </tr>
                        <tr>
                            <td>2:00pm/14:00</td>
                            <td class="text-center">Terrence Ryan <br> <a href="https://southeastphp.com/sessions#8">Virtual Machine. Container, or Serverless</a></td>
                            <td class="text-center">Kevin Smith <br> <a href="https://southeastphp.com/sessions#16">Peeling Back the Magic: Modern PHP Without a Framework</a></td>
                            <td class="text-center">Steve Brownlee <br> <a href="https://southeastphp.com/sessions#29">Pysch!</a></td>
                        </tr>
                        <tr>
                            <td>3:00pm/15:00</td>
                            <td class="text-center">Steve Grunwell<br> <a href="https://southeastphp.com/sessions#28">Building for the PHP Command Line Interface</a></td>
                            <td class="text-center">Jason McCreary <br> <a href="https://southeastphp.com/sessions#6">Building a modern PHP application</a></td>
                            <td class="text-center">Aimee Knight<br> <a href="https://southeastphp.com/sessions#38">It's Not Dark Magic - Pulling Back the Curtains From Your Stylesheets</a></td>
                        </tr>
                        <tr>
                            <td>4:00pm/16:00</td>
                            <td class="text-center">Dee Wilcox <br> <a href="https://southeastphp.com/sessions">Accelerate Everyone: Managing Transition and Leveraging the Speed of Trust to Build High Performance Teams</a></td>
                            <td class="text-center">Margaret Staples <br> <a href="https://southeastphp.com/sessions#3">Philosophy in Code: I Kant Even</a></td>
                            <td class="text-center">Ed Barnard <br> <a href="https://southeastphp.com/sessions#27">Big Iron: PHP Lessons from Cold War Supercomputing</a></td>
                        </tr>
                        <tr>
                            <td>5:00pm/17:00</td>
                            <td colspan="3" class="text-center">
                                Afternoon Keynote - Ballroom<br>
                                Josh Holmes <br>
                                <a href="https://southeastphp.com/sessions#34">Building World Class Developer Organizations</a>
                            </td>
                        </tr>
                        <tr>
                            <td>Evening</td>
                            <td colspan="3" class="text-center">
                                Hackathon - Games - Food <br>
                                Evening Sponsor: Twilio!
                            </td>
                        </tr>
                        </tbody>
                    </table>
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
    },

    data() {
      return {
        showThursday: true,
        showFriday: true,
      };
    },

    methods: {
      hideThursday() {
        this.showThursday = !this.showThursday;
      },

      hideFriday() {
        this.showFriday = !this.showFriday;
      },
    },
  };
</script>
