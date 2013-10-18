/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

var Loader = {
    loadContent: function(locEnum){
                    var appendTo = Loader.clearContentAndAppend(locEnum); 
                    Loader.addContent(locEnum);
    },
/**
 * Appends to the jquery object the result of the correponding process according 
 * to the idElement.
 * @param {string} locEnum .
 * @returns {null}
 */
    addContent: function(locEnum){   
        var appendTo = "#"+locEnum;
        console.log(locEnum == LocEnum.login);
                        switch(locEnum){
                            case LocEnum.home:
                                displayProjectsCategoriesAccordion("category",appendTo);
                                break;
                            case LocEnum.message:
                                break;
                            case LocEnum.help:
                                break;
                            case LocEnum.newProjectForm:
                                Builder.buildFormNewProject(appendTo);
                                break;
                            case LocEnum.modProjectForm:
                                //buildFormModProject(apenddTo);
                                Builder.builDropDownProject(appendTo);
                                break;
                            case LocEnum.deleteProjectForm:
                                Builder.buildDeleteProjects(appendTo);
                                break;
                            case LocEnum.viewProjectForm:
                                Builder.buildViewProject(appendTo,"");
                                break;
                            case LocEnum.login:
                                console.log("entre!");
                                Url.redirectTo(Url.loginUrl,"");
                                break;
                            default:
                        }                
            },
/**
 * Clrears the content panel, creates a new div corresponding the id, appends it 
 * to the content panel. And then returns the jquery object of the new div.
 * @param {string} locEnum
 * @returns {string} with the id of the appendTo element
 */
 clearContentAndAppend: function(locEnum){
                    var appendTo = "#"+locEnum;
                    var appendee = "<div id=\""+locEnum+"\"></div>";
                    $("#content").empty().append(appendee); 
                    return  appendTo;
        },
        GetURLParameter: function(sParam){
                        /*var sPageURL = window.location.search.substring(1);
                        var sURLVariables = sPageURL.split('&');
                        for (var i = 0; i < sURLVariables.length; i++) 
                        {
                            var sParameterName = sURLVariables[i].split('=');
                            if (sParameterName[0] === sParam) 
                            {
                                return sParameterName[1];
                            }
                        }*/
       },
       /**
        * Used after selectin a project from list in the main menu page. 
        * Loads the specified project in the view projects sections.
        * @param {int} idProject
        * @returns {undefined}
        */
       loadViewProject:function(idProject){
             var appendTo = Loader.clearContentAndAppend(LocEnum.viewProjectForm);
             Builder.buildViewProject(appendTo,idProject); 
       },
       /**
        * Checks if the selected project was created by the same user that wants
        * to see it. If it is true then it will load the create questions form,
        * in case there are no questions for the project. If so then loads the 
        * form with the questions and their answers.
        * If the project was not created by the user that wants to see it then
        * shows the answers form.
        * @param {type} appendTo
        * @param {type} selectID
        * @param {type} formId
        * @returns {undefined}
        */
       loadViewForm:function(appendTo,selectID,formId){
           var projectId = $("#"+selectID).val();
           console.log("Loader.loadViewForm: projectId="+projectId);
           var result = Getter.getProjects("byId",projectId);
           var projectUser = result[0].user_id;
           var status = result[0].phase_name;
           var user = Getter.getIdOfUser();
           user = user.user;
           if(user === projectUser){
              switch(status){
                  case StatusEnum.starting:
                      Builder.buildNewQuestionsForm(appendTo,projectId,formId);
                    break;
                  case StatusEnum.answering:
                        Builder.buildViewQuestionsForm(appendTo,projectId);
                    break;
                  case StatusEnum.integrating:
                    break;
                  case StatusEnum.grading:
                    break;
                  case StatusEnum.closed:
                    break;
                  default:
               }
           }else{
               Builder.buildNewAnswersForm(appendTo,projectId,formId);
           }
           
       }
}
