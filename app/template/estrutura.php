<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MODEL-VIEW-CONTROLLER</title>
    <style type="text/css">
                
            body{
                background-color: #6495ed;
            }
            #corpo{
                width: 1000px;
                background-color: #fff;
                margin: 0 auto;
                border-left: 2px solid #ccc;
                border-right: 2px solid #ccc;
            }
            #topo{
                padding: 20px 25px;
                border-bottom: 5px solid #ccc;
            }
            #topo a{
                color: #333;
                text-decoration: none;
                font-size: 1.3em;
                position: relative;
                height: 50px;
            }
            #topo a::after {
                content: '';
                position: absolute;
                width: 100%;
                margin-left: -150%;
                margin-top: 10px;
                height: 10px;
                border-bottom: 4px solid transparent;
                transition: .9s ease-in-out;
            }


            #topo  a:hover::after{
                width: 100%;
                margin-left: -100%;
                margin-top: 10px;
                height: 10px;
                border-bottom: 4px solid #333;
            }


            #conteudo h1{
                font-size: 24px;
                color: #6495ed;
            }
            #conteudo{
                background-color: #fff;
                padding: 20px 25px;
            }
            article{
                margin-bottom: 20px;
            }
            article h2{
                margin-bottom: -5px;
            }
            article h2 a{
                font-size: 22px;
                color: #333;
                text-decoration: none;
            }

            article h2 a:hover{
                border-bottom: 2px solid #333;
            }

            article p{
                font-size: 16px;
                color: #333;
                padding-left: 2px;
            }
            .flutuacao{
                float: right;
            }
            

    </style>
</head>
<body>



        <div id="corpo">

            <div id="topo">
                <head>
                    <nav>
                        <a href="index.php?pagina=home">Home</a> |
                        <a href="index.php?pagina=sobre">Sobre</a>
                        <a class="flutuacao" href="index.php?pagina=Admin&metodo=index">Admin</a>
                    </nav>
                </head>
            </div>

            <div >{{area_dinamica}}</div>
            
        </div>

</body>
</html>