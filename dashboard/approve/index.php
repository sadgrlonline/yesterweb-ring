
<?php include 
session_start(); 
"../../auth-session.php";
?>
<!DOCTYPE html>
<html>

    <head>
        <title>Approve Websites</title>
        <link rel="stylesheet" href="../../css/style.css" media="all">
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    </head>

        <body>
            <?php 
            include "../../templates/nav.php";
            ?>
        <div id="flagReasonDiv">
            <p style="color:white;">Please write a short explanation of why this site is flagged, and include your name/alias.</p>
            <textarea id="flagReason"></textarea><br><br><input type="submit" id="submitFlag" value="submit"></p>
        </div>
        <div id="deleteReasonDiv">
            <p style="color:white;">Please write a short description of why this entry is being denied. This will be emailed to the person if they have an email on file.</p>
            <textarea id="deleteReason"></textarea><br><br><input type="submit" id="submitDelete" value="submit"></p>
        </div>
        <div class="container">
            <div class="instructions">
                <strong>Before approving a website:</strong>
                    <ul>
                        <li>Click on the site's URL to make sure the link works.</li>
                        <li>Look through the site for any hate speech, discrimination, or intrusive ads.</li>
                        <li>If you're unsure, you can leave the entry in the approval queue.</li>
                    </ul>
            </div>
        <div>

        <div class="table-responsive">
            <table class="table">
                <tr>
                    <th scope='col'>name</th>
                    <th scope='col'>url</th>
                    <th scope='col'>owner</th>
                    <th scope='col'>description</th>
                    <th scope='col'>contact</th>
                    <th scope='col'>flagged?</th>
                    <th scope='col'>flag</th>
                    <th scope='col'>approve</th>
                    <th scope='col'>deny</th>
                </tr>

            <?php include_once "approve.php" ?>
</div>
</div>
        <script>
        $(document).ready(function() {
            $('.approve').click(function(e) {
                e.preventDefault();
                var id = $(this).attr("data-id");
                var email = $(this).parents('td').siblings('.contact').text();
                $.ajax({
                    type: 'post',
                    url: 'approve.php?approve=' + id + "&" + email.trim(),
                    success: function(response) {
                        $('#' + id).hide();
                    }
                });
                
            })
            
            $('.deny').click(function(e) {
                e.preventDefault();
                if (confirm('Are you sure you want to deny this user?')) {
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
                            //url:'/yesterweb-ring/dashboard/approve.php',
                            data: {'denyid':id, 'reason':reason},
                            success: function(response) {
                                $('#' + id).hide();
                            }
                        });
                    });
                    }
                });

                                var reason = [];
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
                    $this.parents('td').siblings('.flagged').text('⚠️');
                    $(this).siblings('#flagReason').val('');
                    $(this).parents('#flagReasonDiv').css("display", "none");
                        $.ajax({
                        type: 'post',
                        data: {'id':id, 'reason':reason},
                        url: 'approve.php',
                        success: function(response) {
                            //console.log($(this).text());
                        }
                    });
                });   
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
                });
            });
            
        </script>
    </body>
</html>