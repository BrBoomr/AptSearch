So you cloned and broke your shit?

This is assuming you have imported the new DB and will NOT be modifying it anymore.

1) Delete:
    /models
    /generated-conf
    /generated-sql
    /propel.*
    /schema.xml

2) Run 'vendor/bin/propel.bat init' (make sure you create a folder for models, called 'models')

3) Run 'composer dump-autoload'