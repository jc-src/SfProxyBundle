# JcSrc SfProxyBundle

## Inner Working
Intented as a simple configurable Proxy service. Configure if needed own classes to manipulate in 3 steps the data or
even the request. 

Configuration is Compiled for faster response and validation. 

### Adding to Symfony
composer require 'jc-src/sf-proxy-bundle'

Add to Kernel: app/AppKernel.php
```php 
    public function registerBundles()
    {
        $bundles = [
            ...
            new \JcSrc\SfProxyBundle\JcSrcSfProxyBundle(),
            ...
        ];
    }
```

Define Routing: app/config/routing.yml
```yml
jcsrc_proxy:
    resource: "@JcSrcSfProxyBundle/Resources/config/routing.yml"
    prefix:   /proxy
```

#### Url 

Endpoint api `/proxy/{proxy_name}/{service}?queryparams=values`.

`proxy name ` Unique ID for a service.
`service ` Will be appended: uri + serviceEndpoint + service ->  proxy.
`queryparams` Just an optional sample


##### Configuration  `description`

```
parameters:
    jcsrc.proxy.sources:
        proxy1:  # unique ID, called in url: proxy_name
            uri: # http full qualified domain url
            apiKey: # optional api key, by default passed as apiKey=value in query params
            queryStringTemplate: # optional mapping from request queryParams to proxy params
            serviceEndpoint: # optional append to uri on requesting data
            preProcessorService: # optional, valid service id. implement Interface for pre process request data.
            proxyProcessorService: # optional, valid service id. implement Interface for execute proxy request
            postProcessorService: # optional, valid service id. implement Interface for post manipulate result
```


##### An example for `full proxy config`

```
parameters:
    jcsrc.proxy.sources:
        proxy1:
            uri: 'http://gateway.proxy.com'
            apiKey: xxCCff8723
            queryStringTemplate: 'field1={queryParam1}'
            serviceEndpoint: /docs
            preProcessorService: 'valid.service.id.step.1'
            proxyProcessorService: 'valid.service.id.step.2'
            postProcessorService: 'valid.service.id.step.3'
```

