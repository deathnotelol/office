<head>
    <meta charset="utf-8">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title> Office Management System </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('public/images/favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('public/vendor/owl-carousel/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/vendor/owl-carousel/css/owl.theme.default.min.css') }}">
    <link href="{{ asset('public/vendor/jqvmap/css/jqvmap.min.css') }}" rel="stylesheet">

    <!-- Daterange picker -->
    <link href="{{ asset('public/vendor/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">
    <!-- Clockpicker -->
    <link href="{{ asset('public/vendor/clockpicker/css/bootstrap-clockpicker.min.css') }}" rel="stylesheet">
    <!-- asColorpicker -->
    <link href="{{ asset('public/vendor/jquery-asColorPicker/css/asColorPicker.min.css') }}" rel="stylesheet">
    <!-- Material color picker -->
    <link
        href="{{ asset('public/vendor/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css') }}"
        rel="stylesheet">
    <!-- Pick date -->
    <link rel="stylesheet" href="{{ asset('public/vendor/pickadate/themes/default.css') }}">
    <link rel="stylesheet" href="{{ asset('public/vendor/pickadate/themes/default.date.css') }}">
    <!-- Custom Stylesheet -->

    <link href="{{ asset('public/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('public/vendor/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">


    
    <!-- Bootstrap Bundle with Popper -->
    {{-- <script src="{{ asset('public/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script> --}}
    <script src="{{ asset('public/js/jquery-3.6.0.min.js') }}"></script>

    <link href="{{ asset('public/css/custom.css') }}" rel="stylesheet">

    {{-- elfinder  --}}

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <style>
        .notification_dropdown .dropdown-menu-right .media p {
            white-space: normal;
            /* Allow the text to wrap onto multiple lines */
            overflow: visible;
            /* Ensure the overflow is visible */
            word-wrap: break-word;
            /* Break long words to avoid overflow */
            margin-bottom: 0;
            /* margin-top: 5px; */
            width: 400px;
        }
    </style>


</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <!-- <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div> -->
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="{{ route('pages.dashboard') }}" class="brand-logo">
                <img class="logo-abbr" src="{{ asset('public/images/logo.png') }}" alt="">
                <img class="logo-compact" src="{{ asset('public/images/logos/logo.png') }}" alt="">
                <img class="brand-title" src="{{ asset('public/images/logos/logo.png') }}" alt="">
            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">

                        <div class="header-left">
                            <div class="search_bar dropdown">
                                <span class="search_icon p-3 c-pointer">
                                    <i class="mdi mdi-magnify"></i>
                                </span>
                                <div>
                                    <input id="searchInput" class="form-control" type="text" placeholder="Search...">
                                </div>
                            </div>
                        </div>


                        <ul class="navbar-nav header-right">
                            {{-- 
                            <li class="nav-item dropdown notification_dropdown">
                                <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                    <i class="mdi mdi-bell"></i>
                                    <div class="pulse-css"></div>
                                    <span
                                        class="badge badge-danger">{{ Auth::user()->unreadNotifications->count() }}</span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <ul class="list-unstyled">
                                        @foreach (Auth::user()->unreadNotifications as $notification)
                                            <li class="media dropdown-item">
                                                <span class="success"><i class="ti-email"></i></span>
                                                <div class="media-body">
                                                    <a
                                                        href="{{ isset($notification->data['url']) ? $notification->data['url'] : '#' }}">
                                                        <p><strong>{{ $notification->data['message'] ?? 'No message' }}</strong></p>
                                                    </a>
                                                </div>
                                                <span
                                                    class="notify-time">{{ $notification->data['time'] ?? 'N/A' }}</span>
                                            </li>
                                        @endforeach
                                    </ul>
                                    <a class="all-notification" href="{{ route('markNotificationsAsRead') }}">
                                        Mark all as read <i class="ti-arrow-right"></i>
                                    </a>
                                </div>
                            </li> --}}

                            <li class="nav-item dropdown notification_dropdown">
                                <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                    <i class="mdi mdi-bell"></i>
                                    <div class="pulse-css"></div>
                                    <span class="badge badge-danger" id="notification-count">
                                        {{ Auth::user()->unreadNotifications->count() }}
                                    </span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <ul class="list-unstyled" id="notification-list">
                                        @foreach (Auth::user()->unreadNotifications as $notification)
                                            <li class="media dropdown-item" id="notification-{{ $notification->id }}">
                                                <span class="success"><i class="ti-user"></i></span>
                                                <div class="media-body">
                                                    <a href="{{ $notification->data['url'] ?? '#' }}"
                                                        onclick="markNotificationAsRead(event, '{{ $notification->id }}')">
                                                        <p><strong>{{ $notification->data['message'] ?? 'No message' }}</strong>
                                                        </p>
                                                    </a>
                                                </div>
                                                <span
                                                    class="notify-time">{{ $notification->data['time'] ?? 'N/A' }}</span>
                                            </li>
                                        @endforeach
                                    </ul>

                                    <a class="all-notification" href="#"
                                        onclick="markAllNotificationsAsRead(event)">
                                        Mark all as read <i class="ti-arrow-right"></i>
                                    </a>
                                </div>
                            </li>



                            <li class="nav-item dropdown header-profile">
                                <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                    <span class="text-primary font-weight-bold">{{ Auth::user()->name }}</span>
                                </a>
                                {{-- @auth
                                    <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                        <span class="text-primary font-weight-bold">{{ Auth::user()->name }}</span>
                                    </a>
                                @else
                                    <script>
                                        window.location.href = "{{ url('/login') }}";
                                    </script>
                                @endauth --}}

                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="./app-profile.html" class="dropdown-item">
                                        <i class="icon-user"></i>
                                        <span class="ml-2">Profile </span>
                                    </a>
                                    <a href="./email-inbox.html" class="dropdown-item">
                                        <i class="icon-envelope-open"></i>
                                        <span class="ml-2">Inbox </span>
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                    <a href="#"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                        class="dropdown-item">
                                        <i class="icon-key"></i>
                                        <span class="ml-2">Logout </span>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>

        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <script>
            function markNotificationAsRead(event, notificationId) {
                // event.preventDefault(); // Prevent page reload

                fetch(`/office/notification/${notificationId}/read`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        }
                    })
                    .then(response => response.text()) // Read response as text instead of JSON
                    .then(data => {
                        console.log("Raw response:", data); // Log response for debugging
                        try {
                            let jsonData = JSON.parse(data); // Attempt to parse JSON
                            if (jsonData.success) {
                                document.getElementById(`notification-${notificationId}`).remove();
                                let countElement = document.getElementById('notification-count');
                                let count = parseInt(countElement.innerText) || 0;
                                countElement.innerText = count > 1 ? count - 1 : '';
                                if (count - 1 <= 0) countElement.style.display = 'none';
                            } else {
                                console.error("Notification error:", jsonData.error);
                            }
                        } catch (error) {
                            console.error("JSON Parse Error:", error);
                        }
                    })
                    .catch(error => console.error('Fetch Error:', error));
            }

            function markAllNotificationsAsRead(event) {
                event.preventDefault(); // Prevent link action

                fetch('/office/notifications/read-all', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            // Remove all notifications from the UI
                            document.getElementById('notification-list').innerHTML = '';

                            // Hide the unread count badge
                            let countElement = document.getElementById('notification-count');
                            countElement.style.display = 'none';
                        }
                    })
                    .catch(error => console.error('Error:', error));
            }
        </script>
