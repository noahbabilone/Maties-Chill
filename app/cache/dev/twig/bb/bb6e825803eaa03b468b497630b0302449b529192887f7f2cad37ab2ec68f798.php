<?php

/* @Framework/Form/hidden_widget.html.php */
class __TwigTemplate_3cbf56102f23c0a19b908ce68d6158ed8764bcd2d96c6d4e0c00b2c7823969ec extends Twig_Template
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
        $__internal_b251cec30d00e02bdcaf16c0c54139df4768960ed48148ee779f1e09bc77395c = $this->env->getExtension("native_profiler");
        $__internal_b251cec30d00e02bdcaf16c0c54139df4768960ed48148ee779f1e09bc77395c->enter($__internal_b251cec30d00e02bdcaf16c0c54139df4768960ed48148ee779f1e09bc77395c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/hidden_widget.html.php"));

        // line 1
        echo "<?php echo \$view['form']->block(\$form, 'form_widget_simple', array('type' => isset(\$type) ? \$type : 'hidden')) ?>
";
        
        $__internal_b251cec30d00e02bdcaf16c0c54139df4768960ed48148ee779f1e09bc77395c->leave($__internal_b251cec30d00e02bdcaf16c0c54139df4768960ed48148ee779f1e09bc77395c_prof);

    }

    public function getTemplateName()
    {
        return "@Framework/Form/hidden_widget.html.php";
    }

    public function getDebugInfo()
    {
        return array (  22 => 1,);
    }
}
/* <?php echo $view['form']->block($form, 'form_widget_simple', array('type' => isset($type) ? $type : 'hidden')) ?>*/
/* */
