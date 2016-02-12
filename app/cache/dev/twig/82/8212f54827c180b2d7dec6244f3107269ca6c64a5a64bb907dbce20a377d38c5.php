<?php

/* @Framework/Form/money_widget.html.php */
class __TwigTemplate_00299d379d89de8583f4d67981d941ee14603a14b6da714c869420112966584a extends Twig_Template
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
        $__internal_3165adbef499b2d06fa4b7bac8fa0e5658713c5f4ce9bddce4c58688bac2ed69 = $this->env->getExtension("native_profiler");
        $__internal_3165adbef499b2d06fa4b7bac8fa0e5658713c5f4ce9bddce4c58688bac2ed69->enter($__internal_3165adbef499b2d06fa4b7bac8fa0e5658713c5f4ce9bddce4c58688bac2ed69_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/money_widget.html.php"));

        // line 1
        echo "<?php echo str_replace('";
        echo twig_escape_filter($this->env, (isset($context["widget"]) ? $context["widget"] : $this->getContext($context, "widget")), "html", null, true);
        echo "', \$view['form']->block(\$form, 'form_widget_simple'), \$money_pattern) ?>
";
        
        $__internal_3165adbef499b2d06fa4b7bac8fa0e5658713c5f4ce9bddce4c58688bac2ed69->leave($__internal_3165adbef499b2d06fa4b7bac8fa0e5658713c5f4ce9bddce4c58688bac2ed69_prof);

    }

    public function getTemplateName()
    {
        return "@Framework/Form/money_widget.html.php";
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
/* <?php echo str_replace('{{ widget }}', $view['form']->block($form, 'form_widget_simple'), $money_pattern) ?>*/
/* */
