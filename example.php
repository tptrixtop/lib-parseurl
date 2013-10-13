<?php

require_once 'Err/BaseErr.php';
require_once 'Err/UnknownGetParamsKey.php';
require_once 'Lib/ParseUrl.php';

$lib = new Lib_ParseUrl("http://dev.local/q/?var=5&pre=testing_string&pas=sdf123");

print "Example Lib_ParseUrl\n\n";

//origin url
print "Origin URL: " . $lib->url . "\n";

//example get host
print "\nHost: " . $lib->host . "\n\n";

//example with GET params
print "param var: " . $lib->get_params->var . "\n";
print "param pre: " . $lib->get_params->pre . "\n";
print "param pas: " . $lib->get_params->pas . "\n";

//example get not existing parameter
try {
    print $lib->get_params->nnt;
} catch(Err_UnknownGetParamsKey $e) {
    print $e->getMessage() . "\n";
}

//example get scheme
print "\nscheme: " . $lib->scheme . "\n\n";
