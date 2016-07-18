Yii 2 Basic Project Template
============================

Yii 2 Basic Project Template is a skeleton [Yii 2](http://www.yiiframework.com/) application best for
rapidly creating small projects.


[![Latest Stable Version](https://poser.pugx.org/yiisoft/yii2-app-basic/v/stable.png)](https://packagist.org/packages/yiisoft/yii2-app-basic)
[![Total Downloads](https://poser.pugx.org/yiisoft/yii2-app-basic/downloads.png)](https://packagist.org/packages/yiisoft/yii2-app-basic)
[![Build Status](https://travis-ci.org/yiisoft/yii2-app-basic.svg?branch=master)](https://travis-ci.org/yiisoft/yii2-app-basic)

DIRECTORY STRUCTURE
-------------------

      assets/             contains assets definition
      commands/           contains console commands (controllers)
      config/             contains application configurations
      controllers/        contains Web controller classes
      mail/               contains view files for e-mails
      models/             contains model classes
      runtime/            contains files generated during runtime
      tests/              contains various tests for the basic application
      vendor/             contains dependent 3rd-party packages
      views/              contains view files for the Web application
      web/                contains the entry script and Web resources



REQUIREMENTS
------------

The minimum requirement by this project template that your Web server supports PHP 5.4.0.


PROJECT NAME AND IDEA
---------------------

This project name is "Users Match"
The idea was to create Dating site where you would find your perfect Match.


USER STORY
----------

- user is able to register and create an account.
- users is able to see all members that are stored in MySQL database on server.
- users is able to search/filter another user on Members page.
- users is not able to delete any other user if not logged in. (will rederiect to Yii's error page)
- users is able to see any other profile if not logged in. (this is bug, user shouldn't be able to see any other profile if not logged in.
- when logged in as member user is able to update only his own profile.
- when logged in as member user is able to delete anyones profile. (this is bug, only admin should have this permission)
- when logged in as admin user is able to view, update, delete  anyones profile.


DATABASE
--------
MySQL


LIVE DEMO
-----------
http://danieltomic.com/mondocms/web/
