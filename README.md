## About URL Shortener

This project was made using Laravel Framework as a Backend and Bootstrap as a Frontend. This project was created for Educational Purposes, however I do not claim responsibility of any misuse.

## Project Developer (1)

- **[InspectorGadget](https://github.com/InspectorGadget)**

## Contributing

Thank you for considering contributing to this Project. Please create a Pull Request on your Contribution.

## License

This URL Shortener is open-source platform licensed under the [MIT license](https://opensource.org/licenses/MIT).

## How do I setup?

# Pre-requirement
- Composer
- PHP 7.1.3 >
- Apache2 or Nginx

1. Download the Project from GitHub
2. Unzip and drop it in your Directory
3. Copy .env file, `cp .env.example .env`
4. Edit .env file, make sure SQL DB, Username and Password are correct (DB must already exist)
5. Open Terminal, run `composer install`. Then, `php artisan migrate`
6. Woila! Enjoy your Project now.

In case of any trouble with Apache2 or Nginx configuration, you may create an Issue here.

NOTE: If you run into Laravel Storage permission denied error, run `chmod 755 {dir}`, then navigate inside the directory and type `chmod -R o+w storage`. Now, you're all good to enjoy!