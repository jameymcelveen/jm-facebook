==> Downloading https://www.php.net/get/php-5.4.40.tar.bz2/from/this/mirror
######################################################################## 100.0%
==> ./configure --prefix=/usr/local/Cellar/php54/5.4.40 --localstatedir=/usr/local/var --sysconfdir=/usr/local/etc/php/5.4 -
==> make
==> make install
==> /usr/local/Cellar/php54/5.4.40/bin/pear config-set php_ini /usr/local/etc/php/5.4/php.ini system
==> Caveats
To enable PHP in Apache add the following to httpd.conf and restart Apache:
    LoadModule php5_module    /usr/local/opt/php54/libexec/apache2/libphp5.so

The php.ini file can be found in:
    /usr/local/etc/php/5.4/php.ini

✩✩✩✩ PEAR ✩✩✩✩

If PEAR complains about permissions, 'fix' the default PEAR permissions and config:
    chmod -R ug+w /usr/local/Cellar/php54/5.4.40/lib/php
    pear config-set php_ini /usr/local/etc/php/5.4/php.ini system

✩✩✩✩ Extensions ✩✩✩✩

If you are having issues with custom extension compiling, ensure that
you are using the brew version, by placing /usr/local/bin before /usr/sbin in your PATH:

      PATH="/usr/local/bin:$PATH"

PHP54 Extensions will always be compiled against this PHP. Please install them
using --without-homebrew-php to enable compiling against system PHP.

✩✩✩✩ PHP CLI ✩✩✩✩

If you wish to swap the PHP you use on the command line, you should add the following to ~/.bashrc,
~/.zshrc, ~/.profile or your shell's equivalent configuration file:

      export PATH="$(brew --prefix homebrew/php/php54)/bin:$PATH"

✩✩✩✩ FPM ✩✩✩✩

To launch php-fpm on startup:
    mkdir -p ~/Library/LaunchAgents
    cp /usr/local/opt/php54/homebrew.mxcl.php54.plist ~/Library/LaunchAgents/
    launchctl load -w ~/Library/LaunchAgents/homebrew.mxcl.php54.plist

The control script is located at /usr/local/opt/php54/sbin/php54-fpm

OS X 10.8 and newer come with php-fpm pre-installed, to ensure you are using the brew version you need to make sure /usr/local/sbin is before /usr/sbin in your PATH:

  PATH="/usr/local/sbin:$PATH"

You may also need to edit the plist to use the correct "UserName".

Please note that the plist was called 'homebrew-php.josegonzalez.php54.plist' in old versions
of this formula.

To have launchd start php54 at login:
    ln -sfv /usr/local/opt/php54/*.plist ~/Library/LaunchAgents
Then to load php54 now:
    launchctl load ~/Library/LaunchAgents/homebrew.mxcl.php54.plist
==> Summary
🍺  /usr/local/Cellar/php54/5.4.40: 494 files, 48M, built in 5.6 minutes