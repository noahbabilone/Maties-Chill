<?php

/* @Framework/Form/form_rows.html.php */
class __TwigTemplate_f6b0068a87bf1a1576be5fb40f36d6bdb70f0a1a809134b786d404621c2e9b28 extends Twig_Template
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
        $__internal_701187a0b0e3f60a68c500521a0d370e5071ddd291c99655f17b33af2c0eeab3 = $this->env->getExtension("native_profiler");
        $__internal_701187a0b0e3f60a68c500521a0d370e5071ddd291c99655f17b33af2c0eeab3->enter($__internal_701187a0b0e3f60a68c500521a0d370e5071ddd291c99655f17b33af2c0eeab3_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/form_rows.html.php"));

        // line 1
        echo "<?php foreach (\$form as \$child) : ?>
    <?php echo \$view['form']->row(\$child) ?>
<?php endforeach; ?>
";
        
        $__internal_701187a0b0e3f60a68c500521a0d370e5071ddd291c99655f17b33af2c0eeab3->leave($__internal_701187a0b0e3f60a68c500521a0d370e5071ddd291c99655f17b33af2c0eeab3_prof);

    }

    public function getTemplateName()
    {
        return "@Framework/Form/form_rows.html.php";
    }

    public function getDebugInfo()
    {
        return array (  22 => 1,);
    }
}
/* <?php foreach ($form as $child) : ?>*/
/*     <?php echo $view['form']->row($child) ?>*/
/* <?php endforeach; ?>*/
/* */
