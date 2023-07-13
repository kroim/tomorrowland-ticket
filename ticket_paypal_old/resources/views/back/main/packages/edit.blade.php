@inject('request', 'Illuminate\Http\Request')
@extends('layouts.back1')

@section('bcontent')
    <!-- Titlebar -->
    <div id="titlebar">
        <div class="row">
            <div class="col-md-12">
                <h2>Edit Package</h2>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">

            <div id="add-listing">
                <form action="{{ url('/account/packages/edit') }}" method="post">
                {{csrf_field()}}
                    <input type="text" value="{{$package->id}}" name="ep_id" style="display: none">
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
                                <input class="search-field" type="text" value="{{$package->name}}" name="ep_name"/>
                            </div>
                            <div class="col-md-12">
                                <h5>@lang('global.package.p_description')</h5>
                                <textarea class="form-control" name="ep_description">{{$package->main_description}}</textarea>
                            </div>
                        </div>

                    </div>
                    <!-- Section / End -->

                    <!-- Section -->
                    <div class="add-listing-section margin-top-45">
                        <!-- Headline -->
                        <div class="add-listing-headline">
                            <h3><i class="sl sl-icon-docs"></i> @lang('global.package.p_details')</h3>
                        </div>
                        <!-- Description -->
                        <div class="form">
                            <h5>@lang('global.package.p_title')</h5>
                            <input class="search-field" type="text" value="{{$package->sub_title}}" name="ep_title"/>
                            <h5>@lang('global.package.p_title_description')</h5>
                            <textarea class="WYSIWYG" name="ept_description" cols="40" rows="3">{{$package->sub_description}}</textarea>
                            <h5>@lang('global.package.how_works')</h5>
                            <textarea class="WYSIWYG" name="ept_how_works" cols="40" rows="3">{{$package->how_works}}</textarea>
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
                                    <table id="e-include-list-container" style="width: 100%;">
                                        @php $includes = unserialize($package->includes) @endphp
                                        @for($include_index = 0; $include_index < sizeof($includes); $include_index++)
                                            <tr class="pricing-list-item pattern">
                                                <td>
                                                    <div class="fm-move"><i class="sl sl-icon-cursor-move"></i></div>
                                                    <div class="fm-input pricing-ingredients">
                                                        <input type="text" name="ep_includes[]" placeholder="Include Content" value="{{$includes[$include_index]}}"/></div>
                                                    <div class="fm-close"><a class="delete" href="#"><i class="fa fa-remove"></i></a></div>
                                                </td>
                                            </tr>
                                        @endfor
                                    </table>
                                    <a href="#" class="button" id="add-e-include-button">Add Item</a>
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
                                    <table id="e-note-list-container" style="width: 100%;">
                                        @php $notes = unserialize($package->notes) @endphp
                                        @for($note_index = 0; $note_index < sizeof($notes); $note_index++)
                                            <tr class="pricing-list-item pattern">
                                                <td>
                                                    <div class="fm-move"><i class="sl sl-icon-cursor-move"></i></div>
                                                    <div class="fm-input pricing-ingredients">
                                                        <input type="text" name="ep_notes[]" placeholder="Description" value="{{$notes[$note_index]}}"/>
                                                    </div>
                                                    <div class="fm-close"><a class="delete" href="#"><i class="fa fa-remove"></i></a></div>
                                                </td>
                                            </tr>
                                        @endfor
                                    </table>
                                    <a href="#" class="button" id="add-e-notes-button">Add Item</a>
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
                                    <table id="e-ticket-list-container" style="width: 100%;">
                                        @php
                                            $tickets_title = unserialize($package->tickets_title);
                                            $tickets_description = unserialize($package->tickets_description);
                                            $tickets_price = unserialize($package->tickets_price);
                                        @endphp
                                        @for($ticket_index = 0; $ticket_index < sizeof($tickets_title); $ticket_index++)
                                            <tr class="pricing-list-item pattern">
                                                <td>
                                                    <div class="fm-move"><i class="sl sl-icon-cursor-move"></i></div>
                                                    <div class="fm-input pricing-name"><input type="text" name="e_ticket_title[]" placeholder="Title" value="{{$tickets_title[$ticket_index]}}"/></div>
                                                    <div class="fm-input pricing-ingredients">
                                                        <input type="text" name="e_ticket_description[]" placeholder="Description" value="{{$tickets_description[$ticket_index]}}"/></div>
                                                    <div class="fm-input pricing-price">
                                                        <input type="text" name="e_ticket_price[]" placeholder="Price" data-unit="USD" value="{{$tickets_price[$ticket_index]}}"/></div>
                                                    <div class="fm-close"><a class="delete" href="#"><i class="fa fa-remove"></i></a></div>
                                                </td>
                                            </tr>
                                        @endfor
                                    </table>
                                    <a href="#" class="button" id="add-e-ticket-button">Add Item</a>
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
                                    <table id="e-details-list-container" style="width: 100%;">
                                        @php $details = unserialize($package->tickets_detail) @endphp
                                        @for($detail_index = 0; $detail_index < sizeof($details); $detail_index++)
                                            <tr class="pricing-list-item pattern">
                                                <td>
                                                    <div class="fm-move"><i class="sl sl-icon-cursor-move"></i></div>
                                                    <div class="fm-input pricing-ingredients">
                                                        <input type="text" name="et_details[]" placeholder="Ticket Details" value="{{$details[$detail_index]}}"/>
                                                    </div>
                                                    <div class="fm-close"><a class="delete" href="#"><i class="fa fa-remove"></i></a></div>
                                                </td>
                                            </tr>
                                        @endfor
                                    </table>
                                    <a href="#" class="button" id="add-e-details-button">Add Item</a>
                                </div>
                            </div>

                        </div>
                        <!-- Switcher ON-OFF Content / End -->
                    </div>
                    <!-- Section / End -->
                    <textarea class="form-control" name="et_time" rows="2" placeholder="Weekend Time Period">{{$package->tickets_time}}</textarea>

                    <input type="submit" id="save_package" name="post_sub" style="display: none;" value="post_sub">
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
                <a href="{{url('account/packages')}}" class="button preview" >@lang('global.app_cancel') <i class="fa fa-arrow-circle-right"></i></a>

            </div>
        </div>

        <!-- Copyrights -->
        <div class="col-md-12">
            <div class="copyrights">© 2017 Listeo. All Rights Reserved.</div>
        </div>

    </div>
    <input id="field" data-field-id="{{json_encode(unserialize($package->images))}}" style="display: none">
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
    <script type="text/javascript" src="{{ url('js/edit_global.js') }}"></script>

    <script type="text/javascript" src="{{ url('backend/scripts/dropzone.js') }}"></script>
    <script>
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
            },
            init: function() {
                var image_names = JSON.parse($('#field').attr("data-field-id"));
                for(var i=0; i<image_names.length; i++) {
                    var image_arr = image_names[i].split('/');
                    var image_name = image_arr[image_arr.length - 1];
                    var mockFile = {name: image_name, size: 12345, accepted: true, kind: "image"};
                    this.files.push(mockFile);
                    this.emit('addedfile', mockFile);
                    this.createThumbnailFromUrl(mockFile, "/images/"+image_name);
                    this.emit('complete', mockFile);
                    this._updateMaxFilesReachedClass();
                }
            }

        };
    </script>
@stop