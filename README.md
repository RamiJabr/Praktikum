# Praktikum
Case-Study Bewerbungsprozess

Step 1:
Aufbau des MC-Patterns in Laravel

Add models to Site
- php artisan make:model Job -mcr 
- php artisan make:model Company -mcr 
- php artisan make:model User -mcr 

Ändern des der Migration

Ausführen von:

-php artisan migrate

um änderungen des Models auf die Datenbank zu übertragen.

RESTfull API aufsetzen durch get put delete post

Überprüfen durch Postman Requests
Beachte bei Put verwendung von x-www-form-urlencoded

Add Policies for Authorisation
- artisan make:policy JobPolicy –model:Job
- artisan make:policy CompanyPolicy –model:Company
- artisan make:policy UserPolicy –model:User

Connections between Objects

Platform  1->N Job
Jobs N->1 Company
Company N->M User

