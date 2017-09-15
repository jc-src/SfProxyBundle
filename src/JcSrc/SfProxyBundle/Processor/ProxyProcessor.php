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
 * Before Proxy Request process and prepare data for orequest
 *
 * @author   List of contributors <https://github.com/jc-src/SfProxyBundle/graphs/contributors>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     http://swisscom.ch
 */
class ProxyProcessor implements ProxyProcessorInterface
{
    /**
     * Process data
     *
     * @param Request    $originalRequest Incoming current request
     * @param HttpHelper $httpHelper      Building the new request
     * @param ProxyModel $proxyModel      Configuration model
     * @return Response
     */
    public function process(
        Request $originalRequest,
        HttpHelper $httpHelper,
        ProxyModel $proxyModel
    ) {
        // Original Request service
        $serviceUri = $originalRequest->get('service');

        // Append endpoint to request uri, /endpoint/
        $endpoint = $proxyModel->getServiceEndpoint();
        $uri = $endpoint ?
            str_replace('//', '/', $endpoint . '/' . $serviceUri) :
            $serviceUri;
        $httpHelper->setRequestUri($uri);

        // Add certificates if set.. etc..

        /** @var Response $response */
        $response = $httpHelper->execute();

        return $response;
    }
}
