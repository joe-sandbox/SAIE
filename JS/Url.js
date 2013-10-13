/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
var Url = new function(){
    this.url= "http://localhost/SAIE",
    this.loginUrl= this.url+"/",
    this.loginPHP = this.url+"/Bay/login.php",
    this.saveUserUrl = this.url+"/VIEW/saveUser.php",
    this.newProjectUrl = this.url+"/Bay/newProject.php",
    this.modProjectUrl = this.url+"/Bay/modProject.php",
    this.delProjectUrl = this.url+"/Bay/delProject.php",
    this.newQuestionUrl = this.url+"/Bay/newQuestion.php",
    this.newAnswerUrl = this.url+"/Bay/newAnswer.php",
    this.mainMenuUrl = this.url+"/VIEW/mainMenu.html",
    this.viewCategories = this.url+"/VIEW/View_Builder/viewCategories.php",
    this.viewAnswers = this.url+"/VIEW/View_Builder/viewAnswers.php",
    this.viewProject = this.url+"/VIEW/View_Builder/viewProjects.php",
    this.viewQuestions = this.url+"/VIEW/View_Builder/viewQuestions.php",
    this.fetchNameUser = this.url+"/Bay/getUserName.php",
    this.fetchIdUser = this.url+"/Bay/getUserId.php",
            
/**
 * Returns the URL of the system, in example: http://www.saie.com
 * @returns {string} with url.
 */
    this.getRootUrl= function(){        
        var loc = window.location.href;
        var dir = loc.substring(0, loc.lastIndexOf('/'));
        dir = dir.substring(0, dir.lastIndexOf('/'));
        return dir;
    },
            /**
             * Redirects to the target page passing the parametres as GET.
             * @param {string} target in url format.
             * @param {json} params in json format.
             * @returns {undefined}
             */
    this.redirectTo = function(target,params){
        var arg = $.param(params);
        window.location.replace(target+"?"+arg);
    }
}
