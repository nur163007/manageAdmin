<div class="card">
    <div class="card-header">
        <div class="card-title h3">Pending verification data</div>
    </div>
    <div class="card-body">
        <table id="verification_data_table" class="table table-hover dataTable table-striped width-full">
            <thead>
            <tr>
                <th>Requested ID</th>
                <th>Requester name</th>
                <th>Requester type</th>
                <th>Location</th>
                <th>Request date</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody id="all-data">

            </tbody>
        </table>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <div class="card-title h3">Payment Notification</div>
    </div>
    <div class="card-body">
        <table id="payment_verification_table" class="table table-hover dataTable table-striped width-full">
            <thead>
            <tr>
                <th>USER ID</th>
                <th>POS NAME</th>
                <th>AMOUNT</th>
                <th>PAYMENT DATE</th>
                <th>METHOD</th>
                <th>REF.</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody id="payment-notify-data">

            </tbody>
        </table>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="PaymentSlipModal" aria-hidden="true" aria-labelledby="exampleModalTitle" role="dialog">
    <div class="modal-dialog" role="document" style="max-width: 775px;">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Payment Slip</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                    <div class="container-fluid">
                        <div class="wideget-user-img userpic" style="height: 350px;width: 100%;">
                            <img src="" alt="Not found" id="paymentSlip" style="height: 350px;width: 100%;">
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->
