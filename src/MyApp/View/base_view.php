<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sample MVC application</title>

    <!-- Bootstrap core CSS -->
    <link href="/assets/css/bootstrap.css" rel="stylesheet">

</head>
<body>
<div class="wrap">
    <nav id="w0" class="navbar navbar-default" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#w0-collapse"><span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button><a class="navbar-brand" href="/">MyApp</a>
            </div>
            <div id="w0-collapse" class="collapse navbar-collapse">
                <ul id="w1" class="navbar-nav navbar-left nav">
                    <li><a href="/products/list">Products list</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <?=$this->showFlash() ?>
        <?php include \MyApp\Config::$viewDir.$contentView; ?>
    </div>
</div>
</body>
</html>