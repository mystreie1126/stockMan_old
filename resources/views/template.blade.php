<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>StockManager</title>
        <!-- Latest compiled and minified CSS -->
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css" rel="stylesheet">

    <style media="screen">
      .date-only,.time-only{
        display: flex;
        justify-content: space-between;
      }

      .input-date{
        width:40%;
      }
      #date{
        width: 100%;
      }

      .fixed-action-btn{
        bottom: auto;
        top:12px;
      }
    </style>
    </head>
    <body>

        {{-- <div class="row">
            <div class="col s12">
                @yield('content')
            </div>


        </div>

        <div class="test">
          @yield('shit')
        </div> --}}

      @yield('content')

      @stack('shit')

      @stack('fuck')
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js
"></script>
    <script type="text/javascript">

    $(document).ready(function() {
      $("select").material_select();
    });

    $('.datepicker').pickadate({
        selectMonths:true,
        selectYear:20,
        closeOnSelect:true
    });

    $(document).ready(function() {
  $(".timepicker").pickatime({
    default: "now",
    twelvehour: false, // change to 12 hour AM/PM clock from 24 hour
    donetext: "<i class='material-icons lime-text'>send</i>",
    autoclose: false,
    vibrate: true,
    darktheme:true
  });
  // For adding seconds (00)
  $(".timepicker").on("change", function() {
    var receivedVal = $(this).val();
    var iam = $(this).attr('id');
    // var check_time = $(this).val(receivedVal + ":00");
  });
});

    </script>
    </body>
</html>
