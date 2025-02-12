# Práctica 4. El Concesionario de alquiler de Vehículos

## Desarrollo de Aplicaciones Web en Entornos Servidor  
**Ciclo Formativo de Grado Superior de Desarrollo Web**  
**Profesor:** David Pérez Lledó  
**Concesionario de Alquiler de Vehículos**

---

### Página: 1

## ENUNCIADO DE LA PRÁCTICA

### Objetivos
- Hacer uso del patrón MVC para el diseño de aplicaciones web.
- Practicar ejercicios reales de preparación para el examen.
- Acceder a BD relaciones desde PHP.
- Trabajo en la parte front: HTML, CSS y JavaScript.
- Trabajo en la parte back: PHP.
- Manejo de cookies y sesiones y envío de correos electrónicos.

### Descripción de la Práctica
En esta práctica, se desarrollará una pequeña aplicación en PHP que permita la gestión de alquiler de la flota de vehículos de un concesionario. Para ello, se deben tener en cuenta los siguientes requerimientos:

---

#### Vistas de la parte de administración (REQ_ADMX):

1. El administrador es la persona encargada del mantenimiento de la flota de Vehículos y Clientes, por ello desde la página ‘home’ debe aparecer un botón que permita acceder a la zona privada para permitir hacer estas gestiones.
2. Cuando se pulse en la zona ‘privada’ debe aparecer un formulario de login y password donde comprobaremos que la persona que se loguea está en la tabla **USUARIOS** y su perfil es ‘admin’. Si es correcto, accederemos a los CRUDs.
3. Se debe controlar mediante sesiones que sólo es posible acceder a cualquier página de este apartado si se ha logueado correctamente.

---

#### Vistas de la parte del cliente (REQ_CLIX):

1. En la página ‘home’ debe aparecer la fecha inicial y final de alquiler de los vehículos y un botón de ‘Disponibilidad’.
2. Tras pulsar el botón ‘Disponibilidad’ debe aparecer un listado con los vehículos disponibles (aquellos que no están alquilados en esa fecha solicitada) y un checkbox para que el usuario elija el que desee ‘Alquilar’.
3. Al pulsar el botón de ‘Alquilar’ mostraremos inicialmente una ventana de login/password donde el cliente pueda identificarse (comprobaremos que el cliente se encuentra en la tabla **CLIENTES**). Si el cliente está en la tabla, mostraremos la ventana de facturación.
4. La ventana de facturación debe tener las características del vehículo elegido, fecha de inicio, fin, datos del cliente, foto del vehículo a alquiler y precio de alquiler (número de días x precio por día). Si el usuario acepta el alquiler, almacenaremos los datos pertinentes en la tabla **ALQUILER** y volveremos a la página ‘home’.

**NOTA:** Para calcular el precio por día de alquiler se usará la fórmula siguiente:
```matlab
PRECIO = (PRECIO_BASE + POTENCIA * 0,10 + VELOCIDAD_MAX * 0,05) * MARCA_VEHICULO
```
La **MARCA_VEHICULO** será 1,5 si el vehículo es considerado de “alta gama” (AUDI, MERCEDES, BMW, TESLA). El resto se multiplicará por 1.  
El **PRECIO_BASE** es actualmente de 50€.

5. La factura también debe enviarse por correo electrónico al usuario.

---

#### Manejo de los idiomas (REQ_IDIX):

La aplicación debe funcionar con múltiples idiomas y traducir todo lo que visualiza el cliente al idioma elegido (página ‘home’, login/password y facturación), para ello:

1. Inicialmente, al abrir la página ‘home’, comprobaremos si el usuario tiene ya definido en su equipo una **COOKIE** con el idioma elegido.
2. Si lo tiene, mostraremos la página en ese idioma directamente; si no, mostraremos la página en el idioma considerado ‘por defecto’ por el alumno.
3. En la página ‘home’ debe aparecer un desplegable donde el usuario pueda cambiar de idioma. Esto provocará cambiar el valor de la **COOKIE** a ese idioma, recargando la página ‘home’ con el nuevo idioma.

---

### Valoración de la práctica
- **1’50 puntos** de evaluación.

---

### Fecha de entrega
- **Lunes 17/02** → REQ_ADM1 a REQ_ADM3 (25% nota)
- **Lunes 24/02** → REQ_CLI1 a REQ_CLI5 (25% nota)
- **Lunes 03/03** → REQ_IDI1 a REQ_IDI3 (25% nota)
- **Lunes 10/03** → Proyecto integrado (25% nota)
