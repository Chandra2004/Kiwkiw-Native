{ pkgs, ... }: {
  channel = "stable-24.05";

  packages = [
    pkgs.php
    pkgs.php81Packages.composer
    pkgs.nodejs_20
    pkgs.python3
    pkgs.tailwindcss
  ];

  

  services.mysql = {
    enable = true;
    package = pkgs.mariadb;
  };

  env = {
    PHP_PATH = "/usr/bin/php";
  };

  idx = {
    extensions = [
      "rangav.vscode-thunder-client"
      "amirmarmul.laravel-blade-vscode"
      "bradlc.vscode-tailwindcss"
      "cweijan.dbclient-jdbc"
      "cweijan.vscode-database-client2"
      "formulahendry.vscode-mysql"
      "imgildev.vscode-tailwindcss-snippets"
      "onecentlin.laravel-blade"
      "shufo.vscode-blade-formatter"
      "yandeu.five-server"
    ];
    previews = {
      enable = true;
      previews = {
        web = {
          command = ["python3" "-m" "http.server" "$PORT" "--bind" "0.0.0.0"];
          manager = "web";
        };
      };
    };
    workspace = {
      onCreate = {
        default.openFiles = ["index.php"];
      };
      onStart = {
        run-server = "php -S localhost:3000 -t htdocs";
      };
    };
  };
}
