@extends('layouts.lp')

@section('page_css')

@endsection

@section('content')
<!--begin::Container-->
<div class="container">
	<!--begin::Inbox-->
	<div class="d-flex flex-row">
		<!--begin::Aside-->
		@include('pos.sms.partials.menu')
		<!--end::Aside-->
		<!--begin::List-->
		<div class="flex-row-fluid ml-lg-8" style="display: block" id="kt_inbox_list_open">
			<!--begin::Card-->
			<div class="card card-custom card-stretch">
				<!--begin::Header-->
				<div class="card-header row row-marginless align-items-center flex-wrap py-5 h-auto">
					<div>Inbox</div>
				</div>
				<!--end::Header-->
				<!--begin::Body-->
				<div class="card-body table-responsive px-0">
					<!--begin::Items-->
                    @foreach($conversation as $text)
					<div class="list list-hover min-w-500px" data-inbox="list" >
                        <!--begin::Items-->
                        <div class="list list-hover min-w-500px" data-inbox="list">
                            <!--begin::Item-->
                            <div class="d-flex align-items-start list-item card-spacer-x py-3" onclick="myFunction('{{$text[0]->from}}')"
                                 data-inbox="message" >
                                <!--begin::Toolbar-->
                                <div class="d-flex align-items-center">
                                    <!--begin::Actions-->
                                    <div class="d-flex align-items-center mr-3" data-inbox="actions">
                                        <label class="checkbox checkbox-inline checkbox-primary flex-shrink-0 mr-3">
                                            <input type="checkbox"/>
                                            <span></span>
                                        </label>
                                    </div>
                                    <!--end::Actions-->
                                    <!--begin::Author-->
                                    <div class="d-flex align-items-center flex-wrap w-xxl-100px mr-3"
                                         data-toggle="view">
                                        <a href="#" class="font-weight-bold text-dark-75 text-hover-primary">
                                            +{{end($text)->from}}</a>
                                        <div class="mt-2">
                                            <span class="label label-light-primary font-weight-bold label-inline mr-1">{{sizeof($text)}}</span>
                                        </div>
                                    </div>
                                    <!--end::Author-->
                                </div>
                                <!--end::Toolbar-->
                                <!--begin::Info-->
                                <div class="flex-grow-1 w-700px mt-2 mr-2" data-toggle="view">
                                    <div>
                                        <p>{{ str_replace('LUX ','',$text[0]->message)}}</p>
                                    </div>
                                </div>


                                <!--end::Info-->
                                <!--begin::Datetime-->
                                <div class="mt-2 mr-3 font-weight-bolder w-200px text-right" data-toggle="view">
                                    {{date('d, M Y, H:m',strtotime('+3 hours',strtotime($text[0]->timeUTC)))}}
                                </div>
                                <!--end::Datetime-->
                            </div >
                            <!--end::Item-->
                        </div>
                        <!--end::Items-->
                    </div>
                    @endforeach
					<!--end::Items-->
				</div>
				<!--end::Body-->
			</div>
			<!--end::Card-->
		</div>
		<!--end::List-->
		<!--begin::View-->
        @foreach($conversation as $convo)
		<div class="flex-row-fluid ml-lg-8 " style="display: none" id="kt_inbox_view_{{$convo[0]->from}}">
			<!--begin::Card-->
			<div class="card card-custom card-stretch">
				<!--begin::Header-->
				<div class="card-header align-items-center flex-wrap justify-content-between py-5 h-auto">
					<!--begin::Header-->
					<div class="d-flex align-items-center justify-content-between flex-wrap card-spacer-x py-5">
						<!--begin::Title-->
						<div class="d-flex align-items-center mr-2 py-2">
							<div class="font-weight-bold font-size-h3 mr-3">
                                <a href="{{route('inbox')}}">
                                    <i class="fa fa-arrow-left"></i>
                                </a>
                                Message From: {{$convo[0]->from}}
                            </div>
							<span class="label label-light-primary font-weight-bold label-inline mr-2">inbox</span>
							<span class="label label-light-danger font-weight-bold label-inline">important</span>
						</div>
						<!--end::Title-->
					</div>
					<!--end::Header-->
				</div>
				<!--end::Header-->
				<!--begin::Body-->
				<div class="card-body p-0">

					<!--begin::Messages-->
					<div class="mb-3">
                        @foreach(array_reverse($convo) as $message)
						<div class="cursor-pointer shadow-xs toggle-on" data-inbox="message">
							<!--begin::Message Heading-->
							<div class="d-flex card-spacer-x py-6 flex-column flex-md-row flex-lg-column flex-xxl-row justify-content-between">
								<div class="d-flex align-items-center">
									<div class="d-flex flex-column flex-grow-1 flex-wrap mr-2">
										<div class="d-flex">
											<a href="#" class="font-size-lg font-weight-bolder text-dark-75 text-hover-primary mr-2">
                                                To me <i class="fa fa-arrow-down icon-xs ml-1 text-dark-50"></i>
                                            </a>
											<div class="font-weight-bold text-muted">
											<span class="label label-success label-dot mr-2"></span>Jul 15, 2019, 11:19AM</div>
										</div>
									</div>
								</div>
							</div>
							<!--end::Message Heading-->
							<div class="card-spacer-x pb-1 toggle-off-item">
								<p>{{$message->message}}</p>
							</div>
						</div>
                        @endforeach
					</div>
					<!--end::Messages-->
					<!--begin::Reply-->
					<div class="card-spacer mb-3" id="kt_inbox_reply">
						<div class="card card-custom shadow-sm">
							<div class="card-body p-0">
								<!--begin::Form-->
								<form id="kt_inbox_reply_form">
									<!--begin::Body-->
									<div class="d-block">
										<!--begin::To-->
										<div class="d-flex align-items-center border-bottom inbox-to px-8 min-h-50px">
											<div class="text-dark-50 w-75px">To:</div>
											<div class="d-flex align-items-center flex-grow-1">
												<input type="text" class="form-control border-0" name="compose_to" value="Chris Muller, Lina Nilson" />
											</div>
											<div class="ml-2">
												<span class="text-muted font-weight-bold cursor-pointer text-hover-primary mr-2" data-inbox="cc-show">Cc</span>
												<span class="text-muted font-weight-bold cursor-pointer text-hover-primary" data-inbox="bcc-show">Bcc</span>
											</div>
										</div>
										<!--end::To-->
										<!--begin::CC-->
										<div class="d-none align-items-center border-bottom inbox-to-cc pl-8 pr-5 min-h-50px">
											<div class="text-dark-50 w-75px">Cc:</div>
											<div class="flex-grow-1">
												<input type="text" class="form-control border-0" name="compose_cc" value="" />
											</div>
											<span class="btn btn-clean btn-xs btn-icon" data-inbox="cc-hide">
												<i class="la la-close"></i>
											</span>
										</div>
										<!--end::CC-->
										<!--begin::BCC-->
										<div class="d-none align-items-center border-bottom inbox-to-bcc pl-8 pr-5 min-h-50px">
											<div class="text-dark-50 w-75px">Bcc:</div>
											<div class="flex-grow-1">
												<input type="text" class="form-control border-0" name="compose_bcc" value="" />
											</div>
											<span class="btn btn-clean btn-xs btn-icon" data-inbox="bcc-hide">
												<i class="la la-close"></i>
											</span>
										</div>
										<!--end::BCC-->
										<!--begin::Subject-->
										<div class="border-bottom">
											<input class="form-control border-0 px-8 min-h-45px" name="compose_subject" placeholder="Subject" />
										</div>
										<!--end::Subject-->
										<!--begin::Message-->
										<div id="kt_inbox_reply_editor" class="border-0" style="height: 250px"></div>
										<!--end::Message-->
										<!--begin::Attachments-->
										<div class="dropzone dropzone-multi px-8 py-4" id="kt_inbox_reply_attachments">
											<div class="dropzone-items">
												<div class="dropzone-item" style="display:none">
													<div class="dropzone-file">
														<div class="dropzone-filename" title="some_image_file_name.jpg">
															<span data-dz-name="">some_image_file_name.jpg</span>
															<strong>(
															<span data-dz-size="">340kb</span>)</strong>
														</div>
														<div class="dropzone-error" data-dz-errormessage=""></div>
													</div>
													<div class="dropzone-progress">
														<div class="progress">
															<div class="progress-bar bg-primary" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0" data-dz-uploadprogress=""></div>
														</div>
													</div>
													<div class="dropzone-toolbar">
														<span class="dropzone-delete" data-dz-remove="">
															<i class="flaticon2-cross"></i>
														</span>
													</div>
												</div>
											</div>
										</div>
										<!--end::Attachments-->
									</div>
									<!--end::Body-->
									<!--begin::Footer-->
									<div class="d-flex align-items-center justify-content-between py-5 pl-8 pr-5 border-top">
										<!--begin::Actions-->
										<div class="d-flex align-items-center mr-3">
											<!--begin::Send-->
											<div class="btn-group mr-4">
												<span class="btn btn-primary font-weight-bold px-6">Send</span>
												<span class="btn btn-primary font-weight-bold dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" role="button"></span>
												<div class="dropdown-menu dropdown-menu-sm dropup p-0 m-0 dropdown-menu-right">
													<ul class="navi py-3">
														<li class="navi-item">
															<a href="#" class="navi-link">
																<span class="navi-icon">
																	<i class="flaticon2-writing"></i>
																</span>
																<span class="navi-text">Schedule Send</span>
															</a>
														</li>
														<li class="navi-item">
															<a href="#" class="navi-link">
																<span class="navi-icon">
																	<i class="flaticon2-medical-records"></i>
																</span>
																<span class="navi-text">Save &amp; archive</span>
															</a>
														</li>
														<li class="navi-item">
															<a href="#" class="navi-link">
																<span class="navi-icon">
																	<i class="flaticon2-hourglass-1"></i>
																</span>
																<span class="navi-text">Cancel</span>
															</a>
														</li>
													</ul>
												</div>
											</div>
											<!--end::Send-->
											<!--begin::Other-->
											<span class="btn btn-icon btn-sm btn-clean mr-2" id="kt_inbox_reply_attachments_select">
												<i class="flaticon2-clip-symbol"></i>
											</span>
											<span class="btn btn-icon btn-sm btn-clean">
												<i class="flaticon2-pin"></i>
											</span>
											<!--end::Other-->
										</div>
										<!--end::Actions-->
										<!--begin::Toolbar-->
										<div class="d-flex align-items-center">
											<span class="btn btn-icon btn-sm btn-clean mr-2" data-toggle="tooltip" title="More actions">
												<i class="flaticon2-settings"></i>
											</span>
											<span class="btn btn-icon btn-sm btn-clean" data-inbox="dismiss" data-toggle="tooltip" title="Dismiss reply">
												<i class="flaticon2-rubbish-bin-delete-button"></i>
											</span>
										</div>
										<!--end::Toolbar-->
									</div>
									<!--end::Footer-->
								</form>
								<!--end::Form-->
							</div>
						</div>
					</div>
					<!--end::Reply-->
				</div>
				<!--end::Body-->
			</div>
			<!--end::Card-->
		</div>
        @endforeach
		<!--end::View-->
	</div>
	<!--end::Inbox-->
	<!--begin::Compose-->
	@include('pos.sms.partials.compose')
	<!--end::Compose-->
</div>
<!--end::Container-->

@endsection

@section('page_js')
    <script>
        function myFunction(id) {
            var x = document.getElementById('kt_inbox_list_open');

            @foreach($conversation as $convo)
            if (id == {{$convo[0]->from}}){
                var y{{$convo[0]->from}} = document.getElementById('kt_inbox_view_{{$convo[0]->from}}');

                y{{$convo[0]->from}}.style.display = "block";
                x.style.display = "none";
                console.log("done");
            }else {

                console.log("Foo");
            }
            @endforeach

        }
    </script>

    <!--begin::Page Scripts(used by this page)-->
    <script src="{{url('/')}}/assets/js/pages/crud/file-upload/dropzonejs15aa.js?v=7.2.2"></script>
    <!--end::Page Scripts-->
    <!--begin::Page Scripts(used by this page)-->
		<script src="{{url('/')}}/assets/js/pages/custom/inbox/inbox15aa.js?v=7.2.2"></script>
		<!--end::Page Scripts-->
@endsection
