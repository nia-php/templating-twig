# nia - Templating Twig

Component to use the Twig template engine in the nia framework.

## Installation

Require this package with Composer.

```bash
	composer require nia/templating-twig
```

## Tests
To run the unit test use the following command:

    $ cd /path/to/nia/component/
    $ phpunit --bootstrap=vendor/autoload.php tests/

## How to use
The following sample shows you how to create a simple service provider (based on the `nia/dependencyinjection` component) which registers a template factory.

```php
	/**
	 * Sample provider for templating.
	 */
	class TemplateProvider implements ProviderInterface
	{

	    /**
	     *
	     * {@inheritDoc}
	     *
	     * @see \Nia\DependencyInjection\Provider\ProviderInterface::register()
	     */
	    public function register(ContainerInterface $container)
	    {
	        $factory = new SharedFactory(new ClosureFactory(function (ContainerInterface $container) {
	            $loader = new Twig_Loader_Filesystem([
	                '/path/to/templates',
	                '/path/to/other/templates'
	            ]);

	            $environment = new Twig_Environment($loader, [
	                'cache' => '/path/to/compilation-cache'
	            ]);

	            return new TwigTemplateFactory($environment);
	        }));

	        $container->registerService(TemplateFactoryInterface::class, $factory);
	    }
	}


	// somewhere in a presenter
	// [...]
	$template = $container->get(TemplateFactoryInterface::class)->create('index.html');

	$content = $template->fetch([
	    'key1' => 'value1',
	    'key2' => 'value2'
	]);

	$response->setContent($content);

```
