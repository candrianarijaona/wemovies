#We Movies

Test PHP Symfony

## Install

### Docker

First launch docker
```bash
docker compose up -d
```

Then enter the php container

```bash
docker exec -it wemovies-php-fpm-1 bash
```

### Install project via composer
Inside the php container

```bash
composer install
```

### NPM
This project use npm to manage asset with webpack encore.
```bash
npm install
```

```bash
npm run dev
```

