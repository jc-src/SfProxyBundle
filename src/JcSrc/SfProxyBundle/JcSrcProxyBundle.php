<?php
/**
 * JcSrc Proxy Bundle
 */
namespace JcSrc\SfProxyBundle;

use JcSrc\SfProxyBundle\DependencyInjection\Compiler\ServicesCompilerPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * Bundle for Proxy
 *
 * @author   List of contributors <https://github.com/jc-src/SfProxyBundle/graphs/contributors>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     http://swisscom.ch
 */
class JcSrcProxyBundle extends Bundle
{

    /**
     * load compiler pass
     *
     * @param ContainerBuilder $container container builder
     *
     * @return void
     */
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $container->addCompilerPass(new ServicesCompilerPass());
    }
}
