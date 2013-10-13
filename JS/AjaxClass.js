/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

var AjaxClass = {
    getterAjax: function(data,url){    
        var response;
        $.ajax({
                method: 'post',
                url: url,
                async: false,
                data: data,
                datatype: "json",
                success: function(result){
                    response =$.parseJSON(result);
                },                
                error: function(jqXHR, exception){AjaxClass.ajaxError(jqXHR, exception);}        
             });  
        return response;
    },
    ajaxError: function(jqXHR, exception){    
                        if (jqXHR.status === 0) {
                            alert('Not connect.\n Verify Network.');
                        } else if (jqXHR.status == 404) {
                            alert('Requested page not found. [404]');
                        } else if (jqXHR.status == 500) {
                            alert('Internal Server Error [500].');
                        } else if (exception === 'parsererror') {
                            alert('Requested JSON parse failed.');
                        } else if (exception === 'timeout') {
                            alert('Time out error.');
                        } else if (exception === 'abort') {
                            alert('Ajax request aborted.');
                        } else {
                            alert('Uncaught Error.\n' + jqXHR.responseText);
                        }
    },
    ajaxProcess: function(url,whereToAppend,formId,locEnum){
                    formId = "#"+formId;
                    whereToAppend = "#"+whereToAppend;
                    $.ajax(
                        {
                            url: url,
                            method: 'post',
                            data: $(formId).serialize(),
                            dataType: 'html',
                            async: false,
                            success: function(response){
                                        console.log("sucess!");
                                        if(locEnum.length > 0){
                                            Loader.loadContent(locEnum);
                                        }else{
                                            var html = "<div id='response'>"+response+"</div>";
                                            $(whereToAppend).empty().append(html);
                                        }
                                    },
                            error: function(jqXHR, exception){AjaxClass.ajaxError(jqXHR, exception);
                        }
                    });
                    
                    },
                
    ajaxLogin: function(formId){
                    formId = "#"+formId;
                    var result;
                    var data = $(formId).serialize();
                    $.ajax(
                        {
                            url: Url.loginPHP,
                            method: 'post',
                            data: data,
                            dataType: 'html',
                            async: false,
                            success: function(response){
                               console.log("success!");
                               console.log(response);
                                    if(response === "logged"){
                                        Url.redirectTo(Url.mainMenuUrl,"");
                                    }else{
                                        result = false;
                                    }
                                },
                            error: function(jqXHR, exception){
                                AjaxClass.ajaxError(jqXHR, exception);
                                result= false;
                            }
                    });
                    return result;
                }          
}
