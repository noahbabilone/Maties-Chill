<?php

/* MCBundle:Pages:films.html.twig */
class __TwigTemplate_245c09437da9d7102762f8b0da4d8cc0ef37039bebddf3aa5594a3c5023c7b0b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("MCBundle::layout.html.twig", "MCBundle:Pages:films.html.twig", 1);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'body_mc' => array($this, 'block_body_mc'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "MCBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_16f46507216b52c4ec70eb220733f0a8e79d33283237d07d720d10d87abf0b82 = $this->env->getExtension("native_profiler");
        $__internal_16f46507216b52c4ec70eb220733f0a8e79d33283237d07d720d10d87abf0b82->enter($__internal_16f46507216b52c4ec70eb220733f0a8e79d33283237d07d720d10d87abf0b82_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "MCBundle:Pages:films.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_16f46507216b52c4ec70eb220733f0a8e79d33283237d07d720d10d87abf0b82->leave($__internal_16f46507216b52c4ec70eb220733f0a8e79d33283237d07d720d10d87abf0b82_prof);

    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        $__internal_548eb72bc72e346e2e1e4d57a5bf281383065553fed2828305c43c6370bdabaa = $this->env->getExtension("native_profiler");
        $__internal_548eb72bc72e346e2e1e4d57a5bf281383065553fed2828305c43c6370bdabaa->enter($__internal_548eb72bc72e346e2e1e4d57a5bf281383065553fed2828305c43c6370bdabaa_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        // line 4
        echo "    Films - ";
        $this->displayParentBlock("title", $context, $blocks);
        echo "
";
        
        $__internal_548eb72bc72e346e2e1e4d57a5bf281383065553fed2828305c43c6370bdabaa->leave($__internal_548eb72bc72e346e2e1e4d57a5bf281383065553fed2828305c43c6370bdabaa_prof);

    }

    // line 7
    public function block_body_mc($context, array $blocks = array())
    {
        $__internal_13ce5982b72fa5fcaf3e911cea944965a74a0b71c3596ef2cb850ce76a117dc2 = $this->env->getExtension("native_profiler");
        $__internal_13ce5982b72fa5fcaf3e911cea944965a74a0b71c3596ef2cb850ce76a117dc2->enter($__internal_13ce5982b72fa5fcaf3e911cea944965a74a0b71c3596ef2cb850ce76a117dc2_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body_mc"));

        // line 8
        echo "    <div class=\"row\">
        <div class=\"col-sm-12\">
            <h3>Rechercher: ";
        // line 10
        echo twig_escape_filter($this->env, (isset($context["motsCles"]) ? $context["motsCles"] : $this->getContext($context, "motsCles")), "html", null, true);
        echo "</h3>
        </div>
        <div class=\"col-sm-12\">
            <div class=\"row\">
                ";
        // line 14
        if (array_key_exists("movie", $context)) {
            // line 15
            echo "
                    ";
            // line 16
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["movie"]) ? $context["movie"] : $this->getContext($context, "movie")));
            $context['_iterated'] = false;
            foreach ($context['_seq'] as $context["index"] => $context["film"]) {
                // line 17
                echo "                        <div class=\"col-sm-4\">
                            <div class=\"\">
                                <div class=\"caption clearfix\">
                                    <img src=\"";
                // line 20
                echo twig_escape_filter($this->env, $this->getAttribute($context["film"], "posterURL", array()), "html", null, true);
                echo "\" width=\"120\" height=\"174\" class=\"thumbnail pull-left margin-right\"
                                         alt=\"";
                // line 21
                echo twig_escape_filter($this->env, $this->getAttribute($context["film"], "title", array()), "html", null, true);
                echo "\" >
                                    <ul class=\"list-unstyled \" >
                                        <li><b>Titre: </b>";
                // line 23
                echo twig_escape_filter($this->env, $this->getAttribute($context["film"], "title", array()), "html", null, true);
                echo "</li>
                                        <li><b>Date de sortie: </b>";
                // line 24
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["film"], "release", array()), "releaseDate", array()), "html", null, true);
                echo "</li>
                                        ";
                // line 26
                echo "                                        <li><b>Acteurs: </b>";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["film"], "castingShort", array()), "actors", array()), "html", null, true);
                echo "</li>
                                        <li><b>Note presse: </b>";
                // line 27
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["film"], "statistics", array()), "pressRating", array()), "html", null, true);
                echo "</li>
                                        <li><b>Note spetacteur: </b>";
                // line 28
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["film"], "statistics", array()), "userRating", array()), "html", null, true);
                echo "</li>
                                    </ul>

                                </div>
                            </div>
                        </div>
                    ";
                $context['_iterated'] = true;
            }
            if (!$context['_iterated']) {
                // line 35
                echo "                        <div class=\"col-md-3 hero-feature\">
                            Pas de résultat pour le film ";
                // line 36
                echo twig_escape_filter($this->env, (isset($context["motsCles"]) ? $context["motsCles"] : $this->getContext($context, "motsCles")), "html", null, true);
                echo "
                        </div>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['index'], $context['film'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 39
            echo "                ";
        }
        // line 40
        echo "            </div>
        </div>
    </div>
";
        
        $__internal_13ce5982b72fa5fcaf3e911cea944965a74a0b71c3596ef2cb850ce76a117dc2->leave($__internal_13ce5982b72fa5fcaf3e911cea944965a74a0b71c3596ef2cb850ce76a117dc2_prof);

    }

    public function getTemplateName()
    {
        return "MCBundle:Pages:films.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  136 => 40,  133 => 39,  124 => 36,  121 => 35,  109 => 28,  105 => 27,  100 => 26,  96 => 24,  92 => 23,  87 => 21,  83 => 20,  78 => 17,  73 => 16,  70 => 15,  68 => 14,  61 => 10,  57 => 8,  51 => 7,  41 => 4,  35 => 3,  11 => 1,);
    }
}
/* {% extends "MCBundle::layout.html.twig" %}*/
/* */
/* {% block title %}*/
/*     Films - {{ parent() }}*/
/* {% endblock %}*/
/* */
/* {% block body_mc %}*/
/*     <div class="row">*/
/*         <div class="col-sm-12">*/
/*             <h3>Rechercher: {{ motsCles }}</h3>*/
/*         </div>*/
/*         <div class="col-sm-12">*/
/*             <div class="row">*/
/*                 {% if movie is defined %}*/
/* */
/*                     {% for index, film in movie %}*/
/*                         <div class="col-sm-4">*/
/*                             <div class="">*/
/*                                 <div class="caption clearfix">*/
/*                                     <img src="{{ film.posterURL }}" width="120" height="174" class="thumbnail pull-left margin-right"*/
/*                                          alt="{{ film.title }}" >*/
/*                                     <ul class="list-unstyled " >*/
/*                                         <li><b>Titre: </b>{{ film.title }}</li>*/
/*                                         <li><b>Date de sortie: </b>{{ film.release.releaseDate }}</li>*/
/*                                         {#<li><b>Directeur Casting:</b> {{ film.castingShort.directors }}</li>#}*/
/*                                         <li><b>Acteurs: </b>{{ film.castingShort.actors }}</li>*/
/*                                         <li><b>Note presse: </b>{{ film.statistics.pressRating }}</li>*/
/*                                         <li><b>Note spetacteur: </b>{{ film.statistics.userRating }}</li>*/
/*                                     </ul>*/
/* */
/*                                 </div>*/
/*                             </div>*/
/*                         </div>*/
/*                     {% else %}*/
/*                         <div class="col-md-3 hero-feature">*/
/*                             Pas de résultat pour le film {{ motsCles }}*/
/*                         </div>*/
/*                     {% endfor %}*/
/*                 {% endif %}*/
/*             </div>*/
/*         </div>*/
/*     </div>*/
/* {% endblock %}*/
/* */
