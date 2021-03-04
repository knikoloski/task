# task

* `$ git clone https://github.com/knikoloski/task` clone git repo
* `$ composer install` install dependencies
* edit `config/database.php` with your own configurations
* `$ php -S localhost:8000 -t public` 

### Endpoints:

Endpoint | Parameters | Description
------------ | ------------- | -------------
`POST /token` |  | generates token 
`POST /pixel` | `pixelType` _string_ <br />`userId` _integer_ <br /> `occuredOn` _integer_ <br /> `portalId` _integer_ | creates pixel
