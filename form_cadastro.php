<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Login/Cadastro</title>
        <style>
        /* CSS reset */
            *, *:before, *:after { 
            margin:0;
            padding:0;
            font-family: Arial,sans-serif;
            }

            body{  
            /*margin:10px;*/
            width: 100%;
            height: 100%;
            color: white;
            background: url("../login_back.jpg") no-repeat;
            background-size: cover;          
            }

            a{
            text-decoration: none;
            }

            /* esconde as ancoras da tela */
            a.links{
            display: none;
            }

            /* content que contem os formulários */
            .content{
            width: 500px;
            margin: 100px auto;
            position: relative;   
            }

            /* formatando o cabeçalho dos formulários */
            h1{
            font-size: 48px;
            color: #066a75;
            padding: 10px 0;
            font-family: Arial,sans-serif;
            font-weight: bold;
            text-align: center;
            padding-bottom: 30px;
            }
            h1:after{
            content: ' ';
            display: block;
            width: 100%;
            height: 2px;
            margin-top: 10px;
            background: -webkit-linear-gradient(left, rgba(147,184,189,0) 0%,rgba(147,184,189,0.8) 20%,rgba(147,184,189,1) 53%,rgba(147,184,189,0.8) 79%,rgba(147,184,189,0) 100%); 
            background: linear-gradient(left, rgba(147,184,189,0) 0%,rgba(147,184,189,0.8) 20%,rgba(147,184,189,1) 53%,rgba(147,184,189,0.8) 79%,rgba(147,184,189,0) 100%); 
            }

            p{
            margin-bottom:15px;
            }
            p:first-child{
            margin: 0px;
            }
            label{
            color: #405c60;
            position: relative;
            }

            /**** advanced input styling ****/
            /* placeholder */
            ::-webkit-input-placeholder  {
            color: #bebcbc; 
            font-style: italic;
            }
            input:-moz-placeholder,
            textarea:-moz-placeholder{
            color: #bebcbc;
            font-style: italic;
            } 
            input {
            outline: none;
            }

            input:not([type="checkbox"]){
            width: 95%;
            margin-top: 4px;
            padding: 10px;    
            border: 1px solid #b2b2b2;
            
            -webkit-border-radius: 3px;
            border-radius: 3px;
            
            -webkit-box-shadow: 0px 1px 4px 0px rgba(168, 168, 168, 0.6) inset;
            box-shadow: 0px 1px 4px 0px rgba(168, 168, 168, 0.6) inset;
            
            -webkit-transition: all 0.2s linear;
            transition: all 0.2s linear;
            }

            /*estilo do botão submit */
            input[type="submit"]{
            width: 100%!important;
            cursor: pointer;  
            background: #3d9db3;
            padding: 8px 5px;
            color: #fff;
            font-size: 20px;  
            border: 1px solid #fff;   
            margin-bottom: 10px;  
            text-shadow: 0 1px 1px #333;
            
            -webkit-border-radius: 5px;
            border-radius: 5px;
            
            transition: all 0.2s linear;
            }
            input[type="submit"]:hover{
            background: #4ab3c6;
            }

            /*marcando os links para mudar de um formulário para outro */
            .link{
            position: absolute;
            background: #e1eaeb;
            color: #7f7c7c;
            left: 0px;
            height: 20px;
            width: 440px;
            padding: 17px 30px 20px 30px;
            font-size: 16px;
            text-align: right;
            border-top: 1px solid #dbe5e8;

            -webkit-border-radius: 0 0  5px 5px;
            border-radius: 0 0  5px 5px;
            }
            .link a {
            font-weight: bold;
            background: #f7f8f1;
            padding: 6px;
            color: rgb(29, 162, 193);
            margin-left: 10px;
            border: 1px solid #cbd518;

            -webkit-border-radius: 4px;
            border-radius: 4px;  

            -webkit-transition: all 0.4s linear;
            transition: all 0.4s  linear;
            }
            .link a:hover {
            color: #39bfd7;
            background: #f7f7f7;
            border: 1px solid #4ab3c6;
            }

            /* estilos para para ambos os formulários */
            #cadastro, 
            #login{
            position: absolute;
            top: 0px;
            width: 88%;   
            padding: 18px 6% 60px 6%;
            margin: 0 0 35px 0;
            background: rgb(247, 247, 247);
            border: 1px solid rgba(147, 184, 189,0.8);
            
            -webkit-box-shadow: 5px;
            border-radius: 5px;
            
            -webkit-animation-duration: 0.5s;
            -webkit-animation-timing-function: ease;
            -webkit-animation-fill-mode: both;

            animation-duration: 0.5s;
            animation-timing-function: ease;
            animation-fill-mode: both;
            }

            #paracadastro:target ~ .content #cadastro,
            #paralogin:target ~ .content #login{
            z-index: 2;
            -webkit-animation-name: fadeInLeft;
            animation-name: fadeInLeft;

            -webkit-animation-delay: .1s;
            animation-delay: .1s;
            }
            #registro:target ~ .content #login,
            #paralogin:target ~ .content #cadastro{
            -webkit-animation-name: fadeOutLeft;
            animation-name: fadeOutLeft;
            }

            /*fadeInLeft*/
            @-webkit-keyframes fadeInLeft {
            0% {
                opacity: 0;
                -webkit-transform: translateX(-20px);
            }
            100% {
                opacity: 1;
                -webkit-transform: translateX(0);
            }
            }

            @keyframes fadeInLeft {
            0% {
                opacity: 0;
                transform: translateX(-20px);
            }
            100% {
                opacity: 1;
                transform: translateX(0);
            }
            }

            /*fadeOutLeft*/
            @-webkit-keyframes fadeOutLeft {
            0% {
                opacity: 1;
                -webkit-transform: translateX(0);
            }
            100% {
                opacity: 0;
                -webkit-transform: translateX(-20px);
            }
            }

            @keyframes fadeOutLeft {
                0% {
                    opacity: 1;
                    transform: translateX(0);
                }
                100% {
                    opacity: 0;
                    transform: translateX(-20px);
                }
            }


            body{  
                /*margin:10px;
                width: 100%;
                height: 100%;
                background: url("../login_back.jpg") no-repeat;
                background-size: cover;  */
                background-color: #E8E9F3;
           
            }
                    
        </style>
    </head>

    <body>
        <div class="container" >
            <a class="links" id="paracadastro"></a>
            <a class="links" id="paralogin"></a>
        
        <div class="content">      
        <!--FORMULÁRIO DE LOGIN-->
        <div id="login">
        <form action="login.php" method="post"> 
            <h1>Login</h1> 
            <p> 
                <label for="nome_login">Seu e-mail</label>
                <input id="nome" name="nome" required="required" type="text" placeholder="Fulano"/>
            </p>
            
            <p> 
                <label for="senha_login">Sua senha</label>
                <input id="senha" name="senha" required="required" type="password" placeholder="1234" /> 
            </p>
            
            <p> 
                <input type="checkbox" name="manterlogado" id="manterlogado" value="" /> 
                <label for="manterlogado">Manter-me logado</label>
            </p>
            
            <p>           
                <input type="submit" value="Logar"  name='envia'/> 
            </p>
            
            <p class="link">
                Ainda não tem conta?
                <a href="#paracadastro">Cadastre-se</a>
            </p>
            </form>
        </div>

        <!--FORMULÁRIO DE CADASTRO-->
        <div id="cadastro">
            <form action="cadastro.php" method="post" >
            <h1>Cadastro</h1> 
            
            <p> 
                <label for="nome_cad">Seu nome</label>
                <input id="nome_cad" name="nome" required="required" type="text" placeholder="Fulano da Silva" />
            </p>
            
            <p> 
                <label for="email_cad">Seu e-mail</label>
                <input id="email_cad" name="email" required="required" type="email" placeholder="fulano@gmail.com"/> 
            </p>
            
            <p> 
                <label for="senha_cad">Sua senha</label>
                <input id="senha_cad" name="senha" required="required" type="password" placeholder="1234"/>
            </p>
            
            <p> 
            <input type="submit" value="Cadastrar" name='envia'>
             
            </p>
            
            <p class="link">  
                Já tem conta?
                <a href="#paralogin"> Ir para Login </a>
            </p>
            <p class="link">  
                Já tem conta?
                <a href="#paralogin"> Ir para Login </a>
            </p>
            </form>
        </div>
        </div>
    </div> 


    </body>

</html>









<!--<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Cadastro</title>
        <style>
            p{
                padding: *;
                margin: *;
            }
        </style>
    </head>
    <body>
        <form action="cadastro.php" method="post" >
        <p>Nome:</p>
        <input type="text" name="nome" id="nome"></br></br> 
        <p>E-mail:</p>
        <input type="email" name="email" id="email"> </br></br>
        <p>Senha:</p>
        <input type="password" name="senha" id="senha"></br></br>
        <input type="submit" value="ENVIAR" name='envia'></br>
        </form>

    </body>
</html> -->