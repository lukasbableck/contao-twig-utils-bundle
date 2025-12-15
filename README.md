# contao-twig-utils-bundle

This bundle provides some useful additional twig functions and filters for Contao Open Source CMS.

## Filters

### `json_decode(?bool $assoc = false)`
Decodes a JSON string into a PHP array or object.

### `to_array`
Converts a given value to an array. If the value is already an array, its children are converted to arrays as well.

## Functions

### `contao_form(id|alias)`
Generates a form and returns the html output.

### `file(id|uuid|path)`
Returns the FilesModel for the given id, uuid or path.

### `page(id|alias, ?bool $published = false)`
Returns the PageModel for the given id or alias. If `$published` is set to `true`, it will only return published pages.