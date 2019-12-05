$('#detailInvoice').on('show.bs.modal', function (e) {
    $('#saveForm').attr('action', $(e.relatedTarget).data('route'));
});


//$('#detailInvoice').on('show.bs.modal', function (event) {
   // var button = $(event.relatedTarget) // Button that triggered the modal
    //var product = button.data('whatever') // Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    //var modal = $(this)
    //modal.find('.modal-title').text('Cantidad' + product)
    //modal.find('.modal-body input').val(product)
//})




//<!-- Modal -->
//<div class="modal fade" id="detailInvoice" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    //<div class="modal-dialog modal-dialog-centered" role="document">
    //<div class="modal-content">
    //<div class="modal-header">
    //<h5 class="modal-title" id="detailInvoice">Product Detail</h5>
//<button type="button" class="close" data-dismiss="modal" aria-label="Close">
    //<span aria-hidden="true">&times;</span>
//</button>
//</div>
//<div class="modal-body">
    //<div class="card-body">
    //<div class="col form-row">
    //<label for="name">{{ __('Product') }}</label>
//<select type="text" id="name" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" required>
//<option value="">Select product</option>
//@foreach ($products as $product)
//<option value="{{  $product->id }}" {{ old('product_id', $product->product_id) == $product->id ? 'select' : '' }}> {{ $product->name }}
//</option>
//@endforeach
//</select>
//@includeWhen($errors->has('product'), 'partials.__invalid_feedback', ['feedback' => $errors->first('product')])
//</div>

//<div class="col">
    //<div class="form-group">
    //<label for="quantity">{{__('Quantity')}} </label>
//<input type="number" class="form-control {{ $errors->has('quantity') ? 'is-invalid' : '' }}" id="quantity" name="quantity" value="{{ old('quantity', $invoice->quantity) }}" required>
//@includeWhen($errors->has('quantity'), 'partials.__invalid_feedback', ['feedback' => $errors->first('quantity')])
//</div>
//</div>
//</div>
//</div>
//<div class="modal-footer">
    //<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
    //<button type="button" id="detail-modal" class="btn btn-primary">Save</button>
    //</div>
    //</div>
    //</div>
    //</div>
//<!-- /Modal -->


    //<button type="button" class="btn btn-primary" data-route="{{ route('clients.store', $invoice) }}" data-toggle="modal" data-target="#detailInvoice" title="{{ __('New Product') }}">
    //<i class="fas fa-plus"></i> New Product
    //</button>
