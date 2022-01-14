<div class="modal modal-sticky modal-sticky-lg modal-sticky-bottom-right" id="kt_inbox_compose" role="dialog" data-backdrop="false">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<!--begin::Form-->
				<form id="kt_inbox_compose_form" method="POST" action="{{route('send_sms')}}">
                    @csrf
					<!--begin::Header-->
					<div class="d-flex align-items-center justify-content-between py-5 pl-8 pr-5 border-bottom">
						<h5 class="font-weight-bold m-0">Compose SMS</h5>
						<div class="d-flex ml-2">
							<span class="btn btn-clean btn-sm btn-icon mr-2">
								<i class="flaticon2-arrow-1 icon-1x"></i>
							</span>
							<span class="btn btn-clean btn-sm btn-icon" data-dismiss="modal">
								<i class="ki ki-close icon-1x"></i>
							</span>
						</div>
					</div>
					<!--end::Header-->
					<!--begin::Body-->
					<div class="d-block">
						<!--begin::To-->
						<div class="d-flex align-items-center border-bottom inbox-to px-8 min-h-45px">
							<div class="text-dark-50 w-75px">To Group:</div>
							<div class="d-flex align-items-center flex-grow-1">
								<input type="text" class="form-control border-0" name="compose_to"
                                       value="@foreach($groups as $group) {{$group->name}}, @endforeach" />
							</div>
							<div class="ml-2">

							</div>
						</div>
						<!--end::To-->
						<!--begin::Subject-->
						<div class="border-bottom">
                            <div class="d-flex align-items-center border-bottom inbox-to px-8 min-h-45px">
							<div class="text-dark-50 w-100px">Sender Name:</div>
							<div class="d-flex align-items-center flex-grow-1">
								<select class="form-control border-0 px-8 mr-3 min-h-45px"
                                        name="sender_name">
                                    <option value="INFO">INFO</option>
                                    <option value="MWANGAZA">MWANGAZA</option>

                                </select>
							</div>
							<div class="ml-2">

							</div>
						</div>

						</div>
						<!--end::Subject-->
						<!--begin::Message-->
                        <textarea name="message" class="border-0 w-100 p-3" style="height: 250px" placeholder="Type message"></textarea>
                        <span class="help-block m-4">Use <code>@phone</code> for Phone and <code>@name</code> for Contact Name</span>
						<!--end::Message-->
						<!--begin::Attachments-->
						<div class="dropzone dropzone-multi px-8 py-4" id="kt_inbox_compose_attachments">
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
								<button type="submit" class="btn btn-primary font-weight-bold px-6">Send</button>
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
							<span class="btn btn-icon btn-sm btn-clean mr-2" id="kt_inbox_compose_attachments_select">
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
