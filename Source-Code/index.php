<html>

<head>
    <meta charset="UTF-8">
    <title>COMP207 - Register here for a practical slot</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#displayPage").hide();
            $("#btnRegPage").click(function() {
                $("#regPage").hide();
                $("#displayPage").show();
            });
            $("#btnDisplayPage").click(function() {
                $("#regPage").show();
                $("#displayPage").hide();
            });
        });
    </script>
</head>

<body>
    <div class="container">
        <div class="header">
            <h3>
				COMP207 - Register here for a practical slot
			</h3>
        </div>
        <div class="block">
            <div id="regPage">
                <div>
                    <form action="lecturer.php">
                    <div style="float:right;">
                        <button type="submit" class="btn" id="btnRegPage">Go to Lecturer Page</button>
                    </div>
                    </form>
                    <h4>
					Register only if you know what you are doing.
				</h4>
                    <ul>
                        <li>Please enter <b>all</b> information and select your desired day. Please enter a correct 'SID' number!</li>
                        <li>Please check the number of available seats before submitting</li>
                        <li>Register only to one slot</li>
                        <li>
                            Any problems? Write a message to
                            <a href="mailto:weberb@csc.liv.ac.uk">weberb@csc.liv.ac.uk</a>
                        </li>
                    </ul>
                </div>
                <form method="post" action="register.php">
                    <table class="inputarea">
                        <tr>
                            <th>
                                <label>First Name</label>
                            </th>
                            <th>
                                <label>Last name</label>
                            </th>
                            <th>
                                <label>SID</label>
                            </th>
                            <th>
                                <label>EMail Address</label>
                            </th>
                        </tr>
                        <tr>
                            <th>
                                <input type="text" name="firstname" required>
                            </th>
                            <th>
                                <input type="text" name="lastname" required>
                            </th>
                            <th>
                                <input type="text" name="sid" required>
                            </th>
                            <th>
                                <input type="text" name="emailaddress" required>
                            </th>
                        </tr>
                    </table>

                    <table class="slotarea">
                        <tr>
                            <th>
                                <label>Select the practical slot:</label>
                            </th>
                            <th>
                                <?php include('slot_selection.php'); ?>
                            </th>
                        </tr>
                    </table>
                    <br/>
                    <div>
                        <button type="submit" class="btn" name="reg_student">Register</button>
                        <button type="reset" class="btn" name="reg_clear">Clear</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>