<table>
    <thead>
    <tr>
        <th>Expedition date</th>
        <th>Expiration date</th>
        <th>Client</th>
        <th>Seller</th>
        <th>Tax</th>
        <th>Amount</th>
        <th>Total</th>
        <th>Status</th>
    </tr>
    </thead>
    <tbody>
    @foreach($invoices as $invoice)
        <tr>
            <td>{{ $invoice->created_at->toDateString() }}</td>
            <td>{{ $invoice->expiration_date }}</td>
            <td>{{ $invoice->client->name }}</td>
            <td>{{ $invoice->seller->name }}</td>
            <td>{{ $invoice->tax }}</td>
            <td>{{$invoice->amount }}</td>
            <td>{{ $invoice->total }}</td>
            <td>{{ $invoice->status }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
