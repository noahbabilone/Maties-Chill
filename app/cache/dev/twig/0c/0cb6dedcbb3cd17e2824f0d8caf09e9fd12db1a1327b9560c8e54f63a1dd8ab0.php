<?php

/* TwigBundle:Exception:exception.json.twig */
class __TwigTemplate_72d5d6a7e5d86a240f292ee555fc0515d570a3ff4d302b5b36364539a4b08a8c extends Twig_Template
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
        $__internal_46f9d1882ee71a91dbc916c2c1cffe1755c0991889c9dc3ec90c291ec57c7ab1 = $this->env->getExtension("native_profiler");
        $__internal_46f9d1882ee71a91dbc916c2c1cffe1755c0991889c9dc3ec90c291ec57c7ab1->enter($__internal_46f9d1882ee71a91dbc916c2c1cffe1755c0991889c9dc3ec90c291ec57c7ab1_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "TwigBundle:Exception:exception.json.twig"));

        // line 1
        echo twig_jsonencode_filter(array("error" => array("code" => (isset($context["status_code"]) ? $context["status_code"] : $this->getContext($context, "status_code")), "message" => (isset($context["status_text"]) ? $context["status_text"] : $this->getContext($context, "status_text")), "exception" => $this->getAttribute((isset($context["exception"]) ? $context["exception"] : $this->getContext($context, "exception")), "toarray", array()))));
        echo "
";
        
        $__internal_46f9d1882ee71a91dbc916c2c1cffe1755c0991889c9dc3ec90c291ec57c7ab1->leave($__internal_46f9d1882ee71a91dbc916c2c1cffe1755c0991889c9dc3ec90c291ec57c7ab1_prof);

    }

    public function getTemplateName()
    {
        return "TwigBundle:Exception:exception.json.twig";
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
/* {{ { 'error': { 'code': status_code, 'message': status_text, 'exception': exception.toarray } }|json_encode|raw }}*/
/* */
