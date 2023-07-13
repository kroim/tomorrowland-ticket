@inject('request', 'Illuminate\Http\Request')
@extends('layouts.back1')
@section('bcontent')
    <!-- Titlebar -->
    <div id="titlebar">
        <div class="row">
            <div class="col-md-12">
                <h2>@lang('global.package.add_package')</h2>
                <!-- Breadcrumbs -->
                <nav id="breadcrumbs">
                    <ul>
                        <li><a href="#">@lang('global.dashboard.dashboard')</a></li>
                        <li>@lang('global.package.add_package')</li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">

            <div id="add-listing">
                <form action="{{ url('/account/packages/add') }}" method="post">
                {{csrf_field()}}
                <!-- Section -->
                <div class="add-listing-section">

                    <!-- Headline -->
                    <div class="add-listing-headline">
                        <h3><i class="sl sl-icon-doc"></i> @lang('global.package.basic_info')</h3>
                    </div>

                    <!-- Title -->
                    <div class="row with-forms">
                        <div class="col-md-12">
                            <h5>@lang('global.package.p_name')</h5>
                            <input class="search-field" type="text" value="" name="p_name"/>
                        </div>
                        <div class="col-md-12">
                            <h5>@lang('global.package.p_description')</h5>
                            <textarea class="form-control" name="p_description"></textarea>
                        </div>
                    </div>

                </div>
                <!-- Section / End -->

                <!-- Section -->
                <div class="add-listing-section margin-top-45">
                    <!-- Headline -->
                    <div class="add-listing-headline">
                        <h3><i class="sl sl-icon-docs"></i> Details</h3>
                    </div>
                    <!-- Description -->
                    <div class="form">
                        <h5>@lang('global.package.p_title')</h5>
                        <input class="search-field" type="text" value="" name="p_title"/>
                        <h5>@lang('global.package.p_title_description')</h5>
                        <textarea class="WYSIWYG" name="pt_description" cols="40" rows="3"></textarea>
                        <h5>@lang('global.package.how_works')</h5>
                        <textarea class="WYSIWYG" name="pt_how_works" cols="40" rows="3"></textarea>
                    </div>
                    <!-- Row / End -->
                </div>
                <!-- Section / End -->

                <!-- Include Section -->
                <div class="add-listing-section margin-top-45">

                    <!-- Headline -->
                    <div class="add-listing-headline">
                        <h3><i class="sl sl-icon-book-open"></i> @lang('global.package.p_includes')</h3>
                        <!-- Switcher -->
                        <label class="switch"><input type="checkbox" checked><span class="slider round"></span></label>
                    </div>

                    <!-- Switcher ON-OFF Content -->
                    <div class="switcher-content">
                        <div class="row">
                            <div class="col-md-12">
                                <table id="include-list-container" style="width: 100%;">
                                    <tr class="pricing-list-item pattern">
                                        <td>
                                            <div class="fm-move"><i class="sl sl-icon-cursor-move"></i></div>
                                            <div class="fm-input pricing-ingredients">
                                                <input type="text" name="p_includes[]" placeholder="Include Content" /></div>
                                            <div class="fm-close"><a class="delete" href="#"><i class="fa fa-remove"></i></a></div>
                                        </td>
                                    </tr>
                                </table>
                                <a href="#" class="button" id="add-include-button">Add Item</a>
                            </div>
                        </div>

                    </div>
                    <!-- Switcher ON-OFF Content / End -->
                </div>
                <!-- Section / End -->

                <!-- Note Section -->
                <div class="add-listing-section margin-top-45">

                    <!-- Headline -->
                    <div class="add-listing-headline">
                        <h3><i class="sl sl-icon-book-open"></i> @lang('global.package.p_notes')</h3>
                        <!-- Switcher -->
                        <label class="switch"><input type="checkbox" checked><span class="slider round"></span></label>
                    </div>

                    <!-- Switcher ON-OFF Content -->
                    <div class="switcher-content">
                        <div class="row">
                            <div class="col-md-12">
                                <table id="note-list-container" style="width: 100%;">
                                    <tr class="pricing-list-item pattern">
                                        <td>
                                            <div class="fm-move"><i class="sl sl-icon-cursor-move"></i></div>
                                            <div class="fm-input pricing-ingredients">
                                                <input type="text" name="p_notes[]" placeholder="Description" />
                                            </div>
                                            <div class="fm-close"><a class="delete" href="#"><i class="fa fa-remove"></i></a></div>
                                        </td>
                                    </tr>
                                </table>
                                <a href="#" class="button" id="add-notes-button">Add Item</a>
                            </div>
                        </div>

                    </div>
                    <!-- Switcher ON-OFF Content / End -->
                </div>
                <!-- Section / End -->

                <!-- Ticket Section -->
                <div class="add-listing-section margin-top-45">

                    <!-- Headline -->
                    <div class="add-listing-headline">
                        <h3><i class="sl sl-icon-book-open"></i> @lang('global.package.p_tickets')</h3>
                        <!-- Switcher -->
                        <label class="switch"><input type="checkbox" checked><span class="slider round"></span></label>
                    </div>

                    <!-- Switcher ON-OFF Content -->
                    <div class="switcher-content">
                        <div class="row">
                            <div class="col-md-12">
                                <table id="ticket-list-container" style="width: 100%;">
                                    <tr class="pricing-list-item pattern">
                                        <td>
                                            <div class="fm-move"><i class="sl sl-icon-cursor-move"></i></div>
                                            <div class="fm-input pricing-name"><input type="text" name="ticket_title[]" placeholder="Title" /></div>
                                            <div class="fm-input pricing-ingredients"><input type="text" name="ticket_description[]" placeholder="Description" /></div>
                                            <div class="fm-input pricing-price"><input type="text" name="ticket_price[]" placeholder="Price" data-unit="USD" /></div>
                                            <div class="fm-close"><a class="delete" href="#"><i class="fa fa-remove"></i></a></div>
                                        </td>
                                    </tr>
                                </table>
                                <a href="#" class="button" id="add-ticket-button">Add Item</a>
                            </div>
                        </div>

                    </div>
                    <!-- Switcher ON-OFF Content / End -->
                </div>
                <!-- Section / End -->

                    <!-- Tickets Detail Section -->
                    <div class="add-listing-section margin-top-45">

                        <!-- Headline -->
                        <div class="add-listing-headline">
                            <h3><i class="sl sl-icon-book-open"></i> @lang('global.app_tickets') @lang('global.app_details')</h3>
                            <!-- Switcher -->
                            <label class="switch"><input type="checkbox" checked><span class="slider round"></span></label>
                        </div>

                        <!-- Switcher ON-OFF Content -->
                        <div class="switcher-content">
                            <div class="row">
                                <div class="col-md-12">
                                    <table id="details-list-container" style="width: 100%;">
                                        <tr class="pricing-list-item pattern">
                                            <td>
                                                <div class="fm-move"><i class="sl sl-icon-cursor-move"></i></div>
                                                <div class="fm-input pricing-ingredients">
                                                    <input type="text" name="t_details[]" placeholder="Ticket Details" />
                                                </div>
                                                <div class="fm-close"><a class="delete" href="#"><i class="fa fa-remove"></i></a></div>
                                            </td>
                                        </tr>
                                    </table>
                                    <a href="#" class="button" id="add-details-button">Add Item</a>
                                </div>
                            </div>

                        </div>
                        <!-- Switcher ON-OFF Content / End -->
                    </div>
                    <!-- Section / End -->
                    <textarea class="form-control" name="t_time" rows="2" placeholder="Weekend Time Period"></textarea>

                    <input type="submit" id="save_package" name="save_package" style="display: none;" value="Save Package">
                </form>
                <!-- Section -->
                <div class="add-listing-section margin-top-45">
                    <!-- Headline -->
                    <div class="add-listing-headline">
                        <h3><i class="sl sl-icon-picture"></i> @lang('global.package.p_images')</h3>
                    </div>
                    <!-- Dropzone -->
                    <div class="submit-section">
                        {!! Form::open([ 'route' => [ 'account.packages.upload_images' ], 'files' => true, 'class' => 'dropzone','id'=>"image-upload"]) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
                <!-- Section / End -->

                <a href="#" class="button preview" onclick="save_package()">@lang('global.app_save') <i class="fa fa-arrow-circle-right"></i></a>

            </div>
        </div>

        <!-- Copyrights -->
        <div class="col-md-12">
            <div class="copyrights">© 2017 Listeo. All Rights Reserved.</div>
        </div>

    </div>

@stop

@section('footer')
    <script type="text/javascript" src="{{ url('backend/scripts/jquery-2.2.0.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('backend/scripts/jpanelmenu.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('backend/scripts/chosen.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('backend/scripts/slick.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('backend/scripts/rangeslider.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('backend/scripts/magnific-popup.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('backend/scripts/waypoints.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('backend/scripts/counterup.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('backend/scripts/jquery-ui.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('backend/scripts/tooltips.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('backend/scripts/custom.js') }}"></script>
    <script type="text/javascript" src="{{ url('js/add_global.js') }}"></script>

    <script type="text/javascript" src="{{ url('backend/scripts/dropzone.js') }}"></script>
    <script type="text/javascript">
        function save_package(){
            $("#save_package").click();
        }
        Dropzone.options.imageUpload = {
            maxFilesize  : 500,
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
            addRemoveLinks : true,
            removedfile: function(file) {
                var name = file.name;
                $.ajax({
                    type: 'POST',
                    url: '{{ url('account/packages/delete_images') }}',
                    data:{
                        _token : "<?php echo csrf_token() ?>",
                        id: name
                    },
                    dataType: 'html'
                });
                var _ref;
                return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
            }
        };
    </script>
@stop