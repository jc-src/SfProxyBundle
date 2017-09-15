<?php

namespace JcSrc\SfProxyBundle;

use JcSrc\SfProxyBundle\DependencyInjection\Compiler\ServicesCompilerPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class JcSrcSfProxyBundle extends Bundle
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
