<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
	<script src="JS/jquery-1.9.1.js"></script>
	<script src="JS/jquery-ui-1.10.2.custom.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                $('input:button').click(function(){                   
                     $.ajax(
                        {
                            url: 'VIEW/saveUser.php',
                            method: 'post',
                            data: $('form:first').serialize(),
                            dataType: 'html',
                            success: function(response){
                                $('#form').hide();
                                $('#response').html(response);
                            }
                        });
                    });            
            });
           
        </script>
    </head>
    <body>
        <div id="form">
            <form>
                <input type="text" name="name1" value="Hola"/>
                <input type="text" name="name2" value="Hola2"/>
                <input type="text" name="name3" value="Hola3"/>
                <input type="hidden" name="DOMAIN_OBJECT" value="user"/>
                <input type="hidden" name="PROCESS_OPTION" value="select"/>
                <input type="button" id="save" value="Guardar"/>
            </form>
        </div>
        <div>
            <p id="response"></p>
        </div>
    </body>
</html>
