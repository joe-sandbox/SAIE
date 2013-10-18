/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
var Getter ={    
     getCategories: function(){ 
        var url = Url.viewCategories;
        return AjaxClass.getterAjax({},url);
    },
     getProjects:function(filterVal,projectId){
        var url = Url.viewProject;
        return AjaxClass.getterAjax({ filter: filterVal , project_id: projectId},url);
    },
    getQuestions: function(filterVal,project_id){
        var url = Url.viewQuestions;
        return AjaxClass.getterAjax({ filter: filterVal , project_id: project_id},url);
    },
    getQuestionsWithAnswers: function(filterVal,project_id){
        var url = Url.viewQuestionsWithAnswers;
        return AjaxClass.getterAjax({ filter: filterVal , project_id: project_id},url);
    },
    getAnswers: function(filterVal,question_id){
        var url = Url.viewAnswers;
        return AjaxClass.getterAjax({ filter: filterVal , question_id: question_id},url);
    },
    getNameOfUser: function(){
        var url = Url.fetchNameUser;
        return AjaxClass.getterAjax({},url);
    },
    getIdOfUser: function(){
        var url = Url.fetchIdUser;
        return AjaxClass.getterAjax({},url);
    },
    getStatusProject: function(){
        var url = Url.fetchStatusProject;
    }
}


