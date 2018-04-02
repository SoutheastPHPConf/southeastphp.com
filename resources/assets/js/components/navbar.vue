<style lang="scss" scoped>
    .navbar {
        border-bottom: 2px solid #636b6f;
    }

    .dropdown-menu {

        background-color: #FFE8BE;
        a:hover {
            background-color: #FFE8BE;
        }
    }

    a.hover {
        border-bottom: 2px solid #FFE8BE;
        &:hover {
            color: #BF2127;
            border-bottom: 2px solid #BF2127;
        }
        &:active {
            color: #BF2127;
            border-bottom: 2px solid #BF2127;
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
                    <a href="/" class="navbar-brand">Southeast PHP Conference</a>
                </div>
                <!-- Collection of nav links and other content for toggling -->
                <div id="navbarCollapse" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav text-center">
                        <li><a class="hover" href="/about">About</a></li>
                        <li><a class="hover" href="/venue">Venue</a></li>
                        <li><a class="hover" href="/tickets">Tickets</a></li>
                        <li><a class="hover" href="/sponsors">Sponsors</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Sessions<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a class="hover" href="/speakers">Speakers</a></li>
                                <li><a class="hover" href="/sessions">Sessions</a></li>
                            </ul>
                        </li>

                        <li><a class="hover" href="/code-of-conduct">Code of Conduct</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="hidden-sm hidden-xs"><a href="https://twitter.com/southeastphp"><i class="fa fa-twitter"></i> @southeastphp</a></li>
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