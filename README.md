# Session Secure Flag
Start the session with a safe flag
I'm not very expert, but I have good experience in creating user-friendly design and code clean and make it secure. Creating unnecessary files and create a complex map for using them. it's a selfish attitude or it's an inexperienced work

# Block attacks:
 - Blocking Brute Force attacks
 - Blocking fake PHP session
 - Blocking adding fake session data
 - Blocking session information sharing
 - Blocking session hijacking
 - Blocking Burp Attacks


### Installation
>  Include or require Vendor/autoload.php 

> lifetime --- 
Lifetime of the session cookie, defined in seconds.

> path ---  
Path on the domain where the cookie will work. Use a single slash ('/') for all paths on the domain.

> domain --- 
Cookie domain, for example 'www.example.com'. To make cookies visible on all subdomains then the domain must be prefixed with a dot like '.example.com'.

#> secure ---  
If TRUE cookie will only be sent over secure connections. It will auto check

> httponly --- 
If set to TRUE then PHP will attempt to send the httponly flag when setting the session cookie. By default, it is true

> options: 
An associative array which may have any of the keys lifetime, path, domain, secure, httponly and samesite. The values have the same meaning as described for the parameters with the same name. The value of the samesite element should be either Lax or Strict. If any of the allowed options are not given, their default values are the same as the default values of the explicit parameters. If the samesite element is omitted, no SameSite cookie attribute is set.

 Code Example: 
```sh
include('vendor/autoload.php');
use app\Active_sessions;
$dn = new Active_sessions('Session_name','lifetime','path','domain','Strict or Lax!');
```




