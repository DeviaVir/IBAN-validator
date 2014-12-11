IBAN-validator
==============

Quick way to check IBAN numbers via CLI

### Set up

- Run `composer install` (get composer from https://getcomposer.org/)
- Open up the command line and set the current directory to IBAN-validator/

### Check up on an IBAN

```
php app.php iban.validate IBANCODE
```

Replace IBANCODE by a valid (or invalid) IBAN.

Sample valid output:
```
{'result': true}
```

Sample invalid output:
```
{'result': false}
```
