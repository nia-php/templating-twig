<?php
declare(strict_types = 1);
namespace Nia\Templating\Twig;

use Nia\Templating\TemplateInterface;
use Twig_Template;

/**
 * Template implementation using twig.
 */
class TwigTemplate implements TemplateInterface
{

    /**
     * The used twig template.
     *
     * @var Twig_Template
     */
    private $template = null;

    /**
     * Constructor.
     *
     * @param Twig_Template $template
     *            The used twig template.
     */
    public function __construct(Twig_Template $template)
    {
        $this->template = $template;
    }

    /**
     *
     * {@inheritDoc}
     * @see \Nia\Templating\TemplateInterface::fetch($context)
     */
    public function fetch(array $context): string
    {
        return $this->template->render($context);
    }
}
