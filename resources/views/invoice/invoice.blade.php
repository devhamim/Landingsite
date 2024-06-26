
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>invoice</title>
    <style>
        @font-face {
            font-family: BanglaFont;
            src: url('{{ public_path('fonts/SutonnyMJ Regular.ttf') }}') format('truetype');
        }

        .clearfix:after {
        content: "";
        display: table;
        clear: both;
        }

        a {
        color: #0087C3;
        text-decoration: none;
        }

        body {
        position: relative;
        width: 18cm;
        height: 29.7cm;
        margin: 0 auto;
        color: #555555;
        background: #FFFFFF;
        font-size: 14px;
        font-family: BanglaFont, Arial, sans-serif;
        }

        header {
        padding: 10px 0;
        /* margin-bottom: 20px; */
        border-bottom: 1px solid #AAAAAA;
        }

        #logo {
        float: left;
        margin-top: 8px;
        }

        #logo img {
        height: 70px;
        }

        #company {
        float: right;
        text-align: right;
        }


        #details {
        /* margin-bottom: 50px; */
        }

        #client {
        padding-left: 6px;
        border-left: 6px solid #0087C3;
        float: left;
        }

        #client .to {
        color: #777777;
        }

        h2.name {
        font-size: 1.4em;
        font-weight: normal;
        margin: 0;
        }

        #invoice {
        float: right;
        text-align: right;
        }

        #invoice h1 {
        color: #0087C3;
        font-size: 2.4em;
        line-height: 1em;
        font-weight: normal;
        /* margin: 0  0 10px 0; */
        }

        #invoice .date {
        font-size: 1.1em;
        color: #777777;
        }

        table {
        width: 100%;
        border-collapse: collapse;
        border-spacing: 0;
        /* margin-bottom: 20px; */
        }

        table th,
        table td {
        padding: 5px 20px;
        background: #EEEEEE;
        text-align: center;
        border-bottom: 1px solid #FFFFFF;
        }

        table th {
        white-space: nowrap;
        font-weight: normal;
        }

        table td {
        text-align: right;
        }

        table td h3{
        color: #07657E;
        font-size: 1.2em;
        font-weight: normal;
        margin: 0 0 0.2em 0;
        }

        table .no {
        color: #FFFFFF;
        font-size: 1.6em;
        background: #07657E;
        }

        table .desc {
        text-align: left;
        }

        table .unit {
        background: #DDDDDD;
        }

        table .qty {
        }

        table .total {
        background: #07657E;
        color: #FFFFFF;
        }

        table td.unit,
        table td.qty,
        table td.total {
        font-size: 1.2em;
        }

        table tbody tr:last-child td {
        border: none;
        }

        table tfoot td {
        padding: 10px 20px;
        background: #FFFFFF;
        border-bottom: none;
        font-size: 1.2em;
        white-space: nowrap;
        border-top: 1px solid #AAAAAA;
        }

        table tfoot tr:first-child td {
        border-top: none;
        }

        table tfoot tr:last-child td {
        color: #07657E;
        font-size: 1.4em;
        border-top: 1px solid #07657E;

        }

        table tfoot tr td:first-child {
        border: none;
        }

        #thanks{
        font-size: 2em;
        margin-bottom: 50px;
        }

        #notices{
        padding-left: 6px;
        border-left: 6px solid #0087C3;
        }

        #notices .notice {
        font-size: 1.2em;
        }

        footer {
        color: #777777;
        width: 100%;
        height: 30px;
        position: absolute;
        bottom: 0;
        border-top: 1px solid #AAAAAA;
        padding: 8px 0;
        text-align: center;
        }

    </style>
  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
        <img src="{{ asset('uploads/setting') }}/{{ $setting->first()->black_logo }}">
      </div>
      <div id="company">
        <h2 class="name">{{ $setting->first()->name }}</h2>
        <div>{{ $setting->first()->address }}</div>
        <div>{{ $setting->first()->mobile }}</div>
        <div><a >{{ $setting->first()->email }}</a></div>
      </div>
      </div>
    </header>
    <main>
      <div id="details" class="clearfix">
        <div id="client">
          <div class="to">INVOICE TO:</div>
          <h2 class="name">{{ $billingdetails->name }}</h2>
          <div class="address">{{ $billingdetails->address }}</div>
          <div class="email"><a >{{ $billingdetails->mobile }}</a></div>
        </div>
        <div id="invoice">
          <h2>#{{ $orders->order_id }}</h2>
          <div class="date">Date of Invoice: {{ $billingdetails->first()->created_at->format('d-M-Y') }}</div>
        </div>
      </div>
      <table border="0" cellspacing="0" cellpadding="0">
        <thead>
          <tr>
            <th class="no">#</th>
            <th class="desc">DESCRIPTION</th>
            <th class="unit">UNIT PRICE</th>
            <th class="qty">QUANTITY</th>
            <th class="total">TOTAL</th>
          </tr>
        </thead>
        <tbody>
          @php
            $subtotal = 0;
          @endphp
          @foreach ($order_product as $sl=>$order)
          <tr>
            <td class="no">{{ $sl+1 }}</td>
            <td class="desc"><h3>{{ $order->rel_to_pro->name }}</h3>{{ $order->rel_to_pro->categry_id }}
                @if ($order->rel_to_attribute->weight)
                    <h5 style="">Package:{{ $order->rel_to_attribute->weight }}</h5>
                @else
                    <h5 style="">Color:{{ $order->rel_to_attribute->color_id }} <span>, Size:{{ $order->rel_to_attribute->size_id }}</span></h5>
                @endif
            </td>
            <td class="unit">{{ number_format($order->rel_to_attribute->sell_price ?? $order->rel_to_attribute->price) }}</td>
            <td class="qty">{{ $order->quantity }}</td>
            <td class="total">{{ number_format(($order->rel_to_attribute->sell_price ?? $order->rel_to_attribute->price) * $order->quantity) }}</td>
          </tr>
          @php
            $subtotal += ($order->rel_to_attribute->sell_price ?? $order->rel_to_attribute->price) * $order->quantity;
          @endphp
          @endforeach
        </tbody>
        <tfoot>
          <tr>
            <td colspan="2"></td>
            <td colspan="2">SUBTOTAL</td>
            <td>{{ number_format($subtotal) }}</td>
          </tr>
          <tr>
            <td colspan="2"></td>
            <td colspan="2">Charge</td>
            <td>{{ $orders->delivery_charge }}</td>
          </tr>
          <tr>
            <td colspan="2"></td>
            <td colspan="2">GRAND TOTAL</td>
            <td>{{ number_format($orders->total) }}</td>
          </tr>
        </tfoot>
      </table>
      <div id="thanks">Thank you!</div>
      <div id="notices">
        <div>NOTICE:</div>
        <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
      </div>
    </main>
    <footer>
      Invoice was created on a computer and is valid without the signature and seal.
    </footer>
  </body>
</html>
