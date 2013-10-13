/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
function saveForm(objectToSave,formId,whatToShow){
        var url;
        switch(objectToSave){
            case "user":
                url = "saveUser.php";
                break;
            default:
                return;
        }
        formId = "#"+formId;
        whatToShow = "#"+whatToShow;
        $.ajax(
            {
                url: url,
                method: 'post',
                data: $('form:first').serialize(),
                dataType: 'html',
                success: function(response){
                            $(formId).hide();
                            $(whatToShow).html(response).show();
                        },
                error: function(jqXHR, exception) {
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
        });
    };
