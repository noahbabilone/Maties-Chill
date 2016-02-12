<?php

/* @Framework/Form/button_widget.html.php */
class __TwigTemplate_dc81335b7b1b950c2e0b712ccb89a8be09dc8f7128d621ef05aed66a47134dfc extends Twig_Template
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
        $__internal_04ab806d0cf4b97eb2fb6011f065fc6b4396feade169c73e11dc9671f6a8ae5b = $this->env->getExtension("native_profiler");
        $__internal_04ab806d0cf4b97eb2fb6011f065fc6b4396feade169c73e11dc9671f6a8ae5b->enter($__internal_04ab806d0cf4b97eb2fb6011f065fc6b4396feade169c73e11dc9671f6a8ae5b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/button_widget.html.php"));

        // line 1
        echo "<?php if (!\$label) { \$label = isset(\$label_format)
    ? strtr(\$label_format, array('%name%' => \$name, '%id%' => \$id))
    : \$view['form']->humanize(\$name); } ?>
<button type=\"<?php echo isset(\$type) ? \$view->escape(\$type) : 'button' ?>\" <?php echo \$view['form']->block(\$form, 'button_attributes') ?>><?php echo \$view->escape(false !== \$translation_domain ? \$view['translator']->trans(\$label, array(), \$translation_domain) : \$label) ?></button>
";
        
        $__internal_04ab806d0cf4b97eb2fb6011f065fc6b4396feade169c73e11dc9671f6a8ae5b->leave($__internal_04ab806d0cf4b97eb2fb6011f065fc6b4396feade169c73e11dc9671f6a8ae5b_prof);

    }

    public function getTemplateName()
    {
        return "@Framework/Form/button_widget.html.php";
    }

    public function getDebugInfo()
    {
        return array (  22 => 1,);
    }
}
/* <?php if (!$label) { $label = isset($label_format)*/
/*     ? strtr($label_format, array('%name%' => $name, '%id%' => $id))*/
/*     : $view['form']->humanize($name); } ?>*/
/* <button type="<?php echo isset($type) ? $view->escape($type) : 'button' ?>" <?php echo $view['form']->block($form, 'button_attributes') ?>><?php echo $view->escape(false !== $translation_domain ? $view['translator']->trans($label, array(), $translation_domain) : $label) ?></button>*/
/* */
