# Simple CLI Application on plain PHP

## Installation

* Download project.
* Run composer:
 
 
```
composer install
```
    
## Using
 
* Open your console in the root path of the project
* Enter the command:

```
bin/console help
```
You will see all available commands.


## Developing
 
You may create your own console command.
To do this:

1. Create new command class which extends `Console\Command\Command`

2. Open app/console.php and register command by adding the following code:

```
$app->addCommand(new [your_command_class]([your_command_name]));
```


### Writing information to console

To write information use $output object (the instance of `Console\Output\OutputInterface`).

#### To write text:

```
$output->write('Some text');
```

```
$output->write(['Some text', 'Another text']);
```


#### To write text with new line:

```
$output->write('Some text', true);
```
```
$output->writeln('Some text');
```
```
$output->writeln(['Some text', 'Another text']);
```



### Getting entered params from console

Every command extends `Console\Command\Command`. That's why it has protected variable `$params`; 