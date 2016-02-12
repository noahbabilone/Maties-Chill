<?php

/* TwigBundle:Exception:exception.atom.twig */
class __TwigTemplate_875f45932af58dc7a829579995c2194c04527aee116e882c38e62805bec1d258 extends Twig_Template
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
        $__internal_d3b63132bdae500e96f2815003c40240e52b9be83b232fb99c2edbe84e9868a9 = $this->env->getExtension("native_profiler");
        $__internal_d3b63132bdae500e96f2815003c40240e52b9be83b232fb99c2edbe84e9868a9->enter($__internal_d3b63132bdae500e96f2815003c40240e52b9be83b232fb99c2edbe84e9868a9_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "TwigBundle:Exception:exception.atom.twig"));

        // line 1
        $this->loadTemplate("@Twig/Exception/exception.xml.twig", "TwigBundle:Exception:exception.atom.twig", 1)->display(array_merge($context, array("exception" => (isset($context["exception"]) ? $context["exception"] : $this->getContext($context, "exception")))));
        
        $__internal_d3b63132bdae500e96f2815003c40240e52b9be83b232fb99c2edbe84e9868a9->leave($__internal_d3b63132bdae500e96f2815003c40240e52b9be83b232fb99c2edbe84e9868a9_prof);

    }

    public function getTemplateName()
    {
        return "TwigBundle:Exception:exception.atom.twig";
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
