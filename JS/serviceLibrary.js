/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
function test(){
    alert("serviceLibrary");
}
function loadContent(idElement){
    clearContentAndAppend(idElement); 
    addContent(idElement);
}
function loadHTML(){
    $("#myDivName").load("test.html", function(response, status, xhr) {
   if (status == "error") {
      var msg = "Sorry but there was an error: ";
      alert(msg + xhr.status + " " + xhr.statusText);
   }
 });
}
function addContent(idElement){    
    switch(idElement){
        case "homebtn":
            displayProjectsCategoriesAccordion("category");
            break;
        case "msgbtn":
            break;
        case "helpbtn":
            break;
        case "newProjectbtn":
            buildViewNewProject();
            break;
        case "newProjectbtn":
            break;
        case "modProjectbtn":
            break;
        case "delProjectbtn":
            break;
        case "viewProjectbtn":
            break;
        default:
    }                
}
function clearContentAndAppend(idElement){
    var element = "#"+idElement;
    var appendee = "";
    switch(idElement){
        case "homebtn":
            appendee = "<div id=\"projectsAccordion\"></div>";
            break;
        case "msgbtn":
            break;
        case "helpbtn":
            break;
        case "newProjectbtn":
            break;
        case "newProjectbtn":
            break;
        case "modProjectbtn":
            break;
        case "delProjectbtn":
            break;
        case "viewProjectbtn":
            break;
        default:
    }                
    $("#content").empty().append(appendee);    
}