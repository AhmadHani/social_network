<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Bootstrap CSS -->    
    
    <link href="{{asset('admin_theme/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="{{asset('admin_theme/css/bootstrap-theme.css')}}" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="{{asset('admin_theme/css/elegant-icons-style.css')}}" rel="stylesheet" />
    <link href="{{asset('admin_theme/css/css/font-awesome.min.css')}}" rel="stylesheet" />    
    <!-- full calendar css-->
    <link href="{{asset('admin_theme/assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css')}}" rel="stylesheet" />
	<link href="{{asset('admin_theme/assets/fullcalendar/fullcalendar/fullcalendar.css')}}" rel="stylesheet" />
    <!-- easy pie chart-->
    <link href="{{asset('admin_theme/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css')}}" rel="stylesheet" type="text/css" media="screen"/>
    <!-- owl carousel -->
    <link rel="stylesheet" href="{{asset('admin_theme/css/owl.carousel.css')}}" type="text/css">
	<link href="{{asset('admin_theme/css/jquery-jvectormap-1.2.2.css')}}" rel="stylesheet">
    <!-- Custom styles -->
	<link rel="stylesheet" href="{{asset('admin_theme/css/fullcalendar.css')}}">
	<link href="{{asset('admin_theme/css/widgets.css')}}" rel="stylesheet">
    <link href="{{asset('admin_theme/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('admin_theme/css/style-responsive.css')}}" rel="stylesheet" />
	<link href="{{asset('admin_theme/css/xcharts.min.css')}}" rel=" stylesheet">	
	<link href="{{asset('admin_theme/css/jquery-ui-1.10.4.min.css')}}" rel="stylesheet">
        <link href="{{asset('lib/noty.css')}}" rel="stylesheet">

	<!-- =======================================================
        Theme Name: NiceAdmin
        Theme URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
        Author: BootstrapMade
        Author URL: https://bootstrapmade.com
    ======================================================= -->
  </head>

  <body>
  <div id="app">
  <!-- container section start -->
  <section id="container" class="">
     
      
      <header class="header dark-bg">
            <div class="toggle-nav">
                <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
            </div>

            <!--logo start-->
            <a href="index.html" class="logo">Social <span class="lite">Network</span></a>
            <!--logo end-->

            <div class="nav search-row" id="top_menu">
                <!--  search form start -->
                <ul class="nav top-menu">                    
                    <li>
                        <form class="navbar-form">
                            <input class="form-control" placeholder="Search" type="text">
                        </form>
                    </li>                    
                </ul>
                <!--  search form end -->                
            </div>

            <div class="top-nav notification-row">                
                <!-- notificatoin dropdown start-->
                <ul class="nav pull-right top-menu">
                    
                    <!-- inbox notificatoin end -->
                    <!-- alert notification start-->
                 <unread></unread>
                    <!-- alert notification end-->
                    <!-- user login dropdown start-->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="profile-ava">
                                <img alt="" src="{{Auth::user()->avatar}}" width="30px" height="30px">
                            </span>
                            <span class="name" >
                            <a style="
                            margin-left: 50px;
    margin-top: -42px;

                            " href="{{route('profile.show',['username'=>Auth::user()->username])}}">{{Auth::user()->name}}</a>
                            </span>
                        </a>
                      
                    </li>
                    <!-- user login dropdown end -->
                </ul>
                <!-- notificatoin dropdown end-->
            </div>
      </header>      
      <!--header end-->

      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu">                
                  <li class="active">
                      <a class="" href="{{route('index')}}">
                          <i class="icon_house_alt"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>
				  <li class="sub-menu">
                      <a href="{{route('users')}}" class="">
                          <i class="fa fa-user-o"></i>
                          <span>Users</span>
                          
                      </a>
                  </li>       
                  <li class="sub-menu">
                      <a href="{{route('posts')}}" class="">
                          <i class="fa fa-newspaper-o"></i>
                          <span>Posts</span>
                      </a>
                  </li>
                  <li>
                      <a class="" href="{{route('comments')}}">
                          <i class="fa fa-comment-o"></i>
                          <span>Comments</span>
                      </a>
                  </li>
                  <li>                     
                      <a class="" href="{{route('likes')}}">
                          <i class="fa fa-thumbs-o-up"></i>
                          <span>Likes</span>
                          
                      </a>
                                         
                  </li>
                             
                  <li class="sub-menu">
                      <a href="{{route('settings')}}" class="">
                          <i class="fa fa-cog"></i>
                          <span>Setting</span>
                      </a>
                  </li>
                  
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon_documents_alt"></i>
                          <span>Pages</span>
                      </a>
                  </li>
                  
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
        <!-- container section start -->
@yield("content")
    <!-- javascripts -->

    </section>
    </div>
    
	<script src="{{asset('js/app.js')}}"></script>

    <script src="{{asset('admin_theme/js/jquery.js')}}"></script>
	<script src="{{asset('admin_theme/js/jquery-ui-1.10.4.min.js')}}"></script>
    <script src="{{asset('admin_theme/js/jquery-1.8.3.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('admin_theme/js/jquery-ui-1.9.2.custom.min.js')}}"></script>
    <!-- bootstrap -->
    <script src="{{asset('admin_theme/js/bootstrap.min.js')}}"></script>
    <!-- nice scroll -->
    <script src="{{asset('admin_theme/js/jquery.scrollTo.min.js')}}"></script>
    <script src="{{asset('admin_theme/js/jquery.nicescroll.js')}}" type="text/javascript"></script>
    <!-- charts scripts -->
    <script src="{{asset('admin_theme/assets/jquery-knob/js/jquery.knob.js')}}"></script>
    <script src="{{asset('admin_theme/js/jquery.sparkline.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin_theme/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js')}}"></script>
    <script src="{{asset('admin_theme/js/owl.carousel.js')}}" ></script>
    <!-- jQuery full calendar -->
    <<script src="{{asset('admin_theme/js/fullcalendar.min.js')}}"></script> <!-- Full Google Calendar - Calendar -->
	<script src="{{asset('admin_theme/assets/fullcalendar/fullcalendar/fullcalendar.js')}}"></script>
    <!--script for this page only-->
    <script src="{{asset('admin_theme/js/calendar-custom.js')}}"></script>
	<script src="{{asset('admin_theme/js/jquery.rateit.min.js')}}"></script>
    <!-- custom select -->
    <script src="{{asset('admin_theme/js/jquery.customSelect.min.js')}}" ></script>
	<script src="{{asset('admin_theme/assets/chart-master/Chart.js')}}"></script>
   
    <!--custome script for all page-->
    <script src="{{asset('admin_theme/js/scripts.js')}}"></script>
    <!-- custom script for this page-->
    <script src="{{asset('admin_theme/js/sparkline-chart.js')}}"></script>
    <script src="{{asset('admin_theme/js/easy-pie-chart.js')}}"></script>
	<script src="{{asset('admin_theme/js/jquery-jvectormap-1.2.2.min.js')}}"></script>
	<script src="{{asset('admin_theme/js/jquery-jvectormap-world-mill-en.js')}}"></script>
	<script src="{{asset('admin_theme/js/xcharts.min.js')}}"></script>
	<script src="{{asset('admin_theme/js/jquery.autosize.min.js')}}"></script>
	<script src="{{asset('admin_theme/js/jquery.placeholder.min.js')}}"></script>
	<script src="{{asset('admin_theme/js/gdp-data.js')}}"></script>	
	<script src="{{asset('admin_theme/js/morris.min.js')}}"></script>
	<script src="{{asset('admin_theme/js/sparklines.js')}}"></script>	
	<script src="{{asset('admin_theme/js/charts.js')}}"></script>
	<script src="{{asset('admin_theme/js/jquery.slimscroll.min.js')}}"></script>
<script src="{{asset('lib/noty.js')}}" type="text/javascript"></script>

  <script>

      //knob
      $(function() {
        $(".knob").knob({
          'draw' : function () { 
            $(this.i).val(this.cv + '%')
          }
        })
      });

      //carousel
      $(document).ready(function() {
          $("#owl-slider").owlCarousel({
              navigation : true,
              slideSpeed : 300,
              paginationSpeed : 400,
              singleItem : true

          });
      });

      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });
	  
	  /* ---------- Map ---------- */
	$(function(){
	  $('#map').vectorMap({
	    map: 'world_mill_en',
	    series: {
	      regions: [{
	        values: gdpData,
	        scale: ['#000', '#000'],
	        normalizeFunction: 'polynomial'
	      }]
	    },
		backgroundColor: '#eef3f7',
	    onLabelShow: function(e, el, code){
	      el.html(el.html()+' (GDP - '+gdpData[code]+')');
	    }
	  });
	});
    

  </script>

  
  </div>
  </body>
</html>
