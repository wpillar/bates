<?php
namespace Bates;

class Request
{
    private $responseGroup;

    private $associateTag;

    private $category;

    private $page;

    private $locale;

    private $response;

    private $accessKey;

    private $secretKey;

    private $operation;

    private $service = 'AWSECommerceService';

    public function __construct(Locale\LocaleInterface $locale, ResponseInterface $response,
        $accessKey, $secretKey)
    {
        $this->locale = $locale;
        $this->response = $response;
        $this->accessKey = $accessKey;
        $this->secretKey = $secretKey;
        $this->page = 1;
        $this->category = 'All';
    }

    public function setResponseGroup($group)
    {
        $this->responseGroup = $group;
    }

    public function setAssociateTag($associateTag)
    {
        $this->associateTag = $associateTag;
    }

    public function setCategory($category)
    {
        $this->category = $category;
    }

    public function setPage($page)
    {
        $this->page = $page;
    }

    public function lookup($asin)
    {
        $this->operation = 'ItemLookup';

        $data = array(
            'ItemId'            => $asin,
            'IdType'            => 'ASIN',
            'ResponseGroup'     => $this->responseGroup,
        );

        return $this->buildResponse($this->call($this->buildRequestUrl($data)));
    }

    public function search($keyword)
    {
        $this->operation = 'ItemSearch';

        $data = array(
            'ResponseGroup'     => $this->responseGroup,
            'Keywords'          => $keyword,
            'ItemPage'          => $this->page,
            'SearchIndex'       => $this->category,
        );

        return $this->buildResponse($this->call($this->buildRequestUrl($data)));
    }

    private function buildRequestUrl($data)
    {
        $this->validate();

        $requestData = array(
            'AWSAccessKeyId'    => $this->accessKey,
            'Operation'         => $this->operation,
            'Service'           => $this->service,
            'Timestamp'         => $this->getTimestamp(),
            'AssociateTag'      => $this->associateTag,
        );

        $data = array_merge($requestData, $data);

        ksort($data);

        $endpoint = $this->locale->getEndPoint();
        $queryString = http_build_query($data);

        $data['Signature'] = $this->buildSignature($queryString);

        $queryString = http_build_query($data);

        return $endpoint . '?' . $queryString;
    }

    private function validate()
    {
        if (! $this->accessKey) {
            throw new \Exception('No Access Key');
        }

        if (! $this->secretKey) {
            throw new \Exception('No Secret Key');
        }

        if (! $this->associateTag) {
            throw new \Exception('No Associate Tag');
        }
    }

    private function buildResponse($curlResponse)
    {
        $this->response->setXml($curlResponse);

        return $this->response;
    }

    private function getTimestamp()
    {
        return gmdate("Y-m-d\TH:i:s\Z");
    }

    private function buildSignature($queryString)
    {
        $queryString = str_replace(',','%2C', $queryString);
        $queryString = str_replace(':','%3A', $queryString);

        $queryStringArray = explode('&', $queryString);

        ksort($queryStringArray);

        $queryString = implode('&', $queryStringArray);

        $queryString = $this->locale->getRequestSignatureString().$queryString;

        return base64_encode(hash_hmac("sha256", $queryString, $this->secretKey, true));
    }

    private function call($url)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $url,
            CURLOPT_USERAGENT => 'wpillar/bates cURL'
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        return $response;
    }
}
