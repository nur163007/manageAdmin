<div class="unauthoraisation">
    <div class="card" style="background-color: #CEECEE; border-radius: 15px;">
        <div class="card-body">
            <div class="row p-5" style="border: 1px solid grey; height: 190px; width: 100%; border-radius: 25px;">
                <div class="col-md-2">
                    <img src="{{asset('assets/images/logos/images.png')}}" alt="">
                </div>
                <div class="col-md-6 ml-5 notReject">
                    <h3 class="text-danger">Your request is pending for</h3>
                    <ul class="posAcountDashboard" style="list-style-type:none;">
                        {{--                        <li>Profile update</li>--}}
                        {{--                        <li>Document upload</li>--}}
                        {{--                        <li>Admin acceptance</li>--}}
                        {{--                        <li>Payment</li>--}}
                    </ul>
                </div>
                <div class="col-md-6 ml-5 isReject">
                    <h3 class="text-danger">Your request is rejected, Please</h3>
                    <ol>
                        <li>Check your profile and update correctly</li>
                        <li>Check your Document and upload correctly</li>
                        <li>Done your payment</li>
                    </ol>
                </div>

            </div>

            <h5 class="mt-5">Click here to complete your profile information <a href="{{route('user.profile')}}"
                                                                                class="btn btn-info">Go profile</a></h5>

        </div>
    </div>
</div>
<div class="authorized">
    <div class=" card hidePaymentBtn mb-5" style="background-color: #EFBBCC">
        <div class="ml-5">
            <h4 class="text-danger mt-3">Activation Notice</h4>
            <div style="border: 1px solid red;margin-top: -7px;margin-right: 30px;"></div>
            <h4 class="mb-5">Please confirm your payment to activate your POS account.
                <button class="btn bg-transparent" data-target="#makepaymentModal" data-toggle="modal"
                        data-original-title="Make Payment"><span class="hidden-xs text-danger"
                                                                 style="font-size: 17px;text-decoration: underline;margin-left: -15px;margin-right: -13px;">Click here</span>
                </button>
                to get the payment instruction and confirmation.
            </h4>
        </div>

    </div>
    <div class="dashbordIamge bg-transparent">
        <img src="{{asset('assets/images/logos/Dashboard-Not-Ready.png')}}" alt=""
             style="height: 310px; width: 350px;display: block;margin-left: auto;margin-right: auto;width: 50%;">
    </div>

    <!-- Modal -->
    <div class="modal fade" id="makepaymentModal" aria-hidden="true" aria-labelledby="exampleModalTitle" role="dialog">
        <div class="modal-dialog" role="document" style="max-width: 650px;">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Payment Instruction & Confirmation</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="ResetForm();">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h4 class="p-2 PayMethod" style="background-color: #9DE0FA;height: 38px;border-radius: 5px;">Make
                        your payment using any of method mentioned below
                    </h4>
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="font-weight-bold">bKash:</h4>
                            <h5> 01799409540 (Personal)</h5>
                        </div>
                        <div class="col-md-6">
                            <h4 class="font-weight-bold">Bank Account:</h4>
                            <h5>AQA TECHNOLOGY <br>
                                A/C # 1545-2026-7398-4001 <br>
                                Brac Bank Ltd.<br>
                                Shantinagar SME
                            </h5>
                        </div>
                    </div>
                    <h4 class="p-2 PayMethod" style="background-color: #9DE0FA;height: 38px;border-radius: 5px;">After
                        making payment please upload payment receipt or screenshot:
                    </h4>

                    <form id="getPaymentMethodForm">
                        @csrf
                        <div class="row">
                            <input type="hidden" class="posUser">
                            <div class="col-md-6">
                                <label class="font-weight-bold">Method:</label><br>
                                <label class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" name="paymentMethod" value="bKash">
                                    <span class="custom-control-label">bKash</span>
                                </label>
                                <label class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" name="paymentMethod" value="Bank">
                                    <span class="custom-control-label">Bank Accunt</span>
                                </label>
                            </div>
                            <div class="col-md-6">
                                <label class="font-weight-bold">Payment proofs:</label><br>
                                <div class="bg-white paymentOption">
                                    <img src="{{asset('assets/images/logos/uploadIcon1.png')}}" alt="Upload payment receipt or screenshot" id="hidePaymentProves">
                                    <img src="" alt="not found" id="showPaymentProves">
                                    <input type="file" name="paymentProve" id="paymentProve" class="my_payment"
                                           onchange="displayPaymentProves(this)">
                                </div>
                            </div>
                        </div>
                        <div class="text-right mr-4 mt-4">
                            <button type="button" class="btn btn-danger" onclick="ResetPaymentMethodForm()">Reset</button>
                            <input type="submit" name="submit" class="btn btn-success" id="uploadPaymentBtn" value="Submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal -->

    <!-- ROW-1 OPEN -->
    <div class="row hidePosDashbord">
        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
            <div class="card bg-primary img-card box-primary-shadow">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="text-white">
                            <h2 class="mb-0 number-font">23,536</h2>
                            <p class="text-white mb-0">Total Requests </p>
                        </div>
                        <div class="ml-auto"><i class="fa fa-send-o text-white fs-30 mr-2 mt-2"></i></div>
                    </div>
                </div>
            </div>
        </div><!-- COL END -->
        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
            <div class="card bg-secondary img-card box-secondary-shadow">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="text-white">
                            <h2 class="mb-0 number-font">45,789</h2>
                            <p class="text-white mb-0">Total Revenue</p>
                        </div>
                        <div class="ml-auto"><i class="fa fa-bar-chart text-white fs-30 mr-2 mt-2"></i></div>
                    </div>
                </div>
            </div>
        </div><!-- COL END -->
        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
            <div class="card  bg-success img-card box-success-shadow">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="text-white">
                            <h2 class="mb-0 number-font">89,786</h2>
                            <p class="text-white mb-0">Total Profit</p>
                        </div>
                        <div class="ml-auto"><i class="fa fa-dollar text-white fs-30 mr-2 mt-2"></i></div>
                    </div>
                </div>
            </div>
        </div><!-- COL END -->
        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
            <div class="card bg-info img-card box-info-shadow">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="text-white">
                            <h2 class="mb-0 number-font">43,336</h2>
                            <p class="text-white mb-0">Monthly Sales</p>
                        </div>
                        <div class="ml-auto"><i class="fa fa-cart-plus text-white fs-30 mr-2 mt-2"></i></div>
                    </div>
                </div>
            </div>
        </div><!-- COL END -->
    </div>
    <!-- ROW-1 CLOSED -->

</div>
