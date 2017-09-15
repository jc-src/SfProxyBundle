<?php
/**
 * Schema Class for output data.
 */
namespace JcSrc\SfProxyBundle\Model;

use JcSrc\SfProxyBundle\Processor\PostProcessorInterface;
use JcSrc\SfProxyBundle\Processor\PreProcessorInterface;
use JcSrc\SfProxyBundle\Processor\ProxyProcessorInterface;

/**
 * Schema
 *
 * @author   List of contributors <https://github.com/jc-src/SfProxyBundle/graphs/contributors>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     http://swisscom.ch
 */
class ProxyModel
{
    protected $name;
    protected $prefix;
    protected $uri;
    protected $apiKey;
    protected $queryStringTemplate;
    protected $serviceEndpoint;

    // Service processing
    /** @var PreProcessorInterface */
    protected $preProcessorService;
    protected $proxyProcessorService;
    protected $postProcessorService;

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name setter
     * @return void
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getPrefix()
    {
        return $this->prefix;
    }

    /**
     * @param mixed $prefix setter
     * @return void
     */
    public function setPrefix($prefix)
    {
        $this->prefix = $prefix;
    }

    /**
     * @return mixed
     */
    public function getUri()
    {
        return $this->uri;
    }

    /**
     * @param mixed $uri setter
     * @return void
     */
    public function setUri($uri)
    {
        $this->uri = $uri;
    }

    /**
     * @return mixed
     */
    public function getApiKey()
    {
        return $this->apiKey;
    }

    /**
     * @param mixed $apiKey setter
     * @return void
     */
    public function setApiKey($apiKey)
    {
        $this->apiKey = $apiKey;
    }

    /**
     * @return mixed
     */
    public function getQueryStringTemplate()
    {
        return $this->queryStringTemplate;
    }

    /**
     * @param mixed $queryStringTemplate setter
     * @return void
     */
    public function setQueryStringTemplate($queryStringTemplate)
    {
        $this->queryStringTemplate = $queryStringTemplate;
    }

    /**
     * @return mixed
     */
    public function getServiceEndpoint()
    {
        return $this->serviceEndpoint;
    }

    /**
     * @param mixed $serviceEndpoint setter
     * @return void
     */
    public function setServiceEndpoint($serviceEndpoint)
    {
        $this->serviceEndpoint = $serviceEndpoint;
    }

    /**
     * Object Processor
     *
     * @return PreProcessorInterface setter
     */
    public function getPreProcessorService()
    {
        return $this->preProcessorService;
    }

    /**
     * @param PreProcessorInterface $preProcessorService setter
     * @return void
     */
    public function setPreProcessorService(PreProcessorInterface $preProcessorService)
    {
        $this->preProcessorService = $preProcessorService;
    }

    /**
     * Object Processor
     *
     * @return ProxyProcessorInterface
     */
    public function getProxyProcessorService()
    {
        return $this->proxyProcessorService;
    }

    /**
     * @param ProxyProcessorInterface $proxyProcessorService setter
     * @return void
     */
    public function setProxyProcessorService($proxyProcessorService)
    {
        $this->proxyProcessorService = $proxyProcessorService;
    }

    /**
     * Object Processor
     *
     * @return PostProcessorInterface
     */
    public function getPostProcessorService()
    {
        return $this->postProcessorService;
    }

    /**
     * @param PostProcessorInterface $postProcessorService setter
     * @return void
     */
    public function setPostProcessorService($postProcessorService)
    {
        $this->postProcessorService = $postProcessorService;
    }
}
