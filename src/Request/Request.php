<?php

namespace Pillar\Bates\Request;

use Pillar\Bates\Item\Factory as ItemFactory;
use Pillar\Bates\Item\FactoryInterface as ItemFactoryInterface;
use Pillar\Bates\Locale\LocaleInterface;
use Pillar\Bates\Response\Factory as ResponseFactory;
use Pillar\Bates\Response\FactoryInterface as ResponseFactoryInterface;
use Pillar\Bates\Response\ResponseInterface;

class Request
{
    /**
     * @var string
     */
    protected $responseGroup;

    /**
     * @var string
     */
    protected $associateTag;

    /**
     * @var string
     */
    protected $category;

    /**
     * @var integer
     */
    protected $page;

    /**
     * @var LocaleInterface
     */
    protected $locale;

    /**
     * @var ResponseFactoryInterface
     */
    protected $responseFactory;

    /**
     * @var ItemFactoryInterface
     */
    protected $itemFactory;

    /**
     * @var string
     */
    protected $accessKey;

    /**
     * @var string
     */
    protected $secretKey;

    /**
     * @var string
     */
    protected $operation;

    /**
     * @var string
     */
    protected $service = 'AWSECommerceService';

    /**
     * @param LocaleInterface $locale
     * @param ResponseFactoryInterface $responseFactory
     * @param ItemFactoryInterface $itemFactory
     * @param array $config
     */
    public function __construct(
        LocaleInterface $locale,
        ResponseFactoryInterface $responseFactory,
        ItemFactoryInterface $itemFactory,
        array $config
    ) {
        $this->validate($config);

        $this->locale = $locale;
        $this->responseFactory = $responseFactory;
        $this->itemFactory = $itemFactory;
        $this->accessKey = $config['accessKey'];
        $this->secretKey = $config['secretKey'];
        $this->setAssociateTag($config['associateTag']);

        $this->setPage(1);
        $this->setCategory('All');
    }

    /**
     * @param LocaleInterface $locale
     * @param array $config
     * @return Request
     */
    public static function factory(LocaleInterface $locale, array $config)
    {
        return new static(
            $locale,
            new ResponseFactory(),
            new ItemFactory(),
            $config
        );
    }

    /**
     * @param string $group
     */
    public function setResponseGroup($group)
    {
        $this->responseGroup = $group;
    }

    /**
     * @param string $associateTag
     */
    public function setAssociateTag($associateTag)
    {
        $this->associateTag = $associateTag;
    }

    /**
     * @param string $category
     */
    public function setCategory($category)
    {
        $this->category = $category;
    }

    /**
     * @param string $page
     */
    public function setPage($page)
    {
        $this->page = (int) $page;
    }

    /**
     * @param string $asin
     * @return ResponseInterface
     */
    public function lookup($asin)
    {
        $this->operation = 'ItemLookup';

        $data = [
            'ItemId'            => $asin,
            'IdType'            => 'ASIN',
            'ResponseGroup'     => $this->responseGroup,
        ];

        return $this->buildResponse($this->call($this->buildRequestUrl($data)));
    }

    /**
     * @param string $keyword
     * @return ResponseInterface
     */
    public function search($keyword)
    {
        $this->operation = 'ItemSearch';

        $data = [
            'ResponseGroup'     => $this->responseGroup,
            'Keywords'          => $keyword,
            'ItemPage'          => $this->page,
            'SearchIndex'       => $this->category,
        ];

        return $this->buildResponse($this->call($this->buildRequestUrl($data)));
    }

    /**
     * @param array $data
     * @return string
     */
    protected function buildRequestUrl(array $data)
    {
        $requestData = [
            'AWSAccessKeyId'    => $this->accessKey,
            'Operation'         => $this->operation,
            'Service'           => $this->service,
            'Timestamp'         => $this->getTimestamp(),
            'AssociateTag'      => $this->associateTag,
        ];

        $data = array_merge($requestData, $data);

        ksort($data);

        $endpoint = $this->locale->getEndPoint();
        $queryString = http_build_query($data);

        $data['Signature'] = $this->buildSignature($queryString);

        $queryString = http_build_query($data);

        return $endpoint . '?' . $queryString;
    }

    /**
     * @param array $config
     * @throws \Exception
     */
    protected function validate(array $config)
    {
        if (! array_key_exists('accessKey', $config)) {
            throw new \Exception('No Access Key');
        }

        if (! array_key_exists('secretKey', $config)) {
            throw new \Exception('No Secret Key');
        }

        if (! array_key_exists('associateTag', $config)) {
            throw new \Exception('No Associate Tag');
        }
    }

    /**
     * @param $xmlString
     * @return ResponseInterface
     */
    protected function buildResponse($xmlString)
    {
        $xmlString = str_replace(["\n", "\r", "\t"], '', $xmlString);
        $xmlString = trim(str_replace('"', "'", $xmlString));

        $xml = simplexml_load_string($xmlString);

        $items = $this->itemFactory->buildCollection($xml);
        return $this->responseFactory->build($items);
    }

    /**
     * @return string
     */
    protected function getTimestamp()
    {
        return gmdate("Y-m-d\TH:i:s\Z");
    }

    /**
     * @param string $queryString
     * @return string
     */
    protected function buildSignature($queryString)
    {
        $queryString = str_replace(',', '%2C', $queryString);
        $queryString = str_replace(':', '%3A', $queryString);
        $queryString = str_replace('+', '%20', $queryString);

        $queryStringArray = explode('&', $queryString);

        ksort($queryStringArray);

        $queryString = implode('&', $queryStringArray);

        $queryString = $this->locale->getRequestSignatureString().$queryString;

        $signature = base64_encode(hash_hmac("sha256", $queryString, $this->secretKey, true));

        return $signature;
    }

    /**
     * @param string $url
     * @return mixed
     */
    protected function call($url)
    {
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $url,
            CURLOPT_USERAGENT => 'wpillar/bates cURL'
        ]);

        $response = curl_exec($curl);

        curl_close($curl);

        return $response;
    }
}
