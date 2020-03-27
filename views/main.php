<!doctype html>
<html>
    <head>
        <title>Twitter</title>
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link href="./css/style.css" rel="stylesheet"/>
    </head>
    <body>
        <main>
            <header class="container text-center">
                <h1>TWITTER</h1>
            </header>
            <nav class="navbar navbar-dark bg-dark">
                <ul class="nav">
                    <li class="nav-item"><a href="?page=home" class="nav-link">HOME</a> </li>
                    <?php if($isLoggedIn)  { ?>
                    <li class="nav-item"><a href="?page=profile" class="nav-link"><i class="fa fa-user"></i></a> </li>
                    <li class="nav-item"><a href="?page=logout" class="nav-link"><i class="fa fa-power-off"></i></a> </li>
                    <?php } else { ?>
                        <li class="nav-item"><a href="?page=register" class="nav-link">REGISTER</a> </li>
                        <li class="nav-item"><a href="?page=login" class="nav-link">LOGIN</a> </li>
                    <?php } ?>
                </ul>
            </nav>
            <section id="content" class="container">
                <?php include ROOT."/views/$page.php"; ?>
            </section>
            <footer class="text-center">
                workshop&copy;CodersLab
            </footer>
        </main>
    </body>
</html>