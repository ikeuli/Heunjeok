<?PHP
require_once("./include/fg_membersite.php");

$fgmembersite = new FGMembersite();

//Provide your site name here
$fgmembersite->SetWebsiteName('heunjeok.com');

//Provide the email address where you want to get notifications
$fgmembersite->SetAdminEmail('contact@heunjeok.com');

//Provide your database login details here:
//hostname, user name, password, database name and table name
//note that the script will create the table (for example, fgusers in this case)
//by itself on submitting register.php for the first time
$fgmembersite->InitDB(/*hostname*/'localhost',
                      /*username*/'heuncxep',
                      /*password*/'fadfjke11',
                      /*database name*/'heuncxep_heunjeok',
                      /*table name*/'users3');

//For better security. Get a random string from this link: http://tinyurl.com/randstr
// and put it here
$fgmembersite->SetRandomKey('x9swNLo5coNL0pw');

?>