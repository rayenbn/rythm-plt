<div class="side-content-wrap">
    <div class="sidebar-left open rtl-ps-none" data-perfect-scrollbar="" data-suppress-scroll-x="true">
        <ul class="navigation-left">
            <li class="nav-item">
            <a class="nav-item-hold" href="/">
            <i class="nav-icon i-Bar-Chart"></i><span class="nav-text">Home</span></a>
                <div class="triangle"></div>
            </li>
            <li class="nav-item"><a class="nav-item-hold" href="{{ route('client.startup.index') }}"><i class="nav-icon i-Library"></i>
            <span class="nav-text">Startups</span></a>
                <div class="triangle"></div>
            </li>
            <!-- <li class="nav-item" data-item="extrakits"><a class="nav-item-hold" href="#"><i class="nav-icon i-Suitcase"></i><span class="nav-text">Jobs</span></a>
                <div class="triangle"></div>
            </li> -->
            <li class="nav-item" data-item="education"><a class="nav-item-hold" href="#"><i class="nav-icon i-Computer-Secure"></i><span class="nav-text">Education</span></a>
                <div class="triangle"></div>
            </li>
            <!-- <li class="nav-item" data-item="charts"><a class="nav-item-hold" href="#"><i class="nav-icon i-File-Clipboard-File--Text"></i><span class="nav-text">Mentors</span></a>
                <div class="triangle"></div>
            </li> -->
            <!-- <li class="nav-item" data-item="sessions"><a class="nav-item-hold" href="#"><i class="nav-icon i-Administrator"></i><span class="nav-text">Freelancers</span></a>
                <div class="triangle"></div>
            </li> -->
            <!-- <li class="nav-item active" data-item="others"><a class="nav-item-hold" href="#"><i class="nav-icon i-Double-Tap"></i><span class="nav-text">Others</span></a>
                <div class="triangle"></div>
            </li> -->
            <!-- <li class="nav-item"><a class="nav-item-hold" href="http://demos.ui-lib.com/gull-html-doc/" target="_blank"><i class="nav-icon i-Safe-Box1"></i><span class="nav-text">Doc</span></a>
                <div class="triangle"></div>
            </li> -->
        </ul>
    </div>
    <div class="sidebar-left-secondary rtl-ps-none" data-perfect-scrollbar="" data-suppress-scroll-x="true">
        <!-- Submenu Dashboards-->
        <!-- <ul class="childNav" data-parent="dashboard">
            <li class="nav-item"><a href="dashboard1.html"><i class="nav-icon i-Clock-3"></i><span class="item-name">Version 1</span></a></li>
            <li class="nav-item"><a href="dashboard2.html"><i class="nav-icon i-Clock-4"></i><span class="item-name">Version 2</span></a></li>
            <li class="nav-item"><a href="dashboard3.html"><i class="nav-icon i-Over-Time"></i><span class="item-name">Version 3</span></a></li>
            <li class="nav-item"><a href="dashboard4.html"><i class="nav-icon i-Clock"></i><span class="item-name">Version 4</span></a></li>
        </ul> -->
        <!-- <ul class="childNav" data-parent="forms">
            <li class="nav-item"><a href="form.basic.html"><i class="nav-icon i-File-Clipboard-Text--Image"></i><span class="item-name">Basic Elements</span></a></li>
            <li class="nav-item"><a href="form.layouts.html"><i class="nav-icon i-Split-Vertical"></i><span class="item-name">Form Layouts</span></a></li>
            <li class="nav-item"><a href="form.input.group.html"><i class="nav-icon i-Receipt-4"></i><span class="item-name">Input Groups</span></a></li>
            <li class="nav-item"><a href="form.validation.html"><i class="nav-icon i-Close-Window"></i><span class="item-name">Form Validation</span></a></li>
            <li class="nav-item"><a href="smart.wizard.html"><i class="nav-icon i-Width-Window"></i><span class="item-name">Smart Wizard</span></a></li>
            <li class="nav-item"><a href="tag.input.html"><i class="nav-icon i-Tag-2"></i><span class="item-name">Tag Input</span></a></li>
            <li class="nav-item"><a href="editor.html"><i class="nav-icon i-Pen-2"></i><span class="item-name">Rich Editor</span></a></li>
        </ul> -->
        <ul class="childNav" data-parent="education">
            <li class="nav-item"><a href="{{ route('client.universities.index') }}"><i class="nav-icon i-Add-File"></i><span class="item-name">Universities</span></a></li>
            <li class="nav-item"><a href="{{ route('client.scholarships.index') }}"><i class="nav-icon i-Email"></i><span class="item-name">Scholarships</span></a></li>
            <li class="nav-item"><a href="chat.html"><i class="nav-icon i-Speach-Bubble-3"></i><span class="item-name">Chat</span></a></li>
        </ul>
        <!-- <ul class="childNav" data-parent="widgets">
            <li class="nav-item"><a href="widget-card.html"><i class="nav-icon i-Receipt-4"></i><span class="item-name">widget card</span></a></li>
            <li class="nav-item"><a href="widget-statistics.html"><i class="nav-icon i-Receipt-4"></i><span class="item-name">widget statistics</span></a></li>
            <li class="nav-item"><a href="widget-list.html"><i class="nav-icon i-Receipt-4"></i><span class="item-name">Widget List <span class="ml-2 badge badge-pill badge-danger">New</span></span></a></li>
            <li class="nav-item"><a href="widget-app.html"><i class="nav-icon i-Receipt-4"></i><span class="item-name">Widget App <span class="ml-2 badge badge-pill badge-danger"> New</span></span></a></li>
            <li class="nav-item"><a href="weather-card.html"><i class="nav-icon i-Receipt-4"></i><span class="item-name">Weather App <span class="ml-2 badge badge-pill badge-danger"> New</span></span></a></li>
        </ul> -->
        <!-- chartjs-->
        <!-- <ul class="childNav" data-parent="charts">
            <li class="nav-item"><a href="charts.echarts.html"><i class="nav-icon i-File-Clipboard-Text--Image"></i><span class="item-name">echarts</span></a></li>
            <li class="nav-item"><a href="charts.chartsjs.html"><i class="nav-icon i-File-Clipboard-Text--Image"></i><span class="item-name">ChartJs</span></a></li>
            <li class="nav-item dropdown-sidemenu"><a href=""><i class="nav-icon i-File-Clipboard-Text--Image"></i><span class="item-name">Apex Charts</span><i class="dd-arrow i-Arrow-Down"></i></a>
                <ul class="submenu">
                    <li><a href="charts.apexAreaCharts.html">Area Charts</a></li>
                    <li><a href="charts.apexBarCharts.html">Bar Charts</a></li>
                    <li><a href="charts.apexBubbleCharts.html">Bubble Charts</a></li>
                    <li><a href="charts.apexColumnCharts.html">Column Charts</a></li>
                    <li><a href="charts.apexCandleStickCharts.html">CandleStick Charts</a></li>
                    <li><a href="charts.apexLineCharts.html">Line Charts</a></li>
                    <li><a href="charts.apexMixCharts.html">Mix Charts</a></li>
                    <li><a href="charts.apexPieDonutCharts.html">PieDonut Charts</a></li>
                    <li><a href="charts.apexRadarCharts.html">Radar Charts</a></li>
                    <li><a href="charts.apexRadialBarCharts.html">RadialBar Charts</a></li>
                    <li><a href="charts.apexScatterCharts.html">Scatter Charts</a></li>
                    <li><a href="charts.apexSparklineCharts.html">Sparkline Charts</a></li>
                </ul>
            </li>
        </ul> -->
        <!-- <ul class="childNav" data-parent="extrakits">
            <li class="nav-item"><a href="image.cropper.html"><i class="nav-icon i-Crop-2"></i><span class="item-name">Image Cropper</span></a></li>
            <li class="nav-item"><a href="loaders.html"><i class="nav-icon i-Loading-3"></i><span class="item-name">Loaders</span></a></li>
            <li class="nav-item"><a href="ladda.button.html"><i class="nav-icon i-Loading-2"></i><span class="item-name">Ladda Buttons</span></a></li>
            <li class="nav-item"><a href="toastr.html"><i class="nav-icon i-Bell"></i><span class="item-name">Toastr</span></a></li>
            <li class="nav-item"><a href="sweet.alerts.html"><i class="nav-icon i-Approved-Window"></i><span class="item-name">Sweet Alerts</span></a></li>
            <li class="nav-item"><a href="tour.html"><i class="nav-icon i-Plane"></i><span class="item-name">User Tour</span></a></li>
            <li class="nav-item"><a href="upload.html"><i class="nav-icon i-Data-Upload"></i><span class="item-name">Upload</span></a></li>
        </ul> -->
        <!-- <ul class="childNav" data-parent="startups">
            <li class="nav-item"><a href="alerts.html"><i class="nav-icon i-Bell1"></i><span class="item-name">Startup list</span></a></li>
            <li class="nav-item"><a href="accordion.html"><i class="nav-icon i-Split-Horizontal-2-Window"></i><span class="item-name">Accordion</span></a></li>
            <li class="nav-item"><a href="badges.html"><i class="nav-icon i-Medal-2"></i><span class="item-name">Badges</span></a></li>
            <li class="nav-item"><a href="buttons.html"><i class="nav-icon i-Cursor-Click"></i><span class="item-name">Buttons</span></a></li>
            <li class="nav-item"><a href="cards.html"><i class="nav-icon i-Line-Chart-2"></i><span class="item-name">Cards</span></a></li>
           
        </ul> -->
        <!-- <ul class="childNav" data-parent="sessions">
            <li class="nav-item"><a href="../sessions/signin.html"><i class="nav-icon i-Checked-User"></i><span class="item-name">Sign in</span></a></li>
            <li class="nav-item"><a href="../sessions/signup.html"><i class="nav-icon i-Add-User"></i><span class="item-name">Sign up</span></a></li>
            <li class="nav-item"><a href="../sessions/forgot.html"><i class="nav-icon i-Find-User"></i><span class="item-name">Forgot</span></a></li>
        </ul> -->
        <!-- <ul class="childNav" data-parent="others">
            <li class="nav-item"><a href="../sessions/not-found.html"><i class="nav-icon i-Error-404-Window"></i><span class="item-name">Not Found</span></a></li>
            <li class="nav-item"><a href="user.profile.html"><i class="nav-icon i-Male"></i><span class="item-name">User Profile</span></a></li>
            <li class="nav-item"><a class="open" href="blank.html"><i class="nav-icon i-File-Horizontal"></i><span class="item-name">Blank Page</span></a></li>
        </ul> -->
    </div>
    <div class="sidebar-overlay"></div>
</div>