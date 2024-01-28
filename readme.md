# Get Rest Posts WordPress Plugin

## Description

"Get Rest Posts" is a WordPress plugin that allows you to retrieve WordPress posts using the WordPress REST API. The plugin provides a simple and convenient way to fetch posts and display them on your WordPress site using a shortcode.

## Features

- Retrieve WordPress posts using the WordPress REST API.
- Display posts on your WordPress site using the `[get_rest_posts]` shortcode.
- Easy configuration through the WordPress admin interface.
- Lightweight and efficient.

## Installation

1. Upload the `get-rest-posts` directory to the `/wp-content/plugins/` directory.
2. Activate the plugin through the 'Plugins' menu in WordPress.
3. Use the `[get_rest_posts]` shortcode in your posts or pages to display posts.

## Usage

Place the `[get_rest_posts]` shortcode in the content of a WordPress post or page where you want to display the retrieved posts.

### Shortcode Attributes

- **`<your_attribute>`:** Description of the attribute.
- **`<another_attribute>`:** Description of another attribute.

Example:
```[get_rest_posts attribute1="value1" attribute2="value2"]```

## Screenshots

![Screenshot 1](screenshot-1.png)
*Caption for screenshot 1.*

![Screenshot 2](screenshot-2.png)
*Caption for screenshot 2.*

## Frequently Asked Questions

### Can I customize the display of the retrieved posts?

Yes, you can customize the display by using shortcode attributes. Refer to the Usage section for details on available attributes.

### Is there a limit to the number of posts that can be retrieved?

By default, the plugin retrieves a maximum of 10 posts. You can customize this by using the `limit` attribute in the shortcode.

## Changelog

### <1.0.0>

- Initial release.

## Author

- **<Rubel>**

## License

This project is licensed under the <GPL> License - see the [LICENSE.md](LICENSE.md) file for details.

