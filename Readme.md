# Strategy Pattern


## Symfony example

In our design, we will just log the messages as if we are actually sending them. I am just keeping the code short, that's why! Strategy classes also don't return anything but depending on your needs, you can return something back.


![Strategy Pattern](doc/strategy_pattern.png?raw=true "Strategy Pattern")

### Install dependencies

installation of dependencies using composer

```
php composer install
```

### Test

use postman or your favorite tool to test

```
    POST /messages/email
    {
    	"message": "This is the message 1"
    }
     
    POST /messages/sms
    {
    	"message": "This is the message 2"
    }
     
    POST /messages/voice
    {
    	"message": "This is the message 3"
    }
```

###Result

```
    $ cat public/email.log 
    This is the message 1
     
    $ cat public/sms.log 
    This is the message 2
     
    $ cat public/voice.log 
    This is the message 3
```