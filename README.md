## Dependencies and Scripts

This project requires PHP version 8 or higher and the `vlucas/phpdotenv` package for managing environment variables.  You can install the dependencies using Composer:

```json
{
  "require": {
    "php": ">=8",
    "vlucas/phpdotenv": "^5.6"
  },
  "scripts": {
    "post-install-cmd": [
      "php update-namespace.php"
    ],
    "post-update-cmd": [
      "php update-namespace.php"
    ]
  }
}
