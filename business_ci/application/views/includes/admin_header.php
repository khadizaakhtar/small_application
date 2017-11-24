<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8" />
        <title>Business</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />
        <meta content="" name="description" />
        <meta content="Mosaddek" name="author" />

        <link href="<?php echo base_url() ?>assets/admin/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
        <link href="<?php echo base_url() ?>assets/admin/assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" />
        <link href="<?php echo base_url() ?>assets/admin/assets/bootstrap/css/bootstrap-fileupload.css" rel="stylesheet" />
       <link href="<?php echo base_url() ?>assets/admin/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <!--<link src="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">-->
        <link href="<?php echo base_url() ?>assets/admin/css/style.css" rel="stylesheet" />
        <link href="<?php echo base_url() ?>assets/admin/css/style-responsive.css" rel="stylesheet" />
        <link href="<?php echo base_url() ?>assets/admin/css/style-default.css" rel="stylesheet" id="style_color" />
        <link href="<?php echo base_url() ?>assets/admin/assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
        <link href="<?php echo base_url() ?>assets/admin/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>
        <link href="<?php echo base_url() ?>assets/admin/sweetalert/sweetalert.css" rel="stylesheet" type="text/css" media="screen"/>
<!--        <link href="<?php //echo base_url();              ?>assets/admin/dropzone.css" rel="stylesheet">
        <script src="<?php //echo base_url();              ?>assets/admin/dropzone.js"></script>-->
        <!-------------------------------------> 
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/admin/assets/bootstrap-wysihtml5/bootstrap-wysihtml5.css" />
         <link href="<?php echo base_url() ?>assets/admin/assets/bootstrap-datepicker/bootstrap-datepicker.css" rel="stylesheet" type="text/css" media="screen"/>
        
         <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/s/dt/dt-1.10.10/datatables.min.css"/>
         <script type="text/javascript" src="https://cdn.datatables.net/s/dt/dt-1.10.10/datatables.min.js"></script>
         
        <script type="text/javascript" language="javascript" src="http://www.technicalkeeda.com/js/javascripts/plugin/jquery.js"></script>
        <script src="<?php echo base_url() ?>assets/admin/js/jquery-1.11.1.min.js"></script>
        <script type="text/javascript" src="http://www.technicalkeeda.com/js/javascripts/plugin/json2.js"></script>
        
        <script src="http://maps.googleapis.com/maps/api/js"></script>
       <script src="<?php echo base_url() ?>js/jquery.dataTables.min.js"></script>
       

        <script>
            $(document).ready(function () {
                $("#fetch_data").click(function (e) { //for button click
                    // alert($("#search").val());

                    // if (e.keyCode == 13) //for enter click

                    $.ajax({
                        type: "post",
                        url: "<?php echo base_url() ?>movie/search_item",
                        cache: false,
                        dataType: "json",
                        data: 'search=' + $("#search").val(),
                        //success: function (data) {
                        success: function (data) {
                            console.log(data.movie_info);
                            $('#finalResult').html("");
                            var obj = data.movie_info;
                            //   alert('successss');
                            var items = '';
                            $.each(obj, function (i, val) {
                                //alert(323);
                                var id = val.imdbid;
                                //  alert(id);
                                //var url = '<?php echo base_url() ?>movie/view_details/'+id;
                                //alert(url);
                                items += '<span>' + val.imdbid + ' ' + '<a href="" class ="moviedetail" data-attr=' + id + '>' + val.title + '</a>' + '<span>(<span>' + val.year + ')<span>' + '<br>';
                                //alert(items);

                                $('#finalResult').html(items);
                            });
                            //-----------------------------------------------for get data by id------------------------------------------------
                            $(".moviedetail").click(function (e) {
                                e.preventDefault();
                                var movie_id = $(this).attr('data-attr');
                                //    alert(movie_id);
                                $.ajax({
                                    type: "get",
                                    url: "<?php echo base_url() ?>movie/search_item_by_id/" + movie_id,
                                    cache: false,
                                    dataType: "json",
                                    success: function (data) {
                                        alert(data.movie_pic);

                                        //     alert(movie_id);
                                        //$('.movie_id').val(data.movie_id);
                                        //   alert(data.movie_id);
                                        $('.title').val(data.title);
                                        $('.description').val(data.storyline);
                                        $('.category').val(data.movietype);
                                        $('.movie_pic').val(data.movie_pic);
                                        $('.movie_pic_view').attr('src', data.movie_pic);
                                    },
                                });
                            });
                            //-----------------------------------------------for get data------------------------------------------------
                        },
                        error: function () {
                            alert('Error while request..');
                        }
                    });
                    return false;
                });


                $("#save_data").click(function () { //for button click

                    // alert('hira');
                    // var movie_id = $(this).attr('data-attr');
                    // alert(movie_id);
                    var title = $('.title').val();
                    var description = $('.description').val();
                    var category = $('.category').val();
                    var movie_pic = $('.movie_pic');
                    //alert(title);
                    alert($('.movie_pic').val());

                    var dataString = $(".movie_data").serialize();
                    alert(dataString);
                    $.ajax({
                        type: "post",
                        url: "<?php echo base_url() ?>movie/save_movie_data/",
                        data: dataString,
                        // return false;
                        success: function (data)
                        {
                            if (data.msg) {
                                $('.message').html('<p>' + data.msg + '</p>)');
                            } else {
                                $('.message').html(data.err);
                            }
                        },
                    });
                    return false;
                });


            });
        </script>
        <!-------------------------------------> 

    </head>
    <!-- END HEAD -->
    <!-- BEGIN BODY -->
    <body class="fixed-top">
        <!-- BEGIN HEADER -->
        <div id="header" class="navbar navbar-inverse navbar-fixed-top">
            <!-- BEGIN TOP NAVIGATION BAR -->
            <div class="navbar-inner">
                <div class="container-fluid">
                    <!--BEGIN SIDEBAR TOGGLE-->
                    <div class="sidebar-toggle-box hidden-phone">
                        <div class="icon-reorder tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
                    </div>
                    <!--END SIDEBAR TOGGLE-->
                    <!-- BEGIN LOGO -->
                    <a class="brand" href="index.html">
                        <img src="<?php echo base_url() ?>assets/admin/img/logo.png" alt="Metro Lab" />
                    </a>
                    <!-- END LOGO -->
                    <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                    <a class="btn btn-navbar collapsed" id="main_menu_trigger" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="arrow"></span>
                    </a>
                    <!-- END RESPONSIVE MENU TOGGLER -->
                    <div id="top_menu" class="nav notify-row">
                        <!-- BEGIN NOTIFICATION -->
                        <ul class="nav top-menu">
                            <!-- BEGIN SETTINGS -->
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="icon-tasks"></i>
                                    <span class="badge badge-important">6</span>
                                </a>
                                <ul class="dropdown-menu extended tasks-bar">
                                    <li>
                                        <p>You have 6 pending tasks</p>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="task-info">
                                                <div class="desc">Dashboard v1.3</div>
                                                <div class="percent">44%</div>
                                            </div>
                                            <div class="progress progress-striped active no-margin-bot">
                                                <div class="bar" style="width: 44%;"></div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="task-info">
                                                <div class="desc">Database Update</div>
                                                <div class="percent">65%</div>
                                            </div>
                                            <div class="progress progress-striped progress-success active no-margin-bot">
                                                <div class="bar" style="width: 65%;"></div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="task-info">
                                                <div class="desc">Iphone Development</div>
                                                <div class="percent">87%</div>
                                            </div>
                                            <div class="progress progress-striped progress-info active no-margin-bot">
                                                <div class="bar" style="width: 87%;"></div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="task-info">
                                                <div class="desc">Mobile App</div>
                                                <div class="percent">33%</div>
                                            </div>
                                            <div class="progress progress-striped progress-warning active no-margin-bot">
                                                <div class="bar" style="width: 33%;"></div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="task-info">
                                                <div class="desc">Dashboard v1.3</div>
                                                <div class="percent">90%</div>
                                            </div>
                                            <div class="progress progress-striped progress-danger active no-margin-bot">
                                                <div class="bar" style="width: 90%;"></div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="external">
                                        <a href="#">See All Tasks</a>
                                    </li>
                                </ul>
                            </li>
                            <!-- END SETTINGS -->
                            <!-- BEGIN INBOX DROPDOWN -->
                            <li class="dropdown" id="header_inbox_bar">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="icon-envelope-alt"></i>
                                    <span class="badge badge-important">5</span>
                                </a>
                                <ul class="dropdown-menu extended inbox">
                                    <li>
                                        <p>You have 5 new messages</p>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="photo"><img src="<?php echo base_url() ?>assets/admin/assets/avatar-mini.png" alt="avatar" /></span>
                                            <span class="subject">
                                                <span class="from">Jonathan Smith</span>
                                                <span class="time">Just now</span>
                                            </span>
                                            <span class="message">
                                                Hello, this is an example msg.
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="photo"><img src="<?php echo base_url() ?>assets/admin/assets/avatar-mini.png" alt="avatar" /></span>
                                            <span class="subject">
                                                <span class="from">Jhon Doe</span>
                                                <span class="time">10 mins</span>
                                            </span>
                                            <span class="message">
                                                Hi, Jhon Doe Bhai how are you ?
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="photo"><img src="<?php echo base_url() ?>assets/admin/assets/avatar-mini.png" alt="avatar" /></span>
                                            <span class="subject">
                                                <span class="from">Jason Stathum</span>
                                                <span class="time">3 hrs</span>
                                            </span>
                                            <span class="message">
                                                This is awesome dashboard.
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="photo"><img src="<?php echo base_url() ?>assets/admin/assets/avatar-mini.png" alt="avatar" /></span>
                                            <span class="subject">
                                                <span class="from">Jondi Rose</span>
                                                <span class="time">Just now</span>
                                            </span>
                                            <span class="message">
                                                Hello, this is metrolab
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">See all messages</a>
                                    </li>
                                </ul>
                            </li>
                            <!-- END INBOX DROPDOWN -->
                            <!-- BEGIN NOTIFICATION DROPDOWN -->
                            <li class="dropdown" id="header_notification_bar">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                                    <i class="icon-bell-alt"></i>
                                    <span class="badge badge-warning">7</span>
                                </a>
                                <ul class="dropdown-menu extended notification">
                                    <li>
                                        <p>You have 7 new notifications</p>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="label label-important"><i class="icon-bolt"></i></span>
                                            Server #3 overloaded.
                                            <span class="small italic">34 mins</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="label label-warning"><i class="icon-bell"></i></span>
                                            Server #10 not respoding.
                                            <span class="small italic">1 Hours</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="label label-important"><i class="icon-bolt"></i></span>
                                            Database overloaded 24%.
                                            <span class="small italic">4 hrs</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="label label-success"><i class="icon-plus"></i></span>
                                            New user registered.
                                            <span class="small italic">Just now</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="label label-info"><i class="icon-bullhorn"></i></span>
                                            Application error.
                                            <span class="small italic">10 mins</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">See all notifications</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="top-nav ">
                        <ul class="nav pull-right top-menu" >
                            <!-- BEGIN SUPPORT -->
                            <li class="dropdown mtop5">

                                <a class="dropdown-toggle element" data-placement="bottom" data-toggle="tooltip" href="#" data-original-title="Chat">
                                    <i class="icon-comments-alt"></i>
                                </a>
                            </li>
                            <li class="dropdown mtop5">
                                <a class="dropdown-toggle element" data-placement="bottom" data-toggle="tooltip" href="#" data-original-title="Help">
                                    <i class="icon-headphones"></i>
                                </a>
                            </li>
                            <!-- END SUPPORT -->
                            <!-- BEGIN USER LOGIN DROPDOWN -->
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <?php if ($this->session->userdata('admin_id') != '') { ?>
                                    <img src="<?php echo base_url() ?>/assets/admin/img/avatar1_small.jpg" alt="">
                                        <span class="username"><?php echo $this->session->userdata('admin_name');?></span>
                                    <b class="caret"></b>
                                     <?php }?>   
                                </a>
                                <ul class="dropdown-menu extended logout">
                                    <li><a href="<?php echo base_url(); ?>change_admin_password"><i class="icon-user"></i>Change Password</a></li>
                                    <li><a href="<?php echo base_url(); ?>edit_admin_profile"><i class="icon-cog"></i>Edit Profile</a></li>
                                    <li><a href="<?php echo base_url(); ?>logout"><i class="icon-key"></i>Log Out</a></li>
                                </ul>
                            </li>
                            <!-- END USER LOGIN DROPDOWN -->
                        </ul>
                        <!-- END TOP NAVIGATION MENU -->
                    </div>
                </div>
            </div>
            <!-- END TOP NAVIGATION BAR -->
        </div>
        <!-- END HEADER -->
        <!-- BEGIN CONTAINER -->
        <div id="container" class="row-fluid">
            <!-- BEGIN SIDEBAR -->
            <?php $this->load->view('includes/admin_sidebar'); ?>
            <!-- END SIDEBAR -->
            <!-- BEGIN PAGE -->  
            <div id="main-content">
                <!-- BEGIN PAGE CONTAINER-->
                <div class="container-fluid">
                    <!-- BEGIN PAGE HEADER-->   
                    <div class="row-fluid">
                        <div class="span12">
                            <!-- BEGIN THEME CUSTOMIZER-->
                            <div id="theme-change" class="hidden-phone">
                                <i class="icon-cogs"></i>
                                <span class="settings">
                                    <span class="text">Theme Color:</span>
                                    <span class="colors">
                                        <span class="color-default" data-style="default"></span>
                                        <span class="color-green" data-style="green"></span>
                                        <span class="color-gray" data-style="gray"></span>
                                        <span class="color-purple" data-style="purple"></span>
                                        <span class="color-red" data-style="red"></span>
                                    </span>
                                </span>
                            </div>
                            <!-- END THEME CUSTOMIZER-->
                            <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                            <h3 class="page-title">
                                <?php echo $title;?>
                            </h3>
                            <ul class="breadcrumb">
                                <li>
                                    <a href="#">Home</a>
                                    <span class="divider">/</span>
                                </li>
                                <li>
                                    <a href="#">Metro Lab</a>
                                    <span class="divider">/</span>
                                </li>
                                <li class="active">
                                    Dashboard
                                </li>
                                <li class="pull-right search-wrap">
                                    <form action="search_result.html" class="hidden-phone">
                                        <div class="input-append search-input-area">
                                            <input class="" id="appendedInputButton" type="text">
                                            <button class="btn" type="button"><i class="icon-search"></i> </button>
                                        </div>
                                    </form>
                                </li>
                            </ul>
                            <!-- END PAGE TITLE & BREADCRUMB-->
                        </div>
                    </div>
                    <!-- END PAGE HEADER-->
