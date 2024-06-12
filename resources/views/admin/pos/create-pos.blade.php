@extends('admin.main')
@section('title','pos create')
@section('css')
    {{--    <link href="{{ URL::asset('assets/plugins/morris/morris.css')}}" rel="stylesheet">--}}
    <link href="{{ URL::asset('assets/css/registration.css')}}" rel="stylesheet">
    {{--        <link href="{{ URL::asset('assets/css/templatemo-onix-digital.css')}}" rel="stylesheet">--}}
@endsection
@section('page-header')
    <!-- PAGE-HEADER -->
    <div>
        <h1 class="page-title">Dashboard</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">POS User Registration Form</li>
        </ol>
    </div>
    <!-- PAGE-HEADER END -->
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form class="register-form needs-validation" id="register-form-pos" novalidate>
                        @csrf
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-7">
                                    <h2 class="form-heading">Order for POS service</h2>
                                    <input type="hidden" name="request_type" id="request_type" value="2">
                                    <input type="hidden" name="partnerHiddenId" id="partnerHiddenId" value="">
                                    <div class="row">
                                        <div class="col-sm-6 col-12">
                                            <div class="form-group">
                                                <label for="package">Package<i class="fa fa-asterisk"
                                                                               style="color: red; font-size: 8px; vertical-align: top;"></i></label>
                                                <select class="package" name="package" id="package"
                                                        onchange="RefreshOrderSummary()">
                                                    <option value="1">Basic</option>
                                                    <option value="2">Standard</option>
                                                    <option value="3">Premium</option>
                                                    <option value="4">Enterprise</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-12">
                                            <div class="form-group">
                                                <label for="billing_cycle ">Billing cycle<i
                                                        class="fa fa-asterisk"
                                                        style="color: red; font-size: 8px; vertical-align: top;"></i></label>
                                                <select class="billing_cycle" name="billing_cycle"
                                                        id="billing_cycle"
                                                        onchange="RefreshOrderSummary()">
                                                    <option value="1">Monthly</option>
                                                    <option value="2">Yearly</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-12">
                                            <div class="form-group">
                                                <label for="business_name">Business Name <i
                                                        class="fa fa-asterisk"
                                                        style="color: red; font-size: 8px; vertical-align: top;"></i></label>
                                                <input type="text" name="company"
                                                       placeholder="Enter your Business Name"
                                                       id="business_name" required/>
                                                <div class="invalid-feedback">
                                                    Please Enter your Business Name
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-12">
                                            <div class="form-group">
                                                <label for="business_type">Business Type<i
                                                        class="fa fa-asterisk"
                                                        style="color: red; font-size: 8px; vertical-align: top;"></i></label>
                                                <select class="business_type" name="company_type"
                                                        id="business_type">
                                                    <option value="1">Retail</option>
                                                    <option value="2">Pharmecy</option>
                                                    <option value="3">Jwelary</option>
                                                    <option value="4">Electronic</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-12">
                                            <div class="form-group">
                                                <!-- <label for="website">Website </i></label>
                                                <input type="text" name="website" id="website" placeholder="www.example.com" /> -->
                                                <label for="Email">Email <i class="fa fa-asterisk"
                                                                            style="color: red; font-size: 8px; vertical-align: top;"></i></label>
                                                <input type="email" name="email" id="email"
                                                       placeholder="example@gmail.com"
                                                       required>
                                                <div class="invalid-feedback">
                                                    Please Enter your Email Address
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                            <h5 style="margin: 10px 0px; font-size: medium; font-weight: bold;">
                                                Owner Information</h5>
                                        </div>
                                        <div class="col-sm-6 col-12">
                                            <div class="form-group">
                                                <label for="contact_fname">First Name<i
                                                        class="fa fa-asterisk"
                                                        style="color: red; font-size: 8px; vertical-align: top;"></i></label>
                                                <input type="text" name="first_name" id="contact_fname"
                                                       placeholder="Enter First Name" required>
                                                <div class="invalid-feedback">
                                                    Please Enter Name
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-12">
                                            <div class="form-group">
                                                <label for="contact_lname">Last Name<i
                                                        class="fa fa-asterisk"
                                                        style="color: red; font-size: 8px; vertical-align: top;"></i></label>
                                                <input type="text" name="last_name" id="contact_lname"
                                                       placeholder="Enter Last Name"
                                                       required>
                                                <div class="invalid-feedback">
                                                    Please Enter Name
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-12">
                                            <div class="form-group">
                                                <label for="contact_number">Number <i class="fa fa-asterisk"
                                                                                      style="color: red; font-size: 8px; vertical-align: top;"></i></label>
                                                <input type="text" name="mobile" id="contact_number"
                                                       placeholder="+880" required>
                                                <span id="spnOwnerPhoneStatus"
                                                      style="color: #dc3545; font-size:.875em; font-weight: 400; text-transform: capitalize; opacity: 1;"></span>
                                                <div class="invalid-feedback">
                                                    Please Enter Number
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-12">
                                            <div class="form-group">
                                                <label for="nid">NID <i class="fa fa-asterisk"
                                                                        style="color: red; font-size: 8px; vertical-align: top;"></i></label>
                                                <input type="text" name="nid" id="nid"
                                                       placeholder="XX-XXXX-XXX"
                                                       required>
                                                <span id="spnNIDStatus"
                                                      style="color: #dc3545; font-size:.875em; font-weight: 400; text-transform: capitalize; opacity: 1;"></span>
                                                <div class="invalid-feedback">
                                                    Please Enter your NID
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-12">
                                            <div class="form-group">
                                                <label for="address">Address <i class="fa fa-asterisk"
                                                                                style="color: red; font-size: 8px; vertical-align: top;"></i></label>
                                                <input type="text" name="address" id="adress" required>
                                                <div class="invalid-feedback">
                                                    Please Enter Address
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-12">
                                            <div class="form-group">
                                                <label for="state">State / Division<i class="fa fa-asterisk"
                                                                                      style="color: red; font-size: 8px; vertical-align: top;"></i></label>
                                                <input type="text" name="state" id="state" required>
                                                <div class="invalid-feedback">
                                                    Please Enter State / Division
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-6 col-12">
                                            <div class="form-group">
                                                <label for="city">City <i class="fa fa-asterisk"
                                                                          style="color: red; font-size: 8px; vertical-align: top;"></i></label>
                                                <input type="text" name="city" id="city" required>
                                                <div class="invalid-feedback">
                                                    Please Enter your City
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-12">
                                            <div class="form-group">
                                                <label for="zipcode">Zip Code <i class="fa fa-asterisk"
                                                                                 style="color: red; font-size: 8px; vertical-align: top;"></i></label>
                                                <input type="text" name="zip_code" id="zipcode" required>
                                                <div class="invalid-feedback">
                                                    Please Enter your Zip Code
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-12">
                                            <div class="form-group">
                                                <label for="country">Country <i class="fa fa-asterisk"
                                                                                style="color: red; font-size: 8px; vertical-align: top;"></i></label>
                                                <select class="pos_country" name="country" id="pos_country">
                                                    <option value="BD">Bangladesh</option>
                                                    <option value="IN">India</option>
                                                    <option value="PK">Pakistan</option>
                                                    <option value="US">United States</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-5 col-12" id="possummDiv">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="container-fluid orderSummary">
                                                <p class="my-4 mx-0" style="font-size: 30px; text-align: center;">
                                                    Order Summery
                                                </p>

                                                <div class="row">
                                                    <div class="col-xl-9 col-sm-9 col-9">
                                                        <p><span id="packageChange">Basic</span> Package(<span
                                                                id="monthChange">Monthly</span>)</p>
                                                    </div>
                                                    <div class="col-xl-3 col-sm-3 col-3">
                                                        <p class="float-end" id="packageValue">700Tk</p>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-xl-9 col-sm-9 col-9">
                                                        <div class="form-group">
                                                            <input type="hidden" id="is_extended_support"
                                                                   name="is_extended_support"
                                                                   value="0">
                                                            <input class="form-check-input float-left" type="checkbox"
                                                                   id="CheckDefault"
                                                                   onclick="RefreshOrderSummary()"/>
                                                            <label class="form-check-label"
                                                                   style="font-weight: normal;"
                                                                   for="flexCheckDefault">
                                                                Extended Support <span id="extmonth">Monthly</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-3 col-sm-3 col-3">
                                                        <input type="hidden" name="support_amount"
                                                               id="support_amount" value="0">
                                                        <p class="float-end" id="extsupport">0Tk</p>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-xl-9 col-sm-9 col-9">
                                                        <p>Total: </p>
                                                    </div>

                                                    <div class="col-xl-3 col-sm-3 col-3">
                                                        <p class="float-end" id="tdue">700Tk
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="row" id="discountHide">
                                                    <div class="col-xl-9 col-sm-9 col-9">
                                                        <p>Discount: </p>
                                                    </div>

                                                    <div class="col-xl-3 col-sm-3 col-3">
                                                        <p class="float-end" id="disc">0Tk</p>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-xl-9 col-sm-9 col-9">
                                                        <p>Total Amount: </p>
                                                    </div>

                                                    <div class="col-xl-3 col-sm-3 col-3">
                                                        <p class="float-end" id="totalAmount">700Tk</p>
                                                    </div>
                                                </div>
                                                <hr>

                                                <div class="row">
                                                    <div class="col-xl-9 col-sm-9 col-9">
                                                        <p>Setup Cost (One time)</p>
                                                    </div>
                                                    <div class="col-xl-3 col-sm-3 col-3">
                                                        <input type="hidden" name="registration_amount"
                                                               id="registration_amount"
                                                               value="2000">
                                                        <p class="float-end" id="setCost">2000Tk</p>
                                                    </div>
                                                </div>
                                                <hr style="border: 2px solid black;">

                                                <div class="row">

                                                    <div class="col-xl-12 col-sm-12 col-12">
                                                        <!-- <p class="float-end fw-bold">Total Due: 3700Tk
                                                    </p> -->
                                                        <p class="float-right font-weight-bold">Grand Total: <span
                                                                id="Gtotal">2700Tk</span>
                                                        </p>
                                                    </div>
                                                </div>
                                                <hr style="border: 2px solid black;">
                                                <div class="text-left">
                                                    <input type="hidden" name="billing_amount" id="billing_amount"
                                                           value="700">
                                                    <p><i class="fa fa-info-circle" style="color: #367bf2;"></i>
                                                        Your recurrent bill
                                                        will be <a><u class="text-info"
                                                                      style="text-decoration: none;"
                                                                      id="GTotalwarn">700Tk</u></a>
                                                    </p>
                                                </div>
                                                <div class="col-lg-12 col-sm-12 col-xl-12 col-12">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                               id="invalidCheck"
                                                               required/>
                                                        <label class="form-check-label" for="invalidCheck">&nbsp;
                                                            Agree to terms and conditions
                                                        </label>
                                                        <div class="invalid-feedback">
                                                            You must agree before submitting.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-submit">
                                                    <!-- <input type="submit" value="Reset All" class="submit" name="reset" id="reset" /> -->
                                                    <input type="submit" value="Submit Form" class=submit
                                                           name="submit" id="submit"/>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div><!-- COL END -->
    </div>

@endsection
@section('js')

    <script type="text/javascript">
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            let getUserData = localStorage.getItem("userData");

            var result = JSON.parse(getUserData);

            var userId = result.id;

            $("#partnerHiddenId").val(userId);

            $('#mobile').blur(function (e) {
                if (validatePhone('mobile') == true) {
                    $('#spnPhoneStatus').html('Valid');
                    $('#spnPhoneStatus').css('color', 'green');
                } else {
                    $('#spnPhoneStatus').html('Invalid');
                    $('#spnPhoneStatus').css('color', 'red');
                }
            });
            $('#contact_number').blur(function (e) {
                if (validatePhone('contact_number') == true) {
                    $('#spnOwnerPhoneStatus').html('Valid');
                    $('#spnOwnerPhoneStatus').css('color', 'green');
                } else {
                    $('#spnOwnerPhoneStatus').html('Invalid');
                    $('#spnOwnerPhoneStatus').css('color', 'red');
                }
            });
            $('#nid').blur(function (e) {
                if (validatePhone('nid')) {
                    $('#spnNIDStatus').html('Valid');
                    $('#spnNIDStatus').css('color', 'green');
                } else {
                    $('#spnNIDStatus').html('Invalid');
                    $('#spnNIDStatus').css('color', 'red');
                }
            });

            $('#register-form-pos').on("submit", function (event) {
                event.preventDefault();
                var form = $(this).serialize();
                $.ajax({
                    url: "api/register",
                    data: form,
                    type: "POST",
                    success: function (response) {
                        $("#register-form-pos")[0].reset();
                        Toast.fire({
                            type: 'success',
                            title: response.msg,
                        });
                    }
                });
            });
        });

        window.onload = function () {
            $("div#discountHide").hide();
        };

        function RefreshOrderSummary() {

            var extendedSupportvalue = 1000;
            var NoExtSuppValue = 0;
            var setupCost = 2000;

            var monthlyPackagevalue = [700, 1200, 1600, 2900];
            var yearlyPackagevalue = [700 * 12, 1200 * 12, 1600 * 12, 2900 * 12]


            document.getElementById("setCost").innerHTML = setupCost + "Tk";

            var CheckBox = document.getElementById("CheckDefault");
            var pack = document.getElementById("package");
            var billcycle = document.getElementById("billing_cycle");
            document.getElementById("registration_amount").value = setupCost;


            if (pack.value == '1' & billcycle.value == '1') {
                document.getElementById("packageChange").innerHTML = "Basic";
                document.getElementById("monthChange").innerHTML = "Monthly";
                document.getElementById("extmonth").innerHTML = "Monthly";
                document.getElementById("packageValue").innerHTML = monthlyPackagevalue[0] + "Tk";
                $("div#discountHide").hide();
                if (document.getElementById("CheckDefault").checked == false) {
                    var totalDue = monthlyPackagevalue[0] + NoExtSuppValue;
                    var discount = (monthlyPackagevalue[0] * 0) / 100;
                    var totalAmount = totalDue - discount;
                    var grandTotal = totalAmount + setupCost;
                    document.getElementById("tdue").innerHTML = totalDue + "Tk";
                    document.getElementById("disc").innerHTML = discount + "Tk";
                    document.getElementById("totalAmount").innerHTML = totalAmount + "Tk";
                    document.getElementById("Gtotal").innerHTML = grandTotal + "Tk";
                    document.getElementById("GTotalwarn").innerHTML = totalAmount + "Tk";
                    document.getElementById("billing_amount").value = totalAmount;

                } else {
                    var totalDue = monthlyPackagevalue[0] + extendedSupportvalue;
                    var discount = (monthlyPackagevalue[0] * 0) / 100;
                    var totalAmount = totalDue - discount;
                    var grandTotal = totalAmount + setupCost;
                    document.getElementById("tdue").innerHTML = totalDue + "Tk";
                    document.getElementById("disc").innerHTML = discount + "Tk";
                    document.getElementById("totalAmount").innerHTML = totalAmount + "Tk";
                    document.getElementById("Gtotal").innerHTML = grandTotal + "Tk";
                    document.getElementById("GTotalwarn").innerHTML = totalAmount + "Tk";
                    document.getElementById("billing_amount").value = totalAmount;

                }
                if (CheckBox.checked == false) {
                    document.getElementById("extsupport").innerHTML = NoExtSuppValue + "Tk";
                    document.getElementById("support_amount").value = NoExtSuppValue;
                    document.getElementById("is_extended_support").value = 0;
                } else {
                    document.getElementById("extsupport").innerHTML = extendedSupportvalue + "Tk";
                    document.getElementById("support_amount").value = extendedSupportvalue;
                    document.getElementById("is_extended_support").value = 1;
                }
            } else if (pack.value == '1' & billcycle.value == '2') {
                document.getElementById("packageChange").innerHTML = "Basic";
                document.getElementById("monthChange").innerHTML = "Yearly";
                document.getElementById("extmonth").innerHTML = "Yearly";
                document.getElementById("packageValue").innerHTML = yearlyPackagevalue[0] + "Tk";
                $("div#discountHide").show();
                if (document.getElementById("CheckDefault").checked == false) {
                    var totalDue = yearlyPackagevalue[0] + NoExtSuppValue;
                    var discount = (yearlyPackagevalue[0] * 10) / 100;
                    var totalAmount = totalDue - discount;
                    var grandTotal = totalAmount + setupCost;
                    document.getElementById("tdue").innerHTML = totalDue + "Tk";
                    document.getElementById("disc").innerHTML = discount + "Tk";
                    document.getElementById("totalAmount").innerHTML = totalAmount + "Tk";
                    document.getElementById("Gtotal").innerHTML = grandTotal + "Tk";
                    document.getElementById("GTotalwarn").innerHTML = totalAmount + "Tk";
                    document.getElementById("billing_amount").value = totalAmount;
                } else {
                    var totalDue = yearlyPackagevalue[0] + extendedSupportvalue * 12;
                    var discount = (yearlyPackagevalue[0] * 10) / 100;
                    var totalAmount = totalDue - discount;
                    var grandTotal = totalAmount + setupCost;
                    document.getElementById("tdue").innerHTML = totalDue + "Tk";
                    document.getElementById("disc").innerHTML = discount + "Tk";
                    document.getElementById("totalAmount").innerHTML = totalAmount + "Tk";
                    document.getElementById("Gtotal").innerHTML = grandTotal + "Tk";
                    document.getElementById("GTotalwarn").innerHTML = totalAmount + "Tk";
                    document.getElementById("billing_amount").value = totalAmount;
                }
                if (CheckBox.checked == false) {
                    document.getElementById("extsupport").innerHTML = NoExtSuppValue + "Tk";
                    document.getElementById("support_amount").value = NoExtSuppValue;
                    document.getElementById("is_extended_support").value = 0;
                } else {
                    document.getElementById("extsupport").innerHTML = extendedSupportvalue * 12 + "Tk";
                    document.getElementById("support_amount").value = extendedSupportvalue;
                    document.getElementById("is_extended_support").value = 1;
                }
            } else if (pack.value == '2' & billcycle.value == '1') {
                document.getElementById("packageChange").innerHTML = "Standard";
                document.getElementById("monthChange").innerHTML = "Monthly";
                document.getElementById("extmonth").innerHTML = "Monthly";
                document.getElementById("packageValue").innerHTML = monthlyPackagevalue[1] + "Tk";
                $("div#discountHide").hide();
                if (document.getElementById("CheckDefault").checked == false) {
                    var totalDue = monthlyPackagevalue[1] + NoExtSuppValue;
                    var discount = (monthlyPackagevalue[1] * 0) / 100;
                    var totalAmount = totalDue - discount;
                    var grandTotal = totalAmount + setupCost;
                    document.getElementById("tdue").innerHTML = totalDue + "Tk";
                    document.getElementById("disc").innerHTML = discount + "Tk";
                    document.getElementById("totalAmount").innerHTML = totalAmount + "Tk";
                    document.getElementById("Gtotal").innerHTML = grandTotal + "Tk";
                    document.getElementById("GTotalwarn").innerHTML = totalAmount + "Tk";
                    document.getElementById("billing_amount").value = totalAmount;
                } else {
                    var totalDue = monthlyPackagevalue[1] + extendedSupportvalue;
                    var discount = (monthlyPackagevalue[1] * 0) / 100;
                    var totalAmount = totalDue - discount;
                    var grandTotal = totalAmount + setupCost;
                    document.getElementById("tdue").innerHTML = totalDue + "Tk";
                    document.getElementById("disc").innerHTML = discount + "Tk";
                    document.getElementById("totalAmount").innerHTML = totalAmount + "Tk";
                    document.getElementById("Gtotal").innerHTML = grandTotal + "Tk";
                    document.getElementById("GTotalwarn").innerHTML = totalAmount + "Tk";
                    document.getElementById("billing_amount").value = totalAmount;
                }
                if (CheckBox.checked == false) {
                    document.getElementById("extsupport").innerHTML = NoExtSuppValue + "Tk";
                    document.getElementById("support_amount").value = NoExtSuppValue;
                    document.getElementById("is_extended_support").value = 0;
                } else {
                    document.getElementById("extsupport").innerHTML = extendedSupportvalue + "Tk";
                    document.getElementById("support_amount").value = extendedSupportvalue;
                    document.getElementById("is_extended_support").value = 1;
                }
            } else if (pack.value == '2' & billcycle.value == '2') {
                document.getElementById("packageChange").innerHTML = "Standard";
                document.getElementById("monthChange").innerHTML = "Yearly";
                document.getElementById("extmonth").innerHTML = "Yearly";
                document.getElementById("packageValue").innerHTML = yearlyPackagevalue[1] + "Tk";
                $("div#discountHide").show();
                if (document.getElementById("CheckDefault").checked == false) {
                    var totalDue = yearlyPackagevalue[1] + NoExtSuppValue;
                    var discount = (yearlyPackagevalue[1] * 10) / 100;
                    var totalAmount = totalDue - discount;
                    var grandTotal = totalAmount + setupCost;
                    document.getElementById("tdue").innerHTML = totalDue + "Tk";
                    document.getElementById("disc").innerHTML = discount + "Tk";
                    document.getElementById("totalAmount").innerHTML = totalAmount + "Tk";
                    document.getElementById("Gtotal").innerHTML = grandTotal + "Tk";
                    document.getElementById("GTotalwarn").innerHTML = totalAmount + "Tk";
                    document.getElementById("billing_amount").value = totalAmount;
                } else {
                    var totalDue = yearlyPackagevalue[1] + extendedSupportvalue;
                    var discount = (yearlyPackagevalue[1] * 10) / 100;
                    var totalAmount = totalDue - discount;
                    var grandTotal = totalAmount + setupCost;
                    document.getElementById("tdue").innerHTML = totalDue + "Tk";
                    document.getElementById("disc").innerHTML = discount + "Tk";
                    document.getElementById("totalAmount").innerHTML = totalAmount + "Tk";
                    document.getElementById("Gtotal").innerHTML = grandTotal + "Tk";
                    document.getElementById("GTotalwarn").innerHTML = totalAmount + "Tk";
                    document.getElementById("billing_amount").value = totalAmount;
                }
                if (CheckBox.checked == false) {
                    document.getElementById("extsupport").innerHTML = NoExtSuppValue + "Tk";
                    document.getElementById("support_amount").value = NoExtSuppValue;
                    document.getElementById("is_extended_support").value = 0;
                } else {
                    document.getElementById("extsupport").innerHTML = extendedSupportvalue * 12 + "Tk";
                    document.getElementById("support_amount").value = extendedSupportvalue;
                    document.getElementById("is_extended_support").value = 1;
                }
            } else if (pack.value == '3' & billcycle.value == '1') {
                document.getElementById("packageChange").innerHTML = "Premium";
                document.getElementById("monthChange").innerHTML = "Monthly";
                document.getElementById("extmonth").innerHTML = "Monthly";
                document.getElementById("packageValue").innerHTML = monthlyPackagevalue[2] + "Tk";
                $("div#discountHide").hide();
                if (document.getElementById("CheckDefault").checked == false) {
                    var totalDue = monthlyPackagevalue[2] + NoExtSuppValue;
                    var discount = (monthlyPackagevalue[2] * 0) / 100;
                    var totalAmount = totalDue - discount;
                    var grandTotal = totalAmount + setupCost;
                    document.getElementById("tdue").innerHTML = totalDue + "Tk";
                    document.getElementById("disc").innerHTML = discount + "Tk";
                    document.getElementById("totalAmount").innerHTML = totalAmount + "Tk";
                    document.getElementById("Gtotal").innerHTML = grandTotal + "Tk";
                    document.getElementById("GTotalwarn").innerHTML = totalAmount + "Tk";
                    document.getElementById("billing_amount").value = totalAmount;
                } else {
                    var totalDue = monthlyPackagevalue[2] + extendedSupportvalue;
                    var discount = (monthlyPackagevalue[2] * 0) / 100;
                    var totalAmount = totalDue - discount;
                    var grandTotal = totalAmount + setupCost;
                    document.getElementById("tdue").innerHTML = totalDue + "Tk";
                    document.getElementById("disc").innerHTML = discount + "Tk";
                    document.getElementById("totalAmount").innerHTML = totalAmount + "Tk";
                    document.getElementById("Gtotal").innerHTML = grandTotal + "Tk";
                    document.getElementById("GTotalwarn").innerHTML = totalAmount + "Tk";
                    document.getElementById("billing_amount").value = totalAmount;
                }
                if (CheckBox.checked == false) {
                    document.getElementById("extsupport").innerHTML = NoExtSuppValue + "Tk";
                    document.getElementById("support_amount").value = NoExtSuppValue;
                    document.getElementById("is_extended_support").value = 0;
                } else {
                    document.getElementById("extsupport").innerHTML = extendedSupportvalue + "Tk";
                    document.getElementById("support_amount").value = extendedSupportvalue;
                    document.getElementById("is_extended_support").value = 1;
                }
            } else if (pack.value == '3' & billcycle.value == '2') {
                document.getElementById("packageChange").innerHTML = "Premium";
                document.getElementById("monthChange").innerHTML = "Yearly";
                document.getElementById("extmonth").innerHTML = "Yearly";
                document.getElementById("packageValue").innerHTML = yearlyPackagevalue[2] + "Tk";
                $("div#discountHide").show();
                if (document.getElementById("CheckDefault").checked == false) {
                    var totalDue = yearlyPackagevalue[2] + NoExtSuppValue;
                    var discount = (yearlyPackagevalue[2] * 10) / 100;
                    var totalAmount = totalDue - discount;
                    var grandTotal = totalAmount + setupCost;
                    document.getElementById("tdue").innerHTML = totalDue + "Tk";
                    document.getElementById("disc").innerHTML = discount + "Tk";
                    document.getElementById("totalAmount").innerHTML = totalAmount + "Tk";
                    document.getElementById("Gtotal").innerHTML = grandTotal + "Tk";
                    document.getElementById("GTotalwarn").innerHTML = totalAmount + "Tk";
                    document.getElementById("billing_amount").value = totalAmount;
                } else {
                    var totalDue = yearlyPackagevalue[2] + extendedSupportvalue;
                    var discount = (yearlyPackagevalue[2] * 10) / 100;
                    var totalAmount = totalDue - discount;
                    var grandTotal = totalAmount + setupCost;
                    document.getElementById("tdue").innerHTML = totalDue + "Tk";
                    document.getElementById("disc").innerHTML = discount + "Tk";
                    document.getElementById("totalAmount").innerHTML = totalAmount + "Tk";
                    document.getElementById("Gtotal").innerHTML = grandTotal + "Tk";
                    document.getElementById("GTotalwarn").innerHTML = totalAmount + "Tk";
                    document.getElementById("billing_amount").value = totalAmount;
                }
                if (CheckBox.checked == false) {
                    document.getElementById("extsupport").innerHTML = NoExtSuppValue + "Tk";
                    document.getElementById("support_amount").value = NoExtSuppValue;
                    document.getElementById("is_extended_support").value = 0;
                } else {
                    document.getElementById("extsupport").innerHTML = extendedSupportvalue * 12 + "Tk";
                    document.getElementById("support_amount").value = extendedSupportvalue;
                    document.getElementById("is_extended_support").value = 1;
                }
            } else if (pack.value == '4' & billcycle.value == '1') {
                document.getElementById("packageChange").innerHTML = "Enterprise";
                document.getElementById("monthChange").innerHTML = "Monthly";
                document.getElementById("extmonth").innerHTML = "Monthly";
                document.getElementById("packageValue").innerHTML = monthlyPackagevalue[3] + "Tk";
                $("div#discountHide").hide();
                if (document.getElementById("CheckDefault").checked == false) {
                    var totalDue = monthlyPackagevalue[3] + NoExtSuppValue;
                    var discount = (monthlyPackagevalue[3] * 0) / 100;
                    var totalAmount = totalDue - discount;
                    var grandTotal = totalAmount + setupCost;
                    document.getElementById("tdue").innerHTML = totalDue + "Tk";
                    document.getElementById("disc").innerHTML = discount + "Tk";
                    document.getElementById("totalAmount").innerHTML = totalAmount + "Tk";
                    document.getElementById("Gtotal").innerHTML = grandTotal + "Tk";
                    document.getElementById("GTotalwarn").innerHTML = totalAmount + "Tk";
                    document.getElementById("billing_amount").value = totalAmount;
                } else {
                    var totalDue = monthlyPackagevalue[3] + extendedSupportvalue;
                    var discount = (monthlyPackagevalue[3] * 0) / 100;
                    var totalAmount = totalDue - discount;
                    var grandTotal = totalAmount + setupCost;
                    document.getElementById("tdue").innerHTML = totalDue + "Tk";
                    document.getElementById("disc").innerHTML = discount + "Tk";
                    document.getElementById("totalAmount").innerHTML = totalAmount + "Tk";
                    document.getElementById("Gtotal").innerHTML = grandTotal + "Tk";
                    document.getElementById("GTotalwarn").innerHTML = totalAmount + "Tk";
                    document.getElementById("billing_amount").value = totalAmount;
                }
                if (CheckBox.checked == false) {
                    document.getElementById("extsupport").innerHTML = NoExtSuppValue + "Tk";
                    document.getElementById("support_amount").value = NoExtSuppValue;
                    document.getElementById("is_extended_support").value = 0;
                } else {
                    document.getElementById("extsupport").innerHTML = extendedSupportvalue + "Tk";
                    document.getElementById("support_amount").value = extendedSupportvalue;
                    document.getElementById("is_extended_support").value = 1;
                }

            } else if (pack.value == '4' & billcycle.value == '2') {
                document.getElementById("packageChange").innerHTML = "Enterprise";
                document.getElementById("monthChange").innerHTML = "Yearly";
                document.getElementById("extmonth").innerHTML = "Yearly";
                document.getElementById("packageValue").innerHTML = yearlyPackagevalue[3] + "Tk";
                $("div#discountHide").show();
                if (document.getElementById("CheckDefault").checked == false) {
                    var totalDue = yearlyPackagevalue[3] + NoExtSuppValue;
                    var discount = (yearlyPackagevalue[3] * 10) / 100;
                    var totalAmount = totalDue - discount;
                    var grandTotal = totalAmount + setupCost;
                    document.getElementById("tdue").innerHTML = totalDue + "Tk";
                    document.getElementById("disc").innerHTML = discount + "Tk";
                    document.getElementById("totalAmount").innerHTML = totalAmount + "Tk";
                    document.getElementById("Gtotal").innerHTML = grandTotal + "Tk";
                    document.getElementById("GTotalwarn").innerHTML = totalAmount + "Tk";
                    document.getElementById("billing_amount").value = totalAmount;
                } else {
                    var totalDue = yearlyPackagevalue[3] + extendedSupportvalue;
                    var discount = (yearlyPackagevalue[3] * 10) / 100;
                    var totalAmount = totalDue - discount;
                    var grandTotal = totalAmount + setupCost;
                    document.getElementById("tdue").innerHTML = totalDue + "Tk";
                    document.getElementById("disc").innerHTML = discount + "Tk";
                    document.getElementById("totalAmount").innerHTML = totalAmount + "Tk";
                    document.getElementById("Gtotal").innerHTML = grandTotal + "Tk";
                    document.getElementById("GTotalwarn").innerHTML = totalAmount + "Tk";
                    document.getElementById("billing_amount").value = totalAmount;
                }
                if (CheckBox.checked == false) {
                    document.getElementById("extsupport").innerHTML = NoExtSuppValue + "Tk";
                    document.getElementById("support_amount").value = NoExtSuppValue;
                    document.getElementById("is_extended_support").value = 0;
                } else {
                    document.getElementById("extsupport").innerHTML = extendedSupportvalue * 12 + "Tk";
                    document.getElementById("support_amount").value = extendedSupportvalue;
                    document.getElementById("is_extended_support").value = 1;
                }
            }
        }

        // validate mobile number

        function validatePhone(mobile) {
            var a = document.getElementById(mobile).value;
            var filter = /(^(\+88|0088)?(01){1}[3456789]{1}(\d){8})$/;
            // var filter = /^\d{11}$/;
            // var filter = /^1?([0-10])(\\d{9})$/;
            if (filter.test(a)) {
                return true;
            } else {
                return false;
            }
        }

        // validate owner number

        function validatePhone(contact_number) {
            var a = document.getElementById(contact_number).value;
            var filter = /(^(\+88|0088)?(01){1}[3456789]{1}(\d){8})$/;
            // var filter = /^\d{11}$/;
            // var filter = /^1?([0-9])(\\d{11})$/;
            if (filter.test(a)) {
                return true;
            } else {
                return false;
            }
        }

        // validate NID

        function validatePhone(nid) {
            var a = document.getElementById(nid).value;
            var filter1 = /^[0-9]{3}\d{7}$/;
            var filter2 = /^[0-9]{3}\d{10}$/;
            var filter3 = /^[0-9]{3}\d{14}$/;
            if (filter1.test(a) || filter2.test(a) || filter3.test(a)) {
                return true;
            } else {
                return false;
            }
        }

        (function () {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.prototype.slice.call(forms)
                .forEach(function (form) {
                    form.addEventListener('submit', function (event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }

                        form.classList.add('was-validated')
                    }, false)
                })
        })()
    </script>

@endsection
