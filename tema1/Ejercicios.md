Enunciados

1. Indica cuáles son las ventajas principales de la subdivisión en capas lógicas de una aplicación web.
  - **Fácil de desarrollar:** Este estilo arquitectónico es especialmente fácil de implementar, además de que es muy conocido y una gran mayoría de las aplicaciones la utilizan.
  - **Fácil de probar:** Debido a que la aplicación construida por capas, es posible ir probando de forma individual cada capa.
  - **Fácil de mantener:** Como cada capa hace solo una tarea al igual que al realizar pruebas puedes ir al punto especifico que necesites modificar.
  - **Seguridad:** La separación de capas permite el aislamiento entre diferentes apartados de una aplicación, dificultando el ver datos confidenciales desde la capa de presentación que visualiza el usuario.

6. Después de ver el modelo de 3 capas, indica dentro de la capa de modelo qué clases y qué atributos debería aparecer en un sistema de información de una bodega de vinos.
Debería tener las clases: 
   1. **Cliente**: ID, nombre, poblacion
   2. **Comercial**: ID, nombre, comision
   3. **Venta**: idCliente, idComercial, numBotellas, fecha, idVino, importe
   4. **Vino**: idVino, denominacion, año, tipo, precio

7. Cuando se hace una petición a un servidor en internet ¿qué especifica la dirección IP? ¿y el puerto?. Indica la URL necesaria para localizar un recurso llamado imagen.gif en un servidor cuyo dominio es www.pixfree.com y que responde en el puerto 8080, teniendo en cuenta que el recurso se encuentra el árbol de directorio “c:\Archivos de programa\ammps\www\DWES\tema1”.

El nombre de dominio (Por ejemplo \<www.google.es\>) identifica la dirección IP, que nos lleva hacia un servidor especifico. Por defecto es el puerto 80 para http, identifica el servicio al que queremos acceder, y se puede señalar con :\<numero de puerto\>

**www.pixfree.com:8080\DWES\tema1\imagen.gif**

8. Después de realizar la instalación del stack AMPPS imagina que descubres que en tu sistema tienes otro servidor sirviendo recursos en el puerto 80. Averigua y modifica con cuidado el fichero de configuración de apache desde AMPPS para que tu servidor recién instalado escuche ahora desde el puerto 8080. Comprueba el nuevo funcionamiento accediendo a la página “Hola Mundo” que ya está en www\tema1.

Para acceder al fichero se puede hacer haciendo click sobre el icono de AMPPS en el boon de mostrar iconos ocultos, click sobre configuración y abriendo el fichero httpd.conf.
Una vez dentro en la linea 63 columna 10 añadiremos el nuevo numero de puerto, y en la linea 237 el ServerName cambiamos el valor despues de los :, y por ultimo en la linea 536 lo modificamos tambien.

![alt text](image.png)

9. Busca en internet un programa en php que contenga por lo menos un bucle y alguna bifurcación. Súbelo a www para que sea servido en tu servidor local.Realiza la depuración entendiendo como funciona la botonera y las vistas de VSC en modo depuración para futuros ejercicios. Tienes un pequeño manual aquí -> [Pulsa](https://www.tutorialesprogramacionya.com/pythonya/detalleconcepto.php?punto=54&codigo=54&inicio=45)

