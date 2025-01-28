on composer.json add
"require": {
        "php" : ">=8",
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
