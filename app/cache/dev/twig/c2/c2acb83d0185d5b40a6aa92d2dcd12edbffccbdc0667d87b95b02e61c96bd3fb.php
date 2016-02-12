<?php

/* @Framework/Form/collection_widget.html.php */
class __TwigTemplate_66707fecdc51a584e38930f1408e25c898a2a5d729f805281f626b2e82b96926 extends Twig_Template
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
        $__internal_cdf8a208b337f4b0634e1aec54b8a356f0d9e229083b1ba0ea4368ab9dff1aa9 = $this->env->getExtension("native_profiler");
        $__internal_cdf8a208b337f4b0634e1aec54b8a356f0d9e229083b1ba0ea4368ab9dff1aa9->enter($__internal_cdf8a208b337f4b0634e1aec54b8a356f0d9e229083b1ba0ea4368ab9dff1aa9_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/collection_widget.html.php"));

        // line 1
        echo "<?php if (isset(\$prototype)): ?>
    <?php \$attr['data-prototype'] = \$view->escape(\$view['form']->row(\$prototype)) ?>
<?php endif ?>
<?php echo \$view['form']->widget(\$form, array('attr' => \$attr)) ?>
";
        
        $__internal_cdf8a208b337f4b0634e1aec54b8a356f0d9e229083b1ba0ea4368ab9dff1aa9->leave($__internal_cdf8a208b337f4b0634e1aec54b8a356f0d9e229083b1ba0ea4368ab9dff1aa9_prof);

    }

    public function getTemplateName()
    {
        return "@Framework/Form/collection_widget.html.php";
    }

    public function getDebugInfo()
    {
        return array (  22 => 1,);
    }
}
/* <?php if (isset($prototype)): ?>*/
/*     <?php $attr['data-prototype'] = $view->escape($view['form']->row($prototype)) ?>*/
/* <?php endif ?>*/
/* <?php echo $view['form']->widget($form, array('attr' => $attr)) ?>*/
/* */
