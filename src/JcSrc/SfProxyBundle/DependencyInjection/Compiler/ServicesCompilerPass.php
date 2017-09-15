<?php
/**
 * RqlQueryRoutesCompilerPass class file
 */

namespace JcSrc\SfProxyBundle\DependencyInjection\Compiler;

use JcSrc\SfProxyBundle\Helper\ArrayDefinitionMapper;
use JcSrc\SfProxyBundle\Manager\ProxyManager;
use JcSrc\SfProxyBundle\Model\ProxyModel;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;

/**
 * @author   List of contributors <https://github.com/jc-src/SfProxyBundle/graphs/contributors>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     http://swisscom.ch
 */
class ServicesCompilerPass implements CompilerPassInterface
{
    /** @var ContainerBuilder */
    protected $container;
    /**
     * Find "allAction" routes and set it to allowed routes for RQL parsing
     *
     * @param ContainerBuilder $container Container builder
     * @return void
     */
    public function process(ContainerBuilder $container)
    {
        $mapper = new ArrayDefinitionMapper();
        $this->container = $container;

        /** @var Definition | ProxyManager $proxyManager */
        $proxyManager = $container->findDefinition('jcsrc.proxy.proxy_manager');

        /** @var Definition | ProxyModel $proxyModelOrg */
        $proxyModelOrg = $container->findDefinition('jcsrc.proxy.proxy_model');

        // Create available service objects
        $services = [];
        foreach ($container->getParameter('jcsrc.proxy.sources') as $name => $definition) {
            // Service definitions
            $proxyModel = clone $proxyModelOrg;
            $definition['name'] = $name;
            $definition = $this->setServiceProcessors($definition);
            $mapper->map($definition, $proxyModel);
            $services[$name] = $proxyModel;
        }

        $proxyManager->addMethodCall('addServices', array($services));
    }

    /**
     * Create defaults service if not set.
     *
     * @param array $definition to be mapped
     * @return mixed
     */
    private function setServiceProcessors($definition)
    {
        // Model definition to Real service definition
        $defaults = [
            'preProcessorService' => 'jcsrc.proxy.processor.pre',
            'proxyProcessorService' => 'jcsrc.proxy.processor.proxy',
            'postProcessorService' => 'jcsrc.proxy.processor.post',
        ];

        foreach ($defaults as $key => $default) {
            if (!array_key_exists($key, $definition)) {
                $definition[$key] = $this->container->findDefinition($default);
            } else {
                $definition[$key] = $this->container->findDefinition($definition[$key]);
            }
        }
        return $definition;
    }
}
