@extends('layouts.pay')

@section('content')
<div class="col-md-6">


<div class="accordion accordion-toggle-arrow" id="accordionExample1">
    <div class="card">
        <div class="card-header">
            <div class="card-title" data-toggle="collapse" data-target="#collapseOne1">
                Payment Details
            </div>
        </div>
        <div id="collapseOne1" class="collapse" data-parent="#accordionExample1">
            <div class="card-body">
                <table class="table table-borderless table-vertical-center">
                    <thead>
                        <tr>
                            <th class="p-0 min-w-150px"></th>
                            <th class="p-0 min-w-100px"></th>
                            <th class="p-0 min-w-90px"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="py-6 pl-0">
                                <a href="#" class="text-dark font-weight-bolder text-hover-primary mb-1 font-size-lg">Balance Due</a>
                                <span class="text-muted font-weight-bold d-block"></span>
                            </td>
                            <td>
                                
                            </td>
                            <td class="text-right pr-0">
                                <h3>TZS 10,000</h3>
                            </td>
                        </tr>
                        <tr>
                            <td class="pl-0">
                                <a href="#" class="text-dark font-weight-bolder text-hover-primary mb-1 font-size-lg">Amount Paid</a>
                                <span class="text-muted font-weight-bold d-block">Total Payable</span>
                            </td>
                            <td>
                                <div class="d-flex flex-column w-100 mr-2">
                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                        <span class="text-muted mr-2 font-size-sm font-weight-bold">10%</span>
                                        <span class="text-muted font-size-sm font-weight-bold">Progress</span>
                                    </div>
                                    <div class="progress progress-xs w-100">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 10%;" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </td>
                            <td class="text-right pr-0">
                                <a href="#" class="text-dark font-weight-bolder text-hover-primary mb-1 font-size-lg">TZS 1,000</a>
                                <span class="text-muted font-weight-bold d-block">TZS 9,000</span>
                            </td>
                        </tr>
                        <tr>                           
                            <td class="pl-0">
                                <a href="#" class="text-dark font-weight-bolder text-hover-primary mb-1 font-size-lg">Payment To</a>
                                <span class="text-muted font-weight-bold d-block">Paisha Services</span>
                            </td>
                            <td>
                                
                            </td>
                            <td class="text-right pr-0">
                                
                            </td>
                        </tr>
                        <tr>
                            <td class="pl-0" colspan="3">
                                <a href="#" class="text-dark font-weight-bolder text-hover-primary mb-1 font-size-lg">Description</a>
                                <span class="text-muted font-weight-bold d-block">Whallet ammount credited for user: Dahabu Saidi</span>
                            </td>
                           
                            
                        </tr>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
</div>

<hr>

<div class="card card-custom">

    <div class="card-body">
        <div class="card card-custom wave wave-animate wave-danger">
            <div class="card-body">
             <div class=" align-items-center p-5">
              
              <div class=" " style="align-items: center">
                <h1 style="text-align: center;">
                    <table style="margin-left:auto;margin-right:auto;">
                        <thead>
                            <td style="font-size: 12px" colspan="7">Please Make your Payment in</td>
                        </thead>
                        <tbody>
                        <tr>
                            <td style="color: red">00</td>
                            <td style="color: black">:</td>
                            <td style="color: red">11</td>
                            <td style="color: black">:</td>
                            <td style="color: red">51</td>
                            <td style="color: black">:</td>
                            <td style="color: red">30</td>
                        </tr>
                        <tr>
                            <td style="font-size: 8px">DAYS</td>
                            <td style="font-size: 8px"></td>
                            <td style="font-size: 8px">HOURS</td>
                            <td style="font-size: 8px"></td>
                            <td style="font-size: 8px">MINUTES</td>
                            <td style="font-size: 8px"></td>
                            <td style="font-size: 8px">SECONDS</td>
                        </tr>
                            
                        </tbody>
                    </table>
                </h1>
              </div>
             </div>
            </div>
           </div>
    </div>
       <div class="card-footer justify-content-between">
           <h3 style="text-align: center">Select Payment Option</h3>
           <div class="row">

            <div class="col-4" >
                <!--begin::Card-->
                <div class="card card-custom card-stretch" style="box-shadow: 0 1px 3px 0 gray">
                
                    <div class="card-body p-3">
                        <img width="100%" src="/logo/airtel.png">
                    </div>
                </div>
                <!--end::Card-->
            </div>
            <div class="col-4" >
                <!--begin::Card-->
                <div class="card card-custom card-stretch" style="box-shadow: 0 1px 3px 0 gray">
                    
                    <div class="card-body p-3">
                        <img width="100%" src="/logo/tigo.png">
                    </div>
                </div>
                <!--end::Card-->
            </div>
            <div class="col-4" >
                <!--begin::Card-->
                <div class="card card-custom card-stretch" style="box-shadow: 0 1px 3px 0 gray">
                    
                    <div class="card-body p-3">
                        <img width="100%" src="/logo/mpesa.jpg">
                    </div>
                </div>
                <!--end::Card-->
            </div>
        </div>
    </div>
</div>

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<footer>
    <div class="footer bg-gray py-4 d-flex flex-lg-column" id="kt_footer">
        <!--begin::Container-->
        <div class="container-fluid d-flex flex-column flex-md-row align-items-center justify-content-between">
            <!--begin::Copyright-->
            <div class="text-dark order-2 order-md-1">
                <span class="text-muted font-weight-bold mr-2">2022©</span>
                <a href="http://keenthemes.com/metronic" target="_blank" class="text-dark-75 text-hover-primary">Powerd By Paisha</a>
            </div>
            <!--end::Copyright-->
            <!--begin::Nav-->
           
                <div class="card-body p-3" >
                    <img width="60%" style="display: block;
                    margin-left: auto;
                    margin-right: auto;" src="/logo/paisha.png">
                </div>
            <!--end::Nav-->
        </div>
        <!--end::Container-->
    </div>
</footer>

</div>

@endsection