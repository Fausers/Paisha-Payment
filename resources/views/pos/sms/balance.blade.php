@extends('layouts.lp')

@section('page_css')

@endsection

@section('content')
<div class="container">
    <!--begin::Card-->
    <div class="card card-custom gutter-b">
        <div class="card-body">
            <!--begin::Details-->
            <div class="d-flex mb-9">
                <!--begin: Pic-->
                <div class="flex-shrink-0 mr-7 mt-lg-0 mt-3">
                    <div class="symbol symbol-50 symbol-lg-120">
                        <img src="{{url('/')}}/{{$shop->image}}" alt="{{$shop->name}}" />
                    </div>
                </div>
				<!--end::Pic-->
				<!--begin::Info-->
				<div class="flex-grow-1">
					<!--begin::Title-->
					<div class="d-flex justify-content-between flex-wrap mt-1">
						<div class="d-flex mr-3">
							<a href="#" class="text-dark-75 text-hover-primary font-size-h5 font-weight-bold mr-3">{{$shop->name}}</a>
						</div>
						<div class="my-lg-0 my-3">
							<a href="#" class="btn btn-sm btn-info font-weight-bolder text-uppercase">Topup</a>
						</div>
					</div>
					<!--end::Title-->
					<!--begin::Content-->
					<div class="d-flex flex-wrap justify-content-between mt-1">
						<div class="d-flex flex-column flex-grow-1 pr-8">
							<div class="d-flex flex-wrap mb-4">
								<a href="#" class="text-dark-50 text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
								<i class="fa fa-mail-bulk"></i> {{$shop->email}}</a>
								<a href="#" class="text-dark-50 text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
								<i class="fa fa-address-book"></i> {{$shop->location}}</a>
								<a href="#" class="text-dark-50 text-hover-primary font-weight-bold">
								<i class="fa fa-phone"></i> {{$shop->tell}}</a>
							</div>
							<span class="font-weight-bold text-dark-50">{{$shop->details}}</span>
						</div>
					</div>
					<!--end::Content-->
				</div>
				<!--end::Info-->
			</div>
			<!--end::Details-->
			<div class="separator separator-solid"></div>
			<!--begin::Items-->
			<div class="d-flex align-items-center flex-wrap mt-8">
				<!--begin::Item-->
				<div class="d-flex align-items-center flex-lg-fill mr-5 mb-2">
					<span class="mr-4">
						<i class="fa fa-piggy-bank font-size-h1"></i>
					</span>
					<div class="d-flex flex-column text-dark-75">
						<span class="font-weight-bolder font-size-sm">SMS Credits</span>
						<span class="font-weight-bolder font-size-h5">
						<span class="text-dark-50 font-weight-bold"></span> {{$shop->balance->credits}}</span>
					</div>
				</div>
				<!--end::Item-->
				<!--begin::Item-->
				<div class="d-flex align-items-center flex-lg-fill mr-5 mb-2">
					<span class="mr-4">
						<i class="fa fa-sms font-size-h1"></i>
					</span>
					<div class="d-flex flex-column text-dark-75">
						<span class="font-weight-bolder font-size-sm">Sent SMS</span>
						<span class="font-weight-bolder font-size-h5">
						<span class="text-dark-50 font-weight-bold"></span> {{$shop->outbox->sum('sms_count')}}</span>
					</div>
				</div>
				<!--end::Item-->
				<!--begin::Item-->
				<div class="d-flex align-items-center flex-lg-fill mr-5 mb-2">
					<span class="mr-4">
						<i class="fa fa-trash font-size-h1"></i>
					</span>
					<div class="d-flex flex-column text-dark-75">
						<span class="font-weight-bolder font-size-sm">Failed SMS</span>
						<span class="font-weight-bolder font-size-h5">
						<span class="text-dark-50 font-weight-bold"></span>0</span>
					</div>
				</div>
				<!--end::Item-->
				<!--begin::Item-->
				<div class="d-flex align-items-center flex-lg-fill mr-5 mb-2">
					<span class="mr-4">
						<i class="fa fa-walking font-size-h1"></i>
					</span>
					<div class="d-flex flex-column flex-lg-fill">
						<span class="text-dark-75 font-weight-bolder font-size-sm">Pending SMS</span>
						<span class="font-weight-bolder font-size-h5">
						<span class="text-dark-50 font-weight-bold"></span>0</span>
					</div>
				</div>
				<!--end::Item-->

			</div>
			<!--begin::Items-->
		</div>
	</div>
	<!--end::Card-->
	<!--begin::Row-->
	<div class="row">
		<div class="col-lg-12">
			<!--begin::Advance Table Widget 2-->
			<div class="card card-custom card-stretch gutter-b">
				<!--begin::Header-->
				<div class="card-header border-0 pt-5">
					<h3 class="card-title align-items-start flex-column">
						<span class="card-label font-weight-bolder text-dark">Recent Top-ups</span>
						<span class="text-muted mt-3 font-weight-bold font-size-sm">Recent Top-up History</span>
					</h3>
				</div>
				<!--end::Header-->
				<!--begin::Body-->
				<div class="card-body pt-2 pb-0 mt-n3">
					<div class="tab-content mt-5" id="myTabTables11">
						<!--begin::Tap pane-->
						<div class="tab-pane fade show active" id="kt_tab_pane_11_3" role="tabpanel" aria-labelledby="kt_tab_pane_11_3">
							<!--begin::Table-->
							<div class="table-responsive">
								<table class="table table-borderless table-vertical-center">
									<thead>
										<tr>
											<th class="p-0 w-40px"></th>
											<th class="p-0 min-w-200px"></th>
											<th class="p-0 min-w-100px"></th>
											<th class="p-0 min-w-125px"></th>
											<th class="p-0 min-w-110px"></th>
										</tr>
									</thead>
									<tbody>
                                    <tr>
											<td class="pl-0 py-4">
												<div class="symbol symbol-50 symbol-light mr-1">
													<span class="symbol-label">
														<img src="https://preview.keenthemes.com/metronic/theme/html/demo1/dist/assets/media/svg/misc/006-plurk.svg" class="h-50 align-self-center" alt="" />
													</span>
												</div>
											</td>
											<td class="pl-0">
												<a href="#" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">SMS Top-Up</a>
												<div>
													<a class="text-muted font-weight-bold text-hover-primary" href="#">2 Jul 2021</a>
												</div>
											</td>
											<td class="text-right">
												<span class="text-dark-75 font-weight-bolder d-block font-size-lg">10,000 TZS</span>
												<span class="text-muted font-weight-bold">Paid</span>
											</td>
											<td class="text-right">
                                                <span class="text-dark-75 font-weight-bolder d-block font-size-lg">314</span>
												<span class="text-muted font-weight-bold">SMS Credits</span>
											</td>
											<td class="text-right">
												<span class="label label-lg label-light-primary label-inline">Approved</span>
											</td>
										</tr>
                                    </tbody>
								</table>
							</div>
							<!--end::Table-->
						</div>
						<!--end::Tap pane-->
					</div>
				</div>
				<!--end::Body-->
			</div>
			<!--end::Advance Table Widget 2-->
		</div>
	</div>
	<!--end::Row-->
	<!--begin::Row-->
	<div class="row">
		<div class="col-lg-12">
			<!--begin::Charts Widget 4-->
			<div class="card card-custom card-stretch gutter-b">
				<!--begin::Header-->
				<div class="card-header h-auto border-0">
					<div class="card-title py-5">
						<h3 class="card-label">
							<span class="d-block text-dark font-weight-bolder">SMS Usage</span>
							<span class="d-block text-muted mt-2 font-size-sm">Sent SMS Overview</span>
						</h3>
					</div>
				</div>
				<!--end::Header-->
				<!--begin::Body-->
				<div class="card-body">
                    <input type="hidden" value="{{$shop->outbox->sum('sms_count')}}" id="sent_sms">
					<div id="kt_charts_widget_4_chart"></div>
				</div>
				<!--end::Body-->
			</div>
			<!--end::Charts Widget 4-->
		</div>
	</div>
	<!--end::Row-->
</div>
@endsection

@section('page_js')
    <!--begin::Page Scripts(used by this page)-->
    <script src="{{url('/')}}/assets/js/pages/crud/file-upload/dropzonejs15aa.js?v=7.2.2"></script>
    <!--end::Page Scripts-->
    <!--begin::Page Scripts(used by this page)-->
    <script src="{{url('/')}}/assets/js/pages/custom/inbox/inbox15aa.js?v=7.2.2"></script>
    <!--end::Page Scripts-->
    <script src="{{url('/')}}/assets/js/pages/widgets15aa.js?v=7.2.2"></script>
@endsection
