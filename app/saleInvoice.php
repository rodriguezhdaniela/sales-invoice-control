<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class saleInvoice extends Model
{

    /**
     * Relationship between saleInvoice and client
     * @return belongsTo
     */
    public function client(): belongsTo
    {
        return $this->belongsTo(client::class);
    }

    /**
     *  Relationship between saleInvoice and seller
     * @return belongsTo
     */
    public function seller(): belongsTo
    {
        return $this->belongsTo(seller::class);
    }

    /**
     *  Relationship between saleInvoice and product_invoice
     * @return belongsTo
     */
    public function product_invoice(): belongsTo
    {
        return $this->belongsTo(product_invoice::class);
    }


    /**
     *  Relationship between saleInvoice and invoicestate
     * @return belongsTo
     */
    public function invoiceState(): belongsTo
    {
        return $this->belongsTo(invoicestate::class);
    }

}


