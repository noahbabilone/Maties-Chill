<?php

/* @Framework/Form/textarea_widget.html.php */
class __TwigTemplate_1e1b0b895cc3df2fe16a25c37ca757c95f6fb6e2fbfaccd0cd1f0dd15061dcce extends Twig_Template
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
        $__internal_1ff3d3d12b823707f026f96840fd093a2eb8b224c750a353860a15c0d9ac4657 = $this->env->getExtension("native_profiler");
        $__internal_1ff3d3d12b823707f026f96840fd093a2eb8b224c750a353860a15c0d9ac4657->enter($__internal_1ff3d3d12b823707f026f96840fd093a2eb8b224c750a353860a15c0d9ac4657_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/textarea_widget.html.php"));

        // line 1
        echo "<textarea <?php echo \$view['form']->block(\$form, 'widget_attributes') ?>><?php echo \$view->escape(\$value) ?></textarea>
";
        
        $__internal_1ff3d3d12b823707f026f96840fd093a2eb8b224c750a353860a15c0d9ac4657->leave($__internal_1ff3d3d12b823707f026f96840fd093a2eb8b224c750a353860a15c0d9ac4657_prof);

    }

    public function getTemplateName()
    {
        return "@Framework/Form/textarea_widget.html.php";
    }

    public function getDebugInfo()
    {
        return array (  22 => 1,);
    }
}
/* <textarea <?php echo $view['form']->block($form, 'widget_attributes') ?>><?php echo $view->escape($value) ?></textarea>*/
/* */
