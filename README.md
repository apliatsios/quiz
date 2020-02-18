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
5. Point your browser to [http://dev.server.com](http://dev.server.com) and you should get the response  
```php
{
  errorMessage: "Invalid Route"
}
```
6. Point your browser to [http://dev.client.com](http://dev.client.com) and you should get a blank page with no console errors
