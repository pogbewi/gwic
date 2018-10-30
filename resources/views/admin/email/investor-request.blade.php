
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
        <td>Amount Needed ($):</td>
        <td>${{ $request->amount}}</td>
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
        <td>Nationality:</td>
        <td>{{ $request->nationality }}</td>
    </tr>
    <tr>
        <td>Gender:</td>
        <td>{{ $request->gender }}</td>
    </tr>

    <tr>
        <td> Date Sent</td>
        <td>{{ prettyDate($request->created_at) }}</td>
    </tr>
</table>
</body>
</html>
