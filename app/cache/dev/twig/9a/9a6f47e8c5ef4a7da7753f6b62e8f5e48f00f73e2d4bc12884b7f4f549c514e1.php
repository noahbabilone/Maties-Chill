<?php

/* MCBundle:Includes:search.html.twig */
class __TwigTemplate_e4597b433ad75149862b2baf7e752320f89af0a834eaba1e73c19d97bc4084ed extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_07b420c26d490fff113c41138cb7594e1fad6f0a98711132be2ac54d08ae40c9 = $this->env->getExtension("native_profiler");
        $__internal_07b420c26d490fff113c41138cb7594e1fad6f0a98711132be2ac54d08ae40c9->enter($__internal_07b420c26d490fff113c41138cb7594e1fad6f0a98711132be2ac54d08ae40c9_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "MCBundle:Includes:search.html.twig"));

        // line 1
        if (array_key_exists("formSearch", $context)) {
            // line 2
            echo "    ";
            echo             $this->env->getExtension('form')->renderer->renderBlock((isset($context["formSearch"]) ? $context["formSearch"] : $this->getContext($context, "formSearch")), 'form_start', array("attr" => array("class" => "navbar-form navbar-left", "role" => "search")));
            echo "

    <div class=\"form-group\">
        <div class=\"input-group\">
            ";
            // line 6
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formSearch"]) ? $context["formSearch"] : $this->getContext($context, "formSearch")), "title", array()), 'widget');
            echo "
            <span class=\"input-group-btn\">
            <button class=\"btn btn-primary btn-sm\" type=\"submit\">
                <span class=\" glyphicon glyphicon-search\"></span>
            </button>
        </span>
        </div>
    </div>
    ";
            // line 14
            echo             $this->env->getExtension('form')->renderer->renderBlock((isset($context["formSearch"]) ? $context["formSearch"] : $this->getContext($context, "formSearch")), 'form_end');
            echo "
";
        }
        
        $__internal_07b420c26d490fff113c41138cb7594e1fad6f0a98711132be2ac54d08ae40c9->leave($__internal_07b420c26d490fff113c41138cb7594e1fad6f0a98711132be2ac54d08ae40c9_prof);

    }

    public function getTemplateName()
    {
        return "MCBundle:Includes:search.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  43 => 14,  32 => 6,  24 => 2,  22 => 1,);
    }
}
/* {% if formSearch is defined %}*/
/*     {{ form_start(formSearch, { 'attr': { 'class': 'navbar-form navbar-left','role':'search'} }) }}*/
/* */
/*     <div class="form-group">*/
/*         <div class="input-group">*/
/*             {{ form_widget(formSearch.title) }}*/
/*             <span class="input-group-btn">*/
/*             <button class="btn btn-primary btn-sm" type="submit">*/
/*                 <span class=" glyphicon glyphicon-search"></span>*/
/*             </button>*/
/*         </span>*/
/*         </div>*/
/*     </div>*/
/*     {{ form_end(formSearch) }}*/
/* {% endif %}*/
