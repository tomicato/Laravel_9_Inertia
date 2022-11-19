<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0"/>
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
    @routes
{{--    @if(app()->environment('local'))--}}
        <script src="{{ mix('/js/app.js') }}" defer></script>
    {{--@endif--}}
    @inertiaHead
</head>
<body>
@inertia
</body>
