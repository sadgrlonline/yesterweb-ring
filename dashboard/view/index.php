
<?php include 
session_start(); 
"../../auth-session.php";
?>
<!DOCTYPE html>
    <html>

        <head>
            <meta charset="UTF-8">
            <title>Yesterweb Ring Members</title>
            <link rel="stylesheet" href="../../css/style.css" media="all">
            <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        </head>

        <body>
            <div id="flagReasonDiv">
                <p style="color:white;">Please write a short explanation of why this site is flagged, and include your name/alias.</p>
                <textarea id="flagReason"></textarea><br><br><input type="submit" id="submitFlag" value="submit"></p>
            </div>
            <div id="deleteReasonDiv">
            <p style="color:white;">Please write a short description of why this entry is being removed. This will be emailed to the person if they have an email on file.</p>
                <textarea id="deleteReason"></textarea><br><br><input type="submit" id="submitDelete" value="submit"></p>
            </div>
            <?php include "../../templates/nav.php"?>
            <div class="container">
                <div class="instructions">
                    <strong>Here are some reasons why you might flag a website:</strong>
                    <ul>
                        <li>The site has ads and needs to be reviewed.</li>
                        <li>The link is broken/dead.</li>
                        <li>The site has stayed largely empty for a while.</li>
                        <li>Discrimination or hate speech was found on the site (please DM Sadness if this is the case)</li>
                    </ul>
                </div>
                <div class='table-responsive'>
                    <table class='table'>
                        <tr>
                            <th scope='col'>name</th>
                            <th scope='col'>url</th>
                            <th scope='col'>owner</th>
                            <th scope='col'>flagged?</th>
                            <th scope='col'>flag</th>
                            <th scope='col'>delete</th>
                        </tr>
                        <?php include_once 'view.php'; ?>
                </div>
        </div>
                    <style>
                        
                    </style>
                    <script>
                    $(document).ready(function() {
                        $('.del').click(function(e) {
                            e.preventDefault();
                                if (confirm('Are you sure you want to delete this user?')) {
                                    // get position of flag
                                    var pos = $(this).position();
                                    var left = pos.left;
                                    var top = pos.top;
                                    var id = $(this).attr("data-id");
                                    var $this = $(this);
                                    // set position of the input box
                                    $('#deleteReasonDiv').css({"display": "inline-block", "top": top, "left": left});
                                    $('#submitDelete').click(function(e) {
                                    var reason;
                                    reason = $(this).siblings('#deleteReason').val();
                                    console.log(reason);
                                    $(this).parents('#deleteReasonDiv').css("display", "none");
                                    $(this).siblings('#deleteReason').val('');
                                $.ajax({
                                    type: 'post',
                                    data: {'delid':id, 'reason':reason},
                                    success: function(response) {
                                       $('#' + id).hide();
                                    }
                                });

                            });
                            }
                        });
                        // when the 'flag' button is clicked
                        $('.flag').click(function(e) {
                            e.preventDefault();
                            // get position of flag
                            var pos = $(this).position();
                            var left = pos.left;
                            var top = pos.top;
                            var id = $(this).attr("data-id");
                            var $this = $(this);
                            // set position of the input box
                            $('#flagReasonDiv').css({"display": "inline-block", "top": top, "left": left});
                            $('#submitFlag').click(function(e) {
                                reason = $(this).siblings('#flagReason').val();
                                console.log('this reason is...' + reason);
                                console.log('the id is...' + id);
                                $this.parents('td').siblings('.flagged').text('⚠️');
                                $(this).siblings('#flagReason').val('');
                                $(this).parents('#flagReasonDiv').css("display", "none");
                                $.ajax({
                                type: 'post',
                                data: {'id':id, 'reason':reason},
                                url: 'index.php',
                                success: function(response) {
                                    //console.log($(this).text());
                                }
                            });
                            });
                            // move this stuff over?
                            // gets id from the selected row and sends it to the PHP
                            
                        
                            //$(this).parents('td').siblings('.flagged').text('⚠️');
                            //console.log(id);
                            
                        });
                        
                        $('td.flagged').click(function(e) {
                            e.preventDefault();
                            var id = $(this).attr("data-id");
                            var $this = $(this);
                            $(this).text('');
                            //console.log(id);
                            $.ajax({
                                type: 'post',
                                url: '?flagged=' + id,
                                success: function(response) {
                                    //console.log($(this).text());
                                }
                            });
                        })
                        
                    });
                    </script>