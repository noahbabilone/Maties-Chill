<?php

/* TwigBundle:Exception:exception.rdf.twig */
class __TwigTemplate_df529d881412619b94daba5b3af43d38d1d2c8fb9114fcb093bc6598ea18bad9 extends Twig_Template
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
        $__internal_e3dda1c5e8da4999ed36c649305935473877736222ef5becd864126c38e883a0 = $this->env->getExtension("native_profiler");
        $__internal_e3dda1c5e8da4999ed36c649305935473877736222ef5becd864126c38e883a0->enter($__internal_e3dda1c5e8da4999ed36c649305935473877736222ef5becd864126c38e883a0_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "TwigBundle:Exception:exception.rdf.twig"));

        // line 1
        $this->loadTemplate("@Twig/Exception/exception.xml.twig", "TwigBundle:Exception:exception.rdf.twig", 1)->display(array_merge($context, array("exception" => (isset($context["exception"]) ? $context["exception"] : $this->getContext($context, "exception")))));
        
        $__internal_e3dda1c5e8da4999ed36c649305935473877736222ef5becd864126c38e883a0->leave($__internal_e3dda1c5e8da4999ed36c649305935473877736222ef5becd864126c38e883a0_prof);

    }

    public function getTemplateName()
    {
        return "TwigBundle:Exception:exception.rdf.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  22 => 1,);
    }
}
/* {% include '@Twig/Exception/exception.xml.twig' with { 'exception': exception } %}*/
/* */
