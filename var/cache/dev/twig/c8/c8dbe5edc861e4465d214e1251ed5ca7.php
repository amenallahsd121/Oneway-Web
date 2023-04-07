<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* base.html.twig */
class __TwigTemplate_b9d5eee1d542469374b3e8782f7c07a8 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'css' => [$this, 'block_css'],
            'body' => [$this, 'block_body'],
            'footer' => [$this, 'block_footer'],
            'js' => [$this, 'block_js'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "base.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "base.html.twig"));

        // line 1
        echo "<!doctype html>
<html class=\"no-js\" lang=\"zxx\">
<head>

    <meta charset=\"utf-8\">
    <meta http-equiv=\"x-ua-compatible\" content=\"ie=edge\">
    <title>";
        // line 7
        $this->displayBlock('title', $context, $blocks);
        echo " </title>

    
    <meta name=\"description\" content=\"\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
    <link rel=\"manifest\" href=\"site.webmanifest\">
    <link rel=\"shortcut icon\" type=\"image/x-icon\" href=\"assets/img/favicon.ico\">
    <link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css\">
    <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css\">
  

    

    <!-- CSS here -->

    ";
        // line 22
        $this->displayBlock('css', $context, $blocks);
        // line 40
        echo "




</head>










<body>
<!--? Preloader Start -->

<div id=\"preloader-active\">
    <div class=\"preloader d-flex align-items-center justify-content-center\">
        <div class=\"preloader-inner position-relative\">
            <div class=\"preloader-circle\"></div>
            <div class=\"preloader-img pere-text\">
            <img src=\"";
        // line 64
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/img/logo/loder.jpg"), "html", null, true);
        echo "\" alt=\"\">
            </div>
        </div>
    </div>
</div>
<!-- Preloader Start -->
<header>
    <!-- Header Start -->
    <div class=\"header-area\">
        <div class=\"main-header \">
            <div class=\"header-top d-none d-lg-block\">
                <div class=\"container\">
                    <div class=\"col-xl-12\">
                        <div class=\"row d-flex justify-content-between align-items-center\">
                            <div class=\"header-info-left\" style=\"margin-left : -1009px;\">
                                <ul> 
 
                                    <li>Email: oneway@gmail.com</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class=\"header-bottom  header-sticky\">
                <div class=\"container\">
                    <div class=\"row align-items-center\">

                        <!-- Logo -->
                        <div class=\"col-xl-2 col-lg-2\">
                            <div class=\"logo\">
                               <a href=\"index.html\"><img src=\"";
        // line 95
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/img/logo/logo.png"), "html", null, true);
        echo "\" alt=\"\">
                            </div>
                        </div>
                        <div class=\"col-xl-10 col-lg-10\">
                            <div class=\"menu-wrapper  d-flex align-items-center justify-content-end\">
                                <!-- Main-menu -->

                                <div class=\"main-menu d-none d-lg-block\" style=\"margin-top: -75px;\">
                                    <nav> 
                                        <ul id=\"navigation\">                                                                                          
                                            <li><a href=\"index.html\">Mon Profil</a></li>
                                            <li><a href=\"services.html\">Evenement</a></li>
                                            <li><a href= \" ";
        // line 107
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_colis");
        echo " \">Colis</a> 
                                            
                                             <ul class=\"submenu\">

                                                    <li><a href=\" ";
        // line 111
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("add_colis");
        echo " \">Ajouter Colis</a></li>
                                                    <li><a href=\" ";
        // line 112
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_colis");
        echo " \">Mes Colis</a></li>
                                                  
                                            </ul>  

                                            </li> 
                                            <li><a >Offre et demande</a>                                   
                                                   <ul class=\"submenu\">

                                                    <li><a href=\" ";
        // line 120
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_offre_index");
        echo " \">Offre</a>
                                                    </li>
                                                    <li><a href=\" ";
        // line 122
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_demande_index");
        echo " \">Demande</a></li>
                                                  
                                            </ul></li>
                                            <li><a href=\"blog.html\">Opportunité</a></li>
                                            <li><a href=\"blog.html\">Réclamation</a></li>
                                            
                                                
                                            
                                            
                                        </ul>
                                    </nav>
                                </div>
                                <!-- Header-btn -->
                                <div class=\"header-right-btn d-none d-lg-block ml-20\" style=\"margin-right: 35px;\">
                                    <a href=\"contact.html\" class=\"btn header-btn\">Se déconnecter</a>
                                </div>
                            </div>
                        </div> 
                        
</header>


";
        // line 144
        $this->displayBlock('body', $context, $blocks);
        // line 179
        echo "


";
        // line 182
        $this->displayBlock('footer', $context, $blocks);
        // line 231
        echo "<!-- Scroll Up -->
<div id=\"back-top\" >
    <a title=\"Go to Top\" href=\"#\"> <i class=\"fas fa-level-up-alt\"></i></a>
</div>






    <!-- JS here -->
    ";
        // line 242
        $this->displayBlock('js', $context, $blocks);
        // line 287
        echo "    
     

</body>

</html>";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 7
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        echo " Oneway ";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    // line 22
    public function block_css($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "css"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "css"));

        // line 23
        echo "
    <link rel=\"stylesheet\" href=";
        // line 24
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/css/bootstrap.min.css"), "html", null, true);
        echo ">
    <link rel=\"stylesheet\" href=";
        // line 25
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/css/owl.carousel.min.css"), "html", null, true);
        echo ">
    <link rel=\"stylesheet\" href=";
        // line 26
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/css/slicknav.css"), "html", null, true);
        echo ">
    <link rel=\"stylesheet\" href=";
        // line 27
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/css/flaticon.css"), "html", null, true);
        echo ">
    <link rel=\"stylesheet\" href=";
        // line 28
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/css/animate.min.css"), "html", null, true);
        echo ">
    <link rel=\"stylesheet\" href=";
        // line 29
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/css/magnific-popup.css"), "html", null, true);
        echo ">
    <link rel=\"stylesheet\" href=";
        // line 30
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/css/fontawesome-all.min.css"), "html", null, true);
        echo ">
    <link rel=\"stylesheet\" href=";
        // line 31
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/css/themify-icons.css"), "html", null, true);
        echo ">
    <link rel=\"stylesheet\" href=";
        // line 32
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/css/slick.css"), "html", null, true);
        echo ">
    <link rel=\"stylesheet\" href=";
        // line 33
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/css/nice-select.css"), "html", null, true);
        echo ">
    <link rel=\"stylesheet\" href=";
        // line 34
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/css/style.css"), "html", null, true);
        echo ">
    <link rel=\"stylesheet\" href=";
        // line 35
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("chosen/chosen.min.css"), "html", null, true);
        echo ">
    <link href=\"https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css\" rel=\"stylesheet\">
   
    
    ";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    // line 144
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 145
        echo "<main>
    <!--? slider Area Start-->
    <div class=\"slider-area \">
        <div class=\"slider-active\">
            <!-- Single Slider -->
            <div class=\"single-slider slider-height d-flex align-items-center\">
                <div class=\"container\">
                    <div class=\"row\">
                        <div class=\"col-xl-9 col-lg-9\">

                            ";
        // line 158
        echo "                            <!--Hero form -->
                            ";
        // line 167
        echo "                            <!-- Hero Pera -->
                            ";
        // line 171
        echo "
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   ";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    // line 182
    public function block_footer($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "footer"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "footer"));

        // line 183
        echo "<footer>
    <!--? Footer Start-->
    <div class=\"footer-area footer-bg\">
        <div class=\"container\">
            <div class=\"footer-top footer-padding\">
                <!-- footer Heading -->
                <div class=\"footer-heading\">
                    <div class=\"row justify-content-between\">
                        <div class=\"col-xl-6 col-lg-8 col-md-8\">
                            <div class=\"wantToWork-caption wantToWork-caption2\">
                                <h2>La Livraison C'est Nous</h2>
                                <h2>Le Chef C'est Vous !</h2>
                            </div>
                        </div>
                        <div class=\"col-xl-3 col-lg-4\">
                            <h2 class=\"contact-number f-right\">Contactez-Nous</h2>
                            <h2 class=\"contact-number f-right\">+216 22 222 222</h2>
                            
                        </div>
                    </div>
                </div>
                <!-- Footer Menu -->
               
                            
                           
                           
                            
                            <!-- Footer Social -->
                            <div class=\"footer-social \">
                                <a href=\"https://www.facebook.com/sai4ull\"><i class=\"fab fa-facebook-f\"></i></a>
                                <a href=\"\"><i class=\"fab fa-twitter\"></i></a>
                                <a href=\"#\"><i class=\"fas fa-globe\"></i></a>
                                <a href=\"#\"><i class=\"fab fa-instagram\"></i></a>
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer Bottom -->
           
            </div>
        </div>
    </div>
    <!-- Footer End-->

</footer>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    // line 242
    public function block_js($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "js"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "js"));

        // line 243
        echo "   
    <script src=\"";
        // line 244
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("./assets/js/vendor/modernizr-3.5.0.min.js"), "html", null, true);
        echo "\"></script>
    <!-- Jquery, Popper, Bootstrap -->
    <script src=\"";
        // line 246
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("./assets/js/vendor/jquery-1.12.4.min.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 247
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("./assets/js/popper.min.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 248
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("./assets/js/bootstrap.min.js"), "html", null, true);
        echo "\"></script>
    <!-- Jquery Mobile Menu -->
    <script src=\"";
        // line 250
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("./assets/js/jquery.slicknav.min.js"), "html", null, true);
        echo "\"></script>

    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <script src=\"";
        // line 253
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("./assets/js/owl.carousel.min.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 254
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("./assets/js/slick.min.js"), "html", null, true);
        echo "\"></script>
    <!-- One Page, Animated-HeadLin -->
    <script src=\"";
        // line 256
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("./assets/js/wow.min.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 257
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("./assets/js/animated.headline.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 258
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("./assets/js/jquery.magnific-popup.js"), "html", null, true);
        echo "\"></script>

    <!-- Nice-select, sticky -->
    <script src=\"";
        // line 261
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("./assets/js/jquery.nice-select.min.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 262
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("./assets/js/jquery.sticky.js"), "html", null, true);
        echo "\"></script>
    
    <!-- contact js -->
    <script src=\"";
        // line 265
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("./assets/js/contact.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 266
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("./assets/js/jquery.form.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 267
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("./assets/js/jquery.validate.min.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 268
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("./assets/js/mail-script.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 269
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("./assets/js/jquery.ajaxchimp.min.js"), "html", null, true);
        echo "\"></script>
    
    <!-- Jquery Plugins, main Jquery -->\t
    <script src=\"";
        // line 272
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("./assets/js/plugins.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 273
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("./assets/js/main.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 274
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("./chosen/chosen.jquery.min.js"), "html", null, true);
        echo "\"></script>
    <script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js\" integrity=\"sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N\" crossorigin=\"anonymous\"></script>

<script src=\"";
        // line 277
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("./assets/js/script.js"), "html", null, true);
        echo "\"></script>

    <script>
  \$(document).ready(function() {
    \$('.chosen-select').chosen();
  });
</script>
           

    ";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    public function getTemplateName()
    {
        return "base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  551 => 277,  545 => 274,  541 => 273,  537 => 272,  531 => 269,  527 => 268,  523 => 267,  519 => 266,  515 => 265,  509 => 262,  505 => 261,  499 => 258,  495 => 257,  491 => 256,  486 => 254,  482 => 253,  476 => 250,  471 => 248,  467 => 247,  463 => 246,  458 => 244,  455 => 243,  445 => 242,  388 => 183,  378 => 182,  361 => 171,  358 => 167,  355 => 158,  343 => 145,  333 => 144,  318 => 35,  314 => 34,  310 => 33,  306 => 32,  302 => 31,  298 => 30,  294 => 29,  290 => 28,  286 => 27,  282 => 26,  278 => 25,  274 => 24,  271 => 23,  261 => 22,  242 => 7,  227 => 287,  225 => 242,  212 => 231,  210 => 182,  205 => 179,  203 => 144,  178 => 122,  173 => 120,  162 => 112,  158 => 111,  151 => 107,  136 => 95,  102 => 64,  76 => 40,  74 => 22,  56 => 7,  48 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<!doctype html>
<html class=\"no-js\" lang=\"zxx\">
<head>

    <meta charset=\"utf-8\">
    <meta http-equiv=\"x-ua-compatible\" content=\"ie=edge\">
    <title>{% block title %} Oneway {% endblock %} </title>

    
    <meta name=\"description\" content=\"\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
    <link rel=\"manifest\" href=\"site.webmanifest\">
    <link rel=\"shortcut icon\" type=\"image/x-icon\" href=\"assets/img/favicon.ico\">
    <link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css\">
    <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css\">
  

    

    <!-- CSS here -->

    {% block css %}

    <link rel=\"stylesheet\" href={{asset('assets/css/bootstrap.min.css')}}>
    <link rel=\"stylesheet\" href={{asset('assets/css/owl.carousel.min.css')}}>
    <link rel=\"stylesheet\" href={{asset('assets/css/slicknav.css')}}>
    <link rel=\"stylesheet\" href={{asset('assets/css/flaticon.css')}}>
    <link rel=\"stylesheet\" href={{asset('assets/css/animate.min.css')}}>
    <link rel=\"stylesheet\" href={{asset('assets/css/magnific-popup.css')}}>
    <link rel=\"stylesheet\" href={{asset('assets/css/fontawesome-all.min.css')}}>
    <link rel=\"stylesheet\" href={{asset('assets/css/themify-icons.css')}}>
    <link rel=\"stylesheet\" href={{asset('assets/css/slick.css')}}>
    <link rel=\"stylesheet\" href={{asset('assets/css/nice-select.css')}}>
    <link rel=\"stylesheet\" href={{asset('assets/css/style.css')}}>
    <link rel=\"stylesheet\" href={{asset('chosen/chosen.min.css')}}>
    <link href=\"https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css\" rel=\"stylesheet\">
   
    
    {% endblock %}





</head>










<body>
<!--? Preloader Start -->

<div id=\"preloader-active\">
    <div class=\"preloader d-flex align-items-center justify-content-center\">
        <div class=\"preloader-inner position-relative\">
            <div class=\"preloader-circle\"></div>
            <div class=\"preloader-img pere-text\">
            <img src=\"{{ asset('assets/img/logo/loder.jpg') }}\" alt=\"\">
            </div>
        </div>
    </div>
</div>
<!-- Preloader Start -->
<header>
    <!-- Header Start -->
    <div class=\"header-area\">
        <div class=\"main-header \">
            <div class=\"header-top d-none d-lg-block\">
                <div class=\"container\">
                    <div class=\"col-xl-12\">
                        <div class=\"row d-flex justify-content-between align-items-center\">
                            <div class=\"header-info-left\" style=\"margin-left : -1009px;\">
                                <ul> 
 
                                    <li>Email: oneway@gmail.com</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class=\"header-bottom  header-sticky\">
                <div class=\"container\">
                    <div class=\"row align-items-center\">

                        <!-- Logo -->
                        <div class=\"col-xl-2 col-lg-2\">
                            <div class=\"logo\">
                               <a href=\"index.html\"><img src=\"{{ asset('assets/img/logo/logo.png') }}\" alt=\"\">
                            </div>
                        </div>
                        <div class=\"col-xl-10 col-lg-10\">
                            <div class=\"menu-wrapper  d-flex align-items-center justify-content-end\">
                                <!-- Main-menu -->

                                <div class=\"main-menu d-none d-lg-block\" style=\"margin-top: -75px;\">
                                    <nav> 
                                        <ul id=\"navigation\">                                                                                          
                                            <li><a href=\"index.html\">Mon Profil</a></li>
                                            <li><a href=\"services.html\">Evenement</a></li>
                                            <li><a href= \" {{ path ('app_colis') }} \">Colis</a> 
                                            
                                             <ul class=\"submenu\">

                                                    <li><a href=\" {{ path ('add_colis') }} \">Ajouter Colis</a></li>
                                                    <li><a href=\" {{ path ('app_colis') }} \">Mes Colis</a></li>
                                                  
                                            </ul>  

                                            </li> 
                                            <li><a >Offre et demande</a>                                   
                                                   <ul class=\"submenu\">

                                                    <li><a href=\" {{ path ('app_offre_index') }} \">Offre</a>
                                                    </li>
                                                    <li><a href=\" {{ path ('app_demande_index') }} \">Demande</a></li>
                                                  
                                            </ul></li>
                                            <li><a href=\"blog.html\">Opportunité</a></li>
                                            <li><a href=\"blog.html\">Réclamation</a></li>
                                            
                                                
                                            
                                            
                                        </ul>
                                    </nav>
                                </div>
                                <!-- Header-btn -->
                                <div class=\"header-right-btn d-none d-lg-block ml-20\" style=\"margin-right: 35px;\">
                                    <a href=\"contact.html\" class=\"btn header-btn\">Se déconnecter</a>
                                </div>
                            </div>
                        </div> 
                        
</header>


{% block body %}
<main>
    <!--? slider Area Start-->
    <div class=\"slider-area \">
        <div class=\"slider-active\">
            <!-- Single Slider -->
            <div class=\"single-slider slider-height d-flex align-items-center\">
                <div class=\"container\">
                    <div class=\"row\">
                        <div class=\"col-xl-9 col-lg-9\">

                            {# <div class=\"hero__caption\">
                                 <h1 >Safe & Reliable <span>Logistic</span> Solutions!</h1> 
                            </div> #}
                            <!--Hero form -->
                            {# <form action=\"#\" class=\"search-box\">
                                <div class=\"input-form\">
                                    <input type=\"text\" placeholder=\"Your Tracking ID\">
                                </div>
                                <div class=\"search-form\">
                                    <a href=\"#\">Track & Trace</a>
                                </div>\t
                            </form>\t #}
                            <!-- Hero Pera -->
                            {# <div class=\"hero-pera\">
                                <p>For order status inquiry</p>
                            </div> #}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   {% endblock %}



{% block footer %}
<footer>
    <!--? Footer Start-->
    <div class=\"footer-area footer-bg\">
        <div class=\"container\">
            <div class=\"footer-top footer-padding\">
                <!-- footer Heading -->
                <div class=\"footer-heading\">
                    <div class=\"row justify-content-between\">
                        <div class=\"col-xl-6 col-lg-8 col-md-8\">
                            <div class=\"wantToWork-caption wantToWork-caption2\">
                                <h2>La Livraison C'est Nous</h2>
                                <h2>Le Chef C'est Vous !</h2>
                            </div>
                        </div>
                        <div class=\"col-xl-3 col-lg-4\">
                            <h2 class=\"contact-number f-right\">Contactez-Nous</h2>
                            <h2 class=\"contact-number f-right\">+216 22 222 222</h2>
                            
                        </div>
                    </div>
                </div>
                <!-- Footer Menu -->
               
                            
                           
                           
                            
                            <!-- Footer Social -->
                            <div class=\"footer-social \">
                                <a href=\"https://www.facebook.com/sai4ull\"><i class=\"fab fa-facebook-f\"></i></a>
                                <a href=\"\"><i class=\"fab fa-twitter\"></i></a>
                                <a href=\"#\"><i class=\"fas fa-globe\"></i></a>
                                <a href=\"#\"><i class=\"fab fa-instagram\"></i></a>
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer Bottom -->
           
            </div>
        </div>
    </div>
    <!-- Footer End-->

</footer>
{% endblock %}
<!-- Scroll Up -->
<div id=\"back-top\" >
    <a title=\"Go to Top\" href=\"#\"> <i class=\"fas fa-level-up-alt\"></i></a>
</div>






    <!-- JS here -->
    {% block js %}
   
    <script src=\"{{asset('./assets/js/vendor/modernizr-3.5.0.min.js')}}\"></script>
    <!-- Jquery, Popper, Bootstrap -->
    <script src=\"{{asset('./assets/js/vendor/jquery-1.12.4.min.js')}}\"></script>
    <script src=\"{{asset('./assets/js/popper.min.js')}}\"></script>
    <script src=\"{{asset('./assets/js/bootstrap.min.js')}}\"></script>
    <!-- Jquery Mobile Menu -->
    <script src=\"{{asset('./assets/js/jquery.slicknav.min.js')}}\"></script>

    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <script src=\"{{asset('./assets/js/owl.carousel.min.js')}}\"></script>
    <script src=\"{{asset('./assets/js/slick.min.js')}}\"></script>
    <!-- One Page, Animated-HeadLin -->
    <script src=\"{{asset('./assets/js/wow.min.js')}}\"></script>
    <script src=\"{{asset('./assets/js/animated.headline.js')}}\"></script>
    <script src=\"{{asset('./assets/js/jquery.magnific-popup.js')}}\"></script>

    <!-- Nice-select, sticky -->
    <script src=\"{{asset('./assets/js/jquery.nice-select.min.js')}}\"></script>
    <script src=\"{{asset('./assets/js/jquery.sticky.js')}}\"></script>
    
    <!-- contact js -->
    <script src=\"{{asset('./assets/js/contact.js')}}\"></script>
    <script src=\"{{asset('./assets/js/jquery.form.js')}}\"></script>
    <script src=\"{{asset('./assets/js/jquery.validate.min.js')}}\"></script>
    <script src=\"{{asset('./assets/js/mail-script.js')}}\"></script>
    <script src=\"{{asset('./assets/js/jquery.ajaxchimp.min.js')}}\"></script>
    
    <!-- Jquery Plugins, main Jquery -->\t
    <script src=\"{{asset('./assets/js/plugins.js')}}\"></script>
    <script src=\"{{asset('./assets/js/main.js')}}\"></script>
    <script src=\"{{asset('./chosen/chosen.jquery.min.js')}}\"></script>
    <script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js\" integrity=\"sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N\" crossorigin=\"anonymous\"></script>

<script src=\"{{asset('./assets/js/script.js')}}\"></script>

    <script>
  \$(document).ready(function() {
    \$('.chosen-select').chosen();
  });
</script>
           

    {% endblock %}
    
     

</body>

</html>", "base.html.twig", "C:\\Users\\utilisateur\\MeryemGIT\\OneWay-symfony-\\templates\\base.html.twig");
    }
}
