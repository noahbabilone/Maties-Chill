<?php

/* @Framework/Form/form_errors.html.php */
class __TwigTemplate_4f085072b022f652d866c2064e5e65fcea1c8998b0b68e58d4ebbd1cd6d89356 extends Twig_Template
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
        $__internal_961db915d8ccd21984db5507b77a4655810147ccca2c58208dabc6c5ae11b1f5 = $this->env->getExtension("native_profiler");
        $__internal_961db915d8ccd21984db5507b77a4655810147ccca2c58208dabc6c5ae11b1f5->enter($__internal_961db915d8ccd21984db5507b77a4655810147ccca2c58208dabc6c5ae11b1f5_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/form_errors.html.php"));

        // line 1
        echo "<?php if (count(\$errors) > 0): ?>
    <ul>
        <?php foreach (\$errors as \$error): ?>
            <li><?php echo \$error->getMessage() ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif ?>
";
        
        $__internal_961db915d8ccd21984db5507b77a4655810147ccca2c58208dabc6c5ae11b1f5->leave($__internal_961db915d8ccd21984db5507b77a4655810147ccca2c58208dabc6c5ae11b1f5_prof);

    }

    public function getTemplateName()
    {
        return "@Framework/Form/form_errors.html.php";
    }

    public function getDebugInfo()
    {
        return array (  22 => 1,);
    }
}
/* <?php if (count($errors) > 0): ?>*/
/*     <ul>*/
/*         <?php foreach ($errors as $error): ?>*/
/*             <li><?php echo $error->getMessage() ?></li>*/
/*         <?php endforeach; ?>*/
/*     </ul>*/
/* <?php endif ?>*/
/* */
