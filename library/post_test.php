<!-- 
Home Page is incompleted due to post_test.php && posts.php 

ERROR: [php:error] [pid 1016] [client ::1:55538] PHP Fatal error:  Uncaught
Error: Call to undefined function do_post() in /var/www/html/lahtp/library/post_test.php:Stack trace:\n#0 {main}\n
thrown in /var/www/html/lahtp/library/post_test.php on line 6
-->

<pre><?php

include_once 'library/posts.php';

//To post - Error : do_post undeclared due to loading issue of library/posts.php
echo do_post('Hello world, this is the first post', '/images/cool.jpg');


?></pre>