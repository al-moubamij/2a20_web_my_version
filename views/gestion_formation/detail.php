
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>INSTRUVIA - site de formation en ligne</title>
        
<!-- 

Sentra Template

https://templatemo.com/tm-518-sentra

-->
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/fontAwesome.css">
        <link rel="stylesheet" href="css/light-box.css">
        <link rel="stylesheet" href="css/owl-carousel.css">
        <link rel="stylesheet" href="css/templatemo-style.css">

        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">

        <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    </head>

<body>



        <header class="nav-down responsive-nav hidden-lg hidden-md">
            <button type="button" id="nav-toggle" class="navbar-toggle" data-toggle="collapse" data-target="#main-nav">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <!--/.navbar-header-->
            <div id="main-nav" class="collapse navbar-collapse">
                <nav>
                    <ul class="nav navbar-nav">
                        <li><a href="#top">Home</a></li>
                        <li><a href="#formations">Formations</a></li>
                    </ul>
                </nav>
            </div>
        </header>

        <div class="sidebar-navigation hidde-sm hidden-xs">
            <div class="logo">
                <img src="img/logon.png" height="120" width="200">
            </div>
            <nav>
                <ul>
                    <li>
                        <a href="#top">
                            <span class="rect"></span>
                            <span class="circle"></span>
                            Formations
                        </a>
                    </li>
                    <li>
                        <a href="#formations">
                            <span class="rect"></span>
                            <span class="circle"></span>
                            Developpement Web
                        </a>
                    </li>
                </ul>
            </nav>
            <ul class="social-icons">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                <li><a href="#"><i class="fa fa-rss"></i></a></li>
                <li><a href="#"><i class="fa fa-behance"></i></a></li>
            </ul>
        </div>

        <div class="page-content">
            <section id="formations" class="content-section">
                <div class="text-content">
                    <h1>Developpement Web</h1>
                    <span><h4>Détails de la Formation</h4></span>
                    <div class="section-heading">
                    
                        
                        <p id="description">Cette formation en développement web transforme les novices en créateurs de sites modernes et interactifs, en couvrant toutes les bases essentielles.
                             Elle démarre par le HTML pour structurer le contenu, puis le CSS pour créer des interfaces attractives, avec des animations et transitions fluides. La deuxième partie se concentre sur JavaScript pour rendre les sites interactifs, en incluant des bibliothèques comme jQuery et des frameworks comme React.js. Enfin, une initiation au développement back-end avec PHP et SQL permet de gérer les données et d'assurer la sécurité, le SEO, et la gestion de version avec Git.</p>
                    </div>
                <br><br><br><br>
                <div class="section-heading">
                    <label for="Objectifs">Objectifs :</label>
                    
                    <p id="Objectifs">1.Maîtriser les bases du HTML, CSS, et JavaScript pour créer des sites dynamiques.<br>
                        2.Apprendre les concepts avancés pour construire des applications web modernes et réactives.<br>
                        3.Comprendre les fondements du développement back-end pour gérer des bases de données et des interactions serveur-client.<br>
                        4.Acquérir les bonnes pratiques pour sécuriser, optimiser, et maintenir des projets web.</p>
            </div>
            <br><br>
                    <div class="section-heading">
                        <label for="niveau">Niveau :</label>
                        <p id="niveau">Débutant</p>
                    </div>
                        <div class="section-heading">
                        <label for="price">Prix :</label>
                        <p id="price" class="price">100dt</p>
                    </div>
                    <div class="section-heading">
                        <label for="price"><a href="index.html">Retour vers la liste des formations</a></label>
                        
                    </div>
                </div>
            </div>
          
            </section>
            
            
                  
                   
                    
                </div>
            </section>
            <section class="footer">
                <p>Copyright &copy; 2024 Instruvia 
                 </p>
            </section>
        </div>
        

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

    <script src="js/vendor/bootstrap.min.js"></script>
    
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>

    <script>
        // Hide Header on on scroll down
        var didScroll;
        var lastScrollTop = 0;
        var delta = 5;
        var navbarHeight = $('header').outerHeight();

        $(window).scroll(function(event){
            didScroll = true;
        });

        setInterval(function() {
            if (didScroll) {
                hasScrolled();
                didScroll = false;
            }
        }, 250);

        function hasScrolled() {
            var st = $(this).scrollTop();
            
            // Make sure they scroll more than delta
            if(Math.abs(lastScrollTop - st) <= delta)
                return;
            
            // If they scrolled down and are past the navbar, add class .nav-up.
            // This is necessary so you never see what is "behind" the navbar.
            if (st > lastScrollTop && st > navbarHeight){
                // Scroll Down
                $('header').removeClass('nav-down').addClass('nav-up');
            } else {
                // Scroll Up
                if(st + $(window).height() < $(document).height()) {
                    $('header').removeClass('nav-up').addClass('nav-down');
                }
            }
            
            lastScrollTop = st;
        }
    </script>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>

</body>
</html>