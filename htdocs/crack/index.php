<!DOCTYPE html>
<head><title>Charles Severance MD5 Cracker</title></head>
<body>
<h1>MD5 cracker</h1>
<p>This application takes an MD5 hash
of a two-character lower case string and 
attempts to hash all two-character combinations
to determine the original two characters.</p>
<pre>
Debug Output:
<?php
$goodtext = "Not found";
// If there is no parameter, this code is all skipped
if ( isset($_GET['md5']) ) {
    // microtime() returns the current Unix timestamp with microseconds. This function is only available on operating systems that support the gettimeofday() system call.
    $time_pre = microtime(true);
    // echo $time_pre."time pre";
    
    $md5 = $_GET['md5'];

    // This is our alphabet
    $txt = "0123456789";
    $show = 15;
    $flag = 0;

    for($i=0; $i<strlen($txt); $i++ ) 
    {
        $ch1 = $txt[$i];   // The first characters

        for($j=0; $j<strlen($txt); $j++ ) 
        {
            $ch2 = $txt[$j];  // Our second character
            
            for($k=0; $k<strlen($txt); $k++ ) 
            {
                $ch3 = $txt[$k];  // Our third character
            
                for($l=0; $l<strlen($txt); $l++ ) 
                {
                    $ch4 = $txt[$l];  // Our fourth character
        
                    $try = $ch1.$ch2.$ch3.$ch4;

                    // Run the hash and then check to see if we match
                    $check = hash('md5', $try);
                    if ( $check == $md5 ) {
                        $goodtext = $try;
                        $flag = 1;
                        break;   
                        // Exit the inner loop
                    }

                    // Debug output until $show hits 0
                    if ( $show > 0 ) {
                        print "$check $try\n";
                        $show = $show - 1;
                    }
                }
                
                if ($flag == 1) 
                {
                    break;
                }
            }
            
            if ($flag == 1) 
            {
                break;
            }
        }
        
        if ($flag == 1) 
        {
            break;
        }
    }
    
    // Compute elapsed time
    $time_post = microtime(true);
    print "Elapsed time: ";
    print $time_post-$time_pre;
    print "\n";
}
?>
</pre>
<!-- Use the very short syntax and call htmlentities() -->
<p>Original Text: <?= htmlentities($goodtext); ?></p>
<form>
<input type="text" name="md5" size="60" />
<input type="submit" value="Crack MD5"/>
</form>
<ul>
<li><a href="index.php">Reset</a></li>
<li><a href="md5.php">MD5 Encoder</a></li>
<li><a href="makecode.php">MD5 Code Maker</a></li>
<li><a
href="https://github.com/csev/wa4e/tree/master/code/crack"
target="_blank">Source code for this application</a></li>
</ul>
</body>
</html>