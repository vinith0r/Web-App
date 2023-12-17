<!-- 
Home Page is incompleted due to /library/post_test.php && /library posts.php 

ERROR: [php:error] [pid 1016] [client ::1:55538] PHP Fatal error:  Uncaught
Error: Call to undefined function do_post() in /var/www/html/lahtp/library/post_test.php:Stack trace:\n#0 {main}\n
thrown in /var/www/html/lahtp/library/post_test.php on line 6
-->

<?php

// NOT COMPLETED

require_once 'library/auth.php';

/*
1. do_post($post_content, $image_url) -  take user from cookie!
	- return post ID
2. edit_post($post_id, $post_content)
3. delete_post($post_id)
4. like_post($post_id) -  take user from cookie!
5. get_all_posts() - to get all posts
6. get_post($post_id) - to get a single post using its ID
7. get_likes_count($post_id) - get number of likes for a specific post
8. has_liked($post_id) - return true if atleast one like is there, else false

Database Table:
	1. posts
		- post_id : int,auto_increment,primary_key,unique,not_null
		- content: varchar,not_null
		- image: varchar,not_null
		- posted_on: datetime,default:current_timestamp
		- posted_by: varchar,not_null
		- edited_on: datetime,default:current_timestamp
	2. likes
		- id : int,auto_increment,primary_key,unique,not_null
		- liked_by: varchar,not_null
		- post_id: int,not_null
*/
function do_post($post_content, $image_url){
    $conn = get_db_connection();
    $username = get_current_username();
    $query = "INSERT INTO `lahtp`.`posts` (`content`, `image`, `posted_by`) VALUES ('$post_content', '$image_url', '$username');";

    if(mysqli_qurey($conn, $query)){
        $post_id = mysqli_insert_id($conn);
    }
    else{
        return NULL;
    }
}
function get_all_posts(){
    $conn = get_db_connection();
    $username = get_current_username();
    $query = "SELECT * FROM lahtp.posts;";

    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result) > 0){
		$posts = [];
		while($row = mysqli_fetch_assoc($result)){
			$posts[] = $row;
		}
		return $posts;
	} else {
		return [];
	}
}

