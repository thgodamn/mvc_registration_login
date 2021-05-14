var city = '';
var obl = '';
var region = '';
var address_set = '';

(function($) {
    // here $ would be point to jQuery object
    $(document).ready(function() {
		$.ajaxSetup({
            async: false
        });
	
        $.getJSON("https://api.ipify.org/?format=json", function(e) {
            user_ip = e.ip;
            
            $.ajax({
              //url: 'https://ipwhois.app/json/164.215.49.14',
              url: 'https://ipwhois.app/json/' + e.ip,
              dataType: 'json',
              success: function(data) {
                console.log(data['longitude'] + ',' + data['latitude']);
                
                $.ajax({
                  url: 'https://enterprise.geocode-maps.yandex.ru/1.x/?apikey=YOUR_APIKEY&geocode='+data['longitude'] + ',' + data['latitude']+'&format=json',
                  dataType: 'json',
                  success: function(data) {
                    //console.log(data['response']['GeoObjectCollection']['featureMember']);
                    //console.log(data['response']['GeoObjectCollection']['featureMember']['6']['GeoObject']['name']); //страна
                    //console.log(data['response']['GeoObjectCollection']['featureMember']['5']['GeoObject']['name']); //округ страны
                    //console.log(data['response']['GeoObjectCollection']['featureMember']['4']['GeoObject']['name']); //область
                    //console.log(data['response']['GeoObjectCollection']['featureMember']['3']['GeoObject']['name']); //округ области
                    //console.log(data['response']['GeoObjectCollection']['featureMember']['2']['GeoObject']['name']); //город
                    //console.log(data['response']['GeoObjectCollection']['featureMember']['1']['GeoObject']['name']); //район
                    //console.log(data['response']['GeoObjectCollection']['featureMember']['0']['GeoObject']['name']); //улица
                    
                    city = data['response']['GeoObjectCollection']['featureMember']['2']['GeoObject']['name'];
                    obl = data['response']['GeoObjectCollection']['featureMember']['4']['GeoObject']['name'];
                    region = data['response']['GeoObjectCollection']['featureMember']['1']['GeoObject']['name'];
                  }
                });
                
              }
            });
        });
        console.log(city);
        console.log(obl);
        console.log(region);
        
        $('input[name="address_city"]').click(function(){
            $('.tooltip').css({top: $('input[name="address_city"]').offset()['top']+40, left: $('input[name="address_city"]').offset()['left'], opacity:'1'});
            $('.tooltip').html('<button type="button" class="btn btn-secondary btn-address" data-toggle="city" data-placement="top" title="'+city+'">'+city+'</button>');
            address_set = 'city';
        });
        $('input[name="address_obl"]').click(function(){
            $('.tooltip').css({top: $('input[name="address_obl"]').offset()['top']+40, left: $('input[name="address_obl"]').offset()['left'], opacity:'1'});
            $('.tooltip').html('<button type="button" class="btn btn-secondary btn-address" data-toggle="obl" data-placement="top" title="'+obl+'">'+obl+'</button>');
            address_set = 'obl';
        });
        $('input[name="address_region"]').click(function(){
            $('.tooltip').css({top: $('input[name="address_region"]').offset()['top']+40, left: $('input[name="address_region"]').offset()['left'], opacity:'1'});
            $('.tooltip').html('<button type="button" class="btn btn-secondary btn-address" data-toggle="region" data-placement="top" title="'+region+'">'+region+'</button>');
            address_set = 'region';
        });
        
        $('.tooltip').click(function(){
            console.log($(this).find('.btn-address').html());//html());
            console.log($(this).find('.btn-address').attr('data-toggle'));
            
            $('input[name="address_' + $(this).find('.btn-address').attr('data-toggle') + '"]').val($(this).find('.btn-address').html());
            $('.tooltip').css({top:'-1000px',opacity:'0'});
        });
    });
})(jQuery);