<?php
class SystemConfiguration {
    // General Settings
    public static $base_url    = 'http://www.captainshub.com/bookme/';
    
    // Database Settings
    public static $db_host     = 'localhost';
    public static $db_name     = 'bookme';
    public static $db_username = 'root';
    public static $db_password = 'j2NY6hXqLlba';
    
    // Google Calendar API Settings
    public static $google_sync_feature  = FALSE; // Enter TRUE or FALSE;
    public static $google_product_name  = '';
    public static $google_client_id     = '';
    public static $google_client_secret = '';
    public static $google_api_key       = '';

    // E-Mail setttings
    public static $smtphost = 'smtp.gmail.com';

    public static $smtpport = '465';
    public static $smtpuserid = 'captainshubnow@@gmail.com';
    public static $smtppassword = 'U|3914.uaiA!';
    public static $smtpauth = true;
    public static $smtpsecure = "ssl";
}

/* End of file configuration.php */
/* Location: ./configuration.php */
