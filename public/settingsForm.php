<!DOCTYPE HTML>

<html>

<head>
    <title><?= $HTML_DisplayTitle ?></title>
    <meta charset="utf-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <link href="https://dss4hwpyv4qfp.cloudfront.net/libs/css/reset.css?v=<?= $mozelloVersion ?>" rel="stylesheet" type="text/css">
    <link href="https://dss4hwpyv4qfp.cloudfront.net/libs/css/bones.css?v=<?= $mozelloVersion ?>" rel="stylesheet" type="text/css">
    <style>
    #content {
        max-width: 450px;
    }
    </style>
</head>

<body>

<form id="appSettingsForm" class="formBone">

    <input name="authCode" value="<?= $authCode ?>" type="hidden">

    <div id="content" style="text-align: center">
        <h1><?= $HTML_DisplayTitle ?></h1>
        <div class="row">
            <label>
                Test setting:
            </label>
            <input class="ctrl w100p" name="hello_test_setting" value="<?= $HTML_Hello_Test_setting ?? ''; ?>" type="text">
        </div>
    </div>

    <div id="footer">
        <ul class="actionBone">
            <li><a id="saveBtn" href="javascript:;" class="button submit">Save</a></li>
            <li><a id="cancelBtn" href="javascript:;" class="button secondary">Cancel</a></li>
        </ul>
    </div>

</form>

<script>
    $(document).ready(function() {

        function getFormData()
        {
            return $("#appSettingsForm").serialize();
        }

        $("#saveBtn")
            .off()
            .on("click", function() {
                $.ajax({
                    url: 'settingsActions.php',
                    type: 'post',
                    data: getFormData(),
                    success: function(response) {
                        window.location.href = "<?= $HTML_Callback ?>";
                    },
                    error: function(xhr, status, error) {
                        alert("Error: " + xhr.responseText);
                        window.location.href = "<?= $HTML_Callback ?>";
                    }
                });
            });

        $("#cancelBtn")
            .off()
            .on("click", function() {
                window.location.href = "<?= $HTML_Callback ?>";
            });

    });

</script>

</body>

</html>