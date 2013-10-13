/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
var Saver =  {
    saveNewForm: function(objectToSave,formId,whereToAppend){ 
                        var url ;
                        var locEnum = "";
                        switch(objectToSave.toLowerCase()){
                            case "user":
                                url = Url.saveUserUrl;
                                locEnum = LocEnum.login;
                                break;
                            case "answer":
                                url = Url.newAnswerUrl;
                                break;
                            case "project":
                                url = Url.newProjectUrl;
                                break;
                            case "question":
                                url = Url.newQuestionUrl;
                                locEnum = LocEnum.viewProjectForm;
                                break;
                            default:
                                return;
                        }
                        AjaxClass.ajaxProcess(url,whereToAppend,formId,locEnum);
                    },
     saveDelForm: function(objectToSave,formId,whereToAppend){
                        var url ;
                        switch(objectToSave.toLowerCase()){
                            case "user":
                                break;
                            case "project":
                                url = Url.delProjectUrl;
                                break;
                            default:
                                return;
                        }
                        AjaxClass.ajaxProcess(url,whereToAppend,formId,"");
                    },
    saveModForm: function(objectToSave,formId,whereToAppend){
                        var url = Url.url;
                        switch(objectToSave.toLowerCase()){
                            case "user":
                                break;
                            case "project":
                                url = Url.modProjectUrl;
                                break;
                            default:
                                return;
                        }
                        AjaxClass.ajaxProcess(url,whereToAppend,formId,"");
                }
}