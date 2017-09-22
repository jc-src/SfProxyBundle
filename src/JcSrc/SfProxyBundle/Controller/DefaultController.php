<?php
/**
 * Entry point controller.
 */
namespace JcSrc\SfProxyBundle\Controller;

use JcSrc\SfProxyBundle\Manager\ServiceManager;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

/**
 * @author   List of contributors <https://github.com/jc-src/SfProxyBundle/graphs/contributors>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     http://swisscom.ch
 */
class DefaultController
{
    /** @var ServiceManager */
    private $serviceManager;

    /**
     * DefaultController constructor.
     * @param ServiceManager $serviceManager Parsing the requested date
     */
    public function __construct(
        ServiceManager $serviceManager
    ) {
        $this->serviceManager = $serviceManager;
    }

    /**
     * @return JsonResponse
     */
    public function indexAction()
    {

        $data = $this->serviceManager->getServices();

        return new JsonResponse($data);
    }

    /**
     * @return Response
     */
    public function optionsAction()
    {
        $resp = new Response();
        $resp->setStatusCode(Response::HTTP_NO_CONTENT);
        $resp->headers->set("Access-Control-Allow-Methods", "GET, OPTIONS, POST");
        return $resp;
    }

    /**
     * @return Response
     */
    public function proxyAction()
    {
        return $this->serviceManager->processRequest();
    }

    /**
     * @return JsonResponse
     */
    public function schemaAction()
    {
        $data = $this->serviceManager->getSchema();

        return new JsonResponse($data);
    }
}
