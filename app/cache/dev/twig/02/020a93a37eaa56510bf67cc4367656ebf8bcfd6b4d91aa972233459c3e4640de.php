<?php

/* @Framework/Form/form_enctype.html.php */
class __TwigTemplate_6edc291c2f62c7b368ac71f1ee1bdcf3e4cebc823c66bb6bd5ae43449dc8badb extends Twig_Template
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
        $__internal_9cb36815ed3d366e38789f67a8ede081a9639d4c48f0f8a23be8feeff09e2650 = $this->env->getExtension("native_profiler");
        $__internal_9cb36815ed3d366e38789f67a8ede081a9639d4c48f0f8a23be8feeff09e2650->enter($__internal_9cb36815ed3d366e38789f67a8ede081a9639d4c48f0f8a23be8feeff09e2650_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/form_enctype.html.php"));

        // line 1
        echo "<?php if (\$form->vars['multipart']): ?>enctype=\"multipart/form-data\"<?php endif ?>
";
        
        $__internal_9cb36815ed3d366e38789f67a8ede081a9639d4c48f0f8a23be8feeff09e2650->leave($__internal_9cb36815ed3d366e38789f67a8ede081a9639d4c48f0f8a23be8feeff09e2650_prof);

    }

    public function getTemplateName()
    {
        return "@Framework/Form/form_enctype.html.php";
    }

    public function getDebugInfo()
    {
        return array (  22 => 1,);
    }
}
/* <?php if ($form->vars['multipart']): ?>enctype="multipart/form-data"<?php endif ?>*/
/* */
