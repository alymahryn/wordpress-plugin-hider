
# Wordpress Plugin Hider

This plugin will:

- Keep the original plugin active and functional
- Hide the specified plugin(s) from the WordPress plugins list
- Not interfere with the plugin's operation or updates


## Important notes:

The hidden plugin will still be active, just not visible in the plugins list.
You'll need to manage (deactivate, update, etc.) the hidden plugin manually or through code.
Be cautious with this approach, as it can lead to confusion for other administrators.
Document this change clearly for future reference.

####  This method doesn't involve modifying other plugin files.

## Usage/Examples

```javascript
function hide_plugins($plugins) {
    // List of plugins to hide (use the plugin's folder name)
    $hidden_plugins = array(
        'your-plugin-name-here',
        
        // Add more plugin folder names here if needed
    );

```


## License

[MIT](https://choosealicense.com/licenses/mit/)

