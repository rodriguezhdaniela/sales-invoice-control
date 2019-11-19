@extends(‘layouts.base’)
@section(‘content’)
    <div class=”row”>
        <div class=”row”>
            <h1>Reports</h1>
            <table class=”table”>
                @foreach($saleInvoices as $saleInvoice)
                    <tr>
                        <td>{{$saleInvoice->type_id}}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
