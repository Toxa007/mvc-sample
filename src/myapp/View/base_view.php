<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Main page</title>

    <!-- Bootstrap core CSS -->
    <link href="/my/web/css/bootstrap.css" rel="stylesheet">

</head>
<body style="padding-top: 20px">
<div class="wrap">

    <!-- nav id="w0" class="navbar navbar-default" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#w0-collapse"><span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button><a class="navbar-brand" href="/yii/basic/web/">TestApp</a>
            </div>
            <div id="w0-collapse" class="collapse navbar-collapse">
                <ul id="w1" class="navbar-nav navbar-right nav">
                    <li class="dropdown">
                        <a class="dropdown-toggle" href="#" data-toggle="dropdown">From box <span class="glyphicon glyphicon-inbox"></span> <b class="caret"></b></a>
                        <ul id="w2" class="dropdown-menu">
                            <li class="dropdown-header">Extensions</li>
                            <li class="divider"></li>
                            <li><a href="/yii/basic/web/widget-test/index.html" tabindex="-1">Widgets show</a></li>
                        </ul>
                    </li>
                    <li>
                        <a data-toggle="modal" data-target="#modal" style="cursor:pointer">About <span class="glyphicon glyphicon-question-sign"></span>
                        </a>
                    </li>
                    <li><a href="/yii/basic/web/main/logout.html" data-method="post">Logout (user)</a></li>
                </ul>
                <form id="w3" class="navbar-form navbar-right" action="/yii/basic/web/search" method="get">
                    <div class="input-group input-group-sm">
                        <input type="type:text" class="form-control" name="search" value="" placeholder="Search ...">
                        <span class="input-group-btn">
                            <button type="submit" class="btn btn-success" onClick="window.location.href = this.form.action + &quot;-&quot; + this.form.search.value.replace(/[^\w\а-яё\А-ЯЁ]+/g,&quot;_&quot;) + &quot;.html&quot;;">
                                <span class="glyphicon glyphicon-search"></span>
                            </button>
                        </span>
                    </div>
                </form>
                <div id="modal" class="fade modal" role="dialog" tabindex="-1">
                    <div class="modal-dialog ">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h2>About</h2>
                            </div>
                            <div class="modal-body">
                                ololo ololo ololo
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav -->

    <div class="container">
        <div class="alert alert-<?=$this->flashMessageClass ?>">
            <?=$this->flashMessageText ?>
        </div>
        <?php include \myapp\Config::$viewDir.$contentView.".php"; ?>
    </div>
</div>
<script src="/my/web/js/jquery.js"></script>
<script src="/my/web/js/bootstrap.js"></script>
</body>
</html>