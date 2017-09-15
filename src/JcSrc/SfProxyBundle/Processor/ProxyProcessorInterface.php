<?php
/**
 * Schema Class for output data.
 */
namespace JcSrc\SfProxyBundle\Processor;

use JcSrc\SfProxyBundle\Helper\HttpHelper;
use JcSrc\SfProxyBundle\Model\ProxyModel;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * INTERFACE To make Proxy Request
 *
 * @author   List of contributors <https://github.com/jc-src/SfProxyBundle/graphs/contributors>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     http://swisscom.ch
 */
interface ProxyProcessorInterface
{
    /**
     * Process data
     *
     * @param Request    $originalRequest Incoming current request
     * @param HttpHelper $helper          Building the new request
     * @param ProxyModel $proxyModel      Configuration model
     * @return Response
     */
    public function process(
        Request $originalRequest,
        HttpHelper $helper,
        ProxyModel $proxyModel
    );
}
