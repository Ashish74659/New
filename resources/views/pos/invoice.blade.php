<!DOCTYPE html>
<html>
<head>
    <title>Invoice</title>
</head>
<body>

    <h1>Invoice Details : {{$data?->net_total}}</h1>
    {{$data?->company?->name}}
    {{$data?->company?->bill_header}}
    {{$data?->company?->bill_footer}}
    {{$order?->code}}
    {{$data?->code}}
    {{$date}}

    {{$data?->company?->address}}

    {{$data?->customer?->name}}
    {{$data?->customer?->phone_no}}
    

    {{-- <img src="{{document_path($data?->company?->bill_logo)}}" alt="bill_logo" /> --}}
    

    <div>
         
        <!-- Other invoice details here -->
    </div>

    <h2>QR Code:</h2>
    <div>
        <img src="{{ $webImage }}" alt="QR Code" />
        
        <!-- Display the QR code -->
        <img src="{{ $qrCodeImage }}" alt="QR Code" />
    </div>

</body>
</html>
