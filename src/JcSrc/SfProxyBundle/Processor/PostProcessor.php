<?php
/**
 * Schema Class for output data.
 */
namespace JcSrc\SfProxyBundle\Processor;

use JcSrc\SfProxyBundle\Model\ProxyModel;
use Symfony\Component\HttpFoundation\Response;

/**
 * Before Proxy Request process and prepare data for orequest
 *
 * @author   List of contributors <https://github.com/jc-src/SfProxyBundle/graphs/contributors>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     http://swisscom.ch
 */
class PostProcessor implements PostProcessorInterface
{
    /**
     * For additional post processing of the response or
     * any other handling if required.
     *
     * @param Response   $response   Sf client response
     * @param ProxyModel $proxyModel Configuration model
     * @return Response
     */
    public function process(Response $response, ProxyModel $proxyModel)
    {
        return $response;
    }
}
