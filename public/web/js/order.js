production_order={
    init:function() {
        var _this = this;
    },
    _order_init:function () {
        /*$("#header").remove();*/
        $("#footer").remove();
        /*会员部分*/
        /*非会员部分*/
        if($('#islogin').val()==-1){
            if($("#one-address").val()==''){
                if(nation_id!=''){
                    $('.searchable-select-holder').css('background-image','none');
                    $('.searchable-select-holder').click(function () {
                        return false;
                    });
                    $(".searchable-scroll ul").each(function () {
                        if($(this).data('id')==nation_id){
                            $(this).click();
                            return false;
                        }
                    });
                }
                if(country_id!=-1 && nation_id==''){
                    $(".searchable-scroll ul").each(function () {
                        if($(this).data('code')==country_id){
                            $(this).click();
                            return false;
                        }
                    });
                }
            }else{
                $("#country").val($("#one-address").val()).trigger('click');
            }
        }
        else{
            if($("#stored-address").length > 0 && nation_id==''){
                $("#stored-address").trigger('change');
            }
            else {
                if(nation_id!=''){
                    $('.searchable-select-holder').css('background-image','none');
                    $('.searchable-select-holder').click(function () {
                        return false;
                    });
                    $(".searchable-scroll ul").each(function () {
                        if($(this).data('id')==nation_id){
                            $(this).click();
                            return true;
                        }
                    });
                }
                if(country_id!=-1 && nation_id==''){
                    $(".searchable-scroll ul").each(function () {
                        if($(this).data('code')==country_id){
                            $(this).click();
                            return true;
                        }
                    });
                }
                if(is_state==2&&$("#one-address").val()!=''){
                    $("#country").val($("#one-address").val()).trigger('click');
                }
            }
        }
    }, // order
    show_product:function () {
        $('.show-order').toggle();
        $('.hide-order').toggle();
        $('.order-product').toggle();
    },
    subscribeCheck:function (e) {
        if($(e).is(':checked')) {
            $(e).val(1);
        }else{
            $(e).val(0);
        }
    },
    _stored_address:function (e) {
        $("label.error").hide();
        if($(e).val() == -1){
            $("input[name='first_name']").val('');
            $("input[name='last_name']").val('');
            $("input[name='adress']").val('');
            $("input[name='city']").val('');
            $("input[name='phone']").val('');
            $("input[name='zipcode']").val('');
            if(nation_id!=''){
                $(".searchable-scroll ul").each(function () {
                    if($(this).data('id')==nation_id){
                        $(this).click();
                        return false;
                    }
                });
            }
            else if(country_id!=-1 && nation_id==''){
                $(".searchable-scroll ul").each(function () {
                    if($(this).data('code')==country_id){
                        $(this).click();
                        return false;
                    }
                });
            }
            else{
                $("#country").val('').click();
            }
            $("select[name='province']").empty();
            /*$("select[name='province']").html('<option val="">'+lang.province+'</option>');*/
        }
        var id = $(e).find("option:selected").data('id');
        if(id==undefined){
            return false;
        }
        $.ajax({
            type: "POST",
            dataType: "JSON",
            data:{address_id:id},
            url: rooturl + 'order/get_Address',
            success: function (data) {
                for(var i in data.data){
                    $('input[name="'+i+'"]').val(data.data[i]);
                    if(i=='country'){
                        $('select[name="country"]').val(data.data[i]).trigger('click');
                    }
                }
                $('#second-address').val(data.data.province);
            }
        });
    },
    _country_list:function () {
        var _self=this;
        $('select[name="country"]').searchableSelect({
            img:true,
            item:['id','code'],
            afterSelectItem:function(){
            }
        });
        $('.searchable-select-item').click(function () {
            $("#country").parent().find('span.error').remove();
            $('select[name="province"]').html("");
            id=$(this).data("id");
            var name = $(this).data('value');
            var country_code=$(this).data("code");
            $('#country_code').val(country_code);
            $.ajax({
                type: "POST",
                dataType: "JSON",
                data:{route:'checkout/checkout/country',country_id:name},
                url: '/index.php?route=checkout/checkout/country&country_id='+name,
                success: function (data) {
                        $('.province').show();
                        if(document.body.clientWidth > 1024) {
                            $('.searchable-select').css("width","200px");
                        }

                        if(data !=""){
                            if(data.zone.length>0){
                                for(var i in data.zone){
                                    var op = '';
                                    op = '<option data-code="'+data.zone[i].code+'" data-id="'+data.zone[i].zone_id+'" data-pid="'+data.zone[i].country_id+'" data-name="'+data.zone[i].name+'" value="'+data.zone[i].zone_id+'">'+data.zone[i].name+'</option>';
                                    $('select[name="province"]').val($('#second-address').val());
                                    $('select[name="province"]').append(op);
                                }
                            }else{
                                op = '<option value="">-- none --</option>';
                                $('select[name="province"]').val($('#second-address').val());
                                $('select[name="province"]').append(op);
                            }
                        }


                       //_self._change_province($('select[name="province"]'));
                        //$('select[name="province"]').change();
                    }
            });
        });
    },
    // _change_province(e){
    //         e.off('change').on('change',function(){
    //             var province_code= e.find('option:checked').data("abbreviation");
    //             $('#province_code').val(province_code);
    //         })
    // },
    _show_terms:function (e) {
        url = $(e).data('url');
        $.showAlert.pop({
            'title' : ' ',
            'content' : '<iframe id="iframe" src="'+url+'&dialog=iframe" width="100%" height="100%" marginwidth="0" marginheight="0" paddingwidth="0" paddingheight="0" scolling="no"></iframe>',
            'modal' : true,
            'isModalClose' : true,
            'width' : '100%',
            'autoClose' : false,
            'className' : 'terms'
        });
        // $.showAlert.iframe({
        //     'title' :   '',
        //     'url' :   'http://'+host+url+'&dialog=iframe',
        //     'modal'   : false,
        //     'width' : '100%',
        //     'autoClose'  : false,
        //     'className' : 'terms'
        // })
        document.getElementById('iframe').onload = function(){
            var _content = $(document.getElementById('iframe').contentWindow.document.body);
            var sUserAgent = navigator.userAgent.toLowerCase();   //浏览器的用户代理设置为小写，再进行匹配
            var isIpad = sUserAgent.match(/ipad/i) == "ipad";   //或者利用indexOf方法来匹配
            var isIphoneOs = sUserAgent.match(/iphone os/i) == "iphone";
            var isMidp = sUserAgent.match(/midp/i) == "midp";  //移动信息设备描述MIDP是一套Java应用编程接口，多适用于塞班系统
            var isUc7 = sUserAgent.match(/rv:1.2.3.4/i) == "rv:1.2.3.4";  //CVS标签
            var isUc = sUserAgent.match(/ucweb/i) == "ucweb";
            var isAndroid = sUserAgent.match(/android/i) == "android";
            var isCe = sUserAgent.match(/windows ce/i) == "windows ce";
            var isWM = sUserAgent.match(/windows mobil/i) == "windows mobil";
    
            if (isIpad || isIphoneOs || isMidp || isUc7 || isUc || isAndroid || isCe || isWM) {
                //该设备为移动设备
                _content.find('.content').css({'margin':'0','padding':'0.5rem','background':'#ffffff'});
                _content.find('.container').css('padding','0');
                _content.css({'background':'#fff','height':'100%'});
                _content.find('.main').css({'width':'100%','margin':'0','padding':'0','background':'#FFF'});
            } else {
                //该设备为PC设备
                _content.find('.container').css({'width':'100%'});
                _content.find('.main').css({'width':'80%','margin':'0 auto','padding':'0','background':'#FFF'});
                _content.find('#content').css({'width':'720px','padding':'0','min-height':'auto'});
                if(document.body.clientWidth < 760){
                    _content.find('.content').css({'margin':'0','padding':'0.5rem','background':'#ffffff'});
                    _content.find('.container').css('padding','0');
                    _content.css({'background':'#fff','height':'100%'});
                    _content.find('.main').css({'width':'100%','margin':'0','padding':'0','background':'#FFF'});
                }
            }
        };
    },
    _discount_code:function (e) {
        if($(e).val() == ''){
            $(e).parents(".discount").find(".discount-apply button").css({"background-color":"#C8C8C8","cursor":"default"});
            $(e).parents(".discount").find(".discount-apply button").attr('disabled',true);
            $(".discount-error").remove();
            $(".discount-code input").css("border","1px solid #E5E5E5");
            // placeholder
            /*$(e).parent().find(".up").hide();
            $(e).parent().find(".up").css("top","14px");
            $(e).css("padding","10px 0");*/
        }else{
            $(e).parents(".discount").find(".discount-apply button").css({"background-color":"#1990c6","cursor":"pointer"});
            $(e).parents(".discount").find(".discount-apply button").attr('disabled',false);
            // placeholder
            /*$(e).parent().find(".up").show();
            $(e).parent().find(".up").css("top","3px");
            $(e).css("padding","20px 0 0");*/
        }
    },
    _discount_apply:function () {
        var discount_code = $(".discount input").val();
        $.ajax({
            type: "POST",
            dataType: "JSON",
            data: {discount_code:discount_code},
            url: rooturl + '/order/check_Discount_Code',
            success: function (data) {
                if(data.code == 1){
                    /*成功后恢復默認*/
                    $(".discount-code input").val('');
                    $(".discount-code input").css("border","1px solid #E5E5E5");
                    $(".discount-apply button").attr('disabled',true);
                    $(".discount-apply button").css({"background-color":"#C8C8C8","cursor":"default"});
                    $(".discount-error").remove();
                    /*成功后Discount Show*/
                    $(".discount-price").css('display','flex');
                    var sign = data.data.price.sign;
                    var shipping = data.data.price.freight;
                    var discount = data.data.price.d_price;
                    var total = data.data.price.total_price;
                    if(shipping == 0){
                        $(".shipping-price .get-shipping").html(lang.free);
                        $(".shipping-price .get-shipping").removeClass('exchange-rate');
                        $(".shipping-price .get-shipping").removeAttr('data-present');
                    }else{
                        $(".shipping-price .get-shipping").html(sign + shipping);
                        if($('input[name="discount_judge"]').val() == 1){
                            $(".shipping-price .get-shipping").addClass('exchange-rate');
                            $(".shipping-price .get-shipping").attr('data-present',shipping);
                        }
                    }
                    $(".discount-price .get-discount").attr('data-present',discount);
                    $(".discount-price .get-discount").html(sign + discount);
                    $(".get-total").attr('data-present',total);
                    $(".get-total").html(sign + total);
                    var code = data.data.code_info.code;
                    $(".discount-price .get-code").html(code);

                    Common._exchangeRate();
                }
                else if(data.code == -1){
                    err = '';
                    err = '<div class="discount-error">'+lang.unable_discount+'</div>';
                    $(".discount-error").remove();
                    $(".discount").append(err);
                    $(".discount-code input").css("border","2px solid #FF6D6D");
                }
                else{
                    err = '';
                    err = '<div class="discount-error">'+lang.requirements_discount+'</div>';
                    $(".discount-error").remove();
                    $(".discount").append(err);
                    $(".discount-code input").css("border","2px solid #FF6D6D");
                }
            }
        });
    },
    _discount_delete:function () {
        $.ajax({
            type: "POST",
            dataType: "JSON",
            url: rooturl + '/order/del_Discount_Code',
            success: function (data) {
                $(".discount-price").hide();
                var sign = data.data.price.sign;
                var shipping = data.data.price.freight;
                var discount = data.data.price.d_price;
                var total = data.data.price.total_price;
                if(shipping == 0){
                    $(".shipping-price .get-shipping").html(lang.free);
                    $(".shipping-price .get-shipping").removeClass('exchange-rate');
                    $(".shipping-price .get-shipping").removeAttr('data-present');
                }else{
                    $(".shipping-price .get-shipping").html(sign + shipping);
                    if($('input[name="discount_judge"]').val() == 1){
                        $(".shipping-price .get-shipping").addClass('exchange-rate');
                        $(".shipping-price .get-shipping").attr('data-present',shipping);
                    }
                }
                $(".discount-price .get-discount").attr('data-present',discount);
                $(".discount-price .get-discount").html(sign + discount);
                $(".get-total").attr('data-present',total);
                $(".get-total").html(sign + total);
                $(".discount-price .get-code").html('');
                $(".discount-price .discount-code").html('');

                Common._exchangeRate();
            }
        });
    },
    _to_payment:function () {
        data = $("#order").serializeObject();
        var subscribe = $('.subscribe-check').val();
        data.subscribe = subscribe;
        $.ajax({
            type: "POST",
            dataType: "JSON",
            data: data,
            url: rooturl + '/order/save_Address',
            success: function (data) {
                if(data.code!=1){
                    var msg=data.msg||'fail';
                    alert(msg);
                    return;
                }
                else{
                    var location = $("#order").attr("action");
                    window.location.href=location;
                }
            }
        });
    },
    _payment_init:function () {
        /*$("#header").remove();*/
        $("#footer").remove();
        $('#payment-method input[name="radio"]:first').attr("checked","checked");
        if($('input[name="radio"]:checked').val() == 2){
            $("#credit-content").show();
        }
        if($('input[name="radio"]:checked').val() == 4){
            $("#paypal-content").show();
            /*submit*/
            $("#complete-button").hide();
            $("#paypal-button").show();
        }
        /*Credit*/
        $(document).ready(function (){
            /*CardNumber*/
            var t = $("#CardNumber");
            if(t.length>0){
                t=t[0];
                t.onkeydown = change;
                t.onkeyup = change;
                t.onkeypress = change;
                t.oninput = change;
                t.onchange = change;
            }
            /*CardCvv*/
            var c = $("#CardCvv");
            if(c.length>0){
                c=c[0];
                c.onkeydown = max;
                c.onkeyup = max;
                c.onkeypress = max;
                c.oninput = max;
                c.onchange = max;
            }
        });
        function change() {
            this.value = this.value.replace(/\D/g, '').replace(/....(?!$)/g, '$& '); //替换空格前4位数字为4位数字加空格
        }
        function max() {
            this.value = this.value.replace(/\[a-zA-Z0-9]/g, '');
        }
    }, // payment
    _payment_method:function (e) {
        $(e).find('.payment-check').prop("checked", true);
        if($(e).attr('pay') == 2){
            $('#CardNumber').val('');
            $('#CardMonth').val('').trigger('click');
            $('#CardYear').val('').trigger('click');
            $('#CardCvv').val('');
            $('#credit-content label.error').remove();
            $("#credit-content").show();
            $("#paypal-content").hide();
            /*submit*/
            $("#complete-button").show();
            $("#paypal-button").hide();
        }else if($(e).attr('pay') == 4){
            $("#paypal-content").show();
            $("#credit-content").hide();
            /*submit*/
            $("#complete-button").hide();
            $("#paypal-button").show();
        }else{
            $("#credit-content").hide();
            $("#paypal-content").hide();
            /*submit*/
            $("#complete-button").show();
            $("#paypal-button").hide();
        }
    },
    _complete_order:function (msg,type,callback) {
        //$("#order_result").submit();
    },
    oceanpayment:function($pay_data) {
        $.each($pay_data,function(i,v){
            var k='input[name="'+i+'"]';
            $("#oceanpay "+k).val(v);
        });
        $.showAlert.iframe({
            'title' : ' ',
            'content' : '',
            'modal' : true,
            'isModalClose' : false,
            'width' : '100%',
            'autoClose' : false,
            'closebtn':false,
            'className' : 'oeanpayment',
            'url':'/sale/order/check'
        });
    }
};

$(function(){
    production_order.init();
});