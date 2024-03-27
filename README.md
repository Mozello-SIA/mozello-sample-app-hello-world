# Mozello sample quick-start Helo World App
Demonstrates how to make app for [Mozello](https://www.mozello.com) websites using Mozello Apps API.

Refer to [Mozello Apps API documentation](https://www.mozello.com/developers/apps-api/)

This sample App simply inserts `hello.js` script into the website, which outputs a hello message.

# Quick start
1. Create Mozello account if you haven't already.
2. The app needs to be hosted in a public location. You will need to have the public URL to complete the next steps.
3. Modify `meta/manifest.json` and replace the sample values with your data. Generate and fill in your App secret.
4. Submit the manifest via [App integration setup portal](https://www.mozello.com/apps/api/apps/) and save the resulting App ID and API key.
5. Modify `config.php`. Fill in ID and API key from the App integration setup portal and the App secret from the manifest.
6. Modify `app.php`. Replace script URL with a valid location or replace the script snippet altogether.
7. Upload the modified app files to your host.
8. The app will be available in your Mozello website. The snippet will be inserted in your website in the preview mode but not the design mode.

# Next steps
1. For your app configuration, modify `settingsForm.php` and `settingsActions.php` and modify the form fields and their processing.
2. Adjust the JavaScript files and the snippet in `app.php`. You might want to customize or dynamically generate the snippet depending on the app configuration.
3. Once you have finished, if you want to make your app public for all Mozello users, you can submit it for approval in the App integration setup portal.
