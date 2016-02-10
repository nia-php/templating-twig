<?php
declare(strict_types = 1);
namespace Test\Nia\Templating\Twig;

use PHPUnit_Framework_TestCase;
use Nia\Templating\Twig\TwigTemplateFactory;
use Nia\Templating\TemplateInterface;
use Twig_Environment;

/**
 * Unit test for \Nia\Templating\Twig\TwigTemplateFactory.
 */
class TwigTemplateFactoryTest extends PHPUnit_Framework_TestCase
{

    /**
     * @covers \Nia\Templating\Twig\TwigTemplateFactory::create
     */
    public function testCreate()
    {
        $template = $this->getMockBuilder(\Twig_Template::class)
            ->disableOriginalConstructor()
            ->getMock();

        $environment = $this->getMockBuilder(\Twig_Environment::class)
            ->disableOriginalConstructor()
            ->getMock();

        $environment->expects($this->any())
            ->method('loadTemplate')
            ->will($this->returnValue($template));

        $factory = new TwigTemplateFactory($environment);

        $this->assertInstanceOf(TemplateInterface::class, $factory->create('foobar'));
    }

    /**
     * @covers \Nia\Templating\Twig\TwigTemplateFactory::getEnvironment
     */
    public function testGetEnvironment()
    {
        $environment = $this->getMockBuilder(\Twig_Environment::class)
            ->disableOriginalConstructor()
            ->getMock();

            $factory = new TwigTemplateFactory($environment);

        $this->assertSame($environment, $factory->getEnvironment());
    }
}
