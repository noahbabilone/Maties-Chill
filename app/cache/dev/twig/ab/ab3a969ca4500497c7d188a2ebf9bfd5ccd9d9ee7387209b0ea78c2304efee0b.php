<?php

/* TwigBundle:Exception:exception.css.twig */
class __TwigTemplate_fa128fc788fccc67deabe56946d53a3a1baa92df948cb4824030f702ff891a92 extends Twig_Template
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
        $__internal_6ebca0b80f4f62a8afbf3837e6d547bd877b08399e320be895078029fdf95956 = $this->env->getExtension("native_profiler");
        $__internal_6ebca0b80f4f62a8afbf3837e6d547bd877b08399e320be895078029fdf95956->enter($__internal_6ebca0b80f4f62a8afbf3837e6d547bd877b08399e320be895078029fdf95956_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "TwigBundle:Exception:exception.css.twig"));

        // line 1
        echo "/*
";
        // line 2
        $this->loadTemplate("@Twig/Exception/exception.txt.twig", "TwigBundle:Exception:exception.css.twig", 2)->display(array_merge($context, array("exception" => (isset($context["exception"]) ? $context["exception"] : $this->getContext($context, "exception")))));
        // line 3
        echo "*/
";
        
        $__internal_6ebca0b80f4f62a8afbf3837e6d547bd877b08399e320be895078029fdf95956->leave($__internal_6ebca0b80f4f62a8afbf3837e6d547bd877b08399e320be895078029fdf95956_prof);

    }

    public function getTemplateName()
    {
        return "TwigBundle:Exception:exception.css.twig";
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
