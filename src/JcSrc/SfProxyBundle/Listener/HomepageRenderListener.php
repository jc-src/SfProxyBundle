<?php
/**
 * adds Proxy links to the homepage
 */
namespace JcSrc\SfProxyBundle\Listener;

use JcSrc\SfProxyBundle\Manager\ServiceManager;
use JcSrc\CoreBundle\Event\HomepageRenderEvent;

/**
 * Class HomepageRenderListener
 *
 * @author   List of contributors <https://github.com/jc-src/SfProxyBundle/graphs/contributors>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     http://swisscom.ch
 */
class HomepageRenderListener
{

    /**
     * @var ServiceManager
     */
    private $serviceManager;

    /**
     * HomepageRenderListener constructor.
     *
     * @param ServiceManager $serviceManager service manager
     */
    public function __construct(ServiceManager $serviceManager)
    {
        $this->serviceManager = $serviceManager;
    }

    /**
     * Add our links to the homepage
     *
     * @param HomepageRenderEvent $event event
     *
     * @return void
     */
    public function onRender(HomepageRenderEvent $event)
    {
        //$services = $this->serviceManager->getServices();
        $services = [
            ['$ref'=>'ref', 'profile' => 'jacob']
        ];
        foreach ($services as $service) {
            $event->addRoute($service['$ref'], $service['profile']);
        }
    }
}
