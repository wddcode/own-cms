<!DOCTYPE html>
<html>
<head>
    <title><?= isset($page->title) ? $page->title : '' ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet/less" type="text/css" href="static/less/screen.less"/>
    <script type="text/javascript">
        less = {
            env: "development", // or "production"
            async: false,
            fileAsync: false,
            poll: 2000
        };
    </script>
    <script src="static/js/lib/less-1.5.0.min.js"></script>


</head>
<body>

<div class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Example</a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Account <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Logout</a></li>
                        <li><a href="#">Administration</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>

<div class="container cms">

    <h1><?= isset($page->title) ? $page->title : '' ?></h1>
    <div>
        <?= isset($page->content) ? $page->content : '' ?>
    </div>

</div>

<script src="https://code.jquery.com/jquery.js"></script>
<script src="static/js/lib/bootstrap/bootstrap.min.js"></script>

</body>
</html>