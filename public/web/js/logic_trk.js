(function() {
                          window.FacebookPixel = undefined;
                          var loadScript = function(url, callback) {
                            var script = document.createElement('script');
                            script.type = 'text/javascript';
                            if (script.readyState) {
                              script.onreadystatechange = function() {
                                  callback();
                            };
                         } else {
                           script.onload = function() {
                             callback();
                          };
                       }
                       script.src = url;
                       document.getElementsByTagName('head')[0].appendChild(script);
                    };
                    if (typeof fbq === 'undefined') {
                      var myAppJavaScript = function($) {
                        ! function(f, b, e, v, n, t, s) {
                          if (f.fbq) return;
                          n = f.fbq = function() {
                            n.callMethod ?
                            n.callMethod.apply(n, arguments) : n.queue.push(arguments)
                         };
                         if (!f._fbq) f._fbq = n;
                         n.push = n;
                         n.loaded = !0;
                         n.version = '2.0';
                         n.queue = [];
                         t = b.createElement(e);
                         t.async = !0;
                         t.src = v;
                         s = b.getElementsByTagName(e)[0];
                         s.parentNode.insertBefore(t, s)
                      }(window,
                      document, 'script', '//connect.facebook.net/en_US/fbevents.js');
                      window.FacebookPixel = fbq;
                      $(document).ready(function() {
                       var str = JSON.stringify(["206116389980648","212591662841091","1395501283844921","2027048570910169","1852629591453311","331632234017812"]);
                       var newArr = JSON.parse(str);
                       for (var i = 0; i < newArr.length; i++) {
                         FacebookPixel('init', newArr[i]);
                      }
                      FacebookPixel('track', 'PageView');
                     
                     var addedToCart = false;
                      var addToCart = function() {
                      	sessionStorage.removeItem('variant_name');
                      	var name;
                      	var my_variants = location.search;
                      	if(my_variants != '' || my_variants != undefined || my_variants != null) {
                      		var my_id = my_variants.split('=');
                      		my_id = my_id[1];
                      		for(var i = 0; i < meta.product.variants.length; i++) {
                      			if(meta.product.variants[i].id == my_id) {
                      				name = meta.product.variants[i].name;
                      				sessionStorage.setItem('variant_name',name);
                      			} 
                      		}
                      	} 
                      	if(sessionStorage.getItem('variant_name') != null) {
                      		name = sessionStorage.getItem('variant_name');
                      	} else {
                      		name = meta.product.variants[0].name;
                      	}
                         if (!addedToCart) {
                           FacebookPixel('track', 'AddToCart', {
                             content_ids: __st.rid,
							 content_type: 'product_group',
                             content_category: meta.product.type,
                             content_name: name,
                          });
                        //addedToCart = true;
                       }
                       
                    };
                     
                    if (location.pathname.match(/\/products\/.+/)) {
                      FacebookPixel('track', 'ViewContent', {
						content_ids: __st.rid,
						content_type: 'product_group',
						content_category: meta.product.type,
						content_name: meta.product.variants[0].name,
						//value: (meta.product.variants[0].price /100),
                     });
                 $('form[action="/cart/add"]').submit(function() {
                     	//console.log('a');
                /*     	setTimeout(function(){
	                         //console.log('n');
                     	},500);*/
                        addToCart()
                     });
                    /* $(document).ajaxComplete(function(e, xhr, settings) {
                        if (settings.url.match(/^\/cart\/add/)) {
                          addToCart()
                       }
                    });*/
                 }
                 if (location.pathname.match(/^\/cart/)) {
                   $('form[action="/cart"]').submit(function(e) {
                     FacebookPixel('track', 'InitiateCheckout', {
                       content_ids: __st.rid,

                    });
                 });
              }
if (Shopify.Checkout && Shopify.Checkout.page == 'thank_you') {
  var getOrderID = localStorage.getItem('order_id');
  var orderID = Shopify.checkout.line_items[0].product_id;
  console.log('orderID',orderID);
  var checkout = Shopify.checkout
  FacebookPixel('track', 'Purchase', {
    content_ids: checkout.line_items[0].product_id,
    content_type: 'product_group',
    value: checkout.total_price,
    currency: checkout.currency,
    num_items: Shopify.checkout.line_items.length,

  });
  localStorage.setItem('order_id', orderID);
} //end of if shopify.checkout
});
};

     if (typeof jQuery === 'undefined') {
      loadScript('//ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js', function() {
        jQuery220 = jQuery.noConflict(true);
        myAppJavaScript(jQuery220);
     });
  } else {
   myAppJavaScript(jQuery);
}
}
})()