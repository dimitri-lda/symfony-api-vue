# symfony-api-vue

Pet project for learning Symfony API + Swagger + OpenAPI + Docket + PostgreSQL  
Front: Vue.js  
NoSQL will be added in the future versions.

Symfony 7.2.4
PHP 8.2.28

run Symfony backend:
```task up``` or ```task upd```
local url: http://127.0.0.1:8080/ 
swagger: http://localhost:8080/api/doc
# api example: http://127.0.0.1:8000/api/example?id=5

run Vue.js frontend:  
```npm run dev```
# Frontend url (Vue.js): http://127.0.0.1:8000/show-api

---

## Xdebug PhpStorm Configuration

### Settings → PHP → Servers

- **Name**: `docker`
- **Host**: `localhost`
- **Port**: `8080` (or whatever your nginx is listening on)
- **Debugger**: `Xdebug`
- ✅ **Use path mappings**:
    - `/var/www/html` → your local project directory

### Settings → PHP → CLI Interpreter

- Add a new Docker interpreter:
    - **Docker**: your `php` container
    - **PHP executable**: `/usr/local/bin/php`
