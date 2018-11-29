ORDER IS IMPORTANT

1. .gitignore should contain
    FOLDERS
    a. generated-conf 
    b. generated-sql 
    c. models 
    d. schema 
    e. vendor 
    FILES
    a. composer.json
    b. composer.lock
    c. propel.yml
    d. propel.yml.dist
2. clone the repository
3. run "composer require slim/slim" in root directory
4. edit the generated "composer.json"
{
    "minimum-stability": "dev",

    "require": {
        "slim/slim": "^3.11"
    }
}
5. run "composer require propel/propel" in root directory
6. run "composer require slim/twig-view" in root directory
7. run "vendor\bin\propel.bat init" in root directory
    a. mysql ENTER
    b. ENTER
    c. ENTER
    d. [database name ?] "databaseName" ENTER
    e. ENTER
    f. ENTER
    g. ENTER
    h. [have existing database ?] yes ENTER
    i. schema ENTER
    j. models ENTER
    k. ENTER
    l. ENTER
    m. [correct ?] yes ENTER
8. edit the generated "composer.json"
"autoload": {
  "classmap" : ["models"]
}
9. run "composer dump-autoload" in root directory