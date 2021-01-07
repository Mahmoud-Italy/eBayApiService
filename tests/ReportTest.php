<?php

class ReportTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_ebay_api_search_via_keywords()
    {
        // Send request
        $response = $this->json('GET', '/v1/products?keywords=phone');

        // Assert Status was successful
        $this->assertEquals(200, $this->response->status());
    }

    public function test_ebay_api_search_via_price_range()
    {
        // Send request
        $response = $this->json('GET', '/v1/products?keywords=phone&maxPrice=50&minPrice=10');

        // Assert Status was successful
        $this->assertEquals(200, $this->response->status());
    }

    public function test_ebay_api_sorting_via_price_best_match()
    {
        // Send request
        $response = $this->json('GET', '/v1/products?sort=bestMatch');

        // Assert Status was successful
        $this->assertEquals(200, $this->response->status());
    }

    public function test_ebay_api_sorting_via_price_lowest()
    {
        // Send request
        $response = $this->json('GET', '/v1/products?sort=PricePlusShippingLowest');

        // Assert Status was successful
        $this->assertEquals(200, $this->response->status());
    }

    public function test_ebay_api_sorting_via_price_highest()
    {
        // Send request
        $response = $this->json('GET', '/v1/products?sort=PricePlusShippingHighest');

        // Assert Status was successful
        $this->assertEquals(200, $this->response->status());
    }

}
