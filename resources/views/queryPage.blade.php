<!DOCTYPE html >
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
    <title>Search Engine</title>
    <style>
        html,body {
            height:100%;
            width:100%;
            position:relative;
        }
        #background-carousel{
            position:fixed;
            width:100%;
            height:100%;
            z-index:-1;
        }
        .carousel,
        .carousel-inner {
            width:100%;
            height:100%;
            z-index:0;
            overflow:hidden;
        }
        .item {
            width:100%;
            height:100%;
            background-position:center center;
            background-size:cover;
            z-index:0;
        }

        #content-wrapper {
            position:absolute;
            z-index:1 !important;
            min-width:100%;
            min-height:100%;
        }
        .well {
            opacity:0.85
        }
        .active-pink-2 input[type=text]:focus:not([readonly]) {
            border-bottom: 1px solid #f48fb1;
            box-shadow: 0 1px 0 0 #f48fb1;
        }
        .active-pink input[type=text] {
            border-bottom: 1px solid #f48fb1;
            box-shadow: 0 1px 0 0 #f48fb1;
        }

        .form-inline  {
            vertical-align: middle;
            margin: 5px 10px 5px 0;
            padding: 10px;
            background-color: #fff;
            border: 1px solid #ddd;
        }

    </style>
</head>
<body>
<div id="background-carousel">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="item active"
                 style="background-image:url('/slide/one')"></div>
            <div class="item"
                 style="background-image:url('/slide/two')"></div>
            <div class="item"
                 style="background-image:url('/slide/three')"></div>
            <div class="item"
                 style="background-image:url('/slide/four')"></div>
            <div class="item"
                 style="background-image:url('/slide/five')"></div>
            <div class="item"
                 style="background-image:url('/slide/six')"></div>
        </div>
    </div>
</div>


<div id="content-wrapper">
    <!-- PAGE CONTENT -->
    <div class="container">
        <div class="page-header" style="color:aliceblue"><h3>Search Engine</h3></div>
        <form class="form-inline md-form form-sm mt-0 well"
              method="post" action="/result">
            @csrf
            <i class="fa fa-search" aria-hidden="true"></i>
            <input class="form-control form-control-sm ml-3 w-75" type="text"
                   placeholder="Search" name="query" id="query"
                   aria-label="Search">

        </form>
        {{--<div class="well">--}}
        {{--</div>--}}
    </div>

    </div><!-- End Container -->
    <!-- PAGE CONTENT -->
</div>

<script>
    $('#myCarousel').carousel({
        pause: 'none'
    })
</script>
<script>
    document.getElementById('query').addEventListener('keypress', function(event) {
        if (event.keyCode == 13) {
            document.forms[0].submit();
        }
    });
</script>
</body>
</html>