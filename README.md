# PHP SDK for Palzin 5 API

This is a simple PHP library that makes communication with Palzin API easy.

## Installation

If you choose to install this application with Composer instead of pulling down the git repository you will need to add a composer.json file to the location you would like to pull the repository down to featuring:

```json
{
    "require": {
        "ingress-it-solutions/palzin-sdk": "^3.0"
    }
}
```
    
Run a `composer update` to install the package.

*Note*: If you used an older version of Palzin API wrapper and loaded it using `dev-master`, lock it to version 2.0 by setting require statement to `^2.0` and calling `composer update`.


## Connecting to Palzin Accounts

```php
require_once '/path/to/vendor/autoload.php';

// Provide name of your company, name of the app that you are developing, your email address and password. Last parameter is URL where your Palzin is installed.
$authenticator = new \Palzin\SDK\Authenticator\PalzinAuthenticator('ACME Inc', 'My Awesome Application', 'you@acmeinc.com', 'hard to guess, easy to remember', 'https://my.company.com/projects');

//SSL problems?
//If curl complains that SSL peer verification has failed, you can turn it off like this:
$authenticator->setSslVerifyPeer(false);


// Issue a token.
$token = $authenticator->issueToken();

// Did we get what we asked for?
if ($token instanceof \Palzin\SDK\TokenInterface) {
    print $token->getUrl() . "\n";
    print $token->getToken() . "\n";
} else {
    print "Invalid response\n";
    die();
}
```


## Constructing a client instance

Once we have our token, we can construct a client and make API calls:

```php
$client = new \Palzin\SDK\Client($token);
//SSL problems?
//If curl complains that SSL peer verification has failed, you can turn it off like this:
$client->setSslVerifyPeer(false);

```

Listing all tasks in project #65 is easy. Just call:

```php
$client->get('projects/65/tasks');
```

To create a task, simply send a POST request:

```php
try {
    $client->post('projects/6/tasks', [
      'name' => 'This is a task name',
      'assignee_id' => 4
    ]);
} catch(AppException $e) {
    print $e->getMessage() . '<br><br>';
    // var_dump($e->getServerResponse()); (need more info?)
}
```

To update a task, PUT request will be needed:

```php
try {
    $client->put('projects/5/tasks/16', [
        'name' => 'Updated named'
    ]);
} catch(AppException $e) {
    print $e->getMessage() . '<br><br>';
    // var_dump($e->getServerResponse()); (need more info?)
}
```

``post()`` and ``put()`` methods can take two arguments:

1. ``command`` (required) - API command,
3. ``variables`` - array of request variables (payload)

To remove a task, call:

```php
try {
    $client->delete('projects/5/tasks/16');
} catch(AppException $e) {
    print $e->getMessage() . '<br><br>';
    // var_dump($e->getServerResponse()); (need more info?)
}
```

``delete()`` method only requires ``command`` argument to be provided.

For full list of available API command, please check with support@ingressit.com
