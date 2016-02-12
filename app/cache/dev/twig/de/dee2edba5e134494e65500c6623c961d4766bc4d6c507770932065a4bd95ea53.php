<?php

/* TwigBundle:Exception:exception.js.twig */
class __TwigTemplate_92c7101100174663cb9eee3aeeca4dab5ce18ef706b517df00ae50cfe4f6f99f extends Twig_Template
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
        $__internal_abe9807d3eb50d1b224caadf3b557dea9127838cea50d724d148ebe799e7806d = $this->env->getExtension("native_profiler");
        $__internal_abe9807d3eb50d1b224caadf3b557dea9127838cea50d724d148ebe799e7806d->enter($__internal_abe9807d3eb50d1b224caadf3b557dea9127838cea50d724d148ebe799e7806d_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "TwigBundle:Exception:exception.js.twig"));

        // line 1
        echo "/*
";
        // line 2
        $this->loadTemplate("@Twig/Exception/exception.txt.twig", "TwigBundle:Exception:exception.js.twig", 2)->display(array_merge($context, array("exception" => (isset($context["exception"]) ? $context["exception"] : $this->getContext($context, "exception")))));
        // line 3
        echo "*/
";
        
        $__internal_abe9807d3eb50d1b224caadf3b557dea9127838cea50d724d148ebe799e7806d->leave($__internal_abe9807d3eb50d1b224caadf3b557dea9127838cea50d724d148ebe799e7806d_prof);

    }

    public function getTemplateName()
    {
        return "TwigBundle:Exception:exception.js.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  27 => 3,  25 => 2,  22 => 1,);
    }
}
/* /**/
/* {% include '@Twig/Exception/exception.txt.twig' with { 'exception': exception } %}*/
/* *//* */
/* */
