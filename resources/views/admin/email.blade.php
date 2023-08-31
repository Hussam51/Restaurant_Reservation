<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<tbody>


    <h2>From :</h2><a href=" {{ $email }}"> {{ $email }}</a>
    <h2>Message: </h2>
    <h3 style="color: rgb(194, 45, 0)">{{ $messagerequest }}</h3>
    <h5>Thank you so much</h5>
</tbody>

</html>
