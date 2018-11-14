
    <!--
     * API Call For Logging In A User
     *
     * @method: POST
     *
     * @parameter username {String}
     *  Email/Username of The User To Login
     *
     * @parameter password {String}
     *  Password of The User To Login
     *
     * @return
     *  400: No Email/Password, Invalid Email/Password, User Not Found
     *  200: User Found & Session Started 
     *      json: { userId:(the User's ID) } + Auth Cookie
     */-->
    
    <?php

//    case '/api/login':
        if (!isset($_POST['username'])) {
            header(' ', true, 400);
            $resp['message'] = 'No Username Provided';
            echo json_encode($resp);
            die();
        }
        if (!isset($_POST['password'])) {
            header(' ', true, 400);
            $resp['message'] = 'No Password Provided';
            echo json_encode($resp);
            die();
        }

        // Separate The Username Portion From clarion.edu Or localhost
        $splitUsername = explode('@', trim($_POST['username']));

        $username = $splitUsername[0];
        $plainText = $_POST['password'];

        $host = "clarion.edu";
        if (isset($splitUsername[1]))
            $host = $splitUsername[1];

        $user = getUserByUsername($username);

        if (is_null($user)) {

            // Prevent Student Accounts From Generating Faculty Accounts
            if (substr($username, 0, 2) === 's_') {
                header(' ', true, 403);
                echo json_encode([ 'message' => 'Students May Not Login Unless Expressly Allowed' ]);
                die();
            }

            // If The User Is A Clarion User
            // And Username/Password Are Correct,
            // But We Don't Have A Record Of Them
            // Add One
            if (strtolower($host) === "clarion.edu" && clarionLogin($username, $plainText)) {
                // Clarion Emails Match Username @clarion.edu [For Faculty, Not Students]
                $email = $splitUsername[0] . '@clarion.edu';
                $userId = createClarionUser($username, $email, 'faculty', true);

                if ($userId > 0) {
                    /** @noinspection PhpUnhandledExceptionInspection */
                    $authValue = random_bytes(64);
                    $expires = time() + $config['authCookieExpires'];
                    $cookieId = persistAuthCookie(AuthCookie::create($userId, $authValue, $expires));
                    $cookieValue =  $cookieId . ':' . $authValue;
                    setcookie(AUTH_COOKIE_NAME,
                        $cookieValue,
                        $expires,
                        $config['webRoot'],
                        $_SERVER["SERVER_NAME"],
                        false,
                        true);
                    $_SESSION['userId'] = $userId;
                    echo json_encode([ 'message' => 'success' ]);
                    die();
                } else {
                    header(' ', true, 500);
                    echo json_encode([ 'message' => 'Failed to create new Clarion User' ]);
                    die();
                }
            } else { // User Not Found & Not A New Clarion User
                header(' ', true, 400);
                echo json_encode(['message' => 'Email/Password Not Valid']);
                die();
            }
        } else { // User Found. Verify Password Based On Host

            $isValidLogin = $host === "clarion.edu" && clarionLogin($username, $plainText);
            if (!$isValidLogin)
                $isValidLogin = $host === "localhost" && verifyPassword($plainText, $user->salt, $user->hashedPass);


            if ($isValidLogin) {

                if (!$user->isActive) {
                    header(' ', true, 403);
                    echo json_encode([ 'message' => 'User Has Been Disabled, contact beckerlab@clarion.edu if you believe this is in error' ]);
                    die();
                }

                /** @noinspection PhpUnhandledExceptionInspection */
                $authValue = random_bytes(64);
                $expires = time() + $config['authCookieExpires'];
                $cookieId = persistAuthCookie(AuthCookie::create($user->id, $authValue, $expires));
                $cookieValue =  $cookieId . ':' . $authValue;
                setcookie(AUTH_COOKIE_NAME,
                    $cookieValue,
                    $expires,
                    $config['webRoot'],
                    $_SERVER["SERVER_NAME"],
                    false,
                    true);
                $_SESSION['userId'] = $user->id;
                echo json_encode(['message' => 'success']);
                die();
            } else {
                header(' ', true, 400);
                echo json_encode(['message' => 'Email/Password Not Valid']);
            }
        }

 
 
 
function clarionLogin(string $username, string $password): bool {
    // Create A Temporary File Read/Write -able only by us (permission: 0600)
    // And Store The Password In That File
    // We Do This So Our Password Does Not Appear In The Process List While Our Shell Command Is Running
    $tmpFile = tempnam(sys_get_temp_dir(), 'usr');
    file_put_contents($tmpFile, $password);

    // Kerberos is how we interact with the Clarion Authentication Servers
    // Here we:
    //  Read the password out of a temporary file (To prevent it from being in the output of ps)
    //  Pipe the Password to the `kinit` Function (Since It Would Normally ask us for one if we just ran it)
    //  Call the `kinit` command with the username as an argument (Do Not Pass The @clarion.edu Part)
    //      FYI: As of this witting, the 'domain' (a Realm in Kerberos) is @CLARION.LOCAL, try not to depend on this value
    //  We Redirect all normal (non-error) output of the `kinit` command to /dev/null, effectively ignoring it
    //  If the command succeeded (kinit returned 0, implies username/pass are correct), then the `printf` on the right side of the and (`&&`) is run
    //  If the command fails, then PHP's shell_exec is defined to return null (See: http://php.net/manual/en/function.shell-exec.php)
    //  Both the username and the password are wrapped in `escapeshellarg` calls, this function is
    //      Supposed to protect from shell injection, though it may still be possible.
    //      Try to depend on them as little as possible
    //
    // Returns "Success" If username/password are correct
    // null Otherwise
    $shellResult = shell_exec('cat ' .  $tmpFile . " | kinit " . escapeshellarg($username) . " > /dev/null && printf 'Success\n'");

    // Remove Our Temporary File As Soon As It's Unneeded
    unlink($tmpFile);
    return trim($shellResult) === "Success";
}
 