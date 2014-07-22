         function iframeloading(url) {//iframe读取到层上，宽度几乎最大，也可以用于图片调用
              $.blockUI({ 
            message: url,  timeout:0,
            css: { 
                width: '90%', 
                height:'93%',
                top:'3%',
                left:'103%',
                
                backgroundColor: '#fefefe', 
                '-webkit-border-radius': '10px', 
                '-moz-border-radius': '10px', 
            } 

        }); 
        $('div.blockMsg').animate({left:'3%'},'fast').append('<a class="blockUI closeb" title="关闭" href="javascript:void(0)"> &times; </a>').attr('title','Click to unblock').click($.unblockUI);//附带消失按钮
        //$('div.header', parent.document).hide();  
         }//iframe结束