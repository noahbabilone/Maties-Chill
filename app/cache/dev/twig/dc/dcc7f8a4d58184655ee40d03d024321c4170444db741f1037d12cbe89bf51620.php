<?php

/* WebProfilerBundle:Profiler:toolbar_redirect.html.twig */
class __TwigTemplate_0947fe2ab787033a2a645c9b6e87734b1a2b96a39561085f553992ce44fec404 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@Twig/layout.html.twig", "WebProfilerBundle:Profiler:toolbar_redirect.html.twig", 1);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@Twig/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_7dff038f03e637dadc67fe46103f8ff9f13a35cfea3e2d09ef50b0b623db1ef5 = $this->env->getExtension("native_profiler");
        $__internal_7dff038f03e637dadc67fe46103f8ff9f13a35cfea3e2d09ef50b0b623db1ef5->enter($__internal_7dff038f03e637dadc67fe46103f8ff9f13a35cfea3e2d09ef50b0b623db1ef5_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "WebProfilerBundle:Profiler:toolbar_redirect.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_7dff038f03e637dadc67fe46103f8ff9f13a35cfea3e2d09ef50b0b623db1ef5->leave($__internal_7dff038f03e637dadc67fe46103f8ff9f13a35cfea3e2d09ef50b0b623db1ef5_prof);

    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        $__internal_e630e468eeef7e3989592eb530a6fbcd9794c8d798b18f1c5d5e6902162b1441 = $this->env->getExtension("native_profiler");
        $__internal_e630e468eeef7e3989592eb530a6fbcd9794c8d798b18f1c5d5e6902162b1441->enter($__internal_e630e468eeef7e3989592eb530a6fbcd9794c8d798b18f1c5d5e6902162b1441_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "Redirection Intercepted";
        
        $__internal_e630e468eeef7e3989592eb530a6fbcd9794c8d798b18f1c5d5e6902162b1441->leave($__internal_e630e468eeef7e3989592eb530a6fbcd9794c8d798b18f1c5d5e6902162b1441_prof);

    }

    // line 5
    public function block_body($context, array $blocks = array())
    {
        $__internal_249e4a549c166d1b7115ac6c01ed4aa9a3d3a3fbafdb0df4f9b57e3ffeaab456 = $this->env->getExtension("native_profiler");
        $__internal_249e4a549c166d1b7115ac6c01ed4aa9a3d3a3fbafdb0df4f9b57e3ffeaab456->enter($__internal_249e4a549c166d1b7115ac6c01ed4aa9a3d3a3fbafdb0df4f9b57e3ffeaab456_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 6
        echo "    <div class=\"sf-reset\">
        <div class=\"block-exception\">
            <h1>This request redirects to <a href=\"";
        // line 8
        echo twig_escape_filter($this->env, (isset($context["location"]) ? $context["location"] : $this->getContext($context, "location")), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, (isset($context["location"]) ? $context["location"] : $this->getContext($context, "location")), "html", null, true);
        echo "</a>.</h1>

            <p>
                <small>
                    The redirect was intercepted by the web debug toolbar to help debugging.
                    For more information, see the \"intercept-redirects\" option of the Profiler.
                </small>
            </p>
        </div>
    </div>
";
        
        $__internal_249e4a549c166d1b7115ac6c01ed4aa9a3d3a3fbafdb0df4f9b57e3ffeaab456->leave($__internal_249e4a549c166d1b7115ac6c01ed4aa9a3d3a3fbafdb0df4f9b57e3ffeaab456_prof);

    }

    public function getTemplateName()
    {
        return "WebProfilerBundle:Profiler:toolbar_redirect.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  57 => 8,  53 => 6,  47 => 5,  35 => 3,  11 => 1,);
    }
}
/* {% extends '@Twig/layout.html.twig' %}*/
/* */
/* {% block title 'Redirection Intercepted' %}*/
/* */
/* {% block body %}*/
/*     <div class="sf-reset">*/
/*         <div class="block-exception">*/
/*             <h1>This request redirects to <a href="{{ location }}">{{ location }}</a>.</h1>*/
/* */
/*             <p>*/
/*                 <small>*/
/*                     The redirect was intercepted by the web debug toolbar to help debugging.*/
/*                     For more information, see the "intercept-redirects" option of the Profiler.*/
/*                 </small>*/
/*             </p>*/
/*         </div>*/
/*     </div>*/
/* {% endblock %}*/
/* */
