<!DOCTYPE html>
<html>
<head>
    <title>Data Viewer</title>
    <link href="{{ url('/css/app.css')}} " rel="stylesheet">
</head>
<body>

    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="clearfix">
                    <span class="panel-title">dataviewer</span>
                    <a href="{{url('/')}}" class="btn btn-info pull-right">Home</a>
                </div>
            </div>
            <div class="panel-body">
                <div id="app-2">
                    <data-Viewer source="/api/customer" title="Customer Data" />
                </div>
            </div>
        </div>
    </div>

</body>
 <script src="/js/app.js"></script>

</html>
