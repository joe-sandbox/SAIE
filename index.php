<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta charset="utf-8" />
        <link href="css/start_theme/jquery-ui-1.10.3.custom.css" rel="stylesheet">
        <link href="css/general_centered.css" rel="stylesheet">
	<script src="js/jquery-1.9.1.js"></script>
	<script src="js/jquery-ui-1.10.3.custom.js"></script>
	<script src="js/Login.js"></script>
	<script src="js/AjaxClass.js"></script>
	<script src="js/Url.js"></script>
	<script src="js/Loader.js"></script>
	<script src="js/LocEnum.js"></script>
        <script>
            $(document).ready(function(){
                $("#success").hide();
                $( "#accordion" ).accordion().position({
                    of: $( "#logo" ),
                    my: "center top",
                    at: "center bottom",
                    collision: "none none"
                });                
                $("#logo").position({
                    of: $( document ),
                    my: "center top",
                    at: "center top",
                    collision: "none none"
                });
                $("input:button").click(function(){
                        Login.checkUser("loginForm","reponse-msg");
                });
            });
        </script>
        <style>
            body{                
                margin-left: 50em;
                margin-right: 50em;
                /*margin-top: 20em;*/
            }
            #logo{
                width: 120px;
                height: 120px; 
                padding-top: 3em;
                padding-bottom: 3em;
            }
            ul{
                list-style-type: none;
            }
        </style>
    </head>
    <body>
        <div id="content">
            <div id="logo-content">
                <img id="logo" src="images/logo.jpg">
            </div>
            <div id="accordion">
                <h3 id="accordionHeader">Bienvenido!</h3>
                <div>
                    <div id="reponse-msg">
                    </div>
                    <form id="loginForm" >
                        <ul>
                            <li>
                                <input type="text" name="mail" placeholder="Mail..."/>                            
                            </li>
                            <li>
                                <input type="password" name="password" placeholder="Password..."/>                            
                            </li>
                            <li>
                                <input id="submitBttn" type="button" value="Entrar" name="submit"/>                           
                            </li>   
                            <li>
                                <a href="/VIEW/register.html">Nuevo usuario</a>
                            </li>                         
                        </ul>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
