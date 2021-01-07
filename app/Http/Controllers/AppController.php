<?php

namespace App\Http\Controllers;

use App\eBay\eBayServices;
use Illuminate\Http\Request;

class AppController extends Controller
{

    public function index()
    {
      try {
          // Calling eBayService & filtration classes
          $ebay  = new eBayServices;
          $ebay->findKeywords()
                  ->maxPrice()
                  ->minPrice()
                  ->sort();

          $result = $ebay->paginate(request('perPage') ?? 12);

          // Since  $result  return  XML  string  I  use  simplexml_load_string()  
          // method  to  convert  it  into  a  object
          $xml = simplexml_load_string($result->getBody());

          // Now  I  use json_encode()  to  convert  $xml  into  a  JSON string
          $json = json_encode($xml);

          // Now  I  decode $json  into  a  array  with  using  json_decode($val,  TRUE)
          // RATHER  THAN  WORKING  WITH  AN  OBJECT  I  FEEL  ARRAY  IS  MUCH  EASY. 
          $jsonResultToArray = json_decode($json, TRUE);

          //$items = $jsonResultToArray['searchResult']['item'] ?? NULL;
          //return view('app')->withitems($items)->withrow($jsonResultToArray);
          return response()->json(['items' => $jsonResultToArray ?? NULL], 200);

      } catch (\Exception $e) {
          //return view('app')->withitems([]);
          return response()->json(['items' => $e->getMessage()], 500);
      }
    }


}