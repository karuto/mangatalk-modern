# [MangaTalk Modern Theme](http://mangatalk.net/)

[![Built with Grunt](https://cdn.gruntjs.com/builtwith.png)](http://gruntjs.com/)


## Tools and dependencies

This project uses [Sass](http://sass-lang.com) with [Compass](http://compass-style.org/) as the CSS compiler. Ruby, Sass and Compass must be installed prior to its deployment. You may refer to [Sass'](http://sass-lang.com/install) and [Compass' official guide](http://compass-style.org/install/) for installation.

TL;DR: If you have Ruby installed (Mac machines should have it by default), you can simply execute the following commands:

```bash
gem update --system
sudo gem install sass
sudo gem install compass
```

Where the first instruction updates RubyGems; the second and third instructions install the designated software packages accordingly with root permission.


## Deploy MangaTalk locally

In order to deploy this project, you must have a local version of WordPress installed on the machine. You may refer to [WordPress' official guide](https://codex.wordpress.org/Installing_WordPress_Locally_on_Your_Mac_With_MAMP) if you are using Mac.

Then, locate `wp-content/themes` directory and clone this repository into it with the following command:

```bash
git clone https://github.com/karuto/mangatalk-modern.git
```

Once the project is successfully cloned, install all dependencies at the root directory:

```bash
cd mangatalk-modern
npm install
```

Then use `grunt` to build the production version of the codebase:

Other specific utility commands include:

* `grunt dev` — Compile Sass to CSS, concatenate and validate JS
* `grunt watch` — Compile assets when file changes are made
* `grunt build` — Create minified assets that are used on non-development environments

For more customized Grunt commands and in-depth explanation, please refer to the `Gruntfile.js` located at the project's root directory.


## Additional Resources

This project is built upon the [Roots Starter Theme framework.](https://roots.io) 

Caution: as of early 2015, the classic Roots Starter Theme has become deprecated in favor of Sage (a major upgrade & rebranding). This project has *not* been updated to Sage yet. You could find the classic Roots repository [here.](https://github.com/roots/roots-sass/tree/ef0854d7602f76edd809b7dac448c2ba48fe9357)

The original Roots documentation [1](https://gist.github.com/karuto/4e72a1868c042764d029), [2](https://web.archive.org/web/20150218093139/http://roots.io/docs/).