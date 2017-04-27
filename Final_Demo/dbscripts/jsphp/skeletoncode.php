
<?php

/**
 * Api for communicating from server to database (with some client to server to database functionality)
 *@package Server to DB Api
 */

/**
 * Gets profile information by first name associated with the profile
 * @param  String $fname first name associated with the profile
 * @return json        jsonify resultset of query to DB
 */
function get_profile_fname($fname){
	
}

/**
 * Gets profile information by last name associated with the profile
 * @param  String $lname last name associated with the profile
 * @return json        jsonify resultset of query to DB
 */
function get_profile_lname($lname){
	
}

/**
 * Gets profile information by email associated with the profile
 * @param  String $email email associated with the profile
 * @return json        jsonify resultset of query to DB
 */
function get_profile_email($email){
	
}

/**
 * Gets profile information by username associated with the profile
 * @param  String $usrname username associated with the profile
 * @return json        jsonify resultset of query to DB
 */
function get_profile_usrnm($usrname){
	
}

/**
 * Gets profile information by user id associated with the profile
 * @param  Int $usrid user id associated with the profile
 * @return json        jsonify resultset of query to DB
 */
function get_profile_usrid($usrid){
	
}

/**
 * Gets password  by userid associated with the profile
 * @param  Int $usrid user id associated with the profile
 * @return json        jsonify resultset of query to DB
 */
function get_password($usrid){
	
}

/**
 * Gets the user's type by userid associated with the profile
 * @param  Int $usrid user id associated with the profile
 * @return json        jsonify resultset of query to DB
 */
function get_usertyp($usrid){
	
}

/**
 * Gets the user's file by userid associated with the profile
 * @param  Int $usrid user id associated with the profile
 * @return json        jsonify resultset of query to DB
 */
function get_usrfile($usrid){
	
}

/**
 * Gets the user's schedule  by userid associated with the profile
 * @param  Int $usrid user id associated with the profile
 * @return json        jsonify array of classid's (requires multiple queries)
 */
function get_schedule($usrid){
	
}

/**
 * Gets class information by classid associated with the class
 * @param  Int $classid class id associated with the class
 * @return json        jsonify resultset of query to DB
 */
function get_class($classid){
	
}

/**
 * Gets classes taughy by professor associated with professorid associated with the class
 * @param  Int $profid professor id associated with the class
 * @return json        jsonify array of classid's (requires multiple queries)
 */
function get_classes_by_professor($profid){
	
}

/**
 * Gets professorid by classid associated with the class
 * @param  Int $classid user id associated with the class
 * @return json        jsonify resultset of query to DB (int endvalue)
 */
function get_professor_by_class($classid){
	
}

/**
 * Gets number of students by classid associated with the class
 * @param  Int $classid user id associated with the class
 * @return json        jsonify resultset of query to DB (int endvalue)
 */
function get_num_students($classid){
	
}

/**
 * Gets the syllabus for the class served up as a file path
 * @param  Int $classid user id associated with the class
 * @return json        jsonify resultset of query to DB (expect a string endvalue)
 */
function get_syllabus($classid){

}

/**
 * Gets the studyguides for the class served up as an array of file path
 * @param  Int $classid user id associated with the class
 * @return json        jsonify resultset of query to DB (expect a string endvalue)
 */
function get_stdygds($classid){

}

/**
 * Gets the studyguide by id served up as an array of file path
 * @param  Int $stdyid  id associated with the studyguide
 * @return json        jsonify resultset of query to DB (expect a string endvalue)
 */
function get_stdygd($stdyid){

}

/**
 * Gets the chatrooms available to the user (serves chatid array by usrid)
 * @param  Int $usrid identification number of the user
 * @return JSON        [description]
 */
function get_chtrm_by_usr($usrid){

}
/**
 * Serves chartoom information by chatroom id
 * @param  Int $chatid ID of the chatroom 
 * @return json        jsonify resultset of query to DB 
 */
function get_chtrm($chatid){

}

/**
 * Serves chatroom information by the class id
 * @param  Int $chatid ID of the chatroom 
 * @return json        jsonify resultset of query to DB 
 */
function get_chtrm_by_class($classid){

}

/**
 * Serves chatroom name by the chat id
 * @param  Int $chatid ID of the chatroom 
 * @return json        jsonify resultset of query to DB 
 */
function get_chtrm_name($chatid){

}

/**
 * Serves the rating of the professor by their id
 * @param  Int $professorid the identification number of the professor
 * @return JSON              jsonify resultset of query to DB
 */
function get_prof_rating($professorid){

}

/**
 * Creates entry to user profiles table
 * @param [String] $fname [first name]
 * @param [String] $lname [last name]
 * @param [String] $email [email]
 * @param [String] $pass  [password]
 * @param [String] $usrnm [username]
 * @param [String] $typ   [user tupe]
 */
function add_usr($fname, $lname, $email, $pass, $usrnm, $typ){

}
?>
