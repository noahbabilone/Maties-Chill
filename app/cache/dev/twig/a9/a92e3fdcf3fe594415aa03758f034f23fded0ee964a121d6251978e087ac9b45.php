<?php

/* TwigBundle:Exception:error.json.twig */
class __TwigTemplate_15104ca5e50565baf969c638762310b777fef67bcd28bbbdd8beb869e1b2c9f2 extends Twig_Template
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
        $__internal_b0ba4aabbcc9b734277f27f8ba04450cff5c14c3959ce9370042f6040d760ba9 = $this->env->getExtension("native_profiler");
        $__internal_b0ba4aabbcc9b734277f27f8ba04450cff5c14c3959ce9370042f6040d760ba9->enter($__internal_b0ba4aabbcc9b734277f27f8ba04450cff5c14c3959ce9370042f6040d760ba9_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "TwigBundle:Exception:error.json.twig"));

        // line 1
        echo twig_jsonencode_filter(array("error" => array("code" => (isset($context["status_code"]) ? $context["status_code"] : $this->getContext($context, "status_code")), "message" => (isset($context["status_text"]) ? $context["status_text"] : $this->getContext($context, "status_text")))));
        echo "
";
        
        $__internal_b0ba4aabbcc9b734277f27f8ba04450cff5c14c3959ce9370042f6040d760ba9->leave($__internal_b0ba4aabbcc9b734277f27f8ba04450cff5c14c3959ce9370042f6040d760ba9_prof);

    }

    public function getTemplateName()
    {
        return "TwigBundle:Exception:error.json.twig";
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
/* {{ { 'error': { 'code': status_code, 'message': status_text } }|json_encode|raw }}*/
/* */
