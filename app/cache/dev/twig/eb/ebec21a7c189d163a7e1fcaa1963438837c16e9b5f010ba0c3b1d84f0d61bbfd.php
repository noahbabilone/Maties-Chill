<?php

/* ::base.html.twig */
class __TwigTemplate_187788f4dc17438116e2952d19a9a67b89e6e44c81a7570d3a06c0baf74c15c7 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'body' => array($this, 'block_body'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_604bfb5a83200d1979afca009070ad7a0e538005fa52f0b275cb6b28d0c281f6 = $this->env->getExtension("native_profiler");
        $__internal_604bfb5a83200d1979afca009070ad7a0e538005fa52f0b275cb6b28d0c281f6->enter($__internal_604bfb5a83200d1979afca009070ad7a0e538005fa52f0b275cb6b28d0c281f6_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "::base.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<html>
<head>
    <meta charset=\"UTF-8\"/>
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <meta name=\"author\" content=\"Yann\">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src=\"https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js\"></script>
    <script src=\"https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js\"></script>
    <![endif]-->
    <title>";
        // line 13
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
    <link rel=\"icon\" type=\"image/x-icon\" href=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("favicon.ico"), "html", null, true);
        echo "\"/>
    <link rel=\"shortcut icon\" href=\"images/ico/favicon.ico\">
    ";
        // line 16
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 26
        echo "
</head>
<body>

<!-- Navigation -->
<nav class=\"navbar navbar-default navbar-fixed-top\" role=\"navigation\">
    <div class=\"container\">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class=\"navbar-header\">
            <button type=\"button\" class=\"navbar-toggle\" data-toggle=\"collapse\"
                    data-target=\"#bs-example-navbar-collapse-1\">
                <span class=\"sr-only\">Toggle navigation</span>
                <span class=\"icon-bar\"></span>
                <span class=\"icon-bar\"></span>
                <span class=\"icon-bar\"></span>
            </button>
            <a class=\"navbar-brand\" href=\"";
        // line 42
        echo $this->env->getExtension('routing')->getPath("mc_homepage");
        echo "\">Maties<span class=\"text-primary\">Chill</span></a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class=\"collapse navbar-collapse\" id=\"bs-example-navbar-collapse-1\">
            <ul class=\"nav navbar-nav\">
                <li class=\"active\"><a href=\"";
        // line 47
        echo $this->env->getExtension('routing')->getPath("mc_homepage");
        echo "\"><i class=\"glyphicon glyphicon-home\"></i></a></li>
                <li><a href=\"";
        // line 48
        echo $this->env->getExtension('routing')->getPath("mc_sessions");
        echo "\">Séances</a></li>
                <li><a href=\"";
        // line 49
        echo $this->env->getExtension('routing')->getPath("mc_films");
        echo "\">Films</a></li>
                <li><a href=\"";
        // line 50
        echo $this->env->getExtension('routing')->getPath("mc_homepage");
        echo "\">Publier une séance</a></li>

            </ul>
            <ul class=\"nav navbar-nav navbar-right\">

                ";
        // line 56
        echo "                    ";
        // line 57
        echo "                        ";
        // line 58
        echo "                    ";
        // line 59
        echo "                    ";
        // line 60
        echo "                ";
        // line 61
        echo "
                ";
        // line 62
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('http_kernel')->controller("MCBundle:MatiesChill:searchField"));
        echo "

                <li><a href=\"#\" title=\"Connexion\"> Connexion</a></li>
                <li><a href=\"#\" title=\"Se connecter à mon compte\">Inscription</a></li>
                <li class=\"dropdown\">
                    <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\"
                       title=\"Premium Bootstrap Themes &amp; Templates\"><i class=\"glyphicon glyphicon-user\"></i><b
                                class=\"caret\"></b></a>
                    <ul class=\"dropdown-menu\">
                        <li><a href=\"#s\"><i class=\"glyphicon glyphicon-user\"></i> Mon Compte</a></li>
                        <li><a href=\"#s\"><i class=\"glyphicon glyphicon-info-sign\"></i> Autres</a></li>
                        <li><a href=\"#\"><i class=\"glyphicon glyphicon-off\"></i> Déconnexion</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>
<header class=\"sb-page-header\">
</header>

<div class=\"container\">
    ";
        // line 86
        $this->displayBlock('body', $context, $blocks);
        // line 87
        echo "    <footer>
        <div class=\"row\">
            <div class=\"col-lg-12\">
                ";
        // line 91
        echo "                <p>Copyright &copy; <a href=\"\">Estiam Groupe-4 </a>. 2016</p>
            </div>
        </div>
    </footer>
</div>


";
        // line 98
        $this->displayBlock('javascripts', $context, $blocks);
        // line 117
        echo "</body>
</html>
";
        
        $__internal_604bfb5a83200d1979afca009070ad7a0e538005fa52f0b275cb6b28d0c281f6->leave($__internal_604bfb5a83200d1979afca009070ad7a0e538005fa52f0b275cb6b28d0c281f6_prof);

    }

    // line 13
    public function block_title($context, array $blocks = array())
    {
        $__internal_1f3cf97afd72c55e3ef79a9b8adcfd36d02d61cbb19e9f98cb38c696aefa7048 = $this->env->getExtension("native_profiler");
        $__internal_1f3cf97afd72c55e3ef79a9b8adcfd36d02d61cbb19e9f98cb38c696aefa7048->enter($__internal_1f3cf97afd72c55e3ef79a9b8adcfd36d02d61cbb19e9f98cb38c696aefa7048_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "Maties&Chill.Fr";
        
        $__internal_1f3cf97afd72c55e3ef79a9b8adcfd36d02d61cbb19e9f98cb38c696aefa7048->leave($__internal_1f3cf97afd72c55e3ef79a9b8adcfd36d02d61cbb19e9f98cb38c696aefa7048_prof);

    }

    // line 16
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_37373def95132959598ff05e3e3f4ea238ddc983ce025ca4ce74f213ef624be3 = $this->env->getExtension("native_profiler");
        $__internal_37373def95132959598ff05e3e3f4ea238ddc983ce025ca4ce74f213ef624be3->enter($__internal_37373def95132959598ff05e3e3f4ea238ddc983ce025ca4ce74f213ef624be3_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 17
        echo "        ";
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "741e17a_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_741e17a_0") : $this->env->getExtension('asset')->getAssetUrl("_controller/css/741e17a_bootstrap.min_1.css");
            // line 23
            echo "        <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"/>
        ";
            // asset "741e17a_1"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_741e17a_1") : $this->env->getExtension('asset')->getAssetUrl("_controller/css/741e17a_bootstrap-theme.min_2.css");
            echo "        <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"/>
        ";
            // asset "741e17a_2"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_741e17a_2") : $this->env->getExtension('asset')->getAssetUrl("_controller/css/741e17a_style_3.css");
            echo "        <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"/>
        ";
            // asset "741e17a_3"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_741e17a_3") : $this->env->getExtension('asset')->getAssetUrl("_controller/css/741e17a_heroic-features_4.css");
            echo "        <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"/>
        ";
        } else {
            // asset "741e17a"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_741e17a") : $this->env->getExtension('asset')->getAssetUrl("_controller/css/741e17a.css");
            echo "        <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"/>
        ";
        }
        unset($context["asset_url"]);
        // line 25
        echo "    ";
        
        $__internal_37373def95132959598ff05e3e3f4ea238ddc983ce025ca4ce74f213ef624be3->leave($__internal_37373def95132959598ff05e3e3f4ea238ddc983ce025ca4ce74f213ef624be3_prof);

    }

    // line 86
    public function block_body($context, array $blocks = array())
    {
        $__internal_7ccd935e20689ff5715c3e8596def0b819c1ce3a8c8603806a765e710e4c2228 = $this->env->getExtension("native_profiler");
        $__internal_7ccd935e20689ff5715c3e8596def0b819c1ce3a8c8603806a765e710e4c2228->enter($__internal_7ccd935e20689ff5715c3e8596def0b819c1ce3a8c8603806a765e710e4c2228_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        
        $__internal_7ccd935e20689ff5715c3e8596def0b819c1ce3a8c8603806a765e710e4c2228->leave($__internal_7ccd935e20689ff5715c3e8596def0b819c1ce3a8c8603806a765e710e4c2228_prof);

    }

    // line 98
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_c48e484c3479f11ca74c8d02b54dd84edee102356a3b9a4fce0f33bd9b901e84 = $this->env->getExtension("native_profiler");
        $__internal_c48e484c3479f11ca74c8d02b54dd84edee102356a3b9a4fce0f33bd9b901e84->enter($__internal_c48e484c3479f11ca74c8d02b54dd84edee102356a3b9a4fce0f33bd9b901e84_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        // line 99
        echo "    ";
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "afefa29_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_afefa29_0") : $this->env->getExtension('asset')->getAssetUrl("_controller/js/afefa29_jquery-1.12.0.min_1.js");
            // line 102
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
            // asset "afefa29_1"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_afefa29_1") : $this->env->getExtension('asset')->getAssetUrl("_controller/js/afefa29_bootstrap.min_2.js");
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
        } else {
            // asset "afefa29"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_afefa29") : $this->env->getExtension('asset')->getAssetUrl("_controller/js/afefa29.js");
            echo "    <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
        }
        unset($context["asset_url"]);
        // line 104
        echo "    <script type=\"text/javascript\">
        document.querySelector(\"#btn-search\").addEventListener('click', function (e) {
            var keyword = \$.trim(\$('[name=\"search\"]').val());
            alert(keyword);
            var url = '";
        // line 108
        echo $this->env->getExtension('routing')->getPath("mc_search_film", array("keyword" => "+keyword+"));
        echo "';
            alert(url);
            //    window.location.href =\"http://localhost:8888/matrix/web/app_dev.php/ads/view/162\"


        });

    </script>
";
        
        $__internal_c48e484c3479f11ca74c8d02b54dd84edee102356a3b9a4fce0f33bd9b901e84->leave($__internal_c48e484c3479f11ca74c8d02b54dd84edee102356a3b9a4fce0f33bd9b901e84_prof);

    }

    public function getTemplateName()
    {
        return "::base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  274 => 108,  268 => 104,  248 => 102,  243 => 99,  237 => 98,  226 => 86,  219 => 25,  187 => 23,  182 => 17,  176 => 16,  164 => 13,  155 => 117,  153 => 98,  144 => 91,  139 => 87,  137 => 86,  110 => 62,  107 => 61,  105 => 60,  103 => 59,  101 => 58,  99 => 57,  97 => 56,  89 => 50,  85 => 49,  81 => 48,  77 => 47,  69 => 42,  51 => 26,  49 => 16,  44 => 14,  40 => 13,  26 => 1,);
    }
}
/* <!DOCTYPE html>*/
/* <html>*/
/* <head>*/
/*     <meta charset="UTF-8"/>*/
/*     <meta http-equiv="X-UA-Compatible" content="IE=edge">*/
/*     <meta name="author" content="Yann">*/
/*     <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->*/
/*     <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->*/
/*     <!--[if lt IE 9]>*/
/*     <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>*/
/*     <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>*/
/*     <![endif]-->*/
/*     <title>{% block title %}Maties&Chill.Fr{% endblock %}</title>*/
/*     <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}"/>*/
/*     <link rel="shortcut icon" href="images/ico/favicon.ico">*/
/*     {% block stylesheets %}*/
/*         {% stylesheets*/
/*         'bundles/mc/bootstrap/css/bootstrap.min.css'*/
/*         'bundles/mc/bootstrap/css/bootstrap-theme.min.css'*/
/*         'bundles/mc/css/style.css'*/
/*         'bundles/mc/css/heroic-features.css'*/
/*         filter='cssrewrite' %}*/
/*         <link rel="stylesheet" href="{{ asset_url }}"/>*/
/*         {% endstylesheets %}*/
/*     {% endblock %}*/
/* */
/* </head>*/
/* <body>*/
/* */
/* <!-- Navigation -->*/
/* <nav class="navbar navbar-default navbar-fixed-top" role="navigation">*/
/*     <div class="container">*/
/*         <!-- Brand and toggle get grouped for better mobile display -->*/
/*         <div class="navbar-header">*/
/*             <button type="button" class="navbar-toggle" data-toggle="collapse"*/
/*                     data-target="#bs-example-navbar-collapse-1">*/
/*                 <span class="sr-only">Toggle navigation</span>*/
/*                 <span class="icon-bar"></span>*/
/*                 <span class="icon-bar"></span>*/
/*                 <span class="icon-bar"></span>*/
/*             </button>*/
/*             <a class="navbar-brand" href="{{ path('mc_homepage') }}">Maties<span class="text-primary">Chill</span></a>*/
/*         </div>*/
/*         <!-- Collect the nav links, forms, and other content for toggling -->*/
/*         <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">*/
/*             <ul class="nav navbar-nav">*/
/*                 <li class="active"><a href="{{ path('mc_homepage') }}"><i class="glyphicon glyphicon-home"></i></a></li>*/
/*                 <li><a href="{{ path('mc_sessions') }}">Séances</a></li>*/
/*                 <li><a href="{{ path('mc_films') }}">Films</a></li>*/
/*                 <li><a href="{{ path('mc_homepage') }}">Publier une séance</a></li>*/
/* */
/*             </ul>*/
/*             <ul class="nav navbar-nav navbar-right">*/
/* */
/*                 {#<form class="navbar-form navbar-left" role="search">#}*/
/*                     {#<div class="form-group">#}*/
/*                         {#<input type="text" class="form-control" name="search" placeholder="Rechercher">#}*/
/*                     {#</div>#}*/
/*                     {#<button class="btn btn-default btn-sm" id="btn-search">ok</button>#}*/
/*                 {#</form>#}*/
/* */
/*                 {{ render(controller("MCBundle:MatiesChill:searchField")) }}*/
/* */
/*                 <li><a href="#" title="Connexion"> Connexion</a></li>*/
/*                 <li><a href="#" title="Se connecter à mon compte">Inscription</a></li>*/
/*                 <li class="dropdown">*/
/*                     <a href="#" class="dropdown-toggle" data-toggle="dropdown"*/
/*                        title="Premium Bootstrap Themes &amp; Templates"><i class="glyphicon glyphicon-user"></i><b*/
/*                                 class="caret"></b></a>*/
/*                     <ul class="dropdown-menu">*/
/*                         <li><a href="#s"><i class="glyphicon glyphicon-user"></i> Mon Compte</a></li>*/
/*                         <li><a href="#s"><i class="glyphicon glyphicon-info-sign"></i> Autres</a></li>*/
/*                         <li><a href="#"><i class="glyphicon glyphicon-off"></i> Déconnexion</a></li>*/
/*                     </ul>*/
/*                 </li>*/
/*             </ul>*/
/*         </div>*/
/*         <!-- /.navbar-collapse -->*/
/*     </div>*/
/*     <!-- /.container -->*/
/* </nav>*/
/* <header class="sb-page-header">*/
/* </header>*/
/* */
/* <div class="container">*/
/*     {% block body %}{% endblock %}*/
/*     <footer>*/
/*         <div class="row">*/
/*             <div class="col-lg-12">*/
/*                 {#<hr>#}*/
/*                 <p>Copyright &copy; <a href="">Estiam Groupe-4 </a>. 2016</p>*/
/*             </div>*/
/*         </div>*/
/*     </footer>*/
/* </div>*/
/* */
/* */
/* {% block javascripts %}*/
/*     {% javascripts*/
/*     'bundles/mc/js/jquery-1.12.0.min.js'*/
/*     'bundles/mc/bootstrap/js/bootstrap.min.js' %}*/
/*     <script src="{{ asset_url }}"></script>*/
/*     {% endjavascripts %}*/
/*     <script type="text/javascript">*/
/*         document.querySelector("#btn-search").addEventListener('click', function (e) {*/
/*             var keyword = $.trim($('[name="search"]').val());*/
/*             alert(keyword);*/
/*             var url = '{{ path("mc_search_film",{"keyword":'+keyword+' }) }}';*/
/*             alert(url);*/
/*             //    window.location.href ="http://localhost:8888/matrix/web/app_dev.php/ads/view/162"*/
/* */
/* */
/*         });*/
/* */
/*     </script>*/
/* {% endblock %}*/
/* </body>*/
/* </html>*/
/* */
