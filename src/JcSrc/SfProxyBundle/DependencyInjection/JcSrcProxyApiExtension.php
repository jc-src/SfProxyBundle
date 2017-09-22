<?php
/**
 * Extension config and loader
 */
namespace JcSrc\SfProxyBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * Basic functional test for Proxy
 *
 * @author   List of contributors <https://github.com/jc-src/SfProxyBundle/graphs/contributors>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     http://swisscom.ch
 */
class JcSrcProxyExtension extends Extension
{
    /**
     * @param array            $configs   Optional configuration
     * @param ContainerBuilder $container Sf Container
     * @return void
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $this->processConfiguration($configuration, $configs);

        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');

        if ('test' !== $container->getParameter("kernel.environment")) {
            $loader->load('parameters.yml');
        } else {
            $loader->load('parameters_test.yml');
        }
    }
}
