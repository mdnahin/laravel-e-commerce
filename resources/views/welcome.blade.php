<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Striped Rows</h2>
  <p>The .table-striped class adds zebra-stripes to a table:</p>            
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Name</th>
        <th>Product Quantity</th>
        <th>Product Price</th>
      </tr>
    </thead>
    <tbody>
    @foreach($orders as $order)
      <tr>
        <td style="border:1px solid black;text-align:center;">{{ $order->product->product_name }}</td>
        <td style="border:1px solid black;text-align:center;">{{ $order->product_quantity }}</td>
        <td style="border:1px solid black;text-align:center;">${{ $order->product_price }}</td>
      </tr>
    @endforeach 
    </tbody>
  </table>
</div>

</body>
</html>
s