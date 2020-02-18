# Developer Quiz

#### Requirements
1. Apache server
2. PHP 5+ (Recommended 7+)

#### Steps to install

1. Clone the repo in your machine
2. Create a branch with your username in order to deploy there

#### What to do
1. Update your Apache/hosts configuration so that `client` folder serves the `dev.client.com` host at port `8080`
2. Add the **Apache** vhost configuration in `client.conf` file
3. Update your Apache/hosts configuration so that `server` folder serves the `dev.server.com` host at port `8080`
4. Add the **Apache** vhost configuration in `server.conf` file
5. Point your browser to [http://dev.server.com:8080](http://dev.server.com:8080) and you should get the response  
```php
{
  errorMessage: "Invalid Route"
}
```
6. Point your browser to [http://dev.client.com:8080](http://dev.client.com:8080) and you should get a blank page with no console errors
7. Start with `server` by viewing `server/index.php` in the IDE of your choice --a file that **SHOULD NOT** be edited 
8. As you can guess it contains a very simplistic approach for 2 'modes':
    * Loging in
    * Authenticating a request and getting back a response

   'mode' is captured by the `mode` key of the super global `$_GET` array  
   That is reflected in 2 distinct types of URIs
    * [http://dev.server.com:8080?mode=login&username=x&password=x](http://dev.server.com:8080?mode=login&username=x&password=x)
    * [http://dev.server.com:8080?mode=get_users&hash=x](http://dev.server.com:8080?mode=get_users&hash=x)
    
9. Files that are needed to be edited:
    * `mime.php` => See inside instructions
    * `hash_generator.php` => See inside instructions and make sure a value is returned
    * `authenticate.php` => See inside instructions (It works in conjunction with `hash_generator.php`)
    * `get_users.php`, `get_projects.php` => See inside instructions as they just return data
10. By the time you have finished and given you've chosen `sha256` as your preferred way of hashing, any given URI should return the appropriate response:
    * [http://dev.server.com:8080/?username=chris&password=12345&mode=login](http://dev.server.com:8080/?username=chris&password=12345&mode=login)  
    ```PHP
    {
      hash: "037436c6a6a4ac88a0fa14394163a3c893b135e685762786cfe948601b3f6618"
    }
    ```
    * [http://dev.server.com:8080/?mode=get_users&hash=037436c6a6a4ac88a0fa14394163a3c893b135e685762786cfe948601b3f6618](http://dev.server.com:8080/?mode=get_users&hash=037436c6a6a4ac88a0fa14394163a3c893b135e685762786cfe948601b3f6618&solution)  
    ```PHP
    [
        {
          id: 1,
          name: "John",
          lastName: "Doe"
        },
        {
          id: 2,
          name: "Chris",
          lastName: "Black"
        },
        {
          id: 3,
          name: "George",
          lastName: "Best"
        }
    ]
    ```
11. Heading to `client` project there's the need to edit `client/index.php` and `client/scripts.js` so that:
    * The form should have all of its fields required
    * Everything is executed after the `DOM` is fully loaded
    * There is a simple way of 'capturing' the hash changes so that 2 'hash routes' exist: [http://dev.client.com:8080/#login](http://dev.client.com:8080/#login) and [http://dev.client.com:8080/#viewProjects](http://dev.client.com:8080/#viewProjects). Any other route resolves to `#login` **even when there's no route at all** => [http://dev.client.com:8080/](http://dev.client.com:8080/)
    * When the form is submitted, the default action should cancelled and instead you should make an AJAX call to the appropriate `server` URI => [http://dev.server.com:8080?mode=login](http://dev.server.com:8080?mode=login) by passing the parameters required. If the user selected the `Save Password` option, store the `username` and `password` in `localStorage`, otherwise empty those values from it. The `save` option should be remembered, too
    * When the above request is finished **AND ONLY THEN**, you should immediately visit the:  
      * [http://dev.server.com:8080?mode=get_users](http://dev.server.com:8080?mode=get_users)
      * [http://dev.server.com:8080?mode=get_projects](http://dev.server.com:8080?mode=get_projects)  
      By passing the `hash` parameter as well as it was given in the previous response.  
      Bear in mind that those 2 requests **SHOULD NOT placed** in nested calls, but rather be part of a promise request
    * When the previous promised is deferred, then append the appropriate rows in `#viewProjects table tbody` element
    
    
    Everything should be done with either `jQuery` or vanilla Javascript. It's up to you.
    Your code should be compliant with only the latest versions of `Chrome`, `Firefox`, `Safari`, `Opera` and `Edge`
    
 **Good Luck!**
