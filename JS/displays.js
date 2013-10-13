/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

function displayProjectsCategoriesAccordion(filter,apenddTo){
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
        var html = "";
        $.ajax({
                method: 'post',
                url: url,
                data: { filter: filterVal},
                async: false,
                datatype: "json",
                success: function(result){
                    response =$.parseJSON(result);
                    var output = "";
                    for(var i=0; i<response.length;i++){
                        html += "<h3>"+response[i].name+"</h3><div id='accordion-content'>";
                        for(var j = 0; j<response[i].projects.length; j++){
                            var obj = response[i].projects[j];
        /************************************************************************************************
         * 0    |1          |2              |3              |4          |5          |6          |7
         * ----------------------------------------------------------------------------------------------
         * id   |name       |description    |date_creation  |pp_id      |total_Answers   |date_update | user_name 
         ************************************************************************************************/
                            html += "<div id='project' onclick=''>\n\
                                            <label class='hoverClass' id='project-name'>"+obj.name+"</label><input type='hidden' value='"+obj.project_id+"'\n\
                                            <label class='hoverClass' id='project-user'> Por: "+obj.user_name+"</label>\n\
                                            <label class='hoverClass' id='project-phase'>Fase: "+obj.pp_id+"</label>\n\
                                            <label class='hoverClass' id='project-answers'>Respuestas: "+obj.total_answers+"\n\
                                            <label class='hoverClass' id='project-description'>Descripción: "+obj.description+"\n\
                                            </div>";
                            /*var str =" nombre:"+obj.name+" id:"+obj.project_id+" usuario:"+obj.user_name+" Fase:"+obj.pp_id+" Respuestas: "+obj.total_answers;
                            alert(str);*/
                        }
                        html += "</div>";
                    returnVal = true;
                    }
                },                
                error: function(jqXHR, exception){ajaxError(jqXHR, exception);returnVal=false}        
             });       
             
     $(apenddTo).append(html).accordion().css("margin-right","20px"); 
}


