<?php

/* @Framework/Form/radio_widget.html.php */
class __TwigTemplate_444275778b9c7a6e3e7ba6eabdc234e6754f30c0b4da2b91528bff309913f744 extends Twig_Template
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
        $__internal_5c864bb51441ccc55cfb34350e21183354aefd253d991d9a4e17cd80d68c6c77 = $this->env->getExtension("native_profiler");
        $__internal_5c864bb51441ccc55cfb34350e21183354aefd253d991d9a4e17cd80d68c6c77->enter($__internal_5c864bb51441ccc55cfb34350e21183354aefd253d991d9a4e17cd80d68c6c77_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/radio_widget.html.php"));

        // line 1
        echo "<input type=\"radio\"
    <?php echo \$view['form']->block(\$form, 'widget_attributes') ?>
    value=\"<?php echo \$view->escape(\$value) ?>\"
    <?php if (\$checked): ?> checked=\"checked\"<?php endif ?>
/>
";
        
        $__internal_5c864bb51441ccc55cfb34350e21183354aefd253d991d9a4e17cd80d68c6c77->leave($__internal_5c864bb51441ccc55cfb34350e21183354aefd253d991d9a4e17cd80d68c6c77_prof);

    }

    public function getTemplateName()
    {
        return "@Framework/Form/radio_widget.html.php";
    }

    public function getDebugInfo()
    {
        return array (  22 => 1,);
    }
}
/* <input type="radio"*/
/*     <?php echo $view['form']->block($form, 'widget_attributes') ?>*/
/*     value="<?php echo $view->escape($value) ?>"*/
/*     <?php if ($checked): ?> checked="checked"<?php endif ?>*/
/* />*/
/* */
