# Corrections

## Original issues

The application failed when loading the employee list because the controller required:

```php
vues/listeEmployes.php
```

However, the actual file is named:

```text
vues/v_listeEmployes.php
```

PHP also resolves relative include paths from the current working directory. This can cause additional errors when the application is launched from a different directory. The employee-list view had the same issue when including `v_entete.php` and `v_piedPage.php`.

## Changes made

### Controller

In `controleurs/C_consulterEmployes.php`:

- Changed the model include to use `__DIR__`:

  ```php
  require_once __DIR__ . "/../modeles/M_employe.php";
  ```

- Corrected the view filename and used an absolute path based on the controller directory:

  ```php
  require_once __DIR__ . "/../vues/v_listeEmployes.php";
  ```

### Employee-list view

In `vues/v_listeEmployes.php`:

- Updated the header include:

  ```php
  include_once __DIR__ . "/v_entete.php";
  ```

- Updated the footer include:

  ```php
  include_once __DIR__ . "/v_piedPage.php";
  ```

Using `__DIR__` makes these includes work regardless of the directory from which the application is started.

## Validation

The edited files were checked by the editor and no PHP errors were reported. The command-line PHP check could not be completed from the terminal because the `php` command was not available on `PATH`; use XAMPP's PHP executable if needed:

```text
C:\xampp\php\php.exe -l C:\xampp\htdocs\GestionDuPersonnel\empSce\controleurs\C_consulterEmployes.php
C:\xampp\php\php.exe -l C:\xampp\htdocs\GestionDuPersonnel\empSce\vues\v_listeEmployes.php
```
