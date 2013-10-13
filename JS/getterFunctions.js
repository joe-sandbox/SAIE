/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
function displayProjectsCategoriesAccordion(filter){
        var filterVal ;
        switch(filter){
            case "category":
                filterVal = "category";
                break;
            default:
                filterVal = "";
        }
        var response;
        var loc = window.location.href;
        var dir = loc.substring(0, loc.lastIndexOf('/'));
        var url = dir + "/View_Builder/viewProjectsCategories.php";
        var returnVal = false;
        $.ajax({
                method: 'post',
                url: url,
                data: { filter: filterVal},
                async: false,
                datatype: "json",
                success: function(result){
                    response =$.parseJSON(result);
                    for(var i=0; i<response.length;i++){
                        var element = "<h3>"+response[i][1]+"</h3>";
                        $(element).appendTo("#projectsAccordion");
                        var div = "<div id=\"accordion-content"+i+"\"></div>";
                        $(div).appendTo("#projectsAccordion");
                    //$('#user').html(myUser.Name);
                    returnVal = true;
                    }
                },                
                error: function(jqXHR, exception){ajaxError(jqXHR, exception);returnVal=false}        
             });                   
     $( "#projectsAccordion" ).accordion();      
     $( "#projectsAccordion" ).css("margin-right","20px"); 
}

function ajaxError(jqXHR, exception){    
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
}
function getCategories(){    
        var filterVal ;
        switch(filter){
            case "category":
                filterVal = "category";
                break;
            default:
                filterVal = "";
        }
        var response;
        var loc = window.location.href;
        var dir = loc.substring(0, loc.lastIndexOf('/'));
        var url = dir + "/View_Builder/viewCategories.php";
        var returnVal = false;
        $.ajax({
                method: 'post',
                url: url,
                data: { filter: filterVal},
                async: false,
                datatype: "json",
                success: function(result){
                    response =$.parseJSON(result);
                    for(var i=0; i<response.length;i++){
                        var element = "<h3>"+response[i][1]+"</h3>";
                        $(element).appendTo("#projectsAccordion");
                        var div = "<div id=\"accordion-content"+i+"\"></div>";
                        $(div).appendTo("#projectsAccordion");
                    //$('#user').html(myUser.Name);
                    returnVal = true;
                    }
                },                
                error: function(jqXHR, exception){ajaxError(jqXHR, exception);returnVal=false}        
             });                   
     $( "#projectsAccordion" ).accordion();      
     $( "#projectsAccordion" ).css("margin-right","20px"); 
}


