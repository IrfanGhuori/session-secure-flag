<?php 
namespace app;

class Active_sessions 
{

    /** If set to true then PHP will attempt to send the httponly flag when setting the session cookie. */
    private bool $Session_httponly = true;
    /** An associative array which may have any of the keys lifetime,
     *  path, domain, secure, httponly and samesite.
     *  The values have the same meaning as described 
     *  for the parameters with the same name. 
     *  The value of the samesite element should be either Lax or Strict.
     *  If any of the allowed options are not given, their default values are 
     *  the same as the default values of the explicit parameters. 
     *  If the samesite element is omitted, no SameSite cookie attribute is set */
    private $Session_options = null;
    /** If true cookie will only be sent over secure connections.  */
    private $Session_secure = false;
    /** Cookie domain, for example 'www.example.com'. 
     * To make cookies visible on all subdomains then the domain must be prefixed with a dot like '.example.com'. */
    private $Session_Domain = null; 
    /** Lifetime of the session cookie, defined in seconds. */
    private $Session_Life = null; 
    /** Path on the domain where the cookie will work. Use a single slash ('/') for all paths on the domain. */
    private $Session_Path = "/"; 
    /** Handle the session  */
    private $SameSite = null;
    /** session_name -- Get and/or set the current session name */
    private $Secure_Name = null;


    public function __construct($SessionName, $lifetime, $path, $domain, $options)
    {
        if ( $this->Session_Stutas() === false )
        {
        
        $this->Secure_Name =$this->SessionNames($SessionName);

            if($this->Session_Header() !== false)
            {
                $this->Secure_Session = true;

                }else{

                $this->Secure_Session = false;
                }

                session_set_cookie_params ([
                'lifetime' => $lifetime,
                'path' => $path,
                'domain' => $domain,
                'secure' => $this->Secure_Session,
                'httponly' => true,
                'samesite' => $options
                ]);

                session_name($this->Secure_Name);
                session_start();
                session_regenerate_id(true);
            }

    }
    
    public function SessionDestory()
    {
         $this->Session_Destory();
    }

    private function Session_Destory()
    {

        // Unset all of the session variables.
        $_SESSION = array();

        // If it's desired to kill the session, also delete the session cookie.
        // Note: This will destroy the session, and not just the session data!
        if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
        );
        }
        // Finally, destroy the session.
        session_destroy();  
    }

    /** */
    private  function Session_Stutas()
    {
        if ( php_sapi_name() !== 'cli' ) {
        if ( version_compare(phpversion(), '5.4.0', '>=') ) {
        return session_status() === PHP_SESSION_ACTIVE ? true : false;
        } else {
        return session_id() === '' ? false : true;
        }
    }

    return false;
    }

    /** Replaces all spaces with hyphens and  Removes special chars */
    private function SessionNames($session_names)
    {
        $string = str_replace(' ', '-', $session_names); 
        return preg_replace('/[^A-Za-z0-9\-]/','', $session_names);
    }

    /** it is a sample code for [PHP] Get Site URL Protocol "HTTP or HTTPS". */
    private  function Session_Header()
    {
        if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') 
        {
        // this is HTTPS
        return true;
        } else {
        // this is HTTP
        return false;
        }
    }

}
/** Block Direct access */
if(count(get_included_files()) == 1){
header('Location:../404.html');
if(session_id() !== ''){ session_destroy(); }
}
?>





