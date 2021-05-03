# Laravel Mailing List

This package gives you a quick out the box mailing list storage and API to use to add people to specific mailing lists

You can create a mailing list and then attach a email contact to a list.

## Installation

```bash
composer require jsefton/laravel-mailing-list
```

You will need to publish the config to set if API is enabled

```bash
php artisan vendor:publish --tag=mailing-list.config
```

Next run migrations to add the required tables

```bash
php artisan migrate
```

## Usage

### Config

The configuration file allows you to enable or disable the API feature. The API feature provides a POST endpoint that you can consume in your application for a sign up form to send the data and have it store against a specific mailing list.

The API flag is set through an environment variable of `MAILING_LIST_API`
```php
/**
 * Enable API for mailing lists to allow creation
 */
'api' => env('MAILING_LIST_API', true),
```
You can also change the route that is used for the API subscribe endpoint to anything you desire.
```php
/**
 * Route for API requests (only registered if api is enabled)
 */
'route' => '/api/mailing-list'
```
The above will result in API POST requests to be sent to `/api/mailing-list/{id}`, where `{id}` is the ID of the mailing list. 

This is registered within the application with a named route and can be linked to with: 
```php
route('api.mailing-list.subscribe', ['id' => 1])
```

### API

The API only exposes an endpoint for people to subscribe in order to not expose any data.

You can send the following data to the endpoint:
```json
{
    "email": "info@endor.digital",
    "first_name": "Jamie", (optional)
    "last_name": "Sefton", (optional)
    "source": "Website" (optional)
}
```
Many forms will not have 2 different fields for `first_name` and `last_name`. So the API has been built to allow you to POST just `name` field and will automatically split this up into first name and last name. E.g.
```json
{
    "email": "info@endor.digital",
    "name": "Jamie Sefton", (optional)
    "source": "Website" (optional)
}
```

### Console

You can either create a new mailing list directly through the database, with your own UI you create or using the shipped console command. You can do this by running:

```bash
php artisan mailing-list:create
```
This will then ask you to enter a name of the mailing list. Once complete it will return back the ID of the new mailing list for you to use in your application to create POST requests to the API

You can get a list of current mailing lists in your console by running:

```bash
php artisan mailing-list:list
```

```bash
+----+------+
| ID | Name |
+----+------+
| 1  | Test |
+----+------+
```

### Models

If you wish to just consume the models within your application and maybe not use the API then you can use the following models. The models are standard eloquent and can be used in a standard Laravel way.

#### MailingList

namespace: `JSefton\MailingList\Models\MailingList`

Contains the individual lists that a user is subscribed against, which can be created in the above console command.

You can get the email contacts attached to a specific list once loaded with:

```php
$emails = $mailingList->emails
```

#### MailingListEmail

namespace: `JSefton\MailingList\Models\MailingListEmail`

This is the object of each individual email that is subscribed. They are attached to a MailingList and is unique per email per list.

You can get the mailing list they are attached to with:

```php
$list = $email->mailingList
```
