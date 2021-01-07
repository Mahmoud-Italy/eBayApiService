<!DOCTYPE html>
<html lang="en">
<head>
    <title> eBay - Search </title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="qpv49O0VW8mQFx466MyGbWSw1WIIBJ2zozIDSVC6">
    <meta http-equiv="content-language" content="en">
    <link rel="stylesheet" href="https://demo.bagisto.com/ebay-comman/themes/default/assets/css/shop.css">
    <link rel="stylesheet" href="https://demo.bagisto.com/ebay-comman/vendor/webkul/ui/assets/css/ui.css">
</head>

<body>
    <div id="app">

      <div class="main-container-wrapper">
        <div class="header" id="header">

          <div class="header-top">
            <div class="left-content">
              <ul class="logo-container">
                <li>
                    <a href="https://demo.bagisto.com/ebay-comman">
                        <img class="logo" 
                            src="https://demo.bagisto.com/ebay-comman/themes/default/assets/images/logo.svg" />
                    </a>
                </li>
              </ul>

              <ul class="search-container">
                  <li class="search-group">
                      <form role="search" 
                            action="{{ url('/') }}" 
                            method="GET">

                          <input type="search" 
                                name="keywords" 
                                class="search-field" 
                                placeholder="Search products here" 
                                value="{{ $_GET['keywords'] ?? '' }}">
                          <div class="search-icon-wrapper">
                              <button class="background: none">
                                  <i class="icon icon-search"></i>
                              </button>
                          </div>

                          <input type="search"
                                name="minPrice"
                                placeholder="Min Price"
                                value="{{ $_GET['minPrice'] ?? '' }}">

                          <input type="search"
                                name="maxPrice"
                                placeholder="Max Price"
                                value="{{ $_GET['maxPrice'] ?? '' }}">

                          <select name="sort">
                            <option value="BestMatch">Best Match</option>
                            <option value="PricePlusShippingHighest">Sort by Highest Price</option>
                            <option value="PricePlusShippingLowest">Sort by Lowest Price</option>
                          </select>

                      </form>
                  </li>
              </ul>


            </div>
          </div>

        </div>

        <div class="content-container">
          <div class="main mb-30" style="min-height: 27vh;">
              <div class="search-result-status mb-20">
                  <span><b>{{ $row['searchResult']['@attributes']['count'] ?? 0 }} </b>Search Results Found</span>
              </div>
                
              <div class="product-grid-4">

                @if($items)
                  @foreach($items as $item)
                    @include('items', ['item' => $item])
                  @endforeach
                @endif

               </div>

              <div class="pagination">

              </div>                    
          </div>

            </div>
        </div>
    </div>

</body>
</html>