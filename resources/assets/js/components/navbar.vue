<style lang="scss" scoped>
    .navbar {
        background-color: #BF2127;
        border-bottom: 2px solid #DAE1E7;
        color: #fff;
    }

    .dropdown-menu {
        background-color: #BF2127;
        a {
            color: #fff;
            background-color: #BF2127;
            &:hover {
                background-color: #BF2127;
            }
        }
    }

    a.hover {
        border-bottom: 2px solid #BF2127;
        &:hover {
            color: #fff;
            border-bottom: 2px solid #FFE8BE;
        }
        &:active {
            color: #fff;
            border-bottom: 2px solid #FFE8BE;
        }
    }


</style>
<template>
    <div>
        <nav class="navbar navbar-default">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <!-- Collection of nav links and other content for toggling -->
                <div id="navbarCollapse" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav text-center font-sans-narrow">
                        <li><a class="hover tracking-wide font-2xl" href="/" title="Home"><img style="max-width:50px;" class="img-responsive" src="../../../../public/img/sephp-lg.png"></a></li>
                        <li><a class="hover tracking-wide font-2xl" href="/tickets">Buy Tickets</a></li>
                        <li><a class="hover tracking-wide font-2xl" href="/venue">Venue</a></li>
                        <li><a class="hover tracking-wide font-2xl" href="/sponsors">Sponsors</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle tracking-wide font-2xl hover" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Schedule<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a class="hover tracking-wide font-2xl" href="/speakers">Speakers</a></li>
                                <li><a class="hover tracking-wide font-2xl" href="/sessions">Sessions</a></li>
                                <li><a class="hover tracking-wide font-2xl" href="/schedule">Schedule</a></li>
                            </ul>
                        </li>
                        <li><a class="hover tracking-wide font-2xl" href="/code-of-conduct">Code of Conduct</a></li>

                    </ul>
                </div>
            </div>
        </nav>
    </div>
</template>
<script>
  import axios from 'axios';

  export default {
    props: [
      'user',
    ],
  };
</script>