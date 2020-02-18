# Digital Publications Group Developer Quiz

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
7. Start with `server` by viewing `server/index.php` --a file that **SHOULD NOT** be edited 
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
