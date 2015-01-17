
<html>
 <head>
   <title>Simple Login with CodeIgniter - Private Area</title>
 </head>
 <body>
   <h1>Home</h1>
   <h2>Bienvenido <?php if(isset($ci))
                echo $ci;
                else
                    echo "hola";?>!</h2>
   <a href="home/logout">Logout</a>
 </body>
</html>
