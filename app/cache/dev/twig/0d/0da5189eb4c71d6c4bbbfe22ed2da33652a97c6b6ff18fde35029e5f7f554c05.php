<?php

/* @Framework/Form/form_widget_simple.html.php */
class __TwigTemplate_5587bd134bada34024bab162fe061db8b4c9b00280711fec66d997348024d2e4 extends Twig_Template
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
        $__internal_361602c63412a4b9d220a9752295521ede249a53486efacf2267b35dcd8e57e6 = $this->env->getExtension("native_profiler");
        $__internal_361602c63412a4b9d220a9752295521ede249a53486efacf2267b35dcd8e57e6->enter($__internal_361602c63412a4b9d220a9752295521ede249a53486efacf2267b35dcd8e57e6_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/form_widget_simple.html.php"));

        // line 1
        echo "<input type=\"<?php echo isset(\$type) ? \$view->escape(\$type) : 'text' ?>\" <?php echo \$view['form']->block(\$form, 'widget_attributes') ?><?php if (!empty(\$value) || is_numeric(\$value)): ?> value=\"<?php echo \$view->escape(\$value) ?>\"<?php endif ?> />
";
        
        $__internal_361602c63412a4b9d220a9752295521ede249a53486efacf2267b35dcd8e57e6->leave($__internal_361602c63412a4b9d220a9752295521ede249a53486efacf2267b35dcd8e57e6_prof);

    }

    public function getTemplateName()
    {
        return "@Framework/Form/form_widget_simple.html.php";
    }

    public function getDebugInfo()
    {
        return array (  22 => 1,);
    }
}
/* <input type="<?php echo isset($type) ? $view->escape($type) : 'text' ?>" <?php echo $view['form']->block($form, 'widget_attributes') ?><?php if (!empty($value) || is_numeric($value)): ?> value="<?php echo $view->escape($value) ?>"<?php endif ?> />*/
/* */
