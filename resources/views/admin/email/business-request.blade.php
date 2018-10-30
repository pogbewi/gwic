
<!-- pdf.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
</head>
<body>
<table class="table table-bordered">
    <tr>
        <td>Title:</td>
        <td>{{ $request->title }}</td>
    </tr>
    <tr>
        <td>From:</td>
        <td>{{ $request->fullname }}</td>
    </tr>
    <tr>
        <td>Business Name:</td>
        <td>{{ $request->businessname }}</td>
    </tr>
    <tr>
        <td>Amount Needed ($):</td>
        <td>${{ $request->amount_needed }}</td>
    </tr>
    <tr>
        <td>Phone:</td>
        <td>{{ $request->phone }}</td>
    </tr>
    <tr>
        <td>Email:</td>
        <td>
            {{ $request->email }}
        </td>
    </tr>

    <tr>
        <td>Address:</td>
        <td>{{ $request->address }}</td>
    </tr>
    <tr>
        <td>Address Two:</td>
        <td>{{ $request->address_two }}</td>
    </tr>
    <tr>
        <td>Nationality:</td>
        <td>{{ $request->nationality }}</td>
    </tr>
    <tr>
        <td>Countries Of Operation:</td>
        <td>
            @foreach(json_decode($request->operation_countries) as $country)
                {{ $country }},
            @endforeach
        </td>
    </tr>
    <tr>
        <td>City:</td>
        <td>{{ $request->city }}</td>
    </tr>
    <tr>
        <td>Gender:</td>
        <td>{{ $request->gender }}</td>
    </tr>

    <tr>
        <td>Status:</td>
        <td>{{ $request->status }}</td>
    </tr>
    <tr>
        <td>Accepted Terms & Conditions:</td>
        <td>
            @if ($request->agreed)
                Yes
            @else
                No
            @endif
        </td>
    </tr>

    <tr>
        <td> Date Sent</td>
        <td>{{ prettyDate($request->created_at) }}</td>
    </tr>
</table>
</body>
</html>
