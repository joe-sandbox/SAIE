/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

function buildViewNewProject(){
    $("<form id='saveProject'>").append("<ul><li>\n\
                       <label class=\"headTitle\">Nombre</label>\n\
                    </li><li>\n\
                        <input type=\"text\" id=\"name\" name=\"projectName\"/>\n\
                    </li><li>\n\
                        <label class=\"headTitle\">Descripción</label>\n\
                    </li><li>\n\
                        <textarea id=\"description\" name=\'description\" placeholder=\"Descripción del proyecto...\" rows='4' cols='50'></textarea>\n\
                    </li><li>\n\
                        <label class='headTitle'>Categorías</label>\n\
                    </li><li>\n\
                        <label class='headTitle'></label> <select id='qntyQuestions'></select>\n\
                    </li><li>\n\
                        <input type='button' id='saveBtn' value='Crear'/>\n\
                    </ul></form>")//.addClass("headTitle")
            .appendTo("#content");
        
       
        
        
}
