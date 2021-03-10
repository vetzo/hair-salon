<?php
 
add_action( 'wp_head', function  () {
	if (!current_user_can('administrator') or !isset($_GET['customize_theme'])  ) return; //exit if not admin
    ?>
    <script>

       // alert("Please Publish the theme change so the first CSS bundle is generated");
    </script>
    <?php
});


add_action( 'wp_head', function  () {
	if (!current_user_can('administrator') or isset($_GET['customize_theme']) or get_theme_mod("picostrap_disable_livereload")) return; //exit if not admin
    ?>
    <script>

        //alert("Livereload yo");
    
        var picostrap_livereload_timeout=1500;
        
        function picostrap_livereload_woodpecker(){
            //console.log("picostrap_livereload_woodpecker start");
            fetch("<?php echo admin_url() ?>?ps_check_sass_changes")
                .then(function(response) {
                    return response.text();
                }).then(function(text) {
                    //console.log(text);
                    if (text==="N") {
                        //no sass change has been detected
                        //console.log("No sass change has been detected");
                        setTimeout(function(){ picostrap_livereload_woodpecker(); }, picostrap_livereload_timeout);
                    }
                    if (text==="Y") {
                        //sass change has been detected
                        //console.log("Sass change has been detected");
                        picostrap_recompile_sass();
                    }
                }).catch(function(err) {
                    console.log("picostrap_livereload_woodpecker Fetch Error");
                }); 
        } //end function
        


        function picostrap_recompile_sass(){
            console.log("picostrap_recompile_sass start");
            //document.querySelector("#wp-admin-bar-my-account").innerHTML("Compiling SCSS....");
            fetch("<?php echo admin_url() ?>?ps_compile_scss&ps_compiler_api=1")
                .then(function(response) {
                    return response.text();
                }).then(function(text) {
                    //console.log(text);
                    if (text.includes("New CSS bundle")) {
                        //SUCCESS
                        document.querySelector("#scss-compiler-output").innerHTML = ''; //as there are no errors  
                        var split = text.split(": ");
                        var url = split[1];
                        //console.log(url);
                        document.getElementById('picostrap-styles-css').href = url;
                        setTimeout(function(){ picostrap_livereload_woodpecker(); }, picostrap_livereload_timeout);
                    }
                    else {
                        //COMPILE ERRORS
                        document.querySelector("#scss-compiler-output").innerHTML = text; //display errors
                        setTimeout(function(){ picostrap_recompile_sass(); }, picostrap_livereload_timeout);
                    }
                    
                }).catch(function(err) {
                    console.log("picostrap_recompile_sass Fetch Error");
                }); 
        } //end function

        function picostrap_check_css_exists() {
            if (
                getComputedStyle(document.documentElement).getPropertyValue('--primary')=="" && 
                getComputedStyle(document.documentElement).getPropertyValue('--bs-primary')==""
               ) picostrap_recompile_sass();   
        }

        //END FUNCTIONS

        //ON DOMContentLoaded START THE ENGINE / Like document ready :)
        document.addEventListener('DOMContentLoaded', function(event) {
            
            document.querySelector("html").insertAdjacentHTML("afterbegin","<div id='scss-compiler-output' style=' position: fixed; z-index: 99999999;'></div>");
            picostrap_check_css_exists();
            picostrap_livereload_woodpecker();
        });

    </script>
    <?php
});



//HANDLE ps_check_sass_changes  URL 
add_action("admin_init", function (){
    
	if(!is_user_logged_in() OR !current_user_can("administrator") /* OR isset($_GET['customize_theme']) */ ) return; //exit if unlogged
	
	if (isset($_GET['ps_check_sass_changes'])) {
        
        //onboarding
        if(get_theme_mod("picostrap_scss_last_filesmod_timestamp",0)==0) { echo "Y"; die(); } //set_theme_mod("picostrap_scss_last_filesmod_timestamp",picostrap_get_scss_last_filesmod_timestamp());
        
        //DEBUG 
        //echo get_theme_mod("picostrap_scss_last_filesmod_timestamp",0)."<br>".picostrap_get_scss_last_filesmod_timestamp();die;

        //check if timestamps differ 
        if (get_theme_mod("picostrap_scss_last_filesmod_timestamp",0)!=picostrap_get_scss_last_filesmod_timestamp()) echo "Y"; else echo ("N");
        die();
    } 
});




//FUNCTION TO MAKE A TIMESTAMP OF CHILD THEME SASS DIRECTORY
function picostrap_get_scss_last_filesmod_timestamp() {

	//get current sass folder directory listing
	$the_directory=WP_CONTENT_DIR.'/themes/'.get_stylesheet().'/sass/';
    $files_listing = scandir($the_directory, 1);
    
    if (!$files_listing) die("<div id='compile-error' style='font-size:20px;background:#212337;color:lime;font-family:courier;border:8px solid red;padding:15px;display:block'> Cannot find SASS folder. Are you sure child theme name is coherent with folder name? </div>");
	
    $mod_time_total=0;
	foreach($files_listing as $file_name):
		if ((strpos($file_name, '.scss') !== false) or (strpos($file_name, '.css') !== false)):
			//echo $file_name."<br>";
			$file_stats = stat( $the_directory. $file_name );
			$mod_time_total+= $file_stats['mtime'];
		endif;
	endforeach;

	return $mod_time_total; 
}
 
//FUTURE
/*
function dirToArray($dir) {
  
    $result = array();
 
    $cdir = scandir($dir);
    foreach ($cdir as $key => $value)
    {
       if (!in_array($value,array(".","..")))
       {
          if (is_dir($dir . DIRECTORY_SEPARATOR . $value))
          {
             $result[$value] = dirToArray($dir . DIRECTORY_SEPARATOR . $value);
          }
          else
          {
             $result[] = $value;
          }
       }
    }
   
    return $result;
 }
 */