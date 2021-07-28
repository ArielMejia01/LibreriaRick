<htlml>
    <head>
        <link rel="stylesheet" href="text/css" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,700">
        <link rel="stylesheet" href="text/css" href= "css/header_librarian_style.css" />
    </head>
    <body>
        <header>
            <div id="cd-logo">
            <a href="../">
            <img src="img/ic_logo.svg" alt="logo"/>
            <p>Biblioteca</p>
            </a>
            </div>
    <div class="dropdown">
        <button class="dropdbtn">
        <p id="librarian-name"><?php echo $_SESSION['username']?></p>
        </button>
        <div class="dropdown-content">
        <a href="..logout.php">Cerrar sesion</a>    
        </div>
    
    </div>
        </header>
    </body>
    </html>