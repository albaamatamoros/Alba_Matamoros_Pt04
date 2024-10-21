<!-- Alba Matamoros Morales -->
# Pràctica 04 - Inici d'usuaris i registre de sessions
Si vols fer proves amb usuaris ja creats tots tenen el pasword = P@ssw0rd

## Estructura
index.php

- **Controlador:**
    - controladorCanviContra.php ➜ Control d'errors i canvi de contrasenya.
    - controladorEsborrar.php ➜ Control d'errors i esborrar personatge.
    - controladorEsborrarIndex.php ➜ Controlador per quan volem esborrar un personatge a inici amb el botó de paperera.
    - controladorInsertar.php ➜ Control d'errors i insertar personatge.
    - controladorLogin.php ➜ Login d'usuaris.
    - controladorModificar.php ➜ Control d'errors, modificar personatge i agafar l'id del personatge exsistent.
    - controladorModificarDades.php ➜ Tractar el personatge de "controladorModificar.php" i modificar els valors agafant l'id.
    - controladorPaginacio.php ➜ Controlador amb 4 funcions, 2 per paginació global i 2 per usuari.
    - controladorPaginacioConsultarMenu.php ➜ Controlador per consultar els articles totals.
    - controladorRegistrar.php ➜ Registre usuari.
    - controladorTancarSessio.php ➜ Tractem el session per tancar sessió a l'usuari.

- **Models:**
    - connexio.php ➜ Funció amb la connexió a la bd.
    - modelPaginacio.php ➜ Model amb les funcions necesaries per la paginació.
    - modelPersonatges.php ➜ Model amb les funcions dels personatges.
    - modelUsuaris.php ➜ Model amb les funcions dels usuaris.

- ***Vistes:**
    - vistaCanviContra.php ➜ Vista per canviar la contrasenya.
    - vistaConsultar.php ➜ Vista per consultar tots els personatges globals.
    - vistaEsborrar.php ➜ Esborrar personatge.
    - vistaIndex.php ➜ Vista Inicial.
    - vistaInserir.php ➜ Inserir personatge.
    - vistaLogin.php ➜ Form per fer login.
    - vistaMenu.php ➜ Menú amb les opcions, (Inserir, Modificar, Esborras i consultar)
    - vistaModificar.php ➜ Vista amb un form que demana el nom d'un personatge a modificar.
    - vistaModificarDades.php ➜ Vista amb un form amb les dades del personatge triat per a modificar.
    - vistaRegistrarse.php ➜ Vista per registrar-se.

- **Estils:**
    - estilBarra.css ➜ Estils de la barra de navegació. 
    - estilError.css ➜ Estils dels errors.
    - estilIniciarRegistrar.css ➜ Estils dels forms/iniciar sessió i registrar-se.
    - estilMenuPersonatges.css ➜ Estil del menú per seleccionar, (Inserir, Modificar, Esborrar...)
    - estilMostrar.css ➜ Estils per mostrar els personatges + paginació.
    - estilPersonatges.css ➜ Estils dels forms, (Inserir, Esborrar, Modificar...)
    - wallpaper.jpg ➜ Imatge fons de pantalla.

## Funcionament
### $_SESSION
Utilitzo sessions per agafar les dades de l'usuari que vol iniciar sessió. Un cop l'usuari inicia sessió modifiquem on pot accedir.

En iniciar apareix Gestió de personatges i a perfil apliquem el seu nom d'usuari, a més el desplegable es modifica amb altre valor per donar-te a entendre que està iniciat.

Les dades de l'usuari les recullo a controladorLogin.php, i les tracto en tota la web.

### $_COOKIES
Les cookies són utilitzades en la paginació per guardar la preferència de personatges mostrats per pantalla a l'hora de paginar.

Aquestes són tractades en vistaIndex.php que és on utilitzem aquest from/selection i a controladorPaginacio.php.