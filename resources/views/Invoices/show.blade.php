@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="text-center">
            <h1>Sales Invoices number function</h1>
        </div>
        <div class="row">
            <div class="col-md-4"> <strong>Expedition date:</strong> function date</div>
            <div class="col-md-4"> <strong>Expiration date:</strong> date fuction</div>
            <div class="col-md-4"> <strong>Status:</strong> status fuction</div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <hr>
                        <div class="card-body">
                            <div class="row mb-6">
                                <div class="col-sm-6">
                                    <h5 class="mb-6">Client:</h5>
                                    <div>
                                        <strong>function name</strong>
                                    </div>
                                    <div>function Type ID and number</div>
                                    <div>invoice date</div>
                                </div>
                                <div class="col-sm-6">
                                    <h5 class="mb-6">Seller:</h5>
                                    <div>
                                        <strong>function name</strong>
                                    </div>
                                    <div>function Type ID</div>
                                    <div>function id</div>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <h3 class="panel-title">Detail</h3>
                            <table class="table table-condensed">
                                <thead>
                                <tr>
                                    <th class="">Code</th>
                                    <th class="">Name</th>
                                    <th class="">Description</th>
                                    <th class="">Unit price</th>
                                    <th class="">Quantity</th>
                                    <th class="">Amount</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="">function</td>
                                    <td class="">function</td>
                                    <td class="">function</td>
                                    <td class="">function</td>
                                    <td class="">function</td>
                                    <td class="">function</td>
                                </tr>
                                <tr>
                                    <td class="">002</td>
                                    <td class="">function</td>
                                    <td class="">function</td>
                                    <td class="">function</td>
                                    <td class="">function</td>
                                    <td class="">function</td>
                                </tr>
                                </tbody>
                            </table>
                            <div class="row">
                                <div class="col-lg-4 col-sm-5"></div>
                                <div class="col-lg-4 col-sm-5 ml-auto">
                                    <table class="table table-clear">
                                        <tbody>
                                        <tr>
                                            <td class="left">
                                                <strong>Subtotal</strong>
                                            </td>
                                            <td class="right">function</td>
                                        </tr>
                                        <tr>
                                            <td class="left">
                                                <strong>IVA (19%)</strong>
                                            </td>
                                            <td class="right">function</td>
                                        </tr>
                                        <tr>
                                            <td class="left">
                                                <strong>Total</strong>
                                            </td>
                                            <td class="right">
                                                <strong>function</strong>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
