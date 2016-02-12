<?php

/* @Framework/Form/form_end.html.php */
class __TwigTemplate_13a293e1b9437b49ce4124d1eb6d100652d5dbe65963df02daf179877e3b639e extends Twig_Template
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
        $__internal_8fda19f348ba1abdafcf85434e3b87cbe44f29602d0ba66bda81430c285ecdc4 = $this->env->getExtension("native_profiler");
        $__internal_8fda19f348ba1abdafcf85434e3b87cbe44f29602d0ba66bda81430c285ecdc4->enter($__internal_8fda19f348ba1abdafcf85434e3b87cbe44f29602d0ba66bda81430c285ecdc4_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/form_end.html.php"));

        // line 1
        echo "<?php if (!isset(\$render_rest) || \$render_rest): ?>
<?php echo \$view['form']->rest(\$form) ?>
<?php endif ?>
</form>
";
        
        $__internal_8fda19f348ba1abdafcf85434e3b87cbe44f29602d0ba66bda81430c285ecdc4->leave($__internal_8fda19f348ba1abdafcf85434e3b87cbe44f29602d0ba66bda81430c285ecdc4_prof);

    }

    public function getTemplateName()
    {
        return "@Framework/Form/form_end.html.php";
    }

    public function getDebugInfo()
    {
        return array (  22 => 1,);
    }
}
/* <?php if (!isset($render_rest) || $render_rest): ?>*/
/* <?php echo $view['form']->rest($form) ?>*/
/* <?php endif ?>*/
/* </form>*/
/* */
