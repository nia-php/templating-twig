<?php
declare(strict_types = 1);
namespace Test\Nia\Templating\Twig;

use PHPUnit_Framework_TestCase;
use Nia\Templating\Twig\TwigTemplate;

/**
 * Unit test for \Nia\Templating\Twig\TwigTemplate.
 */
class TwigTemplateTest extends PHPUnit_Framework_TestCase
{

    /**
     * @covers \Nia\Templating\Twig\TwigTemplate::fetch
     */
    public function testFetch()
    {
        $content = 'foo bar';

        $twigTemplate = $this->getMockBuilder(\Twig_Template::class)
            ->disableOriginalConstructor()
            ->getMock();

        $twigTemplate->expects($this->any())
            ->method('render')
            ->will($this->returnValue($content));

        $template = new TwigTemplate($twigTemplate);

        $this->assertSame($content, $template->fetch([]));
    }
}
