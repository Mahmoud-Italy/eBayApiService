  <div class="product-card" style="width: 100%">
            
      <div id="{{ $item['itemId'] }}" class="product-image">
          <a href="{{ $item['viewItemURL'] }}" target="_blank" title="{{ $item['title'] }}">
              <img src="{{ $item['galleryURL'] ?? 
                          'https://thumbs1.sandbox.ebaystatic.com/pict/1105286766764040_0.jpg' }}" 
                style="width: 100%;height: 280px" />
          </a>
      </div>

      <div class="product-information">

          <div class="product-name">
            <a href="{{ $item['viewItemURL'] }}" target="_blank" title="{{ $item['title'] }}">
                <span>{{ $item['title'] ?? '' }}</span>
            </a>
            <p>{{ $item['primaryCategory']['categoryName'] ?? '' }}</p>
            <p>{{ $item['globalId'] ?? '' }}</p>
            <p>{{ $item['condition']['conditionDisplayName'] ?? '' }}</p>
            <p>{{ str_replace('from now', 'left', \Carbon\Carbon::parse($item['listingInfo']['endTime'])->diffForHumans()) }}</p>
          </div>

          <div class="product-price">
            <span>$ {{ $item['sellingStatus']['currentPrice'] ?? '' }}</span>
          </div>
      </div>

  </div>