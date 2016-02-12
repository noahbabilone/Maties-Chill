<?php

/* @Framework/Form/submit_widget.html.php */
class __TwigTemplate_4b8393bb9cd928ce8a3b4036e48d3a61a7833198b06b6a9dc74c0cd6a992a7fb extends Twig_Template
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
        $__internal_db1cf9a3464673dcbc65376b94b13272ab3ec70169f8dd9f665a410381dbf182 = $this->env->getExtension("native_profiler");
        $__internal_db1cf9a3464673dcbc65376b94b13272ab3ec70169f8dd9f665a410381dbf182->enter($__internal_db1cf9a3464673dcbc65376b94b13272ab3ec70169f8dd9f665a410381dbf182_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/submit_widget.html.php"));

        // line 1
        echo "<?php echo \$view['form']->block(\$form, 'button_widget',  array('type' => isset(\$type) ? \$type : 'submit')) ?>
";
        
        $__internal_db1cf9a3464673dcbc65376b94b13272ab3ec70169f8dd9f665a410381dbf182->leave($__internal_db1cf9a3464673dcbc65376b94b13272ab3ec70169f8dd9f665a410381dbf182_prof);

    }

    public function getTemplateName()
    {
        return "@Framework/Form/submit_widget.html.php";
    }

    public function getDebugInfo()
    {
        return array (  22 => 1,);
    }
}
/* <?php echo $view['form']->block($form, 'button_widget',  array('type' => isset($type) ? $type : 'submit')) ?>*/
/* */
