# Unbounce Assignment

The objective of this assignment is to create a dashboard that lists all Unbounce pages and the corresponding leads. The dashboard also contains a form that can be used to add a lead.

## How to - Browser

In order to see how the dashboard looks, please go to the following url: 

```
https://unbounce.frb.io/dashboard/
```

`dashboard` is where the application starts. The following url will also work if the project is to be copied to other location:

```
http:://example.com/dashboard/
```

## How to - WordPress Plugin

Please put the whole directory, including the top `unbounce` folder, inside the `plugins` directory in WordPress. 

Once it's activated from the backend, the tester can use the following shortcode to display the dashboard in the frontend.  

```
[unbounce_dashboard]
```

## General Architechture 

The general architecture of this assignment follows an MVC pattern. However, additional abstraction layer is added, mainly inside the `lib` folder, to show its extensibility. 

```
unbounce
|-- Controllers
|-- dashboard
|-- lib
    |-- Application
        |-- Hydrator
        |-- Validation
    |-- Infrastructure
        |-- Api
    |-- Presentation
        |-- Html
|-- Models
|-- resources
    |-- views
```
Another purpose of the additional abstraction layer is to promote single responsibility principle. And because each layer can be shared and understood independently, it also helps to ease maintenance if the project were to be maintained by a developer team.

Some simplifications, such as in the form submission, in the validation, in the payload and in the WordPress plugin, are made due to the time constraints. The author also believes that the project has sufficed to show its purpose and the ability of the author to write a clean, well abstracted and extensible working code. 

## Author

* **Zee Caniago** 
