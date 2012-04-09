# Script Trashsquare

## Overview

### Classes

1. **database.php**
2. **session.php**
3. **user.php**

### Pages

1. **bash.php** : ajoute les 300 logins / mot de passe 
2. **login.php** : formulaire de login pour le site web
3. **profil.php** : formulaire du profil (+edition) pour le site

## Classes

### Database

This is where we create a conenction to the database. It's also used to query to the database.

### Session
Class to login as a User.
 
* `public function login()` Creates a session at login, which stores the ID of the user,
* `public function is_logged_in()` Checks if the user is logged in,
* `public function logout()` Logs the user out,
* `private function check_login()` Checks if the user is logged in and sets the private variable logged_in to true/false (this can be acessed from the `is_logged_in()` method).

### User

Class that deals with everything related to the users.

