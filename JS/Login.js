/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
var Login = {
    checkUser: function(formId,responseId){
        var result = AjaxClass.ajaxLogin(formId);
        if(typeof result === "String"){
            Loader.loadContent(LocEnum.mainMenu);
        }else{
            $("#"+responseId).text("Usuario/contraseña incorrectas");
        }
    }
};

