@extends('superadmin.layouts.app')

@section('content')

<div class="app-sidebar-overlay d-none animated fadeIn"></div>
<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="header-mobile-wrapper">
            <div class="app-header__logo">
                <a href="#" data-toggle="tooltip" data-placement="bottom" title="KeroUI Admin Template"
                    class="logo-src"></a>
                <button type="button" class="hamburger hamburger--elastic mobile-toggle-sidebar-nav">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
                <div class="app-header__menu">
                    <span>
                        <button type="button"
                            class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                            <span class="btn-icon-wrapper">
                                <i class="fa fa-ellipsis-v fa-w-6"></i>
                            </span>
                        </button>
                    </span>
                </div>
            </div>
        </div>
        <div class="app-header">
            <div class="page-title-heading">
                Update News
                <div class="page-title-subheading">
                    Choose between regular React Bootstrap tables or advanced dynamic ones.
                </div>
            </div>
            <div class="app-header-right">
                <div class="search-wrapper">
                    <i class="search-icon-wrapper typcn typcn-zoom-outline"></i>
                    <input type="text" placeholder="Search...">
                </div>
                <div class="header-btn-lg pr-0">
                    <div class="header-dots">
                        <div class="dropdown">
                            <button type="button" aria-haspopup="true" aria-expanded="false"
                                data-toggle="dropdown" class="p-0 mr-2 btn btn-link">
                                <i class="typcn typcn-th-large-outline"></i>
                            </button>
                            <div tabindex="-1" role="menu" aria-hidden="true"
                                class="dropdown-menu-xl rm-pointers dropdown-menu dropdown-menu-right">
                                <div class="dropdown-menu-header">
                                    <div class="dropdown-menu-header-inner bg-vicious-stance">
                                        <div class="menu-header-image opacity-4"
                                            style="background-image: url('assets/images/dropdown-header/city5.jpg');">
                                        </div>
                                        <div class="menu-header-content text-white">
                                            <h5 class="menu-header-title">Grid Dashboard</h5>
                                            <h6 class="menu-header-subtitle">Easy grid navigation inside
                                                dropdowns</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="grid-menu grid-menu-xl grid-menu-3col">
                                    <div class="no-gutters row">
                                        <div class="col-sm-6 col-xl-4">
                                            <button
                                                class="btn-icon-vertical btn-square btn-transition btn btn-outline-link">
                                                <i
                                                    class="pe-7s-world icon-gradient bg-night-fade btn-icon-wrapper btn-icon-lg mb-3"></i>
                                                Automation
                                            </button>
                                        </div>
                                        <div class="col-sm-6 col-xl-4">
                                            <button
                                                class="btn-icon-vertical btn-square btn-transition btn btn-outline-link">
                                                <i
                                                    class="pe-7s-piggy icon-gradient bg-night-fade btn-icon-wrapper btn-icon-lg mb-3">
                                                </i>
                                                Reports
                                            </button>
                                        </div>
                                        <div class="col-sm-6 col-xl-4">
                                            <button
                                                class="btn-icon-vertical btn-square btn-transition btn btn-outline-link">
                                                <i
                                                    class="pe-7s-config icon-gradient bg-night-fade btn-icon-wrapper btn-icon-lg mb-3">
                                                </i>
                                                Settings
                                            </button>
                                        </div>
                                        <div class="col-sm-6 col-xl-4">
                                            <button
                                                class="btn-icon-vertical btn-square btn-transition btn btn-outline-link">
                                                <i
                                                    class="pe-7s-browser icon-gradient bg-night-fade btn-icon-wrapper btn-icon-lg mb-3">
                                                </i>
                                                Content
                                            </button>
                                        </div>
                                        <div class="col-sm-6 col-xl-4">
                                            <button
                                                class="btn-icon-vertical btn-square btn-transition btn btn-outline-link">
                                                <i
                                                    class="pe-7s-hourglass icon-gradient bg-night-fade btn-icon-wrapper btn-icon-lg mb-3">
                                                </i>
                                                Activity
                                            </button>
                                        </div>
                                        <div class="col-sm-6 col-xl-4">
                                            <button
                                                class="btn-icon-vertical btn-square btn-transition btn btn-outline-link">
                                                <i
                                                    class="pe-7s-world icon-gradient bg-night-fade btn-icon-wrapper btn-icon-lg mb-3">
                                                </i>
                                                Contacts
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <ul class="nav flex-column">
                                    <li class="nav-item-divider nav-item"></li>
                                    <li class="nav-item-btn text-center nav-item">
                                        <button
                                            class="btn-shadow btn btn-primary btn-sm">Follow-ups</button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="dropdown">
                            <button type="button" aria-haspopup="true" aria-expanded="false"
                                data-toggle="dropdown" class="p-0 btn btn-link">
                                <i class="typcn typcn-bell"></i>
                                <span class="badge badge-dot badge-dot-sm badge-danger">Notifications</span>
                            </button>
                            <div tabindex="-1" role="menu" aria-hidden="true"
                                class="dropdown-menu-xl rm-pointers dropdown-menu dropdown-menu-right">
                                <div class="dropdown-menu-header mb-0">
                                    <div class="dropdown-menu-header-inner bg-night-sky">
                                        <div class="menu-header-image opacity-5"
                                            style="background-image: url('assets/images/dropdown-header/city2.jpg');">
                                        </div>
                                        <div class="menu-header-content text-light">
                                            <h5 class="menu-header-title">Notifications</h5>
                                            <h6 class="menu-header-subtitle">You have <b>21</b> unread
                                                messages</h6>
                                        </div>
                                    </div>
                                </div>
                                <ul
                                    class="tabs-animated-shadow tabs-animated nav nav-justified tabs-shadow-bordered p-3">
                                    <li class="nav-item">
                                        <a role="tab" class="nav-link active" data-toggle="tab"
                                            href="#tab-messages-header">
                                            <span>Messages</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a role="tab" class="nav-link" data-toggle="tab"
                                            href="#tab-events-header">
                                            <span>Events</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a role="tab" class="nav-link" data-toggle="tab"
                                            href="#tab-errors-header">
                                            <span>System</span>
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab-messages-header" role="tabpanel">
                                        <div class="scroll-area-sm">
                                            <div class="scrollbar-container">
                                                <div class="p-3">
                                                    <div class="notifications-box">
                                                        <div
                                                            class="vertical-time-simple vertical-without-time vertical-timeline vertical-timeline--one-column">
                                                            <div
                                                                class="vertical-timeline-item dot-danger vertical-timeline-element">
                                                                <div><span
                                                                        class="vertical-timeline-element-icon bounce-in"></span>
                                                                    <div
                                                                        class="vertical-timeline-element-content bounce-in">
                                                                        <h4 class="timeline-title">All Hands
                                                                            Meeting</h4><span
                                                                            class="vertical-timeline-element-date"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="vertical-timeline-item dot-warning vertical-timeline-element">
                                                                <div><span
                                                                        class="vertical-timeline-element-icon bounce-in"></span>
                                                                    <div
                                                                        class="vertical-timeline-element-content bounce-in">
                                                                        <p>Yet another one, at <span
                                                                                class="text-success">15:00
                                                                                PM</span></p><span
                                                                            class="vertical-timeline-element-date"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="vertical-timeline-item dot-success vertical-timeline-element">
                                                                <div><span
                                                                        class="vertical-timeline-element-icon bounce-in"></span>
                                                                    <div
                                                                        class="vertical-timeline-element-content bounce-in">
                                                                        <h4 class="timeline-title">Build the
                                                                            production release
                                                                            <span
                                                                                class="badge badge-danger ml-2">NEW</span>
                                                                        </h4>
                                                                        <span
                                                                            class="vertical-timeline-element-date"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="vertical-timeline-item dot-primary vertical-timeline-element">
                                                                <div><span
                                                                        class="vertical-timeline-element-icon bounce-in"></span>
                                                                    <div
                                                                        class="vertical-timeline-element-content bounce-in">
                                                                        <h4 class="timeline-title">Something
                                                                            not important
                                                                            <div
                                                                                class="avatar-wrapper mt-2 avatar-wrapper-overlap">
                                                                                <div
                                                                                    class="avatar-icon-wrapper avatar-icon-sm">
                                                                                    <div
                                                                                        class="avatar-icon">
                                                                                        <img src="assets/images/avatars/1.jpg"
                                                                                            alt></div>
                                                                                </div>
                                                                                <div
                                                                                    class="avatar-icon-wrapper avatar-icon-sm">
                                                                                    <div
                                                                                        class="avatar-icon">
                                                                                        <img src="assets/images/avatars/2.jpg"
                                                                                            alt></div>
                                                                                </div>
                                                                                <div
                                                                                    class="avatar-icon-wrapper avatar-icon-sm">
                                                                                    <div
                                                                                        class="avatar-icon">
                                                                                        <img src="assets/images/avatars/3.jpg"
                                                                                            alt></div>
                                                                                </div>
                                                                                <div
                                                                                    class="avatar-icon-wrapper avatar-icon-sm">
                                                                                    <div
                                                                                        class="avatar-icon">
                                                                                        <img src="assets/images/avatars/4.jpg"
                                                                                            alt></div>
                                                                                </div>
                                                                                <div
                                                                                    class="avatar-icon-wrapper avatar-icon-sm">
                                                                                    <div
                                                                                        class="avatar-icon">
                                                                                        <img src="assets/images/avatars/5.jpg"
                                                                                            alt></div>
                                                                                </div>
                                                                                <div
                                                                                    class="avatar-icon-wrapper avatar-icon-sm">
                                                                                    <div
                                                                                        class="avatar-icon">
                                                                                        <img src="assets/images/avatars/9.jpg"
                                                                                            alt></div>
                                                                                </div>
                                                                                <div
                                                                                    class="avatar-icon-wrapper avatar-icon-sm">
                                                                                    <div
                                                                                        class="avatar-icon">
                                                                                        <img src="assets/images/avatars/7.jpg"
                                                                                            alt></div>
                                                                                </div>
                                                                                <div
                                                                                    class="avatar-icon-wrapper avatar-icon-sm">
                                                                                    <div
                                                                                        class="avatar-icon">
                                                                                        <img src="assets/images/avatars/8.jpg"
                                                                                            alt></div>
                                                                                </div>
                                                                                <div
                                                                                    class="avatar-icon-wrapper avatar-icon-sm avatar-icon-add">
                                                                                    <div
                                                                                        class="avatar-icon">
                                                                                        <i>+</i></div>
                                                                                </div>
                                                                            </div>
                                                                        </h4>
                                                                        <span
                                                                            class="vertical-timeline-element-date"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="vertical-timeline-item dot-info vertical-timeline-element">
                                                                <div><span
                                                                        class="vertical-timeline-element-icon bounce-in"></span>
                                                                    <div
                                                                        class="vertical-timeline-element-content bounce-in">
                                                                        <h4 class="timeline-title">This dot
                                                                            has an info state</h4><span
                                                                            class="vertical-timeline-element-date"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="vertical-timeline-item dot-danger vertical-timeline-element">
                                                                <div><span
                                                                        class="vertical-timeline-element-icon bounce-in"></span>
                                                                    <div
                                                                        class="vertical-timeline-element-content bounce-in">
                                                                        <h4 class="timeline-title">All Hands
                                                                            Meeting</h4><span
                                                                            class="vertical-timeline-element-date"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="vertical-timeline-item dot-warning vertical-timeline-element">
                                                                <div><span
                                                                        class="vertical-timeline-element-icon bounce-in"></span>
                                                                    <div
                                                                        class="vertical-timeline-element-content bounce-in">
                                                                        <p>Yet another one, at <span
                                                                                class="text-success">15:00
                                                                                PM</span></p><span
                                                                            class="vertical-timeline-element-date"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="vertical-timeline-item dot-success vertical-timeline-element">
                                                                <div><span
                                                                        class="vertical-timeline-element-icon bounce-in"></span>
                                                                    <div
                                                                        class="vertical-timeline-element-content bounce-in">
                                                                        <h4 class="timeline-title">Build the
                                                                            production release
                                                                            <span
                                                                                class="badge badge-danger ml-2">NEW</span>
                                                                        </h4>
                                                                        <span
                                                                            class="vertical-timeline-element-date"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="vertical-timeline-item dot-dark vertical-timeline-element">
                                                                <div><span
                                                                        class="vertical-timeline-element-icon bounce-in"></span>
                                                                    <div
                                                                        class="vertical-timeline-element-content bounce-in">
                                                                        <h4 class="timeline-title">This dot
                                                                            has a dark state</h4><span
                                                                            class="vertical-timeline-element-date"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab-events-header" role="tabpanel">
                                        <div class="scroll-area-sm">
                                            <div class="scrollbar-container">
                                                <div class="p-3">
                                                    <div
                                                        class="vertical-without-time vertical-timeline vertical-timeline--animate vertical-timeline--one-column">
                                                        <div
                                                            class="vertical-timeline-item vertical-timeline-element">
                                                            <div><span
                                                                    class="vertical-timeline-element-icon bounce-in"><i
                                                                        class="badge badge-dot badge-dot-xl badge-success">
                                                                    </i></span>
                                                                <div
                                                                    class="vertical-timeline-element-content bounce-in">
                                                                    <h4 class="timeline-title">All Hands
                                                                        Meeting</h4>
                                                                    <p>Lorem ipsum dolor sic amet, today at
                                                                        <a href="javascript:void(0);">12:00
                                                                            PM</a></p><span
                                                                        class="vertical-timeline-element-date"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="vertical-timeline-item vertical-timeline-element">
                                                            <div><span
                                                                    class="vertical-timeline-element-icon bounce-in"><i
                                                                        class="badge badge-dot badge-dot-xl badge-warning">
                                                                    </i></span>
                                                                <div
                                                                    class="vertical-timeline-element-content bounce-in">
                                                                    <p>Another meeting today, at <b
                                                                            class="text-danger">12:00 PM</b>
                                                                    </p>
                                                                    <p>Yet another one, at <span
                                                                            class="text-success">15:00
                                                                            PM</span></p><span
                                                                        class="vertical-timeline-element-date"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="vertical-timeline-item vertical-timeline-element">
                                                            <div><span
                                                                    class="vertical-timeline-element-icon bounce-in"><i
                                                                        class="badge badge-dot badge-dot-xl badge-danger">
                                                                    </i></span>
                                                                <div
                                                                    class="vertical-timeline-element-content bounce-in">
                                                                    <h4 class="timeline-title">Build the
                                                                        production release</h4>
                                                                    <p>Lorem ipsum dolor sit
                                                                        amit,consectetur eiusmdd tempor
                                                                        incididunt ut labore et dolore magna
                                                                        elit enim at minim veniam quis
                                                                        nostrud</p><span
                                                                        class="vertical-timeline-element-date"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="vertical-timeline-item vertical-timeline-element">
                                                            <div><span
                                                                    class="vertical-timeline-element-icon bounce-in"><i
                                                                        class="badge badge-dot badge-dot-xl badge-primary">
                                                                    </i></span>
                                                                <div
                                                                    class="vertical-timeline-element-content bounce-in">
                                                                    <h4 class="timeline-title text-success">
                                                                        Something not important</h4>
                                                                    <p>Lorem ipsum dolor sit
                                                                        amit,consectetur elit enim at minim
                                                                        veniam quis nostrud</p><span
                                                                        class="vertical-timeline-element-date"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="vertical-timeline-item vertical-timeline-element">
                                                            <div><span
                                                                    class="vertical-timeline-element-icon bounce-in"><i
                                                                        class="badge badge-dot badge-dot-xl badge-success">
                                                                    </i></span>
                                                                <div
                                                                    class="vertical-timeline-element-content bounce-in">
                                                                    <h4 class="timeline-title">All Hands
                                                                        Meeting</h4>
                                                                    <p>Lorem ipsum dolor sic amet, today at
                                                                        <a href="javascript:void(0);">12:00
                                                                            PM</a></p><span
                                                                        class="vertical-timeline-element-date"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="vertical-timeline-item vertical-timeline-element">
                                                            <div><span
                                                                    class="vertical-timeline-element-icon bounce-in"><i
                                                                        class="badge badge-dot badge-dot-xl badge-warning">
                                                                    </i></span>
                                                                <div
                                                                    class="vertical-timeline-element-content bounce-in">
                                                                    <p>Another meeting today, at <b
                                                                            class="text-danger">12:00 PM</b>
                                                                    </p>
                                                                    <p>Yet another one, at <span
                                                                            class="text-success">15:00
                                                                            PM</span></p><span
                                                                        class="vertical-timeline-element-date"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="vertical-timeline-item vertical-timeline-element">
                                                            <div><span
                                                                    class="vertical-timeline-element-icon bounce-in"><i
                                                                        class="badge badge-dot badge-dot-xl badge-danger">
                                                                    </i></span>
                                                                <div
                                                                    class="vertical-timeline-element-content bounce-in">
                                                                    <h4 class="timeline-title">Build the
                                                                        production release</h4>
                                                                    <p>Lorem ipsum dolor sit
                                                                        amit,consectetur eiusmdd tempor
                                                                        incididunt ut labore et dolore magna
                                                                        elit enim at minim veniam quis
                                                                        nostrud</p><span
                                                                        class="vertical-timeline-element-date"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="vertical-timeline-item vertical-timeline-element">
                                                            <div><span
                                                                    class="vertical-timeline-element-icon bounce-in"><i
                                                                        class="badge badge-dot badge-dot-xl badge-primary">
                                                                    </i></span>
                                                                <div
                                                                    class="vertical-timeline-element-content bounce-in">
                                                                    <h4 class="timeline-title text-success">
                                                                        Something not important</h4>
                                                                    <p>Lorem ipsum dolor sit
                                                                        amit,consectetur elit enim at minim
                                                                        veniam quis nostrud</p><span
                                                                        class="vertical-timeline-element-date"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab-errors-header" role="tabpanel">
                                        <div class="scroll-area-sm">
                                            <div class="scrollbar-container">
                                                <div class="no-results pt-3 pb-0">
                                                    <div
                                                        class="swal2-icon swal2-success swal2-animate-success-icon">
                                                        <div class="swal2-success-circular-line-left"
                                                            style="background-color: rgb(255, 255, 255);">
                                                        </div>
                                                        <span class="swal2-success-line-tip"></span>
                                                        <span class="swal2-success-line-long"></span>
                                                        <div class="swal2-success-ring"></div>
                                                        <div class="swal2-success-fix"
                                                            style="background-color: rgb(255, 255, 255);">
                                                        </div>
                                                        <div class="swal2-success-circular-line-right"
                                                            style="background-color: rgb(255, 255, 255);">
                                                        </div>
                                                    </div>
                                                    <div class="results-subtitle">All caught up!</div>
                                                    <div class="results-title">There are no system errors!
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <ul class="nav flex-column">
                                    <li class="nav-item-divider nav-item"></li>
                                    <li class="nav-item-btn text-center nav-item">
                                        <button
                                            class="btn-shadow btn-wide btn-pill btn btn-focus btn-sm">View
                                            Latest Changes</button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="header-btn-lg pr-0">
                    <div class="widget-content p-0">
                        <div class="widget-content-wrapper">
                            <div class="widget-content-left">
                                <div class="btn-group">
                                    <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                        class="p-0 btn">
                                        <img width="42" class="rounded" src="assets/images/avatars/3.jpg"
                                            alt>
                                        <i class="fa fa-angle-down ml-2 opacity-8"></i>
                                    </a>
                                    <div tabindex="-1" role="menu" aria-hidden="true"
                                        class="rm-pointers dropdown-menu-lg dropdown-menu dropdown-menu-right">
                                        <div class="dropdown-menu-header">
                                            <div class="dropdown-menu-header-inner bg-info">
                                                <div class="menu-header-image opacity-2"
                                                    style="background-image: url('assets/images/dropdown-header/city1.jpg');">
                                                </div>
                                                <div class="menu-header-content text-left">
                                                    <div class="widget-content p-0">
                                                        <div class="widget-content-wrapper">
                                                            <div class="widget-content-left mr-3">
                                                                <img width="42" class="rounded-circle"
                                                                    src="assets/images/avatars/3.jpg" alt>
                                                            </div>
                                                            <div class="widget-content-left">
                                                                <div class="widget-heading">Minnie Betts
                                                                </div>
                                                                <div class="widget-subheading opacity-8">A
                                                                    short profile description
                                                                </div>
                                                            </div>
                                                            <div class="widget-content-right mr-2">
                                                                <button
                                                                    class="btn-pill btn-shadow btn-shine btn btn-focus">Logout
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="scroll-area-xs" style="height: 150px;">
                                            <div class="scrollbar-container ps">
                                                <ul class="nav flex-column">
                                                    <li class="nav-item-header nav-item">Activity
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="javascript:void(0);" class="nav-link">Chat
                                                            <div
                                                                class="ml-auto badge badge-pill badge-info">
                                                                8
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="javascript:void(0);"
                                                            class="nav-link">Recover Password
                                                        </a>
                                                    </li>
                                                    <li class="nav-item-header nav-item">My Account
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="javascript:void(0);"
                                                            class="nav-link">Settings
                                                            <div class="ml-auto badge badge-success">New
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="javascript:void(0);"
                                                            class="nav-link">Messages
                                                            <div class="ml-auto badge badge-warning">512
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="javascript:void(0);" class="nav-link">Logs
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <ul class="nav flex-column">
                                            <li class="nav-item-divider mb-0 nav-item"></li>
                                        </ul>
                                        <div class="grid-menu grid-menu-2col">
                                            <div class="no-gutters row">
                                                <div class="col-sm-6">
                                                    <button
                                                        class="btn-icon-vertical btn-transition btn-transition-alt pt-2 pb-2 btn btn-outline-warning">
                                                        <i
                                                            class="pe-7s-chat icon-gradient bg-amy-crisp btn-icon-wrapper mb-2"></i>
                                                        Message Inbox
                                                    </button>
                                                </div>
                                                <div class="col-sm-6">
                                                    <button
                                                        class="btn-icon-vertical btn-transition btn-transition-alt pt-2 pb-2 btn btn-outline-danger">
                                                        <i
                                                            class="pe-7s-ticket icon-gradient bg-love-kiss btn-icon-wrapper mb-2"></i>
                                                        <b>Support Tickets</b>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <ul class="nav flex-column">
                                            <li class="nav-item-divider nav-item">
                                            </li>
                                            <li class="nav-item-btn text-center nav-item">
                                                <button class="btn-wide btn btn-primary btn-sm">
                                                    Open Messages
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="app-header-overlay d-none animated fadeIn"></div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title">Update News</h5>


                        <form action="{{ route('edit_newsPost', $news->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="position-relative form-group">
                                <label for="" class>Title (in English)</label>
                                <input name="title_eng" id="eng_title" type="text" class="form-control" value="{{ $news->title_eng }}" onkeyup="check()">
                                <input id="news_id" type="hidden" value="{{ $news->id }}" onkeyup="check()">
                            </div>
                            <p id="warn"></p>
                            <div class="position-relative form-group">
                                <label for="" class>Title (in Bengali)</label>
                                <input name="title_ban" type="text" class="form-control" value="{{ $news->title_ban }}">
                            </div>
                            <div class="position-relative form-group">
                                <label for="" class>Description (in English)</label>
                                <textarea id="productTextarea" name="description_eng" value="{{ $news->id }}">{{ $news->description_eng }}</textarea>
                            </div>
                            <div class="position-relative form-group">
                                <label for="" class>Description (in Bengali)</label>
                                <textarea id="productTextarea" name="description_ban" value="{{ $news->id }}">{{ $news->description_ban }}</textarea>
                            </div>

                            @if($news->banner)
                              <img src="{{ asset('news_banners/'.$news->banner) }}" alt="banner" width="250px" height="150px">
                            @endif
                            <div class="mt-2 position-relative form-group">
                                <label for="exampleFile" class>Upload Banner</label>
                                <input name="banner" id="exampleFile" type="file" class="form-control-file">
                            </div>

                            <div class="position-relative form-group">
                                <label for="birthday" class>Date:</label>
                                <input type="date" id="date" name="news_date" class="form-control" value="{{ $news->date }}">
                            </div>
                            <div class="position-relative form-group">
                                <label for="w3review">Video link</label>
                                <textarea id="w3review" name="video_link" class="form-control" rows="4" cols="50" value="{{ $news->id }}">{{ $news->video_link }}</textarea>
                            </div>
                            <div class="position-relative form-group">
                                <label for="w3review">Video live</label>
                                <textarea id="w3review" name="live_video" class="form-control" rows="4" cols="50" value="{{ $news->id }}">{{ $news->video_live }}</textarea>
                            </div>
                            <div class="position-relative form-group">
                                <label for="w3review"><strong>Do you want to add this latest news?</strong></label><br>
                                <input type="radio" id="yes" name="latest" value="yes" {{ $news->latest_news == "yes" ? 'checked' : ''}}>
                                <label for="yes">Yes</label>
                                <input type="radio" id="no" name="latest" value="no" {{ $news->latest_news == "no" ? 'checked' : ''}}>
                                <label for="no">No</label>
                            </div>
                            <div class="position-relative form-group">
                                <label for="w3review"><strong>Time Duration</strong></label><br>
                                <input type="datetime-local" id="duration" class="form-control" name="duration" value="{{ $news->time_duration }}">
                            </div>
                            <div class="position-relative form-group">
                                <label for="division">Select News-Category</label>
                                <select name="news_category" class="form-control" id="country">
                                    @foreach ($category as $category)
                                        <option class="form-control" value="{{ $category->id }}">{{ $category->cate_title_eng }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="position-relative form-group">
                                <label for="division">Select SubCategory</label>
                                <select name="subCategory" class="form-control" id="country">
                                    @foreach ($subcategory as $subcategory)
                                        <option class="form-control" value="{{ $subcategory->id }}">{{ $subcategory->cate_title_eng }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="position-relative form-group">
                                <label for="division">Select Child-SubCategory</label>
                                <select name="childSubCategory" class="form-control" id="country">
                                    @foreach ($childSubCate as $childSubCate)
                                        <option class="form-control" value="{{ $childSubCate->id }}">{{ $childSubCate->cate_title_eng }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="position-relative form-group">
                                <label for="division">Select Country</label>
                                <select name="country" class="form-control" id="country">
                                    @foreach ($country as $country)
                                        <option class="form-control" value="{{ $country->id }}">{{ $country->country_name_eng }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="position-relative form-group">
                                <label for="division">Select Division</label>
                                <select name="division" class="form-control" id="country">
                                    @foreach ($division as $division)
                                        <option class="form-control" value="{{ $division->id }}">{{ $division->division_name_eng }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="position-relative form-group">
                                <label for="district">Select District</label>
                                <select name="district" class="form-control" id="country">
                                    @foreach ($district as $district)
                                        <option class="form-control" value="{{ $district->id }}">{{ $district->district_name_eng }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="position-relative form-group">
                                <label for="division">Select City/Union/Village</label>
                                <select name="city" class="form-control" id="country">
                                    @foreach ($city as $city)
                                        <option class="form-control" value="{{ $city->id }}">{{ $city->city_union_villages_name_eng }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="country">Status</label>
                                <select name="status" class="form-control" id="country">
                                <option class="form-control" value="active" <?php if($news->status == 'active') echo ' selected="selected"'; ?>>Active</option>
                                <option class="form-control" value="deactive" <?php if($news->status == 'deactive') echo ' selected="selected"'; ?>>De-active</option>
                                </select>
                            </div>
                            <div id="null_btn">
                              <button class="mt-1 btn btn-primary" type="submit">update</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>



    </div>
</div>



<script type="text/javascript">
    tinymce.init({
      selector: '#productTextarea',
      width: 900,
      height: 500,
      plugins: [
        'advlist', 'autolink', 'link', 'image', 'lists', 'charmap', 'preview', 'anchor', 'pagebreak',
        'searchreplace', 'wordcount', 'visualblocks', 'visualchars', 'code', 'fullscreen', 'insertdatetime',
        'media', 'table', 'emoticons', 'template', 'help'
      ],
      toolbar: 'undo redo | styles | bold italic | alignleft aligncenter alignright alignjustify | ' +
        'bullist numlist outdent indent | link image | print preview media fullscreen | ' +
        'forecolor backcolor emoticons | help',
      menu: {
        favs: { title: 'My Favorites', items: 'code visualaid | searchreplace | emoticons' }
      },
      menubar: 'favs file edit view insert format tools table help',
      content_css: 'css/content.css'
    });
  </script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

    <script>
      function check(){
           //alert(title.value);
           let id = document.getElementById("news_id").value;
           let slug_title = document.getElementById("eng_title").value;
           //alert(slug_title);
           $.get('slug_check/' + id +'-'+ slug_title, function (data) {
             if(data.data2 == 1){
               // alert(data.data2);
                var content = "";
                var content1 = "<span class='text text-danger'>Title already taken for another news</span>";
                // Insert using this:
                document.getElementById('null_btn').innerHTML = content;
                document.getElementById('warn').innerHTML = content1;
             }
             else {
               // alert(data.data2);
               var content = "<button class='mt-1 btn btn-primary' type='submit'>update</button>";
               var content1 = "";
               // Insert using this:
               document.getElementById('null_btn').innerHTML = content;
               document.getElementById('warn').innerHTML = content1;
             }
            })
        }
    </script>

@endsection
