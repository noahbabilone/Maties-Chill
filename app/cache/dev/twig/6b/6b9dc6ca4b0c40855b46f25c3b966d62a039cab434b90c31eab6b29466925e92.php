<?php

/* @Framework/Form/form_rest.html.php */
class __TwigTemplate_497a76b0cf44af76eee938484ed8f822b88cb7bc6883cad4fddea08df178951d extends Twig_Template
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
        $__internal_e2c2e1c9fff053a79dddf860d379fa2f029dccd6b0940b8c081c08ef72884b4e = $this->env->getExtension("native_profiler");
        $__internal_e2c2e1c9fff053a79dddf860d379fa2f029dccd6b0940b8c081c08ef72884b4e->enter($__internal_e2c2e1c9fff053a79dddf860d379fa2f029dccd6b0940b8c081c08ef72884b4e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/form_rest.html.php"));

        // line 1
        echo "<?php foreach (\$form as \$child): ?>
    <?php if (!\$child->isRendered()): ?>
        <?php echo \$view['form']->row(\$child) ?>
    <?php endif; ?>
<?php endforeach; ?>
";
        
        $__internal_e2c2e1c9fff053a79dddf860d379fa2f029dccd6b0940b8c081c08ef72884b4e->leave($__internal_e2c2e1c9fff053a79dddf860d379fa2f029dccd6b0940b8c081c08ef72884b4e_prof);

    }

    public function getTemplateName()
    {
        return "@Framework/Form/form_rest.html.php";
    }

    public function getDebugInfo()
    {
        return array (  22 => 1,);
    }
}
/* <?php foreach ($form as $child): ?>*/
/*     <?php if (!$child->isRendered()): ?>*/
/*         <?php echo $view['form']->row($child) ?>*/
/*     <?php endif; ?>*/
/* <?php endforeach; ?>*/
/* */
