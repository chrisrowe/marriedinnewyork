# Jumpstart

## Installation

1. Point your web server to the `/public/` directory.
2. Import `/setup/db_dump.sql` to your database
3. Copy `/setup/local_settings.php` to `/system/expressionengine/config/local_settings.php`
4. Update the variables in `local_settings.php` as needed (usually just DB settings)
5. Create static cache folder `/public/static/cache`
6. Set recursive permissions to 777 on the following directories:
	- `/system/expressionengine/cache`
    - `/public/media`
	- `/static/cache`

## Users

The super admin account is `webdna` with the password `yander1`
The default website administrator account is `admin` with the password `sped5wo8be`


## CSS

Adhere to the [SMACSS](http://smacss.com/) workflow (mostly)

1. Install SASS `gem install sass`
2. Run SASS `sass --watch scss:css` when in the `public/static/` folder
3. Commit the CSS to the repo but never edit it


## Miscellaneous

- Custom global variables are located in `/public/index.php` under the "CUSTOM CONFIG VALUES" section


## Addons included

- Modules (all paid)
    - Assets
    - Datagrab
    - Detour Pro
    - Freeform Pro
    - Low nice date
    - Low Replace
    - Low Title
    - Low Variables
    - Matrix
    - Playa
    - Republic Analytics
    - SEO Lite
    - Stash
    - Structure
    - SwitchEE
    - Title Master
    - Twitter
    - WYGWAM
    - Zoo Flexible Admin

- Fieldtypes
    - P&T Field Pack

- Plugins
    - CE Image
    - Hacksaw
    - Textile


## Get licenses!

- Add ExpressionEngine license key to `/system/expressionengine/config/local_settings.php`
- Add license keys for all paid addons above
- Pat yourself on the back.