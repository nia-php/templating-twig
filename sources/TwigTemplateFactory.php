<?php
declare(strict_types = 1);
namespace Nia\Templating\Twig;

use Nia\Templating\TemplateInterface;
use Twig_Environment;

/**
 * Adapter template factory implementation to use twig in nia.
 */
class TwigTemplateFactory implements TwigTemplateFactoryInterface
{

    /**
     * The used twig environment.
     *
     * @var Twig_Environment
     */
    private $environment = null;

    /**
     * Constructor.
     *
     * @param Twig_Environment $environment
     *            The used twig environment.
     */
    public function __construct(Twig_Environment $environment)
    {
        $this->environment = $environment;
    }

    /**
     *
     * {@inheritDoc}
     * @see \Nia\Templating\TemplateFactoryInterface::create($name)
     */
    public function create(string $name): TemplateInterface
    {
        return new TwigTemplate($this->environment->loadTemplate($name));
    }

    /**
     *
     * {@inheritDoc}
     *
     * @see \Nia\Templating\Twig\TwigTemplateFactoryInterface::getEnvironment()
     */
    public function getEnvironment(): Twig_Environment
    {
        return $this->environment;
    }
}
