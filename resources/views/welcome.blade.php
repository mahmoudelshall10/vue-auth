<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel bnb</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ url('/') }}/css/jquery-ui.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
	    <script src="{{ url('/') }}/js/jquery.min.js"></script>
        <script src="{{ url('/') }}/js/jquery-ui.js"></script>
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body>
        <div id="app">
            <index></index>
        </div>
        {{-- <script>
            $( function() {
                $( "#datepicker" ).datepicker({
                    dateFormat: 'Y-m-d',
                    changeMonth: true,
                    changeYear: true,
                });
                $( "#datepicker1" ).datepicker({
                    dateFormat: 'Y-m-d',
                    changeMonth: true,
                    changeYear: true,
                });
            } );
        </script> --}}
    </body>
</html>
