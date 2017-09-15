<?php
/**
 * Schema Class for output data.
 */
namespace JcSrc\SfProxyBundle\Processor;

use JcSrc\SfProxyBundle\Helper\HttpHelper;
use Symfony\Component\HttpFoundation\Request;

/**
 * Before Proxy Request process and prepare data for orequest
 *
 * @author   List of contributors <https://github.com/jc-src/SfProxyBundle/graphs/contributors>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     http://swisscom.ch
 */
class PreProcessor implements PreProcessorInterface
{
    /**
     * Filter or change values of incoming request to be processed
     *
     * @param Request    $originalRequest Incoming current request
     * @param HttpHelper $httpHelper      Building the new request
     * @return HttpHelper
     */
    public function process(Request $originalRequest, HttpHelper $httpHelper)
    {
        $httpHelper->setMethod($originalRequest->getMethod());

        // Query Params
        foreach ($originalRequest->query as $name => $value) {
            $httpHelper->addQueryParams($name, $value);
        }

        return $httpHelper;
    }
}
