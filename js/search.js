/**
 * Created by BILYAMIN on 11/23/2015.
 */
nshopper = {
  filter_products_by_price: function()
  {
      min_price = $('#min-price').val();
      max_price = $('#max-price').val();
      if((min_price > 0 && min_price < max_price) && (max_price > min_price))
      {
          $('#price-filter-form').submit();
      }
  },
    filter_products_by_brand: function()
    {
        $('#brand-filter-form').submit();
    }
};