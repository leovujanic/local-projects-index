
Projects Index File
===================

This is w - a -  m - p like index file. It shows information about PHP, MySQL, and Apache version. It searches for all aliases, defined in system hosts file, which are pointing to localhost. It also shows list of all directories contained in "projects" directory, provides useful documentation links and loaded php extensions.



It looks like this:

![alt text](https://github.com/leovujanic/local_projects_index/blob/master/project_index.png "Projects Index Preview")




INSTALLATION:
=============

Place index.php in your projects directory to get following directory structure:

```
├── projects/
│   ├── index.php
│   ├── project1/
│   ├── project2/
│   ├── project3/
│   ├── ...
```
  
  
Use $params to add your own settings:

```php
$params = [
    'mysql'              => [
        'host' => 'localhost',                                      // mysql host
        'user' => 'infoUser',                                       // mysql username
        'pass' => 'infoPass',                                       // mysql password
    ],
    'pma'                => 'http://localhost/phpmyadmin/',         // pma address
    'hosts'              => '/private/etc/hosts',                   // your hosts file
    'server'             => [
        'liveUrl'  => '#',                                          // connected Server url
        'liveName' => 'Live Server',                                // connected Server name
    ],
    'helpersUrl'         => [                                       // footer links
        'http://www.github.com/login' => 'Git Hub',
    ],
    'projectsListIgnore' => [                                       // projects to be ignored in listing
        '.',
        '..',
        '.git',
        '.idea',
    ],
    'documentation'      => [
        'mysql'  => [
            'defaultLink' => 'http://dev.mysql.com/doc/',           // default mysql documentation link
        ],
        'php'    => [
            'defaultLink' => 'http://php.net/manual/en/index.php',  // default php documentation link
        ],
        'apache' => [
            'defaultLink' => 'https://httpd.apache.org/',           // default apach documentation link
        ],
    ],
];
```
  
  
Configuration
=============
1. mysql
  
   - mysql connection data
  
2. pma
  
   - link to local phpMyAdmin
  
3. hosts
  
   - path to hosts file
  
4. server
  
   - Connected live server name and url
  
5. helpersUrl
  
   - list of urls to be printed in footer
  
6. projectsListIgnore
  
   - folders to be ignored in listing
  
7. documentation
  
   - default documention links that will be shown if version fetching fails. In other case it generates documentation links for your installed version of apache and mysql
  
  
Naming convention for hosts file
================================
   
   
Alias name/title should be written one line before alias definition.
It should start with a hash sign and one space, the rest will be used as alias title.
   
   # Alias_name<br/>
   127.0.0.1 www.someDomain.ext
  


Working Within Git repos
========================
> If you are working within git repo and you want to ignore this file without placing it in .gitignore, you can add it to .git/info/exclude. In that way, the file won't be added to the git repo and every team member can have own index file with custom settings.

