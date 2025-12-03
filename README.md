# ShopParser

> **Note:** This project is no longer actively maintained and is considered legacy code. Many of the configured webshops may have changed their HTML structure, causing parsing to fail.

A PHP-based web scraping tool for parsing product information (title, image, price) from Dutch e-commerce websites.

## Features

- Extracts product metadata (title, image, price) from 60+ Dutch webshops
- Configuration-driven CSS selector rules per domain
- Automatic price normalization (handles both comma and dot decimal separators)
- Image URL normalization (converts relative URLs to absolute)
- Validation against approved shop list
- Outputs results to JSON and log files

## Requirements

- PHP 7.0 or higher
- PHP cURL extension enabled
- Write permissions for output files

## Installation

1. Clone the repository:
   ```bash
   git clone https://github.com/latinvm/ShopParser.git
   cd ShopParser
   ```

2. Ensure PHP cURL extension is enabled in your `php.ini`:
   ```ini
   extension=curl
   ```

## Usage

Run the parser from the command line:

```bash
php index.php
```

### Output Files

- `parse.log` - Detailed parsing results and diagnostics
- `shops.json` - JSON export of validated shop configurations
- `curl.log` - cURL debug output (when debug mode is enabled)

## Configuration

### Debug Mode

Set `$debug = true` in `config.inc.php` to enable verbose logging.

### Adding New Shops

Add parser rules to the `$parserules` array in `config.inc.php`:

```php
'example-shop.nl' => array(
    'image' => array(
        'rule' => 'meta[property="og:image"]',  // CSS selector
        'attribute' => 'content'                 // Attribute to extract
    ),
    'title' => array(
        'rule' => 'meta[property="og:title"]',
        'attribute' => 'content'
    ),
    'price' => array(
        'rule' => 'span.price',
        'attribute' => 'plaintext',
        'filter' => '/([0-9]*)\,([0-9]*)/'      // Optional regex filter
    ),
),
```

### Test URLs

Add a test URL for the new shop domain to `$shop_test_url_array` in `index.php`.

## Project Structure

```
ShopParser/
├── index.php              # Main entry point
├── config.inc.php         # Parser rules and configuration
├── back/
│   ├── parseSiteClass.php # Core parsing engine
│   ├── csv.php            # CSV helper functions
│   └── simple_html_dom.php# HTML DOM parsing library
├── doc/
│   └── webshop_ranking.csv# Shop popularity ranking data
└── report.csv             # Shop validation database
```

## How It Works

1. Loads parser rules from configuration
2. For each configured domain, finds a matching test URL
3. Fetches the page using cURL
4. Parses HTML using CSS selectors (via simple_html_dom)
5. Extracts and normalizes metadata (title, image, price)
6. Validates against the approved shop list
7. Logs results and exports valid configurations

## License

This project is provided as-is for educational purposes.
