<?php

/* WebProfilerBundle:Profiler:ajax_layout.html.twig */
class __TwigTemplate_215bad81db7a19e0b24ed85c3ac204dda86680e0479d94aa5c2b0bc9d99668b3 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'panel' => array($this, 'block_panel'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_2ada897c1a812fba148930858aa115de0c031cd90d7188d1f614f8d9167ef5e6 = $this->env->getExtension("native_profiler");
        $__internal_2ada897c1a812fba148930858aa115de0c031cd90d7188d1f614f8d9167ef5e6->enter($__internal_2ada897c1a812fba148930858aa115de0c031cd90d7188d1f614f8d9167ef5e6_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "WebProfilerBundle:Profiler:ajax_layout.html.twig"));

        // line 1
        $this->displayBlock('panel', $context, $blocks);
        
        $__internal_2ada897c1a812fba148930858aa115de0c031cd90d7188d1f614f8d9167ef5e6->leave($__internal_2ada897c1a812fba148930858aa115de0c031cd90d7188d1f614f8d9167ef5e6_prof);

    }

    public function block_panel($context, array $blocks = array())
    {
        $__internal_95549503c5541be303b66aa2912f80c6873c39d488aec425c8e36e6457d9a75b = $this->env->getExtension("native_profiler");
        $__internal_95549503c5541be303b66aa2912f80c6873c39d488aec425c8e36e6457d9a75b->enter($__internal_95549503c5541be303b66aa2912f80c6873c39d488aec425c8e36e6457d9a75b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        echo "";
        
        $__internal_95549503c5541be303b66aa2912f80c6873c39d488aec425c8e36e6457d9a75b->leave($__internal_95549503c5541be303b66aa2912f80c6873c39d488aec425c8e36e6457d9a75b_prof);

    }

    public function getTemplateName()
    {
        return "WebProfilerBundle:Profiler:ajax_layout.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  23 => 1,);
    }
}
/* {% block panel '' %}*/
/* */
