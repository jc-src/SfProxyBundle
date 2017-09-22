<?php
/**
 * Schema Class for output data.
 */
namespace JcSrc\SfProxyBundle\Processor;

use JcSrc\SfProxyBundle\Model\ProxyModel;
use Symfony\Component\HttpFoundation\Request;
use JcSrc\SfProxyBundle\Helper\HttpHelper as HttpHelper;

/**
 * INTERFACE Before Proxy Request process and prepare data for request
 * Query param modification, append params, load data
 *
 * @author   List of contributors <https://github.com/jc-src/SfProxyBundle/graphs/contributors>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     http://swisscom.ch
 */
interface PreProcessorInterface
{
    /**
     * Filter or change values of incoming request to be processed
     *
     * @param Request    $originalRequest Incoming current request
     * @param HttpHelper $helper          Building the new request
     * @param ProxyModel $proxyModel      Configuration model
     * @return HttpHelper
     */
    public function process(Request $originalRequest, HttpHelper $helper, ProxyModel $proxyModel);
}
