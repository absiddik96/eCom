<!DOCTYPE html>
<html lang="en">
<head>
    <!-- META SECTION -->
    <title>{{ config('app.name', 'HealthCare') }}</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="icon" href="favicon.ico" type="image/x-icon" />
    <!-- END META SECTION -->

    <!-- CSS INCLUDE -->
    <link rel="stylesheet" type="text/css" id="theme" href="{{asset('admin/css/theme-brown.css')}}"/>
    <link rel="stylesheet" type="text/css" id="theme" href="{{asset('css/toastr.min.css')}}"/>
    <link rel="stylesheet" type="text/css" id="theme" href="{{asset('color_picker/spectrum.css')}}"/>

    {{-- this style used for borderless table
    --       no need to change this
    --}}
    <style type="text/css">
        .table.no-border tr td, .table.no-border tr th {border-width: 0;}
        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
          -webkit-appearance: none;
          margin: 0;
        }
    </style>
    {{-- this style used for borderless table  --}}

    @yield('styles')
    <!-- EOF CSS INCLUDE -->
</head>
<body>
    <!-- START PAGE CONTAINER -->
    <div class="page-container" style="background-color:#ffffff">

        <!-- START PAGE SIDEBAR -->
        <div class="page-sidebar">
            <!-- START X-NAVIGATION -->
            <ul class="x-navigation">
                <li class="xn-logo">
                    <a href="">Admin Area</a>
                    <a href="#" class="x-navigation-control"></a>
                </li>
                <li class="xn-profile">
                    <div class="profile">

                        <div class="profile-data">
                            <div class="profile-data-name">{{ Auth::user()->name }}</div>
                        </div>

                    </div>
                </li>


                {{-- ------------------------------------------------------
                Left Menu Bar Start
                ------------------------------------------------------------  --}}


                <li>
                    <a href="{{route('admin.dash')}}"><span class="fa fa-desktop"></span> <span class="xn-text">Dashboard</span></a>
                </li>

                <li class="xn-openable">
                    <a href="#"><span class="fa fa-group"></span> <span class="xn-text">User</span></a>
                    <ul>
                        <li><a href="{{route('user-role.index')}}"><span class="fa fa-legal"></span>User Role</a></li>
                        <li><a href="{{route('users.create')}}"><span class="fa fa-plus"></span>Create User</a></li>

                        <li class="xn-openable">

                            <a href="#"><span class="fa fa-group"></span> <span class="xn-text">User List</span></a>
                            <ul>
                                <li><a href="{{route('users.index')}}"><span class="fa fa-list"></span>All User</a></li>

                                @if (isset($allUserRoles) && count($allUserRoles))
                                    @foreach ($allUserRoles as $role)
                                        <li><a href="{{route('userByRole', $role->slug)}}"><span class="fa fa-key"></span>{{ $role->name }}</a></li>
                                    @endforeach
                                @endif

                            </ul>
                        </li>

                    </ul>
                </li>



                <li class="xn-openable">
                    <a href="#"><span class="fa fa-map-marker"></span> <span class="xn-text">Location</span></a>
                    <ul>
                        <li class="xn-openable">
                            <a href="#"><span class="fa fa-flag"></span> <span class="xn-text">Country</span></a>
                            <ul>
                                <li>
                                    <a href="{{route('sys-country.create')}}"><span class="fa fa-plus"></span>Add Country</a>
                                </li>
                                <li>
                                    <a href="{{route('sys-country.index')}}"><span class="fa fa-eye"></span>View Country</a>
                                </li>

                            </ul>
                        </li>

                        <li class="xn-openable">
                            <a href="#"><span class="fa fa-flag"></span> <span class="xn-text">Division/State</span></a>
                            <ul>
                                <li>
                                    <a href="{{route('sys-division.create')}}"><span class="fa fa-plus"></span>Add Division/State</a>
                                </li>
                                <li>
                                    <a href="{{route('sys-division.index')}}"><span class="fa fa-eye"></span>View Division/State</a>
                                </li>

                            </ul>
                        </li>

                        <li class="xn-openable">
                            <a href="#"><span class="fa fa-flag"></span> <span class="xn-text">District/City</span></a>
                            <ul>
                                <li>
                                    <a href="{{route('sys-city.create')}}"><span class="fa fa-plus"></span>Add District/City</a>
                                </li>
                                <li>
                                    <a href="{{route('sys-city.index')}}"><span class="fa fa-eye"></span>View District/City</a>
                                </li>

                            </ul>
                        </li>

                        <li class="xn-openable">
                            <a href="#"><span class="fa fa-flag"></span> <span class="xn-text">Upazila/Police Station</span></a>
                            <ul>
                                <li>
                                    <a href="{{route('sys-police-station.create')}}"><span class="fa fa-plus"></span>Add Upazila/Police Station</a>
                                </li>
                                <li>
                                    <a href="{{route('sys-police-station.index')}}"><span class="fa fa-eye"></span>View Upazila/Police Station</a>
                                </li>

                            </ul>
                        </li>

                        <li class="xn-openable">
                            <a href="#"><span class="fa fa-flag"></span> <span class="xn-text">Union/Word</span></a>
                            <ul>
                                <li>
                                    <a href="{{route('sys-word.create')}}"><span class="fa fa-plus"></span>Add Union/Word</a>
                                </li>
                                <li>
                                    <a href="{{route('sys-word.index')}}"><span class="fa fa-eye"></span>View Union/Word</a>
                                </li>

                            </ul>
                        </li>

                        <li class="xn-openable">
                            <a href="#"><span class="fa fa-flag"></span> <span class="xn-text">Village/Moholla</span></a>
                            <ul>
                                <li>
                                    <a href="{{route('sys-village.create')}}"><span class="fa fa-plus"></span>Add Village/Moholla</a>
                                </li>
                                <li>
                                    <a href="{{route('sys-village.index')}}"><span class="fa fa-eye"></span>View Village/Moholla</a>
                                </li>

                            </ul>
                        </li>


                    </ul>
                </li>

                <li class="xn-openable">
                    <a href="#"><span class="fa fa-bank"></span> <span class="xn-text">Bank</span></a>
                    <ul>
                        <li>
                            <a href="{{route('mobile-bank.index')}}"><span class="fa fa-tasks"></span> <span class="xn-text">Mobile Bank</span></a>
                        </li>
                        <li>
                            <a href="{{route('e-wallet.index')}}"><span class="fa fa-tasks"></span> <span class="xn-text">E-Wallet</span></a>
                        </li>
                    </ul>
                </li>

                <li class="xn-openable">
                    <a href="#"><span class="glyphicon glyphicon-th-large"></span> <span class="xn-text">Product Section</span></a>
                    <ul>
                        <li>
                            <a href="{{route('type.index')}}"><span class="fa fa-tasks"></span> Type</a>
                        </li>
                        <li class="xn-openable">
                          <a href="#"><span class="fa fa-flag"></span> Category</a>
                            <ul>
                                <li>
                                    <a href="{{route('category.create')}}"><span class="fa fa-plus"></span>Add Category</a>
                                </li>
                                <li>
                                    <a href="{{route('category.index')}}"><span class="fa fa-eye"></span>View Category</a>
                                </li>
                            </ul>
                        </li>
                        <li class="xn-openable">
                          <a href="#"><span class="fa fa-flag"></span> Sub Category</a>
                            <ul>
                                <li>
                                    <a href="{{route('sub-category.create')}}"><span class="fa fa-plus"></span>Add Sub Category</a>
                                </li>
                                <li>
                                    <a href="{{route('sub-category.index')}}"><span class="fa fa-eye"></span>View Sub Category</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="xn-openable">
                    <a href="#"><span class="glyphicon glyphicon-th-large"></span> <span class="xn-text">Product Accessories</span></a>
                    <ul>
                        <li class="xn-openable">
                            <a href="#"><span class="fa fa-flag"></span> Brand</a>
                            <ul>
                                <li>
                                    <a href="{{route('brand.create')}}"><span class="fa fa-plus"></span>Add Brand</a>
                                </li>
                                <li>
                                    <a href="{{route('brand.index')}}"><span class="fa fa-eye"></span>View Brand</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{route('color.index')}}"><span class="fa fa-tasks"></span> Color</a>
                        </li>
                        <li>
                            <a href="{{route('size.index')}}"><span class="fa fa-tasks"></span> Size</a>
                        </li>
                    </ul>
                </li>

                <li class="xn-openable">
                    <a href="#"><span class="fa fa-files-o"></span> <span class="xn-text">Product</span></a>
                    <ul>
                        <li>
                            <a href="{{ route('product-details.create') }}"><span class="fa fa-plus"></span>Add Product</a>
                        </li>
                        <li>
                            <a href="{{ route('product-details.index') }}"><span class="fa fa-eye"></span>All Product</a>
                        </li>
                    </ul>
                </li>



                <li class="xn-openable">
                    <a href="#"><span class="fa fa-files-o"></span> <span class="xn-text">Level 3</span></a>
                    <ul>
                        <li>
                            <a href=""><span class="fa fa-file-o"></span>Slide 1</a>
                        </li>
                        <li class="xn-openable">
                            <a href="#"><span class="fa fa-files-o"></span>Slide 2</a>
                            <ul>
                                <li><a href=""><span class="fa fa-plus"></span>Part 1</a></li>
                                <li><a href=""><span class="fa fa-list"></span>Part 2</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>

                <li class="xn-openable">
                    <a href="#"><span class="fa fa-files-o"></span> <span class="xn-text">Level 4</span></a>
                    <ul>
                        <li>
                            <a href=""><span class="fa fa-file-o"></span>Slide 1</a>
                        </li>
                        <li class="xn-openable">
                            <a href="#"><span class="fa fa-files-o"></span>Slide 2</a>
                            <ul>
                                <li><a href=""><span class="fa fa-file-o"></span>Page 1</a></li>
                                <li class="xn-openable">
                                    <a href="#"><span class="fa fa-files-o"></span>Page 2</a>
                                    <ul>
                                        <li><a href=""><span class="fa fa-plus"></span>Part 1</a></li>
                                        <li><a href=""><span class="fa fa-list"></span>Part 2</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>


                {{-- ------------------------------------------------------
                Left Menu Bar end
                ------------------------------------------------------------  --}}




                <li>
                    <a href=""><span class=""></span> <span class="xn-text"></span></a>
                </li>

                <li class="xn-openable">
                    <a href="#"><span class="fa fa-files-o"></span> <span class="xn-text">Design</span></a>
                    <ul>
                    </ul>
                </li>

                <li class="xn-openable">
                    <a href="#"><span class="fa fa-sitemap"></span> <span class="xn-text">Navigation Levels</span></a>
                    <ul>
                        <li class="xn-openable">
                            <a href="#">Second Level</a>
                            <ul>
                                <li class="xn-openable">
                                    <a href="#">Third Level</a>
                                    <ul>
                                        <li class="xn-openable">
                                            <a href="#">Fourth Level</a>
                                            <ul>
                                                <li><a href="#">Fifth Level</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>






            </ul>
            <!-- END X-NAVIGATION -->
        </div>
        <!-- END PAGE SIDEBAR -->

        <!-- PAGE CONTENT -->
        <div class="page-content">

            <!-- START X-NAVIGATION VERTICAL -->
            <ul class="x-navigation x-navigation-horizontal x-navigation-panel">
                <!-- TOGGLE NAVIGATION -->
                <li class="xn-icon-button">
                    <a href="#" class="x-navigation-minimize"><span class="fa fa-dedent"></span></a>
                </li>
                <!-- END TOGGLE NAVIGATION -->
                <!-- SEARCH -->

                <!-- END SEARCH -->
                <!-- SIGN OUT -->
                <li class="xn-icon-button pull-right">
                    <a href="#" class="mb-control" data-box="#mb-signout"><span class="fa fa-sign-out"></span></a>
                </li>
                <!-- END SIGN OUT -->


            </ul>
            <!-- END X-NAVIGATION VERTICAL -->


            <!-- PAGE CONTENT WRAPPER -->
            @yield('breadcrumb')
            <div class="page-content-wrap">

                <div class="row">
                    <div class="col-md-12">
                        <br>
                        @yield('content')

                    </div>
                </div>


            </div>
            <!-- END PAGE CONTENT WRAPPER -->
        </div>
        <!-- END PAGE CONTENT -->
    </div>
    <!-- END PAGE CONTAINER -->


    <!-- MESSAGE BOX-->
    <div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
        <div class="mb-container">
            <div class="mb-middle">
                <div class="mb-title"><span class="fa fa-sign-out"></span> Log <strong>Out</strong> ?</div>
                <div class="mb-content">
                    <p>Are you sure you want to log out?</p>
                    <p>Press No if youwant to continue work. Press Yes to logout current user.</p>
                </div>
                <div class="mb-footer">
                    <div class="pull-right">
                        <a class="btn btn-success btn-lg" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        Yes
                    </a>
                    <button class="btn btn-default btn-lg mb-control-close">No</button>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END MESSAGE BOX-->


<!-- START SCRIPTS -->
<!-- START PLUGINS -->
<script type="text/javascript" src="{{asset('admin/js/plugins/jquery/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/js/plugins/jquery/jquery-ui.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/js/plugins/bootstrap/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/js/plugins/bootstrap/bootstrap-select.js')}}"></script>
<!-- END PLUGINS -->

<!-- START THIS PAGE PLUGINS-->
<script type='text/javascript' src="{{asset('admin/js/plugins/icheck/icheck.min.js')}}"></script>
<script type='text/javascript' src="{{asset('admin/js/plugins/bootstrap/bootstrap-file-input.js')}}"></script>
<script type='text/javascript' src="{{asset('admin/js/plugins/summernote/summernote.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/js/plugins/bootstrap/bootstrap-datepicker.js') }}"></script>
<script type="text/javascript" src="{{asset('admin/js/plugins/bootstrap/bootstrap-select.js') }}"></script>

<script type='text/javascript' src="{{asset('admin/js/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js')}}"></script>
<!-- END THIS PAGE PLUGINS-->


<!-- START TEMPLATE -->
<script type="text/javascript" src="{{asset('admin/js/settings.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/js/plugins/fileinput/fileinput.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/js/plugins/icheck/icheck.min.js')}}"></script>

<script type="text/javascript" src="{{asset('admin/js/plugins.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/js/actions.js')}}"></script>
<script type="text/javascript" src="{{asset('js/toastr.min.js')}}"></script>
<!-- END TEMPLATE -->
<script type="text/javascript">
@if (Session::has('success'))
toastr.success("{{Session::get('success')}}")
@endif
@if (Session::has('info'))
toastr.info("{{Session::get('info')}}")
@endif
@if (Session::has('warning'))
toastr.warning("{{Session::get('warning')}}")
@endif
</script>
<script type="text/javascript" src="{{asset('color_picker/spectrum.js')}}"></script>

@yield('scripts')
<!-- END SCRIPTS -->
</body>
</html>
