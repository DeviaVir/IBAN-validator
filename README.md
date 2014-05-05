IBAN-validator
==============

Quick way to check an IBAN number via CLI

### Set up

- Run `composer install` (get composer from https://getcomposer.org/)
- Open up the command line and set the current directory to IBAN-validator/bin/

### Check up on an IBAN

```
php app.php iban.validate IBANCODE
```

Replace IBANCODE by a valid (or invalid) IBAN.

Sample output:
```
IBANCODE is valid!
```

When a wrong IBANCODE is given, no output is returned.
