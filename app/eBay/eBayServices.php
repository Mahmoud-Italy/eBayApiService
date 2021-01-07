<?php
namespace App\eBay;

class eBayServices 
{
  protected $data;
  protected $page = 1;
  protected $perPage = 10;

  function __construct()
  {
    $this->page = request('page') ?? 1;
    $data = 'https://svcs.sandbox.ebay.com/services/search/FindingService/v1?'
                    . 'OPERATION-NAME=findItemsByKeywords&'
                    . 'SERVICE-VERSION=1.0.0&'
                    . 'SECURITY-APPNAME=' .$this->appID(). '&'
                    . 'RESPONSE-DATA-FORMAT=XML&'
                    . 'REST-PAYLOAD=&'
                    . 'paginationInput.pageNumber=' .$this->page. '&';
    
    $this->data = $data;
  }


  public function findKeywords()
  {
    if(request('keywords')) {
      $this->data .= 'keywords=' .request('keywords'). '&';
    }
    return $this;
  }

  public function maxPrice()
  {
    if(request('maxPrice')) {
      $this->data .= 'itemFilter(0).name=MaxPrice&itemFilter(0).value=' .number_format(request('maxPrice'), 1). '&';
    }
    return $this;
  }

  public function minPrice()
  {
    if(request('minPrice')) {
      $this->data .= 'itemFilter(1).name=MinPrice&itemFilter(1).value=' .number_format(request('minPrice'), 1). '&';
    }
    return $this;
  }

  public function sort()
  {
    if(request('sort')) {
      $this->data .= 'sortOrder=' .request('sort'). '&';
    }
    return $this;
  }

  public function paginate($perPage)
  { 
    $this->perPage = $perPage;
    $this->data .='paginationInput.entriesPerPage=' .$this->perPage;

    $client = new \GuzzleHttp\Client();  //  Initializing  a  new  client 
    return $client->request('GET', $this->data);
  }

  public function appID()
  {
      return ENV('eBAY_APPID'); // Your appid
  }

}