<?php

/* TwigBundle:Exception:error.xml.twig */
class __TwigTemplate_33448cb501929dfa5a3971914a08620f176d2e7996ee1e6c7877cd38eb76a5d6 extends Twig_Template
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
        $__internal_35d3e7ed68fa32274fe3fb54e53d2ac726549cbd3994f41bcfa4034e46100ad7 = $this->env->getExtension("native_profiler");
        $__internal_35d3e7ed68fa32274fe3fb54e53d2ac726549cbd3994f41bcfa4034e46100ad7->enter($__internal_35d3e7ed68fa32274fe3fb54e53d2ac726549cbd3994f41bcfa4034e46100ad7_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "TwigBundle:Exception:error.xml.twig"));

        // line 1
        echo "<?xml version=\"1.0\" encoding=\"";
        echo twig_escape_filter($this->env, $this->env->getCharset(), "html", null, true);
        echo "\" ?>

<error code=\"";
        // line 3
        echo twig_escape_filter($this->env, (isset($context["status_code"]) ? $context["status_code"] : $this->getContext($context, "status_code")), "html", null, true);
        echo "\" message=\"";
        echo twig_escape_filter($this->env, (isset($context["status_text"]) ? $context["status_text"] : $this->getContext($context, "status_text")), "html", null, true);
        echo "\" />
";
        
        $__internal_35d3e7ed68fa32274fe3fb54e53d2ac726549cbd3994f41bcfa4034e46100ad7->leave($__internal_35d3e7ed68fa32274fe3fb54e53d2ac726549cbd3994f41bcfa4034e46100ad7_prof);

    }

    public function getTemplateName()
    {
        return "TwigBundle:Exception:error.xml.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  28 => 3,  22 => 1,);
    }
}
/* <?xml version="1.0" encoding="{{ _charset }}" ?>*/
/* */
/* <error code="{{ status_code }}" message="{{ status_text }}" />*/
/* */
