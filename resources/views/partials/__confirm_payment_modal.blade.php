<div class="modal fade" id="#confirmPaymentModal" tabindex="-1" role="dialog" aria-labelledby="PaymentConfirmModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="PaymentConfirmModal">{{ __('Payment confirmation') }}</h5>
                <hr>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>{{ __('Details') }}</p>
            </div>
            <hr>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Close') }}</button>
                <button type="button"  class="btn btn-danger">{{ __('Delete') }}</button>
            </div>
        </div>
    </div>
</div>
