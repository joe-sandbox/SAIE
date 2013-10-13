/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
var Builder = {
    buildFormNewProject:  
        function(appendTo){
            var view= "<form id='saveProject'><ul><li>\n\
                        <label class='headTitle'>Nombre</label>\n\
                     </li><li>\n\
                         <input type='text' id='name' name='name'/>\n\
                     </li><li>\n\
                         <label class='headTitle'>Descripción</label>\n\
                     </li><li>\n\
                         <textarea id='description' name='description' placeholder='Descripción del proyecto...' rows='4' cols='50'></textarea>\n\
                     </li><li>\n\
                         <label class='headTitle'>Categorías</label>\n\
                     </li>";
             var cats = Getter.getCategories();
             for(var i = 0 ; i<cats.length;i++){
                 view += "<li><input type='checkbox' name='categories[]' value='"+cats[i][0]+"'>"+cats[i][1]+"</input></li>" ;
             }
             view += "</li><li>\n\
                     <input type='button' id='saveBtn' value='Crear' onclick='Saver.saveNewForm(\"Project\",\"saveProject\",\"content\")'/></li>\n\
                </ul></form>";
             $(appendTo).append(view);
        },
    buildDeleteProjects:  
        function(appendTo){
            var view = "<form id='delProject'><select id='select-project-names' name='id'>";
            var arr = Getter.getProjects("IdAndName",null);
            for(var i = 0 ; i < arr.length ; i++){
                view += "<option value='"+arr[i].project_id+"'>"+arr[i].name+"</option>";
            }
            view += "</select><input type='button' id='saveBtn' name='id' value='Borrar' \n\
                        onclick='Saver.saveDelForm(\"Project\",\"delProject\",\"content\")'/>\n\
                   </form>";
            $(appendTo).append(view);                                
        },
    builDropDownProject:  
        function(appendTo){
            var view= "<form id='modProject'>\n\
                            <ul>\n\
                                <li>\n\
                                    <select id='select-project-names' name='id'\n\
                                            onchange='Builder.buildFormModProject(\"modProject-content\",\"select-project-names\")'>";
            var arr = Getter.getProjects("IdAndName",null);
            //alert(arr[0].project_id+"---"+arr[0].name);
            view += "<option value='0'>Seleccione un proyecto</option>";
            for(var i = 0; i < arr.length; i++){
                view += "<option value='"+arr[i].project_id+"'>"+arr[i].name+"</option>";
            }
            view += "</select></li><li><div id='modProject-content'></li></ul> </form>";
            $(appendTo).append(view);
        },

    buildFormModProject:  
        function(appendTo,selectid){
            appendTo = "#"+appendTo;
            selectid = "#"+selectid;
            var projectid = $(selectid).val();
            var project = Getter.getProjects("byId",projectid);
            var view= "<ul><li>\n\
                               <label class='headTitle'>Nombre</label>\n\
                            </li><li>\n\
                                <input type='text' id='name' name='name'value='"+project[0].name+"'/>\n\
                            </li><li>\n\
                                <label class='headTitle'>Descripción</label>\n\
                            </li><li>\n\
                                <textarea id='description' name='description' \n\
                                    placeholder='Descripción del proyecto...' rows='4' \n\
                                    cols='50'>"+project[0].description+"</textarea>\n\
                            </li><li>\n\
                                <label class='headTitle'>Categorías</label>\n\
                            </li>";
            var cats = Getter.getCategories();
            var checked = "";
            for(var i = 0 ; i<cats.length;i++){
                if(jQuery.inArray(cats[i][1],project[0].categories) !== -1){
                    checked = "checked";
                }else{
                    checked = "";
                }
                view += "<li><input type='checkbox' name='categories[]' value='"+cats[i][0]+"' "+checked+"\n\
                        >"+cats[i][1]+"</input></li>" ;
            }
            view += "</li><li>\n\
                        <input type='button' id='saveBtn' value='Crear' \n\
                            onclick='Saver.saveModForm(\"Project\",\"modProject\",\"content\")'/></li>\n\
                   </ul>";
            $(appendTo).append(view);
        },
        /**
         * Builds the view project section.
         * @param {type} appendTo
         * @param {type} projectId if set, select that project id.
         * @returns {undefined}
         */
        buildViewProject: function(appendTo,projectId){
            var formId = "viewProject"; 
            var view= "<form id='"+formId+"'>\n\
                        <ul><li><label>Proyecto</label></li>\n\
                            <li>\n\
                                <select id='select-project-names' name='project_id'\n\
                                        onchange='Loader.loadViewForm(\"viewProject-content\",\"select-project-names\",\""+formId+"\")'>";
            var arr = Getter.getProjects("IdAndName",null);
            view += "<option value='0'>Seleccione un proyecto</option>";
            for(var i = 0; i < arr.length; i++){
                view += "<option value='"+arr[i].project_id+"'>"+arr[i].name+"</option>";
            }
            view += "</select></li><li><div id='viewProject-content'></div></li></ul> </form>";
            $(appendTo).append(view);
            if(projectId.length>0)$("#select-project-names").val(projectId);
        },
        buildSetQuestionsForm:function(appendTo,project_id,formId){
                appendTo = "#"+appendTo;
                var response = Getter.getQuestions("byProjectId",project_id);
                var view = "";
                if(response.length === 0){
                    view += this.buildNewQuestionsForm(formId);
                    $(appendTo).append(view);
                }else{
                    view += "<label>Preguntas</label>";
                    var accordion = "<div id='accordion-questions'>";
                    for(var i=0; i<response.length ; i++){
                        accordion += "<h3>"+response[i].question+"</h3><div id='accordion-content2'>";
                        var answers = Getter.getAnswers("allQuestionId",response[i].question_id);
                        for(var x=0;x<answers.length;x++){
                            accordion += "<div id='answer-content'>";
                            accordion += "<label>"+answers[x].answer+"</label>";
                            accordion += "<label>"+answers[x].date_creation+"</label>";
                            accordion += "<label>"+answers[x].name+"</label>";
                            accordion += "</div>";
                        }
                        accordion += "</div>";
                    }
                    accordion += "</div>";
                    accordion = $(accordion).accordion({ heightStyle: "content" }).css("margin-right","20px");
                    $(appendTo).empty().append(view).append(accordion);
                }
        },
        buildNewQuestionsForm:function(formId){
                var view = "<label>Ingrese sus preguntas</label><ul>";
                for(var i=0;i<15;i++){
                    view += "<li><input type='text' name='questions[]' placeholder='Ingrese su pregunta'></input></li>"
                }
                view += "<li><input type='button' value='Guardar Preguntas' \n\
                        onclick='Saver.saveNewForm(\"Question\",\""+formId+"\",\"content\")''/></li></ul>";
                return view;                
        },                
        buildNewAnswersForm:function(appendTo,projectId,formId){
                appendTo = "#"+appendTo;
                var response = Getter.getQuestions("byProjectId",projectId);
                var view = "";
                if(response.length === 0){
                    view += this.buildNewQuestionsForm(formId);
                    $(appendTo).append(view);
                }else{
                    view += "<label>Preguntas</label>";
                    var accordion = "<div id='accordion-questions'>";
                    for(var i=0; i<response.length ; i++){
                        var answers = Getter.getAnswers("byQuestionId",response[i].question_id);
                        accordion += "<h3>"+response[i].question+"</h3><div id='accordion-content-"+i+"'>";
                        accordion += "<form id='answers-"+i+"'>";
                        accordion += "<input type='hidden' name='question_id' value='"+response[i].question_id+"'/>";
                        if(answers.length > 0){
                            accordion += "<label>"+answers[0].answer+"</label>";
                            accordion += "<label>Fecha de creación: "+answers[0].date_creation+"</label>";
                        }else{                            
                            accordion += "<textarea name='answer' rows='4' cols='50'></textarea>";  
                            accordion += "<input type='button'\n\
                                    onclick='Saver.saveNewForm(\"answer\",\"answers-"+i+"\",\"accordion-content-"+i+"\")' value='Guardar Respuesta'/>";
                        }
                        accordion += "</form>";
                        accordion += "</div>";
                        /**
                         * creo un form
                         *      creo un hidden de question _id
                         *      creo un textarea
                         *      creo un boton   Saver.
                         *      
                         */
                    }                    
                    accordion += "</div>";
                    accordion = $(accordion).accordion({ heightStyle: "content" }).css("margin-right","20px");
                    $(appendTo).empty().append(view).append(accordion);                    
                }
        }
}

