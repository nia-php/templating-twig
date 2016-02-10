<?php
declare(strict_types = 1);
namespace Nia\Templating\Twig;

use Nia\Templating\TemplateFactoryInterface;
use Twig_Environment;

/**
 * Interface for twig template factories.
 * Implementations of this interface are used as an adapter between twig and nia.
 */
interface TwigTemplateFactoryInterface extends TemplateFactoryInterface
{

    /**
     * Returns the used twig environment.
     *
     * @return Twig_Environment The used twig environment.
     */
    public function getEnvironment(): Twig_Environment;
}
