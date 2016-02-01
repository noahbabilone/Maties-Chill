<?php

/* MCBundle:Pages:films.html.twig */
class __TwigTemplate_2d373ce550bb63a1d4d6cd8025c74f5e74a845f7d38d4eed23f6f87036615e6e extends Twig_Template
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
        $__internal_88be4faf518a4254c472113c4c37647fbd26f48ddd1f0ba4fc727a4f67cf3ba4 = $this->env->getExtension("native_profiler");
        $__internal_88be4faf518a4254c472113c4c37647fbd26f48ddd1f0ba4fc727a4f67cf3ba4->enter($__internal_88be4faf518a4254c472113c4c37647fbd26f48ddd1f0ba4fc727a4f67cf3ba4_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "MCBundle:Pages:films.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_88be4faf518a4254c472113c4c37647fbd26f48ddd1f0ba4fc727a4f67cf3ba4->leave($__internal_88be4faf518a4254c472113c4c37647fbd26f48ddd1f0ba4fc727a4f67cf3ba4_prof);

    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        $__internal_aa9725dba06a532e834f72898efaf4674d1273b8de1a062c46646e0833d43933 = $this->env->getExtension("native_profiler");
        $__internal_aa9725dba06a532e834f72898efaf4674d1273b8de1a062c46646e0833d43933->enter($__internal_aa9725dba06a532e834f72898efaf4674d1273b8de1a062c46646e0833d43933_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        // line 4
        echo "    Films - ";
        $this->displayParentBlock("title", $context, $blocks);
        echo "
";
        
        $__internal_aa9725dba06a532e834f72898efaf4674d1273b8de1a062c46646e0833d43933->leave($__internal_aa9725dba06a532e834f72898efaf4674d1273b8de1a062c46646e0833d43933_prof);

    }

    // line 7
    public function block_body_mc($context, array $blocks = array())
    {
        $__internal_45091c8cd17c39864f1ec604c87993e2f3a5ea218a4e4207d0718cb61e6df98c = $this->env->getExtension("native_profiler");
        $__internal_45091c8cd17c39864f1ec604c87993e2f3a5ea218a4e4207d0718cb61e6df98c->enter($__internal_45091c8cd17c39864f1ec604c87993e2f3a5ea218a4e4207d0718cb61e6df98c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body_mc"));

        // line 8
        echo "    <div class=\"row\">
        <div class=\"col-sm-12\">
            <h3>Films Rechercher: ";
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
        
        $__internal_45091c8cd17c39864f1ec604c87993e2f3a5ea218a4e4207d0718cb61e6df98c->leave($__internal_45091c8cd17c39864f1ec604c87993e2f3a5ea218a4e4207d0718cb61e6df98c_prof);

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
/*             <h3>Films Rechercher: {{ motsCles }}</h3>*/
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
